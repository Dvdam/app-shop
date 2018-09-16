<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;

class TestController extends Controller
{
    public function welcome(){

        // Vamos a mostrar todas las categorias en lugar de los productos
        // $categories = Category::get();
        // Mostramos las categorias que tienen al menso un producto
        $categories = Category::has('products')->get();
        return view('welcome')->with(compact('categories')); 
    }
    // //Podemos definir un Metodo Welcome
    // public function welcome(){

    //     // Vamos a mostrar todos nuestros productos
    //     // $products = Product::all();

    //     // En lugar de mostrar todos nuestros productos nel apagina principal HAORA vamos a mostrar solo 9 productos
    //     $products = Product::paginate(9);



    //     // HAcemos uso de compac para hacer un array asociativo y ahorrar tiempo y no hacerlo nosotros
    //     // Esto hariamos sin compact()
        
    //     // $products = Product::all();
    //     // $varA=5;
    //     // $varB=7;

    //     // $data =[];
    //     // $data['products'] = $products;
    //     // $data['varA'] = $varA;
    //     // $data['varB'] = $varB;
    //     // return view('welcome')->with($data); 
    
    // 	// return view('welcome');
    //     // return view('welcome')->with(compact('products', 'varA', 'varB')); 
    //     return view('welcome')->with(compact('products')); 
    // }

}
