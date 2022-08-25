<?php

namespace App\Http\Controllers;

use App\Http\Requests\servicesRequest;
use App\Models\Profile;
use App\Models\Project;
use App\Models\SeriveRequest;
use App\Models\User;
use App\Notifications\Add_service_new;
use App\Notifications\AddServices;
use App\Traits\ImagesTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Notification;
use Illuminate\Notifications\Notifiable;


class ServicesController extends Controller
{
    use ImagesTrait;


    public function myServices()
    {
        $my_id = auth()->user()->id;
        $my_Project = Project::where('user_id', $my_id)->get();
        if ($my_Project->count() == 0)
            return '<div style="margin-top: 300px;text-align: center;color:#721c24;background-color: #f8d7da;
                        border-color: #f5c6cb;padding: 0.75rem 1.25rem;
                        margin-bottom: 1rem;
                        border: 1px solid transparent;
                        border-radius: 0.25rem;">you don\'t have any service</div>';
        return view('user.myservice', compact('my_Project'));
    }


    public function getAll()
    {

        $services = Project::with('users', 'categories', 'subcategories')->where('approve_Id', 1)->where('user_id', '!=', Auth::id())->paginate(25);
        // return $services;
        return view('user.allservices', compact('services'));
    }

    public function getAllSearch(Request $request)
    {
        $output = '';
        $cat_id = $request->filter;
        $allServices = Project::with('users')
            ->where('project_category', $cat_id)
            ->get();
        foreach ($allServices as $service) {
            $photo = Profile::select('profile_photo')->where('user_id', $service->user_id)->first()->profile_photo;
            $user_id = User::select('id')->where('id', $service->user_id)->first();
            $output = '<div class="col-md-6 col-lg-6 col-xl-4  col-sm-6">
            <div class="card">
            <div class="card-body">
                <div class="pro-img-box">
                <div class="d-flex product-sale"><a href="/profile/' . $user_id->id . '"><img class="pr-file" src="http://127.0.0.1:8000/images/Profile/' . $photo . '"></a></div>
                <img class="w-100" src="http://127.0.0.1:8000/images/projects/' . $service->project_photo . '">
                <a  href="http://127.0.0.1:8000/home/services/' . $service->id . '" class="adtocart"><i class="las la-shopping-cart"></i></a>
                </div>
                <div class="text-center pt-3">
                <h3 class="h6 mb-2 mt-4 font-weight-bold text-uppercase">' . $service->project_name . '</h3>
                <span class="tx-15 ml-auto">
                        <i class="ion ion-md-star text-warning"></i>
                        <i class="ion ion-md-star text-warning"></i>
                        <i class="ion ion-md-star text-warning"></i>
                        <i class="ion ion-md-star-half text-warning"></i>
                        <i class="ion ion-md-star-outline text-warning"></i>
                </span>
                <h4 class="h5 mb-0 mt-2 text-center font-weight-bold text-danger">$' . $service->project_price . '</h4>
                </div>
                </div>
                </div>
                </div>';

        }
        return response($output);
    }

    public function insert()
    {
        $user = Auth::user();
        $freelanBol = Profile::select('freelancer')->where('user_id', Auth::id())->first();
        if (!$user->hasVerifiedEmail()) {
            return view('auth.verify');
        } elseif (!$freelanBol->freelancer == 1) {
            return redirect()->to(route('home'))->with(['notFreelancer' => 'Please update your profile to become a freelancer']);
        } else {
            return view('user.insertServices');
        }
    }

    public function store(servicesRequest $request)
    {
        $photo = $this->saveImage($request->service_photo, 'images/projects');
        $service = Project::create([
            'project_name' => $request->service_title,
            'project_photo' => $photo,
            'project_price' => $request->service_price,
            'project_category' => $request->service_cat,
            'project_subcategory' => $request->service_subcat,
            'user_id' => auth()->user()->id,
            'project_description' => $request->service_desc,
            'project_duration' => $request->service_duration,
            'approve_id' => 0,

        ]);
        /*for email notification*/
        $user = auth()->user();
        $service_id = Project::latest()->first()->id;
        //Notification::send($user, new AddServices($service_id));


        /*for admin notification*/
        $USER = User::find(1);
        $SERVICE_ID = Project::latest()->first()->id;
        $USER->notify(new Add_service_new($SERVICE_ID));

        return redirect()->back()->with(['success' => 'Save Successfully']);


    }

    public function getservice($id)
    {
        $project = Project::with('users', 'categories', 'subcategories')->find($id);
        views($project)
            ->cooldown(10)
            ->record();
        $user_id = $project->user_id;
        $profile = User::with('profiles')->find($user_id);
        return view('user.showproject', compact('project', 'profile'));
    }

    public function delete($id)
    {
        $myService = Project::findOrFail($id);
        if ($myService) {
            $myService->delete();
            return redirect()->back()->with(['success' => 'deleted successfully']);

        }
    }

    public function request()
    {
        $freelanBol = Profile::select('freelancer')->where('user_id', Auth::id())->first();
        if (!$freelanBol->freelancer == 1) {
            return redirect()->to(route('home'))->with(['notFreelancer' => 'Please update your profile to become a freelancer']);
        } else {
            return view('user.requestService');
        }

    }

    public function storeRequest(servicesRequest $request)
    {
        $service = SeriveRequest::create([
            'service_name' => $request->service_title,
            'service_price' => $request->service_price,
            'service_category' => $request->service_cat,
            'service_subcategory' => $request->service_subcat,
            'user_id' => auth()->user()->id,
            'service_description' => $request->service_desc,
            'service_duration' => $request->service_duration,
            'approve_id' => 1,

        ]);
//        /*for email notification*/
//        $user = auth()->user();
//        $service_id = Project::latest()->first()->id;
//        Notification::send($user, new AddServices($service_id));


        /*for admin notification*/
        $USER = User::find(1);
        $SERVICE_ID = Project::latest()->first()->id;
        $USER->notify(new Add_service_new($SERVICE_ID));

        return redirect()->back()->with(['success' => 'Save Successfully']);

    }

    public function getAllRequest()
    {
        $services = SeriveRequest::with('users', 'categories', 'subcategories')->orderBy('id','DESC')->get();
        // return $services;
        return view('user.allservicesrequest', compact('services'));
    }

    public function getserviceRequest($id)
    {
        $project = SeriveRequest::with('users', 'categories', 'subcategories')->find($id);
        $user_id = $project->user_id;
        $profile = User::with('profiles')->find($user_id);
        return view('user.showServiceRequest', compact('project', 'profile'));
    }
}
