<?php
namespace App\Services;

use App\Models\EntityType;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use App\Models\EntityField;

/**
 *
 * @author Michail1982
 *        
 */
class EntityTypeService
{
    public function checkTable(EntityType $item)
    {
        $table = EntityType::TABLE_PREFIX.$item->getRouteKey();
        
        if(!Schema::hasTable($table)){
            Schema::create($table, function(Blueprint $table) use($item){
                $table->integer('entity_id', false, true)->index();
                $table->foreign('entity_id')->references('id')
                ->on('entities');
            });
        }
        $item->load('fields');
        if($item->fields->count()) {
            Schema::table($table, function(Blueprint $table) use($item){
                foreach($item->fields as $field) {
                    $column = $field->getRouteKey();
                    if(!Schema::hasColumn($table->getTable(), $column)) {
                        $table->integer($column, false, true)->nullable();
                    }
                }
            });
        }
        
        return $table;
    }
    
}

