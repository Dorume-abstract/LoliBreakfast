<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Food;

class FoodController extends Controller
{
    public function index() 
    {
        // If the Content-Type and Accept headers are set to 'application/json', 
        // this will return a JSON structure. This will be cleaned up later.
        return Food::all();
    }
     
    public function show($id) 
    {
        return Food::find($id);
    }
    
   public function store(Request $request) {
        return Food::create($request->all);
    }
    
    public function update(Request $request, $id) {
        $food = Food::findOrFail($id);
        $food->update($request->all());
    
        return $food;
    }
    
    public function delete($id) {
        Food::find($id)->delete();
    
        return 204;
    }
}
