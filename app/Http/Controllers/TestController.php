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


}
