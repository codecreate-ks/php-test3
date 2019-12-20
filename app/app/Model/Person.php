<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use App\Scopes\ScopePerson;

class Person extends Model
{
    protected static function boot()
    {
        parent::boot();

        static::addGlobalScope(new ScopePerson);
    }

    public function getData()
    {
        return $this->id . '：' . $this->name . '（' . $this->age . '）';
    }

    public function scopeNameEqual($query, $str)
    {
        return $query->where('name', $str);
    }

    public function scopeAgeGreaterThan($query, $n)
    {
        return $query->where('age', '>=', $n);
    }

    public function scopeAgeLessThan($query, $n)
    {
        return $query->where('age', '<=', $n);
    }

    protected $guarded = array('id');

    public static $rules = array(
        'name' => 'required',
        'mail' => 'email',
        'age' => 'integer|min:0|max:150'
    );

    //hasOne
    // public function board()
    // {
    //     return $this->hasOne('App\Board');
    // }

    //hasMany
    public function boards()
    {
        return $this->hasMany('App\Model\Board');
    }
}
