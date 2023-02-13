<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wishlist extends Model
{
    use HasFactory;
    protected $table='wishlists';
    protected $fillable = [
        'user_id',
        'prod_id',
    ];

    public function product()
    {
        return $this->belongsTo(Product::class,'prod_id','id');
    }
}
