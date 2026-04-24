<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AboutUsSetting;
use App\Models\CoreValue;
use Illuminate\Http\Request;

class AboutUsController extends Controller
{
    // =============================================
    // MAIN SETTINGS (heading, paragraphs, stats, image, CTA)
    // =============================================

    public function index()
    {
        $settings = array_merge(AboutUsSetting::defaults(), AboutUsSetting::getAllSettings());
        return view('admin.about_us.settings', compact('settings'));
    }

    public function updateSettings(Request $request)
    {
        $request->validate([
            'tag'            => 'nullable|string|max:100',
            'heading'        => 'required|string|max:255',
            'para1'          => 'required|string',
            'para2'          => 'nullable|string',
            'para3'          => 'nullable|string',
            'image_badge'    => 'nullable|string|max:100',
            'stat1_num'      => 'nullable|string|max:20',
            'stat1_label'    => 'nullable|string|max:100',
            'stat2_num'      => 'nullable|string|max:20',
            'stat2_label'    => 'nullable|string|max:100',
            'stat3_num'      => 'nullable|string|max:20',
            'stat3_label'    => 'nullable|string|max:100',
            'values_heading' => 'nullable|string|max:255',
            'values_subtitle'=> 'nullable|string|max:255',
            'cta_heading'    => 'nullable|string|max:255',
            'cta_text'       => 'nullable|string|max:500',
            'cta_btn_text'   => 'nullable|string|max:100',
            'cta_btn_url'    => 'nullable|string|max:255',
            'image'          => 'nullable|image|mimes:jpeg,png,jpg,webp|max:3072',
        ]);

        $keys = [
            'tag', 'heading', 'para1', 'para2', 'para3', 'image_badge',
            'stat1_num', 'stat1_label', 'stat2_num', 'stat2_label', 'stat3_num', 'stat3_label',
            'values_heading', 'values_subtitle',
            'cta_heading', 'cta_text', 'cta_btn_text', 'cta_btn_url',
        ];

        foreach ($keys as $key) {
            AboutUsSetting::set($key, $request->input($key) ?? '');
        }

        // Handle image upload
        if ($request->hasFile('image')) {
            $img     = $request->file('image');
            $imgName = 'about_' . time() . '.' . $img->getClientOriginalExtension();
            $img->move(public_path('front/img'), $imgName);
            AboutUsSetting::set('image', 'front/img/' . $imgName);
        }

        return response()->json(['success' => true, 'message' => 'About Us settings saved successfully.']);
    }

    // =============================================
    // CORE VALUES CRUD
    // =============================================

    public function valuesIndex()
    {
        $items = CoreValue::orderBy('order')->get();
        return view('admin.about_us.core_values', compact('items'));
    }

    public function valuesStore(Request $request)
    {
        $request->validate([
            'icon'        => 'required|string|max:100',
            'title'       => 'required|string|max:255',
            'description' => 'required|string',
            'order'       => 'required|integer|min:0',
            'status'      => 'required|in:1,0',
        ]);

        CoreValue::create($request->only('icon', 'title', 'description', 'order', 'status'));

        return response()->json(['success' => true, 'message' => 'Core value added successfully.']);
    }

    public function valuesShow($id)
    {
        $item = CoreValue::findOrFail($id);
        return response()->json(['success' => true, 'data' => $item]);
    }

    public function valuesUpdate(Request $request, $id)
    {
        $request->validate([
            'icon'        => 'required|string|max:100',
            'title'       => 'required|string|max:255',
            'description' => 'required|string',
            'order'       => 'required|integer|min:0',
            'status'      => 'required|in:1,0',
        ]);

        CoreValue::findOrFail($id)->update($request->only('icon', 'title', 'description', 'order', 'status'));

        return response()->json(['success' => true, 'message' => 'Core value updated successfully.']);
    }

    public function valuesDestroy($id)
    {
        CoreValue::findOrFail($id)->delete();
        return response()->json(['success' => true, 'message' => 'Core value deleted successfully.']);
    }
}
