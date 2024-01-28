<x-app-layout>
    <x-slot name="header">
        
<h1>Administrar Noticias</h1>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div >
            
@section('js')
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

@if ( session('eliminar')== 'ok' )
<script>
Swal.fire(
      '¡Eliminado!',
      'La noticia se eliminó correctamente',
      'success'
    )
    </script>
@endif
@if ( session('agregar')== 'ok' )
<script>
Swal.fire(
      '¡Agregado!',
      'La noticia se creó correctamente',
      'success'
    )
    </script>
@endif
@if ( session('modificar')== 'ok' )
<script>
Swal.fire(
      '¡Modificada!',
      'La noticia se modificó correctamente',
      'success'
    )
    </script>
@endif
@endsection
<table class="table table-borderless table-striped table-hover" >
    <thead>
        <tr>
            <th>#</th>
            <th>Titulo</th>
            <th>Noticia</th>
            <th colspan="2">
            <button> <a href="/agregarNoticia"  class="btn btn-success mr-3" >
                    Agregar
                </a></button>
            </th>
        </tr>
    </thead>
    <tbody>
@foreach( $noticias as $noticia )
        <tr>
            <td>{{ $noticia->id }}</td>
            <td style="width:20px">{{ $noticia->titulo }}</td>
            <td>{!! $noticia->bajada !!}</td>
              <td>
                <button>
               <a href="/modificarNoticia/{{ $noticia->id }}" class="btn btn-secondary" >
                    Modificar
                </a></button>
            </td>
            <td>
                <button>
                 <a href="/eliminarNoticia/{{ $noticia->id }}" class="btn btn-danger btn-block" >
                    Eliminar
                </a></button>
            </td>
        </tr>
@endforeach
    </tbody>
</table>
<br><br>
<div class="d-flex justify-content-center">

    {{ $noticias->links() }}
</div>


</div>
        </div>
    </div>
</x-app-layout>