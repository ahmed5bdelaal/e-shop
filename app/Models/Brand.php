<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class Brand extends Model
{
    use HasFactory;

    protected $table ='brands';
    protected $fillable = [
        'title',
        'slug',
        'status',
        'photo',
    ];

    public function products()
    {
        return $this->hasMany(Product::class,'brand_id');
    }
}
