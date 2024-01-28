<x-app-layout>
    <x-slot name="header">
        
<h1>Administrar Inmuebles</h1>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div >
            

<br>
@section('js')
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

@if ( session('eliminar')== 'ok' )
<script>
Swal.fire(
      '¡Eliminado!',
      'La propiedad se eliminó correctamente',
      'success'
    )
    </script>
@endif
@if ( session('agregar')== 'ok' )
<script>
Swal.fire(
      '¡Agregado!',
      'La propiedad se creó correctamente',
      'success'
    )
    </script>
@endif
@if ( session('modificar')== 'ok' )
<script>
Swal.fire(
      '¡Modificada!',
      'La propiedad se modificó correctamente',
      'success'
    )
    </script>
@endif
@endsection
<table class="table table-hover">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Imagen</th>
      <th scope="col">Dirección</th>
      <th scope="col">Precio de venta</th>
      <th scope="col">Precio de alquiler</th>
      <th scope="col">Descripción</th>
      <th colspan="2" scope="col"> <button> <a href="/agregarInmueble"  class="btn btn-success mr-3" >
                    Agregar
                </a></button></th>
    </tr>
  </thead>
  <tbody>
  @foreach( $inmuebles as $inmueble )
  @php
  $imagenesArray = explode('|', $inmueble->imagenes);
@endphp  
  <tr>
      <th scope="row">{{ $inmueble->id }}</th>
      <td><img src="/inmuebles/{{ array_values($imagenesArray)[0] }} " class="img-thumbnail" style="width: 150px ; height:120px; object-fit:cover"></td>
      <td>{{ $inmueble->direccion }}</td>
      <td>{{ $inmueble->preciov }}</td>
      <td>{{ $inmueble->precioa }}</td>
      <td>{{ $inmueble->descripcion }}</td>
     
      <td> <button>
               <a href="/modificarInmueble/{{ $inmueble->id }}"  class="btn btn-secondary">
                    Modificar
                </a></button></td>
    <td>    <button>
                 <a href="/eliminarInmueble/{{ $inmueble->id }}"   class="btn btn-danger btn-block" >
                    Eliminar
                </a></button></td>
    </tr>
   


    @endforeach
  </tbody>
</table>
<br><br>
<div class="d-flex justify-content-center">

    {{ $inmuebles->links() }}
</div>


</div>
        </div>
    </div>

</x-app-layout>