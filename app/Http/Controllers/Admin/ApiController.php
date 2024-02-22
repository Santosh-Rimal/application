<?php

namespace App\Http\Controllers\Admin;

use App\Models\Faq;
use App\Models\Blog;
use App\Models\Page;
use App\Models\Team;
use App\Models\Course;
use App\Models\Patner;
use App\Models\Slider;
use App\Models\Country;
use App\Models\Inquiry;
use App\Models\Service;
use App\Models\SocialMedia;
use App\Models\Testimonial;
use App\Models\SuccessStory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Support\Facades\Validator;

class ApiController extends Controller
{
    public function countryIndex()
    {
        try {
            $countries = Country::oldest('order')->get();
            foreach ($countries as $country) {
                $country['image'] = asset('admin/assets/img/country/' . $country->image);
            }
            return response()->json([
                "statusCode" => 200,
                "error" => false,
                "data" => $countries,
                'message' => 'Retrieved successfully'
            ]);
        } catch (\Exception $e) {
            return response()->json(['statusCode' => 401, 'error' => true, 'message' => $e->getMessage()]);
        }
    }

    public function countrySingle($slug)
    {
        try {
            $country = Country::where('slug', $slug)->first();
            $country['image'] = asset('admin/assets/img/country/' . $country->image);


            return response()->json([
                "statusCode" => 200,
                "error" => false,
                "data" => $country,
                'message' => 'Retrieved successfully'
            ]);
        } catch (\Exception $e) {
            return response()->json(['statusCode' => 401, 'error' => true, 'message' => $e->getMessage()]);
        }
    }


    public function courseIndex()
    {
        try {
            $courses = Course::oldest('order')->get();
            foreach ($courses as $course) {
                $course['image'] = asset('admin/assets/img/course/' . $course->image);
            }
            return response()->json([
                "statusCode" => 200,
                "error" => false,
                "data" => $courses,
                'message' => 'Retrieved successfully'
            ]);
        } catch (\Exception $e) {
            return response()->json(['statusCode' => 401, 'error' => true, 'message' => $e->getMessage()]);
        }
    }

    public function courseSingle($slug)
    {
        try {
            $course = Course::where('slug', $slug)->first();
            $course['image'] = asset('admin/assets/img/course/' . $course->image);

            return response()->json([
                "statusCode" => 200,
                "error" => false,
                "data" => $course,
                'message' => 'Retrieved successfully'
            ]);
        } catch (\Exception $e) {
            return response()->json(['statusCode' => 401, 'error' => true, 'message' => $e->getMessage()]);
        }
    }

    public function serviceIndex()
    {
        try {
            $services = Service::oldest('order')->get();
            foreach ($services as $service) {
                $service['image'] = asset('admin/assets/img/service/' . $service->image);
            }
            return response()->json([
                "statusCode" => 200,
                "error" => false,
                "data" => $services,
                'message' => 'Retrieved successfully'
            ]);
        } catch (\Exception $e) {
            return response()->json(['statusCode' => 401, 'error' => true, 'message' => $e->getMessage()]);
        }
    }


    public function serviceSingle($slug)
    {
        try {
            $service = Service::where('slug', $slug)->first();
            $service['image'] = asset('admin/assets/img/service/' . $service->image);

            return response()->json([
                "statusCode" => 200,
                "error" => false,
                "data" => $service,
                'message' => 'Retrieved successfully'
            ]);
        } catch (\Exception $e) {
            return response()->json(['statusCode' => 401, 'error' => true, 'message' => $e->getMessage()]);
        }
    }


    public function blogIndex()
    {
        try {
            $blogs = Blog::latest()->get();
            foreach ($blogs as $blog) {
                $blog['image'] = asset('admin/assets/img/blog/' . $blog->image);
            }
            return response()->json([
                "statusCode" => 200,
                "error" => false,
                "data" => $blogs,
                'message' => 'Retrieved successfully'
            ]);
        } catch (\Exception $e) {
            return response()->json(['statusCode' => 401, 'error' => true, 'message' => $e->getMessage()]);
        }
    }

    public function blogSingle($slug)
    {
        try {
            $blog = Blog::where('slug', $slug)->first();
            $blog['image'] = asset('admin/assets/img/blog/' . $blog->image);
            return response()->json([
                "statusCode" => 200,
                "error" => false,
                "data" => $blog,
                'message' => 'Retrieved successfully'
            ]);
        } catch (\Exception $e) {
            return response()->json(['statusCode' => 401, 'error' => true, 'message' => $e->getMessage()]);
        }
    }

    public function testimonialIndex()
    {
        try {
            $testimonials = Testimonial::oldest('order')->get();
            foreach ($testimonials as $testimonial) {
                $testimonial['image'] = asset('admin/assets/img/testimonial/' . $testimonial->image);
            }
            return response()->json([
                "statusCode" => 200,
                "error" => false,
                "data" => $testimonials,
                'message' => 'Retrieved successfully'
            ]);
        } catch (\Exception $e) {
            return response()->json(['statusCode' => 401, 'error' => true, 'message' => $e->getMessage()]);
        }
    }



    public function partnerIndex()
    {
        try {
            $partners = Patner::oldest('order')->get();
            foreach ($partners as $partner) {
                $partner['image'] = asset('admin/assets/img/partners/' . $partner->image);
            }
            return response()->json([
                "statusCode" => 200,
                "error" => false,
                "data" => $partners,
                'message' => 'Retrieved successfully'
            ]);
        } catch (\Exception $e) {
            return response()->json(['statusCode' => 401, 'error' => true, 'message' => $e->getMessage()]);
        }
    }

    public function teamIndex()
    {
        try {
            $teams = Team::oldest('order')->get();
            foreach ($teams as $team) {
                $team['image'] = asset('admin/assets/img/teams/' . $team->image);
            }
            return response()->json([
                "statusCode" => 200,
                "error" => false,
                "data" => $teams,
                'message' => 'Retrieved successfully'
            ]);
        } catch (\Exception $e) {
            return response()->json(['statusCode' => 401, 'error' => true, 'message' => $e->getMessage()]);
        }
    }


    public function faqIndex()
    {
        try {
            $faqs = Faq::oldest('order')->get();
            return response()->json([
                "statusCode" => 200,
                "error" => false,
                "data" => $faqs,
                'message' => 'Retrieved successfully'
            ]);
        } catch (\Exception $e) {
            return response()->json(['statusCode' => 401, 'error' => true, 'message' => $e->getMessage()]);
        }
    }


    public function pageIndex()
    {
        try {
            $pages = Page::oldest('order')->get();
            foreach ($pages as $page) {
                $page['image'] = asset('admin/assets/img/page/' . $page->image);
            }
            return response()->json([
                "statusCode" => 200,
                "error" => false,
                "data" => $pages,
                'message' => 'Retrieved successfully'
            ]);
        } catch (\Exception $e) {
            return response()->json(['statusCode' => 401, 'error' => true, 'message' => $e->getMessage()]);
        }
    }

    public function pageSingle($slug)
    {
        try {
            $page = Page::where('slug', $slug)->first();

            $page['image'] = asset('admin/assets/img/page/' . $page->image);
            return response()->json([
                "statusCode" => 200,
                "error" => false,
                "data" => $page,
                'message' => 'Retrieved successfully'
            ]);
        } catch (\Exception $e) {
            return response()->json(['statusCode' => 401, 'error' => true, 'message' => $e->getMessage()]);
        }
    }


    public function sliderIndex()
    {
        try {
            $sliders = Slider::oldest('order')->get();
            foreach ($sliders as $slider) {
                $slider['image'] = asset('admin/assets/img/slider/' . $slider->image);
            }

            return response()->json([
                "statusCode" => 200,
                "error" => false,
                "data" => $sliders,
                'message' => 'Retrieved successfully'
            ]);
        } catch (\Exception $e) {
            return response()->json(['statusCode' => 401, 'error' => true, 'message' => $e->getMessage()]);
        }
    }


    public function socialmediaIndex()
    {
        try {
            $socialmedias = SocialMedia::oldest('order')->get();
            foreach ($socialmedias as $socialmedia) {
                $socialmedia['image'] = asset('admin/assets/img/socialmedia/' . $socialmedia->image);
            }

            return response()->json([
                "statusCode" => 200,
                "error" => false,
                "data" => $socialmedias,
                'message' => 'Retrieved successfully'
            ]);
        } catch (\Exception $e) {
            return response()->json(['statusCode' => 401, 'error' => true, 'message' => $e->getMessage()]);
        }
    }



    public function successstoryIndex()
    {
        try {
            $successstories = SuccessStory::oldest('order')->get();
            foreach ($successstories as $successstory) {
                $successstory['image'] = asset('admin/assets/img/successstory/' . $successstory->image);
            }

            return response()->json([
                "statusCode" => 200,
                "error" => false,
                "data" => $successstories,
                'message' => 'Retrieved successfully'
            ]);
        } catch (\Exception $e) {
            return response()->json(['statusCode' => 401, 'error' => true, 'message' => $e->getMessage()]);
        }
    }


    public function indexInquiry(Request $request)
    {
        try {
            $validation = Validator::make($request->all(), [
                'name' => 'required',
                'email' => 'email|required',
                'phone' => 'numeric|required',
                'message' => 'required',
            ]);


            if ($validation->fails()) {
                return response()->json(['statusCode' => 401, 'error' => true, 'error_message' => $validation->errors(), 'message' => 'Please fill the input field properly']);
            }
            Inquiry::create($request->all());
            return response()->json([
                "statusCode" => 200,
                "error" => false,
                'message' => 'Thank you, your enquiry has been submitted successfully'
            ]);
        } catch (\Exception $e) {
            return response()->json(['statusCode' => 401, 'error' => true, 'message' => $e->getMessage()]);
        }
    }

    public function settings()
    {
        try {
            $settings = Setting::pluck('value', 'key');

            if ($settings['site_main_logo']) {
                $settings['site_main_logo'] = asset('admin/images/setting/' . $settings['site_main_logo']);
            }

            if ($settings['site_footer_logo']) {
                $settings['site_footer_logo'] = asset('admin/images/setting/' . $settings['site_footer_logo']);
            }

            if ($settings['fav_icon']) {
                $settings['fav_icon'] = asset('admin/images/setting/' . $settings['fav_icon']);
            }


            if ($settings['contact_image']) {
                $settings['contact_image'] = asset('admin/images/setting/' . $settings['contact_image']);
            }

            return response()->json([
                "statusCode" => 200,
                "error" => false,
                "data" => $settings,
                'message' => 'Retrieved successfully'
            ]);
        } catch (\Exception $e) {
            return response()->json(['statusCode' => 401, 'error' => true, 'message' => $e->getMessage()]);
        }
    }
}