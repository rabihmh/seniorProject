<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\categoriesRequest;
use App\Http\Controllers\Controller;
use App\Models\Categories;
use App\Traits\ImagesTrait;

class CategoriesControllers extends Controller
{
    use ImagesTrait;

    public function getAllCategories()
    {
        $categories = Categories::select()->get();
        return view('Admin.categories', compact('categories'));
    }

    public function insertCategories()
    {
        return view('Admin.insertCategories');
    }

    public function storeCategories(categoriesRequest $request)
    {
        $filename = $this->saveImage($request->photo, 'images/categories');
        Categories::create([
            'categories_name' => $request->cat_name,
            'categories_photo' => $filename,
        ]);
        return redirect()->back()->withInput()->with(['success' => 'Categories Inserted Successfully']);

    }

}
