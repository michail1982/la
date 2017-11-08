<?php
namespace App\Observers;

use App\Models\EntityType;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;

class EntityTypeObserver
{
    /**
     * Listen to the User created event.
     *
     * @param  \App\User  $user
     * @return void
     */
    public function created(EntityType $item)
    {
        $table = 'entity_fields_'.$item->getKey();
        Schema::dropIfExists($table);
        Schema::create($table, function(Blueprint $table){
            $table->integer('entity_id', false, true)->index();
            $table->foreign('entity_id')->references('id')
                ->on('entities');
        });
        
    }
}

