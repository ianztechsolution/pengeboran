<?php

namespace App\Traits;

use App\Models\User;
use Illuminate\Support\Facades\Auth;

trait HasCreatorTraits
{
    public static function bootHasCreatorTraits()
    {
        static::creating(function ($model) {
            $model->creator_id = User::first()->id;
        });
    }

    public function creator()
    {
        return $this->belongsTo(User::class, 'creator_id')->withDefault([
            'first_name' => 'System',
            'last_name'=>'',
            'full_name'=>''
        ]);
    }
}
