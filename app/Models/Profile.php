<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $table='profile';
    protected $fillable=['id','profile_resume','freelancer','user_id','profile_photo','jobs_name','my_facebook','my_portfolio','my_linkedin'];
    protected $hidden=[];
    public $timestamps=false;
    use HasFactory;
    //Relation with users
    public function users(){
        return $this->belongsTo('App\Models\User','user_id');
    }

}
