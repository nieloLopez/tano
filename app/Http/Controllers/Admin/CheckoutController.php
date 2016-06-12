<?php namespace App\Http\Controllers\Admin;

use App\Activity;
use App\Customer;
use App\Http\Requests;
use App\Http\Controllers\Controller;


use App\Http\Requests\CheckoutRequest;
use App\Payment;
use App\PaymentActivitiy;
use App\PaymentItem;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\RedirectResponse;

class CheckoutController extends Controller {

	public function __construct()
	{
		$this->middleware('auth');
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index($id)
	{
		$userModel = new Customer();
		$user = $userModel->findOrFail($id);

        $payments = Payment::search($id)->orderBy('id', 'DESC')->paginate(10);
        
		$activityModel = new Activity();
		$activities = $activityModel->all();
		return view('admin/checkout/index', compact('user', 'activities', 'payments'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function finish(CheckoutRequest $request)
	{
        try {
            $paymentModel = new Payment();
            $paymentModel->processData($request->request);
            $paymentModel->save();

            $paymentItemModel = new PaymentItem();
            $paymentItemModel->processData($paymentModel->id, $request->request);
            $paymentItemModel->save();

            foreach ($request->request->get('activity') as $activity)
            {
                $paymentActivityModel = new PaymentActivitiy();
                $paymentActivityModel->processData($paymentModel->id, $activity);
                $paymentActivityModel->save();
            }

            Session::flash('message', 'El pago se registro con exito');

            return new RedirectResponse(url('admin/checkout/' . $request->request->get('fk_customer')));

        }catch (\Exception $ex){
            dd($ex->getMessage() . " Error");
        }
	}

	public function getPaymentDetails($id)
	{
		
		return response()->json([
			'message' => 'El usuario fue desactivado con exito'
		]);
	}
	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
 * Update 	the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}
