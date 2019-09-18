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
use App\Model\MixingAss;
use App\Model\MixingIngredients;
use App\Model\ReportCost;
use App\Model\ReportMixing;

class ReportMixingController
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
        $this->pageName = 'Report Mixing';
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

        return view('admin.report-mixing.index', compact('pageName', 'data'));
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
            $reportCost = new ReportMixing();
            $reportCost->customrequest_id = $request->get('idCustomRequest');
            $reportCost->batch_no = $request->get('batch_no');
            $reportCost->personnel = $request->get('personnel');
            $reportCost->ipc_person = $request->get('ipc_person');
            $reportCost->weighing_person = $request->get('weighing_person');
            $reportCost->blendling_person = $request->get('blendling_person');
            $reportCost->line_clear = $request->get('line_clear');
            $reportCost->ipc = $request->get('ipc');
            $response = $reportCost->save();
            $arrIngredients = json_decode($request->get('listIngredient'));

            foreach ($arrIngredients as $value) {
                $costIngredients = new MixingIngredients();
                $costIngredients->reportmixing_id = intval($reportCost->id);
                $costIngredients->ingredient_id = intval($value->ingredient_id);
                $costIngredients->code = $value->code;
                $costIngredients->name_ingredient = $value->name_ingredient;
                $costIngredients->inactive = intval($value->inactive);
                $costIngredients->per_batch = $value->per_batch;
                $costIngredients->wt_amt = $value->wt_amt;
                $costIngredients->lot_no = $value->lot_no;
                $costIngredients->wt_by = $value->wt_by;
                $costIngredients->save();
            }
            $listAss = json_decode($request->get('listAss'));

            foreach ($listAss as $value) {
                $costHardcapsule = new MixingAss();
                $costHardcapsule->reportmixing_id = intval($reportCost->id);
                $costHardcapsule->name = $value->name;
                $costHardcapsule->labor_name = $value->labor_name;
                $costHardcapsule->time_in = $value->time_in;
                $costHardcapsule->time_out = $value->time_out;
                $costHardcapsule->record = $value->record;
                $costHardcapsule->cost_per_hour = $value->cost_per_hour;
                $costHardcapsule->labor_cost = $value->labor_cost;
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
            $mixing = ReportMixing::where('customrequest_id',  $id)->orderBy('created_at', 'desc')->first();
            $reportFormula = ReportFormula::where('customrequest_id', $id)->orderBy('created_at', 'desc')->first();
            $isEmpty = false;
            $listAss= [];

            if ($mixing) {
                $formulaIngredientsActive = MixingIngredients::where('reportmixing_id', $mixing['id'])->where('inactive', 0)->get();
                $formulaIngredientsInActive = MixingIngredients::where('reportmixing_id', $mixing['id'])->where('inactive', 1)->get();
                $formulaIngredientsColor = MixingIngredients::where('reportmixing_id', $mixing['id'])->where('inactive', 2)->get();
                $formulaIngredientsShell = MixingIngredients::where('reportmixing_id', $mixing['id'])->where('inactive', 3)->get();
                $listAss = MixingAss::where('reportmixing_id', $mixing['id'])->get();
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
                'reportMixing' => $mixing,
                'listAss' => $listAss,
            ]; 
           

            return response()->json($result);

            $status = 'error';

            return response()->json(compact(['status']), 500);
        } 
    } 
}
