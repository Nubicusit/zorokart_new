<?php
namespace App\Exports;

use App\Models\ContactModel;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use App\Models\Messagemodel;

class Messageexport implements FromView
{
    public function view(): View
    {
        $query = Messagemodel::query();
   
          if($_GET['type']==1)
          {
      // print_r( $_GET['keyword']);exit();
            $query= $query->Where('name', 'like', '%' . $_GET['keyword'] . '%');
          }
          else if($_GET['type']==2)
          {
            $query= $query->Where('email', 'like', '%' . $_GET['keyword'] . '%');
          }
          else if($_GET['type']==3)
          {
            $query= $query->Where('phone', 'like', '%' . $_GET['keyword'] . '%');
            
          }
           else if ($_GET['type'] == 4) 
       {
      
        $query = $query->where('status','N');
       }
      else if ($_GET['type'] == 5) 
       {
        $query = $query->where('status','C');
      }
      else if ($_GET['type'] == 6) 
       {
        $query = $query->where('status','F');
      }
      else if ($_GET['type'] == 7) 
       {
        $query = $query->where('status','D');
      }
      
        // print_r($query->get());
        // exit();
        return view('admin.Export.message_export', [
            'message' => $query->get()
        ]);
    }
}
?>