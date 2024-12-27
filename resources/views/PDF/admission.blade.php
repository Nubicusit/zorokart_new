
    <link rel="stylesheet" href="https://schoolspe.in/schoolspe/public/assets/vendor_assets/css/bootstrap/bootstrap.css">


  
<style>
  .owl-carousel .owl-nav.disabled {
    /*display: block !important;*/
  }
</style>
<div class="contents">

  <div class="container-fluid detail-dash">
      <div style="text-align:center;margin:auto">
      <img src="{{url('public/images/logo.png')}}" alt="schoolspe" style="width:200px" >
     
     
      
</div>
   <h4 style="margin-top:2rem">Institute Details</h4>
                               
<table class="table-1">
    <tr>
      <th>Name of the Institute: </th>
      <td>{{$institute->name}}</td></tr>
       <tr>
      <th>Address : </th>
      <td>{{$institute->address}}</td></tr>
         <tr>
      <th>Phone : </th>
      <td> {{$institute->u_phone}}</td></tr>
      <tr>
      <th>Email: </th>
      <td>{{$institute->email}}</td></tr>
   
</table>
  <h4 style="margin-top:2rem">Billing Info</h4>
<table class="table-1">
    <tr>
      <th>Amount : </th>
      <td> {{$institute->admission_fee}} </td></tr>
       <tr>
      <th>Mode of Payment : </th>
      @if($data->mode_of_pay==1)
      <td> Offline</td>
      @else($data->mode_of_pay==2)
       <td> Online</td>
      </tr>
       @endif 
         <tr>
           
      <th>Date : </th>
      <td>{{date('d-m-Y',strtotime($data->created_at))}}</td></tr>
      <tr>
           
      <th>Status : </th>
      <td>
      @if($data->status==1)
      <p style="color:green">Payment Completed</p>
      @else
       <p style="color:red">Payment Not Completed</p>
      @endif
      </td></tr>
     
   
</table>
<h4>Student Details</h4>
                               
                             
                               <table class="table-1">
                                    <tr><th>Photo</th>
                                 @if($data->photo=="upload-pic.png")
                                    <td>No Image</td>
                               
                                 @else
                                  
                                      <td><img src="{{url('public/images/apptemp/'.$data->photo)}}" style="width:100px; margin-top: 1rem; height:100px;"></td>
                                    @endif
                                  <tr> <th>Application Number :</th>
                                            <td> {{ $data->application_no }} </td>
                                            </tr>  
                                   <tr>
                                        
                                       <th>Name of the Student :
                                      
                                         </th>
                                          <td> {{ $data->name }} </td>
                                         </tr>
                                         
                            <tr><th>Student Email ID :</th><td> {{ $data->email }}</td></tr> 
                             <tr><th>Date of Birth :</th><td>{{date('d-m-Y',strtotime($data->dob))}}</td></tr>
                             <tr><th>Gender:  </th><td> 
                               @if($data->gender=="option1")
                                        
                                        
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="inlineRadioOptions"
                                                id="inlineRadio1" value="option1" checked>
                                            <img src="{{url('public/images/male.png')}}" style="width:20px">
                                        </div>
                                        @else
                                         <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio"
                                                id="inlineRadio2" value="option2" name="gender" checked>
                                            <img src="{{url('public/images/female.png')}}" style="width:20px">
                                        </div>
                                        @endif
                          
                          </td></tr> 
                              <tr><th>In Which Class :</th><td> {{ $data->s_class }}</td></tr> 
                               <tr><th>Religion : </th><td> {{ $data->religion }}</td></tr> 
                                <tr><th>Caste : </th><td> {{ $data->cast }}</td></tr> 
                                 <tr><th>Category : </th><td> {{ $data->category }}</td></tr> 
                                  <tr><th>Student (Adhar card) No.: </th><td> {{ $data->adhaar}}</td></tr> 
                                 
                               </table>
                               
                               <h4 style="margin-top:2rem">Parent Details</h4>
                               
                                   <table class="table-1">
                                   <tr>
                                       <th> Father’s Name
                                        
                                       
                                         </th>
                                          <td> {{ $data->f_name }}</td>
                                         </tr>
                                         
                            <tr><th>Mobile Number </th><td> {{ $data->f_phone }}</td></tr> 
                             <tr><th>Qualification</th><td>{{ $data->f_qualification }}</td></tr>
                          
                              <tr><th>Occupation</th><td> {{ $data->f_occupation }}</td></tr> 
                               <tr><th>Annual Income</th><td>{{ $data->f_income }}</td></tr>
                                <tr><th>Mother’s Name</th><td>{{ $data->m_name }}</td></tr>
                                 <tr><th>Mobile Number</th><td>{{ $data->m_phone }}</td></tr> 
                                 <tr><th>Qualification</th><td>{{ $data->m_qualification }}</td></tr>
                                     <tr><th>Occupation</th><td>{{ $data->m_occupation }}</td></tr>  
                                     <tr><th>Annual Income</th><td>{{ $data->m_income }}</td></tr> 
                                  
                                    
                           
                               </table>
                               
                                   <h4 style="margin-top:2rem">Address Details</h4>
                               
                                <table class="table-1">
                                   <tr>
                                       <th> Permanent Address</th>
                                        <td>{{ $data->address }}</td></tr>
                                         
                                       <tr><th>District</th><td>{{ $data->district }}</td></tr>
                                       <tr><th>State</th><td>{{ $data->state }}</td></tr> 
                                       <tr><th>PIN Code</th><td>{{ $data->pincode }}</td></tr> 
                                     
                                
                                
                                 </table>
                                     <div class="form-check form-check-inline mt-5" style="display:flex; align-items:center;margin-top:1rem">
                                        <input class="form-check-input" type="checkbox" id="address_same" checked style="margin-top:0.5rem">
                                        <label class="form-check-label"  style="margin-top:0rem"> Same as Permanent Address</label>
                                    </div>
                                    
                                    <table class="table-1">
                                        
                                     <tr><th>Correspondence Address</th><td>{{ $data->cor_address }}</td></tr>
                                     <tr><th>District</th><td>{{ $data->cor_district }}</td></tr>
                                     <tr><th>State</th><td>{{ $data->cor_state }}</td></tr>
                                     <tr><th>PIN Code</th><td>{{ $data->cor_pincode }}</td></tr>
                                        
                                     
                
                                    </table>

  </div>

</div>

</main>
<div id="overlayer">
  <span class="loader-overlay">
    <div class="atbd-spin-dots spin-lg">
      <span class="spin-dot badge-dot dot-primary"></span>
      <span class="spin-dot badge-dot dot-primary"></span>
      <span class="spin-dot badge-dot dot-primary"></span>
      <span class="spin-dot badge-dot dot-primary"></span>
    </div>
  </span>
</div>
<div class="overlay-dark-sidebar"></div>

<style>
    .btn-save-sec{
       display: flex;
    justify-content: center;
    margin-top: 3rem;
    gap: 20px;
    }
     .btn-save-sec .btn{
         width:100px;
     }
    .profile-detail-form main {
   
    padding: 10px 0px 10px;
}
.profile-detail-form label {
    display: inline-block;
    margin-bottom: 10px;
    font-weight: 600;
    color: #000;
}
.profile-detail-form .form-control {
  
    border: 1px solid #ff4005;}
    hr{
            margin-top: 1.67rem;
    margin-bottom: 3.67rem;
    }
    .form-check-inline label{
        margin-bottom:0px !important;
    }
    .table-1{
        width:100% !important;
        margin-top:1rem;
    }
    .table-1, .table-1 th, .table-1 td {
  border: 1px solid black;
  border-collapse: collapse;
  color:#000 !important;
  width:100%;
 
}
.table-1 th, .table-1 td {
     padding:10px 20px;
}
</style>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://schoolspe.in/schoolspe/public/assets/vendor_assets/js/bootstrap/popper.js"></script>
    <script src="https://schoolspe.in/schoolspe/public/assets/vendor_assets/js/bootstrap/bootstrap.min.js"></script>


