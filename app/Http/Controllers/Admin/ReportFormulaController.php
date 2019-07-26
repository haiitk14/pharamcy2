<?php

namespace App\Http\Controllers\Admin;

use App\Model\Manufature;
use Illuminate\Http\Request;
use App\Model\Product;
use App\Model\Customer;
use App\Model\Formula;
use App\Model\Ingredient;
use App\Model\Comment;
use App\Model\CustomRequest;
use Validator;
use App\Model\SalesOrderIngredients;
use App\Model\SalesOrderComments;
use Auth;

class ReportFormulaController
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
        $this->pageName = 'Report Formula';
    }

	/**
     * Show index page
     *
     * @return View
     */
    public function index()
    {
        $pageName = $this->pageName;
        $customRequests = CustomRequest::where('create_by', Auth::user()->id)->orderBy('created_at', 'desc')->get();
        // $salesOrderIngredients = $customRequest != null ?  SalesOrderIngredients::where('customrequest_id', $customRequest->id)->orderBy('created_at', 'asc')->get() : null;
        $data = [
            'customRequests' => $customRequests,
            'salesOrderIngredients' => null,
            'customRequest' => null,
        ];

        return view('admin.report-formula.index', compact('pageName', 'data'));
    }

    public function saveForm(Request $request) 
    {
        if ($request->ajax()) {
            $input = $request->all();
            
            $validator = Validator::make($input, [
                'product_id' => 'required',
                'customer_id' => 'required',
                'date' => 'required',
                'order' => 'required'
            ]);

            if ($validator->fails()) {
                $errors = $validator->errors()->all();
                return response()->json(compact(['errors']), 422);
            }
           
            $result = [];
            // if ($response) {
            //     $message = "Success";
            //     $result = [
            //         'message' => $message
            //     ];
            // }

            return response()->json($result);

            $status = 'error';

            return response()->json(compact(['status']), 500);
        }    
    }

    public function getCustomRequest(Request $request)
    {
        if ($request->ajax()) {
            $input = $request->all();
            
            $validator = Validator::make($input, [
                'id' => 'required',
            ]);

            $id = $request->get('id');

            if ($validator->fails()) {
                $errors = $validator->errors()->all();
                return response()->json(compact(['errors']), 422);
            }
            $customRequest = CustomRequest::where('id', $id)->first();
            $salesOrderIngredients = SalesOrderIngredients::where('customrequest_id', $id)->get();

            foreach ($salesOrderIngredients as $value) {
                $value['name_ingredient'] = $value->ingredient->name;
                $value['code'] = $value->ingredient->code;
                $value['req_wt'] = 0;
                $value['purity'] = 0;
                $value['overage'] = 0;
                $value['input_wtmg'] = 0;
                $value['input_wt_per_batch'] = 0;
                $value['percent_softgel'] = 0;
                $value['density'] = 0;
                $value['volum'] = 0;
            }
            $result = [
                'customRequest' => $customRequest,
                'manufature' => $customRequest->manufature,
                'customer' => $customRequest->customer,
                'product' => $customRequest->product,
                'salesOrderIngredients' => $salesOrderIngredients,
                   
            ]; 

            return response()->json($result);

            $status = 'error';

            return response()->json(compact(['status']), 500);
        } 
    } 
}
