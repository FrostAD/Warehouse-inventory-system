<?php

namespace App\Http\Controllers;

use App\Http\Requests\ItemRequest;
use App\Models\Category;
use App\Models\Company;
use App\Models\Item;
use App\Models\Type;
use App\Tables\ItemsTable;
use App\Tables\UserItemsTable;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    public function index()
    {
        $table = (new ItemsTable())->setup();

        return view('layouts.index', compact('table'));
    }
    public function user_index()
    {
        $table = (new UserItemsTable())->setup();

        return view('layouts.index', compact('table'));
    }

    public function create()
    {
        $type = Type::where('name','Manufacturer')->first();
        $manufacturers = Company::where('type_id',$type->id)->get();

        $categories = Category::all();
        return view('items.create', compact('manufacturers', 'categories'));
    }

    public function save(ItemRequest $request)
    {
        Item::create($request->all());

        return redirect()->back()->with('success','Item created successfully');

    }

    public function edit($id)
    {
        $item = Item::where('id', $id)->first();
        $manufacturers = Company::all();
        $categories = Category::all();
        return view('items.edit', compact('item', 'manufacturers', 'categories'));
    }

    public function update(ItemRequest $request)
    {
        $item = Item::where('id', $request->id)->first();
        $item->name = $request->name;
        $item->price = $request->price;
        $item->quantity = $request->quantity;
        $item->minimum_quantity = $request->minimum_quantity;
        $item->auto_fill = $request->auto_fill;
        $item->manufacturer_id = $request->manufacturer_id;
        $item->category_id = $request->category_id;

        $item->save();
        return redirect()->back()->with('success','Item edited successfully');


    }

    public function delete($id)
    {
        $item = Item::where('id',$id)->first();
        $item->delete();
        return redirect()->back()->with('success','Item deleted successfully');
    }

    public function view()
    {
    }
}
