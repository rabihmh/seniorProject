<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use App\Models\Project;
use App\Models\Subcategory;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    public function specificCat($cat_name)
    {
        $cat_id = Categories::select('id')->where('categories_name', $cat_name)->get()->first();
        //return $cat_id->id;
        $services = Project::with('categories')->where('project_category', $cat_id->id)->paginate(9);
        return view('user.specificServ', compact('services', 'cat_name'));
    }

    /*ajax request*/
    public function getSubCategories($id)
    {
        $data = Subcategory::where('cat_id', $id)->get();
        \Log::info($data);
        return response()->json(['data' => $data]);

    }
}
