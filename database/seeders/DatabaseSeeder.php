<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $items = [
            ['site_main_logo', Null],
            ['site_footer_logo', Null],
            ['fav_icon', null],
            ['site_information', 'Suspendisse non sem ante. Cras pretium gravida leo a convallis. Nam malesuada interdum metus, sit amet dictum ante congue eu. Maecenas ut maximus enim.'],
            ['map', 'https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d7064.975251392001!2d85.3221863!3d27.7022268!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39eb1907be5eca8b%3A0x295dba5f53849f77!2sSeneca%20Education%20Consultancy%20Pvt.%20Ltd.!5e0!3m2!1sen!2snp!4v1683805165859!5m2!1sen!2snp'],
            ['site_copyright', '2022 All right Reserved'],
            ['site_contact', '9841617710'],
            ['site_email', 'info@internship.com.np'],

            ['course_section_title', 'Courses We Offer ?'],
            ['country_section_title', 'Countries We Offer ?'],
            ['blog_section_title', 'Latest Blog & News'],
            ['team_section_title', 'Meet Our Experts'],
            ['testimonial_section_title', 'What Our Client Says'],
            ['faq_section_title', 'Get every single answer here.'],
            ['faq_section_description', 'A business or organization established to provide a particular service, typically one that involves a organizing transactions.'],

            ['homepage_seo_title', 'Rightoption'],
            ['homepage_seo_description', 'Rightoption'],
            ['homepage_seo_keywords', 'Rightoption'],

            ['contact_section_description', 'Fill up the form and we will reach out to you soon'],
            ['contact_seo_title', 'rightoption - Contact'],
            ['contact_seo_keywords', 'rightoption'],
            ['contact_seo_description', 'rightoption rightoption'],
            ['contact_image', null],

            ['countries_seo_title', 'rightoption - countries'],
            ['countries_seo_keywords', 'countries'],
            ['countries_seo_description', 'countries rightoption'],

            ['blogs_seo_title', 'rightoption - blogs'],
            ['blogs_seo_keywords', 'blogs'],
            ['blogs_seo_description', 'blogs rightoption'],

            ['services_seo_title', 'rightoption - services'],
            ['services_seo_keywords', 'services'],
            ['services_seo_description', 'services rightoption'],

            ['courses_seo_title', 'rightoption - courses'],
            ['courses_seo_keywords', 'courses'],
            ['courses_seo_description', 'courses rightoption'],
        ];

        if (count($items)) {
            foreach ($items as $item) {
                \App\Models\Setting::create([
                    'key' => $item[0],
                    'value' => $item[1],
                ]);
            }
        }

        User::create([
            'name' => 'Super Admin',
            'email' => 'admin@rightoption.com',
            'password' => Hash::make('password'),
        ]);
    }
}
