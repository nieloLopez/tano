<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class PaymentActivitiy extends Model {

    protected $table = 'payments_activities';

    public $timestamps = false;

    public function processData($idPayment, $idActivity)
    {
        $this->attributes['fk_activity'] = $idActivity;
        $this->attributes['fk_payment'] = $idPayment;
    }
}
