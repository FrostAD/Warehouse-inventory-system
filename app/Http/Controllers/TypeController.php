<?php

namespace App\Http\Controllers;

use App\Http\Requests\TypeRequest;
use App\Models\Type;
use App\Tables\TypesTable;
use Illuminate\Http\Request;

class TypeController extends Controller
{
    public function index(){
        $table = (new TypesTable())->setup();

        return view('layouts.index',compact('table'));
    }
    public function create(){
        return view('types.create');
    }
    public function save(TypeRequest $request){
        $type = Type::create($request->all());

        return redirect()->back()->with('success','Type created successfully');
    }
    public function edit($id){
        $type = Type::where('id',$id)->first();
        return view('types.edit',compact('type'));
    }
    public function update(Request $request){
        $type = Type::where('id',$request->id)->first();
        $type->name = $request->name;
        $type->save();
        return redirect()->route('types.index')->with('success','Type edited successfully');
    }
    public function delete($id){
        $type = Type::where('id',$id)->first();
        $type->delete();
        return redirect()->back()->with('success','Type deleted successfully');
    }

}
