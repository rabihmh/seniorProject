<?php

namespace App\Http\Controllers;

use App\Http\Requests\personalProfile;
use App\Models\Profile;
use App\Models\User;
use App\Traits\ImagesTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{
    use ImagesTrait;

    public function myprofile($user)
    {
        $user_id = User::select('id')->where('name', $user)->first();
        $profile = User::with('profiles', 'projects')->where('id', $user_id->id)->first();
        return view('user.myprofile', compact('profile'));

    }

    public function myprofileID($id)
    {
        $profile = User::with('profiles', 'projects')->where('id', $id)->first();
        return view('user.myprofileFORUSER', compact('profile'));

    }

    public function myProfileEdit($user)
    {
        $user_id = User::select('id')->where('name', $user)->first();
        $profile = User::with('profiles', 'projects')->where('id', $user_id->id)->first();
        return view('user.EditProfile', compact('profile'));
    }

    public function storeProfile(personalProfile $request,)
    {

        User::where('id', auth()->user()->id)->update([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
        Profile::where('user_id', auth()->user()->id)->update([
            'profile_resume' => $request->profile_resume
        ]);
        return redirect()->back()->with(['success' => 'Update Successfully']);
    }

    public function EditProfile(Request $request)
    {
        $req_img = $request->profile_photo;
        if (isset($req_img)) {
            $photo = $this->saveImage($request->profile_photo, 'images/Profile');
            Profile::where('user_id', auth()->user()->id)->update([
                'profile_photo' => $photo,]);
        }
        User::where('id', auth()->user()->id)->update([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,

        ]);
        Profile::where('user_id', auth()->user()->id)->update([
            'profile_resume' => $request->profile_resume,
            'freelancer' => $request->freelancer,
            'job_name' => $request->job_name,
            'my_facebook' => $request->my_facebook,
            'my_portfolio' => $request->my_portfolio,
            'my_linkedin' => $request->my_linkedin,
        ]);
        return redirect()->back()->with(['success' => 'Update Successfully']);
    }
}
