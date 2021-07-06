<?php

namespace App\Http\Controllers;

use App\Http\Requests\OrderRequest;
use App\Models\Item;
use App\Models\Order;
use App\Models\Supply;
use App\Tables\OrdersTable;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index(){
        $table = (new OrdersTable())->setup();

        return view('layouts.index',compact('table'));
    }
    public function create(){
        $items = Item::all();
        return view('orders.create',compact('items'));
    }
    public function save(OrderRequest $request){
        $order = new Order($request->all());
        $item = Item::where('id',$order->item_id)->first();
        $order->user_id = auth()->id();
        //
        $order->price = 1.1 * $item->price;
        //
        $order->save();
        if($item->quantity < $order->quantity){
            $needed_quantity = $order->quantity - $item->quantity;
            $supply = new Supply();
            $supply->company_id = $item->manufacturer_id;
            $supply->item_id = $item->id;
            $supply->price = $item->price;
            if($item->auto_fill){
                $supply->quantity = $needed_quantity + $item->minimum_quantity;
            }else{
                $supply->quantity = $needed_quantity;
            }
            $supply->save();
        }

        return redirect()->back()->with('success','Order created successfully');
    }
    public function edit($id){
        $items = Item::all();
        $order = Order::where('id',$id)->first();
        return view('orders.edit',compact('items','order'));
    }
    public function update(OrderRequest $request){
        $order = Order::where('id',$request->id)->first();
        $order->item_id = $request->item_id;
        $order->quantity = $request->quantity;
        $order->price = $request->price;
        $order->save();
        return redirect()->back()->with('success','Order edited successfully');
    }
    public function delete($id){
        $order = Order::where('id',$id)->first();
        $order->delete();
        return redirect()->back()->with('success','Order deleted successfully');
    }
    public function send_view($id){
        $items = Item::all();
        $order = Order::where('id',$id)->first();
        return view('orders.send_view',compact('order','items'));
    }
    public function send(Request $request){
        $order = Order::where('id',$request->id)->first();
        $item = Item::where('id',$order->item_id)->first();
        if($order->quantity > $item->quantity){
            return redirect()->back()->with('error','We dont have enough quantity. Wait for new supply');
        }
        $order->staff_id = auth()->id();
        $order->save();


        $item->quantity = $item->quantity - $order->quantity;
        $item->save();
        if($item->auto_fill){
            if($item->quantity < $item->minimum_quantity){
                $supply = new Supply();
                $supply->company_id = $item->manufacturer_id;
                $supply->item_id = $item->id;
                $supply->price = $item->price;
                $supply->quantity = $item->minimum_quantity - $item->quantity;
                $supply->save();

            }
        }

        return redirect()->back()->with('success','The order is sent');;
    }
    public function view(){}
}
