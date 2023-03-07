<x-layout>

    <div class="container">
    
        <div class="row align-items-center justify-content-center my-5">
            <div class="col-12 col-md-6">
                <h1 class="font-announcements">Lavora con noi!</h1>
            </div>
                <div class="col-12 col-md-6 py-4 card-login my-5 p-5 py-5">
                    <div>
                        @if (session()->has('message'))
                        <div class="d-flex alert alert-success flex-row">
                            {{ session('message') }}
                        </div>
                        @endif
                        <form  method="POST" action="{{route('becomeRevisor')}}">
                            @csrf
                            <div class="mb-3">
                                <label class="form-label">Nome</label>
                                <input type="text" class="form-control" name="name" placeholder="Nome">
                                @error('name')
                                <span class="error">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Cognome</label>
                                <input type="text" class="form-control" name="surname" placeholder="Cognome">
                                @error('surname')
                                <span class="error">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Email</label>
                                <input type="mail" class="form-control" name="mail" placeholder="Email">
                                @error('mail')
                                <span class="error">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Numero di telefono</label>
                                <input type="number" class="form-control" name="number" placeholder="Numero di Telefono">
                                @error('surname')
                                <span class="error">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Città natale</label>
                                <input type="text" class="form-control" name="city" placeholder="Città">
                                @error('city')
                                <span class="error">{{ $message }}</span>
                                @enderror
                            </div>
                            
                            <div class="mb-3">
                                <label class="form-label">Motiva la tua candidatura</label>
                                <textarea type="text" class="form-control" name="description" placeholder="Motivazione"></textarea>
                                @error('description')
                                <span class="error">{{ $message }}</span>
                                @enderror
                            </div>
                            <button type="submit" class="login-button-workwithus">Invia la candidatura</button>
                        </form>
                    </div>
                    <div class="col-6 col-md-6">
    
                    </div>
                    
                </div>
                
            </div>
            
        </div>




</x-layout>