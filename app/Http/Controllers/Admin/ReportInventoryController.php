<?php

namespace App\Http\Controllers\Admin;

use App\Model\CostHardcapsule;
use App\Model\CostIngredients;
use App\Model\CostLabor;
use App\Model\CostLaborBottles;
use App\Model\CostTypeBottles;
use Illuminate\Http\Request;
use App\Model\Ingredient;
use App\Model\CustomRequest;
use Validator;
use Auth;
use App\Model\ReportFormula;
use App\Model\SalesOrderComments;
use App\Model\FormulaIngredients;
use App\Model\InventoryIngredients;
use App\Model\ReportCost;
use App\Model\ReportInventory;

class ReportInventoryController
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
        $this->pageName = 'Report Inventory';
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

        return view('admin.report-inventory.index', compact('pageName', 'data'));
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
            $reportCost = new ReportInventory();
            $reportCost->customrequest_id = $request->get('idCustomRequest');
            $reportCost->batch_no = $request->get('batchNo');
            $response = $reportCost->save();
            $arrIngredients = json_decode($request->get('listIngredient'));

            foreach ($arrIngredients as $value) {
                $costIngredients = new InventoryIngredients();
                $costIngredients->reportinventory_id = intval($reportCost->id);
                $costIngredients->ingredient_id = intval($value->ingredient_id);
                $costIngredients->code = $value->code;
                $costIngredients->name_ingredient = $value->name_ingredient;
                $costIngredients->inactive = $value->inactive;
                $costIngredients->per_batch = $value->per_batch;
                $costIngredients->in_stock = $value->in_stock;
                $costIngredients->lot = $value->lot;
                $costIngredients->purchased = $value->purchased;
                $costIngredients->checked = $value->checked;
                $costIngredients->save();
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
            $inventory = ReportInventory::where('customrequest_id',  $id)->orderBy('created_at', 'desc')->first();
            $reportFormula = ReportFormula::where('customrequest_id', $id)->orderBy('created_at', 'desc')->first();
            $isEmpty = false;

            if ($inventory) {
                $formulaIngredientsActive = InventoryIngredients::where('reportinventory_id', $inventory['id'])->where('inactive', 0)->get();
                $formulaIngredientsInActive = InventoryIngredients::where('reportinventory_id', $inventory['id'])->where('inactive', 1)->get();
                $formulaIngredientsColor = InventoryIngredients::where('reportinventory_id', $inventory['id'])->where('inactive', 2)->get();
                $formulaIngredientsShell = InventoryIngredients::where('reportinventory_id', $inventory['id'])->where('inactive', 3)->get();
                
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
            ]; 
           

            return response()->json($result);

            $status = 'error';

            return response()->json(compact(['status']), 500);
        } 
    } 
}
