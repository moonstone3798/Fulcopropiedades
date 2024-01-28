@include('layouts.header')

<main>
    <h1 id="venta">Propiedades en Venta</h1>
    <br>
    <div class="row">
        @foreach ($inmuebles as $inmueble)
            @php
                $imagenesArray = explode('|', $inmueble->imagenes);
            @endphp
            <a href="/mostrarpropiedad/{{ $inmueble->id }}" >
                <div class="col">
                    <div class="card">
                        <img src="/inmuebles/{{ array_values($imagenesArray)[0] }} ">
                        <br>
                        <p>{{ $inmueble->direccion }}</p>
                        <p>USD {{ $inmueble->preciov }}</p>
                    </div>
                </div>
            </a>
        @endforeach
    </div>

    <div class="paginador">
        {{ $inmuebles->links() }}
    </div>
</main>

@include('layouts.footer')
