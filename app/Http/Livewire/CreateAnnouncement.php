<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Category;
use App\Jobs\RemoveFaces;
use App\Jobs\ResizeImage;
use App\Models\Announcement;
use Livewire\WithFileUploads;
use App\Jobs\GoogleVisionLabelImage;
use App\Jobs\GoogleVisionSafeSearch;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;


class CreateAnnouncement extends Component
{

    use WithFileUploads;

    public $title;
    public $body;
    public $price;
    public $category;
    public $temporary_images;
    public $images=[];
    public $image;
    
    public $form_id;
    public $message;
    public $announcement;

    protected $rules = [
        'title' => 'required|min:4',
        'body' => 'required|min:8',
        'category' => 'required',
        'price' => "required|numeric",
        'images.*'=>'image|max:4096',
        'temporary_images.*'=>'image|max:4096',
    ];

    protected $messages = [
        'required' => 'Il campo :attribute è richiesto',
        'min' => 'Il campo :attribute è corto',
        'numeric' => 'Il campo :attribute deve essere un numero',
        'temporary_images.required'=>'l\'immmagine è richiesta',
        'temporary_images.*.image'=>'i file devono essere immagini',
        'temporary_images.*.max'=>'questo formato è troppo grande,prova con uno più piccolo',
        'images.image'=>'il file deve essere un\'immagine',
        'images.max'=>'questo formato è troppo grande,prova con uno più piccolo'
    ];

    //!funzioni per inserimento immagini aggiunte alla function createAnnouncement 

    public function updatedTemporaryImages(){
        if ($this->validate([
            'temporary_images.*'=>'image|max:4096',
        ])){
            foreach ($this->temporary_images as $image){
                $this->images[]=$image;
            }
        }
    }

    public function removeImage($key){
        if(in_array($key,array_keys($this->images))){
            unset($this->images[$key]);
        }
    }


    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function createAnnouncement()
    {
        $this->validate();
        $this->announcement=Category::find($this->category)->announcements()->create($this->validate());

        $this->announcement->user()->associate(Auth::user());
        $this->announcement->save();
        if(count($this->images)){
            foreach($this->images as $image){
                // $this->announcement->images()->create(['path'=>$image->store('images','public')]);
                $newFileName="announcements/{$this->announcement->id}";
                $newImage=$this->announcement->images()->create(['path'=>$image->store($newFileName,'public')]);

                RemoveFaces::withChain([
                    (new ResizeImage($newImage->path, 900 , 900)),
                    (new GoogleVisionSafeSearch($newImage->id)),
                    (new GoogleVisionLabelImage($newImage->id))
                ])->dispatch($newImage->id);
                
            }
            
            File::deleteDirectory(storage_path('/app/livewire-tmp'));
        }
        session()->flash('message','Annuncio inserito con successo! Attendi che un revisore lo accetti.');
        

        $this->cleanForm();
    }

    public function cleanForm()
    {

        $this->title = "";
        $this->body = "";
        $this->price = "";
        $this->category = "";
        $this->image=[];
        $this->temporary_images=[];
        $this->images=[];
        $this->form_id=rand();
    }

    public function render()
    {
        return view('livewire.create-announcement');
    }
}
