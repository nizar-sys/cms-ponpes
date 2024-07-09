<?php

use App\Http\Controllers\Admin\AboutController;
use App\Http\Controllers\Admin\BlogCategoryController;
use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Admin\BlogSectionSettingController;
use App\Http\Controllers\Admin\ContactSectionSettingController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\FooterSocialLinkController;
use App\Http\Controllers\Admin\HeroController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\TyperTitleController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ExperienceController;
use App\Http\Controllers\Admin\FeedbackController;
use App\Http\Controllers\Admin\FeedbackSectionSettingController;
use App\Http\Controllers\Admin\FooterContactInfoController;
use App\Http\Controllers\Admin\FooterHelpLinkController;
use App\Http\Controllers\Admin\FooterInfoController;
use App\Http\Controllers\Admin\FooterUsefulLinkController;
use App\Http\Controllers\Admin\KrfSectionController;
use App\Http\Controllers\Admin\KrfImageController;
use App\Http\Controllers\Admin\GalleryAlbumController;
use App\Http\Controllers\Admin\GalleryController;
use App\Http\Controllers\Admin\GallerySectionSettingController;
use App\Http\Controllers\Admin\GeneralSettingController;
use App\Http\Controllers\Admin\PortfolioItemController;
use App\Http\Controllers\Admin\PortfolioSectionSettingController;
use App\Http\Controllers\Admin\QualificationController;
use App\Http\Controllers\Admin\SeoSettingController;
use App\Http\Controllers\Admin\ServiceSectionSettingController;
use App\Http\Controllers\Admin\SkillItemController;
use App\Http\Controllers\Admin\SkillSectionSettingController;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\TeacherController;
use Illuminate\Support\Facades\Artisan;

use Illuminate\Support\Facades\Route;

Route::get('/optimize', function () {
    Artisan::call('optimize:clear');
    return 'Optimize Clear';
});

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/about', [HomeController::class, 'about'])->name('about');
Route::get('/gallery', [HomeController::class, 'galery'])->name('galery');
Route::get('portfolios', [HomeController::class, 'portfolio'])->name('portfolio');
Route::get('portfolio-details/{id}', [HomeController::class, 'showPortfolio'])->name('show.portfolio');
Route::get('blog-details/{id}', [HomeController::class, 'showBlog'])->name('show.blog');
Route::get('album-detail/{id}', [HomeController::class, 'showGallery'])->name('show.album');
Route::get('blogs', [HomeController::class, 'blog'])->name('blog');
Route::get('/services', [HomeController::class, 'service'])->name('service');
Route::get('/contact', [HomeController::class, 'contactMe'])->name('contact.index');
Route::post('contact', [HomeController::class, 'contact'])->name('contact');

/** Admin Routes */

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';

Route::get('dashboard', [DashboardController::class, 'index'])->middleware('auth')->name('dashboard');


/** Admin Route**/
Route::group(['middleware' => ['auth'], 'prefix' => 'admin', 'as' => 'admin.'], function () {
    Route::resource('hero', HeroController::class);
    Route::resource('typer-title', TyperTitleController::class);

    /** Service **/
    Route::resource('service', ServiceController::class);
    Route::resource('service-section-setting', ServiceSectionSettingController::class);

    /** About **/
    Route::get('resume/download', [AboutController::class, 'resumeDownload'])->name('resume.download');
    Route::resource('about', AboutController::class);

    /** Portfolio Category **/
    Route::resource('category', CategoryController::class);

    /** Portfolio Item Route **/
    Route::resource('portfolio-item', PortfolioItemController::class);

    /** Portfolio Section Setting Route **/
    Route::resource('portfolio-section-setting', PortfolioSectionSettingController::class);

    /** Blog Section Setting Route **/
    Route::resource('blog-category', BlogCategoryController::class);
    /** Blog Route **/
    Route::resource('blog', BlogController::class);
    /** Blog Section Setting Route **/
    Route::resource('blog-section-setting', BlogSectionSettingController::class);

    /** Contact Section Setting Route **/
    Route::resource('contact-section-setting', ContactSectionSettingController::class);

    /**Footer Social Link Route **/
    Route::resource('footer-social', FooterSocialLinkController::class);
    /**Footer Information Route **/
    Route::resource('footer-info', FooterInfoController::class);
    /**Footer Contact Info Route **/
    Route::resource('footer-contact-info', FooterContactInfoController::class);
    /**Footer Useful Links **/
    Route::resource('footer-useful-links', FooterUsefulLinkController::class);
    /**Footer Help Links **/
    Route::resource('footer-help-links', FooterHelpLinkController::class);


    /**Setting Route**/
    Route::get('settings', SettingController::class)->name('setting.index');

    /**General Setting Route **/
    Route::resource('general-setting', GeneralSettingController::class);


    /**Seo Setting Route **/
    Route::resource('seo-setting', SeoSettingController::class);

    /**Seo Gallery Route **/
    Route::resource('gallery', GalleryController::class);
    Route::resource('gallery-album', GalleryAlbumController::class);
    Route::resource('gallery-section-setting', GallerySectionSettingController::class);

    Route::resource('teachers', TeacherController::class);
});
