<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use CyrildeWit\EloquentViewable\InteractsWithViews;
use CyrildeWit\EloquentViewable\Contracts\Viewable;
use Illuminate\Support\Facades\DB;

class Project extends Model implements Viewable
{
    use InteractsWithViews;

    protected $table = 'projects';
    protected $fillable = [
        'id',
        'user_id',
        'project_name',
        'project_photo',
        'project_price',
        'project_category',
        'project_subcategory',
        'project_description',
        'project_duration',
        'approved_id'
    ];
    protected $hidden = [];
    //public $timestamps = false;
    use HasFactory;

//Relation with users
    public function users()
    {
        return $this->belongsTo('App\Models\User', 'user_id');
    }

//Relation with categories
    public function categories()
    {
        return $this->belongsTo('App\Models\Categories', 'project_category');
    }

    //Relation with subcategory

    public function subcategories()
    {
        return $this->belongsTo('App\Models\SubCategory', 'project_subcategory');
    }


    /*
        public static function getProjects($category)
        {
            $project = DB::table('projects');
            // Filter By Category
            if ($category) {
                $project = $project->where('projects.project_category', $category)->with('users', 'categories', 'subcategories')->where('approve_Id', 1);
            }
            return $project->get();

        }*/

}
