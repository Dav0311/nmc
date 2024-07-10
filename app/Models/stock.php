<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class stock extends Model
{
    protected $table = "Stock";
    protected $primaryKey ="id";
    protected $fillable = [
        'product_name',
        'cat_id',
        'price'
    ];

    public function catitems ()
    {
        return $this-> hasMany(CartItem::class);
    }
    use HasFactory;
}
