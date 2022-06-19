<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Food;

class FoodController extends Controller
{
    public function index() 
    {
        
        $food = Food::all();       
        return  $food;
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
