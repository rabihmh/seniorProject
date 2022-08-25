<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FreelancerController extends Controller
{
    public function getFreelancers()
    {
        $freelancers = User::with('profiles')->where('is_admin', 0)->WhereHas('profiles', function ($q) {
            $q->where('freelancer', 1);
        })->paginate(9);
        return view('user.freelancers', compact('freelancers'));
    }

    public function becomeFreelancer()
    {
        Profile::where('user_id', Auth::id())->update([
            'freelancer' => 1
        ]);
        return redirect()->to('home');
    }
}
