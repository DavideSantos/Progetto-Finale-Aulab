<div class="container">
    <div class="container">
        <div class="row mt-5">
            <div class="col-12 my-5">

                <h1 class="font-announcements">
                    {{ __('ui.createYourAnnouncements') }}
                </h1>
                @if (session()->has('message'))
                    <div class="d-flex alert alert-success flex-row">
                        {{ session('message') }}
                    </div>
                @endif
            </div>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-6 md-col-6 py-4 card-login my-5">
            <div>
                <form wire:submit.prevent='createAnnouncement'>
                    <div class="mb-3 d-flex flex-column align-items-center my-5">
                        <div class="w-75">
                            <label class="form-label">{{ __('ui.titleOfTheAnnouncement') }}</label>
                        </div>
                        <input type="text" class="form-control w-75 shadow" wire:model.lazy="title"
                            placeholder="{{ __('ui.title') }}">
                        @error('title')
                            <span class="error">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3 d-flex flex-column align-items-center my-5">
                        <div class="w-75">
                            <label class="form-label">{{ __('ui.descriptionOfTheAnnouncement') }}</label>
                        </div>
                        <textarea type="text" class="form-control w-75 shadow" wire:model.lazy="body"
                            placeholder="{{ __('ui.description') }}"></textarea>
                        @error('body')
                            <span class="error">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3 d-flex flex-column align-items-center my-5">
                        <div class="w-75">
                            <label class="form-label">{{ __('ui.priceOfTheAnnouncement') }}</label>
                        </div>
                        <input type="number" class="form-control w-75 shadow" wire:model.lazy="price"
                            placeholder="{{ __('ui.price') }}">
                        @error('price')
                            <span class="error">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3 d-flex flex-column align-items-center my-5">
                        <div class=" mb-2 w-75">
                            <label for="category">{{ __('ui.categories') }}</label>
                        </div>
                        <select wire:model.defer="category" id="category" class="w-75 form-control shadow">

                            <option value="">{{ __('ui.selectcategory') }}</option>

                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    {{-- input e rispettivo form per inserimento immagini multiple --}}
                    <div class="mb-3 d-flex flex-column align-items-center my-5">
                        <input type="file" wire:model="temporary_images" name="images" multiple
                            class="form-control w-75 shadow @error('temporary_images.*') is-invalid @enderror"
                            placeholder="img" />
                        @error('temporary_images.*')
                            <p class="text-danger mt-2">{{ $message }}</p>
                        @enderror
                    </div>


                    @if (!empty($images))
                        <div class="row justify-content-center">
                            <div class="col-8">
                                <p class="my-3">{{ __('ui.imagepreview') }}: </p>
                                <div class="row border border-4 my-3 rounded py-4">
                                    @foreach ($images as $key => $image)
                                        <div class="col-4 my-3">
                                            <div class=" mx-auto  rounded img-fluid">
                                                <img src="{{ $image->temporaryUrl() }}" class="shadow img-preview"
                                                    alt="">
                                            </div>
                                            <button type="button"
                                                class="btn btn-danger shadow d-block text-center mt-2 mx-auto"
                                                wire:click="removeImage({{ $key }})">Cancella </button>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    @endif




                    <div class="login-button-create">
                        <button type="submit" class="my-Button-create">{{ __('ui.Create') }}
                            {{ __('ui.announcement') }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
