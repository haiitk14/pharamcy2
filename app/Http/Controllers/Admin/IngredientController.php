<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Ingredient;
use Validator;

class IngredientController
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
        $this->pageName = 'Ingredient';
    }

	/**
     * Show index page
     *
     * @return View
     */
    public function index()
    {
        $pageName = $this->pageName;
        $ingredients = Ingredient::where('is_using', 1)->get();

        return view('admin.ingredient.index', compact('pageName', 'ingredients'));
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
            $checkExist = Ingredient::where('code', $request->get('code'))->count();
            
            if ($checkExist > 0) {
                $errors = ["Code exists"];
                return response()->json(compact(['errors']), 422);
            }
            $ingredient = new Ingredient();
            $ingredient->code = $request->get('code');
            $ingredient->name = $request->get('name');
            $ingredient->inactive = $request->get('inactive');
            $response = $ingredient->save();
            
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
                'inactive' => 'required',
            ]);

            if ($validator->fails()) {
                $errors = $validator->errors()->all();
                return response()->json(compact(['errors']), 422);
            }
            $checkExist = Ingredient::where('code', $request->get('code'))->where('id', '<>', $request->get('id'))->count();
            
            if ($checkExist > 0) {
                $errors = ["Code exists"];
                return response()->json(compact(['errors']), 422);
            }
            
            $id = $request->get('id');
            $item = Ingredient::find($id);
            if ($item) {
                $response = Ingredient::where('id', $id)->update([
                    'code' => $request->get('code'),
                    'name'=> $request->get('name'),
                    'inactive' => $request->get('inactive'),
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
            $item = Ingredient::find($id);
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
