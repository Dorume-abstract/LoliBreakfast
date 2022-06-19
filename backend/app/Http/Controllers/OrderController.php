<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderItem;

class OrderController extends Controller
{

    public function index()
    {
        return Order::All();
    }

    public function show($id)
    {
        return Order::find($id);
    }

    public function store(Request $request)
    {
        // return($request);

        $order = new Order();
        $order->name = $request->name;
        $order->phone = $request->phone;
        $order->address = $request->address;
        $order->save();
        $array = $request->orderItems;
        foreach($array as $element){
            $orderItem = new OrderItem();
            $orderItem->foodId = $element["foodId"];
            $orderItem->quantity = $element["quantity"];
            $orderItem->orderId = $order->id;
            $orderItem->save();
        }
        
        return 200;
        //return $order;
        //return Order::create($order);
    }

    public function update(Request $request, $id)
    {
        $order = Order::findOrFail($id);
        $order->update($request->all());

        return $order;
    }

    public function delete($id)
    {
        Order::find($id)->delete();

        return 204;
    }
}
