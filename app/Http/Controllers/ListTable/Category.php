<?php

namespace App\Http\Controllers\ListTable;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Categories;

class Category extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = DB::table('categories')->paginate(5);
        $categories2 = DB::table('categories')->get();
        return view('backend.pages.Categories.categories', compact('categories', 'categories2'))->with('i', (request()->input('page', 1) -1) *5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = DB::table('categories')->get();
        return view('backend.pages.Categories.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $category = Categories::create($request->all());
        return redirect()->route('categories.index')->with('success', 'Category created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    public function search(Request $request) {
        $key = $request->input('key');
        $query = Categories::query();
        if ($key) {
            $query->where('name', 'LIKE', '%' . $key . '%');
        }
        $categories = $query->paginate(5);
        $categories2 = Categories::all();

        return view('backend.pages.Categories.categories', compact('categories', 'categories2', 'key'))->with('i', (request()->input('page', 1) -1) *5);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Categories $category)
    {
        $category_item = $category;
        $categories = DB::table('categories')->get();
        return view('backend.pages.Categories.edit', compact('category_item', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $categories = Categories::findOrFail($id);
        $categories->update($request->all());
        return redirect()->route('categories.index')->with('success', 'Update success');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $categories = Categories::findOrFail($id);
        $categories->delete();
        return redirect()->route('categories.index')->with('success', 'Delete success');
    }
}
