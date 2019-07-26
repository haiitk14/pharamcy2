<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;
use App\Model\Customer;
use Auth;

class CustomerController
{
	/**
     * @var string $pageName
     */
    protected $pageName;

    /**
     * DashboardController constructor.
     */
    public function __construct()
    {
        $this->pageName = 'Customers';

        if (!Auth::check()) {
            return redirect()->intended('/404');
        }
    }

	/**
     * Show index page
     *
     * @return View
     */
    public function index()
    {
        $pageName = $this->pageName;
        $user = Auth::user();
        $customers = Customer::where('create_by', $user->id)->get();

        return view('admin.customer.index', compact('pageName', 'customers'));
    }

    public function create(Request $request) 
    {
        if ($request->ajax()) {
            $input = $request->all();
            $validator = Validator::make($input, [
                'full_name' => 'required',
                'code' => 'required',
            ]);

            if ($validator->fails()) {
                $errors = $validator->errors()->all();
                return response()->json(compact(['errors']), 422);
            }
            $checkExist = Customer::where('code', $request->get('code'))->count();
            
            if ($checkExist > 0) {
                $errors = ["Code exists"];
                return response()->json(compact(['errors']), 422);
            }
            $customer=new Customer();
            $customer->full_name = $request->get('full_name');
            $customer->code = $request->get('code');
            $customer->address = $request->get('address');
            $customer->phone = $request->get('phone');
            $customer->create_by = Auth::user()->id;
            $response = $customer->save();
            
            $result = [];
            if ($response) {
                $message = "Success";
                $result = [
                    'message' => $message
                ];
            }

            return response()->json($result);

            $status = 'error';

            return response()->json(compact(['status']), 500);
        }    
    }

    public function update(Request $request)
    {
        if ($request->ajax()) {
            $input = $request->all();
            $validator = Validator::make($input, [
                'id' => 'required',
                'code' => 'required',
                'full_name' => 'required',
            ]);

            if ($validator->fails()) {
                $errors = $validator->errors()->all();
                return response()->json(compact(['errors']), 422);
            }
            $checkExist = Customer::where('code', $request->get('code'))->where('id', '<>', $request->get('id'))->count();
            
            if ($checkExist > 0) {
                $errors = ["Code exists"];
                return response()->json(compact(['errors']), 422);
            }
            $id = $request->get('id');
            $item = Customer::find($id);
            if ($item) {
                $response = Customer::where('id', $id)->update([
                        'code'=> $request->get('code'),
                        'full_name' => $request->get('full_name'),
                        'phone'=> $request->get('phone'),
                        'address' => $request->get('address'),
                        'update_by' => Auth::user()->id
                    ]);
                $result = [];
                if ($response) {
                    $message = "Success";
                    $result = [
                        'message' => $message
                    ];
                }

                return response()->json($result);
            }

            $status = 'error';

            return response()->json(compact(['status']), 500);
        }   
    }

    public function destroy(Request $request)
    {
        if ($request->ajax()) {
            $input = $request->all();

            $validator = Validator::make($input, [
                'id' => 'required',
            ]);

            if ($validator->fails()) {
                $errors = $validator->errors()->all();
                return response()->json(compact(['errors']), 422);
            }

            $id = $request->get('id');
            $item = Customer::find($id);
            if ($item) {
                $response = $item->delete();
                $result = [];
                if ($response) {
                    $message = "Success";
                    $result = [
                        'message' => $message
                    ];
                }

                return response()->json($result);
            }

            $status = 'error';

            return response()->json(compact(['status']), 500);
        }
    }
}
