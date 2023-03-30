
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
</head>
<body>

 @foreach($objeto as $f)

    @if($f['idUsuario'] == Auth::id())

    {{ $f['NombreP'] }}, {{ $f['Precio'] }}€ , <img width="60px" src="{{asset($f->Imagen)}}"> 
    
    <a href="{{url("/borrarProducto")}}/{{$f->idCarrito }}">Quitar</a>
    <br>

    @endif
 
  @endforeach

  <form action="{{ url('/welcome') }}" method="POST">
    @csrf
{{--     <input type="hidden" name="producto_id" value="{{ $objeto->id }}"> --}}
    <button type="submit">Comprar</button>
</form>

  {{-- <a href="{{url("/")}}/{{Auth::id()}}">Comprar</a> --}}
</body>
</html>
