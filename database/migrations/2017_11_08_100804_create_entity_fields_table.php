<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEntityFieldsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('entity_fields', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->timestamps();
        });
        Schema::create('entity_field_entity_type', function (Blueprint $table) {
            $table->integer('entity_type_id')->unsigned()->nullable();
            $table->foreign('entity_type_id')->references('id')
                ->on('entity_types');
            
            $table->integer('entity_field_id')->unsigned()->nullable();
            $table->foreign('entity_field_id')->references('id')
                ->on('entity_fields');
            
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
        Schema::dropIfExists('entity_field_entity_type');
        Schema::dropIfExists('entity_fields');
        
    }
}
