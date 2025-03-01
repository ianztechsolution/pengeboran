<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    protected $guarded = ['id'];

    public function project() {
        return $this->belongsTo(Project::class);
    }
    public function technician() {
        return $this->belongsTo(User::class, 'customer_id', 'id');
    }

    public function customer() {
        return $this->belongsTo(User::class, 'customer_id', 'id');
    }

    public function scopeFilter($query, $filters)
    {
        $query->when($filters['project_id'] ?? false, function ($q) use ($filters) {
            $q->where('project_id', $filters['project_id']);
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
