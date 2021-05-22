@extends('layout.main')

@section('content')

<div class="container h-100 row mx-auto">
    <div class="col align-self-center">
        <div class="jumbotron">
            <h1 class="display-4">¡Crea una URL corta para compartir!</h1>
            <p class="lead">Pega el link de la página que quieras en el campo de texto.</p>
            <hr class="my-4">
            <form action="{{ route('url.store') }}" method="post">
                @csrf
                <div class="form-group row px-3">
                    <input type="text" class="col-10 form-control" name="url" id="url" placeholder="https://url.aperson.codes">
                    <button type="submit" class="col-2 btn btn-warning me-2">Crear</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection
