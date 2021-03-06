<?php namespace App;

use DB;
use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

class Customer extends Model implements AuthenticatableContract, CanResetPasswordContract {

	use Authenticatable, CanResetPassword;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'customers';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
        
	protected $fillable = ['name', 'dni', 'email', 'password', 'birthday', 'address', 'telephone', 'fk_rol'];

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = ['password', 'remember_token'];
	
	public function setPasswordAttribute($value)
	{
		$this->attributes['password'] = '';
	}

	public function scopeSearch($query, $search)
	{
		if (!empty(trim($search)))
		{
			$query->where(\DB::raw('name'),'LIKE', "%$search%")
				->orWhere(\DB::raw('dni'),'LIKE', "%$search%")
				->orWhere(\DB::raw('email'),'LIKE', "%$search%");
		}
	}

	public function setRol()
	{
		$this->attributes['fk_rol'] = 2;
	}

	public function setStatus($status)
	{
		$this->attributes['status'] = $status;
	}

	public function changeStatusCustomer($statusLastPayment, $customer)
	{
		if (!$statusLastPayment)
		{
			$customer->status = 2;
		} else {

			$paymentList = DB::table('payments as p')
				->select('p.status')
				->where('p.fk_customer', $customer->id)
				->where('p.status',0)
				->get();

			if (!empty($paymentList))
			{
				$customer->status = 2;
			} else {
				$customer->status = 1;
			}
		}
		return $customer;
	}
}
