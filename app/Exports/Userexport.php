<?php
namespace App\Exports;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use App\Models\User;

class Userexport implements FromView
{
    public function view(): View
    {
        $users = User::query();
      
  
        if($_GET['type']==1)
          {
           
            $users= $users->Where('user_name', 'like', '%' . $_GET['keyword'] . '%');
          }
          else if($_GET['type']==2)
          {
            $users= $users->Where('user_phone', 'like', '%' . $_GET['keyword'] . '%');
          }
          else if($_GET['type']==3)
          {
            $users= $users->Where('email', 'like', '%' . $_GET['keyword'] . '%');
            
          }
          else if ($_GET['type'] == 4) 
      {
      
        $users = $users->where('status',1);
      }
      else if ($_GET['type'] == 5) 
      {
        $users = $users->where('status','C');
      }
      else if ($_GET['type'] == 6) 
      {
        $users = $users->where('status','F');
      }
      else if ($_GET['type'] == 7) 
      {
        $users = $users->where('status','D');
      }
        // print_r($query->get());
        // exit();
        return view('admin.Export.user_export', [
            'users' => $users->get()
        ]);
    }
}
?>