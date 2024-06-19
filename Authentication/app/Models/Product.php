<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $primaryKey = 'prod_id';

    // public function products(){
    //     return $this->belongsTo(Product::class, 'products');
    // }

    protected $fillable = [
        'prod_id',
        'prod_name',
        'detials',
        'price',
        'stock'
    ];
}
