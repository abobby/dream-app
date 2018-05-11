<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Sellers extends Model
{
    protected $table = 'sellers';

    protected $fillable = [
        'type',
        'name',
        'address',
        'phone',
        'email',
        'website',
        'status'
    ];
}
