<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Pusher\Pusher;
class FWithdrawController extends Controller
{
    public function index()
    {
        return view('frontend.withdraw.index');
    }

    public function store(Request $request)
    {
        // Validasi request (Jika diperlukan)
        if (!$request->has('nominal') || !is_numeric($request->nominal) || $request->nominal <= 0) {
            return redirect()->back()->with('error', 'Nominal is required, must be a number, and greater than 0.')->withInput();
        }

        DB::beginTransaction();
        try {
            // Membuat transaksi baru
            $transaction = new Transaction();
            $transaction->transaction_number = time();
            $transaction->user_id = Auth::id();
            $transaction->payment_account_id = Auth::user()->memberPaymentAccount->id;
            $transaction->nominal = $request->nominal;
            $transaction->type = "withdraw";
            $transaction->status = "pending";
            $transaction->save();

            // Konfigurasi Pusher
            $pusher = new Pusher(
                env('PUSHER_APP_KEY'),   // Key dari .env
                env('PUSHER_APP_SECRET'),// Secret dari .env
                env('PUSHER_APP_ID'),    // App ID dari .env
                [
                    'cluster' => env('PUSHER_APP_CLUSTER'), // Cluster dari .env
                    'useTLS' => true                        // Menggunakan TLS untuk koneksi aman
                ]
            );

            // Data yang akan dikirim ke frontend
            $data = [
                'transaction_number' => $transaction->transaction_number,
                'username' => $transaction->userMember->username, // Pastikan properti user ini valid
                'nominal' => $transaction->nominal
            ];

            $data = [
                "transaction" => [
                    "id" => $transaction->id,
                    "transaction_number" => $transaction->transaction_number,
                    "user_member" => [
                        "username" => $transaction->userMember->username,
                        "member_payment_account" => $transaction->userMember->memberPaymentAccount
                    ],
                    "nominal" => $transaction->nominal,
                    "transaction_status" => $transaction->status
                ]
            ];
            
            $pusher->trigger('transaction-withdraw-channel', 'transaction-withdraw-created', $data);

            DB::commit();

            return redirect()->back();
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json([
                'status' => 'error',
                'message' => 'Failed to create transaction. ' . $e->getMessage(),
            ], 500);
        }
    }
}
