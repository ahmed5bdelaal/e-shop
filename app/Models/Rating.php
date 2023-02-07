<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
    use HasFactory;
    protected $table='ratings';
    protected $fillable = [
        'user_id',
        'prod_id',
        'stars_rated',
        'sub',
        'desc',
    ];

    public function user(){
 
        return $this->belongsTo(User::class);

    }
}
