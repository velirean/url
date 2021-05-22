@extends('layout.main')

@section('content')

<div class="container h-100 row mx-auto">
    <div class="col align-self-center">
        <div class="jumbotron">
            <h1 class="display-4 text-center mb-5">¡Crea una URL corta para compartir!</h1>
            <form action="{{ route('url.store') }}" method="post">
                @csrf
                <div class="form-group row px-3">
                    <input type="text" class="col-10 form-control" name="destination" id="destination" placeholder="{{ $base_url }}">
                    <button type="submit" class="col-2 btn btn-warning me-2">Crear</button>
                </div>
            </form>
            <hr class="my-4">
            @if ($short_url != null)
                <p class="lead text-center">{{ $short_url }}</p>
            @else
                <p class="lead text-center">Pega el link de la página que quieras en el campo de texto</p>
            @endif
        </div>
    </div>
</div>

@endsection
