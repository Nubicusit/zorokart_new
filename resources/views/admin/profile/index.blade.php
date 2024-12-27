@extends('admin.layout.master', ['title' => 'Update Profile'])


@section('content')
<div class="content-wrapper">
	 <section class="content-header">
		<div class="container-fluid">
			  @if (session('success'))
                <div class="alert alert-success" role="alert">
                    {{ session('success') }}
                </div>
                @endif
			<div class="row">
				<div class="col-md-12">
					<div class="card card-primary mt-3">
						<div class="card-header">
							<h3 class="card-title">Profile</h3>
						</div>
						<form action="{{url('admin_profile_update')}}" method="post" onSubmit = "return checkPassword(this)">
            @csrf
					
							<div class="card-body">
								<div class="form-group row">
									<label for="first_name" class="col-sm-3 col-form-label">
								User Name<sup
                                            class="text-danger">*</sup></label>
								<div class="col-sm-4">
									 <input type="text" class="form-control @error('first_name') is-invalid @enderror" name="name" value="{{ old('name', $users->name) }}">
									@error('first_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
								</div>
							</div>
							
							<div class="form-group row">
									<label for="mobile" class="col-sm-3 col-form-label">
							Email<sup
                                            class="text-danger">*</sup></label>
								<div class="col-sm-4">
									 <input type="text" class="form-control @error('phone') is-invalid @enderror" name="email" value="{{ old('email', $users->email) }}">
									@error('phone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
								</div>
							</div>
							<div class="form-group row">
									<label for="email" class="col-sm-3 col-form-label">
								Phone<sup
                                            class="text-danger">*</sup></label>
								<div class="col-sm-4">
									 <input type="text" class="form-control @error('email') is-invalid @enderror" name="phone" value="{{ old('phone', $users->phone) }}">
									@error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
								</div>
							</div>

							
							<div class="form-group row"><label for="select"
						class="col-sm-3 col-form-label"></label>
					 <div class="col-sm-2"><button type="submit"
                    class="btn btn-primary mr-2">Save</button>
                </div>
					</div>
				</div>
				</form>
			</div>
		</div>
	</div>
</div>
</div>
</div>

@endsection
