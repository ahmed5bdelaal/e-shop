<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class setting extends Model
{
    use HasFactory;

    protected $fillable=[
        'name',
        'short_des',
        'description',
        'photo',
        'address',
        'phone',
        'email',
        'logo',
        'facebock',
        'google',
        'twitter',
        'instagram'];

}
