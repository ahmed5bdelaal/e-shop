<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $table ='orders';
    protected $fillable = [
        'user_id',
        'fname',
        'email',
        'lname',
        'phone',
        'address',
        'city',
        'code',
        'country',
        'state',
        'total',
        'status',
        'message',
        'tracking_no',
        'profit',
    ];

    public function orderItems()
    {
        return $this->hasMany(OrderItem::class,'order_id','id');
    }
    public function user()
{
    return $this->belongsTo(User::class, 'user_id','id');
}
}
