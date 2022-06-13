<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Type;

class TypeController extends Controller
{
    public function index() 
    {
        // If the Content-Type and Accept headers are set to 'application/json', 
        // this will return a JSON structure. This will be cleaned up later.
        return Type::all();
    }
     
    public function show($id) 
    {
        return Type::find($id);
    }
    
   public function store(Request $request) {
        $type = new Type();
        $type->name = $request->name;
        $result = $type->save();
        if($result){
            return ["Biba"];
        }else{
            return ["Boba"];
        }
    }
    
    public function update(Request $request, $id) {
        $Type = Type::findOrFail($id);
        $Type->update($request->all());
    
        return $Type;
    }
    
    public function delete($id) {
        Type::find($id)->delete();
    
        return 204;
    }
}
