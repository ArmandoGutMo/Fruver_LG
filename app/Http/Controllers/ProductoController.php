<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Categoria;


class ProductoController extends Controller
{
    /**
     * Mostrar una lista del recurso.
     */
    public function index(Request $request)
    {


        $query = $request->input('query');

        // Si hay un término de búsqueda, filtra los productos por nombre
        if ($query) {
            $product = Producto::where('nombre', 'LIKE', "%{$query}%")->get();
        } else {
            // Si no hay búsqueda, muestra todos los productos
            $product = Producto::all();
        }

        // Pasar la variable 'product' a la vista
        return view('productos.index', compact('product'));
    }

    /**
     * Mostrar el formulario para crear un nuevo recurso.
     */
    public function create()
    {
        $product = Producto::all();
        return view('productos.create', compact('product'));
    }

    /**
     * Almacene un recurso recién creado en el almacenamiento.
     */
    public function store(Request $request)
    {
        // Validar los datos del formulario
        $this->validateProduct($request);

        // Código para almacenar el producto
        $product = new Producto();
        $product->nombre = $request->input('nombre');
        $product->precio = $request->input('precio');
        $product->promocion = $request->input('promocion',null);

        if ($request->hasFile('imagen')) {
            $product->imagen = $request->file('imagen')->store('public/productos');
        }

        $product->save();

        return redirect()->route('productos.index')->with('success', 'Producto agregado con éxito');
    }

    /**
     * Muestra el recurso especificado.
     */
    public function show(string $id)
    {
        $product = Producto::findOrFail($id);
        return view('productos.show', compact('product'));
    }

    /**
     * Muestra el formulario para editar el recurso especificado.
     */
    public function edit(string $id)
    {
        $product = Producto::findOrFail($id);
        return view('productos.edit', compact('product'));
    }

    /**
     * Actualice el recurso especificado en el almacenamiento.
     */
    public function update(Request $request, string $id)
    {
        // Validar los datos del formulario
        $this->validateProduct($request);

        $product = Producto::findOrFail($id);
        $product->fill($request->except('imagen'));

        if ($request->hasFile('imagen')) {
            // Eliminar la imagen antigua si existe
            if ($product->imagen) {
                Storage::delete($product->imagen);
            }
            $product->imagen = $request->file('imagen')->store('public/productos');
        }

        $product->save();

        return redirect()->route('productos.show', $product->id)->with('success', 'Producto actualizado con éxito');
    }

    /**
     * Elimine el recurso especificado del almacenamiento.
     */
    public function destroy(string $id)
    {
        $product = Producto::findOrFail($id);

        // Eliminar la imagen si existe
        if ($product->imagen) {
            Storage::delete($product->imagen);
        }

        $product->delete();

        return redirect()->route('productos.index')->with('success', 'Producto eliminado correctamente');
    }

    /**
     * Valida los datos del producto.
     */
    private function validateProduct(Request $request)
    {
        $messages = [
            'nombre.required' => 'El campo nombre es obligatorio.',
            'nombre.string' => 'El nombre debe ser una cadena de texto.',
            'nombre.max' => 'El nombre no puede tener más de 255 caracteres.',
            'precio.required' => 'El campo precio es obligatorio.',
            'precio.numeric' => 'El precio debe ser un número.',
            'promocion.required' => 'El campo promocion es obligatorio.',
            'promocion.string' => 'La promocion debe ser una cadena de texto.',
            'promocion.max' => 'La promocion no puede tener más de 255 caracteres.',
            'imagen.image' => 'El archivo debe ser una imagen.',
            'imagen.mimes' => 'La imagen debe ser de tipo: jpeg, png, jpg, gif, svg.',
            'imagen.max' => 'La imagen no puede exceder los 2048 kilobytes.',
        ];

        $request->validate([
            'nombre' => 'required|string|max:255',
            'precio' => 'required|numeric',
            'promocion' => 'nullable|string|max:255',
            'imagen' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ], $messages);
    }
}
