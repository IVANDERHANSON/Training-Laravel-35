<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Shipment extends Model
{
    use HasFactory;

    protected $fillable = [
        'Type',
        'Price',
        'Estimation'
    ];

    public function orders(): HasMany
    {
        return $this->hasMany(Order::class, 'ShipmentId');
    }
}
