<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class PaymentItem extends Model {

    protected $table = 'payments_items';
    
    public $timestamps = false;
    
    protected $fillable = ['amount', 'price', 'fk_customer'];

    public function processData($idPayment, $paymentData)
    {
        $this->attributes['date_payment'] = date('Y-m-d H:i:s');
        $this->attributes['fk_payment'] = $idPayment;
        $this->attributes['fk_customer_admin'] = Auth::user()->id;
        $this->attributes['amount_pay'] = $paymentData->get('amount');
    }

}
