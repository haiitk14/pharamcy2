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
                            <div class="col-sm-8 col-form-label filling-wt">
                            </div>
                        </div>
                        <div class="row form-group">
                            <label for="order" class="col-sm-2 col-form-label">10. Serving Size: </label>
                            <div class="col-sm-4">
                                <input type="number" data-bind="value: model.servingSize" name="serving_size" value="0"  class="form-control" title="Enter Serving Size" placeholder="Enter Serving Size" >
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
                                            
                                            <td data-bind="text: per_tab() ? per_tab() : 0"></td>
                                            <td data-bind="text: per_batch() ? per_batch() : 0"></td>
                                            <td data-bind="text: tab100() ? tab100() : 0"></td>
                                        </tr>
                                        <!-- /ko -->
                                        <tr>
                                            <td colspan="7"></td>
                                            <td data-bind="text: $root.model.fillWtColor()"></td>
                                            <td data-bind="text: $root.model.sumPerBatch()"></td>
                                            <td data-bind="text: $root.model.sumTab()"></td>
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
                                                        tab100(per_tab() / $root.model.fillWtColor());
                                                     } }" class="form-control">
                                                </td>
                                                <td>
                                                    <input type="number" data-bind="value: overage, event: { change: function() {
                                                        per_tab((per_unit() / (purity() / 100) * (1 + (overage() / 100)) ));
                                                        per_batch(per_tab() * $root.model.batchSize() * 1000000 );
                                                        $root.calculationFillWtShell();
                                                        tab100(per_tab() / $root.model.fillWtColor());
                                                     } }" class="form-control">
                                                </td>
                                                
                                                <td data-bind="text: per_tab() ? per_tab() : 0"></td>
                                                <td data-bind="text: per_batch() ? per_batch() : 0"></td>
                                                <td data-bind="text: tab100() ? tab100() : 0"></td>
                                            </tr>
                                            <!-- /ko -->
                                            <tr>
                                                <td colspan="7"></td>
                                                <td data-bind="text: $root.model.fillWtShell()"></td>
                                                <td data-bind="text: $root.model.sumPerBatchShell()"></td>
                                                <td data-bind="text: $root.model.sumTabShell()"></td>
                                            </tr>
                                        </tbody>
                                    {{-- <tbody class="table-ingredients">
                                    </tbody> --}}
                                    
                                    {{-- <tfoot>
                                        <tr>
                                            <td colspan="6"></td>
                                            <td>Fill Wt</td>
                                            <td data-bind="text: $root.model.fillWt"></td>
                                            <td class="sum_input_wt_per_batch">0</td>
                                            <td class="sum_percent_softgel">0</td>
                                        </tr>
                                    </tfoot> --}}
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
                            9. Filling Wt: <span class="filling-wt"></span>
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
                                <table  style="width: 100%">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Code</th>
                                            <th>Ingredients *</th>
                                            <th>Serving <br>Wt.mg</th>
                                            <th>Req Wt</th>
                                            <th width="10%">Purity %</th>
                                            <th width="10%">Overage %</th>
                                            <th>Input <br>Wt/mg</th>
                                            <th>Input Wt <br>per batch</th>
                                            <th>Percent <br>Softgel %</th>
                                            <th width="10%">Density</th>
                                            <th>Volum</th>
                                        </tr>
                                    </thead>
                                    <tbody class="table-ingredients">
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <td colspan="6"></td>
                                            <td>Fill Wt</td>
                                            <td class="fill_wt">0</td>
                                            <td class="sum_input_wt_per_batch">0</td>
                                            <td class="sum_percent_softgel">0</td>
                                            <td>Total</td>
                                            <td class="total">0</td>

                                        </tr>
                                    </tfoot>
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

            // formDataView.find("input[name=serving_size]").change(function () {
            //     var serving_size = Number($(this).val());
            //     for (var i = 0; i < dataListIngredients.length; i++ ) {
            //         dataListIngredients[i].serving_size = serving_size;
            //         dataListIngredients[i].req_wt = serving_size * Number(dataListIngredients[i].per_serving);
            //     }
            //     console.log("serving_size");
            //     showDataTableIngredients(dataListIngredients);
            // });

            formDataView.find("input[name=batch_size]").change(function () {
                var batch_size = Number($(this).val());
                for (var i = 0; i < dataListIngredients.length; i++ ) {
                    dataListIngredients[i].batch_size = batch_size;
                    dataListIngredients[i].input_wt_per_batch = calculationInputWtPerBatch(dataListIngredients[i].input_wtmg, batch_size);
                }
                console.log("batch_size");
                showDataTableIngredients(dataListIngredients);
            });

            $(document).on('change', "input.purity", function() {
            
                if (checkThreeInputOver() == 0) {
                    toastr.error("Enter Serving Size & Gelatin Batch & Batch size. Please...");
                    return false;
                }
                var tr = $(this).closest("tr").addClass("item-change");
                var id = tr.data("id");
                var fillWt = numeral(formDataView.find(".fill_wt").text()).value();

                if ($(this).val() == "" || $(this).val() == undefined) return false;
                var purity = Number($(this).val());
                
                for (var i = 0; i < dataListIngredients.length; i++ ) {

                    if (id == dataListIngredients[i].id) {
                        dataListIngredients[i].purity = purity;
                        dataListIngredients[i].input_wtmg = calculationInputWtmg(dataListIngredients[i].req_wt, dataListIngredients[i].purity , dataListIngredients[i].overage);
                        dataListIngredients[i].input_wt_per_batch = calculationInputWtPerBatch(dataListIngredients[i].input_wtmg, dataListIngredients[i].batch_size);
                        dataListIngredients[i].percent_softgel = calculationPercentSoftgel(dataListIngredients[i].input_wtmg, fillWt);
                        dataListIngredients[i].volum = calculationVolum(dataListIngredients[i].input_wtmg, dataListIngredients[i].density);
                        break;
                    }
                }
                showDataTableIngredients(dataListIngredients);
            });

            $(document).on('change', "input.overage", function() {
                if (checkThreeInputOver() == 0) {
                    toastr.error("Enter Serving Size & Gelatin Batch & Batch size. Please...");
                    return false;
                }
                var tr = $(this).closest("tr").addClass("item-change");
                var id = tr.data("id");
                var fillWt = numeral(formDataView.find(".fill_wt").text()).value();

                if ($(this).val() == "" || $(this).val() == undefined) return false;
                var overage = Number($(this).val());
                
                for (var i = 0; i < dataListIngredients.length; i++ ) {

                    if (id == dataListIngredients[i].id ) {
                        dataListIngredients[i].overage =  overage;
                        dataListIngredients[i].input_wtmg = calculationInputWtmg(dataListIngredients[i].req_wt, dataListIngredients[i].purity , dataListIngredients[i].overage);
                        dataListIngredients[i].input_wt_per_batch = calculationInputWtPerBatch(dataListIngredients[i].input_wtmg, dataListIngredients[i].batch_size);
                        dataListIngredients[i].percent_softgel = calculationPercentSoftgel(dataListIngredients[i].input_wtmg, fillWt);
                        dataListIngredients[i].volum = calculationVolum(dataListIngredients[i].input_wtmg, dataListIngredients[i].volum);
                        break;
                    }
                }
                showDataTableIngredients(dataListIngredients);
            });

            $(document).on('change', "input.density", function() {
                if (checkThreeInputOver() == 0) {
                    toastr.error("Enter Serving Size & Gelatin Batch & Batch size. Please...");
                    return false;
                }
                var tr = $(this).closest("tr").addClass("item-change");
                var id = tr.data("id");

                if ($(this).val() == "" || $(this).val() == undefined) return false;
                var density = Number($(this).val());
                
                for (var i = 0; i < dataListIngredients.length; i++ ) {

                    if (id == dataListIngredients[i].id ) {
                        dataListIngredients[i].density =  density;
                        dataListIngredients[i].volum = calculationVolum(dataListIngredients[i].input_wtmg, density);
                        break;
                    }
                }
                showDataTableIngredients(dataListIngredients);
            });
        });
        var showDataCustomRequest = function(data) {

            if (!data) return false;
            
            formDataView.removeClass("d-none");

            if (data.customRequest) {
                var customRequest = data.customRequest;
                self.model.batchSize(customRequest.order);
                formDataView.find(".formula-number").html(customRequest.formula_number);
                formDataView.find(".revision").html(customRequest.revision);
                formDataView.find(".show-date").html(moment(customRequest.date).format('MM/DD/YYYY'));
                formDataView.find(".size-type").html(customRequest.size_type);
                formDataView.find(".color-logo").html(customRequest.color_logo);

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
            if (data.customer) {
                var customer = data.customer;
                formDataView.find(".customer-full-name").html(customer.full_name);

                formDataPrint.find(".customer-full-name").html(customer.full_name);
            }
            if (data.product) {
                var product = data.product;
                formDataView.find(".product-name").html(product.name);

                formDataPrint.find(".product-name").html(product.name);
            }
        
            if (data.salesOrderIngredients) {
                var dataSalesOrderIngredients = data.salesOrderIngredients;
                dataListIngredients = data.salesOrderIngredients;
                var arr = [];
                var arrayIngredientsColor = [];
                var arrayIngredientsShell = [];

                for (var i = 0; i < dataSalesOrderIngredients.length; i++) {
                    var item = dataSalesOrderIngredients[i];

                    if (item.ingredient.inactive == 0 || item.ingredient.inactive == 1) {
                        arr.push(item);
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
                showDataTableIngredients(arr);
                self.arraySalesOrderIngredientsColor(arrayIngredientsColor)
                self.arraySalesOrderIngredientsShell(arrayIngredientsShell)
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
