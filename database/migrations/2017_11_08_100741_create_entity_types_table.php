<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use App\Models\EntityType;

class CreateEntityTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('entity_types', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('entity_types');
        $tables = \DB::connection()->getDoctrineSchemaManager()->listTableNames();
        foreach($tables as $table) {
            if(strpos($table, EntityType::TABLE_PREFIX)===0) {
                Schema::dropIfExists($table);
            }
        }
        
    }
}
