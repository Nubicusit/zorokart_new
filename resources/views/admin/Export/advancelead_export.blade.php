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
    @forelse($advanceleads as $a)
        <tr>
              
          
            <td>{{$a->name}}</td>
            <td>{{$a->email}}</td>
            <td>{{$a->phone}}</td>
             <td> {{date('d-m-y',strtotime($a->created_at))}}</td>
          <td>
                                            @if($a->status=="C")
                                            Completed
                                            @elseif($a->status=="F")
                                            Following
                                            @elseif($a->status=="D")
                                           Not Interested
                                            @else
                                           New Lead
                                            @endif
                                                                
                                            </td>
                                             <td>{{$a->remarks}}</td>
                                            
           
         
        </tr>
            @empty
    @endforelse
    </tbody>
</table>