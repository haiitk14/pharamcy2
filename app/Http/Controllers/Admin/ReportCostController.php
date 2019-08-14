<?php

namespace App\Http\Controllers\Admin;

use App\Model\CostHardcapsule;
use App\Model\CostIngredients;
use Illuminate\Http\Request;
use App\Model\Ingredient;
use App\Model\CustomRequest;
use Validator;
use Auth;
use App\Model\ReportFormula;
use App\Model\SalesOrderComments;
use App\Model\FormulaIngredients;
use App\Model\ReportCost;

class ReportCostController
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
        $this->pageName = 'Report Cost';
    }

	/**
     * Show index page
     *
     * @return View
     */
    public function index()
    {
        $pageName = $this->pageName;
        $customRequests = CustomRequest::orderBy('created_at', 'desc')->get();
        $data = [
            'customRequests' => $customRequests,
        ];

        return view('admin.report-cost.index', compact('pageName', 'data'));
    }
    public function saveForm(Request $request) 
    {
        if ($request->ajax()) {
            $input = $request->all();
            
            $validator = Validator::make($input, [
                'idCustomRequest' => 'required',
            ]);

            if ($validator->fails()) {
                $errors = $validator->errors()->all();
                return response()->json(compact(['errors']), 422);
            }
            $reportCost = new ReportCost();
            $reportCost->customrequest_id = $request->get('idCustomRequest');
            $reportCost->po = $request->get('po');
            $reportCost->batch_no = $request->get('batch_no');
            $reportCost->sum_price_per_batch_color = $request->get('sumPricePerBatchColor');
            $reportCost->sum_price_per_batch_shell = $request->get('sumPricePerBatchShell');
            $reportCost->sum_price_per_batch_inactive = $request->get('sumPricePerBatchInActive');
            $reportCost->sum_num3_hardcapsule = $request->get('sumNum3Hardcapsule');
            $reportCost->sum_amount_labor = $request->get('sumAmountLabor');

            $reportCost->sum_cost1000 = $request->get('sumCost1000');
            $reportCost->sum_amount_cost = $request->get('sumAmountCost');
            $reportCost->sum_amount_labor_bottles = $request->get('sumAmountLaborBottles');
            $reportCost->sum_num1_type_bottles = $request->get('sumNum1TypeBottles');
            $reportCost->sum_num2_type_bottles = $request->get('sumNum2TypeBottles');
            $reportCost->sum_num3_type_bottles = $request->get('sumNum3TypeBottles');

            $response = $reportCost->save();
            $arrIngredients = json_decode($request->get('listIngredient'));

            foreach ($arrIngredients as $value) {
                $costIngredients = new CostIngredients();
                $costIngredients->reportcost_id = intval($reportCost->id);
                $costIngredients->ingredient_id = intval($value->ingredient_id);
                $costIngredients->code = $value->code;
                $costIngredients->name_ingredient = $value->name_ingredient;
                $costIngredients->inactive = intval($value->inactive);
                $costIngredients->per_unit = $value->per_unit;
                $costIngredients->per_batch = $value->per_batch;
                $costIngredients->price_per_kg = $value->price_per_kg;
                $costIngredients->price_per_batch = $value->price_per_batch;
                $costIngredients->reportformula_id = $value->reportformula_id;
                $costIngredients->save();
            }
            $arrHardcapsule = json_decode($request->get('listHardcapsule'));

            foreach ($arrHardcapsule as $value) {
                $costHardcapsule = new CostHardcapsule();
                $costHardcapsule->reportcost_id = intval($reportCost->id);
                $costHardcapsule->name = $value->name;
                $costHardcapsule->num1 = $value->num1;
                $costHardcapsule->num2 = $value->num2;
                $costHardcapsule->num3 = $value->num3;
                $costHardcapsule->size_type = $value->size_type;
                $costHardcapsule->save();
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
    public function getReportFormula(Request $request)
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
            $cost = ReportCost::where('customrequest_id',  $id)->orderBy('created_at', 'desc')->first();
            $reportFormula = ReportFormula::where('customrequest_id', $id)->orderBy('created_at', 'desc')->first();
            $isEmpty = false;
            $costHardcapsule = null;

            if ($cost) {
                $formulaIngredientsActive = CostIngredients::where('reportcost_id', $cost['id'])->where('inactive', 0)->get();
                $formulaIngredientsInActive = CostIngredients::where('reportcost_id', $cost['id'])->where('inactive', 1)->get();
                $formulaIngredientsColor = CostIngredients::where('reportcost_id', $cost['id'])->where('inactive', 2)->get();
                $formulaIngredientsShell = CostIngredients::where('reportcost_id', $cost['id'])->where('inactive', 3)->get();
                $costHardcapsule = CostHardcapsule::where('reportcost_id', $cost['id'])->get();
            } else {
                $formulaIngredientsActive = FormulaIngredients::where('reportformula_id', $reportFormula['id'])->where('inactive', 0)->get();
                $formulaIngredientsInActive = FormulaIngredients::where('reportformula_id', $reportFormula['id'])->where('inactive', 1)->get();
                $formulaIngredientsColor = FormulaIngredients::where('reportformula_id', $reportFormula['id'])->where('inactive', 2)->get();
                $formulaIngredientsShell = FormulaIngredients::where('reportformula_id', $reportFormula['id'])->where('inactive', 3)->get();
                $isEmpty = true;
            }
            $result = [
                'isEmpty' => $isEmpty,
                'customRequest' => $customRequest,
                'manufature' => $customRequest->manufature,
                'reportFormula' => $reportFormula,
                'ingredientsActive' => $formulaIngredientsActive,
                'ingredientsInActive' => $formulaIngredientsInActive,
                'ingredientsColor' => $formulaIngredientsColor,
                'ingredientsShell' => $formulaIngredientsShell,
                'reportCost' => $cost,
                'costHardcapsule' => $costHardcapsule,
            ]; 
           

            return response()->json($result);

            $status = 'error';

            return response()->json(compact(['status']), 500);
        } 
    } 
}
