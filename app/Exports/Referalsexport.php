<?php
namespace App\Exports;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use App\Models\ReferalsModel;

class Referalsexport implements FromView
{
    public function view(): View
    {
        $query = ReferalsModel::query();
      
  
          if($_GET['type']==1)
          {
      //  print_r( $_GET['keyword']);exit();
              if(!empty($_GET['keyword']))
              {
                $query= $query->Where('name', 'like', '%' . $_GET['keyword'] . '%');
              }
          }
          else if($_GET['type']==2)
          {
               if(!empty($_GET['keyword']))
              {
            $query= $query->Where('phone', 'like', '%' . $_GET['keyword'] . '%');
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
        return view('admin.Export.referals_export', [
            'referalsdata' => $query->get()
        ]);
    }
}
?>