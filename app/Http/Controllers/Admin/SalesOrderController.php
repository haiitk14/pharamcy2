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

class SalesOrderController
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
        $this->pageName = 'Sales Order';
    }

	/**
     * Show index page
     *
     * @return View
     */
    public function index()
    {
        $pageName = $this->pageName;
		$products = Product::where('is_delete', 0)->get();
		$customers = Customer::where('is_delete', 0)->get();
		$formulas = Formula::where('is_delete', 0)->get();
		$ingredients = Ingredient::where('is_delete', 0)->get();
		$comments = Comment::where('is_delete', 0)->get();
        $manufatures = Manufature::where('is_delete', 0)->get();
        $customRequest = CustomRequest::where('id', 1)->first();

        $data = [
            'products' => $products,
            'customers' => $customers,
            'formulas' => $formulas,
            'ingredients' => $ingredients,
			'comments' => $comments,
            'manufatures' => $manufatures
        ];

        return view('admin.salesorder.index', compact('pageName', 'data'));
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
            $customRequest = new CustomRequest();
            $customRequest->ipd = $request->get('ipd');
            $customRequest->product_id = $request->get('product_id');
            $customRequest->customer_id = $request->get('customer_id');
            $customRequest->address = $request->get('address');
            $customRequest->manufature_id = $request->get('manufature_id');
            $customRequest->formula_number = $request->get('formula_number');
            $customRequest->revision = $request->get('revision');
            $customRequest->date = $request->get('date');
            $customRequest->is_softgel = $request->get('is_softgel');
            $customRequest->is_tablet = $request->get('is_tablet');
            $customRequest->is_hardcapsule = $request->get('is_hardcapsule');
            $customRequest->size_type = $request->get('size_type');
            $customRequest->color_logo = $request->get('color_logo');
            $customRequest->filling_wt = $request->get('filling_wt');
            $customRequest->order = $request->get('order');
            $response = $customRequest->save();

            $dataIngredient = json_decode($request->get('listIngredients'));
            $dataComments = json_decode($request->get('listComments'));

            foreach ($dataIngredient as $value) {
                $salesOrderIngredients = new SalesOrderIngredients();
                $salesOrderIngredients->customrequest_id = intval($customRequest->id);
                $salesOrderIngredients->ingredient_id = intval($value->id);
                $salesOrderIngredients->per_serving = doubleval($value->per_serving);
                $salesOrderIngredients->save();
            }

            foreach ($dataComments as $value) {
                $salesOrderComments = new SalesOrderComments();
                $salesOrderComments->customrequest_id = intval($customRequest->id);
                $salesOrderComments->comment_id = intval($value->id);
                $salesOrderComments->save();
            }
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
}
