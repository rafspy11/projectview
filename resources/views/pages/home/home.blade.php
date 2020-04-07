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
                    <span class="projects__item-icon fas fa-folder-plus"></span>
                    <span>Utwórz nowy projekt</span>
                </a>
            </div>
            @foreach($projects as $project)
            <div class="projects__item col-lg-3 col-md-4 col-sm-6  mb-4 {{ $project->state == 'closed' ? 'projects__item--closed' : '' }}">
                <span class="projects__item-remove fas fa-trash" data-id="{{ $project->id }}"></span>
                <a href="/project/{{ $project->id }}" class="projects__item-link">
                    <span class="projects__item-icon fas fa-folder{{ $project->state == 'open' ? '-open' : '' }}"></span>
                    <span>{{ $project->name }}</span>
                </a>
            </div>
            @endforeach
        </div>
    </div>
</section>

@endif

@endsection


<div class="modal fade" id="removeProjectModal" tabindex="-1" role="dialog" aria-labelledby="removeProjectModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="removeProjectModalLabel">Usuwanie projektu</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Czy na pewno chcesz usunąć projekt?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Anuluj</button>
                <button type="button" class="project-remove-confirm btn btn-primary">Usuń projekt</button>
            </div>
        </div>
    </div>
</div>