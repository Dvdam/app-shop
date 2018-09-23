<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Category;
use File;

class CategoryController extends Controller
{

   //Creamos los metodos index, create y store
    public function index()
    {
    	$categories = Category::orderBy('name')->paginate(10);
    	return view('admin.categories.index')->with(compact('categories')); // Devuelve una vista del  listado de Categorias
    }
    
    public function create()
    {
    	return view('admin.categories.create'); // Devuelve una vista del formulario de Registro
    }
    
    public function store(Request $request)
    {
  		$this->validate($request, Category::$rules, Category::$messages);
    	//Registrar  en la DB
    	// Category::create($request->all());  //Mass assigment (asignacion masiva)
        $category = Category::create($request->only('name', 'description'));

        if ($request->hasFile('image')){
        $file = $request->file('image');
        $path = public_path().'/images/categories';
        $filename = uniqid(). '-' .$file->getClientOriginalName();
        $moved = $file->move($path, $filename);
            if ($moved) {
                $category->image = $filename;
                $category->save(); // UPDATE
                }

        }

    	// Redireccionamos una vez realizado el insert 
		return redirect('admin/categories');

    }
    public function edit(Category $category)
    {
    	// return "Mostrar aquí el Form de Edición para el producto con id $id";
    	// $category = Category::find($id);
    	return view('admin.categories.edit')->with(compact('category'));
    }
    public function update(Request $request, Category $category)
    {
  		$this->validate($request, Category::$rules, Category::$messages);
		// $category->update($request->all()); //UPDATE

        $category->update($request->only('name', 'description'));
        if ($request->hasFile('image')){
        $file = $request->file('image');
        $path = public_path().'/images/categories';
        $filename = uniqid(). '-' .$file->getClientOriginalName();
        $moved = $file->move($path, $filename);
            if ($moved) {
                $previousPath = $path.'/'.$category->image;

                $category->image = $filename;
                $saved = $category->save(); // UPDATE

                if ($saved)
                    File::delete($previousPath);


                }

        }
 
		return redirect('admin/categories');
    }

    public function destroy(Category $category)
    {
		$category->delete(); //DELETE
		return back();

    }


}
