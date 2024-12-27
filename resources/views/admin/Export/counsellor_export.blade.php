<table>
    <thead>
    <tr>
     
        <th>Name</th>
        <th>Phone</th>
        <th>Callback</th>
        <th>Message</th>
        <th>Date</th>
        <th>Status</th>
        <th>Remarks</th>
        
    </tr>
    </thead>
    <tbody>
    @forelse($counsellor as $c)
        <tr>
              
          
            <td>{{$c->name}}</td>
            <td>{{$c->phone}}</td>
            <td>{{$c->callback}}</td>
            <td>{{$c->message}}</td> 
            <td> {{date('d-m-y',strtotime($c->created_at))}}</td>
             <td>
                                            @if($c->leadstatus=='C')
                                            Completed
                                            @elseif($c->leadstatus=='F')
                                            Following
                                            @elseif($c->leadstatus=='D')
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