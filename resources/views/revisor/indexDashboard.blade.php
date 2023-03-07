<x-layout>

    <div class="container car">
        <div class="row mt-5">
            <div class="col-12 my-5">
                <h1 class="font-announcements">
                    {{ $announcement_to_check ? 'Annuncio da revisionare' : 'Non ci sono annunci da revisionare' }}
                </h1>
                @if (session()->has('message'))
                    <div class="d-flex alert alert-warning flex-row">
                        {{ session('message') }}
                    </div>
                @endif
            </div>
        </div>
    </div>

    {{-- condizione per mostrare o meno il carosello degli annunci --}}
    @if ($announcement_to_check)
        <div class="container card-login">
            <div class="row">
                <div class="col-12 col-md-6">
                    <div id="carouselExampleControls" class="carousel slide mx-4" data-bs-ride="carousel">
                    @if(count($announcement_to_check->images)>0)
                        <div class="carousel-inner">
                            @foreach ($announcement_to_check->images as $image)
                                <div class="carousel-item @if($loop->first)active @endif">
                                    <img src="{{$image->getUrl(900,900)}}" class="img-fluid py-3 rounded" alt="">
                                </div>
                            @endforeach
                        </div>
                    @else
                    
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img src="https://picsum.photos/200" class="d-block w-100 img-fluid" alt="">    
                            </div>
                            <div class="carousel-item">
                                <img src="https://picsum.photos/200" class="d-block w-100 img-fluid" alt="">    
                            </div>
                            <div class="carousel-item">
                                <img src="https://picsum.photos/200" class="d-block w-100 img-fluid" alt="">    
                            </div>
                        </div>
                    @endif
                    
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls"
                        data-bs-slide="prev">
                        <span class="carousel-control-prev-icon bg-presto" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls"
                        data-bs-slide="next">
                        <span class="carousel-control-next-icon bg-presto" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
                <div class="d-flex justify-content-evenly my-5">
                    <form action="{{ route('acceptAnnouncement', ['announcement' => $announcement_to_check]) }}"
                        method="POST" >
                        @method('PATCH')
                        @csrf
                        <button type="submit" class="btn btn-success shadow buttonCheck">Accetta</button>
                    </form>
                    <form action="{{ route('rejectAnnouncement', ['announcement' => $announcement_to_check]) }}"
                        method="POST">
                        @method('PATCH')
                        @csrf
                        <button type="submit" class="btn btn-danger shadow buttonCheck">Rifiuta</button>
                    </form>
                </div>
                </div>
                <div class="col-12 col-md-6 d-flex flex-column justify-content-between">
                    <div class="mt-2">
                        <h5 class="text-center my-1 titleRevisor"> Dettagli annuncio:</h5>
                        <p > {{ $announcement_to_check->title }}</p>
                        <p > {{ $announcement_to_check->body }}</p>
                        <p > {{ $announcement_to_check->price }}€</p>
                        <p > {{ $announcement_to_check->category->name }}</p>
                        <p >Creato da: {{ $announcement_to_check->user->name }}</p>
                        <p >Creato il: {{ $announcement_to_check->created_at }}</p>
                        <p >Contatti Venditore: {{ $announcement_to_check->user->email }}</p>
                    </div>
                    @foreach ($announcement_to_check->images as $image)
                    <div class="card-body">
                        <h5 class="tc-accent text-center my-1 titleRevisor"> Revisione immagine:</h5>
                        <p>Adulti: <span class="{{$image->adult}}"></span></p>
                        <p>Satira: <span class="{{$image->spoof}}"></span></p>
                        <p>Medicina: <span class="{{$image->medical}}"></span></p>
                        <p>Violenza: <span class="{{$image->violence}}"></span></p>
                        <p>Contenuto Ammiccante: <span class="{{$image->racy}}"></span></p>
                    </div>
                    @endforeach
                    <div class="col-12">
                        <h5 class="tc-accent my-1 text-center titleRevisor">Tags</h5>
                        <div class="p-2">
                            @foreach ($announcement_to_check->images as $image)
                            @if($image->labels)
                            @foreach($image->labels as $label)
                            <p class="d-inline">{{$label}},</p>
                            @endforeach
                            @endif
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        
        @endif
        <div class="divVuoto"></div>

</x-layout>
