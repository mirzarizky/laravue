<?php

namespace App\Traits;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

trait HasUuid
{
    /**
     * Boot function from Laravel.
     */
    protected static function bootHasUuid()
    {
        static::creating(function (Model $model) {
            $model->{self::getUuidColumn()} = Str::orderedUuid()->toString();
        });
    }

    abstract public static function getUuidColumn(): string;
}
