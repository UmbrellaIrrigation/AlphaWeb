<?php

namespace App;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

class Valve extends Model
{
	public static function boot()
    {
      parent::boot();
      self::creating(function ($model) {
        $model->id = (string) Uuid::generate(4);
        });
    }
    
	public $incrementing = false;

    public function isParent(){
    	return $this->isParent;
    }

    public function isPostponed(){
    	return $this->suppressed;
    }

    public function isShutdown(){
    	return $this->shutdown;
    }

    public function isAlerted(){
    	return $this->alert;
    }

    public function isOverriden(){
    	return $this->overriden;
    }

    public static function getPostponed(){
    	return Valve::where('postponed','1')->get();
    }

    public static function getShutdown(){
    	return Valve::where('shutdown', '1')->get();
    }

    public static function getAlerted(){
    	return Valve::where('alert', '1')->get();
    }

    public static function getOverriden(){
    	return Valve::where('overriden', '1')->get();
    }

    public function valve_groups(){
    	return $this->belongsToMany(ValveGroup::class, 'valve_to_group');
    }
}
