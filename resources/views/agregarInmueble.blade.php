
<x-app-layout>
<x-slot name="header">
<h1>Agregar un nuevo Inmueble</h1>
</x-slot>

<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div>
        @section('js')
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        @if( $errors->any() )
     
        <script>
Swal.fire(
      'No se puede agregar la propiedad porque:',
      '   @foreach( $errors->all() as $error )<ul><li>{{ $error }}</li></ul>  @endforeach',
      'error'
    )
    </script>
   
@endif
@endsection
    <div></div> 
<div class="agregar">

        <form action="/agregarInmueble" method="post" enctype="multipart/form-data">
        @csrf
            <div class="form-group">
                <label for="direccion">Ingrese la Dirección </label>
                <input type="text" name="direccion"
                       value="{{ old('direccion') }}"
                       class="form-control" id="direccion">
<br><br>
<label for="preciov">Ingrese el Precio de venta </label>
                    <input type="text" name="preciov"
                           value="{{ old('preciov') }}"
                           class="form-control" id="preciov">
                           <br><br>

                           <label for="precioa">Ingrese el Precio de alquiler</label>
                    <input type="text" name="precioa"
                           value="{{ old('precioa') }}"
                           class="form-control" id="precioa">
                           <br><br>
                       <label for="descripcion">Ingrese la Descripción</label>
                       <br>
                       <textarea name="descripcion" id="descripcion" value="{{ old('descripcion') }}" cols="30" rows="10" style="width: 50%"></textarea>
                       <br><br>
                       <label for="destacada">¿Se trata de una propiedad destacada?</label>
                       <select name="destacada" id="destacada"> 
                        <option value="">Seleccionar</option>
                        <option name="destacada" value="1">si</option>
                        <option name="destacada" value="2">no</option>
                       </select>
                       <br><br>
                       
                       <label for="imagenes">Ingrese la imagen principal</label>
                       <input type="file" name="imagenes[]" accept=".jpg, .jpeg, .png" multiple lang="es">
                       <br><br>
            </div>
            <br><br>
           
            <button class="btn btn-dark mr-3" id="boton">Agregar Propiedad</button>
            <button> <a href="/adminInmuebles" class="btn btn-outline-secondary btn-block">Volver al panel de Inmbuebles</a></button>
        </form>
        <br><br>
    </div>
</div>



    </div>
    </div>
</div>
</x-app-layout>