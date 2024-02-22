<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\ApiController;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('countries', [ApiController::class, 'countryIndex']);
Route::get('country/{slug}', [ApiController::class, 'countrySingle']);

Route::get('courses', [ApiController::class, 'courseIndex']);
Route::get('course/{slug}', [ApiController::class, 'courseSingle']);

Route::get('services', [ApiController::class, 'serviceIndex']);
Route::get('service/{slug}', [ApiController::class, 'serviceSingle']);

Route::get('blogs', [ApiController::class, 'blogIndex']);
Route::get('blog/{slug}', [ApiController::class, 'blogSingle']);

Route::get('testimonials', [ApiController::class, 'testimonialIndex']);
Route::get('partners', [ApiController::class, 'partnerIndex']);
Route::get('teams', [ApiController::class, 'teamIndex']);
Route::get('faqs', [ApiController::class, 'faqIndex']);

Route::get('pages', [ApiController::class, 'pageIndex']);
Route::get('page/{slug}', [ApiController::class, 'pageSingle']);

Route::get('sliders', [ApiController::class, 'sliderIndex']);

Route::get('socialmedias', [ApiController::class, 'socialmediaIndex']);

Route::get('successstories', [ApiController::class, 'successstoryIndex']);

Route::post('inquiries', [ApiController::class, 'indexInquiry']);

//settings
Route::get('settings', [ApiController::class, 'settings'])->name('settings');
