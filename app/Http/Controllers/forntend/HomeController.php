<?php

namespace App\Http\Controllers\forntend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Gallery;
use App\Models\Event;
use App\Models\Admission;
use App\Models\Exam;
use App\Models\Policy;
use App\Models\Contact;
use App\Models\AdmissionContact;
use App\Models\Registration;
use App\Models\Banner;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;
use App\Mail\ContactMail;
use App\Mail\AdmissionContactMail;
use App\Mail\RegistrationMail;


class HomeController extends Controller
{

    public function index()
    {
        $exam = Exam::where('status', 'active')->get();
        $admissions = Admission::where('status', 'active')->get();
        $notices = Policy::where('status', 'notice')->get();
        $banners = Banner::active()->ordered()->get();
        $gallery = Gallery::all();
        return view('frontend.index', compact('exam', 'admissions', 'notices', 'banners', 'gallery'));
    }
    public function contactpage()
    {
        return view('frontend.contact');
    }
    public function aboutuspage()
    {
        return view('frontend.aboutus');
    }
    public function coursespage()
    {
        return view('frontend.course');
    }

    public function exampage()
    {
        $exam = Exam::where('status', 'active')->get();
        return view('frontend.exam', compact('exam'));
    }

    public function admissionspage()
    {
        $admissions = Admission::where('status', 'active')->get();
        return view('frontend.admissions', compact('admissions'));
    }


    public function examdetailspage($slug)
    {
        $exam = Exam::where('slug', $slug)->firstOrFail();
        return view('frontend.exam_details', compact('exam'));
    }

    public function admissiondetailspage($slug)
    {
        $admission = Admission::where('slug', $slug)->firstOrFail();
        return view('frontend.admission_details', compact('admission'));
    }

    public function gallerypage()
    {
        $gallery = Gallery::all();
        return view('frontend.gallery', compact('gallery'));
    }

    // Event's
    public function eventspage()
    {
        $event = Event::all();
        return view('frontend.events', compact('event'));
    }

    public function showPolicy(Request $request)
    {
        // Determine slug from the route or request to avoid undefined variable errors
        $slug = $request->route('slug') ?? $request->input('slug');

        if (! $slug) {
            abort(404);
        }

        // Fetch the policy based on the slug
        $page = Policy::where('slug', $slug)->firstOrFail();

        // Return the view with the policy data
        return view('frontend.common_view_page', compact('page'));
    }

    public function eventdetaliespage(Request $request)
    {
        // Determine slug from the route or request to avoid undefined variable errors
        $slug = $request->route('slug') ?? $request->input('slug');

        if (! $slug) {
            abort(404);
        }

        // Fetch the policy based on the slug
        $page = Event::where('slug', $slug)->firstOrFail();

        // Return the view with the policy data
        return view('frontend.common_view_event', compact('page'));
    }

    public function contactstorepage(Request $request)
    {

        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'message' => 'required',
            'subject' => 'required',
        ]);

        $contact = new Contact();
        $contact->name = $request->name;
        $contact->email = $request->email;
        $contact->phone = $request->phone;
        $contact->message = $request->message;
        $contact->subject = $request->subject;;
        $contact->save();

        // Check if AJAX request
        if ($request->expectsJson()) {
            // Send Email 
            if ($contact) {
                // Send email to ad,min
                $this->sendEmail($request);
            }
            return response()->json([
                'success' => 'Your message has been sent successfully. We will contact you soon.'
            ]);
        }



        return redirect()->back()->with('success', 'Your message has been sent successfully. We will contact you soon.');
    }

    public function admissionstorepage(Request $request)
    {

        $request->validate([
            'name' => 'required',
            'pname' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'message' => 'required',
            'classadmit' => 'required',
        ]);

        $contact = new AdmissionContact();
        $contact->student_name = $request->name;
        $contact->parent_name = $request->pname;
        $contact->phone = $request->phone;
        $contact->email = $request->email;
        $contact->message = $request->message;
        $contact->subject = 'Admission Enquiry';
        $contact->class = $request->classadmit;
        $contact->save();

        if ($contact) {
            // Send email to admin
            $this->sendEmail($request);
             return response()->json([
                'success' => 'Your message has been sent successfully. We will contact you soon.'
            ]);
        }

        //return redirect()->back()->with('success', 'Your message has been sent successfully. We will contact you soon.');
    }


    public function sendEmail(Request $request)
    {
        if ($request->form_type == 'admission_from') {

            // Prepare contact data
            $contactData = [
                'sname' => $request->name,
                'pname' => $request->pname,
                'email' => $request->email,
                'phone' => $request->phone,
                'message' => $request->message,
                'subject' => 'Admission Enquiry',
                'class' => $request->classadmit,
            ];
        } else {
            // Prepare contact data
            $contactData = [
                'name' => $request->name,
                'email' => $request->email,
                'phone' => $request->phone,
                'message' => $request->message,
                'subject' => $request->subject,
            ];
        }
        try {
            $adminEmail = config('app.admin_email', 'deepaksharma62354@gmail.com');
            $userEmail = $contactData['email'];

            // Validate email addresses
            if (!filter_var($adminEmail, FILTER_VALIDATE_EMAIL)) {
                Log::error('Invalid admin email address', ['email' => $adminEmail]);
                return;
            }

            if (!filter_var($userEmail, FILTER_VALIDATE_EMAIL)) {
                Log::error('Invalid user email address', ['email' => $userEmail]);
                return;
            }

            // Check form is contact us form or admission form
            if ($request->form_type == 'admission_from') {

                // Send email to admin
                Mail::to($adminEmail)->send(new AdmissionContactMail($contactData));
                Log::info('Email sent to admin', [
                    'recipient' => $adminEmail,
                    'sender_name' => $contactData['sname'],
                    'sender_parent_name' => $contactData['pname'],
                    'subject' => $contactData['subject'],
                    'phone' => $contactData['phone'],
                    'message_preview' => substr($contactData['message'], 0, 100) . '...'
                ]);
                // Send confirmation email to user
                Mail::to($userEmail)->send(new AdmissionContactMail($contactData));
                // Log::info('Confirmation email sent to user', [
                //     'recipient' => $userEmail,
                //     'sender_name' => $contactData['name'],
                //     'subject' => $contactData['subject']
                // ]);
            } else {

                // Send email to admin
                Mail::to($adminEmail)->send(new ContactMail($contactData));
                Log::info('Email sent to admin', [
                    'recipient' => $adminEmail,
                    'sender_name' => $contactData['name'],
                    'sender_email' => $contactData['email'],
                    'subject' => $contactData['subject'],
                    'phone' => $contactData['phone'],
                    'message_preview' => substr($contactData['message'], 0, 100) . '...'
                ]);
                // Send confirmation email to user
                Mail::to($userEmail)->send(new ContactMail($contactData));
                Log::info('Confirmation email sent to user', [
                    'recipient' => $userEmail,
                    'sender_name' => $contactData['name'],
                    'subject' => $contactData['subject']
                ]);
            }
        } catch (\Exception $e) {
            Log::error('Email sending failed', [
                'error' => $e->getMessage(),
                'sender_email' => $request->email ?? 'N/A',
                'sender_name' => $request->name ?? 'N/A',
                'subject' => $request->subject ?? 'N/A'
            ]);
        }
    }

    // Registion Page
    public function registrationpage()
    {
        return view('frontend.registion');
    }

    // Registration Store
    public function registrationstorepage(Request $request)
    {
        $request->validate([
            'branch' => 'required|string|max:255',
            'class' => 'required|string|max:255',
            'dob' => 'required|date',
            'applicant_name' => 'required|string|max:255',
            'father_name' => 'required|string|max:255',
            'mother_name' => 'required|string|max:255',
            'mobile' => 'required|string|max:10',
            'phone' => 'nullable|string|max:20',
            'email' => 'required|email|max:255',
            'address' => 'required|string',
            'last_school' => 'nullable|string|max:255',
            'last_class' => 'nullable|string|max:255',
            'report_card' => 'nullable|file|mimes:jpg,jpeg,png,pdf|max:2048',
            'applicant_photo' => 'nullable|file|mimes:jpg,jpeg,png|max:2048',
        ]);

        // Handle file uploads
        $reportCardPath = null;
        $applicantPhotoPath = null;

        if ($request->hasFile('report_card')) {
            $reportCardPath = $request->file('report_card')->store('registrations/report_cards', 'public');
        }

        if ($request->hasFile('applicant_photo')) {
            $applicantPhotoPath = $request->file('applicant_photo')->store('registrations/photos', 'public');
        }

        // Create registration record
        $registration = Registration::create([
            'branch' => $request->branch,
            'class' => $request->class,
            'dob' => $request->dob,
            'applicant_name' => $request->applicant_name,
            'father_name' => $request->father_name,
            'mother_name' => $request->mother_name,
            'mobile' => $request->mobile,
            'phone' => $request->phone,
            'email' => $request->email,
            'address' => $request->address,
            'last_school' => $request->last_school,
            'last_class' => $request->last_class,
            'report_card' => $reportCardPath,
            'applicant_photo' => $applicantPhotoPath,
        ]);

        // Send email notification
        if ($registration) {
            try {
                $registrationData = [
                    'branch' => $registration->branch,
                    'class' => $registration->class,
                    'dob' => $registration->dob->format('d-m-Y'),
                    'applicant_name' => $registration->applicant_name,
                    'father_name' => $registration->father_name,
                    'mother_name' => $registration->mother_name,
                    'mobile' => $registration->mobile,
                    'phone' => $registration->phone,
                    'email' => $registration->email,
                    'address' => $registration->address,
                    'last_school' => $registration->last_school,
                    'last_class' => $registration->last_class,
                ];

                $adminEmail = config('app.admin_email', 'deepaksharma62354@gmail.com');
                
                // Send email to admin
                Mail::to($adminEmail)->send(new RegistrationMail($registrationData));
                
                // Send confirmation email to user
                Mail::to($registration->email)->send(new RegistrationMail($registrationData));
                
                Log::info('Registration email sent', [
                    'recipient' => $adminEmail,
                    'applicant_name' => $registration->applicant_name,
                ]);
            } catch (\Exception $e) {
                Log::error('Registration email sending failed', [
                    'error' => $e->getMessage(),
                    'applicant_name' => $registration->applicant_name,
                ]);
            }
        }

        // Return JSON response for AJAX
        if ($request->expectsJson()) {
            return response()->json([
                'success' => true,
                'message' => 'Registration submitted successfully! We will contact you soon.'
            ]);
        }

        return redirect()->back()->with('success', 'Registration submitted successfully! We will contact you soon.');
    }
}
