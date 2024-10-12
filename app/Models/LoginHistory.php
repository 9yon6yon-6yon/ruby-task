<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class LoginHistory extends Model
{
    use HasFactory,HasUlids;
    public $incrementing = false;
    protected $keyType = 'string';
    protected $primaryKey = '_lid';
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->{$model->getKeyName()} = (string) Str::ulid(); // Generate ULID for primary key
        });
    }
}
