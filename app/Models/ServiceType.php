<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ServiceType extends Model
{
    protected $guarded = ['id'];

    public function scopeFilter($query, $filters)
    {
        $query->when($filters['status'] ?? false, function ($q) use ($filters) {
            $q->where('status', $filters['status']);
        });

        return $query;
    }
}
