@extends('admin.layout.master')

@section('content')
<div class="container-fluid">
	@include('admin.partials.breadcrumb')
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
            <div class="card mb-3">
                <div class="card-body">
                    <div class="text-left form-group col-xl-12">
                        <button class="btn btn-outline-primary" id="print" title="Print" type="button">
                            <i class="fa fa-print" aria-hidden="true"></i>
                            {{ __('Print') }}
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
                            <div class="col-sm-4">
                                <input type="text" data-bind="value: reportFormula.filling_wt" title="Enter Filling Wt" placeholder="Enter Filling Wt" class="form-control">
                            </div>
                        </div>
                        <div class="row form-group">
                            <label for="order" class="col-sm-2 col-form-label">10. Batch No.: </label>
                            <div class="col-sm-4">
                                <input type="text"  title="Enter Batch No" placeholder="Enter Batch No" class="form-control">
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
                            <div class="col-sm-8 col-form-label" >  60  softgels/box
                            </div>
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
                                13. <span class="text-danger"><b>Hardcapsule</b></span>
                            </div>
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
                                        <td data-bind="text: total">
                                        </td>
                                        <td class="text-center">
                                            <a href='javascript:;' data-bind="click: $root.deleteLaborBottles" title='Delete Item'><i class='fa fa-lg fa-trash' aria-hidden='true'></i></a>
                                        </td>
                                    </tr>
                                    <!-- /ko -->
                                    <tr>
                                        <td colspan="3"></td>
                                        <td style="background-color: yellow; color: red"><b>Total</b></td>
                                        <td style="background-color: yellow; color: red; font-weight: bold" data-bind="text: numeral(model.sumAmountLaborBottles()).format('0,0.00')"></td>
                                        
                                    </tr>
                                </tbody>
                            </table>
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
                             60  softgels/box
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
                    <form name="frmNumberModal">
                        <div class="row form-group">
                            <input type="text" data-bind="value: model.numberUsing" class="form-control"  placeholder="Enter number" />
                        </div>
                    </form>
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
                        <form name="frmStringModal">
                            <div class="row form-group">
                                <input type="text" data-bind="value: model.stringUsing" class="form-control"  placeholder="Enter string" />
                            </div>
                        </form>
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
            sumAmountLabor: ko.observable(0),
            dataLaborBottles: ko.observableArray([]),
            sumAmountLaborBottles:ko.observable(0),


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
        
        /* Click Number in table */
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
                    self.caculationForm();
                    break;
                case "labor_person":
                    self.posNumber().person(numeral(self.model.numberUsing())._value);
                    self.caculationLabors();
                    self.caculationLaborsBottles();
                    break;
                case "labor_hour":
                    self.posNumber().hour(numeral(self.model.numberUsing())._value);
                    self.caculationLabors();
                    self.caculationLaborsBottles();
                    break;
                case "labor_cost":
                    self.posNumber().cost(numeral(self.model.numberUsing())._value);
                    self.caculationLabors();
                    self.caculationLaborsBottles();
                    break;

            }
            $("#modal-number").modal("hide");
        }
        /* end */

        /* Click String in table */
        self.clickString = function(value) {
            var labor = this;
            self.posString = ko.observable(labor);
            self.model.checkNumber(value);

            switch (value) {
                case "labor_process":
                    self.model.stringUsing(labor.process());
                    break;
                default:
                    $("#modal-string").modal("hide");
                    break;
            }
            $("#modal-string").modal("show");
        }
        self.addString = function() {
            if (self.model.checkNumber() == "labor_process") {
                self.posString().process(self.model.stringUsing());
            }
            $("#modal-string").modal("hide");
        }
        /* end */

        /* Event change input number */
        self.model.numberUsing.subscribe(function (data) {
            self.model.numberUsing(numeral(data).format("0,0"));
        });
        /* end */

        /* Table Labor */
        self.addLabor = function() {
            var obj = {
                person: ko.observable("0"),
                process: ko.observable("Name"),
                hour: ko.observable("0"),
                cost: ko.observable("0"),
                amount: ko.observable("0"),
            }
            self.model.dataLabor.push(obj);
        }
        self.deleteLabor = function() {
            self.model.dataLabor.remove(this);
            self.caculationLabors();
        }
        /* end */

        /* Table Labor Bottles */
        self.addLaborBottles = function() {
            var obj = {
                person: ko.observable("0"),
                process: ko.observable("Name"),
                hour: ko.observable("0"),
                cost: ko.observable("0"),
                total: ko.observable("0"),
            }
            self.model.dataLaborBottles.push(obj);
        }
        self.deleteLaborBottles = function() {
            self.model.dataLaborBottles.remove(this);
            self.caculationLaborsBottles();
        }
        /* end */

        /* Caculation table Ingedients */
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

        /* Caculation table Labor */
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

         /* Caculation table LaborBottles */
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

       
        $(document).ready(function() {
            $("#print").click(function(){
                print("dataprint");
            });
        });
        formCustomRequest.find("select[name=custom_request]").change(function() {
            var id = $(this).val();

            if (id) {
                sendData("GET", '{{ route('admin.reportcost.getreportformula') }}', { id: id }, function(res) {
                    console.log(res);
                    formDataView.removeClass("d-none");
                    self.model.dataIngredientsColor([]);
                    self.model.dataIngredientsShell([]);
                    self.model.dataIngredientsActive([]);
                    self.model.dataIngredientsInActive([]);

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
                            price_per_kg: 0,
                            price_per_batch: 0
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
                            price_per_kg: 0,
                            price_per_batch: 0
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
                            price_per_kg: 0,
                            price_per_batch: 0
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
                            price_per_kg: 0,
                            price_per_batch: 0
                        };
                        self.model.dataIngredientsShell.push(ko.mapping.fromJS(obj));
                    });
                    self.model.sumPerBatchColor(sumColor);
                    self.model.sumPerBatchShell(sumShell);
                    
                    if (res.reportFormula) {
                        self.reportFormula.po(res.reportFormula.po);
                        self.reportFormula.filling_wt(res.reportFormula.filling_wt);
                    }
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
