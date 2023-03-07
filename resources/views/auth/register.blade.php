<x-layout>

    <header>
        <div data-aos="zoom-in-up" class="container my-5 py-5 ">
            <div class="row py-5 align-items-center justify-content-center">
                <div class="col-12 card-login">
                    <div class="boxAlert">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                    </div>
                    <h1 class="titleRegister text-center">PrestoShop</h1>
                    <h4 class="subTitle text-center">{{__('ui.becomeOneOfOurUsers')}}</h4>
                    <form class="container p-0" method="POST" action="{{ route('register') }}">
                        @csrf
                        <div class="mb-4 d-flex flex-column align-items-center my-5">
                            <div class="w-75">
                                <label class="form-label ">{{__('ui.nameAndSurname')}}</label>

                            </div>
                            <input type="text" class="w-75 form-control shadow" placeholder="{{__('ui.nameAndSurname')}}"
                                name="name">
                        </div>
                        <div class="mb-5 d-flex flex-column align-items-center my-5">
                            <div class="w-75">
                                <label class="form-label ">{{__('ui.emailAddress')}}</label>

                            </div>
                            <input type="email" class="w-75 form-control shadow"
                                placeholder="{{__('ui.emailAddress')}}" name="email">
                        </div>
                        <div class="mb-5 d-flex flex-column align-items-center my-5">
                            <div class="w-75">
                                <label class="form-label ">{{__('ui.password')}}</label>

                            </div>
                            <input type="password" class="w-75 form-control shadow" placeholder="{{__('ui.password')}}"
                                name="password">
                        </div>
                        <div class="mb-5 d-flex flex-column align-items-center my-5">
                            <div class="w-75">
                                <label class="form-label ">{{__('ui.passwordConfirmation')}}</label>

                            </div>
                            <input type="password" class="w-75 form-control shadow" placeholder="{{__('ui.passwordConfirmation')}}"
                                name="password_confirmation">
                        </div>
                        <div class="login-button">
                            <div class="d-flex ps-5 align-items-center">
                                <p class="m-0">{{__('ui.alreadyRegistered?')}}</p>
                                <a class="my-anchor ms-3" href="{{ route('login') }}">{{__('ui.login')}}</a>
                            </div>
                            <button type="submit" class="my-Button">{{__('ui.sign up')}}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </header>

</x-layout>
