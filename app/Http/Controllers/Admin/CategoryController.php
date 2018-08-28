<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Category;

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
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
