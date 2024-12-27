<table>
    <thead>
    <tr>
     
        <th>Full Name</th>
        <th>Email ID</th>
        <th>Mobile No</th>
        
       
        <th>Father's Name</th>
        <th>Mother's Name</th>
        <th>Address</th>
        <th>City</th>
        <th>State</th>
        <th>Pincode</th>
        <th>Date</th>
   
        <th>Status</th>
        
        <th>Remarks</th>
       
         
    </tr>
    </thead>
    <tbody>
    @forelse($query_user as $d)
        <tr>
              
          
            <td>{{$d->name}}</td>
            <td>{{$d->email}}</td>
            <td>{{$d->phone}}</td>
            
            @forelse($query_parent->where('user_id',$d->id) as $da)
            
            <td>{{$da->fname}}</td>
            <td>{{$da->mname}}</td>
            <td>{{$da->address}}</td> 
            <td>{{$da->state}}</td>
            <td>{{$da->city}}</td>
            <td>{{$da->pincode}}</td>
             @empty
              <td></td>
            <td></td>
            <td></td> 
            <td></td>
            <td></td>
            <td></td>
    @endforelse
            <td> {{date('d-m-y',strtotime($d->created_at))}}</td>
             <td>
                                            @if($d->status=="C")
                                            Completed
                                            @elseif($d->status=="F")
                                            Following
                                            @elseif($d->status=="D")
                                           Not Interested
                                            @else
                                           New Lead
                                            @endif
                                                                
                                            </td>
                                              <td>{{$d->remarks}}</td>
        </tr>
            @empty
    @endforelse
    </tbody>
</table>