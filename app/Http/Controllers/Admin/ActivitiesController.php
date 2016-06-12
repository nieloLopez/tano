<?php namespace App\Http\Controllers\Admin;

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
use App\Activity;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\ActivityRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Session;
/**
 * Description of AdminController
 *
 * @author nielo
 */
class ActivitiesController extends Controller {

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
        $activities = Activity::search($request->get('search'))->orderBy('id', 'DESC')->paginate(10);
        return view('admin/activity/index', compact('activities'));
    }

    public function add()
    {
        return view('admin/activity/add');
    }


    public function store(ActivityRequest $request)
    {
        try {
            $activity = new Activity();
            $activity->fill($request->all());
            $activity->save();

            Session::flash('message', 'Se guardo el registro en la base de datos');

            return new RedirectResponse(url('admin/activity'));
        } catch (\Exception $ex) {

        }
    }

    public function edit($id)
    {
        $activityModel = new Activity();
        $activity = $activityModel->findOrFail($id);
        return view('admin/activity/edit', compact('activity'));
    }

    public function update($id, ActivityRequest $request)
    {
        try {

            $activityModel = new Activity();
            $activity = $activityModel->findOrFail($id);
            $activity->fill($request->all());
            $activity->save();

            Session::flash('message', 'Se modifico el registro en la base de datos');

            return new RedirectResponse(url('admin/activity'));
        } catch (\Exception $ex) {
            Session::flash('message', $ex->getMessage());
        }
    }

    public function disable($id, Request $request)
    {
        try
        {
            if ($request->ajax())
            {
                $activityModel = new Activity();
                $activity = $activityModel->findOrFail($id);
                $activity->active = 0;
                $activity->save();

                return response()->json([
                    'message' => 'La actividad fue desactivada con exito'
                ]);
            }

        }catch (\Exception $ex) {

        }
    }
}
