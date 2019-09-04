<?php

namespace App\Http\Controllers\Admin;

use App\Model\BasicInspection;
use Illuminate\Http\Request;
use App\Model\Ingredient;
use App\Model\CustomRequest;
use Validator;
use Auth;
use App\Model\ReportQuotation;
use App\Model\FormulaIngredients;
use App\Model\InspectionWorker;
use App\Model\ReportFormula;
use App\Model\ReportInspection;
use App\Model\SalesOrderComments;

class ReportInspectionController
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
        $this->pageName = 'Inspection';
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

        return view('admin.report-inspection.index', compact('pageName', 'data'));
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
            $report = new ReportInspection();
            $report->customrequest_id = $request->get('idCustomRequest');
            $report->batch_no = $request->get('batchNo');
            $report->personel = $request->get('personel');
            $report->qcpersonel = $request->get('qcPersonel');
            $response = $report->save();
            
            $listInspections = json_decode($request->get('listInspections'));

            foreach ($listInspections as $value) {
                $cost = new BasicInspection();
                $cost->reportinspection_id = $report->id;
                $cost->content = $value->comment;
                $cost->save();
            }
            $inspectionWorker = json_decode($request->get('inspectionWorker'));

            foreach ($inspectionWorker as $value) {
                $worker = new InspectionWorker();
                $worker->reportcost_id = $report->id;
                $worker->rack_no = $value->rackNo;
                $worker->inspection_worker = $value->inspectionWorker;
                $worker->date = $value->date;
                $worker->time = $value->time;
                $worker->ck_by = $value->ckBy;
                $worker->comments = $value->comments;
                $worker->IPC = $value->IPC;
                $worker->cost = $value->cost;
                $worker->save();
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
            $reportFormula = ReportFormula::where('customrequest_id', $id)->orderBy('created_at', 'desc')->first();
            $reportInspection = ReportInspection::where('customrequest_id',  $id)->orderBy('created_at', 'desc')->first();
            $comments = [];
            $inspectionWorker = [];

            if ($reportInspection) {
                $comments = BasicInspection::where('reportinspection_id', $reportInspection->id)->get();
                $inspectionWorker = InspectionWorker::where('reportinspection_id', $reportInspection->id)->get();
            }

            $result = [
                'customRequest' => $customRequest,
                'manufature' => $customRequest->manufature,
                'reportFormula' => $reportFormula,
                'reportInspection' => $reportInspection,
                'comments' => $comments,
                'inspectionWorker' => $inspectionWorker
            ]; 

            return response()->json($result);

            $status = 'error';

            return response()->json(compact(['status']), 500);
        } 
    } 
}
