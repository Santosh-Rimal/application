<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\FaqController;
use App\Http\Controllers\Admin\TeamControler;
use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Admin\PageController;
use App\Http\Controllers\Admin\PatnerControler;
use App\Http\Controllers\Admin\CourseController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\Admin\CountryController;
use App\Http\Controllers\Admin\InquiryController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\SocialMediaController;
use App\Http\Controllers\Admin\TestimonialController;
use App\Http\Controllers\Admin\SuccessStoryController;

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
// Auth::routes();
Auth::routes(['register' => false]);

Route::get('/', function () {
    return view('auth.login');
});

Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('dashboard');


//CMS routes
Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware' => 'auth'], function () {
    Route::resource('blogs', BlogController::class);
    Route::resource('countries', CountryController::class);
    Route::resource('courses', CourseController::class);
    Route::resource('services', ServiceController::class);
    Route::resource('testimonials', TestimonialController::class);
    Route::resource('faqs', FaqController::class);
    Route::resource('pages', PageController::class);
    Route::resource('partners', PatnerControler::class);
    Route::resource('teams', TeamControler::class);
    Route::resource('socialmedias', SocialMediaController::class);

    Route::resource('sliders', SliderController::class);
    Route::resource('successstories', SuccessStoryController::class);

    Route::get('inquirypersons', [InquiryController::class, 'index'])->name('inquirypersons.index');
    Route::delete('inquirypersons/{inquiryperson}', [InquiryController::class, 'destroy'])->name('inquiries.destroy');


    Route::get('settings', [SettingController::class, 'edit'])->name('settings.index');
    Route::post('settings', [SettingController::class, 'update'])->name('settings.update');
});
