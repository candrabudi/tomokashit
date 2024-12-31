<?php

namespace App\Http\Controllers\Backoffice;

use App\Helpers\ThirdApi;
use App\Http\Controllers\Controller;
use App\Models\Member;
use App\Models\Transaction;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BDashboardController extends Controller
{
    public function index()
    {
        return view('backoffice.dashboard.index');
    }

    public function dashboardSummary()
    {
        $totalDeposit = DB::table('transactions')
            ->whereIn('type', ['deposit', 'manual_deposit'])
            ->where('status', 'approved')
            ->sum('nominal');
        
        $totalWithdraw = DB::table('transactions')
            ->whereIn('type', ['withdraw', 'manual_withdraw'])
            ->where('status', 'approved')
            ->sum('nominal');
        
        $penghasil = $totalDeposit - $totalWithdraw;
        
        $totamMember = Member::count();
        return response()->json([
            'total_deposit' => $totalDeposit,
            'total_withdraw' => $totalWithdraw,
            'total_member' => $totamMember,
            'penghasil' => $penghasil,
        ]);
    }
    public function getTransactionDepositPending(Request $request)
    {
        $query = $request->input('query');
        $perPage = $request->input('per_page', 10);

        $users = Transaction::with(['userMember', 'paymentAccount'])
            ->when($query, function ($queryBuilder) use ($query) {
                return $queryBuilder->whereHas('userMember', function ($q) use ($query) {
                    $q->where('username', 'like', '%' . $query . '%');
                });
            })
            ->where('type', 'deposit')
            ->where('status', 'pending')
            ->paginate($perPage);

        return response()->json($users);
    }

    public function getTransactionDetail($transactionNumber)
    {
        $transaction = Transaction::with(['userMember', 'paymentAccount'])
            ->where('id', $transactionNumber)
            ->firstOrFail();

        return response()->json($transaction);
    }

    public function updateStatusDeposit(Request $request, $a)
    {
        $transaction = Transaction::where('id', $a)
            ->where('type', 'deposit')
            ->first();

        if (!$transaction) {
            return response()->json([
                'status' => 'failed',
                'code' => 400,
                'message' => 'Maaf tidak ada transaksi.'
            ], 400);
        }

        if ($request->status == "approved") {
            $userMember = Member::where('user_id', $transaction->user_id)
                ->first();
            $result = ThirdApi::deposit(
                $userMember->ext_username,
                $transaction->nominal
            );

            if ($result['status']) {
                $transaction->status = 'approved';
                $transaction->save();
            }
        }

        $transaction->status = 'rejected';
        $transaction->save();

        return response()->json([
            'status' => 'success',
            'code' => 200,
            'message' => 'Status deposit berhasil diperbarui.'
        ]);
    }

    public function getTransactionWithdrawPending(Request $request)
    {
        $query = $request->input('query');

        $transactions = Transaction::with(['userMember', 'paymentAccount'])
            ->when($query, function ($queryBuilder) use ($query) {
                return $queryBuilder->whereHas('userMember', function ($q) use ($query) {
                    $q->where('username', 'like', '%' . $query . '%');
                });
            })
            ->where('type', 'withdraw')
            ->where('status', 'pending')
            ->orderBy('created_at', 'desc')
            ->get();

        return response()->json($transactions);
    }


    public function getTransactionWithdrawDetail($transactionNumber)
    {
        $transaction = Transaction::with(['userMember', 'paymentAccount'])
            ->where('id', $transactionNumber)
            ->firstOrFail();

        return response()->json($transaction);
    }

    public function updateStatusWithdraw(Request $request, $a)
    {
        $transaction = Transaction::where('id', $a)
            ->where('type', 'withdraw')
            ->first();

        if (!$transaction) {
            return response()->json([
                'status' => 'failed',
                'code' => 400,
                'message' => 'Maaf tidak ada transaksi.'
            ], 400);
        }

        if ($request->status == "approved") {
            $transaction->status = 'approved';
            $transaction->save();
        }

        return response()->json([
            'status' => 'success',
            'code' => 200,
            'message' => 'Status withdraw berhasil diperbarui.'
        ]);
    }

    public function getMemberList(Request $request)
    {
        $searchTerm = $request->input('search', '');
        $limit = $request->input('limit', 10);
        $offset = $request->input('offset', 0);
    
        $query = User::where('role', 'member')
            ->with('member')
            ->select('users.*');

        if ($searchTerm) {
            $query->where(function($q) use ($searchTerm) {
                $q->where('username', 'like', '%' . $searchTerm . '%')
                  ->orWhere('email', 'like', '%' . $searchTerm . '%')
                  ->orWhereHas('member', function($q) use ($searchTerm) {
                      $q->where('full_name', 'like', '%' . $searchTerm . '%')
                        ->orWhere('phone_number', 'like', '%' . $searchTerm . '%');
                  });
            });
        }
    
        $total = $query->count();
    
        $users = $query->skip($offset)->take($limit)->get();
    
        return response()->json([
            'status' => 'success',
            'code' => 200,
            'data' => $users,
            'total' => $total, 
        ]);
    }

    public function getMemberDetail($id)
    {
        try {
            $member = User::with('member')->findOrFail($id);

            return response()->json([
                'success' => true,
                'data' => [
                    'id' => $member->id,
                    'username' => $member->username,
                    'email' => $member->email,
                    'ip_address' => $member->ip_address,
                    'last_login' => $member->last_login,
                    'member' => [
                        'full_name' => $member->member->full_name,
                        'phone_number' => $member->member->phone_number,
                        'bank' => $member->memberPaymentAccount->paymentMethod->payment_name,
                        'account_number' => $member->memberPaymentAccount->account_number,
                        'balance' => $member->member->balance,
                    ],
                ],
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Member not found or an error occurred.',
            ], 404);
        }
    }
    
    public function lockMember($id)
    {
        try {
            $member = User::findOrFail($id);
            
            $member->is_lock_game = 1;
            
            $member->save();

            return response()->json(['message' => 'Member berhasil dikunci.'], 200);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Gagal mengunci member.'], 500);
        }
    }

}
