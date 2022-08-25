<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

    protected $table = 'cart';
    protected $fillable = [
        'id',
        'project_id',
        'created_at',
        'updated_at',
        'user_id'
    ];
    protected $hidden = [];
    public $timestamps = false;

    public function users()
    {
        return $this->belongsTo('App\Models\User', 'user_id');
    }

}
