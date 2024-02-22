<?php

namespace App\Http\Controllers;

use App\Models\Faq;
use App\Models\Blog;
use App\Models\Page;
use App\Models\Team;
use App\Models\Course;
use App\Models\Patner;
use App\Models\Slider;
use App\Models\Country;
use App\Models\Service;
use App\Models\SocialMedia;
use App\Models\Testimonial;
use App\Models\SuccessStory;
use Illuminate\Http\Request;

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
        $countries = Country::count();
        $courses = Course::count();
        $services = Service::count();
        $blogs = Blog::count();
        $testimonials = Testimonial::count();
        $partners = Patner::count();
        $teams = Team::count();
        $faqs = Faq::count();
        $pages = Page::count();
        $sliders = Slider::count();
        $successstories = SuccessStory::count();
        $socialmedias = SocialMedia::count();
        return view('admin.dashboard', compact('countries', 'courses', 'services', 'blogs', 'testimonials', 'partners', 'teams', 'faqs', 'pages', 'sliders', 'successstories', 'socialmedias'));
    }
}
