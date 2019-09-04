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
                            <h4>INVENTORY CHECK</h4>
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
                            <div class="col-sm-4" data-bind="text: reportFormula.po">
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
                            <label for="order" class="col-sm-2 col-form-label">7. Batch No.: </label>
                            <div class="col-sm-4">
                                <input type="text" data-bind="value: model.batchNo"  title="Enter Batch No" placeholder="Enter Batch No" class="form-control">
                            </div>
                        </div>
                        <div class="row form-group">
                            <label for="order" class="col-sm-2 col-form-label">8. Batch size: </label>
                            <div class="col-sm-8 col-form-label" > 
                                <span data-bind="text: numeral(customRequest.order()).format('0,0')"></span>  softgels
                            </div>
                        </div>
                        <div class="row form-group">
                            <label for="order" class="col-sm-2 col-form-label">9. </label>
                        </div>
                        <div class="row form-group">
                            <div class="col-sm-12 table-responsive">
                                <table class="table table-bordered table-sm">
                                    <thead>
                                        <tr>
                                            <th rowspan="2">No</th>
                                            <th rowspan="2">RW No.</th>
                                            <th rowspan="2">Ingredients</th>
                                            <th class="text-center" colspan="4">Quantity (in Kg)</th>
                                            <th rowspan="2">Checked</th>
                                        </tr>
                                        <tr>
                                            <th>Required</th>
                                            <th>in Stock</th>
                                            <th>Lot</th>
                                            <th>Purchased</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr >
                                            <td colspan="8"><b>Color</b></td>
                                        </tr>
                                        <!-- ko foreach: model.dataIngredientsColor -->
                                        <tr>
                                            <td data-bind="text: $index() + 1"></td>
                                            <td data-bind="text: code">
                                            </td>
                                            <td data-bind="text: name_ingredient">
                                            </td>
                                            <td data-bind="text: numeral(per_batch()).format('0,0.000')"></td>
                                            <td>
                                                <a href="javascript:;" data-bind="text: numeral(in_stock()).format('0,0.00'), click: $root.clickNumber.bind($data, 'in_stock')"></a>
                                            </td>
                                            <td>
                                                <a href="javascript:;" data-bind="text: numeral(lot()).format('0,0.00'), click: $root.clickNumber.bind($data, 'lot')"></a>
                                            </td>
                                            <td>
                                                <a href="javascript:;" data-bind="text: numeral(purchased()).format('0,0.00'), click: $root.clickNumber.bind($data, 'purchased')"></a>
                                            </td>
                                            <td>
                                                <a href="javascript:;" data-bind="text: numeral(checked()).format('0,0.00'), click: $root.clickNumber.bind($data, 'checked')"></a>
                                            </td>
                                        </tr>
                                        <!-- /ko -->
                                    </tbody>
                                    <tbody>
                                        <tr >
                                            <td colspan="8"><b>Shell</b></td>
                                        </tr>
                                        <!-- ko foreach: model.dataIngredientsShell -->
                                        <tr>
                                            <td data-bind="text: $index() + 1"></td>
                                            <td data-bind="text: code">
                                            </td>
                                            <td data-bind="text: name_ingredient">
                                            </td>
                                            <td data-bind="text: numeral(per_batch()).format('0,0.00')"></td>
                                            <td>
                                                <a href="javascript:;" data-bind="text: numeral(in_stock()).format('0,0.00'), click: $root.clickNumber.bind($data, 'in_stock')"></a>
                                            </td>
                                            <td>
                                                <a href="javascript:;" data-bind="text: numeral(lot()).format('0,0.00'), click: $root.clickNumber.bind($data, 'lot')"></a>
                                            </td>
                                            <td>
                                                <a href="javascript:;" data-bind="text: numeral(purchased()).format('0,0.00'), click: $root.clickNumber.bind($data, 'purchased')"></a>
                                            </td>
                                            <td>
                                                <a href="javascript:;" data-bind="text: numeral(checked()).format('0,0.00'), click: $root.clickNumber.bind($data, 'checked')"></a>
                                            </td>
                                        </tr>
                                        <!-- /ko -->
                                        <tr>
                                            <td colspan="3"></td>
                                            <td data-bind="text: numeral($root.model.sumPerBatchShell()).format('0,0.000')"></td>
                                        </tr>
                                    </tbody>
                                    <tbody>
                                        <tr >
                                            <td colspan="8"><b>Active Ingredients</b></td>
                                        </tr>
                                        <!-- ko foreach: model.dataIngredientsActive -->
                                        <tr>
                                            <td data-bind="text: $index() + 1"></td>
                                            <td data-bind="text: code">
                                            </td>
                                            <td data-bind="text: name_ingredient">
                                            </td>
                                            <td data-bind="text: numeral(per_batch()).format('0,0.00')"></td>
                                            <td>
                                                <a href="javascript:;" data-bind="text: numeral(in_stock()).format('0,0.00'), click: $root.clickNumber.bind($data, 'in_stock')"></a>
                                            </td>
                                            <td>
                                                <a href="javascript:;" data-bind="text: numeral(lot()).format('0,0.00'), click: $root.clickNumber.bind($data, 'lot')"></a>
                                            </td>
                                            <td>
                                                <a href="javascript:;" data-bind="text: numeral(purchased()).format('0,0.00'), click: $root.clickNumber.bind($data, 'purchased')"></a>
                                            </td>
                                            <td>
                                                <a href="javascript:;" data-bind="text: numeral(checked()).format('0,0.00'), click: $root.clickNumber.bind($data, 'checked')"></a>
                                            </td>
                                        </tr>
                                        <!-- /ko -->
                                        <tr >
                                            <td colspan="8"><b>Inactive Ingredients</b></td>
                                        </tr>
                                        <!-- ko foreach: model.dataIngredientsInActive -->
                                        <tr>
                                            <td data-bind="text: $index() + 1"></td>
                                            <td data-bind="text: code">
                                            </td>
                                            <td data-bind="text: name_ingredient">
                                            </td>
                                            <td data-bind="text: numeral(per_batch()).format('0,0.00')"></td>
                                            <td>
                                                <a href="javascript:;" data-bind="text: numeral(in_stock()).format('0,0.00'), click: $root.clickNumber.bind($data, 'in_stock')"></a>
                                            </td>
                                            <td>
                                                <a href="javascript:;" data-bind="text: numeral(lot()).format('0,0.00'), click: $root.clickNumber.bind($data, 'lot')"></a>
                                            </td>
                                            <td>
                                                <a href="javascript:;" data-bind="text: numeral(purchased()).format('0,0.00'), click: $root.clickNumber.bind($data, 'purchased')"></a>
                                            </td>
                                            <td>
                                                <a href="javascript:;" data-bind="text: numeral(checked()).format('0,0.00'), click: $root.clickNumber.bind($data, 'checked')"></a>
                                            </td>
                                        </tr>
                                        <!-- /ko -->
                                        <tr>
                                            <td colspan="3"></td>
                                            <td  data-bind="text: numeral($root.model.sumPricePerBatchInActive()).format('0,0.00')"></td>
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
                            <h4>INVENTORY CHECK</h4>
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
                            7. Batch No.: <span data-bind="text: model.batchNo"></span>
                        </div>
                        <div>
                            8. Batch size: <span data-bind="text: numeral(customRequest.order()).format('0,0')"></span>
                        </div>
                        <div >
                            9.
                        </div>
                        <div >
                            <table style="width: 100%">
                                <thead>
                                    <tr>
                                        <th rowspan="2">No</th>
                                        <th rowspan="2">RW No.</th>
                                        <th rowspan="2">Ingredients</th>
                                        <th class="text-center" colspan="4">Quantity (in Kg)</th>
                                        <th rowspan="2">Checked</th>
                                    </tr>
                                    <tr>
                                        <th>Required</th>
                                        <th>in Stock</th>
                                        <th>Lot</th>
                                        <th>Purchased</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr >
                                        <td colspan="8"><b>Color</b></td>
                                    </tr>
                                    <!-- ko foreach: model.dataIngredientsColor -->
                                    <tr>
                                        <td data-bind="text: $index() + 1"></td>
                                        <td data-bind="text: code">
                                        </td>
                                        <td data-bind="text: name_ingredient">
                                        </td>
                                        <td data-bind="text: numeral(per_batch()).format('0,0.000')"></td>
                                        <td data-bind="text: numeral(in_stock()).format('0,0.00')">
                                        </td>
                                        <td data-bind="text: numeral(lot()).format('0,0.00')">
                                        </td>
                                        <td data-bind="text: numeral(purchased()).format('0,0.00')">
                                        </td>
                                        <td data-bind="text: numeral(checked()).format('0,0.00')">
                                        </td>
                                    </tr>
                                    <!-- /ko -->
                                </tbody>
                                <tbody>
                                    <tr >
                                        <td colspan="8"><b>Shell</b></td>
                                    </tr>
                                    <!-- ko foreach: model.dataIngredientsShell -->
                                    <tr>
                                        <td data-bind="text: $index() + 1"></td>
                                        <td data-bind="text: code">
                                        </td>
                                        <td data-bind="text: name_ingredient">
                                        </td>
                                        <td data-bind="text: numeral(per_batch()).format('0,0.00')"></td>
                                        <td data-bind="text: numeral(in_stock()).format('0,0.00')">
                                        </td>
                                        <td data-bind="text: numeral(lot()).format('0,0.00')">
                                        </td>
                                        <td data-bind="text: numeral(purchased()).format('0,0.00')">
                                        </td>
                                        <td data-bind="text: numeral(checked()).format('0,0.00')">
                                        </td>
                                    </tr>
                                    <!-- /ko -->
                                    <tr>
                                        <td colspan="3"></td>
                                        <td data-bind="text: numeral($root.model.sumPerBatchShell()).format('0,0.000')"></td>
                                    </tr>
                                </tbody>
                                <tbody>
                                    <tr >
                                        <td colspan="8"><b>Active Ingredients</b></td>
                                    </tr>
                                    <!-- ko foreach: model.dataIngredientsActive -->
                                    <tr>
                                        <td data-bind="text: $index() + 1"></td>
                                        <td data-bind="text: code">
                                        </td>
                                        <td data-bind="text: name_ingredient">
                                        </td>
                                        <td data-bind="text: numeral(per_batch()).format('0,0.00')"></td>
                                        <td data-bind="text: numeral(in_stock()).format('0,0.00')">
                                        </td>
                                        <td data-bind="text: numeral(lot()).format('0,0.00')">
                                        </td>
                                        <td data-bind="text: numeral(purchased()).format('0,0.00')">
                                        </td>
                                        <td data-bind="text: numeral(checked()).format('0,0.00')">
                                        </td>
                                    </tr>
                                    <!-- /ko -->
                                    <tr >
                                        <td colspan="8"><b>Inactive Ingredients</b></td>
                                    </tr>
                                    <!-- ko foreach: model.dataIngredientsInActive -->
                                    <tr>
                                        <td data-bind="text: $index() + 1"></td>
                                        <td data-bind="text: code">
                                        </td>
                                        <td data-bind="text: name_ingredient">
                                        </td>
                                        <td data-bind="text: numeral(per_batch()).format('0,0.00')"></td>
                                        <td data-bind="text: numeral(in_stock()).format('0,0.00')">
                                        </td>
                                        <td data-bind="text: numeral(lot()).format('0,0.00')">
                                        </td>
                                        <td data-bind="text: numeral(purchased()).format('0,0.00')">
                                        </td>
                                        <td data-bind="text: numeral(checked()).format('0,0.00')">
                                        </td>
                                    </tr>
                                    <!-- /ko -->
                                    <tr>
                                        <td colspan="3"></td>
                                        <td  data-bind="text: numeral($root.model.sumPricePerBatchInActive()).format('0,0.00')"></td>
                                    </tr>
                                </tbody>
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

            batchNo: ko.observable(0),
        }

        self.reportFormula = {
            po: ko.observable(),
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
                case "in_stock":
                    self.model.numberUsing(obj.in_stock());
                    break;
                case "lot":
                    self.model.numberUsing(obj.lot());
                    break;
                case "purchased":
                    self.model.numberUsing(obj.purchased());
                    break;
                case "checked":
                    self.model.numberUsing(obj.checked());
                    break;
                default:
                    $("#modal-number").modal("hide");
                    break;
            }
            $("#modal-number").modal("show");
        }
        self.addNumber = function() {
            switch (self.model.checkNumber()) {
                case "in_stock":
                    self.posNumber().in_stock(numeral(self.model.numberUsing())._value);
                    break;
                case "lot":
                    self.posNumber().lot(numeral(self.model.numberUsing())._value);
                    break;
                case "purchased":
                    self.posNumber().purchased(numeral(self.model.numberUsing())._value);
                    break;
                case "checked":
                    self.posNumber().checked(numeral(self.model.numberUsing())._value);
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

            }
            $("#modal-string").modal("hide");
        }
        /* end */

        /* ----------- Event change input number ----------- */
        self.model.numberUsing.subscribe(function (data) {
            self.model.numberUsing(numeral(data).format("0,0.00"));
        });

        self.model.batchNo.subscribe(function (data) {
            self.model.batchNo(numeral(data).format("0,0.00"));
        });
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
                sum1 += per_batch;
            });
            self.model.sumPricePerBatchColor(sum1);
            var sum2 = 0; 

            $.each(arrShell, function( index, value ) {
                var per_batch = Number(value.per_batch());
                sum2 += per_batch;
            });
            self.model.sumPricePerBatchShell(sum2);
            var sum3 = 0; 

            $.each(arrActive, function( index, value ) {
                var per_batch = Number(value.per_batch());
                sum3 += per_batch;
            });

            $.each(arrInActive, function( index, value ) {
                var per_batch = Number(value.per_batch());
                sum3 += per_batch;
            });
            self.model.sumPricePerBatchInActive(sum1 + sum2 + sum3);
        }
        /* end */

        self.caculationAll = function() {
            self.caculationForm();
        }

        self.save = function() {
            var idCustomRequest = formCustomRequest.find("select[name=custom_request]").val();

            if (!idCustomRequest || idCustomRequest == undefined || idCustomRequest == "") {
                return false;
            }
            var po = self.reportFormula.po();
            var batchNo = self.model.batchNo();
            var listIngredientColorShell = self.model.dataIngredientsColor().concat(self.model.dataIngredientsShell());
            var listIngredientInActive = self.model.dataIngredientsActive().concat(self.model.dataIngredientsInActive());
            var listIngredient = listIngredientColorShell.concat(listIngredientInActive);
            listIngredient = ko.mapping.toJS(listIngredient);

            var data = {
                idCustomRequest: idCustomRequest,
                batchNo: batchNo,
                listIngredient: JSON.stringify(listIngredient),
            }
            sendData('POST', '{{ route('admin.report.saveinventory') }}', data, function(message){
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
                sendData("GET", '{{ route('admin.inventory.getreportformula') }}', { id: id }, function(res) {
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
                    if (res.reportFormula) {
                        self.reportFormula.po(res.reportFormula.po);
                    }


                    $.each(res.ingredientsActive, function( index, value ) {
                        var obj = {
                            id: value.id,
                            code: value.code,
                            inactive: value.inactive,
                            ingredient_id: value.ingredient_id,
                            name_ingredient: value.name_ingredient,
                            per_batch: value.per_batch,
                            in_stock: value.in_stock ? value.in_stock : 0,
                            lot: value.lot ? value.lot : 0,
                            purchased: value.purchased ? value.purchased : 0,
                            checked: value.checked ? value.checked : 0
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
                            per_batch: value.per_batch,
                            in_stock: value.in_stock ? value.in_stock : 0,
                            lot: value.lot ? value.lot : 0,
                            purchased: value.purchased ? value.purchased : 0,
                            checked: value.checked ? value.checked : 0
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
                            per_batch: value.per_batch,
                            in_stock: value.in_stock ? value.in_stock : 0,
                            lot: value.lot ? value.lot : 0,
                            purchased: value.purchased ? value.purchased : 0,
                            checked: value.checked ? value.checked : 0
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
                            per_batch: value.per_batch,
                            in_stock: value.in_stock ? value.in_stock : 0,
                            lot: value.lot ? value.lot : 0,
                            purchased: value.purchased ? value.purchased : 0,
                            checked: value.checked ? value.checked : 0
                        };
                        self.model.dataIngredientsShell.push(ko.mapping.fromJS(obj));
                    });
                    self.model.sumPerBatchColor(sumColor);
                    self.model.sumPerBatchShell(sumShell);
                    
                    if (res.reportFormula) {
                        self.reportFormula.po(res.reportFormula.po);
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
