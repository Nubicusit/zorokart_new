<?php
namespace App\Exports;


use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use App\Models\CounsellorModel;

class Counsellorexport implements FromView
{
    public function view(): View
    {
        // echo "hi";
        // exit();
        $query = CounsellorModel::query();
       
  
          if($_GET['type']==1)
          {
              
              if(!empty($_GET['keyword']))
              {
        // print_r( $_GET['keyword']);exit();
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
      
        $query = $query->where('leadstatus','N');
       }
      else if ($_GET['type'] == 4) 
       {
        $query = $query->where('leadstatus','C');
      }
      else if ($_GET['type'] == 5) 
       {
        $query = $query->where('leadstatus','F');
      }
      else if ($_GET['type'] == 6) 
       {
        $query = $query->where('leadstatus','D');
      }
          
        //   print_r($query->get());
        // exit();
        
        return view('admin.Export.counsellor_export', [
            'counsellor' => $query->get()
        ]);
    }
}
?>