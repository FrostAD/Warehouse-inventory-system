<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Tables\MyOrdersTable;
use App\Tables\OrdersTable;
use App\Tables\UsersTable;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $table = (new UsersTable())->setup();

        return view('layouts.index', compact('table'));
    }
    //return user's orders
    public function orders(){
        $table = (new MyOrdersTable())->setup();
        return view('layouts.index',compact('table'));
    }
    public function make_order($id){
        $item = Item::where('id',$id)->first();
        $items = Item::all();
        if($item){
            $selected_id = $item->id;
            return view('users.make_order',compact('selected_id','items'));
        }
    }
}
