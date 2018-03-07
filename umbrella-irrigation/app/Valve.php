<?php
namespace App;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;
use Webpatser\Uuid\Uuid;
use DB;

class Valve extends Model
{
	public static function boot()
    {
        parent::boot();

        self::creating(function ($model){
            $model->description = 'sick pipe ma dude';
            $model->id = (string) Uuid::generate(4);
        });

        self::saving(function ($model){
        if(trim($model->description) == '')
            $model->description = 'sick pipe ma dude';

        });
    }
    
	public $incrementing = false;
    protected $fillable = [
        'parent_id', 'name', 'description', 'latitude', 'longitude', 'min_flow_limit', 'max_flow_limit', 'nominal_flow_limit', 'curr_flow', 'max_gpm', 'min_voltage', 'max_voltage', 'curr_voltage', 'normally_open', 'is_parent', 'suppressed', 'postponed', 'shutdown', 'alert', 'overriden'
    ];

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
        $ids = DB::table('valve_to_group')->pluck('valve_id');
        $valves = Valve::all()->keyBy('id');
        foreach($ids as $id)
        {
            $valves->pull($id);
        }
        return $valves;
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

    public function users()
    {
        return $this->belongsToMany(User::class, 'valve_to_user');
    }

    public function assignUser(User $user)
    {
        $this->users()->attach($user->id);
        return;
    }

    public function unassignUser(User $user)
    {
        $this->users()->detach($user->id);
        return;
    }

    public function unassignAllUsers()
    {
        $this->users()->detach();
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
