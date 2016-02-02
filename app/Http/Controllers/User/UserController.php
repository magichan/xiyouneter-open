<?php

namespace App\Http\Controllers\User;
use Auth;
use Redirect;
use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
  public function index()
  {
    return view('user.info')->withUser(Auth::user());
  } 
  public function getEdit()
  {
    return view('user.edit')->withUser(Auth::user());
  }
  public function postInfo(Request $request)
  {

    $data = $request->all();

    $user = Auth::user();
    $user_data = $user->toArray();
    foreach($user_data as $key=>$value)
    {
      if(preg_match('/.*authority/',$key,$matches))
      {
          $user->setAttribute($key,true);
      }
    }  // 将所有名字由 authority 的属性值初始化成 1



    $user->fill($data); 
    $user->save();

    return redirect('user/info');
  }
}
