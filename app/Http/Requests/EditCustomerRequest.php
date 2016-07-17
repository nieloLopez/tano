<?php namespace App\Http\Requests;

use App\Http\Requests\Request;
use Illuminate\Routing\Route;
use Illuminate\Http\Request as RequestForm;

class EditCustomerRequest extends Request {

	/**
	 * EditUserRequest constructor.
	 * @param Route $route
     */
	public function __construct(Route $route)
	{
        $this->route = $route;
	}

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
			'email' => 'unique:customers,email,' . $this->route->getParameter('id'),
			'telephone' => 'required'
		];
		//'email' => 'required|unique:customers,email,' . $this->route->getParameter('id'),

	}

}
