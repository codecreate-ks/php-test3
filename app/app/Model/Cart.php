<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    //命名規則外のため紐付けるテーブルを指定
    protected $table = 'cart';

    //入力のガード。データベース側で自動的に割り振られる
    protected $guarded = array('id');
}