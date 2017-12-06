<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ValveEvent extends Model
{
    public static function boot()
    {
      parent::boot();
      self::creating(function ($model) {
        $model->id = (string) Uuid::generate(4);
        });
    }

    public $incrementing = false;

    public function valves()
    {
    	return $this->hasMany('App\Valve');
    }
}
