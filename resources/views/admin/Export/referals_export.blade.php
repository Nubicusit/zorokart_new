<table>
    <thead>
    <tr>
     
        
        <th>Name</th>
        <th>Phone</th>
        <th>Who your are?</th>
        <th>Refered Name</th>
        <th>Refered Email</th>
        <th>Refered Phone</th>
        <th>Date</th>
         <th>Status</th>
       <th>Remarks</th>
      
      
        
    </tr>
    </thead>
    <tbody>
    @forelse($referalsdata as $r)
        <tr>
              
          
            <td>{{$r->name}}</td>
            <td>{{$r->phone}}</td>
            <td>{{$r->about}}</td>
            <td>{{$r->refer_name}}</td>
            <td>{{$r->email}}</td>
            <td>{{$r->refer_phone}}</td>
            <td> {{date('d-m-y',strtotime($r->created_at))}}</td>
                <td>
                                            @if($r->status=="C")
                                            Completed
                                            @elseif($r->status=="F")
                                            Following
                                            @elseif($r->status=="D")
                                           Not Interested
                                            @else
                                           New Lead
                                            @endif
                                                                
                                            </td>
                                            <td>{{$r->remarks}}</td>
           
         
        </tr>
            @empty
    @endforelse
    </tbody>
</table>