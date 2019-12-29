<?php

namespace App\Http\Controllers;

use App\Categorie;
use App\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {.

        $category = Category::all();
        return $category;
    }

    public function store(Request $request)
    {

        $this->validate($request, array(
            'cat_name' => 'required|min:3|max:20',

        ));

        $category = new Category();
        $category->cat_name = $request->cat_name;

        $category->save();


    }

    public function show(Category $category)
    {
        $categories = Category::all();
        return response()->json([
            'categories' =>$categories
        ],200);
    }

    public function edit(Category $category ,$id)
    {
        $category = Category::find($id);
        return response()->json([
            'category' =>$category
        ],200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Categorie  $categorie
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category, $id)
    {
        $this->validate($request, array(
            'cat_name' => 'required|min:3|max:20',

        ));

        $category = Category::find($id);
        $category->cat_name = $request->cat_name;

        $category->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Categorie  $categorie
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category, $id)
    {
        $category = Category::find($id);
        $category->delete();
    }
}
