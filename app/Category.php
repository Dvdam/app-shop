<?php

namespace App;

use App\Product;

// use Iatstuti\Database\Support\CascadeSoftDeletes;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use SoftDeletes;
    // use SoftDeletes, CascadeSoftDeletes;

    // protected $cascadeDeletes = ['products'];
    protected $dates = ['deleted_at'];



	// Los mensajes y las reglas de validación las Traemos desde el controldor y las pasamos aca al modelo
    	//Validar los Datos - Mensajes de error - Agregando delante de los mensajes PUBLIC STATIC
	public static $messages =[
		'name.required' => 'Es necesario ingresar un nombre para la Categoría',
		'name.min' => 'El nombre de la Categoría debe tener al menos 3 caracteres',
		'description.max' => 'La descripción Breve solo admite hasta 250 caracteres'
	];
	//Las reglas que queremos validar son un areglo asociativo (array asociativo)
	public static $rules = [
		'name' => 'required|min:3',
		'description' => 'max:250'
	];

    // PAra la importacion masiva de datos, osea crear categorias en la base de datos (mass asigmment)
	protected $fillable = ['name','description', 'deleted_at'];
    // PAra la importacion masiva de datos, osea crear categorias en la base de datos (mass asigmment)

    // $category->products
    public function products()
    {
        return $this->hasMany(Product::class);

    }



// Mostramos la imagen destacada del primer producto de la categria
    public function getFeaturedImageUrlAttribute()
    {
    	if ($this->image)
            return '/images/categories/'.$this->image;
        //else
     //    $featuredProduct = $this->products()->first();
    	// return $featuredProduct->featured_image_url;
        $firstProduct = $this->products()->first();
        if ($firstProduct)
            return $firstProduct->featured_image_url;

        return '/images/default.png';
    }
}
