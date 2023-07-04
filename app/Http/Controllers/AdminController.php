<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\Settings;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{
    public function adminIndex()
    {
        $categories = Category::where('parent_id', 0)->get();
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
            $settings->setting_key = preg_replace('/\s+(?=\S)/', '_', $validatedData['setting_key']);
            $settings->setting_value = $validatedData['setting_value'];

            $settings->save();

            return redirect()->back()->with('message', 'Settings saved successfully.');
        } else {
            return redirect()->back()->with('errors', 'You are not authorized to perform this action.');
        }
    }


    public function destroy(Settings $setting)
    {
        $setting->delete();
        return redirect()->back()->with('message', 'Setting deleted successfully');
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

        $user = Auth::user();

        if ($user->usertype == 1) {
            $settingKey = preg_replace('/\s+(?=\S)/', '_', $validatedData['setting_key']);

            if ($settingKey == 'logo') {
                if ($request->hasFile('setting_value')) {
                    $logo = $request->file('setting_value');
                    $logoPath = public_path('logo');
                    $logoName = uniqid() . '_' . $logo->getClientOriginalName();
                    $logo->move($logoPath, $logoName);

                    if ($setting->setting_value) {
                        Storage::disk('public')->delete('logo/' . $setting->setting_value);
                    }

                    $validatedData['setting_value'] = $logoName;
                } else {
                    return redirect()->back()->with('errors', 'Logo file is required.');
                }
            } else {
                $validatedData['setting_value'] = $request->input('setting_value');
            }

            $validatedData['setting_key'] = preg_replace('/\s+(?=\S)/', '_', $validatedData['setting_key']);
            $setting->update($validatedData);

            return redirect()->route('viewsettings')->with('message', 'Setting updated successfully');
        } else {
            return redirect()->back()->with('errors', 'You are not authorized to perform this action.');
        }
    }









    public function search(Request $request)
    {

        $search = $request->input('search');
        $results = Product::where('product_name', 'like', '%' . $search . '%')
            ->orWhere('category_name', 'like', '%' . $search . '%')
            ->get();

        return response()->json(['results' => $results]);
    }


    public function  uploadLogo()
    {
        return view("admin.categories.logoView");
    }

    public function loadLogoStore(Request $request, Settings $setting)
    {
        $user = Auth::user();
        if ($user->usertype == 1) {
            $request->validate([
                'setting_key' => 'required|max:255|unique:settings,setting_key,' . $setting->id,
                'setting_value' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            ]);

            if ($request->hasFile('setting_value')) {
                $logo = $request->file('setting_value');
                $logoPath = public_path('logo');
                $logoName = uniqid() . '_' . $logo->getClientOriginalName();

                if ($setting->setting_value) {
                    Storage::disk('public')->delete($setting->setting_value);
                }

                $logo->move($logoPath, $logoName);

                if ($setting->exists) {

                    if ($setting->setting_key != $request->setting_key) {

                        $duplicateSetting = Settings::where('setting_key', $request->setting_key)->first();
                        if ($duplicateSetting) {
                            return redirect()->back()->withInput()->withErrors(['setting_key' => 'The setting key has already been taken. Please choose a different key.']);
                        }
                    }
                    $setting->update(['setting_key' => $request->setting_key, 'setting_value' => $logoName]);
                } else {
                    Settings::create(['setting_key' => $request->setting_key, 'setting_value' => $logoName]);
                }

                return redirect()->route('viewsettings')->with('message', 'Logo uploaded successfully.');
            }
        }

        return redirect()->route('viewsettings')->with('error', 'You do not have permission to upload a logo.');
    }
}
