<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Entity extends Model
{
    //
    public function type()
    {
        return $this->belongsTo(EntityType::class);
    }
    
    public function fields()
    {
        return $this->belongsToMany(EntityField::class)->withTimestamps();
    }
}
