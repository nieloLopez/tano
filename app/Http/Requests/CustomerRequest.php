<?php namespace App\Http\Requests;

use App\Http\Requests\Request;
use Illuminate\Http\Request as RequestForm;

class CustomerRequest extends Request {

	/**
	 * Determine if the customer is authorized to make this request.
	 *
	 * @return bool
	 */
	public function authorize()
	{
		return true;
	}

	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules(RequestForm $request)
	{
		return  $rules = [
			'name' => 'required',
			'dni' => 'integer|required|unique:customers,dni',
			'address' => 'required',
			'telephone' => 'required'
		];
	}

}
