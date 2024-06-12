<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Merk extends Model
{
    use HasFactory;

    protected $fillable = [
        'Merk',
    ];

    public function product(): HasMany
    {
        return $this->hasMany(Product::class, 'MerkId');
    }
}
