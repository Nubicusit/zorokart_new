<?php
namespace App\Exports;


use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use App\Models\ContactModel;

class Contactusexport implements FromView
{
    public function view(): View
    {
        $query = ContactModel::query();
   
          if($_GET['type']==1)
          {
            //   echo "hi";
            //   exit();
            if(!empty($_GET['keyword']))
              {
            $query= $query->Where('name', 'like', '%' . trim($_GET['keyword']). '%');
              }
           
          }
           else if($_GET['type']==2)
          {
              if(!empty($_GET['keyword']))
              {   
            $query= $query->Where('email', 'like', '%' . trim($_GET['keyword']). '%');
              }
          }
            else if($_GET['type']==3)
          {
                if(!empty($_GET['keyword']))
              { 
            $query= $query->Where('location', 'like', '%' . trim($_GET['keyword']). '%');
              }
          }
          
          else if($_GET['type']==4)
          {
               if(!empty($_GET['keyword']))
              {
            $query= $query->Where('phone', 'like', '%' . trim($_GET['keyword']). '%');
              }
            
          }
            else if ($_GET['type'] == 5) 
       {
      
        $query = $query->where('status','N');
       }
      else if ($_GET['type'] == 6) 
       {
        $query = $query->where('status','C');
      }
      else if ($_GET['type'] == 7) 
       {
        $query = $query->where('status','F');
      }
      else if ($_GET['type'] == 8) 
       {
        $query = $query->where('status','D');
      }
        // print_r($query->get());
        // exit();
        return view('admin.Export.contactus_export', [
            'contactusdata' => $query->get()
        ]);
    }
}
?>