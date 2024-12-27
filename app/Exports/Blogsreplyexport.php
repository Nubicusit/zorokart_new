<?php
namespace App\Exports;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use App\Models\BlogsreplyModel;

class Blogsreplyexport implements FromView
{
    public function view(): View
    {
        $query = BlogsreplyModel::query();
   
          if($_GET['type']==1)
          {
                if(!empty($_GET['keyword']))
              {
      //  print_r( $_GET['keyword']);exit();
            $query= $query->Where('name', 'like', '%' . $_GET['keyword'] . '%');
              }
          }
          
          else if($_GET['type']==2)
          {
              if(!empty($_GET['keyword']))
              {
                     $query= $query->Where('mail', 'like', '%' . $_GET['keyword'] . '%');
              }
            
          }
           else if ($_GET['type'] == 3) 
       {
      
        $query = $query->where('status','N');
       }
      else if ($_GET['type'] == 4) 
       {
        $query = $query->where('status','C');
      }
      else if ($_GET['type'] == 5) 
       {
        $query = $query->where('status','F');
      }
      else if ($_GET['type'] == 6) 
       {
        $query = $query->where('status','D');
      }
        // print_r($query->get());
        // exit();
        return view('admin.Export.blogsreply_export', [
            'blogsreplydata' => $query->get()
        ]);
    }
}
?>