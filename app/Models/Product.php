<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Str;

class Product extends Model
{
    use HasFactory, HasUlids;
    public $incrementing = false;
    protected $keyType = 'string';
    protected $primaryKey = '_pid';

    protected $fillable = [
        'sku',
        'name',
        'description',
        'price',
        'inventory_id'
    ];
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->{$model->getKeyName()} = (string) Str::ulid(); // Generate ULID for primary key
        });
    }
    // Relation: A product belongs to user record
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
    // Relation: A product belongs to an inventory record
    public function inventory(): BelongsTo
    {
        return $this->belongsTo(Inventory::class);
    }

    // Relation: A product has many stock history records
    public function stockHistories(): HasMany
    {
        return $this->hasMany(StockHistory::class);
    }
}
