<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use App\Http\Requests\StoreProductoRequest;
use App\Http\Requests\UpdateProductoRequest;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;

class ProductoController extends Controller
{
    public function index()
    {
        $productos = Producto::all();

        return view('productos.index', compact('productos'));
    }

    public function create()
    {
        $this->authorize('create', Producto::class);

        return view('productos.create');
    }

    public function store(StoreProductoRequest $request)
{
    $this->authorize('create', Producto::class);

    $producto = Producto::create($request->validated());

    Log::info('Producto creado', [
        'user_id' => Auth::id(),
        'producto_id' => $producto->id,
        'data' => $request->validated()
    ]);

    return redirect()->route('productos.index')
        ->with('success', 'Producto creado correctamente');
}

    public function show(Producto $producto)
    {
        return view('productos.show', compact('producto'));
    }

    public function edit(Producto $producto)
    {
        $this->authorize('update', $producto);

        return view('productos.edit', compact('producto'));
    }

    public function update(UpdateProductoRequest $request, Producto $producto)
{
    $this->authorize('update', $producto);

    $producto->update($request->validated());

    Log::info('Producto actualizado', [
        'user_id' => Auth::id(),
        'producto_id' => $producto->id,
        'data' => $request->validated()
    ]);

    return redirect()->route('productos.index')
        ->with('success', 'Producto actualizado');
}


    public function destroy(Producto $producto)
{
    $this->authorize('delete', $producto);

    $producto->delete();

    Log::warning('Producto eliminado', [
        'user_id' => Auth::id(),
        'producto_id' => $producto->id
    ]);

    return redirect()->route('productos.index')
        ->with('success', 'Producto eliminado');
}
}