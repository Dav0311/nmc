<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sales extends Model
{
    use HasFactory;

    protected $table = 'sales';
    protected $primaryKey = 'id';
    
    protected $fillable = [
        'total',
        'pay',
        'balance'
       
    ];

    public function salesDetails ()
    {
        return $this -> hasMany(salesDetails::class, 'sales_id');

    }
      
}
