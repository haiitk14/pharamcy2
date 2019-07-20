@extends('admin.layout.master')

@section('content')
<div class="container-fluid">
	@include('admin.partials.breadcrumb')
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
            <div class="card mb-3">
                <div class="card-body">
                    <div class="text-left form-group col-xl-12">
                        <button class="btn btn-primary m-l-5" type="button" data-toggle="modal" data-target="#form-modal-ingredient" data-backdrop="static" data-keyboard="false">
                            {{ __('Add new') }}
                            <i class="fa fa-plus-circle" aria-hidden="true"></i>
                        </button>
                    </div>
                    <div class="table-responsive">
                        <table id="data-table-item" class="table table-bordered table-hover display">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>{{ __('Code') }}</th>
                                    <th>{{ __('Name') }}</th>
                                    <th>{{ __('Inactive') }}</th>
                                    <th class="text-center" width="5%">{{ __('Edit') }}</th>
                                    <th class="text-center" width="5%">{{ __('Delete') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($ingredients as $item)
                                <tr class="data-row">
                                    <td class="align-middle">{{ $loop->iteration }}</td>
                                    <td class="align-middle code">{{ $item->code }}</td>
                                    <td class="align-middle name">{{ $item->name }}</td>
                                    <td class="align-middle inactive">{{ $item->inactive == 1 ? 'Yes' : 'No' }}</td>
                                    <td class="text-center">
                                        <a href="javascript:;" class="edit-item" data-id="{{ $item->id }}">
                                            <i class="fa fa-pencil-square-o fa-lg" aria-hidden="true"></i>
                                        </a>
                                    </td>
                                    <td class="text-center">
                                        <a href="javascript:;" class="submit-delete" data-id="{{ $item->id }}" data-url="{{ route('admin.ingredient.destroy') }}">
                                            <i class="fa fa-lg fa-trash" aria-hidden="true"></i>
                                        </a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div><!-- end card-->
        </div>
    </div>
</div>
@include('admin.ingredient.form-modal', ['pageName'])
@endsection
@section('script')
<script>
	$(document).ready(function() {
		$('#data-table-item').DataTable();
        var form = $('form[name=frmAdminIngredientModal]');
        var modalId = $('#form-modal-ingredient');
        var titleAdd = '{{ __('Add new') }}';
        var titleEdit = '{{ __('Edit') }}';
        var actionAdd = '{{ route('admin.ingredient.create') }}';
        var actionEdit = '{{ route('admin.ingredient.update') }}';

        // edit item
        $(document).on('click', ".edit-item", function() {
            $(this).addClass('edit-item-trigger-clicked');
            var options = {
              'backdrop': 'static'
            };
            modalId.modal(options)
        });

        // on modal edit item show
        modalId.on('show.bs.modal', function() {
            var el = $(".edit-item-trigger-clicked"); // See how its usefull right here? 
            if (el.length > 0) {
                var row = el.closest(".data-row");

                // get the data
                var id = el.data('id');
                var code = row.children(".code").text();
                var name = row.children(".name").text();
                var inactive = row.children(".inactive").text();

                // fill the data in the input fields
                $('#modalLabel span').text(titleEdit);
                form.attr('method', 'PUT');
                form.attr('action', actionEdit);
                form.find('input[name=id]').val(id);
                form.find('input[name=code]').val(code);
                form.find('input[name=name]').val(name);
                form.find('select[name=inactive]').val(inactive == "Yes" ? 1 : 0);
            }
        });

        // on modal edit item hide
        modalId.on('hide.bs.modal', function() {
            $('.edit-item-trigger-clicked').removeClass('edit-item-trigger-clicked');
            $('#modalLabel span').text(titleAdd);
            form.trigger("reset");
            form.attr('method', 'POST');
            form.attr('action', actionAdd);
        })

        // save data
        $('#btn-save').click(function() {
            var code = form.find('input[name=code]');
            var name = form.find('input[name=name]');

            if (code.val() == '') {
                toastr.error('{{ __('The code field is required.') }}');
                code.focus();
                return false;
            }

            if (name.val().trim() == '') {
                toastr.error('{{ __('The name field is required.') }}');
                name.focus();
                return false;
            }
        })
	});
</script>
@endsection