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
                            <h4>Price Quotation</h4>
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
                            <div class="col-sm-12 ">
                            <h4>Specification</h4>
                            </div>
                        </div>
                        <div class="row form-group">
                            <label for="address" class="col-sm-2 col-form-label">7. Dosage form:</label>
                            <div class="col-sm-8 col-form-label" data-bind="text: customRequest.dosage_form">
                            </div>
                        </div>
                        <div class="row form-group">
                            <label for="address" class="col-sm-2 col-form-label">8. Size/Type:</label>
                            <div class="col-sm-8 col-form-label" data-bind="text: customRequest.size_type">
                            </div>
                        </div>
                        <div class="row form-group">
                            <label for="address" class="col-sm-2 col-form-label">9. Color/Logo:</label>
                            <div class="col-sm-8 col-form-label" data-bind="text: customRequest.color_logo">
                            </div>
                        </div>
                        <div class="row form-group">
                            <label for="address" class="col-sm-2 col-form-label">10. Serving size:</label>
                            <div class="col-sm-4" data-bind="value: customRequest.serving_size">
                            </div>
                        </div>
                        <div class="row form-group">
                            <label for="address" class="col-sm-2 col-form-label">11. Filling Wt:</label>
                            <div class="col-sm-4">
                                <span data-bind="text: numeral(reportFormula.filling_wt()).format('0,0')"></span> mg +/-10%
                            </div>
                            
                        </div>
                        <div class="row form-group">
                            <label for="order" class="col-sm-2 col-form-label">12. Order: </label>
                            <div class="col-sm-8 col-form-label" > 
                                <span data-bind="text: numeral(customRequest.order()).format('0,0')"></span>  softgels
                            </div>
                        </div>
                        <div class="row form-group">
                            <label for="address" class="col-sm-2 col-form-label">13. Price:</label>
                            <div class="col-sm-2">
                                <input type="text" data-bind="value: quotation.price" title="Enter Price" placeholder="Enter Price" class="form-control">
                            </div>
                            <label for="address" class="col-sm-1 col-form-label">Packing:</label>
                            <div class="col-sm-2">
                                <input type="text" data-bind="value: quotation.packing" title="Enter Packing" placeholder="Enter Packing" class="form-control">
                            </div>
                        </div>
                        <div class="row form-group">
                            <label for="address" class="col-sm-2 col-form-label">14. Paper big box:</label>
                            <div class="col-sm-4">
                                <input type="text" data-bind="value: quotation.paperBigBox" title="Enter Price" placeholder="Enter Price" class="form-control">
                            </div>
                            <div class="col-sm-2">
                                Pcs
                            </div>
                        </div>
                        <div class="row form-group">
                            <label for="address"  class="col-sm-2 col-form-label">15. Deposit:</label>
                            <div class="col-sm-4">
                                <input type="text" data-bind="value: quotation.deposit" title="Enter Price" placeholder="Enter Price" class="form-control">
                            </div>
                            <div class="col-sm-2">
                                (30% - 70% COD)
                            </div>
                        </div>
                        <div class="row form-group">
                            <label for="order" class="col-sm-2 col-form-label">16. </label>
                        </div>
                        <div class="row form-group">
                            <div class="col-sm-12 table-responsive">
                                <table class="table table-bordered table-sm">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Ingredients</th>
                                            <th>Wt (mg) per serving</th>
                                            <th>% per unit</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr >
                                            <td colspan="4"><b>Active Ingredients</b></td>
                                        </tr>
                                        <!-- ko foreach: model.dataIngredientsActive -->
                                        <tr>
                                            <td data-bind="text: $index() + 1"></td>
                                            <td data-bind="text: name_ingredient">
                                            </td>
                                            <td data-bind="text: per_serving"> 
                                            </td>
                                            <td data-bind="text: tab100"></td>
                                        </tr>
                                        <!-- /ko -->
                                        <tr >
                                            <td colspan="4"><b>Inactive Ingredients</b></td>
                                        </tr>
                                        <!-- ko foreach: model.dataIngredientsInActive -->
                                        <tr>
                                            <td data-bind="text: $index() + 1"></td>
                                            <td data-bind="text: name_ingredient">
                                            </td>
                                            <td data-bind="text: per_serving"> 
                                            </td>
                                            <td data-bind="text: tab100"></td>
                                        </tr>
                                        <!-- /ko -->
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-sm-12 ">
                            <h4>Comments or Additional Instructions</h4>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-sm-10 table-responsive">
                                <table class="table table-bordered table-sm">
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
                        <div class="row form-group">
                            <h4>ExxelUSA</h4>
                            <table style="width: 100%; border: 0px solid #CCC; border-collapse: collapse; ">
                                <tr style="border-bottom: 3px solid;">
                                    <td colspan="2" style="border: none;"></td>
                                    <td style="border: none;  border-left: 3px solid; border-right: 3px solid;">     Position
                                    </td>
                                    <td style="border: none;"></td>
                                </tr>
                                <tr>
                                    <td style="border: none;">Approved by</td>
                                    <td style="border: none;">Name</td>
                                    <td style="border: none;">Title</td>
                                    <td style="border: none;">Date</td>
                                </tr>
                            </table>
                            <h4 style="margin-top: 100px;">Pharmaxx (tick)
                            </h4>
                            <table style="width: 100%; border: 0px solid #CCC; border-collapse: collapse; ">
                                <tr  style="border-bottom: 3px solid;">
                                    <td colspan="2" style="border: none;"></td>
                                    <td style="border: none; border-left: 3px solid; border-right: 3px solid;">     Position
                                    </td>
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
                            7. Dosage form: <span  data-bind="text: customRequest.dosage_form"></span>
                        </div>
                        <div>
                            8. Size/Type: <span data-bind="text: customRequest.size_type"></span>
                        </div>
                        <div>
                           9. Color/Logo: <span data-bind="text: customRequest.color_logo"></span>
                        </div>
                        <div>
                            10. Serving size:<span data-bind="text: customRequest.serving_size"></span>
                        </div>
                        <div >
                           11. Filling Wt: <span data-bind="text: numeral(reportFormula.filling_wt()).format('0,0')"></span> mg +/-10%
                        </div>
                        <div>
                            12. Order: <span data-bind="text: numeral(customRequest.order()).format('0,0')"></span>  softgels
                        </div>
                        <div>
                            13. Price: <span data-bind="text: quotation.price"></span>
                            <span style="margin-left: 20px;">Packing: </span>   <span data-bind="text: quotation.packing"></span>
                        </div>
                        <div>
                            14. Paper big box: <span data-bind="text: quotation.paperBigBox"></span> Pcs
                        </div>
                        <div>
                            15. Deposit: <span data-bind="text: quotation.deposit"></span> (30% - 70% COD)
                        </div>
                        <div>
                            16. 
                        </div>
                        <div>
                            <div >
                                <table  style="width: 100%">
                                    <thead>
                                        <th>No</th>
                                        <th>Ingredients</th>
                                        <th>Wt (mg) per serving</th>
                                        <th>% per unit</th>
                                    </thead>
                                    <tbody>
                                        <tr >
                                            <td colspan="4"><b>Active Ingredients</b></td>
                                        </tr>
                                        <!-- ko foreach: model.dataIngredientsActive -->
                                        <tr>
                                            <td data-bind="text: $index() + 1"></td>
                                            <td data-bind="text: name_ingredient">
                                            </td>
                                            <td data-bind="text: per_serving"> 
                                            </td>
                                            <td data-bind="text: tab100"></td>
                                        </tr>
                                        <!-- /ko -->
                                        <tr >
                                            <td colspan="4"><b>Inactive Ingredients</b></td>
                                        </tr>
                                        <!-- ko foreach: model.dataIngredientsInActive -->
                                        <tr>
                                            <td data-bind="text: $index() + 1"></td>
                                            <td data-bind="text: name_ingredient">
                                            </td>
                                            <td data-bind="text: per_serving"> 
                                            </td>
                                            <td data-bind="text: tab100"></td>
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
                                    <td style="border: none;  border-left: 3px solid; border-right: 3px solid;">Position</td>
                                    <td style="border: none;"></td>
                                </tr>
                                <tr>
                                    <td style="border: none;">Approved by</td>
                                    <td style="border: none;">Name</td>
                                    <td style="border: none;">Title</td>
                                    <td style="border: none;">Date</td>
                                </tr>
                            </table>
                            <h4 style="margin-top: 500px;">Pharmaxx (tick)
                                </h4>
                            <table style="width: 100%; border: 0px solid #CCC; border-collapse: collapse; ">
                                <tr  style="border-bottom: 3px solid;">
                                    <td colspan="2" style="border: none;"></td>
                                    <td style="border: none; border-left: 3px solid; border-right: 3px solid;">Position</td>
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
            comments: ko.observableArray(),
            dataIngredientsActive: ko.observableArray([]),
            dataIngredientsInActive: ko.observableArray([]),
        }
        self.reportFormula = {
            po: ko.observable(),
            filling_wt: ko.observable(),
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
            dosage_form: ko.observable(),
            serving_size: ko.observable(),
        };
        self.quotation = {
            price: ko.observable(),
            packing: ko.observable(),
            paperBigBox: ko.observable(),
            deposit: ko.observable()
        };

         /* ----------- Event change input quotation ----------- */
        self.quotation.price.subscribe(function (data) {
            self.quotation.price(numeral(data).format("0,0.00"));
        });
        self.quotation.packing.subscribe(function (data) {
            self.quotation.packing(numeral(data).format("0,0.00"));
        });
        self.quotation.paperBigBox.subscribe(function (data) {
            self.quotation.paperBigBox(numeral(data).format("0,0.00"));
        });
        self.quotation.deposit.subscribe(function (data) {
            self.quotation.deposit(numeral(data).format("0,0.00"));
        });
        /* end */

        self.save = function() {
            var idCustomRequest = formCustomRequest.find("select[name=custom_request]").val();
            var price = self.quotation.price();
            var packing = self.quotation.packing();
            var paperBigBox = self.quotation.paperBigBox();
            var deposit = self.quotation.deposit();
            var data = {
                idCustomRequest: idCustomRequest,
                price: price,
                packing: packing,
                paperBigBox: paperBigBox,
                deposit: deposit,
            }
            sendData('POST', '{{ route('admin.report.savequotation') }}', data, function(message){
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
                sendData("GET", '{{ route('admin.reportquotation.getreportformula') }}', { id: id }, function(res) {
                    console.log(res);
                    formDataView.removeClass("d-none");

                    if (res.quotation) {
                        self.quotation.price(res.quotation.price);
                        self.quotation.packing(res.quotation.packing);
                        self.quotation.paperBigBox(res.quotation.paper_big_box);
                        self.quotation.deposit(res.quotation.deposit);
                    }
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
                        var strDosageform = "";

                        if ( res.customRequest.is_softgel == 1 ) {
                            strDosageform += "Softgel, ";
                        } 
                        if (res.customRequest.is_tablet == 1) {
                            strDosageform += "Tablet, ";
                        }
                        if (res.customRequest.is_hardcapsule == 1) {
                            strDosageform += "Hardcapsule";
                        }
                        self.customRequest.dosage_form(strDosageform);

                        self.customRequest.serving_size(res.customRequest.serving_size);
                    }
                    $.each(res.ingredientsActive, function( index, value ) {
                        var obj = ko.mapping.fromJS(value);
                        self.model.dataIngredientsActive.push(obj);
                    });
                    $.each(res.ingredientsInActive, function( index, value ) {
                        var obj = ko.mapping.fromJS(value);
                        self.model.dataIngredientsInActive.push(obj);
                    });
                    
                    if (res.reportFormula) {
                        self.reportFormula.po(res.reportFormula.po);
                        self.reportFormula.filling_wt(res.reportFormula.filling_wt);
                    }

                    if (res.comments) {
                        $.each(res.comments, function( index, value ) {
                            var obj = {
                                comment: value.comment
                            };
                            self.model.comments.push(ko.mapping.fromJS(obj));
                        });
                    }
                });
            } else {
                formDataView.addClass("d-none");
            }
        });
        var checkItemExistArrayComments = function(array, comment) {
            var res = false;
            $.each(array , function(index, item) { 
                if (item.comment == comment) {
                    res = true;
                    return false;
                }
            });
            return res;
        }
    }
    
     // Activates knockout.js
     ko.applyBindings(new AppViewModel());
    
</script>
@endsection
