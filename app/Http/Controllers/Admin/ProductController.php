<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Product;
use App\Category;

class ProductController extends Controller
{
    //Creamos los metodos index, create y store
    public function index()
    {
    	// $products = Product::all(); //Devuelve todo
    	$products = Product::paginate(10);
    	return view('admin.products.index')->with(compact('products')); // Devuelve una vista del  listado de Productos
    }
    
    public function create()
    {
    	// Treamos todas las caterogiras desde la base de datos 
        $categories = Category::orderBy('name') ->get();
        return view('admin.products.create')->with(compact('categories')); // Devuelve una vista del formulario de Registro
    }
    
    public function store(Request $request)
    {
    	//Validar los Datos
    	//
    	//Mensajes de error
    	$messages =[
    		'name.required' => 'Es necesario ingresar un nombre para el producto',
    		'name.min' => 'El nombre del producto debe tener al menos 3 caracteres',
    		'description.required' => 'La Descripción breve es un campo obligatorio',
    		'description.max' => 'La descripción Breve solo admite hasta 200 caracteres',
    	    'price.required' => 'Es Obligatorio definir un precio para el producto',
    		'price.numeric' => 'Ingrese un precio válido',
    		'price.min' => 'No se admiten valores negativos'
    	];
    	//Las reglas que queremos validar son un areglo asociativo (array asociativo)
    	$rules = [
    		'name' => 'required|min:3',
    		'description' => 'required|max:200',
    		'price' => 'required|numeric|min:0'

    	];

    	$this->validate($request, $rules, $messages);
    	//Registrar el nuevo producto en la DB
    	//Para imprimir los resultados usamos el metodo dd()
		// dd($request->all()); Vemos en formato json los datos del formulario

		// Creamos un nuevo producto que va a ser una Nueva Isntancia de la clase Product
		$product = new Product();
		$product->name = $request->input('name');
		$product->description = $request->input('description');
		$product->price = $request->input('price');
		$product->long_description = $request->input('long_description');
        $product->category_id = $request->category_id;
		$product->save(); //Hacemos el insert

		// Redireccionamos una vez realizado el insert 
		return redirect('admin/products');

    }
    public function edit($id)
    {
        $categories = Category::orderBy('name') ->get();
    	$product = Product::find($id);
    	return view('admin.products.edit')->with(compact('product', 'categories'));
    }
    public function update(Request $request, $id)
    {
  		
    	//Validar los Datos
    	//Mensajes de error
    	$messages =[
    		'name.required' => 'Es necesario ingresar un nombre para el producto',
    		'name.min' => 'El nombre del producto debe tener al menos 3 caracteres',
    		'description.required' => 'La Descripción breve es un campo obligatorio',
    		'description.max' => 'La descripción Breve solo admite hasta 200 caracteres',
    	    'price.required' => 'Es Obligatorio definir un precio para el producto',
    		'price.numeric' => 'Ingrese un precio válido',
    		'price.min' => 'No se admiten valores negativos'
    	];
    	//Las reglas que queremos validar son un areglo asociativo (array asociativo)
    	$rules = [
    		'name' => 'required|min:3',
    		'description' => 'required|max:200',
    		'price' => 'required|numeric|min:0'

    	];

    	$this->validate($request, $rules, $messages);

  		$product = Product::find($id);
		$product->name = $request->input('name');
		$product->description = $request->input('description');
		$product->price = $request->input('price');
		$product->long_description = $request->input('long_description');
        $product->category_id = $request->category_id;
		$product->save(); //UPDATE

		// Redireccionamos una vez realizado el insert 
		return redirect('admin/products');

    }

    public function destroy($id)
    {
  		$product = Product::find($id);
		$product->delete(); //UPDATE

		// Redireccionamos una vez realizado el insert 
		// return redirect('admin/products');
		return back();

    }
}
