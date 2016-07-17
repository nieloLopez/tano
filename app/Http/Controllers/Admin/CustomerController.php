<?php namespace App\Http\Controllers\Admin;

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


use App\Customer;

use App\Http\Requests\CustomerRequest;
use App\Http\Requests\EditCustomerRequest;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Session;
/**
 * Description of AdminController
 *
 * @author nielo
 */
class CustomerController extends Controller {
    
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard to the customer.
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $customers = Customer::search($request->get('search'))->orderBy('id', 'DESC')->paginate(10);
        return view('admin/customer/index', compact('customers'));
    }
    
    public function add()
    {
        return view('admin/customer/add');
    }


    public function store(CustomerRequest $request)
    {
        try {
            $user = new Customer();
            $user->fill($request->all());
            $user->setRol();
            $user->setPasswordAttribute('');
            $user->setStatus(0);
            $user->save();

            Session::flash('message', 'Se guardo el registro en la base de datos');

            return new RedirectResponse(url('admin/'));
        } catch (\Exception $ex) {
            echo $ex->getMessage();
        }
    }
    
    public function edit($id)
    {
        $user = new Customer();
        $user = $user->findOrFail($id);
        return view('admin/customer/edit', compact('user'));
    }
    
    public function update($id, EditCustomerRequest $request)
    {
        try {

            $user = new Customer();
            $user = $user->findOrFail($id);
            $user->fill($request->all());
            $user->save();

            Session::flash('message', 'Se modifico el registro en la base de datos');

            return new RedirectResponse(url('admin/'));
        } catch (\Exception $ex) {
            echo $ex->getMessage();
        }
    }
    
    public function disable($id, Request $request)
    {
        try
        {
            if ($request->ajax())
            {
                $user = new Customer();
                $user = $user->findOrFail($id);
                $user->status = ($user->status == 1) ? 0 : 1;
                $status = $user->status;
                $user->save();

                return response()->json([
                    'message' => 'El usuario fue modificado con exito',
                    'status' => $status
                ]);
            }

        }catch (\Exception $ex) {
            echo $ex->getMessage();
        }
    }
}
