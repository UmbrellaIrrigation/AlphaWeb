<?php
namespace App;
use Webpatser\Uuid\Uuid;
use Illuminate\Database\Eloquent\Model;

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
    public function valves()
    {
    	return $this->belongsToMany(Valve::class, 'valve_to_group');
    }
}
