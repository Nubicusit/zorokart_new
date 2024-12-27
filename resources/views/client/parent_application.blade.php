@extends('client.websitelayout')
@section('headerscript')
@parent
@endsection
@section('header')
@parent
@endsection
@section('content')


   <div class="content animation-section">



            <section class="my-acc-home">
                <div class="container">
                    <h3>Welcome {{Auth::guard('parent')->user()->name}}</h3>
                    <p>My Dashboard</p>
                </div>

            </section>


            <section class="my-acc-home-inner">
                <div class="container">
                     <h4 style="    color: #FF4005;margin-bottom:1rem">My Admissions</h4>
                     
                     
                     
                    <div class="box-my-acc mb-3">
                        @forelse($application as $a)
                            <div> 
                           
                             
                              <table>
                                  <tbody>
                                  <tr>
                                   @foreach($institute->where('id',$a->ins_id)->values() as $ins)
                                            <th>Institute Name</th><td style="">{{$ins->name}}</td>
                                          
                                  @endforeach
                                  </tr>
                                  
                                  <tr>
                                    <th>Course Name</th><td >{{$a->s_class}}</td>
                                </tr>
                                    
                                    
                               <tr><th>Date</th><td > {{date('d-m-Y',strtotime($a->created_at))}} </td></tr>
                                     <tr>
                                        
                                             
                                             <th>Mode of payment</th>
                                         <td >
       
                                               @if($a->mode_of_pay==1)
                                               Offline
                                               @else
                                              Online
                                               @endif
      
       
                                        </td>  
                                        
                                        
                                        </tr>
                                        <tr><td colspan="2"> <a href="{{url('admission_pdf_parent/'.$a->id)}}" class="btn btn-primary" target="_blank">View Application</a> </td></tr>
                                 </tbody>
                                  </table>  
                                  <hr>
                                     @empty
                                      <p>no application submitted.</p>
                                     
                           </div>  @endforelse

                             

                    </div>

        
              
                </div>
            </section>









        </div>


  </div>  </div>  </div>
<style>
    table tr {
        color:#000 !important;
        
    }
    table {
  border-collapse: separate;
  border-spacing: 0 15px;
}
</style>





@endsection
@section('footer')
@parent
@endsection
@section('footerscript')
@parent
@endsection