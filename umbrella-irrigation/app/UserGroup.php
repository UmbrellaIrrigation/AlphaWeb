<?php
namespace App;
use Webpatser\Uuid\Uuid;
use Illuminate\Database\Eloquent\Model;
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
    public function users() //fetch collection of group's users by calling $group->users
    {
        return $this->belongsToMany(User::class,'user_to_group');
    }
    public function getChildren()
    {
        return $this::where('parent_id',$this->id)->get();
    }
}
