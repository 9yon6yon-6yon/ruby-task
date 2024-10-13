<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Str;

class Inventory extends Model
{
    use HasFactory, HasUlids;
    public $incrementing = false;
    protected $keyType = 'string';
    protected $primaryKey = 'id';
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->{$model->getKeyName()} = (string) Str::ulid(); // Generate ULID for primary key
        });
    }
    // Relation: An inventory entry belongs to a product
    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }
}
