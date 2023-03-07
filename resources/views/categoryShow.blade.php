<x-layout>

    <div data-aos="fade-left" class="container">
        <div class="row mt-5">
            <div class="col-12 my-5">
                <h1 class="font-announcements">{{ $category->name }}</h1>
                @if (session()->has('message'))
                    <div class="d-flex alert alert-warning flex-row">
                        {{ session('message') }}
                    </div>
                @endif
            </div>
        </div>
    </div>
    {{-- foreach per ciclare la card delle sezioni: categoria --}}
    <div class="container">
        <div class="row">
            @forelse($category->announcements->where('is_accepted', true) as $announcement)
                <div data-aos="zoom-in-up" class="col-12 col-md-4 my-4">
                    <div class="card cardCustom">
                        {{-- immagine multipla sennò lorem picsum --}}
                        <img src="{{ !$announcement->images()->get()->isEmpty()? $announcement->images()->first()->getUrl(900, 900): 'https://picsum.photos/200' }}"
                            class="card-img-top m-3 mx-auto img-fluid" alt="">
                        <div class="card-body">
                            <h4 class="card-title text-center">{{ $announcement->title }}</h4>
                            <p class="card-text text-center py-1">{{ $announcement->body }}</p>

                            <p class="card-text text-center py-2 m-0"> {{ $announcement->price }}€</p>
                            <p class="card-text text-center">{{ $announcement->created_at->format('d/m/y') }}</p>
                            <div class="w-300px d-flex justify-content-between">
                                <a class="my-Button-category text-center"
                                    href="{{ route('categoryShow', ['category' => $announcement->category->id]) }}">{{ $announcement->category->name }}</a>
                                <a href="{{ route('detAnnouncement', compact('announcement')) }}"
                                    class="my-Button text-center">{{ __('ui.details') }}</a>
                            </div>
                            @guest
                            @else
                                @if (Auth::user()->is_revisor)
                                    <div class="containerRevisor">
                                        <form
                                            action="{{ route('revisionAnnouncement', ['announcement' => $announcement->id]) }}"
                                            method="POST">
                                            @method('PATCH')
                                            @csrf
                                            <button type="submit"
                                                class="my-Button-index my-4">{{ __('ui.sendForReview') }}</button>
                                        </form>
                                    </div>
                                @endif
                            @endguest
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12 d-flex justify-content-center flex-column align-items-center">
                    <h2 class="titleRevisor mt-5">
                        {{ __('ui.noannouncementscategories') }}
                    </h2>
                    <a href="{{ route('createAnnouncement') }}"><button
                            class="my-Button-category-empty">{{ __('ui.Create') }}
                            {{ __('ui.announcements') }}</button></a>
                </div>
            @endforelse
        </div>
    </div>

</x-layout>
