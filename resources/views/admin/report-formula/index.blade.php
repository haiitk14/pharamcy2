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
                        <button data-bind="click: save" class="btn btn-outline-primary" title="Save Form" type="button">
                            <i class="fa fa-save" aria-hidden="true"></i>
                            {{ __('Save') }}
                        </button>
                    </div>
                    <form id="formcustomrequest">
                        <div class="row form-group">
                            <label for="address" class="col-sm-2 col-form-label">Select Custom Request</label>
                            <div class="col-sm-6">
                                <select class="form-control" title="Select Custom Request" name="custom_request" title="{{ __('Select Custom Request') }}">
                                    <option value="">{{ __('None') }}</option>
                                    @foreach ($data['customRequests'] as $customRequest)
                                    <option value="{{ $customRequest->id }}">{{ Auth::user()->username }}{{ $customRequest->formula_number }} </option>
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
                                <input type="number" data-bind="value: model.servingSize, event: { change : $root.eventChange }" name="serving_size" value="0"  class="form-control" title="Enter Serving Size" placeholder="Enter Serving Size" >
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
                            <div class="col-sm-8 col-form-label" data-bind="text: numeral(model.batchSize()).format('0,0')">
                            </div>
                           
                        </div>
                        <div class="row form-group">
                            <label for="order" class="col-sm-2 col-form-label">13. </label>
                            <div class="col-sm-6">
                                <select class="form-control" name="ingredient_formula"  title="Choose Ingredient">
                                    <option value="">None</option>
                                    <optgroup label="Color">
                                        @foreach ($data['ingredients'] as $ingredient)
                                            @if ($ingredient->inactive == 2)
                                                <option value="{{ $ingredient->id }}">{{ $ingredient->name }}</option>
                                            @endif
                                        @endforeach
                                    </optgroup>
                                    <optgroup label="Shell">
                                        @foreach ($data['ingredients'] as $ingredient)
                                            @if ($ingredient->inactive == 3)
                                                <option value="{{ $ingredient->id }}">{{ $ingredient->name }}</option>
                                            @endif
                                        @endforeach
                                    </optgroup>
                                    <optgroup label="Active">
                                        @foreach ($data['ingredients'] as $ingredient)
                                            @if ($ingredient->inactive == 0)
                                                <option value="{{ $ingredient->id }}">{{ $ingredient->name }}</option>
                                            @endif
                                        @endforeach
                                    </optgroup>
                                    <optgroup label="InActive">
                                        @foreach ($data['ingredients'] as $ingredient)
                                            @if ($ingredient->inactive == 1)
                                                <option value="{{ $ingredient->id }}">{{ $ingredient->name }}</option>
                                            @endif
                                        @endforeach
                                    </optgroup>
                                </select>
                            </div>
                            <div class="col-sm-2">
                                <a href="javascript:;" id="add-ingredient" title="Add Ingredient" class="btn btn-outline-primary"><i class="fa fa-plus"></i> Add</a>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-sm-12 table-responsive">
                                <table class="table table-bordered table-sm">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>RW No.</th>
                                            <th width="14%">Ingredients *</th>
                                            <th>Wt (mg) <br>per Serving</th>
                                            <th width="12%">Wt (mg) <br>per Unit</th>
                                            <th width="10%">Purity %</th>
                                            <th width="10%">Overage %</th>
                                            <th>Input <br>Wt/mg per tab</th>
                                            <th>Input <br>Wt/kg per batch</th>
                                            <th>%Tab</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody class="table-color">
                                        <tr colspan="13">
                                                <td colspan="12"><b>Color</b></td>
                                        </tr>
                                        <!-- ko foreach: arraySalesOrderIngredientsColor -->
                                        <tr data-bind="attr: { 'data-id': id }">
                                            <td data-bind="text: ($index() + 1)"></td>
                                            <td data-bind="text: code"></td>
                                            <td data-bind="text: name_ingredient"></td>
                                            <td data-bind="text: per_serving() ? numeral(per_serving()).format('0,0.00') : 0"></td>
                                            <td>
                                                <input type="number" data-bind="value: per_unit, event: { change : $root.eventChange }" class="form-control">
                                            </td>
                                            <td>
                                                <input type="number" data-bind="value: purity, event: { change : $root.eventChange }" class="form-control">
                                            </td>
                                            <td>
                                                <input type="number" data-bind="value: overage, event: { change : $root.eventChange }" class="form-control">
                                            </td>
                                            
                                            <td data-bind="text: per_tab() ? numeral(per_tab()).format('0,0.00') : 0"></td>
                                            <td data-bind="text: per_batch() ? numeral(per_batch()).format('0,0.0000') : 0 "></td>
                                            <td data-bind="text: tab100() ? numeral(tab100()).format('0,0.00') : 0"></td>
                                            <td class='text-center'> 
                                                <a href='javascript:;' data-bind="click: $root.removeColor" title='Delete Item'>
                                                    <i class='fa fa-lg fa-trash' aria-hidden='true'></i>
                                                </a> 
                                            </td>
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
                                            <td colspan="13"><b>Shell</b></td>
                                        </tr>
                                            <!-- ko foreach: arraySalesOrderIngredientsShell -->
                                        <tr data-bind="attr: { 'data-id': id }">
                                            <td data-bind="text: ($index() + 1)"></td>
                                            <td data-bind="text: code"></td>
                                            <td data-bind="text: name_ingredient"></td>
                                            <td data-bind="text: per_serving() ? numeral(per_serving()).format('0,0.00') : 0"></td>
                                            <td>
                                                <input type="number" data-bind="value: per_unit, event: { change : $root.eventChange }" class="form-control">
                                            </td>
                                            <td>
                                                <input type="number" data-bind="value: purity, event: { change : $root.eventChange }" class="form-control">
                                            </td>
                                            <td>
                                                <input type="number" data-bind="value: overage, event: { change : $root.eventChange }" class="form-control">
                                            </td>
                                            
                                            <td data-bind="text: per_tab() ? numeral(per_tab()).format('0,0.00') : 0"></td>
                                            <td data-bind="text: per_batch() ? numeral(per_batch()).format('0,0.0000') : 0"></td>
                                            <td data-bind="text: tab100() ? numeral(tab100()).format('0,0.00') : 0"></td>
                                            <td class='text-center'> 
                                                <a href='javascript:;' data-bind="click: $root.removeShell" title='Delete Item'>
                                                    <i class='fa fa-lg fa-trash' aria-hidden='true'></i>
                                                </a> 
                                            </td>
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
                                            <td colspan="13"><b>Active Ingredients</b></td>
                                        </tr>
                                        <!-- ko foreach: arraySalesOrderIngredientsActive -->
                                        <tr data-bind="attr: { 'data-id': id }">
                                            <td data-bind="text: ($index() + 1)"></td>
                                            <td data-bind="text: code"></td>
                                            <td data-bind="text: name_ingredient"></td>
                                            <td>
                                                <input type="number" data-bind="value: per_serving, event: { change : $root.eventChange }" class="form-control">
                                            </td>
                                            <td data-bind="text: numeral(per_unit()).format('0,0.00') "></td>
                                            <td>
                                                <input type="number" data-bind="value: purity, event: { change : $root.eventChange }" class="form-control">
                                            </td>
                                            <td>
                                                <input type="number" data-bind="value: overage, event: { change : $root.eventChange }" class="form-control">
                                            </td>
                                            
                                            <td data-bind="text: per_tab() ? numeral(per_tab()).format('0,0.00') : 0"></td>
                                            <td data-bind="text: per_batch() ? numeral(per_batch()).format('0,0.0000') : 0"></td>
                                            <td data-bind="text: tab100() ? numeral(tab100()).format('0,0.00') : 0"></td>
                                            <td class='text-center'> 
                                                <a href='javascript:;' data-bind="click: $root.removeActive" title='Delete Item'>
                                                    <i class='fa fa-lg fa-trash' aria-hidden='true'></i>
                                                </a> 
                                            </td>
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
                                                <input type="number" data-bind="value: per_serving, event: { change : $root.eventChange }" class="form-control">
                                            </td>
                                            <td data-bind="text: numeral(per_unit()).format('0,0.00') "></td>
                                            <td>
                                                <input type="number" data-bind="value: purity, event: { change : $root.eventChange }" class="form-control">
                                            </td>
                                            <td>
                                                <input type="number" data-bind="value: overage, event: { change : $root.eventChange }" class="form-control">
                                            </td>
                                            
                                            <td data-bind="text: per_tab() ? numeral(per_tab()).format('0,0.00') : 0"></td>
                                            <td data-bind="text: per_batch() ? numeral(per_batch()).format('0,0.0000') : 0"></td>
                                            <td data-bind="text: tab100() ? numeral(tab100()).format('0,0.00') : 0"></td>
                                            <td class='text-center'> 
                                                <a href='javascript:;' data-bind="click: $root.removeInActive" title='Delete Item'>
                                                    <i class='fa fa-lg fa-trash' aria-hidden='true'></i>
                                                </a> 
                                            </td>
                                        </tr>
                                        <!-- /ko -->

                                        <tr>
                                            <td colspan="6"></td>
                                            <td class="text-danger">Fill Wt</td>
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
                            12. Batch size: <span class="batch_size" data-bind="text: numeral(model.batchSize).format('0,0.00')"></span>
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
                                            <td data-bind="text: per_serving() ? numeral(per_serving()).format('0,0.00') : 0"></td>
                                            <td data-bind="text: per_unit() ? numeral(per_unit()).format('0,0.00') : 0">
                                            </td>
                                            <td data-bind="text: purity() ? numeral(purity()).format('0,0.00') : 0">
                                            </td>
                                            <td data-bind="text: overage() ? numeral(overage()).format('0,0.00') : 0">
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
                                            <td data-bind="text: per_serving() ? numeral(per_serving()).format('0,0.00') : 0"></td>
                                            <td data-bind="text: per_unit() ? numeral(per_unit()).format('0,0.00') : 0">
                                            </td>
                                            <td data-bind="text: purity() ? numeral(purity()).format('0,0.00') : 0">
                                            </td>
                                            <td data-bind="text: overage() ? numeral(overage()).format('0,0.00') : 0">
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
                                            <td data-bind="text: per_serving() ? numeral(per_serving()).format('0,0.00') : 0"></td>
                                            <td data-bind="text: per_unit() ? numeral(per_unit()).format('0,0.00') : 0">
                                            </td>
                                            <td data-bind="text: purity() ? numeral(purity()).format('0,0.00') : 0">
                                            </td>
                                            <td data-bind="text: overage() ? numeral(overage()).format('0,0.00') : 0">
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
                                            <td data-bind="text: per_serving() ? numeral(per_serving()).format('0,0.00') : 0"></td>
                                            <td data-bind="text: per_unit() ? numeral(per_unit()).format('0,0.00') : 0">
                                            </td>
                                            <td data-bind="text: purity() ? numeral(purity()).format('0,0.00') : 0">
                                            </td>
                                            <td data-bind="text: overage() ? numeral(overage()).format('0,0.00') : 0">
                                            </td>
                                            <td data-bind="text: per_tab() ? numeral(per_tab()).format('0,0.00') : 0"></td>
                                            <td data-bind="text: per_batch() ? numeral(per_batch()).format('0,0.00') : 0"></td>
                                            <td data-bind="text: tab100() ? numeral(tab100()).format('0,0.00') : 0"></td>
                                        </tr>
                                        <!-- /ko -->
                                        <tr>
                                            <td colspan="6"></td>
                                            <td style="color: red">Fill Wt</td>
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
        var dataListIngredients =  {!! json_encode($data['ingredients']->toArray()) !!}; 

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
        self.removeColor = function() {
            self.arraySalesOrderIngredientsColor.remove(this);
        }
        self.removeShell = function() {
            self.arraySalesOrderIngredientsShell.remove(this);
        }
        self.removeInActive = function() {
            self.arraySalesOrderIngredientsInActive.remove(this);
        }
        self.removeActive = function() {
            self.arraySalesOrderIngredientsActive.remove(this);
        }
        self.save = function() {
            var idCustomRequest = formCustomRequest.find("select[name=custom_request]").val();
            var po = formDataView.find("input[name=po]").val();
            var servingSize = formDataView.find("input[name=serving_size]").val();
            var gelatinBatch = formDataView.find("input[name=gelatin_batch]").val();
            var arrActiveInActive =self.arraySalesOrderIngredientsActive().concat(self.arraySalesOrderIngredientsInActive());
            var arrColorShell = self.arraySalesOrderIngredientsColor().concat(self.arraySalesOrderIngredientsShell());
            var arrIngredients = ko.mapping.toJS(arrActiveInActive.concat(arrColorShell));

            var data = {
                idCustomRequest: idCustomRequest,
                po: po,
                filling_wt: self.model.fillWtInActive(),
                servingSize: servingSize,
                gelatinBatch: gelatinBatch,
                arrIngredients: JSON.stringify(arrIngredients),
            }
            sendData('POST', '{{ route('admin.report.saveformformula') }}', data, function(message){
                $.each(message, function (index, value) {
                    toastr.success(value);
                });
            });
        }
        self.eventChange = function() {
            var arrColor = self.arraySalesOrderIngredientsColor();
            var arrShell = self.arraySalesOrderIngredientsShell();
            var arrActive = self.arraySalesOrderIngredientsActive();
            var arrInActive = self.arraySalesOrderIngredientsInActive();

            var servingSize = self.model.servingSize() ? self.model.servingSize() : 0;
            var batchSize = self.model.batchSize() ? self.model.batchSize() : 0;
            var fillWt = 0,  sumPerBatch = 0,  sumTab= 0;
            var fillWtInActive = self.model.fillWtInActive() ? self.model.fillWtInActive() : 0;

            /* Change Active */
            var fillWtInActive = self.model.fillWtInActive() ? self.model.fillWtInActive() : 0;

            $.each(arrActive, function( index, value ) {
                var per_serving = value.per_serving() ? value.per_serving() : 0;
                var per_unit = value.per_unit() ? value.per_unit() : 0;
                var purity = value.purity() ? value.purity() : 0;
                var overage = value.overage() ? value.overage() : 0;
                var per_tab = value.per_tab() ? value.per_tab() : 0;
                var per_batch = value.per_batch() ? value.per_batch() : 0;
                var tab100 = value.tab100() ? value.tab100() : 0;

                value.per_unit(servingSize == 0 ? 0 : per_serving / servingSize);
                value.per_tab((value.per_unit() /  (purity == 0 ? 1 : (purity / 100)) * (1 + (overage / 100)) ));
                value.per_batch(value.per_tab() * batchSize / 1000000 );
                value.tab100(fillWtInActive == 0 ? 0 : (value.per_tab() / fillWtInActive) * 100);

                fillWt += value.per_tab();
                sumPerBatch += value.per_batch();
                sumTab += value.tab100();
            });
           
            /* end */
            /* Change InActive */
            $.each(arrInActive, function( index, value ) {
                var per_serving = value.per_serving() ? value.per_serving() : 0;
                var per_unit = value.per_unit() ? value.per_unit() : 0;
                var purity = value.purity() ? value.purity() : 0;
                var overage = value.overage() ? value.overage() : 0;
                var per_tab = value.per_tab() ? value.per_tab() : 0;
                var per_batch = value.per_batch() ? value.per_batch() : 0;
                var tab100 = value.tab100() ? value.tab100() : 0;

                value.per_unit(servingSize == 0 ? 0 : per_serving / servingSize);
                value.per_tab((value.per_unit() /  (purity == 0 ? 1 : (purity / 100)) * (1 + (overage / 100)) ));
                value.per_batch(value.per_tab() * batchSize / 1000000 );
                value.tab100(fillWtInActive == 0 ? 0 : (value.per_tab() / fillWtInActive) * 100);

                fillWt += value.per_tab();
                sumPerBatch += value.per_batch();
                sumTab += value.tab100();
            });
            /* end */
            self.model.fillWtInActive(fillWt);
            self.model.sumPerBatchInActive(sumPerBatch);
            self.model.sumTabInActive(sumTab);

            /* Change Color */
            var fillWtInActive = self.model.fillWtInActive() ? self.model.fillWtInActive() : 0;
            fillWt = 0,  sumPerBatch = 0,  sumTab= 0;

            $.each(arrColor, function( index, value ) {
                var per_unit = value.per_unit() ? value.per_unit() : 0;
                var purity = value.purity() ? value.purity() : 0;
                var overage = value.overage() ? value.overage() : 0;
                var per_tab = value.per_tab() ? value.per_tab() : 0;
                var per_batch = value.per_batch() ? value.per_batch() : 0;
                var tab100 = value.tab100() ? value.tab100() : 0;

                value.per_serving(per_unit * servingSize);
                value.per_tab((per_unit / (purity == 0 ? 1 : purity / 100) * (1 + (overage / 100)) ));
                value.per_batch(value.per_tab() * batchSize / 1000000 );
                value.tab100(fillWtInActive == 0 ? 0 : (value.per_tab() / fillWtInActive) * 100 );

                fillWt += value.per_tab();
                sumPerBatch += value.per_batch();
                sumTab += value.tab100();
            });
            self.arraySalesOrderIngredientsColor(arrColor);
            self.model.fillWtColor(fillWt);
            self.model.sumPerBatch(sumPerBatch);
            self.model.sumTab(sumTab);
            /* end */
            /* Change Shell */
            var fillWtShell= self.model.fillWtShell() ? self.model.fillWtShell() : 0;

            fillWt = 0,  sumPerBatch = 0,  sumTab= 0;
            $.each(arrShell, function( index, value ) {
                var per_unit = value.per_unit() ? value.per_unit() : 0;
                var purity = value.purity() ? value.purity() : 0;
                var overage = value.overage() ? value.overage() : 0;
                var per_tab = value.per_tab() ? value.per_tab() : 0;
                var per_batch = value.per_batch() ? value.per_batch() : 0;
                var tab100 = value.tab100() ? value.tab100() : 0;

                value.per_serving(per_unit * servingSize);
                value.per_tab((per_unit / (purity == 0 ? 1 : purity / 100) * (1 + (overage / 100)) ));
                value.per_batch(value.per_tab() * batchSize / 1000000 );
                value.tab100(fillWtShell == 0 ? 0 : (value.per_tab() / fillWtShell) * 100 );

                fillWt += value.per_tab();
                sumPerBatch += value.per_batch();
                sumTab += value.tab100();
            });
            self.arraySalesOrderIngredientsShell(arrShell);
            self.model.fillWtShell(fillWt);
            self.model.sumPerBatchShell(sumPerBatch);
            self.model.sumTabShell(sumTab);
            /* end */
            
        }
        $(document).ready(function() {

            $("#print").click(function(){
                // showDataCustomRequest();
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

            $("#add-ingredient").click(function(){
                var ingredient = formDataView.find("select[name=ingredient_formula]").val();

                if (ingredient == "") {
                    toastr.error('{{ __('The ingredient not empty.') }}');
                    return false;
                }
                
                var type = 0;

                $.each(dataListIngredients , function(index, item) { 

                    if (item.id == Number(ingredient)) {
                        type = item.inactive;
                        return false;
                    }
                });
                var arr = [];

                switch (Number(type)) {
                    case 0:
                        arr = self.arraySalesOrderIngredientsActive();
                        break;
                    case 1:
                        arr = self.arraySalesOrderIngredientsInActive();
                        break;
                    case 2:
                        arr = self.arraySalesOrderIngredientsColor();
                        break;
                    case 3:
                        arr = self.arraySalesOrderIngredientsShell();
                }
                
                if (checkItemExistArrayIngredients(arr, ingredient)) {
                    toastr.error('{{ __('The ingredient exist.') }}');
                    return false;
                }
                var obj = {
                    id: randomId(arr),
                    per_serving: ko.observable(0),
                    per_unit: ko.observable(0),
                    purity: ko.observable(0),
                    overage: ko.observable(0),
                    per_tab: ko.observable(0),
                    per_batch: ko.observable(0),
                    tab100: ko.observable(0),
                    ingredient_id: Number(ingredient),
                };

                $.each(dataListIngredients , function(index, item) { 
                    
                    if (item.id == ingredient) {
                        obj.code = item.code;
                        obj.name_ingredient = item.name;
                        obj.inactive = item.inactive;

                        switch (Number(item.inactive)) {
                            /* Active */
                            case 0: 
                                self.arraySalesOrderIngredientsActive.push(obj);
                                break;
                            /* InActive */
                            case 1:
                                self.arraySalesOrderIngredientsInActive.push(obj);
                                break;
                            /* Color */
                            case 2:
                                self.arraySalesOrderIngredientsColor.push(obj);;
                                break;
                            /* Shell */
                            case 3:
                                self.arraySalesOrderIngredientsShell.push(obj);
                                break;
                        }
                    }
                });
                formDataView.find("select[name=ingredient_formula]").val("");
            });
        });
        var showDataCustomRequest = function(data) {

            if (!data) return false;
            
            formDataView.removeClass("d-none");
            self.arraySalesOrderIngredientsActive([]);
            self.arraySalesOrderIngredientsInActive([]);
            self.arraySalesOrderIngredientsColor([]);
            self.arraySalesOrderIngredientsShell([]);

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

                for (var i = 0; i < dataSalesOrderIngredients.length; i++) {
                    var item = dataSalesOrderIngredients[i];
                    item.per_serving = ko.observable(item.per_serving);
                    item.per_unit = ko.observable(0);
                    item.purity = ko.observable(0);
                    item.overage = ko.observable(0);
                    item.per_tab = ko.observable(0);
                    item.per_batch = ko.observable(0);
                    item.tab100 = ko.observable(0);

                    switch(Number(item.ingredient.inactive)) {
                        case 0:
                            self.arraySalesOrderIngredientsActive.push(item);
                            break;
                        case 1:
                            self.arraySalesOrderIngredientsInActive.push(item);
                            break;
                        case 2:
                            item.per_serving = ko.observable(0);
                            self.arraySalesOrderIngredientsColor.push(item);
                            break;
                        case 3: 
                            item.per_serving = ko.observable(0);
                            self.arraySalesOrderIngredientsShell.push(item);
                            break;
                    }
                }
            }
        }
        var checkItemExistArrayIngredients = function(array, id) {
            var res = false;
            $.each(array , function(index, item) { 
                if (item.ingredient_id == Number(id)) {
                    res = true;
                    return false;
                }
            });
            return res;
        }
        var checkIdIngredients = function(array, id) {
            var res = true;
            $.each(array , function(index, item) { 
                if (item.id == id) {
                    return false;
                }
            });
            return res;
        }
        var randomId = function(array) {
            var id = parseInt((Math.random() * 1000000), 10);

            if (!checkIdIngredients(array, id)) {
                randomId(array);
            } 
            return id;
        }
       
    }
     // Activates knockout.js
     ko.applyBindings(new AppViewModel());
    
</script>
@endsection
