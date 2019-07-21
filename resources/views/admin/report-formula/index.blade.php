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
                            <div class="col-sm-6">
                                @if($data['customRequest'])
                                @if($data['customRequest']->manufature)

                                <b>{{ $data['customRequest']->manufature->name }}</b><br>
                                {{ $data['customRequest']->manufature->address }}
                                <br> {{ $data['customRequest']->manufature->phone }}

                                @endif
                                @endif
                            </div>
                        </div>
                        <div class="row form-group">
                            <label for="address" class="col-sm-2 col-form-label">1. Product:</label>
                            <div class="col-sm-8 col-form-label">
                                @if($data['customRequest'])
                                @if($data['customRequest']->product)
                                    {{ $data['customRequest']->product->name }}
                                @endif
                                @endif
                            </div>
                        </div>
                        <div class="row form-group">
                            <label for="address" class="col-sm-2 col-form-label">2. Customer:</label>
                            <div class="col-sm-8 col-form-label">
                                @if($data['customRequest'])
                                @if($data['customRequest']->customer)
                                    {{ $data['customRequest']->customer->full_name }}
                                @endif
                                @endif
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
                            <div class="col-sm-8 col-form-label">
                                @if($data['customRequest'])
                                {{ $data['customRequest']->formula_number }}
                                @endif
                            </div>
                        </div>
                        <div class="row form-group">
                            <label for="address" class="col-sm-2 col-form-label">5. Revision:</label>
                            <div class="col-sm-8 col-form-label">
                                @if($data['customRequest'])
                                {{ $data['customRequest']->revision }}
                                @endif
                            </div>
                        </div>
                        <div class="row form-group">
                            <label for="address" class="col-sm-2 col-form-label">6. Date:</label>
                            <div class="col-sm-8 col-form-label">
                                @if($data['customRequest'])
                                {{ date_format(date_create($data['customRequest']->date), "m/d/Y") }}
                                @endif
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-sm-12 ">
                            <h4>Softgel Specification</h4>
                            </div>
                        </div>
                        <div class="row form-group">
                            <label for="address" class="col-sm-2 col-form-label">7. Size/Type:</label>
                            <div class="col-sm-8 col-form-label">
                                @if($data['customRequest'])
                                {{ $data['customRequest']->size_type }}
                                @endif
                            </div>
                        </div>
                        <div class="row form-group">
                            <label for="address" class="col-sm-2 col-form-label">8. Color/Logo:</label>
                            <div class="col-sm-8 col-form-label">
                                @if($data['customRequest'])
                                {{ $data['customRequest']->color_logo }}
                                @endif
                            </div>
                        </div>
                        <div class="row form-group">
                            <label for="address" class="col-sm-2 col-form-label">9. Filling Wt:</label>
                            <div class="col-sm-8 col-form-label">
                                @if($data['customRequest'])
                                {{ $data['customRequest']->filling_wt }}
                                @endif
                            </div>
                        </div>
                        <div class="row form-group">
                            <label for="order" class="col-sm-2 col-form-label">10. Serving Size: </label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" title="Enter Serving Size" placeholder="Enter Serving Size" name="serving_size">
                            </div>
                        </div>
                        <div class="row form-group">
                            <label for="order" class="col-sm-2 col-form-label">11. Gelatin Batch: </label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" title="Enter Gelatin Batch" placeholder="Enter Gelatin Batch"  name="gelatin_batch">
                            </div>
                        </div>
                        <div class="row form-group">
                            <label for="order" class="col-sm-2 col-form-label">12. Batch size: </label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" title="Enter Batch size" placeholder="Enter Batch size" name="batch_size">
                            </div>
                        </div>
                        <div class="row form-group">
                            <label for="order" class="col-sm-2 col-form-label">13. </label>
                        </div>
                        <div class="row form-group">
                            <div class="col-sm-12">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Ingredients *</th>
                                            <th>Serving <br>Wt.mg</th>
                                            <th>Req Wt</th>
                                            <th>Purity</th>
                                            <th>Overage</th>
                                            <th>Input <br>Wt/mg</th>
                                            <th>Input Wt <br>per batch</th>
                                            <th>Percent <br>Softgel</th>
                                            <th>Density</th>
                                            <th>Volum</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>1</td>
                                            <td>Red Ginseng Extract</td>
                                            <td>100</td>
                                            <td>50</td>
                                            <td>100%</td>
                                            <td>5%</td>
                                            <td>52.5</td>
                                            <td>63</td>
                                            <td>5.45%</td>
                                            <td>0.7316</td>
                                            <td>71.76</td>
                                        </tr>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <td colspan="5"></td>
                                            <td>Fill Wt</td>
                                            <td>0</td>
                                            <td>0</td>
                                            <td>0</td>
                                            <td>Total</td>
                                            <td>0</td>
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
	$(document).ready(function() {
    }); 
</script>
@endsection
