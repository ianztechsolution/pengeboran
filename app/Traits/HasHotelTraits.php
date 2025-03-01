<?php

namespace App\Traits;

use App\Models\User;
use App\Models\Hotel;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Eloquent\Model;

trait HasHotelTraits
{
    public static function bootHasHotelTraits()
    {
        static::creating(function (Model $model) {
            if (!$model->hotel_id) {
                $model->hotel_id = auth()->user() ? auth()->user()->hotel_id : null;
            }
        });
    }

    public function hotel()
    {
        return $this->belongsTo(Hotel::class, 'hotel_id');
    }
}