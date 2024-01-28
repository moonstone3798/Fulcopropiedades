<x-app-layout>
    <x-slot name="header" style="background-color: rgba(73, 63, 45, 0.555);">
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="background-color: rgba(255, 255, 255, 0.329); overflow-hidden sm:rounded-lg">
               <h1 style="font-size:48px; color: rgb(66, 66, 66)">{{ Auth::user()->name }}, Bienvenido al panel de administración</h1>
               <br>
               <h3 style="font-size:24px">¿Qué cambio le gustaría realizar hoy?</h3>
               <br><br>
               <p>En este panel tendrá la posibilidad de administrar las propiedades en venta y en alquiler de su empresa. Las acciones que podrá realizar son: crear, eliminar, modificar una propiedad. Recuerde que debe subir 5 imagenes.</p>
            <br><br>
            <h2 style="font-size:35px; text-align: center;">Novedades</h2>
            <br>
            <h3 style="font-size:24px">Registrar un nuevo admin</h3>
            <br>
            <p>Para poder facilitarle la incorporación de un empleado a su empresa, hemos agregado un area de registro a la que solo se puede acceder una vez que este logueado. De esta forma solo pueden agregar nuevos administradores, las personas que ya son parte de su staff.</p>
        <br>    <br>
        <h3 style="font-size:24px">Eliminar un admin</h3>
        <br>
        <p>En el caso que una persona ya no pertenezca más al staff, las acciones que debe realizar para darse de baja de la página, son las siguientes. Una vez logueado, debe tocar el boton de arriba a la derecha (donde dice su nombre), y tocar la opcioón de perfil. Cuando ingrese en el perfil debe ir hasta abajo de todo, y tocar eliminar usuario, ingresará su contraseña para corroborar que no es una equivocación el haber tocado eliminar, y se eliminará dicho usuario de forma permanente</p>
  <br><br>
  <h3 style="font-size:24px">Mayor seguridad</h3>
  <br>
  <p>Si cree que alguien pudo haber hackeado su cuenta, puede corroborarlo. Vaya a la Configuración de su perfil (si tiene dudas donde esta, lea el punto de arriba), y baje hasta donde dice sesiones del navegador. Una vez allí podrá ver desde que dispositivos han abierto su perfil. Si reconoce que usted no lo abrió en uno de esos dispositivos, toque cerrar sesion en otras sesiones del navegador. Ingrese su contraseña para corroborar que es lo que realmente quiere hacer, y luego toque cerrar sesión en otras sesiones del navegador </p>
<br><br>

</div>
        </div>
    </div>
</x-app-layout>
