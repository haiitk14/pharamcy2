<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Model\Ingredient;
use App\Model\CustomRequest;
use Validator;
use Auth;

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
}
