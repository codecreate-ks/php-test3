<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class EcShop extends Model
{
    //命名規則外のため紐付けるテーブルを指定
    protected $table = 'stock';

    //入力のガード。データベース側で自動的に割り振られる
    protected $guarded = array('id');
}
