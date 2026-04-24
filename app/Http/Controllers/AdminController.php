<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Gallery;
use App\Models\Event;
use App\Models\Admission;
use App\Models\Exam;
use Spatie\Image\Image;
use Spatie\Image\Manipulations;
use Illuminate\Support\Str; // Add this line to import the Str facade

use App\Models\Contact;
use App\Models\AdmissionContact;
use App\Models\Registration;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{
    public function dashboardpage()
    {
        // Total Contact Us Inquiry
        $contact = Contact::count();
        // Total Admission Inquiry
        $admission = Admission::count();
        // Total Event Inquiry
        $event = Event::count();
        // Total Gallery Inquiry
        $gallery = Gallery::count();
        // Total Admission Contact Inquiry
        $admissionContact = AdmissionContact::count();
        return view('admin.dashboard', compact('contact', 'admission', 'event', 'gallery', 'admissionContact'));
    }
    public function editpage()
    {
        return view('admin.edit');
    }
    public function changepasspage()
    {
        return view('admin.changepass');
    }
    public function logoutpage()
    {
        echo "this is logout";
    }

    // Site Setting Methods
    public function gallerypage()
    {
        $gallery = Gallery::all();
        return view('admin.gallery.gallery', compact('gallery'));
    }

    public function gallerystorepage(Request $request)
    {
        $request->validate([
            'gallery_image' => 'required|image|mimes:jpeg,png,jpg,gif|max:5120',
            'title'         => 'required|string|max:255',
            'youtube_url'   => 'nullable|url|max:500',
        ]);

        try {
            $image     = $request->file('gallery_image');
            $ext       = strtolower($image->getClientOriginalExtension());
            $imageName = time() . '_' . uniqid() . '.jpg';
            $savePath  = public_path('images/' . $imageName);

            switch ($ext) {
                case 'jpg':
                case 'jpeg':
                    $source = imagecreatefromjpeg($image->getRealPath());
                    break;
                case 'png':
                    $source = imagecreatefrompng($image->getRealPath());
                    break;
                case 'gif':
                    $source = imagecreatefromgif($image->getRealPath());
                    break;
                default:
                    if ($request->expectsJson()) {
                        return response()->json(['message' => 'Unsupported image type: ' . $ext], 422);
                    }
                    return back()->withErrors(['gallery_image' => 'Unsupported image type.'])->withInput();
            }

            if (!$source) {
                if ($request->expectsJson()) {
                    return response()->json(['message' => 'Could not process image.'], 422);
                }
                return back()->withErrors(['gallery_image' => 'Could not process image.'])->withInput();
            }

            list($width, $height) = getimagesize($image->getRealPath());
            $targetWidth  = min($width, 1200);
            $targetHeight = (int) ($height * ($targetWidth / $width));

            $resized = imagecreatetruecolor($targetWidth, $targetHeight);
            $white   = imagecolorallocate($resized, 255, 255, 255);
            imagefill($resized, 0, 0, $white);
            imagecopyresampled($resized, $source, 0, 0, 0, 0, $targetWidth, $targetHeight, $width, $height);
            imagejpeg($resized, $savePath, 85);
            imagedestroy($source);
            imagedestroy($resized);

            $data              = new Gallery();
            $data->image       = $imageName;
            $data->youtube_url = $request->youtube_url ?? null;
            $data->status      = true;
            $data->slug        = Str::slug($request->title) . '-' . time();
            $data->title       = $request->title;
            $data->description = $request->description ?? '';
            $data->save();

            if ($request->expectsJson()) {
                return response()->json(['success' => 'Image uploaded successfully.', 'url' => route('admin.gallery')]);
            }
            return redirect()->route('admin.gallery')->with('success', 'Gallery image added successfully!');

        } catch (\Exception $e) {
            if ($request->expectsJson()) {
                return response()->json(['message' => 'Upload failed: ' . $e->getMessage()], 500);
            }
            return back()->withErrors(['gallery_image' => 'Upload failed: ' . $e->getMessage()])->withInput();
        }
    }

    public function galleryeditpage($id)
    {
        $gallery = Gallery::find($id);
        return view('admin.gallery.galleryedit', compact('gallery'));
    }

    public function galleryupdatepage(Request $request, $id)
    {
        // $request->validate([
        //     'gallery_video' => 'nullable|mimes:mp4,mov,avi,wmv,flv,mkv|max:51200', // Max 50MB
        // ]);

        $image = $request->file('gallery_image');
        $gallery = Gallery::find($id);
        if ($image) {
            $image_path = public_path('images/' . $gallery->image);
            if (file_exists($image_path)) {
                unlink($image_path);
            }
            $ext = strtolower($image->getClientOriginalExtension());
            $imageName = time() . '.' . $ext;
            $savePath = public_path('images/' . $imageName);

            // Target size
            $targetWidth = 1780;
            $targetHeight = 800;

            // Load original image using GD
            switch ($ext) {
                case 'jpg':
                case 'jpeg':
                    $source = imagecreatefromjpeg($image->getRealPath());
                    break;
                case 'png':
                    $source = imagecreatefrompng($image->getRealPath());
                    break;
                case 'gif':
                    $source = imagecreatefromgif($image->getRealPath());
                    break;
                default:
                    return response()->json(['error' => 'Unsupported image type']);
            }

            list($width, $height) = getimagesize($image->getRealPath());

            // Create blank resized canvas
            $resized = imagecreatetruecolor($targetWidth, $targetHeight);

            // Maintain transparency for PNG & GIF
            if ($ext == 'png' || $ext == 'gif') {
                imagecolortransparent($resized, imagecolorallocatealpha($resized, 0, 0, 0, 127));
                imagealphablending($resized, false);
                imagesavealpha($resized, true);
            }

            // Resize original → new size
            imagecopyresampled(
                $resized,
                $source,
                0,
                0,
                0,
                0,
                $targetWidth,
                $targetHeight,
                $width,
                $height
            );

            // Save image
            if ($ext == 'jpg' || $ext == 'jpeg') {
                imagejpeg($resized, $savePath, 90);
            } elseif ($ext == 'png') {
                imagepng($resized, $savePath);
            } elseif ($ext == 'gif') {
                imagegif($resized, $savePath);
            }

            // Cleanup
            imagedestroy($source);
            imagedestroy($resized);

            $gallery->image = $imageName;
        }

        // Handle video upload
        if ($request->hasFile('gallery_video')) {
            // Delete old video if exists
            if ($gallery->video) {
                $oldVideoPath = public_path('images/' . $gallery->video);
                if (file_exists($oldVideoPath)) {
                    unlink($oldVideoPath);
                }
            }

            $video = $request->file('gallery_video');
            $videoExt = strtolower($video->getClientOriginalExtension());
            $videoName = time() . '_video.' . $videoExt;
            $video->move(public_path('images'), $videoName);
            $gallery->video = $videoName;
        }

        $gallery->status      = true;
        $gallery->slug        = Str::slug($request->title) . '-' . $gallery->id;
        $gallery->title       = $request->title;
        $gallery->description = $request->description ?? '';
        $gallery->youtube_url = $request->youtube_url ?? null;
        $gallery->save();
        return response()->json(['success' => 'Gallery Updated successfully.', 'url' => route('admin.gallery')]);
    }


    public function gallerydeletepage(Request $request)
    {
        $id = $request->id;
        $gallery = Gallery::find($id);

        // Delete image from folder 
        $image_path = public_path('images/' . $gallery->image);
        if (file_exists($image_path)) {
            unlink($image_path);
        }

        // Delete video from folder if exists
        if ($gallery->video) {
            $video_path = public_path('images/' . $gallery->video);
            if (file_exists($video_path)) {
                unlink($video_path);
            }
        }

        $gallery->delete();
        return response()->json(['success' => 'Gallery item deleted successfully.', 'url' => route('admin.gallery')]);
    }

    public function galleryaddpage()
    {
        return view('admin.gallery.galleryadd');
    }

    public function updatesnewspage()
    {
        return view('admin.updatesnews');
    }

    public function admissionpage()
    {
        $admission = Admission::all();
        return view('admin.admission.admission_news', compact('admission'));
    }

    public function admissionaddpage()
    {
        return view('admin.admission.admission_add_news');
    }
    public function admissionstorepage(Request $request)
    {
        // Validate the request data
        $request->validate([
            'admission_for' => 'required|string|max:255',
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'status' => 'required|string',
            'priority' => 'required|integer|min:1|max:10',
        ]);

        // Create a new Admission record
        $admission = new Admission();
        $admission->admission_for = $request->input('admission_for');
        $admission->title = $request->input('title');
        $admission->description = $request->input('description');
        $admission->status = $request->input('status');
        $admission->priority = $request->input('priority');
        $admission->slug = Str::slug($request->input('title'));
        $admission->save();

        return response()->json(['success' => 'Admission news added successfully.', 'url' => route('admin.admission')]);
    }

    public function admissioneditpage($id)
    {
        $admission = Admission::find($id);
        return view('admin.admission.admission_edit_news', compact('admission'));
    }

    public function admissionupdatepage(Request $request, $id)
    {
        $request->validate([
            'admission_for' => 'required|string|max:255',
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'status' => 'required|string',
            'priority' => 'required|integer|min:1|max:10',
        ]);
        $admission = Admission::find($id);
        $admission->admission_for = $request->input('admission_for');
        $admission->title = $request->input('title');
        $admission->description = $request->input('description');
        $admission->status = $request->input('status');
        $admission->priority = $request->input('priority');
        $admission->slug = Str::slug($request->input('title'));
        $admission->save();

        return response()->json(['success' => 'Admission news updated successfully.', 'url' => route('admin.admission')]);
    }

    public function admissiondeletepage(Request $request)
    {
        $id = $request->id;
        $admission = Admission::find($id);
        $admission->delete();
        return response()->json(['success' => 'Admission news deleted successfully.', 'url' => route('admin.admission')]);
    }


    ///// Exam Function

    public function exampage()
    {
        $exam = Exam::all();
        return view('admin.admission.exam_news', compact('exam'));
    }

    public function examaddpage()
    {
        return view('admin.admission.exam_add_news');
    }
    public function examstorepage(Request $request)
    {
        // Validate the request data
        $request->validate([
            'examination_for' => 'required|string|max:255',
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'status' => 'required|string',
            'priority' => 'required|integer|min:1|max:10',
        ]);

        // Create a new Admission record
        $admission = new Exam();
        $admission->exam_for = $request->input('examination_for');
        $admission->title = $request->input('title');
        $admission->description = $request->input('description');
        $admission->status = $request->input('status');
        $admission->priority = $request->input('priority');
        $admission->slug = Str::slug($request->input('title'));
        $admission->save();

        return response()->json(['success' => 'Exam news added successfully.', 'url' => route('admin.exam')]);
    }

    public function exameditpage($id)
    {
        $exam = Exam::find($id);
        return view('admin.admission.exam_edit_news', compact('exam'));
    }

    public function examupdatepage(Request $request, $id)
    {

        $request->validate([
            'examination_for' => 'required|string|max:255',
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'status' => 'required|string',
            'priority' => 'required|integer|min:1|max:10',
        ]);
        $exam = Exam::find($id);
        $exam->exam_for = $request->input('examination_for');
        $exam->title = $request->input('title');
        $exam->description = $request->input('description');
        $exam->status = $request->input('status');
        $exam->priority = $request->input('priority');
        $exam->slug = Str::slug($request->input('title'));
        $exam->save();

        return response()->json(['success' => 'Exam news updated successfully.', 'url' => route('admin.exam')]);
    }

    public function examdeletepage(Request $request)
    {
        $id = $request->id;
        $exam = Exam::find($id);
        $exam->delete();
        return response()->json(['success' => 'Exam news deleted successfully.', 'url' => route('admin.exam')]);
    }


    public function eventpage()
    {
        $event = Event::all();
        return view('admin.gallery.event', compact('event'));
    }

    public function eventstorepage(Request $request)
    {
        $request->validate([
            'event_image' => 'required|image|mimes:jpeg,png,jpg,gif|max:4096',
            'title' => 'required|string|max:255',
        ]);

        $image = $request->file('event_image');
        $ext = strtolower($image->getClientOriginalExtension());
        $imageName = time() . '.' . $ext;
        // $savePath = public_path('event/' . $imageName);

        $saveDir = storage_path('app/public/event');

        if (!file_exists($saveDir)) {
            mkdir($saveDir, 0775, true);
        }

        $savePath = $saveDir . '/' . $imageName;

        // Target size
        $targetWidth = 1780;
        $targetHeight = 800;

        // Load original image using GD
        switch ($ext) {
            case 'jpg':
            case 'jpeg':
                $source = imagecreatefromjpeg($image->getRealPath());
                break;
            case 'png':
                $source = imagecreatefrompng($image->getRealPath());
                break;
            case 'gif':
                $source = imagecreatefromgif($image->getRealPath());
                break;
            default:
                return response()->json(['error' => 'Unsupported image type']);
        }

        list($width, $height) = getimagesize($image->getRealPath());

        // Create blank resized canvas
        $resized = imagecreatetruecolor($targetWidth, $targetHeight);

        // Maintain transparency for PNG & GIF
        if ($ext == 'png' || $ext == 'gif') {
            imagecolortransparent($resized, imagecolorallocatealpha($resized, 0, 0, 0, 127));
            imagealphablending($resized, false);
            imagesavealpha($resized, true);
        }

        // Resize original → new size
        imagecopyresampled(
            $resized,
            $source,
            0,
            0,
            0,
            0,
            $targetWidth,
            $targetHeight,
            $width,
            $height
        );

        // Save image
        if ($ext == 'jpg' || $ext == 'jpeg') {
            imagejpeg($resized, $savePath, 90);
        } elseif ($ext == 'png') {
            imagepng($resized, $savePath);
        } elseif ($ext == 'gif') {
            imagegif($resized, $savePath);
        }

        // Cleanup
        imagedestroy($source);
        imagedestroy($resized);

        // Save in DB
        $data = new Event();
        $data->image = $imageName;
        $data->status = true;
        $data->slug = Str::slug($request->title);
        $data->title = $request->title;
        $data->description = $request->description;
        $data->save();

        return response()->json([
            'success' => 'Image resized (1780x400) and uploaded successfully.',
            'url' => route('admin.event')
        ]);
    }


    public function eventaddpage()
    {
        return view('admin.gallery.eventadd');
    }

    public function eventeditpage($id)
    {
        $event = Event::find($id);
        return view('admin.gallery.eventedit', compact('event'));
    }

    public function eventupdatepage(Request $request, $id)
    {

        $image = $request->file('event_image');
        $gallery = Event::find($id);
        if ($image) {
            $image_path = public_path('event/' . $gallery->image);
            if (file_exists($image_path)) {
                unlink($image_path);
            }
            $ext = strtolower($image->getClientOriginalExtension());
            $imageName = time() . '.' . $ext;
            //  $savePath = public_path('event/' . $imageName);

            $saveDir = storage_path('app/public/event');

            if (!file_exists($saveDir)) {
                mkdir($saveDir, 0775, true);
            }

            $savePath = $saveDir . '/' . $imageName;

            // Target size
            $targetWidth = 1780;
            $targetHeight = 800;

            // Load original image using GD
            switch ($ext) {
                case 'jpg':
                case 'jpeg':
                    $source = imagecreatefromjpeg($image->getRealPath());
                    break;
                case 'png':
                    $source = imagecreatefrompng($image->getRealPath());
                    break;
                case 'gif':
                    $source = imagecreatefromgif($image->getRealPath());
                    break;
                default:
                    return response()->json(['error' => 'Unsupported image type']);
            }

            list($width, $height) = getimagesize($image->getRealPath());

            // Create blank resized canvas
            $resized = imagecreatetruecolor($targetWidth, $targetHeight);

            // Maintain transparency for PNG & GIF
            if ($ext == 'png' || $ext == 'gif') {
                imagecolortransparent($resized, imagecolorallocatealpha($resized, 0, 0, 0, 127));
                imagealphablending($resized, false);
                imagesavealpha($resized, true);
            }

            // Resize original → new size
            imagecopyresampled(
                $resized,
                $source,
                0,
                0,
                0,
                0,
                $targetWidth,
                $targetHeight,
                $width,
                $height
            );

            // Save image
            if ($ext == 'jpg' || $ext == 'jpeg') {
                imagejpeg($resized, $savePath, 90);
            } elseif ($ext == 'png') {
                imagepng($resized, $savePath);
            } elseif ($ext == 'gif') {
                imagegif($resized, $savePath);
            }

            // Cleanup
            imagedestroy($source);
            imagedestroy($resized);

            $gallery->image = $imageName;
            $gallery->status = true;
            $gallery->slug = Str::slug($request->title);
            $gallery->title = $request->title;
            $gallery->description = $request->description;
            $gallery->save();
            return response()->json(['success' => 'Image Updated successfully.', 'url' => route('admin.event')]);
        } else {

            $gallery->title = $request->title;
            $gallery->description = $request->description;
            $gallery->save();
            return response()->json(['success' => 'Image Updated successfully.', 'url' => route('admin.event')]);
        }
    }

    public function eventdeletepage(Request $request)
    {
        $id = $request->id;
        $gallery = Event::find($id);
        // delete image form folder 
        $image_path = public_path('event/' . $gallery->image);
        if (file_exists($image_path)) {
            unlink($image_path);
        }
        $gallery->delete();
        return response()->json(['success' => 'Image Deleted successfully.', 'url' => route('admin.event')]);
    }

    public function admissioncontactpage(Request $request)
    {
        $admission = AdmissionContact::all();
        return view('admin.admission.admission_contact', compact('admission'));
    }

    public function contactpage()
    {
        $contact = Contact::all();
        return view('admin.admission.contact_us', compact('contact'));
    }

    // Registration Methods
    public function registrationpage()
    {
        $registrations = Registration::orderBy('created_at', 'desc')->get();
        return view('admin.registration.index', compact('registrations'));
    }

    public function registrationdeletepage(Request $request)
    {
        $registration = Registration::find($request->id);

        if ($registration) {
            // Delete uploaded files if they exist
            if ($registration->report_card && Storage::disk('public')->exists($registration->report_card)) {
                Storage::disk('public')->delete($registration->report_card);
            }
            if ($registration->applicant_photo && Storage::disk('public')->exists($registration->applicant_photo)) {
                Storage::disk('public')->delete($registration->applicant_photo);
            }

            $registration->delete();
            return redirect()->back()->with('success', 'Registration deleted successfully');
        }

        return redirect()->back()->with('error', 'Registration not found');
    }
}
