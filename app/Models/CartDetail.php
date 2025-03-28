<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CartDetail extends Model
{
    use HasFactory;

    protected $table = 'cart_details';

    protected $fillable = [
        'id',
        'cart_id',
        'product_id',
        'quantity',
        
    ];
} 