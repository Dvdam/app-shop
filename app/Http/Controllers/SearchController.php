<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;

class SearchController extends Controller
{
    //
    public function show(Request $request)
    {
    	// En caso que tenga un error de conversion al momento de mostrar los resultados puedo cambiar mi consulta por:
    	// $query = $request->query;   POR: $query = $request->input('query'); (somo muy implicitos y pedimos el campo)
    	$buscador = $request->buscador;
    	$products = Product::where('name', 'like', "%$buscador%")->paginate(5);

    	// Creamos la logica necesaria para enviar a la pagina de un producto en particular si este existe
    	if ($products->count() == 1) {
    		$id = $products->first()->id;
    		return redirect("products/$id");  // 'products/'.$id
    	}
    	return view('search.show')->with(compact('products', 'buscador'));
    }
    // Creamos un metodo para obtener el listado de prodcutos en formato json
    public function data()
    {
    	$products = Product::pluck('name');
    	return $products;
    }
}
