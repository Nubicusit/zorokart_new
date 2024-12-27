<?php
namespace App\Exports;

use App\Models\ContactModel;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use App\Models\UserparentModel;
use App\Models\ParentRegistrationModel;

class Freshleadexport implements FromView
{
    public function view(): View
    {
        $query_parent = ParentRegistrationModel::query();
      $query_user=UserparentModel::query();
       
          
          if($_GET['type']==1)
          {
        //   echo "hi";
        //   exit();
            $query_user= $query_user->Where('name', 'like', '%' . $_GET['keyword'] . '%');
          }
          else if($_GET['type']==2)
          {
            $query_user= $query_user->Where('email', 'like', '%' . $_GET['keyword'] . '%');
          }
          else if($_GET['type']==3)
          {
            $query_user= $query_user->Where('phone', 'like', '%' . $_GET['keyword'] . '%');
            
          }
             else if ($_GET['type'] == 4) 
       {
      
        $query_user = $query_user->where('status','N');
       }
      else if ($_GET['type'] == 5) 
       {
        $query_user = $query_user->where('status','C');
      }
      else if ($_GET['type'] == 6) 
       {
        $query_user = $query_user->where('status','F');
      }
      else if ($_GET['type'] == 7) 
       {
        $query_user = $query_user->where('status','D');
      }
       
        // print_r($query->get());
        // exit();
        return view('admin.Export.freshlead_export', [
            'query_user' => $query_user->get(),
            'query_parent'=> $query_parent->get()
        ]);
    }
}
?>