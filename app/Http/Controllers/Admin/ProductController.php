<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;
use App\Model\Product;
use Auth;

class ProductController
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
        $this->pageName = 'Product';

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
        $products = Product::where('create_by', $user->id)->get();

        return view('admin.product.index', compact('pageName', 'products'));
    }

    public function create(Request $request) 
    {
        if ($request->ajax()) {
            $input = $request->all();
            $validator = Validator::make($input, [
                'code' => 'required',
                'name' => 'required',
            ]);

            if ($validator->fails()) {
                $errors = $validator->errors()->all();
                return response()->json(compact(['errors']), 422);
            }
            $checkExist = Product::where('code', $request->get('code'))->count();
            
            if ($checkExist > 0) {
                $errors = ["Code exists"];
                return response()->json(compact(['errors']), 422);
            }
            $product=new Product();
            $product->code = $request->get('code');
            $product->name = $request->get('name');
            $product->create_by = Auth::user()->id;
            $response = $product->save();
            
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
                'name' => 'required',
            ]);

            if ($validator->fails()) {
                $errors = $validator->errors()->all();
                return response()->json(compact(['errors']), 422);
            }
            $checkExist = Product::where('code', $request->get('code'))->where('id', '<>', $request->get('id'))->count();
            
            if ($checkExist > 0) {
                $errors = ["Code exists"];
                return response()->json(compact(['errors']), 422);
            }
            
            $id = $request->get('id');
            $item = Product::find($id);
            if ($item) {
                $response = Product::where('id', $id)->update([
                        'code'=> $request->get('code'),
                        'name' => $request->get('name'),
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
            $item = Product::find($id);
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
