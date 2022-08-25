<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SeriveRequestOffer extends Model
{
    use HasFactory;

    protected $table = "servicerequest_offer";
    protected $fillable = [
        'price',
        'details',
        'service_id',
        'user_id',

    ];
    protected $hidden = [];

}
