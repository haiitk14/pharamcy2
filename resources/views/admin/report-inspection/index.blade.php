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
                            <h4>Inspection</h4>
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
                            <label for="order" class="col-sm-2 col-form-label">7. Batch No: </label>
                            <div class="col-sm-8 col-form-label" > 
                                <input type="text" data-bind="value: inspection.batchNo" placeholder="Enter Batch No" class="form-control">
                            </div>
                        </div>
                        <div class="row form-group">
                            <label for="order" class="col-sm-2 col-form-label">8. Batch Size: </label>
                            <div class="col-sm-8 col-form-label" > 
                                <span data-bind="text: numeral(customRequest.order()).format('0,0')"></span>  softgels
                            </div>
                        </div>
                        <div class="row form-group">
                            <label for="order" class="col-sm-2 col-form-label">Personnel: </label>
                            <div class="col-sm-8 col-form-label" > 
                                <input type="text" data-bind="value: inspection.personel" placeholder="Enter Personnel" class="form-control">
                            </div>
                        </div>
                        <div class="row form-group">
                            <label for="order" class="col-sm-2 col-form-label">QC Person: </label>
                            <div class="col-sm-8 col-form-label" > 
                                <input type="text" data-bind="value: inspection.qcPersonel" placeholder="Enter QC Person" class="form-control">
                            </div>
                        </div>
                       
                        <div class="row form-group">
                            <label for="order" class="col-sm-2 col-form-label">Inspection</label>
                        </div>
                        <div class="row form-group">
                            <div class="col-sm-8">
                                <input type="text" class="form-control" title="Enter Inspection Name" name="inspection">
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
                            <div class="col-sm-12 table-responsive">
                                <table class="table table-bordered table-sm">
                                    <thead>
                                        <tr>
                                            <th rowspan="2">Rack No.</th>
                                            <th rowspan="2">Inspection Worker</th>
                                            <th rowspan="2">Date</th>
                                            <th rowspan="2">Time</th>
                                            <th rowspan="2">Ck By</th>
                                            <th rowspan="2">Comments</th>
                                            <th colspan="2">Time</th>
                                        </tr>
                                        <tr>
                                            <th>IPC</th>
                                            <th>Cost</th>
                                        </tr>
                                    </thead>
                                    <tbody data-bind="foreach: model.inspectionWorker">
                                        <tr>
                                            <td>
                                                <input type="text" data-bind="value: rackNo" class="form-control" >
                                            </td>
                                            <td>
                                                <input type="text" data-bind="value: inspectionWorker" class="form-control" >
                                            </td>
                                            <td>
                                                <input type="text" data-bind="value: date" class="form-control" >
                                            </td>
                                            <td>
                                                <input type="text" data-bind="value: time" class="form-control" >
                                            </td>
                                            <td>
                                                <input type="text" data-bind="value: ckBy" class="form-control" >
                                            </td>
                                            <td>
                                                <input type="text" data-bind="value: comments" class="form-control" >
                                            </td>
                                            <td>
                                                <input type="text" data-bind="value: IPC" class="form-control" >
                                            </td>
                                            <td>
                                                <input type="text" data-bind="value: cost" class="form-control" >
                                            </td>
                                        </tr>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <td>
                                                <a href="javascript:;" data-bind="click: addItem" title="Add Item" class="btn btn-outline-primary"><i class="fa fa-plus"></i> Add</a>
                                            </td>
                                        </tr>
                                    </tfoot>
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
                            12. Order: <span data-bind="text: numeral(customRequest.order()).format('0,0')"></span>  softgels
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
            inspectionWorker: ko.observableArray(),
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
            order: ko.observable(),
        };
        self.inspection = {
            batchNo: ko.observable(),
            personel: ko.observable(),
            qcPersonel: ko.observable(),
        };

         /* ----------- Event change input quotation ----------- */
        self.inspection.batchNo.subscribe(function (data) {
            self.inspection.batchNo(numeral(data).format("0,0.00"));
        });
        /* end */

        self.addComment = function() {
            var value = formDataView.find("input[name=inspection]");

            if (value.val() == undefined || value.val() == "" || !value.val()) {
                return false;
            }
            if (checkItemExistArrayComments(ko.mapping.toJS(self.model.comments()), value.val())) {
                toastr.error('{{ __('The inspection exist.') }}');
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

        self.addItem = function() {
            var obj = {
                rackNo: ko.observable(),
                inspectionWorker: ko.observable(),
                date: ko.observable(),
                time: ko.observable(),
                ckBy: ko.observable(),
                comments: ko.observable(),
                IPC: ko.observable(),
                cost: ko.observable(),
            }
            self.model.inspectionWorker.push(obj);
        }
        self.deleteItem = function() {
            self.model.inspectionWorker.remove(this);
        }

        self.save = function() {
            var idCustomRequest = formCustomRequest.find("select[name=custom_request]").val();
            var batchNo = self.inspection.batchNo();
            var personel = self.inspection.personel();
            var qcPersonel = self.inspection.qcPersonel();
            var comments = ko.mapping.toJS(self.model.comments());
            var inspectionWorker = ko.mapping.toJS(self.model.inspectionWorker());

            var data = {
                idCustomRequest: idCustomRequest,
                batchNo: batchNo,
                personel: personel,
                qcPersonel: qcPersonel,
                listInspections: JSON.stringify(comments),
                inspectionWorker:  JSON.stringify(inspectionWorker),
            }
            sendData('POST', '{{ route('admin.report.saveinspection') }}', data, function(message){
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
                sendData("GET", '{{ route('admin.inspection.getreportformula') }}', { id: id }, function(res) {
                    console.log(res);
                    formDataView.removeClass("d-none");

                    if (res.reportInspection) {
                        self.inspection.batchNo(res.reportInspection.batch_no);
                        self.inspection.personel(res.reportInspection.personel);
                        self.inspection.qcPersonel(res.reportInspection.qcpersonel);
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
                        self.customRequest.order(res.customRequest.order);
                    }
                   
                    if (res.reportFormula) {
                        self.reportFormula.po(res.reportFormula.po);
                    }
                    self.model.comments([]);
                    $.each(res.comments, function( index, value ) {
                        var obj = {
                            id: value.id,
                            comment: value.content,
                        };
                        self.model.comments.push(ko.mapping.fromJS(obj));
                    });
                    self.model.inspectionWorker([]);
                    $.each(res.inspectionWorker, function( index, value ) {
                        var obj = {
                            id: value.id,
                            reportinspection_id: value.reportinspection_id,
                            rackNo: value.rack_no,
                            inspectionWorker: value.inspection_worker,
                            date: value.date,
                            time: value.time,
                            ckBy: value.ck_by,
                            comments: value.comments,
                            IPC: value.IPC,
                            cost: value.cost,                          
                        };
                        self.model.inspectionWorker.push(ko.mapping.fromJS(obj));
                    });
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
