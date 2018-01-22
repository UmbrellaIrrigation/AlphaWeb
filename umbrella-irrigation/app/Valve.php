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

    public static function getPostponed()
    {
    	return Valve::where('postponed','1')->get();
    }

    public static function getNumberPostponed()
    {
        return count(Valve::getPostponed());
    }

    public static function getShutdown()
    {
    	return Valve::where('shutdown', '1')->get();
    }

    public static function getNumberShutdown()
    {
        return count(Valve::getShutdown());
    }

    public static function getAlerted()
    {
    	return Valve::where('alert', '1')->get();
    }

    public static function getNumberAlerted()
    {
        return count(Valve::getAlerted());
    }

    public static function getOverriden()
    {
    	return Valve::where('overriden', '1')->get();
    }

    public static function getNumberOverriden()
    {
        return count(Valve::getOverriden());
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

    public static function getValveWithValveGroups()
    {
        return Valve::with('valvegroups');
    }

    public function valvegroups()
    {
    	return $this->belongsToMany(ValveGroup::class, 'valve_to_group');
    }

    public function valveevents()
    {
        return $this->hasMany('App\ValveEvent');
    }

    public function getAssocGroups()
    {
        return $this->valvegroups;
    }

    public function getChildValves()
    {
        return $this->where('parent_id', $this->id)->get();
    }

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
}
