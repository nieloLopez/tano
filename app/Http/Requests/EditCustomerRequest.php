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
        $rules = [
			'name' => 'required',
			'dni' => 'integer|required|unique:customers,dni,' . $this->route->getParameter('id'),
			//'email' => 'required|unique:customers,email,' . $this->route->getParameter('id'),
			'address' => 'required',
			'telephone' => 'required'
        ];
        if ($request->request->get('fk_rol') == 2)
        {
            $rules['password'] = 'required';
        }

        return $rules;
	}

}
