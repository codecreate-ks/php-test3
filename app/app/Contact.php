<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    //入力のガード。データベース側で自動的に割り振られる
    protected $guarded = array('id');
}
