<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subcategory extends Model
{
    protected $table = 'subcategory';
    protected $fillable = ['id', 'subCat_name', 'cat_id'];
    protected $hidden = [];
    public $timestamps = false;
    use HasFactory;

    //Relation with project
    public function cat()
    {
        return $this->belongsTo('App\Models\Categories', 'cat_id');
    }

    //relation with projects
    public function subCatProject()
    {
        return $this->hasOne('App\Models\Project', 'project_subcategory');
    }

    public function subCatService()
    {
        return $this->hasOne('App\Models\Project', 'service_subcategory');
    }
}
