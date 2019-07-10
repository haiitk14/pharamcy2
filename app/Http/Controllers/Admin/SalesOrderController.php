<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Product;
use App\Model\Customer;
use App\Model\Formula;
use App\Model\Ingredient;

class SalesOrderController
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
        $this->pageName = 'Sales Order';
    }

	/**
     * Show index page
     *
     * @return View
     */
    public function index()
    {
        $pageName = $this->pageName;
        $ingredients = Ingredient::where('is_delete', 0)->get();

        $data = [
            'products' => Product::where('is_delete', 0)->get(),
            'customers' => Customer::where('is_delete', 0)->get(),
            'formulas' => Formula::where('is_delete', 0)->get(),
            'ingredients' => [
                'inactive' => $ingredients->where('inactive', 0),
                'active' => $ingredients->where('inactive', 1),
            ],
        ];


        return view('admin.salesorder.index', compact('pageName', 'data'));
    }
}
