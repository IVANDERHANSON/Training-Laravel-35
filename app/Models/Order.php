<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'ProductId',
        'ShipmentId'
    ];

    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class, 'ProductId');
    }

    public function shipment(): BelongsTo
    {
        return $this->belongsTo(Shipment::class, 'ShipmentId');
    }
}
