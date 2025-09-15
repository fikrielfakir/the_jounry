<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\Club;
use App\Models\Partner;
use App\Models\Testimonial;
use App\Models\User;

class HomeController extends Controller
{
    /**
     * Show the home page with all data.
     */
    public function index()
    {
        // Get upcoming events
        $upcomingEvents = Event::where('event_date', '>=', now())
            ->where('status', 'published')
            ->orderBy('event_date', 'asc')
            ->take(6)
            ->get();

        // Get partners
        $partners = Partner::active()
            ->take(8)
            ->get();

        // Get testimonials
        $testimonials = Testimonial::with('user')
            ->approved()
            ->take(4)
            ->get();

        // Get statistics
        $stats = [
            'participants' => User::count(),
            'trees_planted' => 500, // This could be from a setting or separate model
            'cultural_collaborations' => Partner::where('type', 'cultural')->count(),
            'community_projects' => 10, // This could be from a setting or separate model
        ];

        return view('welcome', compact(
            'upcomingEvents',
            'partners',
            'testimonials',
            'stats'
        ));
    }

    /**
     * Handle contact form submission.
     */
    public function contact(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'message' => 'required|string|max:1000',
        ]);

        // Here you could save to database, send email, etc.
        // For now, just return success
        
        return redirect(route('welcome') . '#contact')->with('success', 'Thank you for your message! We will get back to you soon.');
    }

    /**
     * Show the partners page.
     */
    public function partners()
    {
        $partners = Partner::active()
            ->orderBy('name')
            ->get();

        return view('partners', compact('partners'));
    }

    /**
     * Show the about page.
     */
    public function about()
    {
        $stats = [
            'participants' => User::count(),
            'trees_planted' => 500,
            'cultural_collaborations' => Partner::where('type', 'cultural')->count(),
            'community_projects' => 10,
        ];

        $testimonials = Testimonial::with('user')
            ->approved()
            ->featured()
            ->take(6)
            ->get();

        return view('about', compact('stats', 'testimonials'));
    }
}
