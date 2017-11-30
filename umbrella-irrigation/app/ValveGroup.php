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

    /**
     * returns all entries in ValveGroup DB where the 
     * specific entry does not have a parent group
     */
    public static function getUngroupedValveGroups()
    {
        return ValveGroup::where('parent_valve_group', NULL)->get();
    }

    /**
     * returns all the entries in ValveGroup DB along with its 
     * associated valves
     */
    public static function getValveGroupsWithValves()
    {
        return ValveGroup::with('valves');
    }

    /**
     * returns number of entries in ValveGroup DB
     */
    public static function getNumberOfGroups()
    {
        return ValveGroup::count();
    }

    /**
     * returns a collection of ValveGroup where the collection consists
     * of children of the ValveGroup object's self
     */
    public function getChildValveGroups()
    {
        return $this::where('parent_valve_group', $this->id)->get();
    }

    /**
     * returns the number of entries in the colection of child valve groups
     */
    public function getNumberOfChildValveGroups()
    {
        return count($this->getChildValveGroups());
    }

    /**
     * creats many-to-many association to valve via pivot table
     */
    public function valves()
    {
        return $this->belongsToMany(Valve::class, 'valve_to_group');
    }

    /**
     * returns collection of associated valves of the ValveGroup object's self
     */
    public function getAssocValves()
    {
        return $this->valves;
    }

    /**
     * returns the number of entries in the collection of valves associated with
     * ValveGroups
     */
    public function getNumberOfAssocValves()
    {
        return count($this->getAssocValves());
    }

}
