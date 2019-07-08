@extends('admin.layout.master')

@section('content')
<div class="container-fluid">
	@include('admin.partials.breadcrumb')
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
            <div class="card mb-3">
                <div class="card-body">
                    <div class="text-left form-group col-xl-12">
                        <button class="btn btn-primary m-l-5" type="button" data-toggle="modal" data-target="#form-modal-service" data-backdrop="static" data-keyboard="false">
                            {{ __('Add new') }}
                            <i class="fa fa-plus-circle" aria-hidden="true"></i>
                        </button>
                    </div>
                    <div class="table-responsive">
                        <table id="data-table-item" class="table table-bordered table-hover display">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>{{ __('Name') }}</th>
                                    <th>{{ __('Per serving') }}</th>
                                    <th>{{ __('Inactive') }}</th>
                                    <th class="text-center" width="5%">{{ __('Edit') }}</th>
                                    <th class="text-center" width="5%">{{ __('Delete') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="data-row">
                                    <td class="align-middle sort">1</td>
                                    <td class="align-middle name">Ingredient 1</td>
                                    <td class="align-middle name">1mg</td>
                                    <td class="align-middle name">Yes</td>
                                    <td class="text-center"><a href="javascript:;" class="edit-item"><i class="fa fa-pencil-square-o fa-lg" aria-hidden="true"></i></a></td>
                                    <td class="text-center"><a href="javascript:;" class="submit-delete"  ><i class="fa fa-lg fa-trash" aria-hidden="true"></i></a></td>
                                </tr>
                                <tr class="data-row">
                                    <td class="align-middle sort">2</td>
                                    <td class="align-middle name">Ingredient 2</td>
                                    <td class="align-middle name">10mg</td>
                                    <td class="align-middle name">No</td>
                                    <td class="text-center"><a href="javascript:;" class="edit-item"><i class="fa fa-pencil-square-o fa-lg" aria-hidden="true"></i></a></td>
                                    <td class="text-center"><a href="javascript:;" class="submit-delete"  ><i class="fa fa-lg fa-trash" aria-hidden="true"></i></a></td>
                                </tr>
                                <tr class="data-row">
                                    <td class="align-middle sort">1</td>
                                    <td class="align-middle name">Ingredient 3</td>
                                    <td class="align-middle name">100mg</td>
                                    <td class="align-middle name">Yes</td>
                                    <td class="text-center"><a href="javascript:;" class="edit-item"><i class="fa fa-pencil-square-o fa-lg" aria-hidden="true"></i></a></td>
                                    <td class="text-center"><a href="javascript:;" class="submit-delete"  ><i class="fa fa-lg fa-trash" aria-hidden="true"></i></a></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div><!-- end card-->
        </div>
    </div>
</div>
@include('admin.ingredients.form-modal', ['pageName'])
@endsection
@section('script')
<script>
	$(document).ready(function() {
		$('#data-table-item').DataTable();
	});
</script>
@endsection