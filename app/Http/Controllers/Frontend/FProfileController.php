<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\PaymentMethod;
use Illuminate\Http\Request;

class FProfileController extends Controller
{
    public function index()
    {
        return view('frontend.profile.index');
    }

    public function payment()
    {
        $paymentMethods = PaymentMethod::all();
        return view('frontend.payment.index', compact('paymentMethods'));
    }
}
