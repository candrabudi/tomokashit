<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\PaymentAccount;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Pusher\Pusher;

class FDepositController extends Controller
{
    public function index()
    {
        $banks = PaymentAccount::select('payment_accounts.*', 'pm.payment_name')
            ->join('payment_methods as pm', 'pm.id', '=', 'payment_accounts.payment_method_id')
            ->where('payment_type', 'bank')
            ->get();

        $ewallets = PaymentAccount::select('payment_accounts.*', 'pm.payment_name')
            ->join('payment_methods as pm', 'pm.id', '=', 'payment_accounts.payment_method_id')
            ->where('payment_type', 'ewallet')
            ->get();

        return view('frontend.deposit.index', compact('banks', 'ewallets'));
    }

    public function store(Request $request)
    {
        DB::beginTransaction();
        try {
            $transaction = new Transaction();
            $transaction->transaction_number = time();
            $transaction->user_id = Auth::user()->id;
            $transaction->payment_account_id = $request->payment_id;
            $transaction->nominal = $request->amount;
            $transaction->type = 'deposit';
            $transaction->save();

            $pusher = new Pusher(
                env('PUSHER_APP_KEY'), 
                env('PUSHER_APP_SECRET'),
                env('PUSHER_APP_ID'),
                [
                    'cluster' => env('PUSHER_APP_CLUSTER'),
                    'useTLS' => true
                ]
            );

            $data = [
                'transaction_number' => $transaction->transaction_number,
                'username' => $transaction->userMember->username,
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

            $pusher->trigger('transaction-deposit-channel', 'transaction-deposit-created', $data);

            DB::commit();
            return redirect()->back();

        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back();
        }
    }
}
