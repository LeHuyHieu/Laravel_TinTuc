<?php

namespace App\Http\Controllers\ListTable;

use App\Http\Controllers\Controller;
use App\Models\Categories;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\News;

class NewController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $news = DB::table('news')->paginate(5);
        $categories = DB::table('categories')->get();
        return view('backend.pages.News.news', compact('news', 'categories'))->with('i', (request()->input('page', 1) -1) *5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = DB::table('categories')->get();
        return view('backend.pages.News.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($request->hasFile('image')){
            $image = $request->file('image');
            $imageName = time() . '_'.$image->getClientOriginalName();
            $image->move(public_path('/backend/template/images/uploads'), $imageName);
            $new = News::create($request->except('image'));
            $new->fill($request->except('image'));
            $new->image = '/backend/template/images/uploads/' . $imageName;
            $new->save();
            return redirect()->route('news.index')->with('success', 'insert_success');
        }else {
            return redirect()->back()->with('error', 'No image to upload!');
        }
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
        $title = $request->input('title');
        $category_id = $request->input('category_id');

        $query = News::query();

        if ($title) {
            $query->where('title', 'like', '%' . $title . '%');
        }

        if ($category_id) {
            $query->where('category_id', $category_id);
        }

        $news = $query->paginate(5);
        $categories = DB::table('categories')->get();

        return view('backend.pages.News.news', compact('news', 'categories', 'title', 'category_id'))->with('i', (request()->input('page', 1) -1) *5);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(News $news)
    {
        $categories = DB::table('categories')->get();
        return view('backend.pages.News.edit', compact('news', 'categories'));
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
        $news = News::findOrFail($id);

        if($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '_'.$image->getClientOriginalName();
            $image->move(public_path('/backend/template/images/uploads'), $imageName);
            $news->image = '/backend/template/images/uploads/' . $imageName;
        }

        $news->update($request->except('image'));
        return redirect()->route('news.index')->with('success', 'update_success');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $news = News::findOrFail($id);
        $news->delete();
        return redirect()->route('news.index')->with('success', 'Delete success');
    }
}
