<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\MemberPaymentAccount;
use App\Models\PaymentMethod;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class FPaymentAccountController extends Controller
{
    public function index()
    {
        $cMemberPayment = MemberPaymentAccount::where('user_id', Auth::user()->id)
            ->first();

        if($cMemberPayment) {
            return redirect()->route('user.my_account');
        }
        $paymentMethods = PaymentMethod::where('payment_status', 1)
            ->get();
        return view('frontend.payment.index', compact('paymentMethods'));
    }

    public function store(Request $request)
    {
        DB::beginTransaction();
        try{

            $s = new MemberPaymentAccount();
            $s->user_id = Auth::user()->id;
            $s->payment_method_id = $request->payment_method_id;
            $s->account_name = $request->account_name;
            $s->account_number = $request->account_number;
            $s->save();

            DB::commit();
            return redirect()->back()->with('success', 'Berhasil menambahkan pembayaran.');
        }catch(\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Maaf ada kesalahan sistem.');
        }
    }
}
