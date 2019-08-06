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
                                    <option value="{{ $customRequest->id }}">{{ $customRequest->ipd }} - {{ $customRequest->manufature->name }}</option>
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
                            <h4>Manufacturing Specification</h4>
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
                            <label for="formula" class="col-sm-2 col-form-label">3. P.O: </label>
                            <div class="col-sm-8 col-form-label" data-bind="text: reportFormula.po">
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
                            <div class="col-sm-8 col-form-label">
                            </div>
                        </div>
                        <div class="row form-group">
                            <label for="order" class="col-sm-2 col-form-label">10. Batch No.: </label>
                            <div class="col-sm-8 col-form-label">
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
                                            <th>per serving mg</th>
                                            <th>% SG</th>
                                        </tr>
                                    </thead>
                                    <tbody data-bind="foreach: model.dataIngredients">
                                        <tr>
                                            <td data-bind="text: $index() + 1"></td>
                                            <td data-bind="text: code">
                                            </td>
                                            <td data-bind="text: name_ingredient">
                                            </td>
                                            <td data-bind="text: per_serving"> 
                                            </td>
                                            <td></td>
                                        </tr>
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
                            <div class="col-sm-8">
                                <input type="text" class="form-control" title="Enter Comment" name="comment">
                            </div>
                            <div class="col-sm-2">
                                <a href="javascript:;" data-bind="click: addComment" title="Add Comment" class="btn btn-outline-primary"><i class="fa fa-plus"></i> Add</a>
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
                                            <td class="text-center">
                                                <a href='javascript:;' data-bind="click: $root.deleteComment" title='Delete Item'><i class='fa fa-lg fa-trash' aria-hidden='true'></i></a>
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
                                    <td style="border: none;  border-left: 3px solid; border-right: 3px solid;">     Sales Manager
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
                            <h4 style="margin-top: 100px;">Pharmaxx, Inc.
                            </h4>
                            <table style="width: 100%; border: 0px solid #CCC; border-collapse: collapse; ">
                                <tr  style="border-bottom: 3px solid;">
                                    <td colspan="2" style="border: none;"></td>
                                    <td style="border: none; border-left: 3px solid; border-right: 3px solid;">     Sales Manager
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
                                            <th>per serving mg</th>
                                            <th>% SG</th>
                                        </tr>
                                    </thead>
                                    <tbody data-bind="foreach: model.dataIngredients">
                                        <tr>
                                            <td data-bind="text: $index() + 1"></td>
                                            <td data-bind="text: code">
                                            </td>
                                            <td data-bind="text: name_ingredient">
                                            </td>
                                            <td data-bind="text: per_serving"> 
                                            </td>
                                            <td></td>
                                        </tr>
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
            dataIngredients: ko.observableArray([]),
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
        self.addComment = function() {
            var value = formDataView.find("input[name=comment]");

            if (value.val() == undefined || value.val() == "" || !value.val()) {
                return false;
            }
            if (checkItemExistArrayComments(ko.mapping.toJS(self.model.comments()), value.val())) {
                toastr.error('{{ __('The comment exist.') }}');
                return false;
            }
            var obj = {
                comment: value.val(),
            }
            self.model.comments.push(obj);
            value.val('');
        }
        self.deleteComment = function() {
            self.model.comments.remove(this);
        }
       
        $(document).ready(function() {
            $("#print").click(function(){
                print("dataprint");
            });
        });
        formCustomRequest.find("select[name=custom_request]").change(function() {
            var id = $(this).val();

            if (id) {
                sendData("GET", '{{ route('admin.report.getreportformula') }}', { id: id }, function(res) {
                    console.log(res);
                    formDataView.removeClass("d-none");

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
                    var arr = res.ingredientsActive.concat(res.ingredientsInActive);
                    $.each(arr, function( index, value ) {
                        var obj = ko.mapping.fromJS(value);
                        self.model.dataIngredients.push(obj);
                    });
                    
                    if (res.reportFormula) {
                        self.reportFormula.po(res.reportFormula.po);
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
