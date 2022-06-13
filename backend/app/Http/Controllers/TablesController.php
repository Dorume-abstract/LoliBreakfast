<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Models\Tables;
class TablesController extends Controller
{
    public function store(Request $request) {
        $table = new Tables();
        $table->userName = $request->userName;
        $table->userNumber = $request->userNumber;
        $table->email = $request->email;
        $table->peopleNumber = $request->peopleNumber;
        $table->date = $request->date;


        $result = $table->save();
        if($result){
            Log::debug("Biba");
            return ["Biba"];
        }else{
            Log::debug("Boba");
            return ["Boba"];
        }
    }
}
