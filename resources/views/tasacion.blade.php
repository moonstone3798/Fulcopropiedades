@include('layouts.header')

<main>  

<div class="contacto">
<h1 id="venta">Tasación</h1> 
<form action="enviar.php" method="post" onsubmit="return validarContacto();">
<input type="text" class="textbox" placeholder="Nombre y apellido" id="nombre" name="nombre" required>
<br>
<input type="tel" class="textbox" placeholder="Telefono" id="telefono" name="telefono" required>
<br>
<input type="email" class="textbox" placeholder="E-Mail" id="email" name="email" required>
<br>
<textarea placeholder="Consulta" name="consulta" id="consulta" required></textarea>
<br>
<input type="submit" value="Enviar">

</form>
</div>
</main>
    @include('layouts.footer')