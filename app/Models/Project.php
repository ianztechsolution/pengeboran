<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $guarded = ['id'];

    public function payment_channel() {
        return $this->belongsTo(PaymentChannel::class);
    }

    public function customer() {
        return $this->belongsTo(User::class, 'customer_id', 'id');
    }

    public function technician() {
        return $this->belongsTo(User::class, 'technician_id', 'id');
    }

    public function services() {
        return $this->hasMany(ProjectService::class, 'project_id', 'id');
    }

    public function invoices() {
        return $this->hasMany(Invoice::class, 'project_id', 'id');
    }

    public function payments() {
        return $this->hasMany(Payment::class, 'project_id', 'id');
    }

    public function scopeFilter($query, $filters)
    {
        $query->when($filters['technician_id'] ?? false, function ($q) use ($filters) {
            $q->where('technician_id', $filters['technician_id']);
        });

        $query->when($filters['customer_id'] ?? false, function ($q) use ($filters) {
            $q->where('customer_id', $filters['customer_id']);
        });

        $query->when($filters['status'] ?? false, function ($q) use ($filters) {
            $q->where('status', $filters['status']);
        });

        $query->when((isset($filters['start_date']) && isset($filters['end_date'])) ?? false, function ($q) use ($filters) {
            $q->whereBetween('date', [$filters['start_date'], $filters['end_date']]);
        });

        return $query;
    }
}
