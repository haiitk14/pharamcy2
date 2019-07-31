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
                            <label for="address" class="col-sm-2 col-form-label">Select Custom Request</label>
                            <div class="col-sm-6">
                                <select class="form-control" title="Select Custom Request" name="custom_request" title="{{ __('Select Custom Request') }}">
                                    <option value="">{{ __('None') }}</option>
                                    @foreach ($data['customRequests'] as $customRequest)
                                    <option value="{{ $customRequest->id }}">{{ $customRequest->ipd }} - {{ $customRequest->manufature->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </form>
                    <form id="dataview"  class="d-none">
                        <div class="row form-group">
                            <div class="col-sm-6">
                                <b class="manufature-name"></b><br>
                                <span class="manufature-address"></span>
                                <br> <span class="manufature-phone"></span>
                            </div>
                        </div>
                        <div class="row form-group">
                            <label for="address" class="col-sm-2 col-form-label">1. Product:</label>
                            <div class="col-sm-8 col-form-label product-name"></div>
                        </div>
                        <div class="row form-group">
                            <label for="address" class="col-sm-2 col-form-label">2. Customer:</label>
                            <div class="col-sm-8 col-form-label customer-full-name">
                            </div>
                        </div>
                        <div class="row form-group">
                            <label for="formula" class="col-sm-2 col-form-label">3. P.O: </label>
                            <div class="col-sm-4">
                                <input type="text" title="Enter P.O" placeholder="Enter P.O" class="form-control" name="po">
                            </div>
                        </div>
                        <div class="row form-group">
                            <label for="address" class="col-sm-2 col-form-label">4. Formula:</label>
                            <div class="col-sm-8 col-form-label formula-number">
                            </div>
                        </div>
                        <div class="row form-group">
                            <label for="address" class="col-sm-2 col-form-label">5. Revision:</label>
                            <div class="col-sm-8 col-form-label revision">
                            </div>
                        </div>
                        <div class="row form-group">
                            <label for="address" class="col-sm-2 col-form-label">6. Date:</label>
                            <div class="col-sm-8 col-form-label show-date">
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-sm-12 ">
                            <h4>Softgel Specification</h4>
                            </div>
                        </div>
                        <div class="row form-group">
                            <label for="address" class="col-sm-2 col-form-label">7. Size/Type:</label>
                            <div class="col-sm-8 col-form-label size-type">
                            </div>
                        </div>
                        <div class="row form-group">
                            <label for="address" class="col-sm-2 col-form-label">8. Color/Logo:</label>
                            <div class="col-sm-8 col-form-label color-logo">
                            </div>
                        </div>
                        <div class="row form-group">
                            <label for="address" class="col-sm-2 col-form-label">9. Filling Wt:</label>
                            <div class="col-sm-8 col-form-label" data-bind="text: numeral($root.model.fillWtInActive()).format('0,0.00')">
                            </div>
                        </div>
                        <div class="row form-group">
                            <label for="order" class="col-sm-2 col-form-label">10. Serving Size: </label>
                            <div class="col-sm-4">
                                <input type="number" data-bind="value: model.servingSize, event: { change: function() {
                                    $root.calculationArray();
                                    } }" name="serving_size" value="0"  class="form-control" title="Enter Serving Size" placeholder="Enter Serving Size" >
                            </div>
                        </div>
                        <div class="row form-group">
                            <label for="order" class="col-sm-2 col-form-label">11. Gelatin Batch: </label>
                            <div class="col-sm-4">
                                <input type="number" name="gelatin_batch" value="0" class="form-control" title="Enter Gelatin Batch" placeholder="Enter Gelatin Batch" >
                            </div>
                        </div>
                        <div class="row form-group">
                            <label for="order" class="col-sm-2 col-form-label">12. Batch size: </label>
                            <div class="col-sm-8 col-form-label" data-bind="text: model.batchSize">
                            </div>
                        </div>
                        <div class="row form-group">
                            <label for="order" class="col-sm-2 col-form-label">13. </label>
                        </div>
                        <div class="row form-group">
                            <div class="col-sm-12 table-responsive">
                                <table class="table table-bordered table-sm">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>RW No.</th>
                                            <th>Ingredients *</th>
                                            <th>Wt (mg) <br>per Serving</th>
                                            <th  width="15%">Wt (mg) <br>per Unit</th>
                                            <th width="10%">Purity %</th>
                                            <th width="10%">Overage %</th>
                                            <th>Input <br>Wt/mg per tab</th>
                                            <th>Input <br>Wt/kg per batch</th>
                                            <th>%Tab</th>
                                        </tr>
                                    </thead>
                                    <tbody class="table-color">
                                        <tr colspan="12">
                                                <td colspan="12"><b>Color</b></td>
                                        </tr>
                                        <!-- ko foreach: arraySalesOrderIngredientsColor -->
                                        <tr data-bind="attr: { 'data-id': id }">
                                            <td data-bind="text: ($index() + 1)"></td>
                                            <td data-bind="text: code"></td>
                                            <td data-bind="text: name_ingredient"></td>
                                            <td data-bind="text: per_serving"></td>
                                            <td>
                                                <input type="number" data-bind="value: per_unit, event: { change: function() {
                                                    per_serving(per_unit() * $root.model.servingSize());
                                                    per_batch(per_tab() * $root.model.batchSize() * 1000000 );
                                                 } }" class="form-control">
                                            </td>
                                            <td>
                                                <input type="number" data-bind="value: purity, event: { change: function() {
                                                    per_tab((per_unit() / (purity() / 100) * (1 + (overage() / 100)) ));
                                                    per_batch(per_tab() * $root.model.batchSize() * 1000000 );
                                                    $root.calculationFillWt();
                                                    tab100(per_tab() / $root.model.fillWtColor());
                                                 } }" class="form-control">
                                            </td>
                                            <td>
                                                <input type="number" data-bind="value: overage, event: { change: function() {
                                                    per_tab((per_unit() / (purity() / 100) * (1 + (overage() / 100)) ));
                                                    per_batch(per_tab() * $root.model.batchSize() * 1000000 );
                                                    $root.calculationFillWt();
                                                    tab100(per_tab() / $root.model.fillWtColor());
                                                 } }" class="form-control">
                                            </td>
                                            
                                            <td data-bind="text: per_tab() ? numeral(per_tab()).format('0,0.00') : 0"></td>
                                            <td data-bind="text: per_batch() ? numeral(per_batch()).format('0,0.00') : 0"></td>
                                            <td data-bind="text: tab100() ? numeral(tab100()).format('0,0.00') : 0"></td>
                                        </tr>
                                        <!-- /ko -->
                                        <tr>
                                            <td colspan="7"></td>
                                            <td data-bind="text: numeral($root.model.fillWtColor()).format('0,0.00')"></td>
                                            <td data-bind="text: numeral($root.model.sumPerBatch()).format('0,0.00')"></td>
                                            <td data-bind="text: numeral($root.model.sumTab()).format('0,0.00')"></td>
                                        </tr>
                                    </tbody>
                                    <tbody class="table-shell">
                                        <tr >
                                            <td colspan="12"><b>Shell</b></td>
                                        </tr>
                                            <!-- ko foreach: arraySalesOrderIngredientsShell -->
                                        <tr data-bind="attr: { 'data-id': id }">
                                            <td data-bind="text: ($index() + 1)"></td>
                                            <td data-bind="text: code"></td>
                                            <td data-bind="text: name_ingredient"></td>
                                            <td data-bind="text: per_serving"></td>
                                            <td>
                                                <input type="number" data-bind="value: per_unit, event: { change: function() {
                                                    per_serving(per_unit() * $root.model.servingSize());
                                                    per_batch(per_tab() * $root.model.batchSize() * 1000000 );
                                                    } }" class="form-control">
                                            </td>
                                            <td>
                                                <input type="number" data-bind="value: purity, event: { change: function() {
                                                    per_tab((per_unit() / (purity() / 100) * (1 + (overage() / 100)) ));
                                                    per_batch(per_tab() * $root.model.batchSize() * 1000000 );
                                                    $root.calculationFillWtShell();
                                                    tab100(per_tab() / $root.model.fillWtShell());
                                                    } }" class="form-control">
                                            </td>
                                            <td>
                                                <input type="number" data-bind="value: overage, event: { change: function() {
                                                    per_tab((per_unit() / (purity() / 100) * (1 + (overage() / 100)) ));
                                                    per_batch(per_tab() * $root.model.batchSize() * 1000000 );
                                                    $root.calculationFillWtShell();
                                                    tab100(per_tab() / $root.model.fillWtShell());
                                                    } }" class="form-control">
                                            </td>
                                            
                                            <td data-bind="text: per_tab() ? numeral(per_tab()).format('0,0.00') : 0"></td>
                                            <td data-bind="text: per_batch() ? numeral(per_batch()).format('0,0.00') : 0"></td>
                                            <td data-bind="text: tab100() ? numeral(tab100()).format('0,0.00') : 0"></td>
                                        </tr>
                                        <!-- /ko -->
                                        <tr>
                                            <td colspan="7"></td>
                                            <td data-bind="text: numeral($root.model.fillWtShell()).format('0,0.00')"></td>
                                            <td data-bind="text: numeral($root.model.sumPerBatchShell()).format('0,0.00')"></td>
                                            <td data-bind="text: numeral($root.model.sumTabShell()).format('0,0.00')"></td>
                                        </tr>
                                    </tbody>
                                    <tbody class="table-inactive">
                                        <tr >
                                            <td colspan="12"><b>Active Ingredients</b></td>
                                        </tr>
                                        <!-- ko foreach: arraySalesOrderIngredientsActive -->
                                        <tr data-bind="attr: { 'data-id': id }">
                                            <td data-bind="text: ($index() + 1)"></td>
                                            <td data-bind="text: code"></td>
                                            <td data-bind="text: name_ingredient"></td>
                                            <td>
                                                <input type="number" data-bind="value: per_serving, event: { change: function() {
                                                    per_unit(per_serving() / $root.model.servingSize());
                                                    } }" class="form-control">
                                            </td>
                                            <td data-bind="text: numeral(per_unit()).format('0,0.00') "></td>
                                            <td>
                                                <input type="number" data-bind="value: purity, event: { change: function() {
                                                    per_tab((per_unit() / (purity() / 100) * (1 + (overage() / 100)) ));
                                                    per_batch(per_tab() * $root.model.batchSize() * 1000000 );
                                                    $root.calculationFillWtInActive();
                                                    tab100(per_tab() / $root.model.fillWtInActive());
                                                    } }" class="form-control">
                                            </td>
                                            <td>
                                                <input type="number" data-bind="value: overage, event: { change: function() {
                                                    per_tab((per_unit() / (purity() / 100) * (1 + (overage() / 100)) ));
                                                    per_batch(per_tab() * $root.model.batchSize() * 1000000 );
                                                    $root.calculationFillWtInActive();
                                                    tab100(per_tab() / $root.model.fillWtInActive());
                                                    } }" class="form-control">
                                            </td>
                                            
                                            <td data-bind="text: per_tab() ? numeral(per_tab()).format('0,0.00') : 0"></td>
                                            <td data-bind="text: per_batch() ? numeral(per_batch()).format('0,0.00') : 0"></td>
                                            <td data-bind="text: tab100() ? numeral(tab100()).format('0,0.00') : 0"></td>
                                        </tr>
                                        <!-- /ko -->
                                        <tr >
                                            <td colspan="12"><b>Inactive Ingredients</b></td>
                                        </tr>
                                        <!-- ko foreach: arraySalesOrderIngredientsInActive -->
                                        <tr data-bind="attr: { 'data-id': id }">
                                            <td data-bind="text: ($index() + 1)"></td>
                                            <td data-bind="text: code"></td>
                                            <td data-bind="text: name_ingredient"></td>
                                            <td>
                                                <input type="number" data-bind="value: per_serving, event: { change: function() {
                                                    per_unit(per_serving() / $root.model.servingSize());
                                                    } }" class="form-control">
                                            </td>
                                            <td data-bind="text: numeral(per_unit()).format('0,0.00') "></td>
                                            <td>
                                                <input type="number" data-bind="value: purity, event: { change: function() {
                                                    per_tab((per_unit() / (purity() / 100) * (1 + (overage() / 100)) ));
                                                    per_batch(per_tab() * $root.model.batchSize() * 1000000 );
                                                    $root.calculationFillWtInActive();
                                                    tab100(per_tab() / $root.model.fillWtInActive());
                                                    } }" class="form-control">
                                            </td>
                                            <td>
                                                <input type="number" data-bind="value: overage, event: { change: function() {
                                                    per_tab((per_unit() / (purity() / 100) * (1 + (overage() / 100)) ));
                                                    per_batch(per_tab() * $root.model.batchSize() * 1000000 );
                                                    $root.calculationFillWtInActive();
                                                    tab100(per_tab() / $root.model.fillWtInActive());
                                                    } }" class="form-control">
                                            </td>
                                            
                                            <td data-bind="text: per_tab() ? numeral(per_tab()).format('0,0.00') : 0"></td>
                                            <td data-bind="text: per_batch() ? numeral(per_batch()).format('0,0.00') : 0"></td>
                                            <td data-bind="text: tab100() ? numeral(tab100()).format('0,0.00') : 0"></td>
                                        </tr>
                                        <!-- /ko -->

                                        <tr>
                                            <td colspan="6"></td>
                                            <td>Fill Wt</td>
                                            <td data-bind="text: numeral($root.model.fillWtInActive()).format('0,0.00')"></td>
                                            <td data-bind="text: numeral($root.model.sumPerBatchInActive()).format('0,0.00')"></td>
                                            <td data-bind="text: numeral($root.model.sumTabInActive()).format('0,0.00')"></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </form>
                    <form id="dataprint"  class="d-none">
                        <div>
                            <div><b class="manufature-name"></b></div>
                            <div class="manufature-address"></div>
                            <div class="manufature-phone"></div><br>
                        </div>
                        <div>
                            1. Product: <span class="product-name"></span>
                        </div>
                        <div>
                            2. Customer: <span class="customer-full-name"></span>
                        </div>
                        <div>
                            3. P.O: <span class="po"></span>
                        </div>
                        <div>
                            4. Formula: <span class="formula-number"></span>
                        </div>
                        <div >
                            5. Revision: <span class="revision"></span>
                        </div>
                        <div>
                            6. Date: <span class="show-date"></span>
                        </div>
                        <div>
                            <h4>Softgel Specification</h4>
                        </div>
                        <div>
                            7. Size/Type: <span class="size-type"></span>
                        </div>
                        <div>
                            8. Color/Logo: <span class="color-logo"></span>
                        </div>
                        <div >
                            9. Filling Wt: <span data-bind="text: numeral($root.model.fillWtInActive()).format('0,0.00')"></span>
                        </div>
                        <div >
                            10. Serving Size: <span class="serving_size"></span>
                        </div>
                        <div>
                            11. Gelatin Batch: <span class="gelatin_batch"></span>
                        </div>
                        <div>
                            12. Batch size: <span class="batch_size" data-bind="text: model.batchSize"></span>
                        </div>
                        <div >
                            13. 
                        </div>
                        <div >
                            <div >
                                <table style="width: 100%">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>RW No.</th>
                                            <th>Ingredients *</th>
                                            <th>Wt (mg) <br>per Serving</th>
                                            <th  width="15%">Wt (mg) <br>per Unit</th>
                                            <th width="10%">Purity %</th>
                                            <th width="10%">Overage %</th>
                                            <th>Input <br>Wt/mg per tab</th>
                                            <th>Input <br>Wt/kg per batch</th>
                                            <th>%Tab</th>
                                        </tr>
                                    </thead>
                                    <tbody class="table-color">
                                        <tr colspan="12">
                                                <td colspan="12"><b>Color</b></td>
                                        </tr>
                                        <!-- ko foreach: arraySalesOrderIngredientsColor -->
                                        <tr data-bind="attr: { 'data-id': id }">
                                            <td data-bind="text: ($index() + 1)"></td>
                                            <td data-bind="text: code"></td>
                                            <td data-bind="text: name_ingredient"></td>
                                            <td data-bind="text: per_serving"></td>
                                            <td data-bind="text: per_unit">
                                            </td>
                                            <td data-bind="text: purity">
                                            </td>
                                            <td data-bind="text: overage">
                                            </td>
                                            <td data-bind="text: per_tab() ? numeral(per_tab()).format('0,0.00') : 0"></td>
                                            <td data-bind="text: per_batch() ? numeral(per_batch()).format('0,0.00') : 0"></td>
                                            <td data-bind="text: tab100() ? numeral(tab100()).format('0,0.00') : 0"></td>
                                        </tr>
                                        <!-- /ko -->
                                        <tr>
                                            <td colspan="7"></td>
                                            <td data-bind="text: numeral($root.model.fillWtColor()).format('0,0.00')"></td>
                                            <td data-bind="text: numeral($root.model.sumPerBatch()).format('0,0.00')"></td>
                                            <td data-bind="text: numeral($root.model.sumTab()).format('0,0.00')"></td>
                                        </tr>
                                    </tbody>
                                    <tbody class="table-shell">
                                        <tr >
                                            <td colspan="12"><b>Shell</b></td>
                                        </tr>
                                            <!-- ko foreach: arraySalesOrderIngredientsShell -->
                                        <tr data-bind="attr: { 'data-id': id }">
                                            <td data-bind="text: ($index() + 1)"></td>
                                            <td data-bind="text: code"></td>
                                            <td data-bind="text: name_ingredient"></td>
                                            <td data-bind="text: per_serving"></td>
                                            <td data-bind="text: per_unit">
                                            </td>
                                            <td data-bind="text: purity">
                                            </td>
                                            <td data-bind="text: overage">
                                            </td>
                                            
                                            <td data-bind="text: per_tab() ? numeral(per_tab()).format('0,0.00') : 0"></td>
                                            <td data-bind="text: per_batch() ? numeral(per_batch()).format('0,0.00') : 0"></td>
                                            <td data-bind="text: tab100() ? numeral(tab100()).format('0,0.00') : 0"></td>
                                        </tr>
                                        <!-- /ko -->
                                        <tr>
                                            <td colspan="7"></td>
                                            <td data-bind="text: numeral($root.model.fillWtShell()).format('0,0.00')"></td>
                                            <td data-bind="text: numeral($root.model.sumPerBatchShell()).format('0,0.00')"></td>
                                            <td data-bind="text: numeral($root.model.sumTabShell()).format('0,0.00')"></td>
                                        </tr>
                                    </tbody>
                                    <tbody class="table-inactive">
                                        <tr >
                                            <td colspan="12"><b>Active Ingredients</b></td>
                                        </tr>
                                        <!-- ko foreach: arraySalesOrderIngredientsActive -->
                                        <tr data-bind="attr: { 'data-id': id }">
                                            <td data-bind="text: ($index() + 1)"></td>
                                            <td data-bind="text: code"></td>
                                            <td data-bind="text: name_ingredient"></td>
                                            <td data-bind="text: per_serving"></td>
                                            <td data-bind="text: per_unit">
                                            </td>
                                            <td data-bind="text: purity">
                                            </td>
                                            <td data-bind="text: overage">
                                            </td>
                                            <td data-bind="text: per_tab() ? numeral(per_tab()).format('0,0.00') : 0"></td>
                                            <td data-bind="text: per_batch() ? numeral(per_batch()).format('0,0.00') : 0"></td>
                                            <td data-bind="text: tab100() ? numeral(tab100()).format('0,0.00') : 0"></td>
                                        </tr>
                                        <!-- /ko -->
                                        <tr >
                                            <td colspan="12"><b>Inactive Ingredients</b></td>
                                        </tr>
                                        <!-- ko foreach: arraySalesOrderIngredientsInActive -->
                                        <tr data-bind="attr: { 'data-id': id }">
                                            <td data-bind="text: ($index() + 1)"></td>
                                            <td data-bind="text: code"></td>
                                            <td data-bind="text: name_ingredient"></td>
                                            <td data-bind="text: per_serving"></td>
                                            <td data-bind="text: per_unit">
                                            </td>
                                            <td data-bind="text: purity">
                                            </td>
                                            <td data-bind="text: overage">
                                            </td>
                                            <td data-bind="text: per_tab() ? numeral(per_tab()).format('0,0.00') : 0"></td>
                                            <td data-bind="text: per_batch() ? numeral(per_batch()).format('0,0.00') : 0"></td>
                                            <td data-bind="text: tab100() ? numeral(tab100()).format('0,0.00') : 0"></td>
                                        </tr>
                                        <!-- /ko -->

                                        <tr>
                                            <td colspan="6"></td>
                                            <td>Fill Wt</td>
                                            <td data-bind="text: numeral($root.model.fillWtInActive()).format('0,0.00')"></td>
                                            <td data-bind="text: numeral($root.model.sumPerBatchInActive()).format('0,0.00')"></td>
                                            <td data-bind="text: numeral($root.model.sumTabInActive()).format('0,0.00')"></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </form>

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
        var dataListIngredients = [];
        self.arraySalesOrderIngredientsColor = ko.observableArray([]);
        self.arraySalesOrderIngredientsShell = ko.observableArray([]);
        self.arraySalesOrderIngredientsActive = ko.observableArray([]);
        self.arraySalesOrderIngredientsInActive = ko.observableArray([]);
        self.model = {
            servingSize: ko.observable(0),
            gelatinBatch: ko.observable(0),
            batchSize: ko.observable(0),
            fillWt: ko.observable(0),
            fillWtColor: ko.observable(0),
            sumPerBatch: ko.observable(0),
            sumTab: ko.observable(0),

            fillWtShell: ko.observable(0),
            sumPerBatchShell: ko.observable(0),
            sumTabShell: ko.observable(0),

            fillWtInActive: ko.observable(0),
            sumPerBatchInActive: ko.observable(0),
            sumTabInActive: ko.observable(0),
        }
        self.calculationFillWt = function() {
            var fillWt = 0,  sumPerBatch = 0,  sumTab= 0;
            var arr = self.arraySalesOrderIngredientsColor();

            $.each(arr, function( index, value ) {
                fillWt += value.per_tab();
                sumPerBatch += value.per_batch();
                sumTab += value.tab100();
            });
            self.model.fillWtColor(fillWt);
            self.model.sumPerBatch(sumPerBatch);
            self.model.sumTab(sumTab);
        }
        self.calculationFillWtShell = function() {
            var fillWt = 0,  sumPerBatch = 0,  sumTab= 0;
            var arr = self.arraySalesOrderIngredientsShell();

            $.each(arr, function( index, value ) {
                fillWt += value.per_tab();
                sumPerBatch += value.per_batch();
                sumTab += value.tab100();
            });
            self.model.fillWtShell(fillWt);
            self.model.sumPerBatchShell(sumPerBatch);
            self.model.sumTabShell(sumTab);
        }
        self.calculationFillWtInActive = function() {
            var fillWt = 0,  sumPerBatch = 0,  sumTab= 0;
            var arr = self.arraySalesOrderIngredientsActive().concat(self.arraySalesOrderIngredientsInActive());

            $.each(arr, function( index, value ) {
                fillWt += value.per_tab();
                sumPerBatch += value.per_batch();
                sumTab += value.tab100();
            });
            self.model.fillWtInActive(fillWt);
            self.model.sumPerBatchInActive(sumPerBatch);
            self.model.sumTabInActive(sumTab);
        }
        self.calculationArray = function() {
            var arr = self.arraySalesOrderIngredientsActive();
            var arr2 = self.arraySalesOrderIngredientsInActive();

            $.each(arr, function( index, value ) {
                value.per_unit(value.per_serving() / self.model.servingSize());
            });
            $.each(arr2, function( index, value ) {
                value.per_unit(value.per_serving() / self.model.servingSize());
            });
        }
        $(document).ready(function() {

            $("#print").click(function(){
                showDataCustomRequest();
                var po = formDataView.find("input[name=po]").val();
                var serving_size = formDataView.find("input[name=serving_size]").val();
                var gelatin_batch = formDataView.find("input[name=gelatin_batch]").val();
                var batch_size = formDataView.find("input[name=batch_size]").val();
                formDataPrint.find(".po").html(po);
                formDataPrint.find(".serving_size").html(serving_size);
                formDataPrint.find(".gelatin_batch").html(gelatin_batch);
                formDataPrint.find(".batch_size").html(batch_size);
                print("dataprint");
            });

            formCustomRequest.find("select[name=custom_request]").change(function() {
                var id = $(this).val();
                if (id) {
                    sendData("GET", '{{ route('admin.report.getcustomrequest') }}', { id: id }, function(res) {
                        showDataCustomRequest(res);
                    });
                } else 
                    formDataView.addClass("d-none");
            });
        });
        var showDataCustomRequest = function(data) {

            if (!data) return false;
            
            formDataView.removeClass("d-none");

            if (data.customRequest) {
                var customRequest = data.customRequest;
                self.model.batchSize(customRequest.order);
                formDataView.find(".product-name").html(customRequest.product);
                formDataView.find(".customer-full-name").html(customRequest.customer);
                formDataView.find(".formula-number").html(customRequest.formula_number);
                formDataView.find(".revision").html(customRequest.revision);
                formDataView.find(".show-date").html(moment(customRequest.date).format('MM/DD/YYYY'));
                formDataView.find(".size-type").html(customRequest.size_type);
                formDataView.find(".color-logo").html(customRequest.color_logo);

                formDataPrint.find(".product-name").html(customRequest.product);
                formDataPrint.find(".customer-full-name").html(customRequest.customer);
                formDataPrint.find(".formula-number").html(customRequest.formula_number);
                formDataPrint.find(".revision").html(customRequest.revision);
                formDataPrint.find(".show-date").html(moment(customRequest.date).format('MM/DD/YYYY'));
                formDataPrint.find(".size-type").html(customRequest.size_type);
                formDataPrint.find(".color-logo").html(customRequest.color_logo);
                formDataPrint.find(".batch_size").html(customRequest.order);
            }
            if (data.manufature) {
                var manufature = data.manufature;
                formDataView.find(".manufature-name").html(manufature.name);
                formDataView.find(".manufature-address").html(manufature.address);
                formDataView.find(".manufature-phone").html(manufature.phone);

                formDataPrint.find(".manufature-name").html(manufature.name);
                formDataPrint.find(".manufature-address").html(manufature.address);
                formDataPrint.find(".manufature-phone").html(manufature.phone);
            }
            
        
            if (data.salesOrderIngredients) {
                var dataSalesOrderIngredients = data.salesOrderIngredients;
                dataListIngredients = data.salesOrderIngredients;
                var arrayIngredientsColor = [];
                var arrayIngredientsShell = [];
                var arrayIngredientsActive = [];
                var arrayIngredientsInActive = [];

                for (var i = 0; i < dataSalesOrderIngredients.length; i++) {
                    var item = dataSalesOrderIngredients[i];

                    
                    if (item.ingredient.inactive == 0) {
                        item.per_serving = ko.observable(item.per_serving);
                        item.per_unit = ko.observable(0);
                        item.purity = ko.observable(0);
                        item.overage = ko.observable(0);
                        item.per_tab = ko.observable(0);
                        item.per_batch = ko.observable(0);
                        item.tab100 = ko.observable(0);
                        arrayIngredientsActive.push(item);
                    }
                    if (item.ingredient.inactive == 1) {
                        item.per_serving = ko.observable(item.per_serving);
                        item.per_unit = ko.observable(0);
                        item.purity = ko.observable(0);
                        item.overage = ko.observable(0);
                        item.per_tab = ko.observable(0);
                        item.per_batch = ko.observable(0);
                        item.tab100 = ko.observable(0);
                        arrayIngredientsInActive.push(item);
                    }
                    if (item.ingredient.inactive == 2) {
                        item.per_serving = ko.observable(0);
                        item.per_unit = ko.observable(0);
                        item.purity = ko.observable(0);
                        item.overage = ko.observable(0);
                        item.per_tab = ko.observable(0);
                        item.per_batch = ko.observable(0);
                        item.tab100 = ko.observable(0);
                        arrayIngredientsColor.push(item);
                    }
                    if (item.ingredient.inactive == 3) {
                        item.per_serving = ko.observable(0);
                        item.per_unit = ko.observable(0);
                        item.purity = ko.observable(0);
                        item.overage = ko.observable(0);
                        item.per_tab = ko.observable(0);
                        item.per_batch = ko.observable(0);
                        item.tab100 = ko.observable(0);
                        arrayIngredientsShell.push(item);
                    }
                }
                self.arraySalesOrderIngredientsColor(arrayIngredientsColor);
                self.arraySalesOrderIngredientsShell(arrayIngredientsShell);
                self.arraySalesOrderIngredientsActive(arrayIngredientsActive)
                self.arraySalesOrderIngredientsInActive(arrayIngredientsInActive)
            }

        
        }
        
        var showDataTableIngredients = function(data) {
            formDataView.find(".table-ingredients").html("");
            var str = "";
            var strPrint = "";
            
            for (var i = 0; i < data.length; i++) {
                str += "<tr data-id='" + data[i].id + "'><td>" + (i + 1)  + 
                    "</td><td>" + data[i].code + 
                    "</td><td>" + data[i].name_ingredient + 
                    "</td><td class='per_serving'>" +numeral(data[i].per_serving).format("0,0.00") + 
                    "</td><td class='req_wt'>" + data[i].req_wt + 
                    "</td><td><input type='number'  class='form-control purity' value='"+ data[i].purity  +"'></td>" + 
                    "<td><input type='number' class='form-control overage' value='"+ data[i].overage  +"'></td>" + 
                    "<td class='input_wtmg'>" + numeral(data[i].input_wtmg).format("0,0.00") + 
                    "</td><td class='input_wt_per_batch'>" + numeral(data[i].input_wt_per_batch).format("0,0.0000") + 
                    "</td><td class='percent_softgel'>" + numeral(data[i].percent_softgel).format("0,0.00") + 
                    "</td><td><input type='number' class='form-control density' value='"+ data[i].density  +"'></td>" + 
                    "<td class='volum'>" + numeral(data[i].volum).format("0,0.00") + 
                    "</td></tr>";

                strPrint += "<tr><td>" + (i + 1)  + 
                    "</td><td>" + data[i].code + 
                    "</td><td>" + data[i].name_ingredient + 
                    "</td><td>" + numeral(data[i].per_serving).format("0,0.00") + 
                    "</td><td>" + data[i].req_wt + 
                    "</td><td> " + data[i].purity + "</td>" + 
                    "<td>"+ data[i].overage +"</td>" + 
                    "<td>" + numeral(data[i].input_wtmg).format("0,0.00") + 
                    "</td><td>" + numeral(data[i].input_wt_per_batch).format("0,0.0000") + 
                    "</td><td>" + numeral(data[i].percent_softgel).format("0,0.00") + 
                    "</td><td>"+ data[i].density  +"</td>" + 
                    "<td>" + numeral(data[i].volum).format("0,0.00") + 
                    "</td></tr>";
            }
            formDataView.find(".table-ingredients").html(str);
            formDataPrint.find(".table-ingredients").html(strPrint);
            // calculationFillWt();
        }

        var checkThreeInputOver = function() {
            var serving_size = formDataView.find("input[name=serving_size]").val();
            var gelatin_batch = formDataView.find("input[name=gelatin_batch]").val();            
            var batch_size = formDataView.find("input[name=batch_size]").val();
            var res = 1;

            if (serving_size == "" || serving_size == undefined) res = 0 ;
            if (gelatin_batch == "" || gelatin_batch == undefined) res = 0 ;
            if (batch_size == "" || batch_size == undefined) res = 0 ;

            return res;
        }

        var calculationInputWtmg = function(req_wt, purity, overage) {
            if (req_wt == "" || req_wt == undefined) req_wt = 0;
            if (purity == "" || purity == undefined) purity = 0;
            if (overage == "" || overage == undefined) overage = 0;

            var tuSo = Number(req_wt);
            var mauSo = (Number(purity)/100) * (1 + (Number(overage)/100) );

            return mauSo == 0 ? 0 : ( tuSo / mauSo );
        }
        
        var calculationInputWtPerBatch = function(input_wtmg, batch_size) {
            if (input_wtmg == "" || input_wtmg == undefined) input_wtmg = 0;
            if (batch_size == "" || batch_size == undefined) batch_size = 0;

            return Number(input_wtmg) * Number(batch_size) / 1000000;
        }

        var calculationPercentSoftgel = function(input_wtmg, fill_wt) {
            if (input_wtmg == "" || input_wtmg == undefined) input_wtmg = 0;
            if (fill_wt == "" || fill_wt == undefined) fill_wt = 0;

            return fill_wt != 0 ? Number(input_wtmg) / Number(fill_wt) * 100 : 0;
        }

        var calculationVolum = function(input_wtmg, density) {
            if (input_wtmg == "" || input_wtmg == undefined) input_wtmg = 0;
            if (density == "" || density == undefined) density = 0;

            return density != 0 ? Number(input_wtmg) / Number(density) : 0 ;
        }

        var calculationFillWt2 = function() {
            alert("0000");
            var fillWt = 0, sum_input_wt_per_batch = 0, sum_percent_softgel = 0, total = 0;
            var arr = self.arraySalesOrderIngredientsColor();

            $.each(arr, function( index, value ) {
                console.log(value);
            });

            // for (var i = 0; i < dataListIngredients.length; i++) {
            //     fillWt += Number(dataListIngredients[i].input_wtmg);
                // sum_input_wt_per_batch += Number(dataListIngredients[i].input_wt_per_batch);
                // sum_percent_softgel += Number(dataListIngredients[i].percent_softgel);
                // total += Number(dataListIngredients[i].volum);
            // }
            // formDataView.find(".filling-wt").html(numeral(fillWt).format("0,0.00"));
            // formDataView.find(".fill_wt").html(numeral(fillWt).format("0,0.00"));
            // formDataView.find(".sum_input_wt_per_batch").html(numeral(sum_input_wt_per_batch).format("0,0.00"));
            // formDataView.find(".sum_percent_softgel").html(numeral(sum_percent_softgel).format("0,0.00"));
            // formDataView.find(".total").html(numeral(total).format("0,0.00"));

            // formDataPrint.find(".filling-wt").html(numeral(fillWt).format("0,0.00"));
            // formDataPrint.find(".fill_wt").html(numeral(fillWt).format("0,0.00"));
            // formDataPrint.find(".sum_input_wt_per_batch").html(numeral(sum_input_wt_per_batch).format("0,0.00"));
            // formDataPrint.find(".sum_percent_softgel").html(numeral(sum_percent_softgel).format("0,0.00"));
            // formDataPrint.find(".total").html(numeral(total).format("0,0.00"));
        }

        
        

       
    }
     // Activates knockout.js
     ko.applyBindings(new AppViewModel());
    
</script>
@endsection
