<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\RevisorController;
use App\Http\Controllers\AnnouncementController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [PublicController::class, "welcome"])->name("welcome");
// rotta per la vista dell'index degli annunci
Route::get('/indexAnnouncement', [AnnouncementController::class, 'indexAnnouncement'])->name('indexAnnouncement');
Route::get('/index/create', [AnnouncementController::class, 'createAnnouncement'])->name('createAnnouncement');
// rotta parametrica per mostrare le categorie nella navbar
Route::get('/category/{category}', [PublicController::class, 'categoryShow'])->name('categoryShow');
// rotta parametrica per dettaglio annuncio
Route::get('/announcement/{announcement}', [AnnouncementController::class, 'detAnnouncement'])->name('detAnnouncement');
// dashboard revisore
Route::get('/revisor/dashboard',[RevisorController::class,'indexDashboard'])->name('indexDashboard');
// rotta accetta annuncio
Route::patch('/accept/announcement/{announcement}',[RevisorController::class,'acceptAnnouncement'])->name('acceptAnnouncement');
// rotta rifiuta annuncio
Route::patch('/reject/announcement/{announcement}',[RevisorController::class,'rejectAnnouncement'])->name('rejectAnnouncement');
// Richiedi di diventare revisore
Route::POST('/richiesta/revisore',[RevisorController::class,'becomeRevisor'])->name('becomeRevisor');
// Rendi utente un revisore
Route::get('/rendi/revisore/{user}',[RevisorController::class,'makeRevisor'])->name('makeRevisor');
// rotta lavora per noi + form
Route::get('/work-with-us/form',[PublicController::class,'formRevisor'])->name('formRevisor');
// rotta per la ricerca degli annunci
Route::get('search/announcements', [PublicController::class, 'searchAnnouncements'])->name('searchAnnouncements');
// rotta per rimandare un annuncio in revisione
Route::patch('/redirect/announcement/{announcement}', [RevisorController::class, 'revisionAnnouncement'])->name('revisionAnnouncement');
// rotta per traduzioni
Route::post('/language/{lang}',[PublicController::class,'set_language_locale'])->name('set_language_locale');