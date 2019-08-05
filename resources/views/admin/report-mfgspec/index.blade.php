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
                    {{-- <form id="formcustomrequest">
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
                    </form> --}}
                    <form id="dataview">
                        <div class="row form-group">
                            <div class="col-sm-6">
                                <b class="manufature-name">Pharmaxx, Inc.</b><br>
                                <span class="manufature-address">331 N Vineland Ave., City of industry, CA 91746</span>
                                <br> <span class="manufature-phone">Tel. (949) 863-1919, Fax. (949) 863-3008</span>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-sm-12 text-center">
                            <h4>Manufacturing Specification</h4>
                            </div>
                        </div>
                        <div class="row form-group">
                            <label for="address" class="col-sm-2 col-form-label">1. Product:</label>
                            <div class="col-sm-8 col-form-label product-name">RG III 8%Royal Ginseng</div>
                        </div>
                        <div class="row form-group">
                            <label for="address" class="col-sm-2 col-form-label">2. Customer:</label>
                            <div class="col-sm-8 col-form-label customer-full-name">ExxelUSA
                            </div>
                        </div>
                        <div class="row form-group">
                            <label for="formula" class="col-sm-2 col-form-label">3. P.O: </label>
                            <div class="col-sm-8 col-form-label customer-full-name">0
                            </div>
                        </div>
                        <div class="row form-group">
                            <label for="address" class="col-sm-2 col-form-label">4. Formula:</label>
                            <div class="col-sm-8 col-form-label formula-number">RG01
                            </div>
                        </div>
                        <div class="row form-group">
                            <label for="address" class="col-sm-2 col-form-label">5. Revision:</label>
                            <div class="col-sm-8 col-form-label revision">1.00
                            </div>
                        </div>
                        <div class="row form-group">
                            <label for="address" class="col-sm-2 col-form-label">6. Date:</label>
                            <div class="col-sm-8 col-form-label show-date">5/14/2018
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-sm-12 ">
                            <h4>Softgel Specification</h4>
                            </div>
                        </div>
                        <div class="row form-group">
                            <label for="address" class="col-sm-2 col-form-label">7. Size/Type:</label>
                            <div class="col-sm-8 col-form-label size-type">18 Ob
                            </div>
                        </div>
                        <div class="row form-group">
                            <label for="address" class="col-sm-2 col-form-label">8. Color/Logo:</label>
                            <div class="col-sm-8 col-form-label color-logo">Red
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
                            <div class="col-sm-8 col-form-label" > 1,200,000  softgels
                            </div>
                        </div>
                        <div class="row form-group">
                            <label for="order" class="col-sm-2 col-form-label"></label>
                            <div class="col-sm-8 col-form-label" >  20,000.00  Box
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
                                    <tbody class="table-inactive">
                                        <tr>
                                            <td>1</td>
                                            <td>RG01-01J
                                            </td>
                                            <td>Red Ginseng Extract
                                            </td>
                                            <td>
                                                50.00
                                            </td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td>2
                                            </td>
                                            <td>PG01-01J
                                            </td>
                                            <td>Panax Ginseng 80% Extract
                                            </td>
                                            <td>
                                                25.00
                                            </td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td>3</td>
                                            <td>FO01-AR01
                                            </td>
                                            <td>Marine Oil (30% omega 3 DHA/EPA)
                                            </td>
                                            <td>
                                                250.00
                                            </td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td>4
                                            </td>
                                            <td>RS01-JH01
                                            </td>
                                            <td>Resveratrol 98% Extract
                                            </td>
                                            <td>
                                                6.50
                                            </td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td>5</td>
                                            <td>VK01-IG01
                                            </td>
                                            <td>Vitamin K (MK7)
                                            </td>
                                            <td>
                                                0.03
                                            </td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td>6
                                            </td>
                                            <td>LC01-WC01
                                            </td>
                                            <td>Lecithin
                                            </td>
                                            <td>
                                                10.00
                                            </td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td>7
                                            </td>
                                            <td>BW01-CS01
                                            </td>
                                            <td>Beewax
                                            </td>
                                            <td>
                                                30.00
                                            </td>
                                            <td></td>
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
                                            <th colspan="2">Comments or Additional Instructions</th>
                                            
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>1</td>
                                            <td>All raw materials provided by Pharmaxx
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>2
                                            </td>
                                            <td>Softgel Encapsulation by Pharmaxx
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>3</td>
                                            <td>Lead time: 6-8 weeks. After AW approved (FOS..)
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>4
                                            </td>
                                            <td>Packaging:  Box of 60 softgels
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>5</td>
                                            <td>FOB Murrieta , CA
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>6
                                            </td>
                                            <td>Price quote good for 14 days.
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
                            <div><b>Pharmaxx, Inc.</b></div>
                            <div>331 N Vineland Ave., City of industry, CA 91746</div>
                            <div>Tel. (949) 863-1919, Fax. (949) 863-3008</div>
                            
                        </div>
                        <div style="text-align: center">
                            <h4>Manufacturing Specification</h4>
                        </div>
                        <div>
                            1. Product: <span>RG III 8%Royal Ginseng</span>
                        </div>
                        <div >
                            2. Customer:  <span>ExxelUSA</span>
                        </div>
                        <div >
                            3. P.O: <span>0</span>
                        </div>
                        <div>
                           4. Formula: <span>RG01</span>
                        </div>
                        <div>
                            5. Revision: <span>1.00</span>
                        </div>
                        <div >
                           6. Date: <span>5/14/2018</span>
                        </div>
                        <div>
                            <h4>Softgel Specification</h4>
                        </div>
                        <div>
                            7. Size/Type: <span>18 Ob</span>
                        </div>
                        <div>
                           8. Color/Logo: <span>Red</span>
                        </div>
                        <div >
                           9. Filling Wt: <span>Red</span>
                        </div>
                        <div>
                            10. Batch No.: 
                        </div>
                        <div>
                            11. Batch size: <span>1,200,000  softgels</span>
                        </div>
                        <div>
                             20,000.00  Box
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
                                    <tbody >
                                        <tr>
                                            <td>1</td>
                                            <td>RG01-01J
                                            </td>
                                            <td>Red Ginseng Extract
                                            </td>
                                            <td>
                                                50.00
                                            </td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td>2
                                            </td>
                                            <td>PG01-01J
                                            </td>
                                            <td>Panax Ginseng 80% Extract
                                            </td>
                                            <td>
                                                25.00
                                            </td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td>3</td>
                                            <td>FO01-AR01
                                            </td>
                                            <td>Marine Oil (30% omega 3 DHA/EPA)
                                            </td>
                                            <td>
                                                250.00
                                            </td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td>4
                                            </td>
                                            <td>RS01-JH01
                                            </td>
                                            <td>Resveratrol 98% Extract
                                            </td>
                                            <td>
                                                6.50
                                            </td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td>5</td>
                                            <td>VK01-IG01
                                            </td>
                                            <td>Vitamin K (MK7)
                                            </td>
                                            <td>
                                                0.03
                                            </td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td>6
                                            </td>
                                            <td>LC01-WC01
                                            </td>
                                            <td>Lecithin
                                            </td>
                                            <td>
                                                10.00
                                            </td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td>7
                                            </td>
                                            <td>BW01-CS01
                                            </td>
                                            <td>Beewax
                                            </td>
                                            <td>
                                                30.00
                                            </td>
                                            <td></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div>
                            <div >
                                <table  style="width: 100%">
                                    <thead>
                                        <tr>
                                            <th colspan="2">Comments or Additional Instructions</th>
                                            
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>1</td>
                                            <td>All raw materials provided by Pharmaxx
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>2
                                            </td>
                                            <td>Softgel Encapsulation by Pharmaxx
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>3</td>
                                            <td>Lead time: 6-8 weeks. After AW approved (FOS..)
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>4
                                            </td>
                                            <td>Packaging:  Box of 60 softgels
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>5</td>
                                            <td>FOB Murrieta , CA
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>6
                                            </td>
                                            <td>Price quote good for 14 days.
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
       
        $(document).ready(function() {

            $("#print").click(function(){
                print("dataprint");
            });
        });
    }
     // Activates knockout.js
     ko.applyBindings(new AppViewModel());
    
</script>
@endsection
