<x-layout>

    <div class="container-fluid p-5 mt-5">
        @if (session()->has('message'))
            <div class="d-flex alert alert-danger flex-row">
                {{ session('message') }}
            </div>
        @endif
        <div id="hero" class="row justify-content-between align-items-center mb-5 ">
            <div class="col-12 col-md-5 d-flex align-items-center hero flex-column ">
                <h1 class="title">
                    PrestoShop <span></span>
                </h1>
                <h2 class="">{{ __('ui.buying,Selling,HasNeverBeenEasier!') }} <span></span></h2>

                <a data-aos-duration="1000" data-aos="zoom-in" data-aos-delay="2000" class=" my-Button-workwithus" href="{{ route('formRevisor') }}">{{ __('ui.workWithUs') }}</a>
            </div>
            <div data-aos-duration="2000" data-aos="fade-left" class="col-12 col-md-6 d-flex flex-column justify-content-center align-items-center mb-2">
                <video loop autoplay id="videoWelcome" class="rounded my-5 " autoplay="true" controls
                    src="https://static.vecteezy.com/system/resources/previews/003/220/275/mp4/woman-shopping-online-on-smartphone-with-credit-card-at-home-free-video.mp4"></video>


                    
            </div>     
        </div>
    
        <div class="container my-5">
                <div class="row justify-content-center my-5">
                    @foreach ($announcements as $announcement)
                        <div class="col-12 col-md-6 col-lg-4 col-xl-4 my-5 d-flex justify-content-center">
                            <div class="card cardWelcome">
                                <img class="rounded w-75"
                                    src="{{ !$announcement->images()->get()->isEmpty()? $announcement->images()->first()->getUrl(900, 900): 'https://picsum.photos/200' }}"
                                    class="card-img-top m-3 mx-auto img-fluid" alt="">
                                <div class="card-body ">
                                    <h4 class="card-title"> {{ $announcement->title }}</h4>
                                    {{-- <p class="card-text py-1">Descrizione: {{ $announcement->body }}</p> --}}
                                    <p class="card-text text-center text-bold py-2">{{ $announcement->price }}€</p>
                                    {{-- <p class="card-text">{{ $announcement->created_at->format('d/m/y') }}</p> --}}
                                    <div class="d-flex justify-content-between w-300px">
                                        <a class="my-Button-category text-center"
                                            href="{{ route('categoryShow', ['category' => $announcement->category->id]) }}">{{ $announcement->category->name }}</a>
                                        <a href="{{ route('detAnnouncement', compact('announcement')) }}"
                                            class="my-anchor my-Button text-center">{{ __('ui.details') }}</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
    </div>

</x-layout>
