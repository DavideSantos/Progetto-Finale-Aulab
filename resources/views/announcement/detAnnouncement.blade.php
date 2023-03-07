<x-layout>

    <div class="container">
        <div class="row">
            <div class="col-12 my-5">
                <h1 class="font-announcements">{{ __('ui.announcementdetail') }}</h1>
            </div>
        </div>
    </div>
    {{-- sezione per dettaglio annuncio --}}
    <div class="container card-login">
        <div class="row justify-content-center">
            <div class="col-12 col-md-6">
                <div id="carouselExampleControls" class="carousel slide mx-4" data-bs-ride="carousel">
                    @if(count($announcement->images)>0)
                        <div class="carousel-inner">
                            @foreach ($announcement->images as $image)
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
            </div>
            <div class="col-12 col-md-6 d-flex flex-column justify-content-center align-items-center">
                <h5 class="text-center my-5 titleRevisor"> Dettagli annuncio:</h5>
                <h5> {{ $announcement->title }}</h5>
                <p>{{ $announcement->body }}</p>
                <p>{{ $announcement->price }}€</p>
                <p>{{ __('ui.categories') }}: {{ $announcement->category->name }}</p>
                <p>{{ __('ui.createdby') }}: {{ $announcement->user->name }}</p>
                <p>{{ __('ui.dateOfCreation') }}: {{ $announcement->created_at }}</p>
                <p>{{ __('ui.sellerscontacts') }}: {{$announcement->user->email}}</p>
            </div>

        </div>
    </div>

</x-layout>
