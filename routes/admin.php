<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\ProjectController;
use App\Http\Controllers\Admin\UsersControllers;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('admin/home', [HomeController::class, 'adminHome'])->name('admin.home')->middleware('is_admin');

Route::group(['prefix' => 'admin/', 'middleware' => 'is_admin'], function () {
    Route::get('categories', [App\Http\Controllers\Admin\CategoriesControllers::class, 'getAllCategories'])->name('admin.categories');
    Route::get('categories/insert', [App\Http\Controllers\Admin\CategoriesControllers::class, 'insertCategories'])->name('cat.insert');
    Route::post('categories/store', [App\Http\Controllers\Admin\CategoriesControllers::class, 'storeCategories'])->name('cat.store');
    Route::get('users/', 'App\Http\Controllers\Admin\UsersControllers@getUsers')->name('admin.users');
    Route::get('users/search', 'App\Http\Controllers\Admin\UsersControllers@getUsersSearch')->name('admin.users.search');

    Route::get('users/{id}', 'App\Http\Controllers\Admin\UsersControllers@deleteUsers')->name('user.delete');
    Route::get('profile/{id}', 'App\Http\Controllers\Admin\UsersControllers@getprofile')->name('profile');
    Route::get('projects', [ProjectController::class, 'getAllProject'])->name('admin.projects');
    Route::get('project/{id}', 'App\Http\Controllers\Admin\ProjectController@deleteProject')->name('admin.project.delete');
    Route::get('projectsApp', [ProjectController::class, 'getAllProjectApp'])->name('admin.projectsApprove');
    Route::get('/Approve/{id}', [ProjectController::class, 'approveProject'])->name('project.approve');
    Route::get('/ApproveUser/{id}', [UsersControllers::class, 'approveUser'])->name('user.approve');
    Route::get('projects/{id}', [ProjectController::class, 'getProject'])->name('project.view');
    Route::get('Freelancers', [UsersControllers::class, 'getFreelancers'])->name('admin.freelancers');
    Route::get('/markAsRead', function () {

        App\Models\User::find(1)->unreadNotifications->markAsRead();

        return redirect()->back();

    })->name('mark');

});



