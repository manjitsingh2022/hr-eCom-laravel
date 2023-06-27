<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Settings;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function adminIndex()
    {
        $categories = Category::where('parent_id', 0)->get();
        // $products =  Product::all();
        return view('admin.body', compact('categories'));
    }




    public function setting()
    {
        $settings = Settings::all();
        return view('admin.categories.setting', compact('settings'));
    }




    public function settingstore(Request $request)
    {
        $validatedData = $request->validate([
            'setting_key' => 'required|max:255|unique:settings',
            'setting_value' => 'required',
        ]);

        $user = Auth::user();

        if ($user->usertype == 1) {
            $settings = new Settings();
            $settings->setting_key = $validatedData['setting_key'];
            $settings->setting_value = $validatedData['setting_value'];

            $settings->save();

            return redirect()->back()->with('success', 'Settings saved successfully.');
        } else {
            return redirect()->back()->with('error', 'You are not authorized to perform this action.');
        }
    }


    public function destroy(Settings $setting)
    {
        $setting->delete();
        return redirect()->back()->with('success', 'Setting deleted successfully');
    }


    public function edit(Settings $setting)
    {
        return view('admin.categories.settings_update', compact('setting'));
    }


    public function update(Request $request, Settings $setting)
    {
        $validatedData = $request->validate([
            'setting_key' => 'required|max:255|unique:settings,setting_key,' . $setting->id,
            'setting_value' => 'required',
        ]);

        $setting->update($validatedData);

        return redirect()->route('viewsettings')->with('success', 'Setting updated successfully');
    }
}
