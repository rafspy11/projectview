@extends('index.index')

@section('title', 'Strona główna')

@section('content')

@if(!Session::get('isLogged'))

<section class="py-5">
    <div class="container">
        <div class="row">
            <div class="col">
                <h1 class="text-center">ProjectView - serwis do prezentacji projektów</h1>
            </div>
        </div>
    </div>
</section>

@include('pages.login.loginForm.loginForm')

@endif

@endsection