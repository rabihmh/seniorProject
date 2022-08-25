<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Categories;
use App\Models\Profile;
use App\Models\Project;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProjectController extends Controller
{
    public function getAllProject()
    {
         $projects = Project::with('users', 'categories', 'subcategories',)->paginate(9);
        /*$profiles = User::with(['profiles' => function ($q) {
             $q->select('profile_photo', 'user_id');
         }])->where('is_admin', 0)->get();*/
        // return Profile::select('profile_photo')->where('user_id',$projects[0]->user_id)->first()->profile_photo;
        return view('Admin.project', compact('projects'));
    }

    public function getProject($id)
    {
        $project = Project::with('users', 'categories', 'subcategories')->find($id);
        $user_id = $project->user_id;
        $profile = User::with('profiles')->find($user_id);
        return view('Admin.showProject', compact('project', 'profile'));
    }

    public function getAllProjectApp()
    {

        $projects = Project::with('users', 'categories', 'subcategories',)->get();
        //return $projects;

        return view('Admin.projectApprove', compact('projects'));
    }

    public function approveProject($id)
    {
        $project = Project::find($id);
        if (!$project)
            return redirect()->back()->with(['failed' => 'Project not found']);

        DB::table('projects')
            ->where('id', $id)
            ->update([
                'approve_Id' => 1
            ]);
        return redirect()->back()->with(['success' => 'Approve Successfully']);
    }

    public function deleteProject($id)
    {
        $project = Project::find($id);
        if (!$project)
            return redirect()->back()->with(['failed' => 'project not found']);
        $project->delete();
        return redirect()->route('admin.projectsApprove')->with(['success' => 'deleted successfully']);


    }
}
