@include('layouts.header')

<main>
<div id="noticia">
@foreach($noticias as $noticia)
<a href="/noticia/{{$noticia->id}}"><h1>{{ $noticia->titulo }}</h1></a>
@endforeach
</div>
</main>
    @include('layouts.footer')