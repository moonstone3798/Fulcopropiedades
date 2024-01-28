
<x-app-layout>
<x-slot name="header">
</x-slot>

<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
    @section('js')
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        @if( $errors->any() )
     
        <script>
Swal.fire(
      'No se puede modificar la noticia porque:',
      '   @foreach( $errors->all() as $error )<ul><li>{{ $error }}</li></ul>  @endforeach',
      'error'
    )
    </script>
   
@endif
@endsection
        <div class="modificar">
       <div class="container-fluid p-4">
        <div class="row justify-content-md-center">
            <div class="col-md-9">
                <br>
                <form action="/modificarNoticia" method="post" enctype="multipart/form-data">
            @csrf
            @method('put')
            <label> Titulo </label>
           <br>
           <input type="text" name="titulo"
                       value="{{ old('titulo', $Noticia->titulo) }}"
                       class="form-control">
           
            <br><br>
            <label>Noticia: </label>
       <br>
                   <textarea name="bajada" id="bajada" cols="100" rows="20" :value="old('bajada', $Noticia->bajada)">{!!old('bajada', $Noticia->bajada)!!}
                   </textarea>
                   <br>
                   <input type="hidden" name="id"
                       value="{{ $Noticia->id }}">
            <br>
            <button class="btn btn-dark mb-3" style="margin-left:37%;  margin-right:10px">Modificar Noticia</button>
            <button> <a href="/adminNoticias" class="btn btn-outline-secondary mb-3" style="text-decoration: none; color:black; background: whitesmoke">
            Volver al panel de Noticias
            </a></button>
           
        </form>
            </div>
        </div>
       </div>
    <script>
     $('#bajada').summernote({
        placeholder: 'Noticia...',
        tabsize: 2,
        height: 300, 
        toolbar: [
          ['style', ['style']],
          ['font', ['bold', 'underline', 'clear']],
          ['color', ['color']],
          ['para', ['ul', 'ol', 'paragraph']],
          ['table', ['table']],
          ['view', ['fullscreen' ]]
        ]
        
      });
    </script>
       

    </div>



    </div>
    </div>
</div>
</x-app-layout>