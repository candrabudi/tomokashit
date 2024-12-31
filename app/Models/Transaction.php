<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    public function userMember()
    {
        return $this->hasOne(User::class, 'id', 'user_id')
            ->with('member', 'memberPaymentAccount');
    }

    public function paymentAccount()
    {
        return $this->hasOne(PaymentAccount::class, 'id', 'payment_account_id');
    }

    public function userUpdated()
    {
        return $this->hasOne(User::class, 'id', 'updated_by');
    }
}
