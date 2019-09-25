@extends('admin.layout.master')

@section('content')
<div class="container-fluid">
	@include('admin.partials.breadcrumb')
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
            <div class="card mb-3">
                <div class="card-body">
                    <div class="text-left form-group col-xl-12">
                        {{-- <button class="btn btn-outline-primary" id="print" title="Print" type="button">
                            <i class="fa fa-print" aria-hidden="true"></i>
                            {{ __('Print') }}
                        </button> --}}
                        <button data-bind="click: save" class="btn btn-outline-primary" title="Save Form" type="button">
                            <i class="fa fa-save" aria-hidden="true"></i>
                            {{ __('Save') }}
                        </button>
                    </div>
                    <form id="formcustomrequest">
                        <div class="row form-group">
                            <label for="address" class="col-sm-2 col-form-label">Select Formula</label>
                            <div class="col-sm-6">
                                <select class="form-control" title="Select Custom Request" name="custom_request" title="{{ __('Select Custom Request') }}">
                                    <option value="">{{ __('None') }}</option>
                                    @foreach ($data['customRequests'] as $customRequest)
                                    <option value="{{ $customRequest->id }}">{{ Auth::user()->username }}{{ $customRequest->formula_number }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </form>
                    <form id="dataview" class="d-none">
                        <div class="row form-group">
                            <div class="col-sm-6">
                                <b data-bind="text: manufature.name"></b><br>
                                <span data-bind="text: manufature.address"></span>
                                <br> <span data-bind="text: manufature.phone"></span>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-sm-12 text-center">
                            <h4>Quotation</h4>
                            </div>
                        </div>
                        <div class="row form-group">
                            <label for="address" class="col-sm-2 col-form-label">1. Product:</label>
                            <div class="col-sm-8 col-form-label" data-bind="text: customRequest.product" ></div>
                        </div>
                        <div class="row form-group">
                            <label for="address" class="col-sm-2 col-form-label">2. Customer:</label>
                            <div class="col-sm-8 col-form-label" data-bind="text: customRequest.customer">
                            </div>
                        </div>
                        <div class="row form-group">
                            <label for="po" class="col-sm-2 col-form-label">3. P.O: </label>
                            <div class="col-sm-4">
                                <input type="text" data-bind="value: reportFormula.po" title="Enter P.O" placeholder="Enter P.O" class="form-control">
                            </div>
                        </div>
                        <div class="row form-group">
                            <label for="address" class="col-sm-2 col-form-label">4. Formula:</label>
                            <div class="col-sm-8 col-form-label" data-bind="text: customRequest.formula_number">
                            </div>
                        </div>
                        <div class="row form-group">
                            <label for="address" class="col-sm-2 col-form-label">5. Revision:</label>
                            <div class="col-sm-8 col-form-label" data-bind="text: customRequest.revision">
                            </div>
                        </div>
                        <div class="row form-group">
                            <label for="address" class="col-sm-2 col-form-label">6. Date:</label>
                            <div class="col-sm-8 col-form-label" data-bind="text: moment(customRequest.date()).format('MM/DD/YYYY')">
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-sm-12 ">
                            <h4>Softgel Specification</h4>
                            </div>
                        </div>
                        <div class="row form-group">
                            <label for="address" class="col-sm-2 col-form-label">7. Size/Type:</label>
                            <div class="col-sm-8 col-form-label" data-bind="text: customRequest.size_type">
                            </div>
                        </div>
                        <div class="row form-group">
                            <label for="address" class="col-sm-2 col-form-label">8. Color/Logo:</label>
                            <div class="col-sm-8 col-form-label" data-bind="text: customRequest.color_logo">
                            </div>
                        </div>
                        <div class="row form-group">
                            <label for="address" class="col-sm-2 col-form-label">9. Filling Wt:</label>
                            <div class="col-sm-4" data-bind="text: reportFormula.filling_wt">
                                {{-- <input type="text" data-bind="value: reportFormula.filling_wt" title="Enter Filling Wt" placeholder="Enter Filling Wt" class="form-control"> --}}
                            </div>
                        </div>
                        <div class="row form-group">
                            <label for="order" class="col-sm-2 col-form-label">10. Batch No.: </label>
                            <div class="col-sm-4">
                                <input type="text" data-bind="value: model.batchNo"  title="Enter Batch No" placeholder="Enter Batch No" class="form-control">
                            </div>
                        </div>
                        <div class="row form-group">
                            <label for="order" class="col-sm-2 col-form-label">11. Batch size: </label>
                            <div class="col-sm-8 col-form-label" > 
                                <span data-bind="text: numeral(customRequest.order()).format('0,0')"></span>  softgels
                            </div>
                        </div>
                        <div class="row form-group">
                            <label for="order" class="col-sm-2 col-form-label"></label>
                            <div class="col-sm-8 col-form-label" > 
                                 <span data-bind="text: numeral((customRequest.order() / 60)).format('0,0.00')"></span>  Box
                            </div>
                        </div>
                        <div class="row form-group">
                            <label for="order" class="col-sm-2 col-form-label"></label>
                            <div class="col-sm-2 col-form-label" >  
                                <input type="text" data-bind="value: model.batchNoBox"  title="Enter Batch No"  class="form-control">
                            </div> softgels/box
                        </div>
                        <div class="row form-group">
                            <div class="col-sm-12 ">
                            <h4>Formulary Specification</h4>
                            </div>
                        </div>
                        <div class="row form-group">
                            <label for="order" class="col-sm-2 col-form-label">12. </label>
                        </div>
                        <div class="row form-group">
                            <div class="col-sm-12 table-responsive">
                                <table class="table table-bordered table-sm">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>RW No.</th>
                                            <th>Ingredients</th>
                                            <th>Input Wt/mg</th>
                                            <th>Input Wt per batch</th>
                                            <th>Price per kg</th>
                                            <th>Price per batch ($)</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr >
                                            <td colspan="7"><b>Color</b></td>
                                        </tr>
                                        <!-- ko foreach: model.dataIngredientsColor -->
                                        <tr>
                                            <td data-bind="text: $index() + 1"></td>
                                            <td data-bind="text: code">
                                            </td>
                                            <td data-bind="text: name_ingredient">
                                            </td>
                                            <td data-bind="text: numeral(per_unit()).format('0,0.00')"> 
                                            </td>
                                            <td data-bind="text: numeral(per_batch()).format('0,0.000')"></td>
                                            <td>
                                                <a href="javascript:;" data-bind="text: numeral(price_per_kg()).format('0,0.00'), click: $root.clickNumber.bind($data, 'price_per_kg')"></a>
                                            </td>
                                            <td data-bind="text: numeral(price_per_batch()).format('0,0.00')">
                                            </td>
                                        </tr>
                                        <!-- /ko -->
                                        <tr>
                                            <td colspan="3"></td>
                                            <td>Total</td>
                                            <td data-bind="text: numeral($root.model.sumPerBatchColor()).format('0,0.000')"></td>
                                            <td></td>
                                            <td data-bind="text: numeral($root.model.sumPricePerBatchColor()).format('0,0.00')"></td>
                                        </tr>
                                    </tbody>
                                    <tbody>
                                        <tr >
                                            <td colspan="7"><b>Shell</b></td>
                                        </tr>
                                        <!-- ko foreach: model.dataIngredientsShell -->
                                        <tr>
                                            <td data-bind="text: $index() + 1"></td>
                                            <td data-bind="text: code">
                                            </td>
                                            <td data-bind="text: name_ingredient">
                                            </td>
                                            <td data-bind="text: numeral(per_unit()).format('0,0.00')"> 
                                            </td>
                                            <td data-bind="text: numeral(per_batch()).format('0,0.000')"></td>
                                            <td>
                                                <a href="javascript:;" data-bind="text: numeral(price_per_kg()).format('0,0.00'), click: $root.clickNumber.bind($data, 'price_per_kg')"></a>
                                            </td>
                                            <td data-bind="text: numeral(price_per_batch()).format('0,0.00')">
                                            </td>
                                        </tr>
                                        <!-- /ko -->
                                        <tr>
                                            <td colspan="3"></td>
                                            <td>Total</td>
                                            <td data-bind="text: numeral($root.model.sumPerBatchShell()).format('0,0.000')"></td>
                                            <td></td>
                                            <td data-bind="text: numeral($root.model.sumPricePerBatchShell()).format('0,0.00')"></td>
                                        </tr>
                                    </tbody>
                                    <tbody>
                                        <tr >
                                            <td colspan="7"><b>Active Ingredients</b></td>
                                        </tr>
                                        <!-- ko foreach: model.dataIngredientsActive -->
                                        <tr>
                                            <td data-bind="text: $index() + 1"></td>
                                            <td data-bind="text: code">
                                            </td>
                                            <td data-bind="text: name_ingredient">
                                            </td>
                                            <td data-bind="text: numeral(per_unit()).format('0,0.00')"> 
                                            </td>
                                            <td data-bind="text: numeral(per_batch()).format('0,0.000')"></td>
                                            <td>
                                                <a href="javascript:;" data-bind="text: numeral(price_per_kg()).format('0,0.00'), click: $root.clickNumber.bind($data, 'price_per_kg')"></a>
                                            </td>
                                            <td data-bind="text: numeral(price_per_batch()).format('0,0.00')">
                                            </td>
                                        </tr>
                                        <!-- /ko -->
                                        <tr >
                                            <td colspan="7"><b>Inactive Ingredients</b></td>
                                        </tr>
                                        <!-- ko foreach: model.dataIngredientsInActive -->
                                        <tr>
                                            <td data-bind="text: $index() + 1"></td>
                                            <td data-bind="text: code">
                                            </td>
                                            <td data-bind="text: name_ingredient">
                                            </td>
                                            <td data-bind="text: numeral(per_unit()).format('0,0.00')"> 
                                            </td>
                                            <td data-bind="text: numeral(per_batch()).format('0,0.000')"></td>
                                            <td>
                                                <a href="javascript:;" data-bind="text: numeral(price_per_kg()).format('0,0.00'), click: $root.clickNumber.bind($data, 'price_per_kg')"></a>
                                            </td>
                                            <td data-bind="text: numeral(price_per_batch()).format('0,0.00')">
                                            </td>
                                        </tr>
                                        <!-- /ko -->
                                        <tr>
                                            <td colspan="5"></td>
                                            <td style="background-color: yellow; color: red"><b>Total</b></td>
                                            <td  data-bind="text: numeral($root.model.sumPricePerBatchInActive()).format('0,0.00')" style="background-color: yellow; color: red; font-weight: bold"></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-sm-12 ">
                                13. <span class="text-danger" style="margin-right: 30px;"><b>Hardcapsule</b></span>
                                <a href="javascript:;" data-bind="click: addHardcapsule" title="Add Hardcapsule" class="btn btn-sm btn-outline-primary"><i class="fa fa-plus"></i> Add</a>
                            
                            </div>
                        </div>
                        <div class="row form-group">
                            <table class="table table-bordered table-sm">
                                <thead>
                                    <tr>
                                        <th></th>
                                        <th>Size</th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <!-- ko foreach: model.dataHardcapsule -->
                                    <tr>
                                        <td>
                                            <a href="javascript:;" data-bind="text: name, click: $root.clickString.bind($data, 'hardcapsule_name')"></a>
                                        </td>
                                        <td>
                                            <a href="javascript:;" data-bind="text: size_type, click: $root.clickString.bind($data, 'hardcapsule_size_type')"></a>
                                        </td>
                                        <td> 
                                            <a href="javascript:;" data-bind="text: num1, click: $root.clickNumber.bind($data, 'hardcapsule_num1')"></a>
                                        </td>
                                        <td>
                                            <a href="javascript:;" data-bind="text: num2, click: $root.clickNumber.bind($data, 'hardcapsule_num2')"></a>
                                        </td>
                                        <td data-bind="text: numeral(num3()).format('0,0.00')">
                                        </td>
                                        <td style="width: 10%" class="text-center">
                                            <a href='javascript:;' data-bind="click: $root.deleteHardcapsule" title='Delete Item'><i class='fa fa-lg fa-trash' aria-hidden='true'></i></a>
                                        </td>
                                    </tr>
                                    <!-- /ko -->
                                    <tr>
                                        <td colspan="3"></td>
                                        <td style="background-color: yellow; color: red"><b>Total</b></td>
                                        <td  data-bind="text: numeral(model.sumNum3Hardcapsule()).format('0,0.00')" style="background-color: yellow; color: red; font-weight: bold"></td>
                                      
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="row form-group">
                            <div class="col-sm-12 ">
                                14. <span class="text-danger" style="margin-right: 30px;"><b>Labor</b></span>
                                <a href="javascript:;" data-bind="click: addLabor" title="Add Labor" class="btn btn-sm btn-outline-primary"><i class="fa fa-plus"></i> Add</a>
                            </div>
                        </div>
                        <div class="row form-group">
                            <table class="table table-bordered table-sm">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Person (s)</th>
                                        <th>Process</th>
                                        <th>Hour</th>
                                        <th>Cost</th>
                                        <th>Amount</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <!-- ko foreach: model.dataLabor -->
                                    <tr>
                                        <td data-bind="text: $index() + 1"></td>
                                        <td>
                                            <a href="javascript:;" data-bind="text: person, click: $root.clickNumber.bind($data, 'labor_person')"></a>
                                        </td>
                                        <td>
                                            <a href="javascript:;" data-bind="text: process, click: $root.clickString.bind($data, 'labor_process')"></a>
                                        </td>
                                        <td> 
                                            <a href="javascript:;" data-bind="text: hour, click: $root.clickNumber.bind($data, 'labor_hour')"></a>
                                        </td>
                                        <td>
                                            <a href="javascript:;" data-bind="text: cost, click: $root.clickNumber.bind($data, 'labor_cost')"></a>
                                        </td>
                                        <td data-bind="text: amount">
                                        </td>
                                        <td class="text-center">
                                            <a href='javascript:;' data-bind="click: $root.deleteLabor" title='Delete Item'><i class='fa fa-lg fa-trash' aria-hidden='true'></i></a>
                                        </td>
                                    </tr>
                                    <!-- /ko -->
                                    <tr>
                                        <td colspan="4"></td>
                                        <td style="background-color: yellow; color: red"><b>Total</b></td>
                                        <td style="background-color: yellow; color: red; font-weight: bold" data-bind="text: numeral(model.sumAmountLabor()).format('0,0.00')"></td>
                                      
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="row form-group">
                            <div class="col-sm-12 ">
                                15. 
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="table-responsive">
                                <table class="table table-bordered table-sm">
                                    <thead>
                                        <tr class="text-danger">
                                            <th  width="10%"></th>
                                            <th width="15%"></th>
                                            <th></th>
                                            <th style="background-color: yellow; color: red">Cost/1000</th>
                                            <th data-bind="text: cost.c25 + '%'"></th>
                                            <th data-bind="text: cost.c30 + '%'"></th>
                                            <th data-bind="text: cost.c35 + '%'"></th>
                                            <th data-bind="text: cost.c40 + '%'"></th>
                                            <th data-bind="text: cost.c50 + '%'"></th>
                                            <th data-bind="text: cost.c60 + '%'"></th>
                                            <th data-bind="text: cost.c70 + '%'"></th>
                                            <th data-bind="text: cost.c80 + '%'"></th>
                                            <th data-bind="text: cost.c90 + '%'"></th>
                                            <th data-bind="text: cost.c100 + '%'"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr data-bind="if: model.dataCost()[0]">
                                            <td rowspan="2">Bulk</td>
                                            <td>Capsule + RW</td>
                                            <td data-bind="text: numeral(model.dataCost()[0].num1()).format('0,0.00')"></td>
                                            <td data-bind="text: numeral(model.dataCost()[0].num2()).format('0,0.00')"></td>
                                            <td data-bind="text: numeral(model.dataCost()[0].c25()).format('0,0.00')"></td>
                                            <td data-bind="text: numeral(model.dataCost()[0].c30()).format('0,0.00')"></td>
                                            <td data-bind="text: numeral(model.dataCost()[0].c35()).format('0,0.00')"></td>
                                            <td data-bind="text: numeral(model.dataCost()[0].c40()).format('0,0.00')"></td>
                                            <td data-bind="text: numeral(model.dataCost()[0].c50()).format('0,0.00')"></td>
                                            <td data-bind="text: numeral(model.dataCost()[0].c60()).format('0,0.00')"></td>
                                            <td data-bind="text: numeral(model.dataCost()[0].c70()).format('0,0.00')"></td>
                                            <td data-bind="text: numeral(model.dataCost()[0].c80()).format('0,0.00')"></td>
                                            <td data-bind="text: numeral(model.dataCost()[0].c90()).format('0,0.00')"></td>
                                            <td data-bind="text: numeral(model.dataCost()[0].c100()).format('0,0.00')"></td>
                                        </tr>
                                        <tr data-bind="if: model.dataCost()[1]">
                                            <td>Labor</td>
                                            <td data-bind="text: numeral(model.dataCost()[1].num1()).format('0,0.00')"></td>
                                            <td data-bind="text: numeral(model.dataCost()[1].num2()).format('0,0.00')"></td>
                                            <td data-bind="text: numeral(model.dataCost()[1].c25()).format('0,0.00')"></td>
                                            <td data-bind="text: numeral(model.dataCost()[1].c30()).format('0,0.00')"></td>
                                            <td data-bind="text: numeral(model.dataCost()[1].c35()).format('0,0.00')"></td>
                                            <td data-bind="text: numeral(model.dataCost()[1].c40()).format('0,0.00')"></td>
                                            <td data-bind="text: numeral(model.dataCost()[1].c50()).format('0,0.00')"></td>
                                            <td data-bind="text: numeral(model.dataCost()[1].c60()).format('0,0.00')"></td>
                                            <td data-bind="text: numeral(model.dataCost()[1].c70()).format('0,0.00')"></td>
                                            <td data-bind="text: numeral(model.dataCost()[1].c80()).format('0,0.00')"></td>
                                            <td data-bind="text: numeral(model.dataCost()[1].c90()).format('0,0.00')"></td>
                                            <td data-bind="text: numeral(model.dataCost()[1].c100()).format('0,0.00')"></td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td colspan="2" style="background-color: yellow; color: red"><b>Total : (Cost/1000)</b></td>
                                            <td  colspan="2" data-bind="text: numeral(model.sumCost1000()).format('0,0.00')" style="background-color: yellow; color: red; font-weight: bold"></td>
                                        
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td colspan="2" style="background-color: #0f9df7;"><b>Amount</b></td>
                                            <td colspan="2" data-bind="text: numeral(model.sumAmountCost()).format('0,0.00')" style="background-color: #0f9df7; color: red; font-weight: bold"></td>
                                        
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-sm-12 ">
                                16. <span class="text-danger" style="margin-right: 30px;"><b>Labor (Bottles)</b></span>
                                <a href="javascript:;" data-bind="click: addLaborBottles" title="Add Labor Bottles" class="btn btn-sm btn-outline-primary"><i class="fa fa-plus"></i> Add</a>
                            </div>
                        </div>
                        <div class="row form-group">
                            <table class="table table-bordered table-sm">
                                <thead>
                                    <tr>
                                        <th>Person (s)</th>
                                        <th>Process</th>
                                        <th>Hour</th>
                                        <th>Cost</th>
                                        <th>Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <!-- ko foreach: model.dataLaborBottles -->
                                    <tr>
                                        <td>
                                            <a href="javascript:;" data-bind="text: person, click: $root.clickNumber.bind($data, 'labor_person')"></a>
                                        </td>
                                        <td>
                                            <a href="javascript:;" data-bind="text: process, click: $root.clickString.bind($data, 'labor_process')"></a>
                                        </td>
                                        <td> 
                                            <a href="javascript:;" data-bind="text: hour, click: $root.clickNumber.bind($data, 'labor_hour')"></a>
                                        </td>
                                        <td>
                                            <a href="javascript:;" data-bind="text: cost, click: $root.clickNumber.bind($data, 'labor_cost')"></a>
                                        </td>
                                        <td data-bind="text: numeral(total()).format('0,0')">
                                        </td>
                                        <td class="text-center">
                                            <a href='javascript:;' data-bind="click: $root.deleteLaborBottles" title='Delete Item'><i class='fa fa-lg fa-trash' aria-hidden='true'></i></a>
                                        </td>
                                    </tr>
                                    <!-- /ko -->
                                    <tr>
                                        <td colspan="3"></td>
                                        <td style="background-color: yellow; color: red"><b>Total</b></td>
                                        <td  data-bind="text: numeral(model.sumAmountLaborBottles()).format('0,0.00')" style="background-color: yellow; color: red; font-weight: bold"></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="row form-group">
                            <div class="col-sm-12 ">
                                17. 
                                <a href="javascript:;" data-bind="click: addTypeBottles" title="Add Type Bottle" class="btn btn-sm btn-outline-primary"><i class="fa fa-plus"></i> Add</a>
                            </div>
                        </div>
                        <div class="row form-group">
                            <table class="table table-bordered table-sm">
                                <tbody>
                                    <!-- ko foreach: model.dataTypeBottles -->
                                    <tr>
                                        <td>
                                            <a href="javascript:;" data-bind="text: name1, click: $root.clickString.bind($data, 'typeBottles_name1')"></a>
                                        </td>
                                        <td>
                                            <a href="javascript:;" data-bind="text: numeral(num1()).format('0,0.000'), click: $root.clickNumber.bind($data, 'typeBottles_num1')"></a>
                                        </td>
                                        <td> 
                                            <a href="javascript:;" data-bind="text: name2, click: $root.clickString.bind($data, 'typeBottles_name2')"></a>
                                        </td>
                                        <td>
                                            <a href="javascript:;" data-bind="text: numeral(num2()).format('0,0.000'), click: $root.clickNumber.bind($data, 'typeBottles_num2')"></a>
                                        </td>
                                        <td> 
                                            <a href="javascript:;" data-bind="text: name3, click: $root.clickString.bind($data, 'typeBottles_name3')"></a>
                                        </td>
                                        <td>
                                            <a href="javascript:;" data-bind="text: numeral(num3()).format('0,0.000'), click: $root.clickNumber.bind($data, 'typeBottles_num3')"></a>
                                        </td>
                                        <td class="text-center">
                                            <a href='javascript:;' data-bind="click: $root.deleteTypeBottles" title='Delete Item'><i class='fa fa-lg fa-trash' aria-hidden='true'></i></a>
                                        </td>
                                    </tr>
                                    <!-- /ko -->
                                    <tr>
                                        <td style="background-color: yellow; color: red"><b>Total</b></td>
                                        <td  data-bind="text: numeral(model.sumNum1TypeBottles()).format('0,0.00')" style="background-color: yellow; color: red; font-weight: bold"></td>
                                        <td style="background-color: yellow; color: red"><b>Total</b></td>
                                        <td  data-bind="text: numeral(model.sumNum2TypeBottles()).format('0,0.00')" style="background-color: yellow; color: red; font-weight: bold"></td>
                                        <td style="background-color: yellow; color: red"><b>Total</b></td>
                                        <td  data-bind="text: numeral(model.sumNum3TypeBottles()).format('0,0.00')" style="background-color: yellow; color: red; font-weight: bold"></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="row form-group">
                            <div class="col-sm-12 ">
                                18. 
                            </div>
                        </div>
                        <div class="row form-group">
                            <table class="table table-bordered table-sm">
                                <thead>
                                    <tr>
                                        <th></th>
                                        <th></th>
                                        <th>Price</th>
                                        <th>Qty (boxes)</th>
                                        <th></th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr data-bind="if: model.dataPriceTypeBottles()[0]">
                                        <th>Bottle 30</th>
                                        <th>100cc</th>
                                        <td data-bind="text: numeral(model.dataPriceTypeBottles()[0].price()).format('0,0.0000')"></td>
                                        <td data-bind="text: numeral(model.dataPriceTypeBottles()[0].qty()).format('0,0.00')"></td>
                                        <td data-bind="text: numeral(model.dataPriceTypeBottles()[0].num1()).format('0,0.00')" style="color: red"></td>
                                        <td data-bind="text: numeral(model.dataPriceTypeBottles()[0].num2()).format('0,0.00')" style="background-color: yellow; color: red"></td>
                                    </tr>
                                    <tr data-bind="if: model.dataPriceTypeBottles()[1]">
                                        <th>Bottle 60</th>
                                        <th>200cc</th>
                                        <td data-bind="text: numeral(model.dataPriceTypeBottles()[1].price()).format('0,0.0000')"></td>
                                        <td data-bind="text: numeral(model.dataPriceTypeBottles()[1].qty()).format('0,0.00')"></td>
                                        <td data-bind="text: numeral(model.dataPriceTypeBottles()[1].num1()).format('0,0.00')" style="color: red"></td>
                                        <td data-bind="text: numeral(model.dataPriceTypeBottles()[1].num2()).format('0,0.00')" style="background-color: yellow; color: red"></td>
                                   </tr>
                                    <tr data-bind="if: model.dataPriceTypeBottles()[2]">
                                        <th>Bottle 90</th>
                                        <th>300cc</th>
                                        <td data-bind="text: numeral(model.dataPriceTypeBottles()[2].price()).format('0,0.0000')"></td>
                                        <td data-bind="text: numeral(model.dataPriceTypeBottles()[2].qty()).format('0,0.00')"></td>
                                        <td data-bind="text: numeral(model.dataPriceTypeBottles()[2].num1()).format('0,0.00')" style="color: red"></td>
                                        <td data-bind="text: numeral(model.dataPriceTypeBottles()[2].num2()).format('0,0.00')" style="background-color: yellow; color: red"></td>
                                   </tr>
                                </tbody>
                            </table>
                        </div>

                        <div class="row form-group">
                            <div class="col-sm-12 ">
                                19. 
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="table-responsive">
                                <table class="table table-bordered table-sm">
                                    <thead>
                                        <tr>
                                            <th width="10%">Cost Estimate</th>
                                            <th width="15%">Cost per bottle</th>
                                            <th data-bind="text: cost.c25 + '%'"></th>
                                            <th data-bind="text: cost.c30 + '%'"></th>
                                            <th data-bind="text: cost.c35 + '%'"></th>
                                            <th data-bind="text: cost.c40 + '%'"></th>
                                            <th data-bind="text: cost.c45 + '%'"></th>
                                            <th data-bind="text: cost.c50 + '%'"></th>
                                            <th data-bind="text: cost.c60 + '%'"></th>
                                            <th data-bind="text: cost.c70 + '%'"></th>
                                            <th data-bind="text: cost.c80 + '%'"></th>
                                            <th data-bind="text: cost.c90 + '%'"></th>
                                            <th data-bind="text: cost.c160 + '%'"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr data-bind="if: model.dataCostEstimate()[0]">
                                            <th>Bottle 30</th>
                                            <th data-bind="text: numeral(model.dataCostEstimate()[0].costPerBottle()).format('0,0.00')"></th>
                                            <td data-bind="text: numeral(model.dataCostEstimate()[0].c25()).format('0,0.00')"></td>
                                            <td data-bind="text: numeral(model.dataCostEstimate()[0].c30()).format('0,0.00')"></td>
                                            <td data-bind="text: numeral(model.dataCostEstimate()[0].c35()).format('0,0.00')"></td>
                                            <td data-bind="text: numeral(model.dataCostEstimate()[0].c40()).format('0,0.00')"></td>
                                            <td data-bind="text: numeral(model.dataCostEstimate()[0].c45()).format('0,0.00')"></td>
                                            <td data-bind="text: numeral(model.dataCostEstimate()[0].c50()).format('0,0.00')"></td>
                                            <td data-bind="text: numeral(model.dataCostEstimate()[0].c60()).format('0,0.00')"></td>
                                            <td data-bind="text: numeral(model.dataCostEstimate()[0].c70()).format('0,0.00')"></td>
                                            <td data-bind="text: numeral(model.dataCostEstimate()[0].c80()).format('0,0.00')"></td>
                                            <td data-bind="text: numeral(model.dataCostEstimate()[0].c90()).format('0,0.00')"></td>
                                            <td data-bind="text: numeral(model.dataCostEstimate()[0].c160()).format('0,0.00')"></td>    
                                        </tr>
                                        <tr data-bind="if: model.dataCostEstimate()[1]">
                                            <th>Bottle 60</th>
                                            <th data-bind="text: numeral(model.dataCostEstimate()[1].costPerBottle()).format('0,0.00')"></th>
                                            <td data-bind="text: numeral(model.dataCostEstimate()[1].c25()).format('0,0.00')"></td>
                                            <td data-bind="text: numeral(model.dataCostEstimate()[1].c30()).format('0,0.00')"></td>
                                            <td data-bind="text: numeral(model.dataCostEstimate()[1].c35()).format('0,0.00')"></td>
                                            <td data-bind="text: numeral(model.dataCostEstimate()[1].c40()).format('0,0.00')"></td>
                                            <td data-bind="text: numeral(model.dataCostEstimate()[1].c45()).format('0,0.00')"></td>
                                            <td data-bind="text: numeral(model.dataCostEstimate()[1].c50()).format('0,0.00')"></td>
                                            <td data-bind="text: numeral(model.dataCostEstimate()[1].c60()).format('0,0.00')"></td>
                                            <td data-bind="text: numeral(model.dataCostEstimate()[1].c70()).format('0,0.00')"></td>
                                            <td data-bind="text: numeral(model.dataCostEstimate()[1].c80()).format('0,0.00')"></td>
                                            <td data-bind="text: numeral(model.dataCostEstimate()[1].c90()).format('0,0.00')"></td>
                                            <td data-bind="text: numeral(model.dataCostEstimate()[1].c160()).format('0,0.00')"></td>     
                                        </tr>
                                        <tr data-bind="if: model.dataCostEstimate()[2]">
                                            <th>Bottle 90</th>
                                            <th data-bind="text: numeral(model.dataCostEstimate()[2].costPerBottle()).format('0,0.00')"></th>
                                            <td data-bind="text: numeral(model.dataCostEstimate()[2].c25()).format('0,0.00')"></td>
                                            <td data-bind="text: numeral(model.dataCostEstimate()[2].c30()).format('0,0.00')"></td>
                                            <td data-bind="text: numeral(model.dataCostEstimate()[2].c35()).format('0,0.00')"></td>
                                            <td data-bind="text: numeral(model.dataCostEstimate()[2].c40()).format('0,0.00')"></td>
                                            <td data-bind="text: numeral(model.dataCostEstimate()[2].c45()).format('0,0.00')"></td>
                                            <td data-bind="text: numeral(model.dataCostEstimate()[2].c50()).format('0,0.00')"></td>
                                            <td data-bind="text: numeral(model.dataCostEstimate()[2].c60()).format('0,0.00')"></td>
                                            <td data-bind="text: numeral(model.dataCostEstimate()[2].c70()).format('0,0.00')"></td>
                                            <td data-bind="text: numeral(model.dataCostEstimate()[2].c80()).format('0,0.00')"></td>
                                            <td data-bind="text: numeral(model.dataCostEstimate()[2].c90()).format('0,0.00')"></td>
                                            <td data-bind="text: numeral(model.dataCostEstimate()[2].c160()).format('0,0.00')"></td>     
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </form>
                    <form id="dataprint"  class="d-none">
                        <div>
                            <div><b data-bind="text: manufature.name"></b></div>
                            <div data-bind="text: manufature.address"></div>
                            <div data-bind="text: manufature.phone"></div>
                        </div>
                        <div style="text-align: center">
                            <h4>Manufacturing Specification</h4>
                        </div>
                        <div>
                            1. Product: <span data-bind="text: customRequest.product"></span>
                        </div>
                        <div >
                            2. Customer:  <span data-bind="text: customRequest.customer"></span>
                        </div>
                        <div >
                            3. P.O: <span data-bind="text: reportFormula.po"></span>
                        </div>
                        <div>
                           4. Formula: <span data-bind="text: customRequest.formula_number"></span>
                        </div>
                        <div>
                            5. Revision: <span data-bind="text: customRequest.revision"></span>
                        </div>
                        <div >
                           6. Date: <span data-bind="text: moment(customRequest.date()).format('MM/DD/YYYY')"></span>
                        </div>
                        <div>
                            <h4>Softgel Specification</h4>
                        </div>
                        <div>
                            7. Size/Type: <span data-bind="text: customRequest.size_type"></span>
                        </div>
                        <div>
                           8. Color/Logo: <span data-bind="text: customRequest.color_logo"></span>
                        </div>
                        <div >
                           9. Filling Wt: <span></span>
                        </div>
                        <div>
                            10. Batch No.: 
                        </div>
                        <div>
                            11. Batch size: <span data-bind="text: numeral(customRequest.order()).format('0,0')"></span>  softgels
                        </div>
                        <div>
                                <span data-bind="text: numeral((customRequest.order() / 60)).format('0,0.00')"></span>  Box
                        </div>
                        <div>
                             <span data-bind="text: model.batchNoBox"></span>  softgels/box
                        </div>
                        <div >
                            <h4>Formulary Specification</h4>
                        </div>
                        <div>
                            12. 
                        </div>
                        <div>
                            <div >
                                <table  style="width: 100%">
                                        <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>RW No.</th>
                                                    <th>Ingredients</th>
                                                    <th>Wt (mg) per Unit</th>
                                                    <th>Input Wt/kg per batch</th>
                                                    <th>%SG</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr >
                                                    <td colspan="6"><b>Active Ingredients</b></td>
                                                </tr>
                                                <!-- ko foreach: model.dataIngredientsActive -->
                                                <tr>
                                                    <td data-bind="text: $index() + 1"></td>
                                                    <td data-bind="text: code">
                                                    </td>
                                                    <td data-bind="text: name_ingredient">
                                                    </td>
                                                    <td data-bind="text: per_unit"> 
                                                    </td>
                                                    <td data-bind="text: per_batch"></td>
                                                </tr>
                                                <!-- /ko -->
                                                <tr >
                                                    <td colspan="6"><b>Inactive Ingredients</b></td>
                                                </tr>
                                                <!-- ko foreach: model.dataIngredientsInActive -->
                                                <tr>
                                                    <td data-bind="text: $index() + 1"></td>
                                                    <td data-bind="text: code">
                                                    </td>
                                                    <td data-bind="text: name_ingredient">
                                                    </td>
                                                    <td data-bind="text: per_unit"> 
                                                    </td>
                                                    <td data-bind="text: per_batch"></td>
                                                </tr>
                                                <!-- /ko -->
                                            </tbody>
                                </table>
                            </div>
                        </div>
                        <div >
                            <div>
                            <h4>Comments or Additional Instructions</h4>
                            </div>
                        </div>
                        <div>
                            <div >
                                <table  style="width: 100%">
                                    <tbody data-bind="foreach: model.comments">
                                        <tr>
                                            <td  data-bind="text: ($index() + 1)"></td>
                                            <td data-bind="text: comment">
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div>
                            <h4>ExxelUSA</h4>
                            <table style="width: 100%; border: 0px solid #CCC; border-collapse: collapse; ">
                                <tr style="border-bottom: 3px solid;">
                                    <td colspan="2" style="border: none;"></td>
                                    <td style="border: none;  border-left: 3px solid; border-right: 3px solid;">Sales Manager</td>
                                    <td style="border: none;"></td>
                                </tr>
                                <tr>
                                    <td style="border: none;">Approved by</td>
                                    <td style="border: none;">Name</td>
                                    <td style="border: none;">Title</td>
                                    <td style="border: none;">Date</td>
                                </tr>
                            </table>
                            <h4 style="margin-top: 500px;">Pharmaxx, Inc.
                                </h4>
                            <table style="width: 100%; border: 0px solid #CCC; border-collapse: collapse; ">
                                <tr  style="border-bottom: 3px solid;">
                                    <td colspan="2" style="border: none;"></td>
                                    <td style="border: none; border-left: 3px solid; border-right: 3px solid;">Sales Manager</td>
                                    <td style="border: none;"></td>
                                </tr>
                                <tr>
                                    <td style="border: none;">Approved by</td>
                                    <td style="border: none;">Name</td>
                                    <td style="border: none;">Title</td>
                                    <td style="border: none;">Date</td>
                                </tr>
                            </table>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- The Modal -->
    <div class="modal fade" id="modal-number">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Add Number</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <div name="frmNumberModal">
                        <div class="row form-group">
                            <input type="text" data-bind="value: model.numberUsing" class="form-control"  placeholder="Enter number" />
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" data-bind="click: addNumber" class="btn btn-primary">Add</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
                
            </div>
        </div>
    </div>
    <div class="modal fade" id="modal-string">
            <div class="modal-dialog modal-sm">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Add String</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body">
                        <div name="frmStringModal">
                            <div class="row form-group">
                                <input type="text" data-bind="value: model.stringUsing" class="form-control"  placeholder="Enter string" />
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" data-bind="click: addString" class="btn btn-primary">Add</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                    
                </div>
            </div>
        </div>
</div>
@endsection
@section('script')
<script>
    function AppViewModel() {
        var self = this;
        var formCustomRequest = $("#formcustomrequest");
        var formDataView = $("#dataview");
        var formDataPrint = $("#dataprint");
        self.model = {
            dataIngredientsActive: ko.observableArray([]),
            dataIngredientsInActive: ko.observableArray([]),
            dataIngredientsColor: ko.observableArray([]),
            dataIngredientsShell: ko.observableArray([]),
            numberUsing: ko.observable(''),
            stringUsing: ko.observable(''),
            checkNumber: ko.observable(),
            sumPerBatchColor: ko.observable(0),
            sumPerBatchShell: ko.observable(0),
            sumPricePerBatchColor: ko.observable(0),
            sumPricePerBatchShell: ko.observable(0),
            sumPricePerBatchInActive: ko.observable(0),

            dataLabor: ko.observableArray([]),
            dataLaborBottles: ko.observableArray([]),
            dataHardcapsule: ko.observableArray([]),
            dataTypeBottles: ko.observableArray([]),
            dataCost: ko.observableArray([]),
            dataPriceTypeBottles: ko.observableArray([]),
            dataCostEstimate: ko.observableArray([]),

            sumAmountLabor: ko.observable(0),
            sumAmountLaborBottles:ko.observable(0),
            sumNum3Hardcapsule: ko.observable(0),
            sumNum1TypeBottles: ko.observable(0),
            sumNum2TypeBottles: ko.observable(0),
            sumNum3TypeBottles: ko.observable(0),

            sizeTypeCustomRequest: ko.observable(""),
            sumCost1000: ko.observable(0),
            sumAmountCost: ko.observable(0),
            priceBottle30: ko.observable(0),
            priceBottle60: ko.observable(0),
            priceBottle90: ko.observable(0),
            batchNo: ko.observable(0),
            batchNoBox: ko.observable(0),
        }

        self.cost = {
            c25: 25,
            c30: 30,
            c35: 35,
            c40: 40,
            c45: 45,
            c50: 50,
            c60: 60,
            c70: 70,
            c80: 80,
            c90: 90,
            c100: 100,
            c160: 160,
        }

        self.reportFormula = {
            po: ko.observable(),
            filling_wt: ko.observable()
        }
        self.manufature = {
            name: ko.observable(),
            address: ko.observable(),
            phone: ko.observable()
        };
        self.customRequest = {
            product: ko.observable(),
            customer: ko.observable(),
            formula_number: ko.observable(),
            revision: ko.observable(),
            date: ko.observable(),
            size_type: ko.observable(),
            color_logo: ko.observable(),
            order: ko.observable(),
        };
        
        /* ----------- Click Number in table ----------- */
        self.clickNumber = function(value) {
            var obj = this;
            self.posNumber = ko.observable(obj);
            self.model.checkNumber(value);

            switch (value) {
                case "price_per_kg":
                    self.model.numberUsing(obj.price_per_kg());
                    break;
                case "labor_person":
                    self.model.numberUsing(obj.person());
                    break;
                case "labor_hour":
                    self.model.numberUsing(obj.hour());
                    break;
                case "labor_cost":
                    self.model.numberUsing(obj.cost());
                    break;
                case "hardcapsule_num1":
                    self.model.numberUsing(obj.num1());
                    break;
                case "hardcapsule_num2":
                    self.model.numberUsing(obj.num2());
                    break;
                case "typeBottles_num1":
                    self.model.numberUsing(obj.num1());
                    break;
                case "typeBottles_num2":
                    self.model.numberUsing(obj.num2());
                    break;
                case "typeBottles_num3":
                    self.model.numberUsing(obj.num3());
                    break;
                default:
                    $("#modal-number").modal("hide");
                    break;
            }
            $("#modal-number").modal("show");
        }
        self.addNumber = function() {
            switch (self.model.checkNumber()) {
                case "price_per_kg":
                    self.posNumber().price_per_kg(numeral(self.model.numberUsing())._value);
                    break;
                case "labor_person":
                    self.posNumber().person(numeral(self.model.numberUsing())._value);
                    break;
                case "labor_hour":
                    self.posNumber().hour(numeral(self.model.numberUsing())._value);
                    break;
                case "labor_cost":
                    self.posNumber().cost(numeral(self.model.numberUsing())._value);
                    break;
                case "hardcapsule_num1":
                    self.posNumber().num1(numeral(self.model.numberUsing())._value);
                    break;
                case "hardcapsule_num2":
                    self.posNumber().num2(numeral(self.model.numberUsing())._value);
                    break;
                case "typeBottles_num1":
                    self.posNumber().num1(numeral(self.model.numberUsing())._value);
                    break;
                case "typeBottles_num2":
                    self.posNumber().num2(numeral(self.model.numberUsing())._value);
                    break;
                case "typeBottles_num3":
                    self.posNumber().num3(numeral(self.model.numberUsing())._value);
                    break;
            }
            self.caculationAll();
            $("#modal-number").modal("hide");

        }
        /* end */

        /* ----------- Click String in table  -----------*/
        self.clickString = function(value) {
            var obj = this;
            self.posString = ko.observable(obj);
            self.model.checkNumber(value);

            switch (value) {
                case "labor_process":
                    self.model.stringUsing(obj.process());
                    break;
                case "hardcapsule_name":
                    self.model.stringUsing(obj.name());
                    break;
                case "typeBottles_name1":
                    self.model.stringUsing(obj.name1());
                    break;
                case "typeBottles_name2":
                    self.model.stringUsing(obj.name2());
                    break;
                case "typeBottles_name3":
                    self.model.stringUsing(obj.name3());
                    break;
                case "hardcapsule_size_type":
                    self.model.stringUsing(obj.size_type());
                    break;
                default:
                    $("#modal-string").modal("hide");
                    break;
            }
            $("#modal-string").modal("show");
        }
        self.addString = function() {
            switch (self.model.checkNumber()) {
                case "labor_process":
                    self.posString().process(self.model.stringUsing());
                    break;
                case "hardcapsule_name":
                    self.posString().name(self.model.stringUsing());
                    break;
                case "typeBottles_name1":
                    self.posString().name1(self.model.stringUsing());
                    break;
                case "typeBottles_name2":
                    self.posString().name2(self.model.stringUsing());
                    break;
                case "typeBottles_name3":
                    self.posString().name3(self.model.stringUsing());
                    break;
                case "hardcapsule_size_type":
                    self.posString().size_type(self.model.stringUsing());
                    break;
            }
            $("#modal-string").modal("hide");
        }
        /* end */

        /* ----------- Event change input number ----------- */
        self.model.numberUsing.subscribe(function (data) {
            self.model.numberUsing(numeral(data).format("0,0.00"));
        });
        /* end */

        /* ----------- Table Hardcapsule ----------- */
        self.addHardcapsule = function() {
            var obj = {
                name: ko.observable("Enter"),
                size_type: ko.observable("Enter"),
                num1: ko.observable(0),
                num2: ko.observable(0),
                num3: ko.observable(0),
            }
            self.model.dataHardcapsule.push(obj);
        }

        self.deleteHardcapsule = function() {
            self.model.dataHardcapsule.remove(this);
            self.caculationAll();
        }

        /* ----------- Table Labor ----------- */
        self.addLabor = function() {
            var obj = {
                person: ko.observable("0"),
                process: ko.observable("Enter"),
                hour: ko.observable("0"),
                cost: ko.observable("0"),
                amount: ko.observable("0"),
            }
            self.model.dataLabor.push(obj);
        }
        self.deleteLabor = function() {
            self.model.dataLabor.remove(this);
            self.caculationAll();
        }
        /* end */

        /* ----------- Table Labor Bottles ----------- */
        self.addLaborBottles = function() {
            var obj = {
                person: ko.observable("0"),
                process: ko.observable("Enter"),
                hour: ko.observable("0"),
                cost: ko.observable("0"),
                total: ko.observable("0"),
            }
            self.model.dataLaborBottles.push(obj);
        }
        self.deleteLaborBottles = function() {
            self.model.dataLaborBottles.remove(this);
            self.caculationAll();
        }
        /* end */

        /* ----------- Table Type Bottles ----------- */
        self.addTypeBottles = function() {
            var obj = {
                name1: ko.observable("Enter"),
                num1: ko.observable(0),
                name2: ko.observable("Enter"),
                num2: ko.observable(0),
                name3: ko.observable("Enter"),
                num3: ko.observable(0),
            }
            self.model.dataTypeBottles.push(obj);
        }
        self.deleteTypeBottles = function() {
            self.model.dataTypeBottles.remove(this);
            self.caculationAll();
        }
        /* end */

        /* ----------- Caculation table Ingedients ----------- */
        self.caculationForm = function() {
            var arrColor = self.model.dataIngredientsColor();
            var arrShell = self.model.dataIngredientsShell();
            var arrActive = self.model.dataIngredientsActive();
            var arrInActive = self.model.dataIngredientsInActive();

            var sum1 = 0; 

            $.each(arrColor, function( index, value ) {
                var per_batch = Number(value.per_batch());
                var price_per_kg = Number(value.price_per_kg());
                value.price_per_batch(per_batch * price_per_kg);
                sum1 += value.price_per_batch();
            });
            self.model.sumPricePerBatchColor(sum1);
            var sum2 = 0; 

            $.each(arrShell, function( index, value ) {
                var per_batch = Number(value.per_batch());
                var price_per_kg = Number(value.price_per_kg());
                value.price_per_batch(per_batch * price_per_kg);
                sum2 += value.price_per_batch();
            });
            self.model.sumPricePerBatchShell(sum2);
            var sum3 = 0; 

            $.each(arrActive, function( index, value ) {
                var per_batch = Number(value.per_batch());
                var price_per_kg = Number(value.price_per_kg());
                value.price_per_batch(per_batch * price_per_kg);
                sum3 += value.price_per_batch();
            });

            $.each(arrInActive, function( index, value ) {
                var per_batch = Number(value.per_batch());
                var price_per_kg = Number(value.price_per_kg());
                value.price_per_batch(per_batch * price_per_kg);
                sum3 += value.price_per_batch();
            });
            self.model.sumPricePerBatchInActive(sum1 + sum2 + sum3);
        }
        /* end */

        /* ----------- Caculation table Hardcapsule ----------- */
        self.caculationHardcapsule = function() {
            var arr = self.model.dataHardcapsule();
            var sum = 0; 

            $.each(arr, function( index, value ) {
                var num1 = Number(value.num1());
                var num2 = Number(value.num2());
                value.num3(num1 * num2);
                sum += value.num3();
            });
            self.model.sumNum3Hardcapsule(sum);
        }
        /* end */

        /* ----------- Caculation table Labor ----------- */
        self.caculationLabors = function() {
            var arr = self.model.dataLabor();
            var sum = 0; 

            $.each(arr, function( index, value ) {
                var hour = Number(value.hour());
                var cost = Number(value.cost());
                value.amount(hour * cost);
                sum += value.amount();
            });
            self.model.sumAmountLabor(sum);
        }
        /* end */

         /* ----------- Caculation table LaborBottles ----------- */
        self.caculationLaborsBottles = function() {
            var arr = self.model.dataLaborBottles();
            var sum = 0; 

            $.each(arr, function( index, value ) {
                var hour = Number(value.hour());
                var cost = Number(value.cost());
                value.total(hour * cost);
                sum += value.total();
            });
            self.model.sumAmountLaborBottles(sum);
        }
        /* end */

        /* ----------- Caculation table LaborBottles ----------- */
        self.caculationTypeBottles = function() {
            var arr = self.model.dataTypeBottles();
            var sum1 = 0, sum2 = 0, sum3 = 0; 

            $.each(arr, function( index, value ) {
                sum1 += Number(value.num1());
                sum2 += Number(value.num2());
                sum3 += Number(value.num3());
            });
            self.model.sumNum1TypeBottles(sum1);
            self.model.sumNum2TypeBottles(sum2);
            self.model.sumNum3TypeBottles(sum3);
        }
        /* end */

        /* ----------- Caculation table Cost  -----------*/
        self.caculationCost = function() {
            var sumPricePerBatchInActive = Number(self.model.sumPricePerBatchInActive());
            var sumNum3Hardcapsule = Number(self.model.sumNum3Hardcapsule());
            var num1 = sumPricePerBatchInActive + sumNum3Hardcapsule;
            var order = Number(self.customRequest.order());
            var num2 = num1 / order * 1000;
            var num21 = self.model.sumAmountLabor();
            var num22 = num21 / order * 1000;
            self.model.sumCost1000(num2 + num22);
            self.model.sumAmountCost(self.model.sumCost1000() * 1200);
            var arr = [
                {
                    num1: ko.observable(num1),
                    num2: ko.observable(num2),
                    c25: ko.observable((num2 * self.cost.c25 / 100) + num2),
                    c30: ko.observable((num2 * self.cost.c30 / 100) + num2),
                    c35: ko.observable((num2 * self.cost.c35 / 100) + num2),
                    c40: ko.observable((num2 * self.cost.c40 / 100) + num2),
                    c50: ko.observable((num2 * self.cost.c50 / 100) + num2),
                    c60: ko.observable((num2 * self.cost.c60 / 100) + num2),
                    c70: ko.observable((num2 * self.cost.c70 / 100) + num2),
                    c80: ko.observable((num2 * self.cost.c80 / 100) + num2),
                    c90: ko.observable((num2 * self.cost.c90 / 100) + num2),
                    c100: ko.observable((num2 * self.cost.c100 / 100) + num2),
                },
                {
                    num1: ko.observable(num21),
                    num2: ko.observable(num22),
                    c25: ko.observable((num22 * self.cost.c25 / 100) + num22),
                    c30: ko.observable((num22 * self.cost.c30 / 100) + num22),
                    c35: ko.observable((num22 * self.cost.c35 / 100) + num22),
                    c40: ko.observable((num22 * self.cost.c40 / 100) + num22),
                    c50: ko.observable((num22 * self.cost.c50 / 100) + num22),
                    c60: ko.observable((num22 * self.cost.c60 / 100) + num22),
                    c70: ko.observable((num22 * self.cost.c70 / 100) + num22),
                    c80: ko.observable((num22 * self.cost.c80 / 100) + num22),
                    c90: ko.observable((num22 * self.cost.c90 / 100) + num22),
                    c100: ko.observable((num22 * self.cost.c100 / 100) + num22),
                }
            ];
            self.model.dataCost(arr);
        }
        /* end */

        /* ----------- Caculation table Cost  -----------*/
        self.caculationPriceTypeBottles = function() {
            var sumNum1TypeBottles = Number(self.model.sumNum1TypeBottles());
            var sumNum2TypeBottles = Number(self.model.sumNum2TypeBottles());
            var sumNum3TypeBottles = Number(self.model.sumNum3TypeBottles());
            var sumAmountCost = Number(self.model.sumAmountCost());
            var order = Number(self.customRequest.order());

            var price0 = sumNum1TypeBottles;
            var qty0 = order / 30;
            var num01 = price0 * qty0;
            var num02 = sumAmountCost + num01;

            var price1 = sumNum2TypeBottles;
            var qty1 = order / 60;
            var num11 = price1 * qty1;
            var num12 = sumAmountCost + num11;

            var price2 = sumNum3TypeBottles;
            var qty2 = order / 90;
            var num21 = price2 * qty2;
            var num22 = sumAmountCost + num21;

            self.model.priceBottle30(num02);
            self.model.priceBottle60(num12);
            self.model.priceBottle90(num22);

            var arr = [
                {
                    price: ko.observable(price0),
                    qty: ko.observable(qty0),
                    num1: ko.observable(num01),
                    num2: ko.observable(num02),
                },
                {
                    price: ko.observable(price1),
                    qty: ko.observable(qty1),
                    num1: ko.observable(num11),
                    num2: ko.observable(num12),
                },
                {
                    price: ko.observable(price2),
                    qty: ko.observable(qty2),
                    num1: ko.observable(num21),
                    num2: ko.observable(num22),
                }
            ];
            self.model.dataPriceTypeBottles(arr);
        }
        /* end */

        /* ----------- Caculation table Cost Estimate  -----------*/
        self.caculationCostEstimate = function() {
            var priceBottle30 = Number(self.model.priceBottle30());
            var priceBottle60 = Number(self.model.priceBottle60());
            var priceBottle90 = Number(self.model.priceBottle90());
            var order = Number(self.customRequest.order());

            var costPerBottle0 = (priceBottle30 / order) * 30;
            var costPerBottle1 = (priceBottle60 / order) * 60;
            var costPerBottle2 = (priceBottle90 / order) * 90;
           
            var arr = [
                {
                    costPerBottle: ko.observable(costPerBottle0),
                    c25: ko.observable((costPerBottle0 * self.cost.c25 / 100) + costPerBottle0),
                    c30: ko.observable((costPerBottle0 * self.cost.c30 / 100) + costPerBottle0),
                    c35: ko.observable((costPerBottle0 * self.cost.c35 / 100) + costPerBottle0),
                    c40: ko.observable((costPerBottle0 * self.cost.c40 / 100) + costPerBottle0),
                    c45: ko.observable((costPerBottle0 * self.cost.c45 / 100) + costPerBottle0),
                    c50: ko.observable((costPerBottle0 * self.cost.c50 / 100) + costPerBottle0),
                    c60: ko.observable((costPerBottle0 * self.cost.c60 / 100) + costPerBottle0),
                    c70: ko.observable((costPerBottle0 * self.cost.c70 / 100) + costPerBottle0),
                    c80: ko.observable((costPerBottle0 * self.cost.c80 / 100) + costPerBottle0),
                    c90: ko.observable((costPerBottle0 * self.cost.c90 / 100) + costPerBottle0),
                    c160: ko.observable((costPerBottle0 * self.cost.c160 / 100) + costPerBottle0),
                },
                {
                    costPerBottle: ko.observable(costPerBottle1),
                    c25: ko.observable((costPerBottle1 * self.cost.c25 / 100) + costPerBottle1),
                    c30: ko.observable((costPerBottle1 * self.cost.c30 / 100) + costPerBottle1),
                    c35: ko.observable((costPerBottle1 * self.cost.c35 / 100) + costPerBottle1),
                    c40: ko.observable((costPerBottle1 * self.cost.c40 / 100) + costPerBottle1),
                    c45: ko.observable((costPerBottle1 * self.cost.c45 / 100) + costPerBottle1),
                    c50: ko.observable((costPerBottle1 * self.cost.c50 / 100 ) + costPerBottle1),
                    c60: ko.observable((costPerBottle1 * self.cost.c60 / 100) + costPerBottle1),
                    c70: ko.observable((costPerBottle1 * self.cost.c70 / 100) + costPerBottle1),
                    c80: ko.observable((costPerBottle1 * self.cost.c80 / 100) + costPerBottle1),
                    c90: ko.observable((costPerBottle1 * self.cost.c90 / 100) + costPerBottle1),
                    c160: ko.observable((costPerBottle1 * self.cost.c160 / 100) + costPerBottle1),
                },
                {
                    costPerBottle: ko.observable(costPerBottle2),
                    c25: ko.observable((costPerBottle2 * self.cost.c25 / 100) + costPerBottle2),
                    c30: ko.observable((costPerBottle2 * self.cost.c30 / 100) + costPerBottle2),
                    c35: ko.observable((costPerBottle2 * self.cost.c35 / 100) + costPerBottle2),
                    c40: ko.observable((costPerBottle2 * self.cost.c40 / 100) + costPerBottle2),
                    c45: ko.observable((costPerBottle2 * self.cost.c45 / 100) + costPerBottle2),
                    c50: ko.observable((costPerBottle2 * self.cost.c50 / 100) + costPerBottle2),
                    c60: ko.observable((costPerBottle2 * self.cost.c60 / 100) + costPerBottle2),
                    c70: ko.observable((costPerBottle2 * self.cost.c70 / 100) + costPerBottle2),
                    c80: ko.observable((costPerBottle2 * self.cost.c80 / 100) + costPerBottle2),
                    c90: ko.observable((costPerBottle2 * self.cost.c90 / 100) + costPerBottle2),
                    c160: ko.observable((costPerBottle2 * self.cost.c160 / 100) + costPerBottle2),
                }
            ];
            self.model.dataCostEstimate(arr);
        }
        /* end */

        self.caculationAll = function() {
            self.caculationForm();
            self.caculationHardcapsule();
            self.caculationLabors();
            self.caculationCost();
            self.caculationLaborsBottles();
            self.caculationTypeBottles();
            self.caculationPriceTypeBottles();
            self.caculationCostEstimate();
        }

        self.save = function() {
            var idCustomRequest = formCustomRequest.find("select[name=custom_request]").val();

            if (!idCustomRequest || idCustomRequest == undefined || idCustomRequest == "") {
                return false;
            }
            var po = self.reportFormula.po();
            var batchNo = self.model.batchNo();
            var batchNoBox = self.model.batchNoBox();
            var listIngredientColorShell = self.model.dataIngredientsColor().concat(self.model.dataIngredientsShell());
            var listIngredientInActive = self.model.dataIngredientsActive().concat(self.model.dataIngredientsInActive());
            var listIngredient = listIngredientColorShell.concat(listIngredientInActive);
            listIngredient = ko.mapping.toJS(listIngredient);
            var listHardcapsule =  ko.mapping.toJS(self.model.dataHardcapsule());
            var listLabor = ko.mapping.toJS(self.model.dataLabor());
            var listCost = ko.mapping.toJS(self.model.dataCost());
            var listLaborBottles = ko.mapping.toJS(self.model.dataLaborBottles());
            var listTypeBottles = ko.mapping.toJS(self.model.dataTypeBottles());
            var listPriceTypeBottles = ko.mapping.toJS(self.model.dataPriceTypeBottles());
            var listCostEstimate = ko.mapping.toJS(self.model.dataCostEstimate());

            var sumPricePerBatchColor = self.model.sumPricePerBatchColor();
            var sumPricePerBatchShell = self.model.sumPricePerBatchShell();
            var sumPricePerBatchInActive = self.model.sumPricePerBatchInActive();
            var sumNum3Hardcapsule = self.model.sumNum3Hardcapsule();
            var sumAmountLabor = self.model.sumAmountLabor();
            var sumCost1000 = self.model.sumCost1000();
            var sumAmountCost = self.model.sumAmountCost();
            var sumAmountLaborBottles = self.model.sumAmountLaborBottles();
            var sumNum1TypeBottles = self.model.sumNum1TypeBottles();
            var sumNum2TypeBottles = self.model.sumNum2TypeBottles();
            var sumNum3TypeBottles = self.model.sumNum3TypeBottles();

            var data = {
                idCustomRequest: idCustomRequest,
                po: po,
                batchNo: batchNo,
                batchNoBox: batchNoBox,
                sumPricePerBatchColor: sumPricePerBatchColor,
                sumPricePerBatchShell: sumPricePerBatchShell,
                sumPricePerBatchInActive: sumPricePerBatchInActive,
                sumNum3Hardcapsule: sumNum3Hardcapsule,
                sumAmountLabor: sumAmountLabor,
                sumCost1000: sumCost1000,
                sumAmountCost: sumAmountCost,
                sumAmountLaborBottles: sumAmountLaborBottles,
                sumNum1TypeBottles: sumNum1TypeBottles,
                sumNum2TypeBottles: sumNum2TypeBottles,
                sumNum3TypeBottles: sumNum3TypeBottles,

                listIngredient: JSON.stringify(listIngredient),
                listHardcapsule: JSON.stringify(listHardcapsule),
                listLabor: JSON.stringify(listLabor),
                listCost: JSON.stringify(listCost),
                listLaborBottles: JSON.stringify(listLaborBottles),
                listTypeBottles: JSON.stringify(listTypeBottles),
                listPriceTypeBottles: JSON.stringify(listPriceTypeBottles),
                listCostEstimate: JSON.stringify(listCostEstimate),
            }
            sendData('POST', '{{ route('admin.report.savecost') }}', data, function(message){
                $.each(message, function (index, value) {
                    toastr.success(value);
                });
            });
        }
       
        $(document).ready(function() {
            $("#print").click(function(){
                print("dataprint");
            });
            
        });
        formCustomRequest.find("select[name=custom_request]").change(function() {
            var id = $(this).val();

            if (id) {
                sendData("GET", '{{ route('admin.reportcost.getreportformula') }}', { id: id }, function(res) {
                    formDataView.removeClass("d-none");
                    self.model.dataIngredientsColor([]);
                    self.model.dataIngredientsShell([]);
                    self.model.dataIngredientsActive([]);
                    self.model.dataIngredientsInActive([]);
                    self.model.dataHardcapsule([]);
                    self.model.dataLabor([]);
                    self.model.dataLaborBottles([]);
                    self.model.dataCost([]);
                    self.model.dataTypeBottles([]);

                    if (res.manufature) {
                        self.manufature.name(res.manufature.name);
                        self.manufature.address(res.manufature.address);
                        self.manufature.phone(res.manufature.phone);
                    }
                    if (res.customRequest) {
                        self.customRequest.product(res.customRequest.product);
                        self.customRequest.customer(res.customRequest.customer);
                        self.customRequest.formula_number(res.customRequest.formula_number);
                        self.customRequest.revision(res.customRequest.revision);
                        self.customRequest.date(res.customRequest.date);
                        self.customRequest.size_type(res.customRequest.size_type);
                        self.customRequest.color_logo(res.customRequest.color_logo);
                        self.customRequest.order(res.customRequest.order);

                        self.model.sizeTypeCustomRequest(res.customRequest.size_type);

                        if (res.isEmpty) {
                            var har = {
                                name: ko.observable("Name"),
                                size_type: ko.observable(self.model.sizeTypeCustomRequest()),
                                num1: ko.observable(0),
                                num2: ko.observable(0),
                                num3: ko.observable(0),
                            }
                            self.model.dataHardcapsule.push(har);
                        }
                        
                    }

                    $.each(res.ingredientsActive, function( index, value ) {
                        var obj = {
                            id: value.id,
                            code: value.code,
                            inactive: value.inactive,
                            ingredient_id: value.ingredient_id,
                            name_ingredient: value.name_ingredient,
                            per_unit: value.per_unit,
                            per_batch: value.per_batch,
                            reportformula_id: value.reportformula_id,
                            price_per_kg: res.isEmpty ? 0 : value.price_per_kg,
                            price_per_batch: res.isEmpty ? 0 : value.price_per_batch
                        };
                        self.model.dataIngredientsActive.push(ko.mapping.fromJS(obj));
                    });
                    $.each(res.ingredientsInActive, function( index, value ) {
                        var obj = {
                            id: value.id,
                            code: value.code,
                            inactive: value.inactive,
                            ingredient_id: value.ingredient_id,
                            name_ingredient: value.name_ingredient,
                            per_unit: value.per_unit,
                            per_batch: value.per_batch,
                            reportformula_id: value.reportformula_id,
                            price_per_kg: res.isEmpty ? 0 : value.price_per_kg,
                            price_per_batch: res.isEmpty ? 0 : value.price_per_batch
                        };
                        self.model.dataIngredientsInActive.push(ko.mapping.fromJS(obj));
                    });
                    var sumColor = 0, sumShell = 0;

                    $.each(res.ingredientsColor, function( index, value ) {
                        sumColor += Number(value.per_batch);

                        var obj = {
                            id: value.id,
                            code: value.code,
                            inactive: value.inactive,
                            ingredient_id: value.ingredient_id,
                            name_ingredient: value.name_ingredient,
                            per_unit: value.per_unit,
                            per_batch: value.per_batch,
                            reportformula_id: value.reportformula_id,
                            price_per_kg: res.isEmpty ? 0 : value.price_per_kg,
                            price_per_batch: res.isEmpty ? 0 : value.price_per_batch
                        };
                        self.model.dataIngredientsColor.push(ko.mapping.fromJS(obj));
                    });
                    $.each(res.ingredientsShell, function( index, value ) {
                        sumShell += Number(value.per_batch);
                        var obj = {
                            id: value.id,
                            code: value.code,
                            inactive: value.inactive,
                            ingredient_id: value.ingredient_id,
                            name_ingredient: value.name_ingredient,
                            per_unit: value.per_unit,
                            per_batch: value.per_batch,
                            reportformula_id: value.reportformula_id,
                            price_per_kg: res.isEmpty ? 0 : value.price_per_kg,
                            price_per_batch: res.isEmpty ? 0 : value.price_per_batch
                        };
                        self.model.dataIngredientsShell.push(ko.mapping.fromJS(obj));
                    });
                    self.model.sumPerBatchColor(sumColor);
                    self.model.sumPerBatchShell(sumShell);
                    
                    if (res.reportFormula) {
                        self.reportFormula.po(res.reportFormula.po);
                        self.reportFormula.filling_wt(res.reportFormula.filling_wt);
                    }

                    if (!res.isEmpty) {
                        $.each(res.costHardcapsule, function( index, value ) {
                            var obj = {
                                name: value.name,
                                size_type: value.size_type,
                                num1: value.num1,
                                num2: value.num2,
                                num3: value.num3,
                            };
                            self.model.dataHardcapsule.push(ko.mapping.fromJS(obj));
                        });
                        $.each(res.listLabor, function( index, value ) {
                            var obj = {
                                amount: value.amount,
                                cost: value.cost,
                                hour: value.hour,
                                person: value.person,
                                process: value.process,
                            };
                            self.model.dataLabor.push(ko.mapping.fromJS(obj));
                        });
                        $.each(res.listLaborBottles, function( index, value ) {
                            var obj = {
                                total: value.total,
                                cost: value.cost,
                                hour: value.hour,
                                person: value.person,
                                process: value.process,
                            };
                            self.model.dataLaborBottles.push(ko.mapping.fromJS(obj));
                        });
                        $.each(res.listTypeBottles, function( index, value ) {
                            var obj = {
                                name1: value.name1,
                                name2: value.name2,
                                name3: value.name3,
                                num1: value.num1,
                                num2: value.num2,
                                num3: value.num3,
                            };
                            self.model.dataTypeBottles.push(ko.mapping.fromJS(obj));
                        });
                        self.reportFormula.po(res.reportCost.po);
                        self.model.batchNo(res.reportCost.batch_no);
                        self.model.batchNoBox(res.reportCost.batch_no_box);
                    }

                    self.caculationAll();
                });
            } else {
                formDataView.addClass("d-none");
            }
        });
    }
    
     // Activates knockout.js
     ko.applyBindings(new AppViewModel());

     
    
</script>
@endsection
