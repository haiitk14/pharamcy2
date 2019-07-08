<div id="form-modal-service" class="modal fade bd-example-modal-xl" tabindex="-1" role="dialog" aria-labelledby="myExtraDefaultModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
			    <h5 class="modal-title" id="modalLabel"><span>{{ __('Add new') }}</span> {{ $pageName }}</h5>
			    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
			      <span aria-hidden="true">&times;</span>
			    </button>
			</div>
			<form name="frmAdminServiceModal" method="POST"  class="submit-form">
				{{ csrf_field() }}
				<input type="hidden" name="id">
			    <div class="modal-body">
			        <div class="form-group">
			            <label>{{ __('Name') }} (<span class="text-danger">*</span>)</label>
			            <input type="text" title="Nhập tên" name="name" class="form-control">
			        </div>
					<div class="form-group">
			            <label>{{ __('Phone') }} (<span class="text-danger">*</span>)</label>
			            <input type="text" title="Nhập số điện thoại" name="code" class="form-control">
			        </div>
					<div class="form-group">
			            <label>{{ __('Address') }} (<span class="text-danger">*</span>)</label>
			            <input type="text" title="Nhập địa chỉ" name="code" class="form-control">
			        </div>
			    </div>
			    <div class="modal-footer">
			    	<button type="button" class="btn btn-secondary" data-dismiss="modal">{{ __('Close') }}</button>
			        <button type="submit" id="btn-save" class="btn btn-primary">{{ __('Save') }}</button>
			    </div>
			 </form>
        </div>
    </div>
</div>