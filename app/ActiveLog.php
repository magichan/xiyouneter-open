<?php

namespace App;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;

class ActiveLog extends Model
{
  protected $guarded = ['id'];
  protected $table = 'active_log';

  public $timestamps = false;
  static function createToken()
  {
    $app_key = env('APP_KEY','Hello world');
    return hash_hmac('sha256',Str::random(40),$app_key);
  }

}
