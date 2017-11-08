<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EntityType extends Model
{
    //
    public function fields()
    {
        return $this->belongsToMany(EntityField::class)->withTimestamps();
    }

}
