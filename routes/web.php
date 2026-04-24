<?php
use App\Http\Controllers\AdminController;
use App\Http\Controllers\forntend\HomeController;
use App\Http\Controllers\Admin\PolicyController;
use App\Http\Controllers\Admin\HomePageController;
use App\Http\Controllers\Admin\AboutUsController;
use App\Http\Controllers\Admin\CourseController;
use App\Http\Controllers\Admin\SiteSettingController;
use App\Http\Controllers\BannerController;
use Illuminate\Support\Facades\Route;

use App\Mail\WelcomeMail;
use Illuminate\Support\Facades\Mail;

Route::get('/', [HomeController::class, 'index'])->name('home.index');
Route::get('/contact', [HomeController::class, 'contactpage'])->name('home.contact');
Route::post('/contact-store', [HomeController::class, 'contactstorepage'])->name('home.contact.store');
Route::get('/aboutus', [HomeController::class, 'aboutuspage'])->name('home.aboutus');
Route::get('/courses', [HomeController::class, 'coursespage'])->name('home.courses');
Route::get('/exam', [HomeController::class, 'exampage'])->name('home.exam'); 
Route::get('/admissions', [HomeController::class, 'admissionspage'])->name('home.admissions');
Route::post('/admission-store', [HomeController::class, 'admissionstorepage'])->name('home.admission.store');
Route::get('/admission-details/{slug}', [HomeController::class, 'admissiondetailspage'])->name('home.admission.details');
Route::get('/exam-details/{slug}', [HomeController::class, 'examdetailspage'])->name('home.exam.details');
Route::get('/gallery', [HomeController::class, 'gallerypage'])->name('home.gallery');
Route::get('/events', [HomeController::class, 'eventspage'])->name('home.events');
Route::get('/events-detalies/{slug}', [HomeController::class, 'eventdetaliespage'])->name('home.events.detalies');
Route::get('/registration', [HomeController::class, 'registrationpage'])->name('home.registration');
Route::post('/registration-store', [HomeController::class, 'registrationstorepage'])->name('home.registration.store');
// Fornt Policy Route
Route::prefix('detalies')->group(function () {
    //Route::get('/', [HomeController::class, 'index'])->name('policy');
    Route::get('/{slug}', [HomeController::class, 'showPolicy'])->name('policy.show-slug');
});

// Check mail Working or not 
Route::get('/mail', [HomeController::class, 'sendEmail'])->name('home.mail');

// Authenticated User Routes
Route::middleware(['auth', 'is_user'])->group(function () {
   

});
// Profile Routes
Route::middleware('auth')->group(function () {

});
// Admin Routes
Route::prefix('admin')->middleware(['auth', 'is_admin'])->group(function () {
    Route::get('/dashboard', [AdminController::class, 'dashboardpage'])->name('admin.dashboard');
    Route::get('/edit', [AdminController::class, 'editpage']);
    Route::get('/changepassword', [AdminController::class, 'changepasspage']);

    // Site Setting Routes
    // Gallery Routes
    Route::get('/gallery', [AdminController::class, 'gallerypage'])->name('admin.gallery');
    Route::get('/gallery-add', [AdminController::class, 'galleryaddpage'])->name('admin.gallery.add');
    Route::post('/gallerty-store', [AdminController::class, 'gallerystorepage'])->name('admin.gallery.store');
    Route::get('/gallery-edit/{id}', [AdminController::class, 'galleryeditpage'])->name('admin.gallery.edit');
    Route::post('/gallery-update/{id}',[AdminController::class, 'galleryupdatepage'])->name('admin.gallery.update');
    Route::post('/gallery-delete', [AdminController::class, 'gallerydeletepage'])->name('admin.gallery.delete');
    // Event Routes
    Route::get('/event', [AdminController::class, 'eventpage'])->name('admin.event');
    Route::get('/event-add', [AdminController::class, 'eventaddpage'])->name('admin.event.add');
    Route::post('/event-store', [AdminController::class, 'eventstorepage'])->name('admin.event.store');
    Route::get('/event-edit/{id}', [AdminController::class, 'eventeditpage'])->name('admin.event.edit');
    Route::post('/event-update/{id}',[AdminController::class, 'eventupdatepage'])->name('admin.event.update');
    Route::post('/event-delete', [AdminController::class, 'eventdeletepage'])->name('admin.event.delete');
    // Admission Routes
    Route::get('/admission', [AdminController::class, 'admissionpage'])->name('admin.admission');
    Route::get('/admission-add', [AdminController::class, 'admissionaddpage'])->name('admin.admission.add');
    Route::post('/admission-store', [AdminController::class, 'admissionstorepage'])->name('admin.admission.store');
    Route::get('/admission-edit/{id}', [AdminController::class, 'admissioneditpage'])->name('admin.admission.edit');
    Route::post('/admission-update/{id}',[AdminController::class, 'admissionupdatepage'])->name('admin.admission.update');
    Route::post('/admission-delete', [AdminController::class, 'admissiondeletepage'])->name('admin.admission.delete');

    //Admission Contact View

    Route::get('/admission-contact', [AdminController::class, 'admissioncontactpage'])->name('admin.admission.contact');
    Route::get('/contact-us-admin', [AdminController::class, 'contactpage'])->name('admin.contact');

    // Registration Routes
    Route::get('/registrations', [AdminController::class, 'registrationpage'])->name('admin.registrations');
    Route::post('/registration-delete', [AdminController::class, 'registrationdeletepage'])->name('admin.registration.delete');

   // Exam Routes
    Route::get('/exam', [AdminController::class, 'exampage'])->name('admin.exam');
    Route::get('/exam-add', [AdminController::class, 'examaddpage'])->name('admin.exam.add');
    Route::post('/exam-store', [AdminController::class, 'examstorepage'])->name('admin.exam.store');
    Route::get('/exam-edit/{id}', [AdminController::class, 'exameditpage'])->name('admin.exam.edit');
    Route::post('/exam-update/{id}',[AdminController::class, 'examupdatepage'])->name('admin.exam.update');
    Route::post('/exam-delete', [AdminController::class, 'examdeletepage'])->name('admin.exam.delete');
    // Course Routes
    Route::get('/courses', [AdminController::class, 'coursespage'])->name('admin.courses');
    Route::get('/courses-add', [AdminController::class, 'coursesaddpage'])->name('admin.courses.add');
    Route::post('/courses-store', [AdminController::class, 'coursesstorepage'])->name('admin.courses.store');
    // Course Routes
    Route::get('/updates-news', [AdminController::class, 'updatesnewspage'])->name('admin.updates.news');
    // page Privacy Routes
    // Policy Route
    Route::prefix('policy')->group(function () {
        Route::get('/', [PolicyController::class, 'index'])->name('admin.policy');
        Route::post('/store', [PolicyController::class, 'storePolicy'])->name('policy.store');
        Route::post('/deletePolicy', [PolicyController::class, 'deletePolicy'])->name('policy.delete');
        Route::post('/updatePolicy/{id}', [PolicyController::class, 'updatePolicy'])->name('policy.update');
        Route::get('/{id}', [PolicyController::class, 'editPolicy'])->name('policy.show');
    });

    // ---- Home Page Management Routes ----
    Route::prefix('homepage')->group(function () {
        // Hero Section
        Route::get('/hero', [HomePageController::class, 'heroIndex'])->name('admin.homepage.hero');
        Route::post('/hero', [HomePageController::class, 'heroUpdate'])->name('admin.homepage.hero.update');

        // Why Choose Us
        Route::get('/why-choose-us', [HomePageController::class, 'whyChooseIndex'])->name('admin.homepage.why');
        Route::post('/why-choose-us', [HomePageController::class, 'whyChooseStore'])->name('admin.homepage.why.store');
        Route::get('/why-choose-us/{id}', [HomePageController::class, 'whyChooseShow'])->name('admin.homepage.why.show');
        Route::post('/why-choose-us/{id}', [HomePageController::class, 'whyChooseUpdate'])->name('admin.homepage.why.update');
        Route::delete('/why-choose-us/{id}', [HomePageController::class, 'whyChooseDestroy'])->name('admin.homepage.why.destroy');

        // What We Provide
        Route::get('/what-we-provide', [HomePageController::class, 'whatWeProvideIndex'])->name('admin.homepage.provide');
        Route::post('/what-we-provide', [HomePageController::class, 'whatWeProvideStore'])->name('admin.homepage.provide.store');
        Route::get('/what-we-provide/{id}', [HomePageController::class, 'whatWeProvideShow'])->name('admin.homepage.provide.show');
        Route::post('/what-we-provide/{id}', [HomePageController::class, 'whatWeProvideUpdate'])->name('admin.homepage.provide.update');
        Route::delete('/what-we-provide/{id}', [HomePageController::class, 'whatWeProvideDestroy'])->name('admin.homepage.provide.destroy');

        // Our Strength
        Route::get('/our-strength', [HomePageController::class, 'strengthIndex'])->name('admin.homepage.strength');
        Route::post('/our-strength', [HomePageController::class, 'strengthStore'])->name('admin.homepage.strength.store');
        Route::get('/our-strength/{id}', [HomePageController::class, 'strengthShow'])->name('admin.homepage.strength.show');
        Route::post('/our-strength/{id}', [HomePageController::class, 'strengthUpdate'])->name('admin.homepage.strength.update');
        Route::delete('/our-strength/{id}', [HomePageController::class, 'strengthDestroy'])->name('admin.homepage.strength.destroy');
    });

    // ---- Courses Routes ----
    Route::prefix('courses-manage')->group(function () {
        // Page Settings
        Route::get('/settings', [CourseController::class, 'settingsIndex'])->name('admin.courses.settings');
        Route::post('/settings', [CourseController::class, 'settingsUpdate'])->name('admin.courses.settings.update');

        // Classes CRUD
        Route::get('/classes', [CourseController::class, 'classesIndex'])->name('admin.courses.classes');
        Route::post('/classes', [CourseController::class, 'classStore'])->name('admin.courses.classes.store');
        Route::get('/classes/{id}', [CourseController::class, 'classShow'])->name('admin.courses.classes.show');
        Route::post('/classes/{id}', [CourseController::class, 'classUpdate'])->name('admin.courses.classes.update');
        Route::delete('/classes/{id}', [CourseController::class, 'classDestroy'])->name('admin.courses.classes.destroy');

        // Discipline Rules CRUD
        Route::get('/discipline', [CourseController::class, 'rulesIndex'])->name('admin.courses.discipline');
        Route::post('/discipline', [CourseController::class, 'ruleStore'])->name('admin.courses.discipline.store');
        Route::get('/discipline/{id}', [CourseController::class, 'ruleShow'])->name('admin.courses.discipline.show');
        Route::post('/discipline/{id}', [CourseController::class, 'ruleUpdate'])->name('admin.courses.discipline.update');
        Route::delete('/discipline/{id}', [CourseController::class, 'ruleDestroy'])->name('admin.courses.discipline.destroy');
    });

    // ---- About Us Routes ----
    Route::prefix('about-us')->group(function () {
        Route::get('/settings', [AboutUsController::class, 'index'])->name('admin.about.settings');
        Route::post('/settings', [AboutUsController::class, 'updateSettings'])->name('admin.about.settings.update');

        Route::get('/core-values', [AboutUsController::class, 'valuesIndex'])->name('admin.about.values');
        Route::post('/core-values', [AboutUsController::class, 'valuesStore'])->name('admin.about.values.store');
        Route::get('/core-values/{id}', [AboutUsController::class, 'valuesShow'])->name('admin.about.values.show');
        Route::post('/core-values/{id}', [AboutUsController::class, 'valuesUpdate'])->name('admin.about.values.update');
        Route::delete('/core-values/{id}', [AboutUsController::class, 'valuesDestroy'])->name('admin.about.values.destroy');
    });

    // ---- Site Settings Routes ----
    Route::prefix('site-settings')->group(function () {
        // General Settings (Header + Footer)
        Route::get('/general', [SiteSettingController::class, 'index'])->name('admin.site.settings');
        Route::post('/general', [SiteSettingController::class, 'update'])->name('admin.site.settings.update');

        // Navigation Menu
        Route::get('/nav-menu', [SiteSettingController::class, 'navIndex'])->name('admin.site.nav');
        Route::post('/nav-menu', [SiteSettingController::class, 'navStore'])->name('admin.site.nav.store');
        Route::get('/nav-menu/{id}', [SiteSettingController::class, 'navShow'])->name('admin.site.nav.show');
        Route::post('/nav-menu/{id}', [SiteSettingController::class, 'navUpdate'])->name('admin.site.nav.update');
        Route::delete('/nav-menu/{id}', [SiteSettingController::class, 'navDestroy'])->name('admin.site.nav.destroy');
    });

    // Banner Routes
    Route::prefix('banners')->group(function () {
        Route::get('/', [BannerController::class, 'index'])->name('admin.banners.index');
        Route::get('/data', [BannerController::class, 'getData'])->name('admin.banners.data');
        Route::post('/', [BannerController::class, 'store'])->name('admin.banners.store');
        Route::get('/{banner}', [BannerController::class, 'show'])->name('admin.banners.show');
        Route::match(['post', 'put', 'patch'], '/{banner}', [BannerController::class, 'update'])->name('admin.banners.update');
        Route::delete('/{banner}', [BannerController::class, 'destroy'])->name('admin.banners.destroy');
        Route::put('/{banner}/status', [BannerController::class, 'updateStatus'])->name('admin.banners.status');
    });
    
});
// Authentication Routes
require __DIR__ . '/auth.php';
