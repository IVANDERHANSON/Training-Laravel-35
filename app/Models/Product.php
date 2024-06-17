<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'Name',
        'Price',
        'Image',
        'MerkId'
    ];

    public function merk(): BelongsTo
    {
        return $this->belongsTo(Merk::class, 'MerkId');
    }

    public function orders(): HasMany
    {
        return $this->hasMany(Order::class, 'ProductId');
    }
}
