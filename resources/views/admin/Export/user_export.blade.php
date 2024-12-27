<table>
    <thead>
    <tr>
     
        
        <th>Name</th>
        <th>Email</th>
        <th>Phone</th>
        <th>Date</th>
        <th>Status</th>
        <th>Remarks</th>
       
      
      
        
    </tr>
    </thead>
    <tbody>
    @forelse($users as $u)
        <tr>
              
          
            <td>{{$u->user_name}}</td>
            <td>{{$u->email}}</td>
            <td>{{$u->user_phone}}</td>
            <td> {{date('d-m-y',strtotime($u->created_at))}}</td>
                <td>
                                            @if($u->status=="C")
                                            Completed
                                            @elseif($u->status=="F")
                                            Following
                                            @elseif($u->status=="D")
                                           Not Interested
                                            @else
                                           New Lead
                                            @endif
                                                                
                                            </td>
                                            <td>{{$u->remarks}}</td>
           
         
        </tr>
            @empty
    @endforelse
    </tbody>
</table>