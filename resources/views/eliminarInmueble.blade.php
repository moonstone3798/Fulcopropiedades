
<x-app-layout>
<x-slot name="header">
<h1>Eliminar Inmueble</h1>
</x-slot>

<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div >
    

        <div class="col">
          <img src="/inmuebles/{{ explode('|', $Inmueble->imagenes)[0] }}" class="img-thumbnail my-2	"><br>   
        </div>
        
        <div class="col align-self-center">
        <form action="/eliminarInmueble" method="post" class="formulario-eliminar">
        @csrf
        @method('delete')
        <label>   Id:  {{ $Inmueble->id }} </label>
            <br><br>
            <label>   Dirección:  {{ $Inmueble->direccion }} </label>
            <br><br>
            <label> Precio de venta:  usd {{ $Inmueble->precio }}</label>
            <br><br>
            <label> Precio de alquiler:  $ {{ $Inmueble->precio }}</label>
            <br><br>
            <label> Descripción:  {{ $Inmueble->descripcion }}</label>
            <br><br><br>
              

            <input type="hidden" name="id"
                   value="{{ $Inmueble->id}}">
            <input type="hidden" name="direccion"
                   value="{{ $Inmueble->direccion}}">
            <button type="submit" class="btn btn-danger btn-block my-3" id="confirmar">Confirmar baja</button>
            <button><a href="/adminInmuebles" class="btn btn-outline-secondary btn-block">
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
  text: "El inmueble se eliminará definitivamente",
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