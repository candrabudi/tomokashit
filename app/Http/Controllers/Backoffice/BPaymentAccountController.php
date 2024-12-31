<?php

namespace App\Http\Controllers\Backoffice;

use App\Http\Controllers\Controller;
use App\Models\PaymentAccount;
use App\Models\PaymentMethod;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BPaymentAccountController extends Controller
{
    public function index()
    {
        $paymentAccounts = PaymentAccount::with('paymentMethod')->get();
        $paymentMethods = PaymentMethod::all();
        return view('backoffice.payment_account.index', compact('paymentAccounts', 'paymentMethods'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'payment_account_name' => 'required|string|max:255',
            'payment_account_number' => 'required|string|max:255',
            'payment_account_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $paymentAccount = new PaymentAccount();
        $paymentAccount->payment_method_id = $request->payment_method_id;
        $paymentAccount->payment_account_name = $request->payment_account_name;
        $paymentAccount->payment_account_number = $request->payment_account_number;
        $paymentAccount->payment_account_status = $request->payment_account_status;

        if ($request->hasFile('payment_account_image')) {
            $imagePath = $request->file('payment_account_image')->store('payment_accounts', 'public');
            $paymentAccount->payment_account_image = $imagePath;
        }

        $paymentAccount->save();

        return redirect()->route('system.payment.accounts.index');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'payment_account_name' => 'required|string|max:255',
            'payment_account_number' => 'required|string|max:255',
            'payment_account_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $paymentAccount = PaymentAccount::findOrFail($id);
        $paymentAccount->payment_account_name = $request->payment_account_name;
        $paymentAccount->payment_account_number = $request->payment_account_number;
        $paymentAccount->payment_account_status = $request->payment_account_status;

        if ($request->hasFile('payment_account_image')) {
            // Delete old image if exists
            if ($paymentAccount->payment_account_image) {
                Storage::disk('public')->delete($paymentAccount->payment_account_image);
            }

            $imagePath = $request->file('payment_account_image')->store('payment_accounts', 'public');
            $paymentAccount->payment_account_image = $imagePath;
        }

        $paymentAccount->save();

        return redirect()->route('system.payment.accounts.index');
    }

    public function destroy($id)
    {
        $paymentAccount = PaymentAccount::findOrFail($id);
        $paymentAccount->delete();

        return redirect()->route('payment.account.index')->with('success', 'Akun Pembayaran berhasil dihapus.');
    }
}
