<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Food;

class FoodController extends Controller
{
    public function console_log($data)
    {
        echo '<script>';
        echo 'console.log(' . json_encode($data) . ')';
        echo '</script>';
    }

    public function index()
    {

        $foods = Food::all();
        foreach($foods as $food){
            if(!str_starts_with($food->imgUrl, "http")){
                $food->imgUrl = 'http://' . $_SERVER['SERVER_NAME'] . ':8000/' . $food->imgUrl;
            }
        }
        return  $foods;
    }

    public function show($id)
    {
        return Food::find($id);
    }

    public function store(Request $request)
    {
        return Food::create($request->all);
    }

    public function update(Request $request, $id)
    {
        $food = Food::findOrFail($id);
        $food->update($request->all());

        return $food;
    }

    public function delete($id)
    {
        Food::find($id)->delete();

        return 204;
    }
}
