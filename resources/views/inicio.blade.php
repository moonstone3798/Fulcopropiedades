@include('layouts.header')

<main>
    <h1 id="venta">Propiedades Destacadas</h1>
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

    <br><br>

    <div class="paginador">
        {{ $inmuebles->links() }}
    </div>
    <div class="mapa">
        <br>
        <h2>¿Dónde estamos?</h2>
        <iframe
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3282.9087028319072!2d-58.430526385194305!3d-34.631747366487865!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x95bccbad598ffcfd%3A0x6786cdda452a8fd4!2sAv.%20Asamblea%20200%2C%20C1424%20CABA!5e0!3m2!1ses-419!2sar!4v1669828819842!5m2!1ses-419!2sar"
            width="400" height="300" style="border:0; " allowfullscreen="" loading="lazy"
            referrerpolicy="no-referrer-when-downgrade"></iframe>
        <p>Av. Asamblea 200</p>
    </div>
</main>

@include('layouts.footer')
