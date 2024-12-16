<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Currency extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'slug'];

    public function product(): HasOne
    {
        return $this->hasOne(Product::class);
    }
}
