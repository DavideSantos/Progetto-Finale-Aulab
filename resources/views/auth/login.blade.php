<x-layout>

    <header>
        <div data-aos="zoom-in-up" class="container my-5 py-5 ">
            <div class="row py-5 align-items-center justify-content-center">
                <div class="col-12 card-login">
                    <h1 class="titleRegister text-center">PrestoShop</h1>
                    <h4 class="subTitle text-center">{{__('ui.accessOurMarketplace')}}</h4>
                    <form class="container p-0" method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="mb-4 d-flex flex-column align-items-center my-5">
                            <div class="w-75">
                                <label class="form-label">{{__('ui.email')}}</label>
                            </div>
                            <input type="email" class="w-75 form-control shadow" placeholder="Email" name="email">
                        </div>
                        <div class="mb-5 d-flex flex-column align-items-center my-5">
                            <div class="w-75">
                                <label class="form-label">{{__('ui.password')}}</label>
                            </div>
                            <input type="password" class="w-75 form-control shadow" placeholder="Password" name="password">
                        </div>
                        <div class="login-button">
                            <div class="d-flex ps-5 align-items-center">
                                <p id="text-login" class="m-0">{{__('ui.firstTimeOnPrestoShop?')}}</p>
                                <a id="text-login" class="my-anchor ms-3" href="{{ route('register') }}">{{__('ui.sign up')}}</a>
                            </div>
                            <button id="my-Button-login" type="submit" class="my-Button">{{__('ui.login')}}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </header>

</x-layout>
