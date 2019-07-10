@extends('admin.layout.master')

@section('content')
<div class="container-fluid">
	@include('admin.partials.breadcrumb')
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
            <div class="card mb-3">
                <div class="card-body">
                    <div class="text-left form-group col-xl-12">
                        <button class="btn btn-primary" id="print" type="button">
                            {{ __('Print') }}
                            <i class="fa fa-print" aria-hidden="true"></i>
                        </button>
                    </div>
                    <form id="dataview" >
                        <div class="row form-group">
                            <div class="col-sm-6">
                                <b>Pharmaxx, Inc.</b><br>
                                30590 Cochise Circle, Murrieta, CA 92563
                                <br> Tel. (951) 599-8010;
                            </div>
                            <div class="col-sm-6 row">
                                <label for="ipd" class="col-sm-2 col-form-label">IPD</label>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control" id="ipd" placeholder="IPD">
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
                                <select class="form-control" id="product" title="{{ __('Product') }}">
                                    <option value="">{{ __('None') }}</option>
                                    @foreach ($data['products'] as $product)
                                    <option value="{{ $product->name }}">{{ $product->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="row form-group">
                            <label for="customer" class="col-sm-2 col-form-label">Customer *</label>
                            <div class="col-sm-8">
                                <select class="form-control" id="customer" title="{{ __('Customer') }}">
                                    <option value="">{{ __('None') }}</option>
                                    @foreach ($data['customers'] as $customer)
                                    <option value="{{ $customer->full_name }}">{{ $customer->full_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="row form-group">
                            <label for="manufatureby" class="col-sm-2 col-form-label">Manufature by:</label>
                            <div class="col-sm-8">
                                <select class="form-control" id="manufatureby">
                                    <option value="Pharmaxx">Pharmaxx</option>
                                    <option value="I.P.D (Ampharco USA)">I.P.D (Ampharco USA)</option>
                                    <option value="Exxelife">Exxelife</option>
                                </select>
                            </div>
                        </div>
                        <div class="row form-group">
                            <label for="address" class="col-sm-2 col-form-label">Address:</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="address">
                            </div>
                        </div>
                        <div class="row form-group">
                            <label for="po" class="col-sm-2 col-form-label">P.O.</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" id="po">
                            </div>
                        </div>
                        <div class="row form-group">
                            <label for="formula" class="col-sm-2 col-form-label">Formula</label>
                            <div class="col-sm-4">
                                <select class="form-control" id="formula" title="{{ __('Customer') }}">
                                    <option value="">{{ __('None') }}</option>
                                    @foreach ($data['formulas'] as $formula)
                                    <option value="{{ $formula->name }}">{{ $formula->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="row form-group">
                            <label for="revision" class="col-sm-2 col-form-label">Revision</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="revision">
                            </div>
                        </div>
                        <div class="row form-group">
                            <label for="date" class="col-sm-2 col-form-label">Date *</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control date" id="date">
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-sm-12 text-center">
                            <h5>Specification</h5>
                            </div>
                        </div>
                        <div class="row form-group ">
                            <label for="date" class="col-sm-2 col-form-label">Dosage form:*</label>
                            <div class="col-sm-4">
                                <div class="form-check-inline">
                                    <label class="form-check-label">
                                        <input type="checkbox" id="softgel" class="form-check-input">Softgel
                                    </label>
                                    </div>
                                    <div class="form-check-inline">
                                    <label class="form-check-label">
                                        <input type="checkbox" id="tablet" class="form-check-input">Tablet
                                    </label>
                                    </div>
                                    <div class="form-check-inline">
                                    <label class="form-check-label">
                                        <input type="checkbox"  id="hardcapsule" class="form-check-input">Hardcapsule
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="row form-group">
                            <label for="size" class="col-sm-2 col-form-label">Size/Type</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" id="size">
                            </div>
                        </div>
                        <div class="row form-group">
                            <label for="color" class="col-sm-2 col-form-label">Color/Logo</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" id="color">
                            </div>
                        </div>
                        <div class="row form-group">
                            <label for="filling" class="col-sm-2 col-form-label">Filling Wt</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" id="filling">
                            </div>
                        </div>
                        <div class="row form-group">
                            <label for="order" class="col-sm-2 col-form-label">Order * </label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" id="order">
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-sm-12 ">
                            <h5>Formulary Specification</h5>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-sm-4"></div>
                            <div class="col-sm-2">
                                <input type="text" class="form-control" id="wtmg">
                            </div>
                            <label for="wtmg" class="col-sm-2 col-form-label">Wt (mg) </label>
                        </div>
                        <div class="row form-group">
                            <div class="col-sm-8">
                                <select class="form-control" name="ingredient"  title="Choose Ingredient">
                                    <option value="">None</option>
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
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody id="data-active">
                                    </tbody>
                                    <tbody id="data-inactive">
                                        <tr>
                                            <th colspan="4">Inactive Ingredients</th>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            
                        </div>
                        <div class="row form-group">
                            <div class="col-sm-12 ">
                            <h5>Comments or Additional Instructions</h5>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-sm-10">
                                <table class="table table-bordered">
                                    <tbody>
                                        <tr>
                                            <td>1</td>
                                            <td>All raw materials provided by Pharmaxx</td>
                                        </tr>
                                        <tr>
                                            <td>2</td>
                                            <td>Softgel Encapsulation by Pharmaxx</td>
                                        </tr>
                                        <tr>
                                            <td>3</td>
                                            <td>Lead time: 6-8 weeks. After AW approved (FOS..)</td>
                                        </tr>
                                        <tr>
                                            <td>4</td>
                                            <td>Packaging: Box of 60 softgels</td>
                                        </tr>
                                        <tr>
                                            <td>5</td>
                                            <td>FOB Murrieta , CA</td>
                                        </tr>
                                        <tr>
                                            <td>6</td>
                                            <td>Price quote good for 14 days.</td>
                                        </tr>
                                    </tbody>
                                   
                                </table>
                            </div>
                            
                        </div>
                    </form>
                    <form id="dataprint" class="d-none">
                       
                        <div style="display: flex;">
                            <div style="margin-right: 12rem; width: 18rem;">
                                <b>Pharmaxx, Inc.</b><br>
                                    30590 Cochise Circle, Murrieta, CA 92563
                                    <br> Tel. (951) 599-8010;
                            </div>
                            <div class="">
                                <b>IPD: <span id="ipdprint"></span></b>
                            </div>
                        </div>
                        <div >
                            <div style="text-align: center">
                            <h4>Customer Request</h4>
                            </div>
                        </div>
                        <div >
                            <div >Product: <span id="productprint"></span> </div>
                        </div>
                        <div >
                            <div>Customer: <span id="customerprint"></span></div>
                        </div>
                        <div>
                            <div>Manufature by: <span id="manufaturebyprint"></span> </div> 
                        </div>
                        <div>
                            <div >Address: <span id="addressprint"></span> </div>
                        </div>
                        <div >
                            <div>P.O.: <span id="poprint"></span> </div> 
                        </div>
                        <div >
                            <div>Formula: <span id="formulaprint"></span> </div> 
                        </div>
                        <div>
                            <div >Revision: <span id="revisionprint"></span> </div>
                        </div>
                        <div >
                            <div >Date: <span id="dateprint"></span> </div>
                        </div>
                        <div >
                            <div style="text-align: center">
                            <h5>Specification</h5>
                            </div>
                        </div>
                        <div style="display: flex;">
                            <div >Dosage form: </div>
                            <div >
                                <input type="checkbox" id="softgelprint" >Softgel
                            </div>
                            <div >
                                <input type="checkbox" id="tabletprint">Tablet
                            </div>
                            <div >
                                <input type="checkbox" id="hardcapsuleprint">Hardcapsule
                            </div>
                        </div>
                        <div class="row form-group">
                            <div  class="col-sm-10">Size/Type: <span id="sizeprint"></span> </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-sm-10 ">Color/Logo: <span id="colorprint"></span> </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-sm-10">Filling Wt: <span id="fillingprint"></span></div> 
                        </div>
                        <div class="row form-group">
                            <div  class="col-sm-10">Order: <span id="orderprint"></span> </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-sm-12 ">
                            <h5>Formulary Specification</h5>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-sm-4"></div>
                            
                            <div class="col-sm-4"><span id="wtmgprint"></span> Wt (mg) </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-sm-10">
                                <table class="table table-bordered" style="width: 100%">
                                    <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Ingredients *</th>
                                        <th>per Serving *</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>1</td>
                                            <td>Red Ginseng Extract</td>
                                            <td>100</td>
                                        </tr>
                                        <tr>
                                            <td>2</td>
                                            <td>Panax Ginseng 80% Extract</td>
                                            <td>700</td>
                                        </tr>
                                        <tr>
                                            <td>3</td>
                                            <td>Marine Oil (30% omega 3 DHA/EPA)</td>
                                            <td>1000</td>
                                        </tr>
                                        <tr>
                                            <td>4</td>
                                            <td>Resveratrol 98% Extract</td>
                                            <td>50</td>
                                        </tr>
                                        <tr>
                                            <td>5</td>
                                            <td>Vitamin K (MK7)</td>
                                            <td>0.5</td>
                                        </tr>
                                       
                                    </tbody>
                                    <tbody>
                                        <tr>
                                            <th colspan="3">Inactive Ingredients</th>
                                        </tr>   
                                        <tr>
                                            <td>6</td>
                                            <td>Lecithin</td>
                                            <td>30</td>
                                        </tr>
                                        <tr>
                                            <td>7</td>
                                            <td>Beewax</td>
                                            <td>40</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            
                        </div>
                        <div class="row form-group">
                            <div class="col-sm-12 ">
                            <h5>Comments or Additional Instructions</h5>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-sm-10">
                                <table class="table table-bordered">
                                    <tbody>
                                        <tr>
                                            <td>1</td>
                                            <td>All raw materials provided by Pharmaxx</td>
                                        </tr>
                                        <tr>
                                            <td>2</td>
                                            <td>Softgel Encapsulation by Pharmaxx</td>
                                        </tr>
                                        <tr>
                                            <td>3</td>
                                            <td>Lead time: 6-8 weeks. After AW approved (FOS..)</td>
                                        </tr>
                                        <tr>
                                            <td>4</td>
                                            <td>Packaging: Box of 60 softgels</td>
                                        </tr>
                                        <tr>
                                            <td>5</td>
                                            <td>FOB Murrieta , CA</td>
                                        </tr>
                                        <tr>
                                            <td>6</td>
                                            <td>Price quote good for 14 days.</td>
                                        </tr>
                                    </tbody>
                                   
                                </table>
                            </div>
                            
                        </div>
                    </form>
                </div>
            </div><!-- end card-->
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

        $('.date').daterangepicker({
            singleDatePicker: true,
            showDropdowns: true,
            minYear: 1901,
            maxYear: parseInt(moment().format('YYYY'),10)
        });

        $("#print").click(function(){
            setDataIntoFormPrint();
        });

        $("#add-ingredient").click(function(){
            var ingredient = formDataView.find("select[name=ingredient]").val();

            if (ingredient == "") {
                toastr.error('{{ __('The ingredient not empty.') }}');
               return false;
            }
            
            if (checkItemExistArray(dataTableIng, ingredient)) {
                toastr.error('{{ __('The ingredient exist.') }}');
                return false;
            }

            $.each(dataIng , function(index, item) { 
                if (item.id == ingredient) {
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
    }); 

    var setDataIntoFormPrint = function() {
        $("#ipdprint").html($("#ipd").val());
        $("#productprint").html($("#product").val());
        $("#customerprint").html($("#customer").val());

        // var manufatureby = $("#manufatureby").val();
        $("#manufaturebyprint").html($("#manufatureby").val());
        // $("#manufaturebyprint").html(manufatureby == 1 ? 'Pharmaxx' : manufatureby == 2 ? 'I.P.D (Ampharco USA)' : 'Exxelife');
        $("#addressprint").html($("#address").val());
        $("#poprint").html($("#po").val());
        $("#formulaprint").html($("#formula").val());
        $("#revisionprint").html($("#revision").val());
        $("#dateprint").html($("#date").val());

        if ($('#softgel').is(":checked")) {
            $('#softgelprint').attr('checked','checked');
        }
        if ($('#tablet').is(":checked")) {
            $('#tabletprint').attr('checked','checked');
        }
        if ($('#hardcapsule').is(":checked")) {
            $('#hardcapsuleprint').attr('checked','checked');
        }

        $("#sizeprint").html($("#size").val());
        $("#colorprint").html($("#color").val());
        $("#fillingprint").html($("#filling").val());
        $("#orderprint").html($("#order").val());
        $("#wtmgprint").html($("#wtmg").val());
        print("dataprint");
    }
    
    var print = function(elm) {
        var divToPrint=document.getElementById(elm);
        var newWin=window.open('','Print-Window');
        newWin.document.open();
        newWin.document.write('<html><head><style> table th { border: 1px solid #dee2e6; } table td { border: 1px solid #dee2e6; } div span { margin-left: 30px; } </style></head><body onload="window.print()">' + divToPrint.innerHTML + '</body></html>');
        newWin.document.close();
        setTimeout(function(){newWin.close();},10);
    }

    var addRowTableIngredients = function(data) {
        $("#data-active, #data-inactive").html("");
        var strActive = "";
        var strInActive = "<tr><th colspan='4'>Inactive Ingredients</th></tr>";

        var num = 1;
        for (var i = 0; i < data.length; i++) {

            if (data[i].inactive == 0) {
                strActive += "<tr><td>" + num  + "</td><td>" + data[i].name + "</td><td>" + data[i].per_serving + "</td><td class='text-center'> <a href='javascript:;' data-id='" + data[i].id + "' class='delingredient'><i class='fa fa-lg fa-trash' aria-hidden='true'></i></a> </td></tr>";
                num++;
            }
        }
        for (var i = 0; i < data.length; i++) {
            
            if (data[i].inactive == 1) {
                strInActive += "<tr><td>" + num  + "</td><td>" + data[i].name + "</td><td>" + data[i].per_serving + "</td><td class='text-center'> <a href='javascript:;' data-id='" + data[i].id + "' class='delingredient'><i class='fa fa-lg fa-trash' aria-hidden='true'></i></a> </td></tr>"
                num++;
            }
        }
        $("#data-active").html(strActive);
        $("#data-inactive").html(strInActive);
    }

    var checkItemExistArray = function(array, id) {
        var res = false;
        $.each(array , function(index, item) { 
            if (item.id == id) {
                res = true;
                return false;
            }
        });
        return res;
    }
</script>
@endsection