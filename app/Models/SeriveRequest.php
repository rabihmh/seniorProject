<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SeriveRequest extends Model
{
    use HasFactory;

    protected $table = 'servicerequest';
    protected $fillable = [
        'id',
        'user_id',
        'service_name',
        'service_price',
        'service_category',
        'service_subcategory',
        'service_description',
        'service_duration',
        'approved_id',
        'stage'
    ];
    protected $hidden = [];

    public function users()
    {
        return $this->belongsTo('App\Models\User', 'user_id');
    }

//Relation with categories
    public function categories()
    {
        return $this->belongsTo('App\Models\Categories', 'service_category');
    }

    public function subcategories()
    {
        return $this->belongsTo('App\Models\SubCategory', 'service_subcategory');
    }


}
