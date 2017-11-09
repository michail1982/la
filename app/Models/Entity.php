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
    
    public function props()
    {
        return $this->belongsToMany(
            EntityField::class,
            'entity_field_entity_type',
            'entity_type_id',
            'entity_field_id',
            'type_id'
        );
    }
}
