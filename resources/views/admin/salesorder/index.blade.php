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
                                <div class="col-sm-8">
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
                                <input type="text" class="form-control" id="product">
                            </div>
                        </div>
                        <div class="row form-group">
                            <label for="customer" class="col-sm-2 col-form-label">Customer *</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="customer" >
                            </div>
                        </div>
                        <div class="row form-group">
                            <label for="manufatureby" class="col-sm-2 col-form-label">Manufature by:</label>
                            <div class="col-sm-8">
                                <select class="form-control" id="manufatureby">
                                    <option value="1">Pharmaxx</option>
                                    <option value="2">I.P.D (Ampharco USA)</option>
                                    <option value="3">Exxelife</option>
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
                                <input type="text" class="form-control" id="formula">
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
                                <input type="text" class="form-control" id="date">
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
                            <div class="col-sm-10">
                                <table class="table table-bordered">
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
        $("#print").click(function(){
            setDataIntoFormPrint();
        });
    }); 
    var setDataIntoFormPrint = function() {
        $("#ipdprint").html($("#ipd").val());
        $("#productprint").html($("#product").val());
        $("#customerprint").html($("#customer").val());

        var manufatureby = $("#manufatureby").val();
        $("#manufaturebyprint").html(manufatureby == 1 ? 'Pharmaxx' : manufatureby == 2 ? 'I.P.D (Ampharco USA)' : 'Exxelife');
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
        newWin.document.write('<html><head><style> table th { border: 1px solid #dee2e6; } table td { border: 1px solid #dee2e6; } </style></head><body onload="window.print()">' + divToPrint.innerHTML + '</body></html>');
        newWin.document.close();
        setTimeout(function(){newWin.close();},10);
    }
</script>
@endsection