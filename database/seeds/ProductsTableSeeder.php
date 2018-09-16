<?php

use Illuminate\Database\Seeder;

use App\Product;
use App\Category;
use App\ProductImage;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Haremos uso del MODEL FACTORIES
        // Podemos usar dos metodos - MAKE(Crea objetos) o CREATE (Crea objetos y los guarda en la base de datos)
        //  Con esta linea solo creamos UN PRODucto con la fabrica de Prodcutos "factory(Product::class)->make()"
         //  De esta manera creamos los Prodcutos que Queremos con  la fabrica de Prodcutos "factory(Product::class, 100)->make()"
        // factory(Product::class, 100)->create();

        // Aca hacemos uso de los seed creados para crera categorias y productos de forma aleatoria
        // factory(Category::class, 5)->create();
        // factory(Product::class, 100)->create();
        // factory(ProductImage::class, 200)->create();


        // Ahora para crear productos y cstegorias en igual cantidad hacemos lo siguiente
        $categories = factory(Category::class, 4)->create();
        $categories->each(function ($category)
        {
            $products = factory(Product::class, 5)->make();
            $category->products()->saveMany($products);

            // Iteramos sobre los prodcutos apra asignarles las imagenes 
            
            $products->each(function ($p)
            {
             $images = factory(ProductImage::class, 4)->make();
             $p->images()->saveMany($images);
            });
        });
        
        
        
        
    }
}
