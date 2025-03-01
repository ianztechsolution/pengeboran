<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProjectService extends Model
{
    protected $table = 'project_services';

    protected $guarded = ['id'];

    public function medias()
    {
        return $this->morphMany(Media::class, 'objectable');
    }

    public function project() {
        return $this->belongsTo(Project::class, 'project_id', 'id');
    }

    public function service_type() {
        return $this->belongsTo(ServiceType::class, 'service_type_id', 'id');
    }

    public function technician() {
        return $this->belongsTo(User::class, 'technician_id', 'id');
    }

    public function scopeFilter($query, $filters)
    {
        $query->when($filters['project_id'] ?? false, function ($q) use ($filters) {
            $q->where('project_id', $filters['project_id']);
        });

        $query->when($filters['technician_id'] ?? false, function ($q) use ($filters) {
            $q->where('technician_id', $filters['technician_id']);
        });

        $query->when($filters['customer_id'] ?? false, function ($q) use ($filters) {
            $q->where('customer_id', $filters['customer_id']);
        });

        $query->when($filters['status'] ?? false, function ($q) use ($filters) {
            $q->where('status', $filters['status']);
        });

        return $query;
    }
}
