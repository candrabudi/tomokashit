<?php

use App\Models\PaymentAccount;

function banks()
{
    $banks = PaymentAccount::select('payment_accounts.*', 'pm.payment_name', 'pm.payment_code', 'pm.payment_image')
        ->where('payment_account_status', 1)
        ->where('pm.payment_type', 'bank')
        ->join('payment_methods as pm', 'pm.id', '=', 'payment_accounts.payment_method_id')
        ->get();

    return $banks;
}

function ewallets()
{
    $banks = PaymentAccount::select('payment_accounts.*', 'pm.payment_name', 'pm.payment_code', 'pm.payment_image')
        ->where('payment_account_status',  1)
        ->where('pm.payment_type', 'ewallet')
        ->join('payment_methods as pm', 'pm.id', '=', 'payment_accounts.payment_method_id')
        ->get();

    return $banks;
}

