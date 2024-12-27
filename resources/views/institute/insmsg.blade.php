@extends('institute.layouts.master')
@section('content')


        <div class="contents content-dashboard">

            <div class="container-fluid">
                <div class="social-dash-wrap">
                    <div class="card message-card-db">
                    <div class="row">
                        <div class="col-lg-12">
                      <h2>Message</h2>
                        
                      <table class="table mt-5" >
                      
                          <thead>
                              <tr>
                                  <th>Date</th>
                                  <th>Message</th>
                                  <th>Delete</th>
                              </tr>
                          </thead>
                           
                          <tbody>
                               @foreach($insmsg as $i)
                              <tr>
                                  <td>{{date('d-m-Y', strtotime($i->created_at))}} </td>
                                   <td>{{$i->message}} </td>
                                    <td>
                                    
                                     <a href="{{ route('ins_msgdelete',$i->id) }}" title="Delete the item"
                                                    onclick="return confirm('Are you sure you want to delete this item?');">
                                                    <i class="fa fa-trash" aria-hidden="true"
                                                        style="font-size:20px;color:#e84118;margin-right:5px"></i>
                                                </a>
                                                </td>
                              </tr>
                                @endforeach
                         
                          </tbody>
                      </table>
                        </div>
                   
                        
                        <div class="col-xxl-4 col-md-12 mb-25">

                            

                        </div>
                    </div>
                    </div>
            
                    <button style="display:none;" data-toggle="modal" href="#my-modal" id="premium_response"></button>
                    <!-- Modal -->
  <div class="modal fade" id="my-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
    
        <div class="modal-body "
         style="text-align:center; color:#45dc2d">

        <i class="fa fa-check-circle" aria-hidden="true" style="font-size: 30px;"></i><br><br>
            <p style="font-size: 17px;">
        Thank you for choosing to be our 
                                    premium member, our representative 
                                    will get in touch with you to explain 
                                    the further process. Service charges a
                                    pplicable for premium membership.</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default btn-primary" data-dismiss="modal">Close</button>
        </div>
      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div><!-- /.modal --> 
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
     .social-dash-wrap .card{
          padding: 2rem 6rem;
     }
     .social-dash-wrap .card h2{
         text-align:center;
     }
     table thead th {
    background: #FF4005;
    color: #fff;
}
 </style>
   


    <!-- endinject-->

    @endsection  
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script> 
    <script>

$(function(){
    $('#premium').click(function()
    {
       
        var status = 1;
        var id = 1;
        $.ajax({
            type:"POST",
            dataType : "json",
            url:'get_premium',
            data: {'status':status, 'id': id,_token:'{{csrf_token()}}'},
            success: function(data)
            {
                
                $("#premium").hide();
                $("#req").html(" Your Request is under process,our team will contact you soon.");
                $("#req").css({"color":"green"});
               $("#premium_response" ).trigger( "click" );

            }
        });
    });
});
</script>