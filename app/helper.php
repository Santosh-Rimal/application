<?php

use App\Models\Blog;
use App\Models\Country;
use App\Models\Course;
use App\Models\Page;
use App\Models\Service;
use App\Models\Setting;

function getSettings()
{
    return Setting::pluck('value', 'key')->toArray();
}

function getCountry()
{
    return Country::where('status', 1)->inRandomOrder()->limit(5)->get();
}

function getCourse()
{
    return Course::where('status', 1)->inRandomOrder()->limit(5)->get();
}

function getServices()
{
    return Service::where('status', 1)->get();
}

function getPages()
{
    return Page::latest()->get();
}

function getBlog()
{
    return Blog::inRandomOrder()->limit(2)->get();
}
