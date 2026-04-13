<h1>Crear Producto</h1>

<form action="{{ route('productos.store') }}" method="POST">
    @csrf

    <input type="text" name="nombre" placeholder="Nombre">
    <input type="text" name="descripcion" placeholder="Descripción">
    <input type="number" name="precio" placeholder="Precio">
    <input type="number" name="existencia" placeholder="Stock">
    <input type="number" name="user_id" placeholder="ID Usuario">

    <button type="submit">Guardar</button>
</form>