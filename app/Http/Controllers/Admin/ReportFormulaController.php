<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Model\Ingredient;
use App\Model\CustomRequest;
use Validator;
use App\Model\SalesOrderIngredients;
use Auth;
use App\Model\ReportFormula;
use App\Model\FormulaIngredients;

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
        // $customRequests = CustomRequest::where('create_by', Auth::user()->id)->orderBy('created_at', 'desc')->get();
        $customRequests = CustomRequest::orderBy('created_at', 'desc')->get();
        $ingredients = Ingredient::where('is_delete', 0)->get();

        // $salesOrderIngredients = $customRequest != null ?  SalesOrderIngredients::where('customrequest_id', $customRequest->id)->orderBy('created_at', 'asc')->get() : null;
        $data = [
            'customRequests' => $customRequests,
            'salesOrderIngredients' => null,
            'customRequest' => null,
            'ingredients' => $ingredients
        ];

        return view('admin.report-formula.index', compact('pageName', 'data'));
    }

    public function saveForm(Request $request) 
    {
        if ($request->ajax()) {
            $input = $request->all();
            
            $validator = Validator::make($input, [
                'idCustomRequest' => 'required',
                'servingSize' => 'required',
            ]);

            if ($validator->fails()) {
                $errors = $validator->errors()->all();
                return response()->json(compact(['errors']), 422);
            }
            $reportFormula = new ReportFormula();
            $reportFormula->customrequest_id = $request->get('idCustomRequest');
            $reportFormula->po = $request->get('po');
            $reportFormula->serving_size = $request->get('servingSize');
            $reportFormula->gelatin_batch = $request->get('gelatinBatch');

            $response = $reportFormula->save();
            $arrIngredients = json_decode($request->get('arrIngredients'));

            foreach ($arrIngredients as $value) {
                $formulaIngredients = new FormulaIngredients();
                $formulaIngredients->reportformula_id = intval($reportFormula->id);
                $formulaIngredients->ingredient_id = intval($value->ingredient_id);
                $formulaIngredients->code = $value->code;
                $formulaIngredients->name_ingredient = $value->name_ingredient;
                $formulaIngredients->inactive = intval($value->inactive);
                $formulaIngredients->per_serving = doubleval($value->per_serving);
                $formulaIngredients->per_unit = doubleval($value->per_unit);
                $formulaIngredients->purity = doubleval($value->purity);
                $formulaIngredients->overage = doubleval($value->overage);
                $formulaIngredients->per_tab = doubleval($value->per_tab);
                $formulaIngredients->per_batch = doubleval($value->per_batch);
                $formulaIngredients->tab100 = doubleval($value->tab100);
                $formulaIngredients->save();
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
                $value['inactive'] = $value->ingredient->inactive;
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
