<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $guarded = ['id'];

    public function medias()
    {
        return $this->morphMany(Media::class, 'objectable');
    }

    public function invoice() {
        return $this->belongsTo(Invoice::class);
    }

    public function project() {
        return $this->belongsTo(Project::class);
    }

    public function customer() {
        return $this->belongsTo(User::class, 'customer_id', 'id');
    }

    
    public function scopeFilter($query, $filters)
    {
        $query->when($filters['project_id'] ?? false, function ($q) use ($filters) {
            $q->where('project_id', $filters['project_id']);
        });

        $query->when($filters['invoice_id'] ?? false, function ($q) use ($filters) {
            $q->where('invoice_id', $filters['invoice_id']);
        });

        $query->when($filters['customer_id'] ?? false, function ($q) use ($filters) {
            $q->where('customer_id', $filters['customer_id']);
        });

        $query->when($filters['status'] ?? false, function ($q) use ($filters) {
            $q->where('status', $filters['status']);
        });

        $query->when((isset($filters['start_date']) && isset($filters['end_date'])) ?? false, function ($q) use ($filters) {
            $q->whereBetween('paid_date', [$filters['start_date'], $filters['end_date']]);
        });

        return $query;
    }

}
