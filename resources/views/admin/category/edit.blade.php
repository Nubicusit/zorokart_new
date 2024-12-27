@extends('admin.layout.master')
@section('content')
<div class="content-wrapper">
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card card-primary mt-3">
                        <div class="card-header">
                            <h3 class="card-title">Edit Catagory</h3>
                        </div>
    	<form action="{{ route('category.update',$category) }}" method="POST" enctype="multipart/form-data">
        	{{csrf_field()}}
            @method('PUT')
        		<div class="card-body">
        			<div class="row">
        				<div class="col-md-4">
        					<div class="image-upload-area">
								<img id="preview" src="{{ asset('assets/admin/images') }}" alt="Image"/>
								<div class="custom-file">
									<input type="file" name="image" class="custom-file-input upload-image" id="upload">
									<label class="pick-image" for="upload">@lang('Upload')</label>
								</div>
							</div>
        				</div>
        				<div class="col-md-8">
        					<div class="form-group">
        						<label>@lang('Name')</label>
        						<input type="text" name="name" class="form-control" placeholder="@lang('Name') " value="{{ old('name', $category->name) }}">
        					</div>
       				</div>
        				
        			</div><br><br>
        			<div class="col-md-8">
        					<div class="form-group">
        					<select name="status" required class="form-control">
        					    <option value="1">Active</option>
        					    <option value="2">Inactive</option>
        					</select>
        					</div>
       				</div>
        		</div>
        		<div class="card-footer">
        			<button type="submit" class="btn btn__base btn-block">@lang('Submit')</button>
        		</div>
        	</form>	
        	</div>
        	</div>
        	</div>
        	</div>
        	<div>
        	</div>
        			
@push('js')

@endpush
@endsection
