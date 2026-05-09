<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Purchase extends Model
{
    protected $primaryKey = 'purchase_id';
    protected $fillable = ['supplier_id', 'purchase_date', 'total_cost'];
    protected $casts = ['purchase_date' => 'date'];

    public function supplier()
    {
        return $this->belongsTo(Supplier::class, 'supplier_id');
    }

    public function purchaseDetails()
    {
        return $this->hasMany(PurchaseDetail::class, 'purchase_id');
    }
}
