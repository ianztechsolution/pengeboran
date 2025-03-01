<?php

namespace App\Models;

use App\Helper\Helper;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class Media extends Model
{
    protected $table = 'medias';
    protected $guarded = ['id'];

    protected static function boot()
    {
        parent::boot();
        static::creating(function ($model) {
            $directory = Str::slug($model->objectable_type);
            $model->path = $model->path ? Helper::uploadFile($model->path, 'images/' . $directory) : null;
        static::retrieved(function ($model) {
        });
            $model->path = $model->path ? Storage::url($model->path) : null;
        });
        static::deleting(function ($model) {
            if ($model->path) {
               Helper::deleteFile($model->path);
            }
        });
    }

    public function objectable(): MorphTo
    {
        return $this->morphTo();
    }
}
