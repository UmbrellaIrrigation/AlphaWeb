<?php

namespace App;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;
use DB;

class Valve extends Model
{
	public static function boot()
    {
      parent::boot();
      self::creating(function ($model){
        $model->id = (string) Uuid::generate(4);
        });
    }
    
	public $incrementing = false;

    public function isParent()
    {
    	return $this->isParent;
    }

    public function isPostponed()
    {
    	return $this->suppressed;
    }

    public function isShutdown()
    {
    	return $this->shutdown;
    }

    public function isAlerted()
    {
    	return $this->alert;
    }

    public function isOverriden()
    {
    	return $this->overriden;
    }

    public static function getPostponed()
    {
    	return Valve::where('postponed','1')->get();
    }

    public static function getShutdown()
    {
    	return Valve::where('shutdown', '1')->get();
    }

    public static function getAlerted()
    {
    	return Valve::where('alert', '1')->get();
    }

    public static function getOverriden()
    {
    	return Valve::where('overriden', '1')->get();
    }

    public static function getRootValves()
    {
        return Valve::where('parent_id', NULL)->get();
    }

    public static function getUngroupedValves()
    {
        $ids = DB::table('valve_to_group')->pluck('valve_id');
        $valves = Valve::all()->keyBy('id');
        foreach($ids as $id)
            $valves->pull($id);
        return $valves;
    }

    public function valve_groups()
    {
    	return $this->belongsToMany(ValveGroup::class, 'valve_to_group')->get();
    }
}
