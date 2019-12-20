<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Board extends Model
{
    protected $guarded = array('id');

    public static $rules = array(
        'person_id' => 'required',
        'title' => 'required',
        'message' => 'required'
    );

    //hasOne,hasMany用
    // public function getData()
    // {
    //     return $this->id . '：' . $this->title;
    // }

    //belongsTo用
    public function getData()
    {
        return $this->id . '：' . $this->title . '（' . $this->person->name . '）';
    }

    public function person()
    {
        return $this->belongsTo('App\Model\Person');
    }
}
