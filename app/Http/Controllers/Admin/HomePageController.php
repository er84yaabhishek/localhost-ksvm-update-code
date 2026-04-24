<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\HomePageSetting;
use App\Models\WhyChooseUs;
use App\Models\WhatWeProvide;
use App\Models\OurStrength;
use Illuminate\Http\Request;

class HomePageController extends Controller
{
    // =============================================
    // HERO SECTION
    // =============================================

    public function heroIndex()
    {
        $settings = HomePageSetting::getAllSettings();
        return view('admin.homepage.hero', compact('settings'));
    }

    public function heroUpdate(Request $request)
    {
        $request->validate([
            'hero_title'       => 'required|string|max:255',
            'hero_tagline'     => 'required|string',
            'hero_description' => 'required|string',
            'hero_btn1_text'   => 'nullable|string|max:100',
            'hero_btn1_url'    => 'nullable|string|max:255',
            'hero_btn2_text'   => 'nullable|string|max:100',
            'hero_btn2_url'    => 'nullable|string|max:255',
        ]);

        $keys = [
            'hero_title', 'hero_tagline', 'hero_description',
            'hero_btn1_text', 'hero_btn1_url',
            'hero_btn2_text', 'hero_btn2_url',
        ];

        foreach ($keys as $key) {
            HomePageSetting::set($key, $request->input($key, ''));
        }

        return response()->json(['success' => true, 'message' => 'Hero section updated successfully.']);
    }

    // =============================================
    // WHY CHOOSE US
    // =============================================

    public function whyChooseIndex()
    {
        $items = WhyChooseUs::orderBy('order')->get();
        return view('admin.homepage.why_choose_us', compact('items'));
    }

    public function whyChooseStore(Request $request)
    {
        $request->validate([
            'title'       => 'required|string|max:255',
            'description' => 'required|string',
            'order'       => 'required|integer|min:0',
            'status'      => 'required|in:1,0',
        ]);

        WhyChooseUs::create([
            'title'       => $request->title,
            'description' => $request->description,
            'order'       => $request->order,
            'status'      => $request->status,
        ]);

        return response()->json(['success' => true, 'message' => 'Item added successfully.']);
    }

    public function whyChooseShow($id)
    {
        $item = WhyChooseUs::findOrFail($id);
        return response()->json(['success' => true, 'data' => $item]);
    }

    public function whyChooseUpdate(Request $request, $id)
    {
        $request->validate([
            'title'       => 'required|string|max:255',
            'description' => 'required|string',
            'order'       => 'required|integer|min:0',
            'status'      => 'required|in:1,0',
        ]);

        $item = WhyChooseUs::findOrFail($id);
        $item->update([
            'title'       => $request->title,
            'description' => $request->description,
            'order'       => $request->order,
            'status'      => $request->status,
        ]);

        return response()->json(['success' => true, 'message' => 'Item updated successfully.']);
    }

    public function whyChooseDestroy($id)
    {
        WhyChooseUs::findOrFail($id)->delete();
        return response()->json(['success' => true, 'message' => 'Item deleted successfully.']);
    }

    // =============================================
    // WHAT WE PROVIDE
    // =============================================

    public function whatWeProvideIndex()
    {
        $items = WhatWeProvide::orderBy('order')->get();
        return view('admin.homepage.what_we_provide', compact('items'));
    }

    public function whatWeProvideStore(Request $request)
    {
        $request->validate([
            'title'       => 'required|string|max:255',
            'description' => 'required|string',
            'order'       => 'required|integer|min:0',
            'status'      => 'required|in:1,0',
        ]);

        WhatWeProvide::create([
            'title'       => $request->title,
            'description' => $request->description,
            'order'       => $request->order,
            'status'      => $request->status,
        ]);

        return response()->json(['success' => true, 'message' => 'Item added successfully.']);
    }

    public function whatWeProvideShow($id)
    {
        $item = WhatWeProvide::findOrFail($id);
        return response()->json(['success' => true, 'data' => $item]);
    }

    public function whatWeProvideUpdate(Request $request, $id)
    {
        $request->validate([
            'title'       => 'required|string|max:255',
            'description' => 'required|string',
            'order'       => 'required|integer|min:0',
            'status'      => 'required|in:1,0',
        ]);

        $item = WhatWeProvide::findOrFail($id);
        $item->update([
            'title'       => $request->title,
            'description' => $request->description,
            'order'       => $request->order,
            'status'      => $request->status,
        ]);

        return response()->json(['success' => true, 'message' => 'Item updated successfully.']);
    }

    public function whatWeProvideDestroy($id)
    {
        WhatWeProvide::findOrFail($id)->delete();
        return response()->json(['success' => true, 'message' => 'Item deleted successfully.']);
    }

    // =============================================
    // OUR STRENGTH
    // =============================================

    public function strengthIndex()
    {
        $items = OurStrength::orderBy('order')->get();
        return view('admin.homepage.our_strength', compact('items'));
    }

    public function strengthStore(Request $request)
    {
        $request->validate([
            'title'       => 'required|string|max:255',
            'description' => 'required|string',
            'order'       => 'required|integer|min:0',
            'status'      => 'required|in:1,0',
        ]);

        OurStrength::create([
            'title'       => $request->title,
            'description' => $request->description,
            'order'       => $request->order,
            'status'      => $request->status,
        ]);

        return response()->json(['success' => true, 'message' => 'Item added successfully.']);
    }

    public function strengthShow($id)
    {
        $item = OurStrength::findOrFail($id);
        return response()->json(['success' => true, 'data' => $item]);
    }

    public function strengthUpdate(Request $request, $id)
    {
        $request->validate([
            'title'       => 'required|string|max:255',
            'description' => 'required|string',
            'order'       => 'required|integer|min:0',
            'status'      => 'required|in:1,0',
        ]);

        $item = OurStrength::findOrFail($id);
        $item->update([
            'title'       => $request->title,
            'description' => $request->description,
            'order'       => $request->order,
            'status'      => $request->status,
        ]);

        return response()->json(['success' => true, 'message' => 'Item updated successfully.']);
    }

    public function strengthDestroy($id)
    {
        OurStrength::findOrFail($id)->delete();
        return response()->json(['success' => true, 'message' => 'Item deleted successfully.']);
    }
}
