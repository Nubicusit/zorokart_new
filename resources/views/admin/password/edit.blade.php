@extends('admin.layout.master', ['title' => 'Change Password'])

@section('content')
<div class="content-wrapper">

        <div class="content-header">
          <div class="container-fluid">
              @if (session('success'))
            <div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h5><i class="icon fas fa-check"></i> Success!</h5>
                {{ session('success')  }}
            </div>
            @endif

            <div class="row">
              <div class="col-sm-12">
                <h1 class="m-0 text-dark">Change Password</h1>
              </div>
            </div>
          </div>
        </div>

        <div class="content">
          <div class="container-fluid">

            <div class="row">
              <div class="col-md-12">
                <div class="card">
                 
                  <div class="card-body pt-5">

                    <form action="{{url('admin_change_password')}}" method="post" onSubmit = "return checkPassword(this)">
            @csrf
            
							<div class="form-group row"><label for="name" class="col-sm-3 col-form-label">
                        New Password<sup class="text-danger">*</sup></label>
                      <div class="col-sm-4">
									<input type="password" class="form-control @error('password') is-invalid @enderror"name="password" id="password1"> 
									@error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
								</div>
							</div>

							<div class="form-group row"><label for="name" class="col-sm-3 col-form-label">
                        Confirm New Password<sup class="text-danger">*</sup></label>
                      <div class="col-sm-4">
									<input type="password" class="form-control @error('password_confirmation') is-invalid @enderror" name="password1" id="password2"> 
									@error('password_confirmation')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
								</div>
							
							</div>

	<div class="form-group row"><label for="select"
						class="col-sm-3 col-form-label"></label>
					 <div class="col-sm-2"><button type="submit" class="btn btn-primary mr-2" onclick=" return matchPassword()">Save</button>
                </div>
					</div>

					
				</div>
			</div>
			</form>
		</div>
	</div>
</div>
</div>
</div>

    <script>

function matchPassword() 
{  
  var pass1 = document.getElementById("password1").value;  
  var pass2 = document.getElementById("password2").value;  
  
  if(pass1 != pass2)  
  {   
    alert("Passwords did not match");  
    return false;
  } 
 else
 {
    return true;  
 }
}  
</script>
@endsection