<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EntityField extends Model
{
    //
    /**
     * Get the route key for the model.
     *
     * @return string
     */
    public function getRouteKeyName()
    {
        return 'slug';
    }
}
