<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Payment extends Model {

    protected $table = 'payments';

    public $timestamps = false;

    protected $fillable = ['amount', 'price', 'fk_customer'];

    public function processData($payment)
    {
        $date = date('Y-m-d');
        $newDate = strtotime ( '+30 day' , strtotime ( $date ) ) ;
        $newDate = date ( 'Y-m-d' , $newDate );

        $this->attributes['date_payment'] = $date;
        $this->attributes['date_payment_expiration'] = $newDate;
        $this->attributes['fk_customer'] = $payment->get('fk_customer');
        $this->attributes['fk_customer_admin'] = Auth::user()->id;
        $this->attributes['price'] = $payment->get('price');
        $this->attributes['amount'] = $payment->get('amount');
        if ($payment->get('amount') < $payment->get('price'))
        {
            $this->attributes['status'] = 0;
        } else
        {
            $this->attributes['status'] = 1;
        }
    }

    public function scopeSearch($query, $search)
    {
        if (!empty(trim($search)))
        {
            $query->where(\DB::raw('fk_customer'), $search);
        }
    }

}
