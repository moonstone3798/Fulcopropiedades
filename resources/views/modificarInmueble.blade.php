<x-app-layout>
    <x-slot name="header">
        <h1>Modificar un Inmueble</h1>
    </x-slot>

    <div class="py-12">

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @section('js')
                <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
                @if ($errors->any())
                    <script>
                        Swal.fire(
                            'No se puede modificar la propiedad porque:',
                            '   @foreach ($errors->all() as $error)<ul><li>{{ $error }}</li></ul>  @endforeach',
                            'error'
                        )
                    </script>
                @endif
            @endsection
            <div class="agregar">

                <form action="/modificarInmueble" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('put')
                    <label> Dirección: </label>
                    <br>
                    <input type="text" name="direccion" value="{{ old('direccion', $Inmueble->direccion) }}"
                        class="form-control">
                    <br><br>
                    <label>Precio de venta: </label>
                    <br>
                    <input type="text" name="preciov" value="{{ old('preciov', $Inmueble->preciov) }}"
                        class="form-control">
                    <br><br>
                    <label>Precio de alquiler: </label>
                    <br>
                    <input type="text" name="precioa" value="{{ old('precioa', $Inmueble->precioa) }}"
                        class="form-control">
                    <br><br>
                    <label>Descripción: </label>
                    <br>
                    <input type="text" name="descripcion" value="{{ old('descripcion', $Inmueble->descripcion) }}"
                        class="form-control">
                    <br><br>

                    <label>Imagen principal:</label> <br>
                    <img src="/inmuebles/{{ explode('|', $Inmueble->imagenes)[0] }}" class="img-thumbnail my-2"><br>

                    <label for="destacada">¿Se trata de una propiedad destacada?</label>
                    <select name="destacada" id="destacada">
                        <option name="destacada" value="1">si</option>
                        <option name="destacada" value="2">no</option>
                    </select>
                    <br><br>

                    <input type="hidden" name="id" value="{{ $Inmueble->id }}">
                    <input type="hidden" name="ImagenAnterior" value="{{ $Inmueble->imagen }}">

                    <br>
                    <button class="btn btn-dark mr-3">Modificar Alquiler</button>
                    <button> <a href="/adminInmuebles" class="btn btn-outline-secondary btn-block">
                            Volver al panel de Alquiler
                        </a></button>

                </form>
            </div>
        </div>
    </div>
    </div>
</x-app-layout>
