<?php

namespace App\Http\Controllers;

use App\Http\Requests\SupplyRequest;
use App\Models\Company;
use App\Models\Item;
use App\Models\Supply;
use App\Models\Type;
use App\Tables\SuppliesTable;
use Illuminate\Http\Request;

class SupplyController extends Controller
{
    public function index()
    {
        $table = (new SuppliesTable())->setup();

        return view('layouts.index', compact('table'));
    }

    public function create()
    {
        $suppliers = Company::all();
        $items = Item::all();
        return view('supplies.create', compact('suppliers', 'items'));
    }

    public function save(SupplyRequest $request)
    {
        $supply = new Supply($request->all());
        if ($supply->price == null) {
            $item = Item::where('id', $supply->item_id)->first();
            $supply->price = $item->price;
        }
        $supply->save();

        return redirect()->back()->with('success', 'Supply created successfully');
    }

    public function edit($id)
    {
        $supply = Supply::where('id', $id)->first();
        $suppliers = Company::all();
        $items = Item::all();

        return view('supplies.edit', compact('supply', 'suppliers', 'items'));
    }

    public function update(SupplyRequest $request)
    {
        $supply = Supply::where('id', $request->id)->first();
        $supply->company_id = $request->company_id;
        $supply->item_id = $request->item_id;
        $supply->quantity = $request->quantity;
        $supply->price = $request->price;
        $supply->arrives_at = $request->arrives_at;
        $supply->arrived = $request->arrived;
        $supply->save();

        return redirect()->route('supplies.index')->with('success', 'Supply edited successfully');
    }

    public function delete($id)
    {
        $supply = Supply::where('id', $id)->first();
        $supply->delete();
        return redirect()->route('supplies.index')->with('success', 'Supply deleted successfully');
    }

    public function accept_view($id)
    {
        $supply = Supply::where('id', $id)->first();
        $suppliers = Company::all();
        $items = Item::all();
        return view('supplies.accept_view', compact('supply', 'suppliers', 'items'));
    }

    public function accept(Request $request)
    {
        $supply = Supply::where('id', $request->id)->first();
        $supply->quantity = $request->quantity;
        $supply->arrived = 1;
        $supply->user_id = auth()->id();

        $item = Item::where('id', $supply->item_id)->first();
        $item->quantity = $item->quantity + $supply->quantity;
        $item->save();

        $supply->save();

        return redirect()->route('supplies.index')->with('success', 'Supply is received successfully');
    }

    public function view()
    {
    }
}
