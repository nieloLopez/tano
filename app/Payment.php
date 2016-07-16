<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use DB;

class Payment extends Model {

    protected $table = 'payments';

    public $timestamps = false;

    protected $fillable = ['amount', 'price', 'fk_customer'];

    public function processData($payment)
    {
        $date = date('Y-m-d H:i:s');
        $newDate = strtotime ( '+30 day' , strtotime ( $date ) ) ;
        $newDate = date ( 'Y-m-d H:i:s' , $newDate );

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


    public function getPaymentItems($idPayment)
    {
        $paymentItem = DB::table('payments as p')
            ->join('payments_items as pi', 'p.id', '=', 'pi.fk_payment')
            ->join('customers as c', 'pi.fk_customer_admin', '=', 'c.id')
            ->select('c.name', 'pi.date_payment', 'pi.amount_pay')
            ->where('p.id', $idPayment)
            ->get();

        return $paymentItem;
    }

    public function getPaymentActivities($idPayment)
    {
        $paymentActivities = DB::table('payments as p')
            ->join('payments_activities as pa', 'p.id', '=', 'pa.fk_payment')
            ->join('activities as a', 'pa.fk_activity', '=', 'a.id')
            ->select('a.id','a.name', 'p.date_payment', 'a.price')
            ->where('p.id', $idPayment)
            ->get();

        return $paymentActivities;
    }

    /**
     * @return array
     */
    public function getPayPending($idPayment)
    {
        $paymentActivities = DB::table('payments as p')
            ->select(DB::raw('p.price - p.amount as pay_pending'))
            ->where('p.id', $idPayment)
            ->get();

        return $paymentActivities;
    }

    /**
     * @return array
     */
    public function getCustomerByIdPayment($idPayment)
    {
        $fkCustomer = DB::table('payments as p')
            ->join('customers as c', 'p.fk_customer', '=', 'c.id')
            ->select('c.id')
            ->where('p.id', $idPayment)
            ->get();
        return $fkCustomer[0]->id;
    }
}
