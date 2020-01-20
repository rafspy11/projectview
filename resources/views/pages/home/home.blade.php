@extends('index.index')


@section('title', 'Strona główna')


@if(Session::get('isLogged'))

@section('page-title', 'Projekty')

@endif


@section('content')

@if(!Session::get('isLogged'))

<section class="pt-5 pb-5">
    <div class="container">
        <div class="row">
            <div class="col">
                <h1 class="page-title text-center">ProjectView - serwis do prezentacji projektów</h1>
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
            <div class="projects__item col-lg-3 col-md-4 col-sm-6 projects__item--add">
                <a href="/project/add" class="projects__item-link">
                    <span class="fas fa-folder-plus"></span>
                    <span>Utwórz nowy projekt</span>
                </a>
            </div>
            @foreach($projects as $project)
            <div class="projects__item col-lg-3 col-md-4 col-sm-6 {{ $project->state == 'closed' ? 'projects__item--closed' : '' }}">
                <a href="/project/{{ $project->id }}" class="projects__item-link">
                    <span class="fas fa-folder{{ $project->state == 'open' ? '-open' : '' }}"></span>
                    <span>{{ $project->name }}</span>
                </a>
            </div>
            @endforeach
        </div>
    </div>
</section>

@endif

@endsection