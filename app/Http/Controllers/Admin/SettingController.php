<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;
use File;

class SettingController extends Controller
{
    public function edit()
    {
        $settings = Setting::pluck('value', 'key');
        return view('admin.setting.edit', compact('settings'));
    }

    public function update(Request $request, Setting $setting)
    {
        $siteSettings = Setting::pluck('value', 'key');

        $old_main_logo = $siteSettings['site_main_logo'];
        $old_footer_logo = $siteSettings['site_footer_logo'];
        $old_fav_icon = $siteSettings['fav_icon'];
        $old_contact_image = $siteSettings['contact_image'];

        $input = $request->all();
        $site_main_logo = $this->fileUpload($request, 'site_main_logo');
        $site_footer_logo = $this->fileUpload($request, 'site_footer_logo');
        $fav_icon = $this->fileUpload($request, 'fav_icon');
        $contact_image = $this->fileUpload($request, 'contact_image');


        //delete old file
        if ($site_main_logo) {
            $this->removeFile($old_main_logo);
            $input['site_main_logo'] = $site_main_logo;
        } else {
            unset($input['site_main_logo']);
        }

        if ($site_footer_logo) {
            $this->removeFile($old_footer_logo);
            $input['site_footer_logo'] = $site_footer_logo;
        } else {
            unset($input['site_footer_logo']);
        }

        if ($contact_image) {
            $this->removeFile($old_contact_image);
            $input['contact_image'] = $contact_image;
        } else {
            unset($input['contact_image']);
        }

        if ($fav_icon) {
            $this->removeFile($old_fav_icon);
            $input['fav_icon'] = $fav_icon;
        } else {
            unset($input['fav_icon']);
        }
        //end

        foreach ($input as $key => $value) {
            $setting->updateOrCreate(['key' => $key,], [
                'key' => $key,
                'value' => $value,
            ]);
        }
        return redirect()->back()->with('message', 'Setting Updated Successfully');
    }


    public function fileUpload(Request $request, $name)
    {
        $imageName = '';
        if ($image = $request->file($name)) {
            $destinationPath = public_path() . '/admin/images/setting';
            $imageName = date('YmdHis') . $name . "-" . $image->getClientOriginalName();
            $image->move($destinationPath, $imageName);
            $image = $imageName;
            return $imageName;
        } else {
            return null;
        }
    }

    public function removeFile($file)
    {
        $path = public_path() . '/admin/images/setting/' . $file;
        if (File::exists($path)) {
            File::delete($path);
        }
    }
}
