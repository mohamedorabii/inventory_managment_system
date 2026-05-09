<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class InventoryTransaction extends Model
{
    protected $primaryKey = 'transaction_id';
    protected $fillable = ['product_id', 'type', 'quantity', 'transaction_date'];
    protected $casts = ['transaction_date' => 'date'];

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }
}
