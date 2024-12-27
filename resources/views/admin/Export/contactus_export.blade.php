<table>
    <thead>
    <tr>
     
        <th>Full Name</th>
        <th>About</th>
        <th>Phone</th>
        <th>Email</th>
        <th>Location</th>
        <th>Reason For Contact</th>
        <th>Message</th>
         <th>Date</th>
         <th>Status</th>
         <th>Remarks</th>
        
    </tr>
    </thead>
    <tbody>
    @forelse($contactusdata as $c)
        <tr>
              
          
            <td>{{$c->name}}</td>
            <td>{{$c->about}}</td>
            <td>{{$c->phone}}</td>
            <td>{{$c->email}}</td>
            <td>{{$c->location}}</td>
            <td>{{$c->reason}}</td> 
            <td>{{$c->message}}</td> 
            <td> {{date('d-m-y',strtotime($c->created_at))}}</td>
             <td>
                                            @if($c->status=="C")
                                            Completed
                                            @elseif($c->status=="F")
                                            Following
                                            @elseif($c->status=="D")
                                           Not Interested
                                            @else
                                           New Lead
                                            @endif
                                                                
                                            </td>
                                              <td>{{$c->remarks}}</td> 
         
        </tr>
            @empty
    @endforelse
    </tbody>
</table>