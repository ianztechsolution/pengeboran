<?php

namespace App\Repositories;

use App\Models\ServiceType;

class ServiceTypeRepository extends BaseRepository
{
    public function __construct(ServiceType $service_type)
    {
        parent::__construct($service_type);
    }
}
