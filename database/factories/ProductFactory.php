<?php

use Faker\Generator as Faker;

use App\Product;

$factory->define(Product::class, function (Faker $faker) {
    return [
        // Aca indicamos que  valores va  a recibir la columan de productos
        // Al ser un arreglo asociativo. escribimos los atributos
        // $table->string('name');
        // 
        // 'name' => $faker->word; Aca le digo que me devuelve una palabra
       	//  'description' => $faker->sentence(10); Le pido que me genere 10 palabras aleatorias
      	// 'long_description' => $faker->text, Que nos devuelva un texto
       	// 	'price' => $faker->randomFloat(2, 5, 150) - Dos decimales y como valor minimo 5 y valor maximo 150.

            'name' => substr($faker->sentence(3), 0, -1),
            'description' => $faker->sentence(10),
          	'long_description' => $faker->text,
           	'price' => $faker->randomFloat(2, 5, 150),
            // Para catalogar los productos dentro de una categoria
            'category_id' =>$faker->numberBetween(1, 5)

    ];
});
