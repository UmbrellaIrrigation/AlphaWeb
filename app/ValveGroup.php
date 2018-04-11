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

    protected $hidden = [
        'created_at', 'updated_at', 'parent_id', 'name'
    ];

    protected $appends = [
        'folder', 'title'
    ];

    public $incrementing = false;

    /**
     * returns all entries in ValveGroup DB where the
     * specific entry does not have a parent group
     */
    public static function getRootGroups()
    {
        return ValveGroup::where('parent_id', NULL)->get();
    }


    /**
     * returns all the entries in ValveGroup DB along with its
     * returns all entries in ValveGroup DB
     *
     */
    public static function getAllGroups()
    {
        return ValveGroup::all();
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

    public function getFolderAttribute()
    {
        return $this->attributes['folder'] = true;
    }

    public function getTitleAttribute()
    {
        return $this->attributes['title'] = $this->name;
    }

    /**
     * returns a collection of ValveGroup where the collection consists
     * of children of the ValveGroup object's self
     */
    public function getChildGroups()
    {
        // return $this::where('parent_valve_group', $this->id)->get();
        return $this->hasMany(ValveGroup::class, 'parent_id');
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
    public function getChildValves()
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

    public function getParentGroup()
    {
        return $this->belongsTo(ValveGroup::class, 'parent_id');
    }

    public function addToGroup(ValveGroup $parent)
    {
        $child = $this;
        if($child->parent_id == $parent->id || $child->id == $parent_id)
            return false;
        $parent->getChildGroups()->save($child);
        return true;
    }

    public function removeFromGroup(ValveGroup $parent)
    {
        $child = $this;
        if($child->parent_id!=$parent->id || $child->id == $parent->id)
            return false;
        $child->parent_id = null;
        $child->save();
        return true;
    }

}
