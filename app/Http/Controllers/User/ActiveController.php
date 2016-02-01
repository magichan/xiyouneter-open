<?php

namespace App\Http\Controllers\User;
use Auth;
use Mail;
use Redirect;
use App\User;
use App\ActiveLog;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class ActiveController extends Controller
{
  private $from_mail='xiyouant@163.com';
  public function Active()
   {
     $user = Auth::user();
     if($user == null)
     {
       return Redirect::home();
     }

     $activelog = $this->createNewActiveLog($user->email); 
     // delete old log and create  new log
     $activelog->save(); 

     Mail::send('user.active_email',['token'=>$activelog->token,'email'=>$user->email],function ($m) use ($user) {
       $m->from('xiyouant@163.com','西邮计算院网络科技协会');
       $m->to($user->email,$user->name)->subject("激活您的账号");
     });

     return back();

   }
   public  function ActiveUser()
   {
   }

   public function createNewActiveLog( $email)
   {
     $delete_flag = ActiveLog::where('email',$email)->delete();

     $activelog = new ActiveLog;
     $activelog->email = $email;
     $activelog->token = ActiveLog::CreateToken();
     /* $activelog->created_at = time(); */
      
     return $activelog; 
     
   }


}
