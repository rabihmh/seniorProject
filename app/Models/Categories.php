<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
    protected $table = 'categories';
    protected $fillable = [
        'id ',
        'categories_name',
        'categories_photo',
    ];
    public $timestamps = false;
    use HasFactory;

    //Relation with subCategories
    public function subcat()
    {
        return $this->hasMany('App\Models\Subcategory', 'cat_id', 'id');
    }

    //relation with project
    public function projectCat()
    {
        return $this->hasOne('App\Models\Project', 'project_category');
    }

    public function ServiceCat()
    {
        return $this->hasOne('App\Models\ServiceRequest', 'service_category');
    }


}
