<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SiteSetting;
use App\Models\NavMenuItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SiteSettingController extends Controller
{
    // =============================================
    // GENERAL SETTINGS (Header + Footer info)
    // =============================================

    public function index()
    {
        $settings = array_merge(SiteSetting::defaults(), SiteSetting::getAllSettings());
        return view('admin.site_settings.general', compact('settings'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'site_name'          => 'required|string|max:255',
            'site_tagline'       => 'nullable|string|max:255',
            'header_phone'       => 'nullable|string|max:100',
            'header_email'       => 'nullable|email|max:255',
            'footer_description' => 'nullable|string',
            'footer_address'     => 'nullable|string|max:500',
            'footer_phone'       => 'nullable|string|max:100',
            'footer_email'       => 'nullable|email|max:255',
            'footer_copyright'   => 'nullable|string|max:255',
            'social_facebook'    => 'nullable|url|max:255',
            'social_instagram'   => 'nullable|url|max:255',
            'social_youtube'     => 'nullable|url|max:255',
            'social_twitter'     => 'nullable|url|max:255',
            'social_whatsapp'    => 'nullable|string|max:20',
        ]);

        $keys = [
            'site_name', 'site_tagline',
            'header_phone', 'header_email',
            'footer_description', 'footer_address', 'footer_phone', 'footer_email', 'footer_copyright',
            'social_facebook', 'social_instagram', 'social_youtube', 'social_twitter', 'social_whatsapp',
        ];

        foreach ($keys as $key) {
            SiteSetting::set($key, $request->input($key, ''));
        }

        // Handle logo upload
        if ($request->hasFile('logo')) {
            $request->validate(['logo' => 'image|mimes:jpeg,png,jpg,gif|max:2048']);

            $logo = $request->file('logo');
            $logoName = 'logo_' . time() . '.' . $logo->getClientOriginalExtension();
            $logo->move(public_path('front/img'), $logoName);
            SiteSetting::set('logo', 'front/img/' . $logoName);
        }

        return response()->json(['success' => true, 'message' => 'Settings saved successfully.']);
    }

    // =============================================
    // NAV MENU ITEMS
    // =============================================

    public function navIndex()
    {
        $items = NavMenuItem::orderBy('order')->get();
        return view('admin.site_settings.nav_menu', compact('items'));
    }

    public function navStore(Request $request)
    {
        $request->validate([
            'label'  => 'required|string|max:100',
            'url'    => 'required|string|max:255',
            'route'  => 'nullable|string|max:100',
            'target' => 'required|in:_self,_blank',
            'order'  => 'required|integer|min:0',
            'status' => 'required|in:1,0',
        ]);

        NavMenuItem::create($request->only('label', 'url', 'route', 'target', 'order', 'status'));

        return response()->json(['success' => true, 'message' => 'Menu item added successfully.']);
    }

    public function navShow($id)
    {
        $item = NavMenuItem::findOrFail($id);
        return response()->json(['success' => true, 'data' => $item]);
    }

    public function navUpdate(Request $request, $id)
    {
        $request->validate([
            'label'  => 'required|string|max:100',
            'url'    => 'required|string|max:255',
            'route'  => 'nullable|string|max:100',
            'target' => 'required|in:_self,_blank',
            'order'  => 'required|integer|min:0',
            'status' => 'required|in:1,0',
        ]);

        $item = NavMenuItem::findOrFail($id);
        $item->update($request->only('label', 'url', 'route', 'target', 'order', 'status'));

        return response()->json(['success' => true, 'message' => 'Menu item updated successfully.']);
    }

    public function navDestroy($id)
    {
        NavMenuItem::findOrFail($id)->delete();
        return response()->json(['success' => true, 'message' => 'Menu item deleted successfully.']);
    }
}
