<form action="{{ url('/update') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <label for="id">Id:</label>
    <input type="text" id="id" name="id" value="{{$objeto->id}}" readonly><br>
    <label for="nombre">Nombre:</label>
    <input type="text" id="nombre" name="nombre" value="{{$objeto->nombre}}" required>
    <br>
    <br>
    <label for="precio">Precio:</label>
    <input type="number" id="precio" name="precio" value="{{ $objeto->precio}}" required>
    <br>
    <label for="imagen">Imagen:</label>
    <input type="file" id="imagen" name="imagen" required>
    <br>
    <button type="submit">Guardar</button>
</form>
