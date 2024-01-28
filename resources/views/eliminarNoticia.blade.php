
<x-app-layout>
<x-slot name="header">
<h1>Eliminar Noticia</h1>
</x-slot>

<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div >

        <div class="col  align-self-center">
        <form action="/eliminarNoticia" method="post" class="formulario-eliminar">
        @csrf
        @method('delete')
        <label>   Noticia nro:  {{ $Noticia->id }} </label>
            <br><br>
            <label>   Título:  {{ $Noticia->titulo }} </label>
            <br><br>
            <label> Noticia:  {!! $Noticia->bajada !!}</label>
            <br><br>
            

            <input type="hidden" name="id"
                   value="{{ $Noticia->id}}">
            
                   <button type="submit" class="btn btn-danger btn-block my-3" id="confirmar">Confirmar baja</button>
            <button><a href="/adminNoticias" class="btn btn-outline-secondary btn-block">
                Volver a panel
            </a></button>


        </form>
        </div>
    

            
@section('js')
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
$('.formulario-eliminar').submit(function(e){
e.preventDefault();
Swal.fire({
  title: '¿Estás seguro?',
  text: "La noticia se eliminará definitivamente",
  icon: 'warning',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  confirmButtonText: 'Si, eliminar',
  cancelButtonText: 'Cancelar'
}).then((result) => {
  if (result.isConfirmed) {
  
    this.submit();
  }
})
});






    
</script>
@endsection

</div>
    </div>
</div>
</x-app-layout>