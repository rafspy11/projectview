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

@if(Session::get('isLogged'))

<section class="py-5">
    <div class="container">
        <div class="row">
            @foreach($projects as $project)
            <div class="projects__item col-lg-3 col-md-4 col-sm-6 {{ $project->state == 'closed' ? 'projects__item--closed' : '' }}">
                <span class="fas fa-folder{{ $project->state == 'open' ? '-open' : '' }}"></span>
                <a href="/project/{{ $project->id }}">{{ $project->name }}</a>
            </div>
            @endforeach
        </div>
    </div>
</section>

@endif

@endsection