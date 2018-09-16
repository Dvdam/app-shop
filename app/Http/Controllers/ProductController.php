<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Product;
class ProductController extends Controller
{
    //
    public function show($id)
    {
    	$product = Product::find($id);

    	// Logica para mostrar las imagnes en dos Diferentes
    	// Obtenemos las imagenes
    	$images = $product->images;

    	// HAcemos dos colecciones de las Imagenes collet()
    	$imagesLeft = collect();
    	$imagesRight = collect();

    	// Iteramos sobre las imagenes y repartimos las imagenes para un lado y para el otro
    	// Para hacer eso usamos una clave $key (o un indice) con lo cual puedo definir si es par o impar con $key%2 ==0
    	foreach ($images as $key => $image) {
    		if($key%2==0)
    			$imagesLeft->push($image);
    		else
    			$imagesRight->push($image);
    	}
    	// Luego pasamos esas imagenes a la vista en dos colecciones separadas
    	return view('products.show')->with(compact('product', 'imagesLeft', 'imagesRight'));
    }
}
