<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Expense extends Model
{
    protected $fillable = [
        'description', 'amount', 'payment_id',
        'user_id', 'isDivided', 'purchase_date', 'comments'
    ];

    public function category()
    {
        return $this->belongsTo((Category::class));
    }

    public function payment()
    {
        return $this->belongsTo((Payment::class));
    }
}
