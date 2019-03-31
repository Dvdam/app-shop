<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Product;
use App\ProductImage;
// Declaramos que hacemos uso de la clase FILE
use File;

class ImageController extends Controller
{
    //
	public function index($id)
	{
		$product = Product::find($id);
		// Agreamos una condicion mas para ordenar las imagenes en base a la imagen destacada
		// $images = $product->images;
		$images = $product->images()->orderBy('featured', 'desc')->get();
		// devuleve una vista
		return view('admin.products.images.index')->with(compact('product', 'images'));

	}
	public function store(Request $request, $id)
	{
		// Vamos a Guardar la IMg en nuestro proyecto
		$file = $request->file('photo');
		$path = public_path().'/images/products';
		$filename = uniqid().$file->getClientOriginalName();
		$moved = $file->move($path, $filename);

		// Vamos a crear 1 registro en la tabla product_images
		// Si se gusardo el archivo guardo el resgistro en la base de datos
		if ($moved) {
			$productImage = new ProductImage();
			$productImage->image = $filename;
			// $productImage->featured = false;
			$productImage->product_id = $id;
			$productImage->save(); // INSERT
		}


		// Una vez que se subio todo redirigimos al usaurio donde antes se encontraba
		return back();


	}
	public function destroy(Request $request, $id)
	{
		// Eliminar el Archivo
		// $productImage = ProductImage::find($request->input('image_id'));
		$productImage = ProductImage::find($request->image_id);
		if (substr($productImage->image, 0, 4) === "http"){
			$deleted = true;
		} else {
			$fullPath = public_path().'/images/products/'.$productImage->image;
			$deleted = File::delete($fullPath);
		}
		//  Eliminar el registro de la base de datos
		//  Si la eliminacion fue correcta
		if ($deleted){
			$productImage->delete(); // DELETE
		}
		// Una vez que se subio todo redirigimos al usaurio donde antes se encontraba
		return back();



	}

	public function select($id, $image)
	{
		ProductImage::where('product_id', $id)->update(['featured' => false]);

		$productImage = ProductImage::find($image);
		$productImage->featured = true;
		$productImage->save();

		return back();
	}


}
