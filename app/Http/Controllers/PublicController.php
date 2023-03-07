<?php

namespace App\Http\Controllers;

use App\Models\Announcement;
use App\Models\Category;
use Illuminate\Http\Request;

class PublicController extends Controller
{

    // funzione per la vista della home
    public function welcome()
    {

        $announcements =  Announcement::where('is_accepted', true)->get()->sortByDesc('created_at')->take(3);

        return view('welcome', compact('announcements'));
    }

    // funzione per vista delle categorie
    public function categoryShow(Category $category)
    {
        return view('categoryShow', compact('category'));
    }

    // funzione per la vista del diventa un revisore
    public function formRevisor()
    {
        return view('revisor.formRevisor');
    }

    // funzione per la ricerca con ritorno della vista
    public function searchAnnouncements(Request $request)
    {
        $announcements = Announcement::search($request->searched)->where('is_accepted', true)->paginate(10);
        return view('announcement.index', compact('announcements'));
    }
    // funzione per traduzioni
    public function set_language_locale($lang){
        session()->put('locale',$lang);
        return redirect()->back();
    }



}
