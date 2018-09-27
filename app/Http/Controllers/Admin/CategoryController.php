<?php

namespace App\Http\Controllers\Admin;

use App\Model\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{

    public function index()
    {
        $categories = Category::all();

        return view('admin.category.index',[
            'categories' => $categories
        ]);
    }
    //выводит только форму
    public function create()
    {
        return view('admin.category.create');
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'title' => 'required'
        ]);
        Category::create($request->all());

        return redirect()->route('admin.category.index');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $category = Category::find($id);

        return view('admin.category.edit',[
            'category' => $category
        ]);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'title' => 'required'
        ]);
        $category = Category::find($id);

        $category->update($request->all());

        return redirect()->route('admin.category.index');
    }

    public function destroy($id)
    {
        Category::find($id)->delete();

        return redirect()->route('admin.category.index');
    }
}
