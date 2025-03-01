<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class InvoiceDetail extends Model
{
    public function invoice() {
        return $this->belongsTo(Invoice::class);
    }

    public function project_service() {
        return $this->belongsTo(ProjectService::class);
    }
}
