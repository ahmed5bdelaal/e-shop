<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $table='categorys';
    protected $fillable = [
        'name',
        'disc',
        'status',
        'image',
        'popular',
        'meta_title',
        'meta_disc',
        'meta_keywords',
    ];
    
    public function isPopular(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => ucfirst($value),
        );
    }

    public function product(){
 
        return $this->hasMany(Product::class,'cate_id','id');
    }
}
