<?php
namespace App;
use Webpatser\Uuid\Uuid;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class ValveGroup extends Model
{
    public static function boot()
    {
        parent::boot();
        self::creating(function ($model) {
            $model->id = (string) Uuid::generate(4);
            });
    }

    public $incrementing = false;

    //valve group-> id -> find all valves with the same group id
    public function getChildValves()
    {
    	return $this->belongsToMany(Valve::class, 'valve_to_group')->get();
    }

    public static function getRootGroups()
    {
        return ValveGroup::where('parent_valve_group', NULL)->get();
    }

    public function getChildGroups()
    {
        return $this::where('parent_valve_group', $this->id)->get();
    }

}
