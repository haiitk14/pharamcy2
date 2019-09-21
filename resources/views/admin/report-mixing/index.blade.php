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
                            <h4>Mixing Instructions</h4>
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
                            <label for="address" class="col-sm-2 col-form-label">7. Batch No:</label>
                            <div class="col-sm-8 col-form-label">
                                <input type="text" data-bind="value: model.batch_no"  title="Enter Batch No" placeholder="Enter Batch No" class="form-control">
                            </div>
                        </div>
                        <div class="row form-group">
                            <label for="order" class="col-sm-2 col-form-label">8. Batch Size: </label>
                            <div class="col-sm-8">
                            <span data-bind="text: numeral(customRequest.order()).format('0,0')"></span>  softgels
                            </div>
                        </div>
                        <div class="row form-group">
                            <label for="order" class="col-sm-2 col-form-label">9. Personnel: </label>
                            <div class="col-sm-8 col-form-label" > 
                                <input type="text" data-bind="value: model.personnel"  title="Enter personnel" placeholder="Enter personnel" class="form-control">
                            </div>
                        </div>
                        <div class="row form-group">
                            <label for="order" class="col-sm-2 col-form-label">10. IPC Person: </label>
                            <div class="col-sm-8 col-form-label" > 
                                <input type="text" data-bind="value: model.ipc_person" placeholder="Enter IPC Person" class="form-control">
                            </div>
                        </div>
                        <div class="row form-group">
                            <label for="order" class="col-sm-12 col-form-label">11. Production Supervisor: </label>
                        </div>
                        <div class="row form-group">
                            <label for="order" class="col-sm-2 col-form-label">Weighing Person: </label>
                            <div class="col-sm-8 col-form-label" > 
                                <input type="text" data-bind="value: model.weighing_person" placeholder="Enter Weighing Person" class="form-control">
                            </div>
                        </div>
                        <div class="row form-group">
                            <label for="order" class="col-sm-2 col-form-label">Blending Person: </label>
                            <div class="col-sm-8 col-form-label" > 
                            <input type="text" data-bind="value: model.blendling_person" placeholder="Enter Blending Person" class="form-control">
                            </div>
                        </div>
                        <div class="row form-group">
                            <label for="order" class="col-sm-2 col-form-label">12. Line Clear (IPC): </label>
                            <div class="col-sm-8 col-form-label" > 
                                <input type="text" data-bind="value: model.line_clear" placeholder="Enter Line Clear (IPC)" class="form-control">
                            </div>
                        </div>
                        <div class="row form-group">
                            <label for="order" class="col-sm-2 col-form-label">13. IPC: </label>
                            <div class="col-sm-8 col-form-label" > 
                                <input type="text" data-bind="value: model.ipc" placeholder="Enter IPC" class="form-control">
                            </div>
                        </div>
                        <div class="row form-group">
                            <label for="order" class="col-sm-12 col-form-label">14. 
                                <button type="button" data-bind="click: addAss" title="Add Assembling" class="btn btn-outline-primary"><i class="fa fa-plus"></i> Add</button>
                            </label>
                        </div>
                        <div class="row form-group">
                            <div class="col-sm-12">
                            </div>
                            <div class="col-sm-12 table-responsive">
                                <table class="table table-bordered table-sm">
                                    <thead>
                                        <tr>
                                            <th rowspan="2" style="min-width: 200px"></th>
                                            <th rowspan="2">Labor name</th>
                                            <th colspan="2">Time</th>
                                            <th rowspan="2">Record (real time)</th>
                                            <th rowspan="2">Cost per hour</th>
                                            <th rowspan="2">Labor cost</th>
                                        </tr>
                                        <tr>
                                            <th>In</th>
                                            <th>Out</th>
                                        </tr>
                                    </thead>
                                    <tbody data-bind="foreach: model.dataAss">
                                        <tr>
                                            <td>
                                            <a href="javascript:;" data-bind="text: name, click: $root.clickString.bind($data, 'name')"></a> 
                                            </td>
                                            <td>
                                            <a href="javascript:;" data-bind="text: labor_name, click: $root.clickString.bind($data, 'labor_name')"></a> 
                                            </td>
                                            <td>
                                                <input type="text" data-bind="value: time_in_cof, event: { change: $root.caculateInput.bind($data, $data) }" class="form-control datetime" >
                                                <!-- <a href="javascript:;" data-bind="text: time_in, click: $root.clickTime.bind($data, 'time_in')"></a> -->
                                            </td>
                                            <td>
                                                <input type="text" data-bind="value: time_out_cof, event: { change: $root.caculateInput.bind($data, $data) }" class="form-control datetime" >
                                            <!-- <a href="javascript:;" data-bind="text: time_out, click: $root.clickNumber.bind($data, 'time_out')"></a>  -->
                                            </td>
                                            <td>
                                            <a href="javascript:;" data-bind="text: record, click: $root.clickString.bind($data, 'record')"></a> 
                                            </td>
                                            <td>
                                            <a href="javascript:;" data-bind="text: numeral(cost_per_hour()).format('0,0.00'), click: $root.clickNumber.bind($data, 'cost_per_hour')"></a> 
                                            </td>
                                            <td data-bind="text: numeral(labor_cost()).format('0,0.00')">
                                            </td>
                                            <td>
                                                <a href="javascript:;" data-bind="click: $root.removeAss"><i class="text-danger fa fa-trash"></i></a> 
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <div class="row form-group">
                            <label for="order" class="col-sm-2 col-form-label">15. </label>
                        </div>
                        <div class="row form-group">
                            <div class="col-sm-12 table-responsive">
                                <table class="table table-bordered table-sm">   
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>RW No.</th>
                                            <th>Ingredients</th>
                                            <th>Qty (Kg)</th>
                                            <th>Wt. Amt</th>
                                            <th>Lot No.</th>
                                            <th>Wt.By</th>
                                            <th>Check by QC</th>
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
                                                <a href="javascript:;" data-bind="text: wt_amt, click: $root.clickString.bind($data, 'wt_amt')"></a>
                                            </td>
                                            <td>
                                                <a href="javascript:;" data-bind="text: lot_no, click: $root.clickString.bind($data, 'lot_no')"></a>
                                            </td>
                                            <td>
                                                <a href="javascript:;" data-bind="text: wt_by, click: $root.clickString.bind($data, 'wt_by')"></a>
                                            </td>
                                            <td style="min-width: 100px">
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
                                            <td data-bind="text: numeral(per_batch()).format('0,0.000')"></td>
                                            <td>
                                                <a href="javascript:;" data-bind="text: wt_amt, click: $root.clickString.bind($data, 'wt_amt')"></a>
                                            </td>
                                            <td>
                                                <a href="javascript:;" data-bind="text: lot_no, click: $root.clickString.bind($data, 'lot_no')"></a>
                                            </td>
                                            <td>
                                                <a href="javascript:;" data-bind="text: wt_by, click: $root.clickString.bind($data, 'wt_by')"></a>
                                            </td>
                                            <td style="min-width: 100px">
                                            </td>
                                        </tr>
                                        <!-- /ko -->
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
                                            <td data-bind="text: numeral(per_batch()).format('0,0.000')"></td>
                                            <td>
                                                <a href="javascript:;" data-bind="text: wt_amt, click: $root.clickString.bind($data, 'wt_amt')"></a>
                                            </td>
                                            <td>
                                                <a href="javascript:;" data-bind="text: lot_no, click: $root.clickString.bind($data, 'lot_no')"></a>
                                            </td>
                                            <td>
                                                <a href="javascript:;" data-bind="text: wt_by, click: $root.clickString.bind($data, 'wt_by')"></a>
                                            </td>
                                            <td style="min-width: 100px" >
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
                                            <td data-bind="text: numeral(per_batch()).format('0,0.000')"></td>
                                            <td>
                                                <a href="javascript:;" data-bind="text: wt_amt, click: $root.clickString.bind($data, 'wt_amt')"></a>
                                            </td>
                                            <td>
                                                <a href="javascript:;" data-bind="text: lot_no, click: $root.clickString.bind($data, 'lot_no')"></a>
                                            </td>
                                            <td>
                                                <a href="javascript:;" data-bind="text: wt_by, click: $root.clickString.bind($data, 'wt_by')"></a>
                                            </td>
                                            <td style="min-width: 100px">
                                            </td>
                                        </tr>
                                        <!-- /ko -->
                                        <tr>
                                            <td colspan="2"></td>
                                            <td style="background-color: yellow; color: red"><b>Total</b></td>
                                            <td  data-bind="text: numeral($root.model.sumPricePerBatchInActive()).format('0,0.000')" style="background-color: yellow; color: red; font-weight: bold"></td>
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
                        <h4>Mixing Instructions</h4>
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
                            7. Batch No.:  <span data-bind="text: model.batch_no"></span>
                        </div>
                        <div>
                           8. Batch Size: <span data-bind="text: numeral(customRequest.order()).format('0,0')"></span> softgels
                        </div>
                        <div >
                           9. Personnel: <span data-bind="text: model.personnel"></span>
                        </div>
                        <div>
                            10. IPC Person:  <span data-bind="text: model.ipc_person"></span>
                        </div>
                        <div>
                            11.Production Supervisor 
                        </div>
                        <div>
                            Weighing Person: <span data-bind="text: model.weighing_person"></span>  Box
                        </div>
                        <div>
                        Blending Person:  <span data-bind="text: model.blendling_person"></span>  Box
                        </div>
                        <div>
                        12. Line Clear (IPC):  <span data-bind="text: model.line_clear"></span>
                        </div>
                        <div>
                        13. IPC:  <span data-bind="text: model.ipc"></span>
                        </div>
                        <div>
                            14. 
                        </div>
                        <div>
                            <div >
                                <table  style="width: 100%">
                                <thead>
                                        <tr>
                                            <th rowspan="2" style="min-width: 200px"></th>
                                            <th rowspan="2">Labor name</th>
                                            <th colspan="2">Time</th>
                                            <th rowspan="2">Record (real time)</th>
                                            <th rowspan="2">Cost per hour</th>
                                            <th rowspan="2">Labor cost</th>
                                        </tr>
                                        <tr>
                                            <th>In</th>
                                            <th>Out</th>
                                        </tr>
                                    </thead>
                                    <tbody data-bind="foreach: model.dataAss">
                                        <tr>
                                            <td data-bind="text: name">
                                            </td>
                                            <td  data-bind="text : labor_name">
                                            </td>
                                            <td data-bind="text: time_in">
                                            </td>
                                            <td data-bind="text: time_out">
                                            </td>
                                            <td data-bind="text: record">
                                            </td>
                                            <td data-bind="text: numeral(cost_per_hour()).format('0,0.00')">
                                            </td>
                                            <td data-bind="text: numeral(labor_cost()).format('0,0.00')">
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div>
                            15. 
                        </div>
                        <div>
                            <div >
                                <table  style="width: 100%">
                                <thead>
                                        <tr>
                                        <th>No</th>
                                        <th>RW No.</th>
                                        <th>Ingredients</th>
                                        <th>Qty (Kg)</th>
                                        <th>Wt. Amt</th>
                                        <th>Lot No.</th>
                                        <th>Wt.By</th>
                                        <th>Check by QC</th>
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
                                            <td  data-bind="text: wt_amt">
                                            </td>
                                            <td data-bind="text: lot_no">
                                            </td>
                                            <td data-bind="text: wt_by">
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
                                            <td data-bind="text: numeral(per_batch()).format('0,0.000')"></td>
                                            <td  data-bind="text: wt_amt">
                                            </td>
                                            <td data-bind="text: lot_no">
                                            </td>
                                            <td data-bind="text: wt_by">
                                            </td>
                                        </tr>
                                        <!-- /ko -->
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
                                            <td data-bind="text: numeral(per_batch()).format('0,0.000')"></td>
                                            <td  data-bind="text: wt_amt">
                                            </td>
                                            <td data-bind="text: lot_no">
                                            </td>
                                            <td data-bind="text: wt_by">
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
                                            <td data-bind="text: numeral(per_batch()).format('0,0.000')"></td>
                                            <td  data-bind="text: wt_amt">
                                            </td>
                                            <td data-bind="text: lot_no">
                                            </td>
                                            <td data-bind="text: wt_by">
                                            </td>
                                        </tr>
                                        <!-- /ko -->
                                        <tr>
                                            <td colspan="2"></td>
                                            <td style="background-color: yellow; color: red"><b>Total</b></td>
                                            <td  data-bind="text: numeral($root.model.sumPricePerBatchInActive()).format('0,0.000')" style="background-color: yellow; color: red; font-weight: bold"></td>
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
    <div class="modal fade" id="modal-time">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Add Time</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <form name="frmTimeModal">
                        <div class="row form-group">
                            <input type="text" class="form-control datetime" >
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
            sumPricePerBatchInActive: ko.observable(0),
            dataAss: ko.observableArray([]),
            batch_no: ko.observable(0),
            personnel: ko.observable(''),
            ipc_person: ko.observable(''),
            weighing_person: ko.observable(''),
            blendling_person: ko.observable(''),
            line_clear: ko.observable(''),
            ipc: ko.observable(''),
            timeUsing: ko.observable(''),
            isEdit: ko.observable(false),
            isError: ko.observable(false)
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
        self.clickTime = function(value) {
            var obj = this;
            self.posTime = ko.observable(obj);
            self.model.checkNumber(value);

            switch (value) {
                case "time_in":
                    self.model.timeUsing(obj.time_in());
                    break;
            }
            $("#modal-time").modal("show");
        }
        self.addTime = function() {
            switch (self.model.checkNumber()) {
                case "time_in":
                    self.posTime().time_in(numeral(self.model.timeUsing())._value);
                    break;
            }
            $("#modal-time").modal("hide");
        }
        self.timeCurr = function() {
            var res = moment(new Date()).format("HH:mm")
            return res;
        }
        /* end */

        /* ----------- Click Number in table ----------- */
        self.clickNumber = function(value) {
            var obj = this;
            self.posNumber = ko.observable(obj);
            self.model.checkNumber(value);

            switch (value) {
                case "time_in":
                    self.model.numberUsing(obj.time_in());
                    break;
                case "time_out":
                    self.model.numberUsing(obj.time_out());
                    break;
                case "cost_per_hour":
                    self.model.numberUsing(obj.cost_per_hour());
                    break;
            }
            $("#modal-number").modal("show");
        }
        self.addNumber = function() {
            switch (self.model.checkNumber()) {
                case "time_in":
                    self.posNumber().time_in(numeral(self.model.numberUsing())._value);
                    break;
                case "time_out":
                    self.posNumber().time_out(numeral(self.model.numberUsing())._value);
                    break;
                case "cost_per_hour":
                    self.posNumber().cost_per_hour(numeral(self.model.numberUsing())._value);
                    break;

            }
            $("#modal-number").modal("hide");
            self.caculate();
        }
        /* end */

        /* ----------- Click String in table  -----------*/
        self.clickString = function(value) {
            var obj = this;
            self.posString = ko.observable(obj);
            self.model.checkNumber(value);

            switch (value) {
                case "wt_amt":
                    self.model.stringUsing(obj.wt_amt());
                    break;
                case "lot_no":
                    self.model.stringUsing(obj.lot_no());
                    break;
                case "wt_by":
                    self.model.stringUsing(obj.wt_by());
                    break;
                case "typeBottles_name2":
                    self.model.stringUsing(obj.name2());
                    break;
                case "typeBottles_name3":
                    self.model.stringUsing(obj.name3());
                    break;

                case "name":
                    self.model.stringUsing(obj.name());
                    break;
                case "labor_name":
                    self.model.stringUsing(obj.labor_name());
                    break;
                case "record":
                    self.model.stringUsing(obj.record());
                    break;

                default:
                    $("#modal-string").modal("hide");
                    break;
            }
            $("#modal-string").modal("show");
        }
        self.addString = function() {
            switch (self.model.checkNumber()) {
                case "wt_amt":
                    self.posString().wt_amt(self.model.stringUsing());
                    break;
                case "lot_no":
                    self.posString().lot_no(self.model.stringUsing());
                    break;
                case "wt_by":
                    self.posString().wt_by(self.model.stringUsing());
                    break;
                case "typeBottles_name2":
                    self.posString().name2(self.model.stringUsing());
                    break;
                case "typeBottles_name3":
                    self.posString().name3(self.model.stringUsing());
                    break;
                case "name":
                    self.posString().name(self.model.stringUsing());
                    break;
                case "labor_name":
                    self.posString().labor_name(self.model.stringUsing());
                    break;
                case "record":
                    self.posString().record(self.model.stringUsing());
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

        self.caculateInput = function(data) {
            var dateCurr = moment().format("YYYY-MM-DD");

            if (data.time_in_cof() == null || data.time_in_cof() == "") {
                data.time_in(dateCurr);
            } 
            if (data.time_out_cof() != null && data.time_out_cof() != "") {
                data.time_out(dateCurr);
            }
            self.caculate();
        }

        self.caculate = function() {
            var arr = self.model.dataAss();
            console.log(ko.mapping.toJS(arr));

            for (var i = 0; i < arr.length; i++) {

                if (arr[i].time_out_cof() != null && arr[i].time_out_cof() != "") {
                    var time_in_cof = arr[i].time_in_cof();
                    var time_out_cof = arr[i].time_out_cof();
                    var time_in = moment(arr[i].time_in()).format("YYYY-MM-DD");
                    var time_out = moment(arr[i].time_out()).format("YYYY-MM-DD");
                    var time_in_cal = moment(time_in + " " + time_in_cof);
                    var time_out_cal = moment(time_out + " " + time_out_cof);
                    var second = time_out_cal.diff(time_in_cal, 'minutes');

                    if (second < 0) {
                        toastr.error("Time out is greater than time in");
                        self.model.isError(true);
                        return false;
                    }
                    var res = Number(arr[i].cost_per_hour()) * (second / 60);
                    arr[i].labor_cost(res);
                }
            }
        }

        self.secondToHours = function(second) {
            return second/60;
        }

        self.save = function() {
            var idCustomRequest = formCustomRequest.find("select[name=custom_request]").val();

            if (!idCustomRequest || idCustomRequest == undefined || idCustomRequest == "") {
                return false;
            }
            if (self.model.isError()) {
                toastr.error("Time out error in Labor table");
                return false;
            }
            var personnel = self.model.personnel();
            var ipc_person = self.model.ipc_person();
            var weighing_person = self.model.weighing_person();
            var blendling_person = self.model.blendling_person();
            var line_clear = self.model.line_clear();
            var ipc = self.model.ipc();
            var batch_no = self.model.batch_no();
            var listIngredientColorShell = self.model.dataIngredientsColor().concat(self.model.dataIngredientsShell());
            var listIngredientInActive = self.model.dataIngredientsActive().concat(self.model.dataIngredientsInActive());
            var listIngredient = listIngredientColorShell.concat(listIngredientInActive);
            listIngredient = ko.mapping.toJS(listIngredient);
            var listAss = ko.mapping.toJS(self.model.dataAss());

            var data = {
                isEdit: self.model.isEdit(),
                idCustomRequest: idCustomRequest,
                personnel: personnel,
                ipc_person: ipc_person,
                weighing_person: weighing_person,
                blendling_person: blendling_person,
                line_clear: line_clear,
                ipc: ipc,
                batch_no: batch_no,

                listIngredient: JSON.stringify(listIngredient),
                listAss: JSON.stringify(listAss),
            }
            sendData('POST', '{{ route('admin.report.savemixing') }}', data, function(message){
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

        self.initTime = function() {
            $('.datetime').daterangepicker({
                singleDatePicker: true,
                timePicker24Hour : true,
                timePicker: true,
                timePickerIncrement: 1,
                locale: {
                    format: 'HH:mm'
                }
            }, function (start, end, label) { 
                // self.caculate();
                // start_time = start.format('HH:mm');
                // end_time = end.format('HH:mm');
            }).on('show.daterangepicker', function (ev, picker) {
                picker.container.find(".calendar-table").hide(); //Hide calendar
            });
        }

        self.addAss = function() {
            var obj = {
                name: ko.observable("Enter"),
                labor_name: ko.observable("Enter"),
                time_in: ko.observable(moment().format("YYYY-MM-DD")),
                time_out: ko.observable(""),
                record: ko.observable("Enter"),
                cost_per_hour: ko.observable("0"),
                labor_cost: ko.observable("0"),
                time_in_cof: ko.observable(self.timeCurr()),
                time_out_cof: ko.observable("00:00"),
            }
            self.model.dataAss.push(obj);
            self.initTime();
        }

        self.removeAss = function(data) {
            self.model.dataAss.remove(data);
        }

        formCustomRequest.find("select[name=custom_request]").change(function() {
            var id = $(this).val();

            if (id) {
                sendData("GET", '{{ route('admin.reportmixing.getreportformula') }}', { id: id }, function(res) {
                    formDataView.removeClass("d-none");
                    self.model.dataIngredientsColor([]);
                    self.model.dataIngredientsShell([]);
                    self.model.dataIngredientsActive([]);
                    self.model.dataIngredientsInActive([]);
                    self.model.dataAss([]);

                    if (res.manufature) {
                        self.manufature.name(res.manufature.name);
                        self.manufature.address(res.manufature.address);
                        self.manufature.phone(res.manufature.phone);
                    } else {
                        self.manufature.name('');
                        self.manufature.address('');
                        self.manufature.phone('');
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
                    if (res.reportMixing) {
                        self.model.isEdit(true);
                        self.model.personnel(res.reportMixing.personnel);
                        self.model.ipc_person(res.reportMixing.ipc_person);
                        self.model.weighing_person(res.reportMixing.weighing_person);
                        self.model.blendling_person(res.reportMixing.blendling_person);
                        self.model.line_clear(res.reportMixing.line_clear);
                        self.model.ipc(res.reportMixing.ipc);
                        self.model.batch_no(res.reportMixing.batch_no);
                    }
                    $.each(res.listAss, function( index, value ) {
                        var t = ko.mapping.fromJS(value);
                        self.model.dataAss.push(t);
                        self.initTime();
                    });
                    var sum = 0;

                    $.each(res.ingredientsActive, function( index, value ) {
                        sum += Number(value.per_batch)
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
                            price_per_batch: res.isEmpty ? 0 : value.price_per_batch,
                            wt_amt: !value.wt_amt ? "Enter" : value.wt_amt,
                            lot_no: !value.lot_no ? "Enter" : value.lot_no,
                            wt_by: !value.wt_by ? "Enter" : value.wt_by,
                            check_by_qc: !value.check_by_qc ? "Enter" : value.check_by_qc,
                        };
                        self.model.dataIngredientsActive.push(ko.mapping.fromJS(obj));
                    });
                    $.each(res.ingredientsInActive, function( index, value ) {
                        sum += Number(value.per_batch)
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
                            price_per_batch: res.isEmpty ? 0 : value.price_per_batch,
                            wt_amt: !value.wt_amt ? "Enter" : value.wt_amt,
                            lot_no: !value.lot_no ? "Enter" : value.lot_no,
                            wt_by: !value.wt_by ? "Enter" : value.wt_by,
                            check_by_qc: !value.check_by_qc ? "Enter" : value.check_by_qc,
                        };
                        self.model.dataIngredientsInActive.push(ko.mapping.fromJS(obj));
                    });
                    self.model.sumPricePerBatchInActive(sum);
                    $.each(res.ingredientsColor, function( index, value ) {

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
                            price_per_batch: res.isEmpty ? 0 : value.price_per_batch,
                            wt_amt: !value.wt_amt ? "Enter" : value.wt_amt,
                            lot_no: !value.lot_no ? "Enter" : value.lot_no,
                            wt_by: !value.wt_by ? "Enter" : value.wt_by,
                            check_by_qc: !value.check_by_qc ? "Enter" : value.check_by_qc,
                        };
                        self.model.dataIngredientsColor.push(ko.mapping.fromJS(obj));
                    });
                    $.each(res.ingredientsShell, function( index, value ) {
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
                            price_per_batch: res.isEmpty ? 0 : value.price_per_batch,
                            wt_amt: !value.wt_amt ? "Enter" : value.wt_amt,
                            lot_no: !value.lot_no ? "Enter" : value.lot_no,
                            wt_by: !value.wt_by ? "Enter" : value.wt_by,
                            check_by_qc: !value.check_by_qc ? "Enter" : value.check_by_qc,
                        };
                        self.model.dataIngredientsShell.push(ko.mapping.fromJS(obj));
                    });
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
