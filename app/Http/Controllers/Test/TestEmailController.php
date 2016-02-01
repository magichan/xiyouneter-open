<?php

namespace App\Http\Controllers\Test;
use App\User;
use Mail;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class TestEmailController extends Controller
{
  public function index()
  {
    $email='574932286@qq.com';
    $name = 'han';
    $uid = '333';
    $code = '2134213';
    $data = ['email'=>$email, 'name'=>$name, 'uid'=>$uid, 'activationcode'=>$code];
    Mail::send('test.activemail', $data, function($message) use($data)
    {
      $message->to($data['email'], $data['name'])->subject('欢迎注册我们的网站，请激活您的账号！');
    });
  } 
}
