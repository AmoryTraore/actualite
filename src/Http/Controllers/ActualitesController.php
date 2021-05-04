<?php

namespace AmoryTraore\Actualite\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use AmoryTraore\Actualite\Models\Actualite;
use AmoryTraore\Actualite\Models\Category;

class ActualitesController extends Controller
{
    public function index(){
        $actualites = Actualite::all();
        return view('actualite::actualites.index', compact('actualites'));
    }
    public function show($id){
       
        $actualite = Actualite::findorfail($id);
        dd($actualite);
    }
    public function store(Request $request){
        $actu = new Actualite();
        
        $actu->titre=  $request->titre;
       $actu->image=  $request->file('image')->store('actualites');
        $actu->categories_id =  $request->category;
        $actu->description=  $request->description;
        $actu->save();

     
        return redirect()->route('actualite');
        
    }
    public function update(Request $request, $id){
       
        $actu= Actualite::findorfail($id);
        
        $actu->titre=  $request->titre;

        if ($request->hasfile('image')) {
            $actu->image=  $request->file('image')->store('actualites');
        }
        $actu->categories_id =  $request->category;
        $actu->description=  $request->description;
        $actu->save();
        return redirect()->route('actualite');
    }
    public function delete($id){
        $actu= Actualite::findorfail($id);
        $actu->delete();
        return redirect()->route('actualite');

    }
}
