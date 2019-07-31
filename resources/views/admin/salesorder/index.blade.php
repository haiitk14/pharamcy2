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
                        <button class="btn btn-outline-primary" id="save-form" title="Save Form" type="button">
                            <i class="fa fa-save" aria-hidden="true"></i>
                            {{ __('Save') }}
                        </button>
                    </div>
                    <form id="dataview" >
                        <div class="row form-group">
                            <div class="col-sm-6 info-manufature">
                               
                            </div>
                            <div class="col-sm-6 row">
                                <label for="ipd" class="col-sm-2 col-form-label">IPD</label>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control" title="Enter IPD" name="ipd"  placeholder="IPD">
                                </div>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-sm-12 text-center">
                            <h4>Customer Request</h4>
                            </div>
                        </div>
                        <div class="row form-group">
                            <label for="product" class="col-sm-2 col-form-label">Product *</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" title="Enter Product" name="product">
                            </div>
                        </div>
                        <div class="row form-group">
                            <label for="customer" class="col-sm-2 col-form-label">Customer *</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" title="Enter Customer" name="customer">
                            </div>
                        </div>
                        <div class="row form-group">
                            <label for="address" class="col-sm-2 col-form-label">Address:</label>
                            <div class="col-sm-8">
                                <textarea name="address" title="Enter Address" class="form-control"></textarea>
                            </div>
                        </div>
                        <div class="row form-group">
                            <label for="manufatureby" class="col-sm-2 col-form-label">Manufature by:</label>
                            <div class="col-sm-8">
                                <select class="form-control" name="manufatureby" title="{{ __('Select Manufature') }}">
                                    <option value="">{{ __('None') }}</option>
                                    @foreach ($data['manufatures'] as $manufatures)
                                        <option value="{{ $manufatures->id }}">{{ $manufatures->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        
                        <div class="row form-group">
                            <label for="formula" class="col-sm-2 col-form-label">Formula number</label>
                            <div class="col-sm-4">
                                <input type="text" title="Enter Formula number" class="form-control" name="formula">
                            </div>
                        </div>
                        <div class="row form-group">
                            <label for="revision" class="col-sm-2 col-form-label">Revision</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="revision">
                            </div>
                        </div>
                        <div class="row form-group">
                            <label for="date" class="col-sm-2 col-form-label">Date *</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control date" name="date">
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-sm-12 text-center">
                            <h4>Specification</h4>
                            </div>
                        </div>
                        <div class="row form-group ">
                            <label for="date" class="col-sm-2 col-form-label">Dosage form:*</label>
                            <div class="col-sm-4">
                                <div class="form-check-inline">
                                    <label class="form-check-label">
                                        <input type="checkbox" name="softgel" class="form-check-input">Softgel
                                    </label>
                                    </div>
                                    <div class="form-check-inline">
                                    <label class="form-check-label">
                                        <input type="checkbox" name="tablet" class="form-check-input">Tablet
                                    </label>
                                    </div>
                                    <div class="form-check-inline">
                                    <label class="form-check-label">
                                        <input type="checkbox"  name="hardcapsule" class="form-check-input">Hardcapsule
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="row form-group">
                            <label for="size" class="col-sm-2 col-form-label">Size/Type</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" name="size">
                            </div>
                        </div>
                        <div class="row form-group">
                            <label for="color" class="col-sm-2 col-form-label">Color/Logo</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" name="color">
                            </div>
                        </div>
                        <div class="row form-group">
                            <label for="filling" class="col-sm-2 col-form-label">Filling Wt</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" name="filling">
                            </div>
                        </div>
                        <div class="row form-group">
                            <label for="order" class="col-sm-2 col-form-label">Order * </label>
                            <div class="col-sm-4">
                                <input type="number" class="form-control" name="order">
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-sm-12 ">
                            <h4>Formulary Specification</h4>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-sm-8">
                                <select class="form-control" name="ingredient"  title="Choose Ingredient">
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
                            <div class="col-sm-10">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Ingredients *</th>
                                            <th>per Serving *</th>
                                            <th width="5%">Del</th>
                                        </tr>
                                    </thead>
                                    <tbody id="data-color">
                                    </tbody>
                                    <tbody id="data-shell">
                                    </tbody>
                                    <tbody id="data-active">
                                    </tbody>
                                    <tbody id="data-inactive">
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
                                <a href="javascript:;" id="add-comment" title="Add Comment" class="btn btn-outline-primary"><i class="fa fa-plus"></i> Add</a>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-sm-10">
                                <table class="table table-bordered">
                                    <tbody id="data-comments">
                                    </tbody>
                                   
                                </table>
                            </div>
                        </div>
                        <div class="row form-group">
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
                            <h4 style="margin-top: 100px;">Pharmaxx (tick)</h4>
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
                    <form id="dataprint" class="d-none">
                        <div style="display: flex;">
                            <div style="margin-right: 12rem; width: 18rem;" class="info-manufature">
                               
                            </div>
                            <div>
                                <b>IPD: <span class="ipdprint"></span></b>
                            </div>
                        </div>
                        <div >
                            <div style="text-align: center">
								<h4>Customer Request</h4>
                            </div>
                        </div>
                        <div >
                            <div >Product: <span class="productprint"></span> </div>
                        </div>
                        <div >
                            <div>Customer: <span class="customerprint"></span></div>
                        </div>
                        <div>
                            <div >Address: <span class="addressprint"></span> </div>
                        </div>
                        <div>
                            <div>Manufature by: <span class="manufaturebyprint"></span> </div> 
                        </div>
                        <div >
                            <div>Formula number: <span class="formulaprint"></span> </div> 
                        </div>
                        <div>
                            <div >Revision: <span class="revisionprint"></span> </div>
                        </div>
                        <div >
                            <div >Date: <span class="dateprint"></span> </div>
                        </div>
                        <div >
                            <div style="text-align: center">
                            <h4>Specification</h4>
                            </div>
                        </div>
                        <div style="display: flex;">
                            <div>Dosage form: </div>
                            <div>
                                <input type="checkbox" name="softgelprint" >Softgel
                            </div>
                            <div>
                                <input type="checkbox" name="tabletprint">Tablet
                            </div>
                            <div>
                                <input type="checkbox" name="hardcapsuleprint">Hardcapsule
                            </div>
                        </div>
                        <div>
                            <div>Size/Type: <span class="sizeprint"></span> </div>
                        </div>
                        <div>
                            <div>Color/Logo: <span class="colorprint"></span> </div>
                        </div>
                        <div>
                            <div>Filling Wt: <span class="fillingprint"></span></div> 
                        </div>
                        <div>
                            <div >Order: <span class="orderprint"></span> </div>
                        </div>
                        <div>
                            <div >
                            <h4>Formulary Specification</h4>
                            </div>
                        </div>
                        <div>
                            <div>
                                <table style="width: 100%">
                                    <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Ingredients *</th>
                                        <th>per Serving *</th>
                                    </tr>
                                    </thead>
                                    <tbody id="data-color-print">
                                    </tbody>
                                    <tbody id="data-shell-print">
                                    </tbody>
                                    <tbody id="data-active-print">
                                    </tbody>
                                    <tbody id="data-inactive-print">
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div>
                            <div>
                            <h5>Comments or Additional Instructions</h5>
                            </div>
                        </div>
                        <div>
                            <div>
                                <table style="width: 100%">
                                    <tbody id="data-comments-print">
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
                            <h4 style="margin-top: 500px;">Pharmaxx (tick)</h4>
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
    <!-- The Modal -->
    <div class="modal fade" id="modal-perserving">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Add Per Serving</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <form name="frmPerServingModal">
                        <div class="row form-group">
                            <input type="number" min="0.1" class="form-control" name="value_perserving" placeholder="Enter Per Serving" />
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" id="save-perserving">Save</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
                
            </div>
        </div>
    </div>
</div>
@endsection
@section('script')
<script>
	$(document).ready(function() {
        var formDataView = $("#dataview");
        var formDataPrint = $("#dataprint");
        var dataIng =  {!! json_encode($data['ingredients']->toArray()) !!}; 
        var dataTableIng = [];
		var dataComments =  {!! json_encode($data['comments']->toArray()) !!}; 
        var dataTableComments = [];
        var dataManufatures = {!! json_encode($data['manufatures']->toArray()) !!}; 
        var modalPerServing = $("#modal-perserving");

		/* Init datetime */
        $('.date').daterangepicker({
            singleDatePicker: true,
            showDropdowns: true,
            minYear: 1901,
            maxYear: parseInt(moment().format('YYYY'),10),
            // locale: {
            //     format: 'YYYY/MM/DD'
            // }
        });


        /* Print */
        $("#print").click(function(){
            setDataIntoFormPrint();
        });

		/* Process table ingredient */
        $("#add-ingredient").click(function(){
            var ingredient = formDataView.find("select[name=ingredient]").val();

            if (ingredient == "") {
                toastr.error('{{ __('The ingredient not empty.') }}');
               return false;
            }
            
            if (checkItemExistArrayIngredients(dataTableIng, ingredient)) {
                toastr.error('{{ __('The ingredient exist.') }}');
                return false;
            }

            $.each(dataIng , function(index, item) { 
                if (item.id == ingredient) {
                    item.per_serving = 0;
                    dataTableIng.push(item);
                }
            });
            addRowTableIngredients(dataTableIng);
            formDataView.find("select[name=ingredient]").val("");
        });

        $(document).on('click', "a.delingredient", function() {
            var idR = $(this).data('id');
            var arrayTemp = dataTableIng;
            for (var i = 0 ; i < arrayTemp.length; i++) {
                if (arrayTemp[i].id == Number(idR)) {
                    dataTableIng.splice(i, 1);
                }
            }
            addRowTableIngredients(dataTableIng);
        });

        $(document).on('click', "a.addperserving", function() {
            // var idR = $(this).data('id');
            var tr = $(this).closest("tr").addClass("item-add");
            modalPerServing.find("input[name=value_perserving]").val($(this).text());
            modalPerServing.modal("show");
        });

        $("#save-perserving").click(function() {
            var per = modalPerServing.find("input[name=value_perserving]").val();
            var idR = $(".item-add").find(".addperserving").data("id");

            $.each(dataTableIng , function(index, item) { 
                if (item.id == idR) {
                    item.per_serving = per;
                }
            });
            addRowTableIngredients(dataTableIng);
            $(".addperserving").closest("tr").removeClass("item-add");
            modalPerServing.find("input[name=value_perserving]").val("");
            modalPerServing.modal("hide");
        });

        /* end */

		/* Process table Comments*/
		$("#add-comment").click(function(){
            var comment = formDataView.find("input[name=comment]").val();

            if (comment == "") {
                toastr.error('{{ __('The comment not empty.') }}');
               return false;
            }
            
            if (checkItemExistArrayComments(dataTableComments, comment)) {
                toastr.error('{{ __('The comment exist.') }}');
                return false;
            }

            // $.each(dataComments , function(index, item) { 
            //     if (item.id == comment) {
            //         dataTableComments.push(item);
            //     }
            // });
            dataTableComments.push({ content: comment });
            addRowTableComments(dataTableComments);
            formDataView.find("input[name=comment]").val("");
        });

        $(document).on('click', "a.delcomment", function() {
            var idR = $(this).data('id');
            var arrayTemp = dataTableComments;
            for (var i = 0 ; i < arrayTemp.length; i++) {
                if (arrayTemp[i].content == String(idR)) {
                    dataTableComments.splice(i, 1);
                }
            }
            addRowTableComments(dataTableComments);
        });
        /* end */

        /* Change Manufature */
        formDataView.find("select[name=manufatureby]").change(function() {
            var id = $(this).val();
            var str = "";
            // <b>Pharmaxx, Inc.</b><br>
            // 30590 Cochise Circle, Murrieta, CA 92563
            // <br> Tel. (951) 599-8010;
            $.each(dataManufatures, function (index, value) {
                if (id == value.id ) {
                    str += "<b>" + value.name +  "</b><br> " + value.address + "<br>Tel. " + value.phone + ";"; 
                    return false;
                }
            });
            formDataView.find(".info-manufature").html(str);
            formDataPrint.find(".info-manufature").html(str);
        });      

        
        /* Save */
        $("#save-form").click(function() {
            var ipd = formDataView.find("input[name=ipd]").val();
            var product = formDataView.find("input[name=product]").val();
            var customer = formDataView.find("input[name=customer]").val();
            var address = formDataView.find("textarea[name=address]").val();
            var manufature_id = formDataView.find("select[name=manufatureby]").val();
            var formula_number = formDataView.find("input[name=formula]").val();
            var revision = formDataView.find("input[name=revision]").val();
            var date = formDataView.find("input[name=date]").val();
            var is_softgel = $('input[name=softgel]').is(":checked") ? 1 : 0;
            var is_tablet = $('input[name=tablet]').is(":checked") ? 1 : 0;
            var is_hardcapsule = $('input[name=hardcapsule]').is(":checked") ? 1 : 0;
            var size_type = formDataView.find("input[name=size]").val();
            var color_logo = formDataView.find("input[name=color]").val();
            var filling_wt = formDataView.find("input[name=filling]").val();
            var order = formDataView.find("input[name=order]").val();

            var data = {
                ipd: ipd,
                product: product,
                customer: customer,
                address: address,
                manufature_id: manufature_id,
                formula_number: formula_number,
                revision: revision,
                date: moment(new Date(date)).format("YYYY-MM-DD"),
                is_softgel: is_softgel,
                is_tablet: is_tablet,
                is_hardcapsule: is_hardcapsule,
                size_type: size_type,
                color_logo: color_logo,
                filling_wt: filling_wt,
                order: Number(order),
                listIngredients:  JSON.stringify(dataTableIng), 
                listComments:  JSON.stringify(dataTableComments), 
            };
            // console.log(data);
            sendData('POST', '{{ route('admin.report.saveform') }}', data, function(message){
                $.each(message, function (index, value) {
                    toastr.success(value);
                });
            });
        });
    }); 

    var setDataIntoFormPrint = function() {
		var formDataView = $("#dataview");
		var formDataPrint = $("#dataprint");

		var ipd = formDataView.find("input[name=ipd]").val();
		var product = formDataView.find("input[name=product]").val();
		var customer = formDataView.find("input[name=customer]").val();
		var manufatureby = formDataView.find("select[name=manufatureby]").val();
		var address = formDataView.find("textarea[name=address]").val();
		var formula = formDataView.find("input[name=formula]").val();
		var revision = formDataView.find("input[name=revision]").val();
		var date = formDataView.find("input[name=date]").val();

		if ($('input[name=softgel]').is(":checked")) {
            formDataPrint.find('input[name=softgelprint]').attr('checked','checked');
        }
        if ($('input[name=tablet]').is(":checked")) {
			 formDataPrint.find('input[name=tabletprint]').attr('checked','checked');
        }
        if ($('input[name=hardcapsule]').is(":checked")) {
			 formDataPrint.find('input[name=hardcapsuleprint]').attr('checked','checked');
        }
		var size = formDataView.find("input[name=size]").val();
		var color = formDataView.find("input[name=color]").val();
		var filling = formDataView.find("input[name=filling]").val();
		var order = formDataView.find("input[name=order]").val();

		formDataPrint.find(".ipdprint").html(ipd);
		formDataPrint.find(".productprint").html(product);
		formDataPrint.find(".customerprint").html(customer);
		formDataPrint.find(".manufaturebyprint").html(manufatureby);
		formDataPrint.find(".addressprint").html(address);
		formDataPrint.find(".formulaprint").html(formula);
		formDataPrint.find(".revisionprint").html(revision);
		formDataPrint.find(".dateprint").html(date);
		formDataPrint.find(".sizeprint").html(size);
		formDataPrint.find(".colorprint").html(color);
		formDataPrint.find(".fillingprint").html(filling);
		formDataPrint.find(".orderprint").html(order);

        print("dataprint");
    }

    var addRowTableIngredients = function(data) {
        $("#data-active, #data-inactive, #data-color, #data-shell, #data-active-print, #data-inactive-print, #data-color-print, #data-shell-print").html("");
        var strActive = "";
        var strInActive = "";
        var strColor = "";
        var strShell = "";
		var strActivePrint = "";
        var strInActivePrint = "";
        var strColorPrint = "";
        var strShellPrint = "";

        var num = 1;

        var notHaveColor = true;
        for (var i = 0; i < data.length; i++) {

            if (data[i].inactive != 2) {
                continue;
            }

            if (notHaveColor) {
                strColor += "<tr><th colspan='5'>Color</th></tr>";
                strColorPrint += "<tr><th colspan='5' style='text-align: left'>Color</th></tr>";
                notHaveColor = false;
            }
            strColor += "<tr><td>" + num  + "</td><td>" + data[i].name +
                "</td><td class='per-serving'><a href='javascript:;' data-id='" + data[i].id + "' class='addperserving' title='Edit Per Serving'>" + data[i].per_serving + "</a></td><td class='text-center'> <a href='javascript:;' data-id='" + data[i].id + "' class='delingredient' title='Delete Item'><i class='fa fa-lg fa-trash' aria-hidden='true'></i></a> </td></tr>";
            strColorPrint += "<tr><td>" + num  + "</td><td>" + data[i].name + "</td><td>" + data[i].per_serving + "</td></tr>";
            num++;
        }

        var notHaveShell = true;
        for (var i = 0; i < data.length; i++) {

            if (data[i].inactive != 3) {
                continue;
            }

            if (notHaveShell) {
                strShell += "<tr><th colspan='5'>Shell</th></tr>";
                strShellPrint += "<tr><th colspan='5' style='text-align: left'>Shell</th></tr>";
                notHaveShell = false;
            }

            strShell += "<tr><td>" + num  + "</td><td>" + data[i].name +
                "</td><td class='per-serving'><a href='javascript:;' data-id='" + data[i].id + "' class='addperserving' title='Edit Per Serving'>" + data[i].per_serving + "</a></td><td class='text-center'> <a href='javascript:;' data-id='" + data[i].id + "' class='delingredient' title='Delete Item'><i class='fa fa-lg fa-trash' aria-hidden='true'></i></a> </td></tr>";
            strShellPrint += "<tr><td>" + num  + "</td><td>" + data[i].name + "</td><td>" + data[i].per_serving + "</td></tr>";
            num++;
        }

        var notHaveActive = true;
        for (var i = 0; i < data.length; i++) {

            if (data[i].inactive != 0) {
                continue;
            }

            if (notHaveActive) {
                strActive += "<tr><th colspan='5'>Active</th></tr>"
                strActivePrint += "<tr><th colspan='5' style='text-align: left'>Active</th></tr>";
                notHaveActive = false;
            }
            strActive += "<tr><td>" + num  + "</td><td>" + data[i].name +
                "</td><td class='per-serving'><a href='javascript:;' data-id='" + data[i].id + "' class='addperserving' title='Edit Per Serving'>" + data[i].per_serving + "</a></td><td class='text-center'> <a href='javascript:;' data-id='" + data[i].id + "' class='delingredient' title='Delete Item'><i class='fa fa-lg fa-trash' aria-hidden='true'></i></a> </td></tr>";
            strActivePrint += "<tr><td>" + num  + "</td><td>" + data[i].name + "</td><td>" + data[i].per_serving + "</td></tr>";
            num++;
        }

        var notHaveInActive = true;
        for (var i = 0; i < data.length; i++) {
            if (data[i].inactive != 1) {
                continue;
            }

            if (notHaveInActive) {
                strInActive += "<tr><th colspan='5'>InActive</th></tr>";
                strInActivePrint += "<tr><th colspan='5' style='text-align: left'>InActive</th></tr>";
                notHaveInActive = false;
            }

            strInActive += "<tr><td>" + num  + "</td><td>" + data[i].name +
                "</td><td class='per-serving'><a href='javascript:;' data-id='" + data[i].id + "' class='addperserving' title='Edit Per Serving'>" + data[i].per_serving + "</a></td><td class='text-center'> <a href='javascript:;' data-id='" + data[i].id + "' class='delingredient' title='Delete Item'><i class='fa fa-lg fa-trash' aria-hidden='true'></i></a> </td></tr>";
            strInActivePrint += "<tr><td>" + num  + "</td><td>" + data[i].name + "</td><td>" + data[i].per_serving + "</td></tr>"
            num++;
        }

        $("#data-color").html(strColor);
        $("#data-shell").html(strShell);
        $("#data-active").html(strActive);
        $("#data-inactive").html(strInActive);
        $("#data-active-print").html(strActivePrint);
        $("#data-inactive-print").html(strInActivePrint);
        $("#data-color-print").html(strColorPrint);
        $("#data-shell-print").html(strShellPrint);
    }

	var addRowTableComments = function(data) {
        $("#data-comments, #data-comments-print").html("");
        var str = "";
		var strPrint = "";

        for (var i = 0; i < data.length; i++) {
            str += "<tr><td>" + (i + 1)  + "</td><td>" + data[i].content + "</td><td class='text-center'> <a href='javascript:;' data-id='" + data[i].content + "' class='delcomment' title='Delete Item'><i class='fa fa-lg fa-trash' aria-hidden='true'></i></a> </td></tr>";
            strPrint += "<tr><td>" + (i + 1)  + "</td><td>" + data[i].content + "</td></tr>";
        }
       
        $("#data-comments").html(str);
		$("#data-comments-print").html(strPrint);
    }

    var checkItemExistArrayIngredients = function(array, id) {
        var res = false;
        $.each(array , function(index, item) { 
            if (item.id == Number(id)) {
                res = true;
                return false;
            }
        });
        return res;
    }
    var checkItemExistArrayComments = function(array, comment) {
        var res = false;
        $.each(array , function(index, item) { 
            if (item.content == comment) {
                res = true;
                return false;
            }
        });
        return res;
    }
</script>
@endsection
