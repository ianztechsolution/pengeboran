<?php

namespace App\Traits;

use Illuminate\Database\Eloquent\Model;

trait HasMultiLangField
{
    public static function bootHasMultiLangField()
    {
        static::retrieved(function (Model $model) {
            $attributes = $model->getAttributes();
            foreach ($attributes as $key => $value) {
                if (str_ends_with($key, '_en')) {
                    $attributeName = substr($key, 0, -3);
                    $idKey = $attributeName . '_id';
                    $enIdKey = $attributeName . '_en';

                    if (array_key_exists($idKey, $attributes) && empty($attributes[$idKey])) {
                        $model->setAttribute($idKey, $attributes[$enIdKey]);
                    }
                }
            }
        });
    }
}