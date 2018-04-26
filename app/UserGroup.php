<?php

namespace App;
use Webpatser\Uuid\Uuid;
use Illuminate\Database\Eloquent\Model;
use App\User;
class UserGroup extends Model
{

    public static function boot()
    {
      parent::boot();
      self::creating(function ($model) {
        $model->id = (string) Uuid::generate(4);
        });
    }

    public $incrementing = false;

    protected $fillable = [
        'name', 'parent_id'
    ];

    protected $hidden = [
        'created_at', 'updated_at'
    ];

    protected $appends = [
        'folder', 'title'
    ];

    public static function getAllGroups()
    {
        return UserGroup::all();
    }

    public static function getRootGroups()
    {
        return UserGroup::where('parent_id',null)->get();
    }

    public function getChildUsers() //fetch collection of group's users by calling $group->getChildUsers()->get();
    {
        return $this->belongsToMany(User::class,'user_to_group');
    }

    public function getChildGroups()
    {
        return $this->hasMany(UserGroup::class, 'parent_id');
    }

    public function getParentGroup()
    {
        return $this->belongsTo(UserGroup::class, 'parent_id');
    }

    public function getFolderAttribute()
    {
        return $this->attributes['folder'] = true;
    }

    public function getTitleAttribute()
    {
        return $this->attributes['title'] = $this->name;
    }

    public function addToGroup(UserGroup $parentGroup) //$child->addToGroup($parent)
    {
        $childGroup = $this;
        if($childGroup->parent_id==$parentGroup->id || $childGroup->id == $parentGroup->id)
            return false;
        $parentGroup->getChildGroups()->save($childGroup);
        return true;
    }

    public function removeFromGroup(UserGroup $parentGroup) //$child->removeFromGroup($parent)
    {
        $childGroup = $this;
        if($childGroup->parent_id!=$parentGroup->id || $childGroup->id == $parentGroup->id)
            return false;
        $childGroup->parent_id = null;
        $childGroup->save();
        return true;
    }
}