<table>
    <thead>
    <tr>
     
        
        <th>Name</th>
        <th>Email</th>
        <th>Website</th>
        <th>Message</th>
        <th>Date</th>
        <th>Status</th>
         <th>Remarks</th>
     
      
        
    </tr>
    </thead>
    <tbody>
    @forelse($blogsreplydata as $b)
        <tr>
              
          
            <td>{{$b->name}}</td>
            <td>{{$b->mail}}</td>
            <td>{{$b->website}}</td>
            <td>{{$b->message}}</td>
            <td> {{date('d-m-y',strtotime($b->created_at))}}</td>
            <td>
                @if($b->status=='C')
                Competed
                @elseif($b->status=='F')
                Following
                @elseif($b->status=='D')
                Not Interested
                @else
                New Lead
                @endif
                
            </td>
             <td>{{$b->remarks}}</td>
         
           
         
        </tr>
            @empty
    @endforelse
    </tbody>
</table>