@extends('index.index')


@section('title', 'Strona główna')


@if(Session::get('isLogged'))

@section('breadcrumbs')

<section class="pt-3 pb-0">
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="breadcrumbs">
                    <a href="/">Projekty</a> / <span>Nowy projekt</span>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection

@section('page-title', 'Dodaj projekt')

@endif


@section('content')

@if(Session::get('isLogged'))

<section class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-auto">
                <!-- Default form contact -->
                <form class="text-center border border-light p-5 add-project-form" action="/insertProject" method="POST">

                    <!-- <p class="h4 mb-4">Contact us</p> -->

                    <!-- Name -->
                    <input type="text" id="project-name" class="form-control mb-4" placeholder="Nazwa projektu">

                    <!-- Subject -->
                    <!-- <label>Kategoria</label>
                    <select class="browser-default custom-select mb-4">
                        <option value="" disabled>Wybierz kategorię</option>
                        <option value="1" selected>Feedback</option>
                        <option value="2">Report a bug</option>
                        <option value="3">Feature request</option>
                        <option value="4">Feature request</option>
                    </select> -->

                    <!-- Send button -->
                    <button class="btn btn-block" type="submit">Dodaj</button>

                </form>
                <!-- Default form contact -->
            </div>
        </div>
    </div>
</section>

@endif

@endsection