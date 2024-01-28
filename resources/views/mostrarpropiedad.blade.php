@include('layouts.header')
@php
    $imagenesArray = explode('|', $Inmueble->imagenes);
    $arrayCount = count($imagenesArray);
    @endphp

<main>
<div class="mostrar">
    <h1>{{ $Inmueble->direccion }}</h1>
    <br>
    <div id="carouselImagenes" class="carousel slide" data-bs-ride="false" data-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="/inmuebles/{{ array_values($imagenesArray)[0] }}" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block">
                </div>
            </div>
            @foreach (array_slice($imagenesArray, 1, $arrayCount) as $imagen)
                <div class="carousel-item">
                    <img src="/inmuebles/{{ $imagen }}" class="d-block w-100" alt="...">
                    <div class="carousel-caption d-none d-md-block"></div>
                </div>
            @endforeach
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselImagenes" data-bs-slide="prev">
            <span class="carousel-control-prev-icon bkg-color-dark-gray" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselImagenes" data-bs-slide="next">
            <span class="carousel-control-next-icon bkg-color-dark-gray" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
    <p>Precio de venta: us$ {{ $Inmueble->preciov }}</p>
    <p>Precio de alquiler $ {{ $Inmueble->precioa }}</p>
    <p>{{ $Inmueble->descripcion }}</p>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>

@if ($errors->any())
    <div class="alert alert-danger col-8 mx-auto p-2">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
</main>
@include('layouts.footer')
