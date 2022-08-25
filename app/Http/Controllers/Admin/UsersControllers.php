<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Profile;
use App\Models\Project;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersControllers extends Controller
{
    public function getUsers(Request $request)
    {
        $users = User::where('is_admin', 0)->with('profiles')->paginate(25);
        return view('Admin.users', compact('users'));

//        if ($request->ajax()) {
//            $query = $request->get('str');
//            if ($query != '') {
//                $data = User::where('is_admin', 0)->with('profiles')
//                    ->where('name', 'like', '%' . $query . '%')
//                    ->orWhere('email', 'like', '%' . $query . '%')
//                    ->orWhere('profiles->profile_photo', 'like', '%' . $query . '%')
//                    ->orWhere('profiles->job_name', 'like', '%' . $query . '%')
//                    ->orderBy('id', 'desc')
//                    ->get();
//            } else {
//                $data = User::where('is_admin', 0)->with('profiles')
//                    ->orderBy('id', 'desc')
//                    ->get();
//            }
//            $total_row = $data->count();
//            //echo json_encode($data);
//            //return response()->json(['data' => $data]);
//            return view('Admin.users', compact('data', 'total_row'));
//        }
    }

    public function getUsersSearch(Request $request)
    {
        $output = '';
        $query = $request->search;
        $data = User::select('*')->where('is_admin', 0)->with('profiles')
            ->where('name', 'like', '%' . $query . '%')
            ->orWhere('email', 'like', '%' . $query . '%')
            ->orWhereHas('profiles', function ($q) use ($request) {
                $query = $request->search;
                $q->where('job_name', 'like', '%' . $query . '%');
            })
            ->orderBy('id', 'desc')
            ->get();
        foreach ($data as $row) {
            $output .= '<tr>
         <td><img class="rounded-circle avatar-md mr-2"src="http://127.0.0.1:8000/images/Profile/' . $row->profiles->profile_photo . '"></td>
         <td>' . $row->name . '</td>
         <td>' . $row->profiles->job_name . '</td>
         <td>' . $row->created_at->format('Y-m-d') . '</td>
         <td>' . $row->email . '</td>
         <td>' . '<a href="/profile/' . $row->id . '"' . ' class="btn btn-primary">' . '<i class="las la-search"></i>' . '</a>
                  <a href="/users/' . $row->id . '" class="btn btn-danger">' . '<i class="las la-trash"></i>' . '</a>
         ' . '</td>

        </tr>';
        }
        return response($output);
    }


    public function getProfile($id)
    {
        User::findOrFail($id);
        $profile = User::with('profiles', 'projects')->find($id);
        //return $profile;
        return view('Admin.showProfile', compact('profile'));
    }

    public function approveUser($id)
    {
        $user = User::find($id);
        if (!$user)
            return redirect()->back()->with(['failed' => 'User not found']);

        DB::table('users')
            ->where('id', $id)
            ->update([
                'approve_Id' => 1
            ]);
        return redirect()->back()->with(['success' => 'Approve Successfully']);
    }

    public function deleteUsers($id)
    {
        $user = User::find($id);
        if (!$user)
            return redirect()->back()->with(['failed' => 'user not found']);
        $user->delete();
        return redirect()->route('admin.users')->with(['success' => 'deleted successfully']);

    }

    public function getFreelancers()
    {


        $freelancers = User::with('profiles')->where('is_admin', 0)->WhereHas('profiles', function ($q) {
            $q->where('freelancer', 1);
        })->paginate(1);
        return view('admin.freelancers', compact('freelancers'));
    }


}
