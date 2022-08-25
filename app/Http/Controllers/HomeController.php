<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use App\Models\Project;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Fx3costa\LaravelChartJs\Providers\ChartjsServiceProvider;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user = Auth::user()->whereHas('profiles')->find(Auth::user()->id);
        /*if(!isset($user))
            $result='the user doesn't have profile ';
        else
            $result='the user have a profile';
        return $result;*/

        $profile = [];
        if (!isset($user)) {
            $profile = Profile::create([
                'profile_resume' => '',
                'freelancer' => 0,
                'user_id' => auth()->user()->id,
                'profile_photo' => 'avatar.jpg'
            ]);
        }
        return view('home', compact('profile',));
    }

    public function adminHome()

    {
        $approved_user = User::where('approve_Id', 1)->where('is_admin', 0)->count();
        $approved_Project = Project::where('approve_Id', 1)->count();
        $Notapproved_user = User::where('approve_Id', 0)->where('is_admin', 0)->count();
        $Notapproved_project = Project::where('approve_Id', 0)->count();
        $chartjs = app()->chartjs
            ->name('pieChartTest')
            ->type('pie')
            ->size(['width' => 400, 'height' => 200])
            ->labels(['Approved User', 'Not Approved User', 'Approved Project', 'Not Approved Project'])
            ->datasets([
                [
                    'backgroundColor' => ['#FF6384', '#36A2EB', '#fdee00', '#ef3038'],
                    'hoverBackgroundColor' => ['#FF6384', '#36A2EB'],
                    'data' => [$approved_user, $Notapproved_user, $approved_Project, $Notapproved_project]
                ]
            ])
            ->options([]);

        return view('Admin.admin', compact('chartjs'));
    }
}
