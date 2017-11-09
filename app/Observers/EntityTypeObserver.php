<?php
namespace App\Observers;

use App\Models\EntityType;
use App\Services\EntityTypeService;

class EntityTypeObserver
{
    /**
     * @var EntityTypeService
     */
    private $service;
    
    public function __construct(EntityTypeService $service)
    {
        $this->service = $service;
    }
    
    /**
     * @param EntityType $item
     */
    public function created(EntityType $item)
    {
        $this->service->checkTable($item);
    }
    
    /**
     * @param EntityType $item
     */
    public function attached(EntityType $item)
    {
        $this->service->checkTable($item);
    }

}

