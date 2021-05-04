<?php

namespace AmoryTraore\Actualite\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use AmoryTraore\Actualite\Models\Category;

class CategoryController extends Controller
{
    public function index(){
        $categories = Category::all();
        return view('actualite::categorie.index', compact('categories'));
    }
    public function show($id){

    }
    public function store(Request $request){
        Category::create($request->all());
        return redirect()->route('categorie');

    }
    public function edit(Request $request, $id){

    }
    public function update(Request $request, $id){
        $cat = Category::findorfail($id);

         $cat->libelle = $request->libelle;
         $cat->save();
         return redirect()->route('categorie');
         
        }   
        public function delete(Request $request, $id){
            $cat = Category::findorfail($id);
            $cat->delete();
            return redirect()->route('categorie');

    }

}
