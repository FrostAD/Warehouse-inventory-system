<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use App\Tables\CategoriesTable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(){
        $table = (new CategoriesTable())->setup();

        return view('layouts.index',compact('table'));
    }
    public function create(){
        return view('categories.create');
    }
    public function save(CategoryRequest $request){
        $category = Category::create($request->all());
        return redirect()->back()->with('success','Category added successfully');
    }
    public function edit($id){
        $category = Category::where('id',$id)->first();
        return view('categories.edit',compact('category'));
    }
    public function update(Request $request){
        $category = Category::where('id',$request->id)->first();
        $category->name = $request->name;
        $category->details = $request->details;
        $category->save();
        return redirect()->route('categories.index')->with('success','Category edited successfully');
    }
    public function delete($id){
        $category = Category::where('id',$id)->first();
        $category->delete();
        return redirect()->back()->with('success','Deleted successfully');
    }
}
