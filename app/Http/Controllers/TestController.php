<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestController extends Controller
{
    // //Podemos definir un Metodo Welcome
    public function welcome(){
    	return view('welcome');
    }
     //Podemos definir un Metodo Welcome
    // public function welcome(){
    // 	$a = 5;
    // 	$b = 10;
    // 	$c = $a+$b;
    // 	return "El valor de la suma es $c";
    // }
}
