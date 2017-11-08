<?php

use Illuminate\Database\Seeder;

class EntitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $types = factory(App\Models\EntityType::class, 5)->create();
        
        $fields = factory(App\Models\EntityField::class, 10)->create();
        
        $entities = factory(App\Models\Entity::class, 25)->create();
        
        
        $types->each(function($type) use ($fields){
            $num_fields = rand(1, $fields->count());
            
            $type_fields = $fields->random($num_fields)->each(function($field) use($type) {
                $type->fields()->attach($field);
            });
        });
        
        
        
    }
}
