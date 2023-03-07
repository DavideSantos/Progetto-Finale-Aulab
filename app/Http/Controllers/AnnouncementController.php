<?php

namespace App\Http\Controllers;

use App\Models\Announcement;
use Illuminate\Http\Request;

class AnnouncementController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth')->except('indexAnnouncement');
    }

    public function indexAnnouncement()
    {
        $announcements = Announcement::where('is_accepted', true)->paginate(6);
        return view('announcement.index', compact('announcements'));
    }

    public function createAnnouncement()
    {
        
        return view('announcement.createAnnouncement');
    }

    public function detAnnouncement(Announcement $announcement){
        return view('announcement.detAnnouncement', compact('announcement'));
    }
}
