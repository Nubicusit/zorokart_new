@extends('admin.layout.master')
@section('content')
@section('title','Category')
<div class="row">
		<div class="col-md-12">
			<div class="card">
				<div class="card-body p-0">
					<div class="table-responsive">
		              <table class="table">
		                  <thead>
		                    <tr>
		                      <th scope="col">@lang('SL')</th>
		                      <th scope="col">@lang('Name')</th>
                              <th scope="col">@lang('Image')</th>
		                      <th scope="col">@lang('Status')</th>
		                      <th scope="col">@lang('Action')</th>
		                    </tr>
		                  </thead>
                          <tbody class="cur-body">
		                  	@forelse($categories as $category)
		                  		<tr>
		                  		  <td>{{ $loop->iteration }}</td>
		                  		    <td>{{ __($category->name) }}</td>
		                  		     <td><img src="{{url('assets/catagory').'/'.$category->image}}" height="150px" width="150px"></td>
		                  			<td>
		                  			    @if($category->status==1)
		                  			   <p class="text-primary">Active</p>
		                  			    @else
		                  			  <p class="text-danger">InActive</p>
		                  			    @endif
		                  			    </td>
		                  			<td>
		                  				<a href="#" class="btn btn-primary btn-sm">@lang('Edit')</a>
		                  				<i class="fa-solid fa-trash-can"></i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		                  		<a href="" class="btn btn-danger btn-sm"  title="Delete the item" onclick="return confirm('Are you sure you want to delete this item?');">
		                  			
		                  			Delete
		                  			</a></td>
		                  		</tr>
		                  	@empty
		                  		<tr>
		                  			<td class="text-center" colspan="100%">@lang('Data not found')</td>
		                  		</tr>
		                  	@endforelse
		                  </tbody>
		              </table>
		          </div>
				</div>
				<div class="card-footer">
				
			 	</div>
			</div>
		</div>
	</div>


<!-- Modal -->
	<div class="modal fade" id="categoryModal" tabindex="-1" role="dialog" aria-labelledby="categoryModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="categoryModalLabel">@lang('Add New category')</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<form action="" method="post" enctype="multipart/form-data">
					@csrf
					<div class="modal-body">
						<div class="row">
							<div class="col-md-12">
								<div class="form-group">
									<div class="image-upload-area">
										<img id="preview" src="{{ asset('assets/images/default.jpg') }}" alt="Gateway Image"/>
										<div class="custom-file">
											<input type="file" name="image" class="custom-file-input upload-image" id="upload">
											<label class="pick-image" for="upload">@lang('Upload')</label>
										</div>
									</div>
									<small class="text-primary">@lang('Image will resize into 350x190 px')</small>
								</div>
							</div>
							<div class="col-md-12">
								<div class="form-group">
									<label>@lang('Category Name')</label>
									<input type="text" name="name" class="form-control" required>
								</div>
								<div class="form-group">
									<label>@lang('Status')</label>
									<select name="status" class="form-control">
                                        <option value="1">Active</option>
                                        <option value="0">InActive</option>
</select>
								</div>
							</div>
						</div>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-dark" data-dismiss="modal">@lang('Close')</button>
						<button type="submit" class="btn btn-primary">@lang('Save changes')</button>
					</div>
				</form>
			</div>
		</div>
	</div>

	<div class="modal fade" id="editCategoryModal" tabindex="-1" role="dialog" aria-labelledby="categoryModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="categoryModalLabel">@lang('Edit category')</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<form action="#" method="post" enctype="multipart/form-data">
					@csrf
					<div class="modal-body">
						<div class="row">
							<div class="col-md-12">
								<div class="form-group">
									<div class="image-upload-area">
										<img id="preview" src="{{ asset('assets/images/default.jpg') }}" alt="Gateway Image"/>
										<div class="custom-file">
											<input type="file" name="image" class="custom-file-input upload-image" id="upload1">
											<label class="pick-image" for="upload1">@lang('Upload')</label>
										</div>
									</div>
									<small class="text-primary">@lang('Image will resize into 350x190 px')</small>
								</div>
							</div>
							<div class="col-md-12">
								<div class="form-group">
									<label>@lang('Category Name')</label>
									<input type="text" name="name" class="form-control" required>
								</div>
								<div class="form-group">
									<label>@lang('Status')</label>
									<input type="checkbox" name="status" data-toggle="toggle" data-onstyle="success" data-offstyle="dark" data-on="Enable" data-off="Disable" data-size="small" data-width="100%">
								</div>
							</div>
						</div>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-dark" data-dismiss="modal">@lang('Close')</button>
						<button type="submit" class="btn btn-primary">@lang('Save changes')</button>
					</div>
				</form>
			</div>
		</div>
	</div>
@endsection
@push('top-area')
<button class="btn btn-sm btn-primary" data-toggle="modal" data-target="#categoryModal">@lang('Add New Category')</button>
@endpush
@push('js')
<script>
	(function($){
		"use strict";
		$('.editBtn').on('click',function(){
			var editModal = $('#editCategoryModal');
			editModal.find('#preview').attr('src',$(this).data('image'));
			editModal.find('input[name=name]').val($(this).data('name'));
			if ($(this).data('status') == 1) {
				editModal.find('input[name=status]').bootstrapToggle('on')
			}
			editModal.find('form').attr('action',$(this).data('action'));

		});
	})(jQuery);
</script>
@endpush