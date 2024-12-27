<table>
    <thead>
    <tr>
     
        <th>Type(Parent/Student/Others)</th>
        <th>Institution Name</th>
        <th>Name</th>
        <th>Phone</th>
        <th>Email</th>
        <th>Message</th>
        <th>Date</th>
        <th>Status</th>
         <th>Remarks</th>
        
        
    </tr>
    </thead>
    <tbody>
    @forelse($message as $d)
        <tr>
              
            <td>
             @if($d->type=='S')
             Student
             @elseif($d->type=='P')
             Parent
             @endif
            </td>         
            <td>
                                            @if($d->institute==1)
                                            Schools
                                            @elseif($d->institute==2)
                                            PU-Juniour College
                                            @elseif($d->institute==3)
                                            Polytechnic College
                                            @elseif($d->institute==4)
                                            UG-PG College
                                            @endif
                                                                
                                            </td>
            <td>{{$d->name}}</td>
            <td>{{$d->phone}}</td>
            <td>{{$d->email}}</td>
            <td>{{$d->message}}</td> 
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