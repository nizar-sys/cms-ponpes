<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Mail\ContactMail;
use App\Models\About;
use App\Models\Album;
use App\Models\Announcement;
use App\Models\Blog;
use App\Models\BlogCategory;
use App\Models\BlogSectionSetting;
use App\Models\ContactSectionSetting;
use App\Models\Gallery;
use App\Models\GallerySectionSetting;
use App\Models\Hero;
use App\Models\PortfolioItem;
use App\Models\PortfolioSectionSetting;
use App\Models\Service;
use App\Models\ServiceSectionSetting;
use App\Models\KrfSectionSetting;
use App\Models\Krfimage;
use App\Models\TyperTitle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

use function Ramsey\Uuid\v1;

class HomeController extends Controller
{
    public function index()
    {
        $heroes = Hero::latest()->get();
        $fasilitasSection = ServiceSectionSetting::first();
        $fasilitas = Service::latest()->get();
        $pengumuman = Announcement::latest()->get();
        $galleries = Gallery::latest()->get();
        $pengaturanBerita = BlogSectionSetting::first();
        $beritaTerbaru = Blog::latest()->limit(3)->get();

        return view('frontend.home', compact('heroes', 'fasilitasSection', 'fasilitas', 'pengumuman', 'galleries', 'pengaturanBerita', 'beritaTerbaru'));
    }

    public function about()
    {
        $about = About::first();
        $typerTitles = TyperTitle::all();

        return view('frontend.about', compact('about', 'typerTitles'));
    }

    public function galery()
    {
        $gallerySectionSetting = GallerySectionSetting::first();
        $albums = Album::latest()->get();

        return view('frontend.galery', compact('gallerySectionSetting', 'albums'));
    }

    public function krf()
    {
        $krf = KrfSectionSetting::first();
        $krfimage = Krfimage::all();
        /* $krf = KrfSectionSetting::latest()->get(['id', 'title', 'sub_title', 'logo', 'description']); */

        return view('frontend.krf', compact('krf', 'krfimage'));
    }

    public function showGallery($id)
    {
        $album = Album::findOrFail($id)->load('images');
        return view('frontend.gallery-item', compact('album'));
    }

    public function portfolio()
    {
        $portfolioItems = PortfolioItem::latest()->get();
        $portfolioSetting = PortfolioSectionSetting::first();

        return view('frontend.portfolio', compact('portfolioItems', 'portfolioSetting'));
    }

    public function showPortfolio($id)
    {
        $portfolio = PortfolioItem::findOrFail($id)->load('category');
        return view('frontend.portfolio-details', compact('portfolio'));
    }

    public function showBlog($id)
    {
        $berita = Blog::with([
            'comments' => function ($query) {
                $query->with('childrens')->latest()->whereNull('parent_id');
            },
        ])->findOrFail($id);

        $latestPosts = Blog::latest()->limit(5)->get()
            ->except($berita->id);

        $kategoriBerita = BlogCategory::latest()->withCount('blogs')->get();

        return view('frontend.blog-details', compact('berita', 'latestPosts', 'kategoriBerita'));
    }

    public function blog(Request $request)
    {
        $blogs = Blog::latest()
            ->get();
        $blogSetting = BlogSectionSetting::first();

        return view('frontend.blog', compact('blogs', 'blogSetting'));
    }

    public function service()
    {
        $services = Service::latest()->get(['id', 'name', 'description', 'image']);
        $serviceSetting = ServiceSectionSetting::first();

        return view('frontend.service', compact('services', 'serviceSetting'));
    }

    public function contactMe()
    {
        $contactSetting = ContactSectionSetting::first();
        return view('frontend.contact', compact('contactSetting'));
    }

    public function contact(Request $request)
    {
        $request->validate([
            'name' => ['required', 'max:200'],
            'subject' => ['required', 'max:300'],
            'email' => ['required', 'email'],
            'message' => ['required', 'max:2000'],
        ]);

        Mail::send(new ContactMail($request->all()));

        toastr()->success('Your message has been sent successfully!');
        return back();
    }
}
