<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $table ='products';
    protected $fillable = [
        'name','offer','brand_id','cate_id','rate','s_disc','disc','o_price','s_price','dis','qty','tax','status','trending','meta_title','meta_disc','meta_keywords',
    ];

    public function isTrending(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => $value > 0,
        );
    }

    public static function name($id)
    {
        $product=Product::whereId($id)->first();
        foreach($product->images as $item){
            $name= $item->name;
            return $name;
            break;
        }
    }

    public function images()
    {
        return $this->hasMany(Image::class);
    }

    public function category(){
 
            return $this->belongsTo(Category::class,'cate_id','id');
    
    }

    public function brand(){
 
        return $this->belongsTo(Brand::class,'brand_id','id');

    }

    public function rating(){
 
        return $this->hasMany(Rating::class,'prod_id','id');

    }

    public function orderItems(){
        return $this->hasMany(orderItem::class);
    }
}
