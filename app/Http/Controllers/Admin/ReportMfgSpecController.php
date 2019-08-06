<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Model\Ingredient;
use App\Model\CustomRequest;
use Validator;
use Auth;
use App\Model\ReportFormula;
use App\Model\SalesOrderComments;
use App\Model\FormulaIngredients;

class ReportMfgSpecController
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
        $this->pageName = 'Report Mfg Spec';
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

        return view('admin.report-mfgspec.index', compact('pageName', 'data'));
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
            $reportFormula = ReportFormula::where('customrequest_id', $id)->orderBy('created_at', 'desc')->first();
            $comments = SalesOrderComments::where('customrequest_id', $id)->get();
            $formulaIngredientsActive = FormulaIngredients::where('reportformula_id', $reportFormula['id'])->where('inactive', 0)->get();
            $formulaIngredientsInActive = FormulaIngredients::where('reportformula_id', $reportFormula['id'])->where('inactive', 1)->get();
            $result = [
                'customRequest' => $customRequest,
                'manufature' => $customRequest->manufature,
                'comments' => $comments,
                'reportFormula' => $reportFormula,
                'ingredientsActive' => $formulaIngredientsActive,
                'ingredientsInActive' => $formulaIngredientsInActive,
            ]; 

            return response()->json($result);

            $status = 'error';

            return response()->json(compact(['status']), 500);
        } 
    } 
}
