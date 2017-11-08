<?php
namespace App\Observers;

use App\Models\Entity;
use Illuminate\Support\Facades\DB;

class EntityObserver
{
    /**
     * Listen to the User created event.
     *
     * @param  \App\User  $user
     * @return void
     */
    public function saved(Entity $item)
    {
        $table = 'entity_fields_'.$item->type->getKey();
       
        if(DB::table($table)->where('entity_id', $item->getKey())->count()==0) {
            DB::table($table)->insert([
                'entity_id' => $item->getKey()
            ]);
        }
    }
}

