<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CourseClass;
use App\Models\CourseSubject;
use App\Models\DisciplineRule;
use App\Models\CourseSetting;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    // =============================================
    // PAGE SETTINGS
    // =============================================

    public function settingsIndex()
    {
        $settings = array_merge(CourseSetting::defaults(), CourseSetting::getAllSettings());
        return view('admin.courses.settings', compact('settings'));
    }

    public function settingsUpdate(Request $request)
    {
        $request->validate([
            'page_heading'       => 'required|string|max:255',
            'page_subtitle'      => 'nullable|string|max:255',
            'discipline_heading' => 'nullable|string|max:255',
        ]);

        foreach (['page_heading', 'page_subtitle', 'discipline_heading'] as $key) {
            CourseSetting::set($key, $request->input($key) ?? '');
        }

        return response()->json(['success' => true, 'message' => 'Settings saved successfully.']);
    }

    // =============================================
    // COURSE CLASSES CRUD
    // =============================================

    public function classesIndex()
    {
        $classes = CourseClass::with('allSubjects')->orderBy('order')->get();
        return view('admin.courses.classes', compact('classes'));
    }

    public function classStore(Request $request)
    {
        $request->validate([
            'label'  => 'required|string|max:255',
            'icon'   => 'required|string|max:100',
            'color'  => 'required|string|max:20',
            'order'  => 'required|integer|min:0',
            'status' => 'required|in:1,0',
        ]);

        $class = CourseClass::create($request->only('label', 'icon', 'color', 'order', 'status'));

        // Save subjects if provided
        if ($request->has('subjects') && is_array($request->subjects)) {
            foreach (array_filter($request->subjects) as $i => $sub) {
                CourseSubject::create([
                    'course_class_id' => $class->id,
                    'subject_name'    => $sub,
                    'order'           => $i,
                    'status'          => true,
                ]);
            }
        }

        return response()->json(['success' => true, 'message' => 'Class added successfully.', 'id' => $class->id]);
    }

    public function classShow($id)
    {
        $class = CourseClass::with('allSubjects')->findOrFail($id);
        return response()->json(['success' => true, 'data' => $class]);
    }

    public function classUpdate(Request $request, $id)
    {
        $request->validate([
            'label'  => 'required|string|max:255',
            'icon'   => 'required|string|max:100',
            'color'  => 'required|string|max:20',
            'order'  => 'required|integer|min:0',
            'status' => 'required|in:1,0',
        ]);

        $class = CourseClass::findOrFail($id);
        $class->update($request->only('label', 'icon', 'color', 'order', 'status'));

        // Update subjects — delete old, insert new
        if ($request->has('subjects')) {
            $class->allSubjects()->delete();
            foreach (array_filter((array) $request->subjects) as $i => $sub) {
                CourseSubject::create([
                    'course_class_id' => $class->id,
                    'subject_name'    => $sub,
                    'order'           => $i,
                    'status'          => true,
                ]);
            }
        }

        return response()->json(['success' => true, 'message' => 'Class updated successfully.']);
    }

    public function classDestroy($id)
    {
        $class = CourseClass::findOrFail($id);
        $class->allSubjects()->delete();
        $class->delete();
        return response()->json(['success' => true, 'message' => 'Class deleted successfully.']);
    }

    // =============================================
    // DISCIPLINE RULES CRUD
    // =============================================

    public function rulesIndex()
    {
        $rules = DisciplineRule::orderBy('order')->get();
        return view('admin.courses.discipline', compact('rules'));
    }

    public function ruleStore(Request $request)
    {
        $request->validate([
            'rule'   => 'required|string',
            'order'  => 'required|integer|min:0',
            'status' => 'required|in:1,0',
        ]);

        DisciplineRule::create($request->only('rule', 'order', 'status'));
        return response()->json(['success' => true, 'message' => 'Rule added successfully.']);
    }

    public function ruleShow($id)
    {
        $rule = DisciplineRule::findOrFail($id);
        return response()->json(['success' => true, 'data' => $rule]);
    }

    public function ruleUpdate(Request $request, $id)
    {
        $request->validate([
            'rule'   => 'required|string',
            'order'  => 'required|integer|min:0',
            'status' => 'required|in:1,0',
        ]);

        DisciplineRule::findOrFail($id)->update($request->only('rule', 'order', 'status'));
        return response()->json(['success' => true, 'message' => 'Rule updated successfully.']);
    }

    public function ruleDestroy($id)
    {
        DisciplineRule::findOrFail($id)->delete();
        return response()->json(['success' => true, 'message' => 'Rule deleted successfully.']);
    }
}
