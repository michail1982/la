<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EntityType extends Model
{
    //
    const TABLE_PREFIX = 'entity_props_';
    /**
     * Additional observable events.
     */
    protected $observables = [
        'attached'
    ];
    
    public function fields()
    {
        return $this->belongsToMany(EntityField::class, 'entity_field_entity_type')->withTimestamps();
    }
    
    public function entities()
    {
        return $this->hasMany(Entity::class, 'type_id');    
    }
    
    public function attached()
    {
        $this->fireModelEvent('attached', false);
    }

}
