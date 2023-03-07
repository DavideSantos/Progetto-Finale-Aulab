<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Mail\BecomeRevisor;
use App\Models\Announcement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Artisan;

class RevisorController extends Controller
{
    //? middleware per revisori
    public function __construct()
    {
        $this->middleware('IsRevisor')->except('becomeRevisor', 'makeRevisor');
        // middleware per sezione lavora con noi
        $this->middleware('auth');
    }

    //? funzione per visualizzare UN annuncio nella pagina revisore
    public function indexDashboard()
    {
        $announcement_to_check = Announcement::where('is_accepted', null)->first();
        return view('/revisor.indexDashboard', compact('announcement_to_check'));
    }

    //?funzione per verificare l'annuncio
    public function acceptAnnouncement(Announcement $announcement)
    {
        $announcement->setAccepted(true);
        return redirect()->back()->with('message', 'Annuncio verificato correttamente');
    }

    //?funzione per verificare se l'annuncio è "sbagliato"
    public function rejectAnnouncement(Announcement $announcement)
    {
        $announcement->setAccepted(false);
        return redirect()->back()->with('message', 'Annuncio rifiutato');
    }

    //* funzione per rimandare in verifica un annuncio
    public function revisionAnnouncement(Announcement $announcement)
    {
        $announcement->setAccepted(null);
        return redirect()->back()->with('message', 'Annuncio mandato in revisione!');
    }

    // funzione per richiedere il revisor
    public function becomeRevisor(Request $request)
    {
        $name = $request->input('name');
        $surname = $request->input('surname');
        $city = $request->input('city');
        $description = $request->input('description');
        $number = $request->input('number');
        $mail = $request->input('mail');
        $person = compact('name', 'surname', 'description', 'number', 'city', 'mail');

        Mail::to('admin@presto.it')->send(new BecomeRevisor($person));
        return redirect()->back()->with('message', 'Richiesta effettuata con successo! Controlla la tua casella di posta.');
    }
    // funzione per diventare revisor
    public function makeRevisor($user)
    {
        Artisan::call('presto:MakeUserRevisor', ["email" => $user]);
        return redirect('/')->with('message', 'Complimenti da ora sei un nostro collaboratore!');
    }
}
