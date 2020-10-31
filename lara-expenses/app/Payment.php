<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    //
    protected $fillable = ['name'];

    public function expense()
    {
        return $this->hasOne(Expense::class);
    }
}
