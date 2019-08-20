<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Model\Ingredient;
use App\Model\CustomRequest;
use Validator;
use Auth;
use App\Model\ReportQuotation;
use App\Model\FormulaIngredients;
use App\Model\ReportFormula;
use App\Model\SalesOrderComments;

class ReportQuotationController
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
        $this->pageName = 'Report Quotation';
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

        return view('admin.report-quotation.index', compact('pageName', 'data'));
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
            $report = new ReportQuotation();
            $report->customrequest_id = $request->get('idCustomRequest');
            $report->price = $request->get('price');
            $report->packing = $request->get('packing');
            $report->paper_big_box = $request->get('paperBigBox');
            $report->deposit = $request->get('deposit');
            $response = $report->save();
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
            $reportFormula = ReportFormula::where('customrequest_id', $id)->orderBy('created_at', 'desc')->first();
            $comments = SalesOrderComments::where('customrequest_id', $id)->get();
            $formulaIngredientsActive = FormulaIngredients::where('reportformula_id', $reportFormula['id'])->where('inactive', 0)->get();
            $formulaIngredientsInActive = FormulaIngredients::where('reportformula_id', $reportFormula['id'])->where('inactive', 1)->get();
            $quotation = ReportQuotation::where('customrequest_id',  $id)->orderBy('created_at', 'desc')->first();

            $result = [
                'customRequest' => $customRequest,
                'manufature' => $customRequest->manufature,
                'comments' => $comments,
                'reportFormula' => $reportFormula,
                'ingredientsActive' => $formulaIngredientsActive,
                'ingredientsInActive' => $formulaIngredientsInActive,
                'quotation' => $quotation,
            ]; 

            return response()->json($result);

            $status = 'error';

            return response()->json(compact(['status']), 500);
        } 
    } 
}
