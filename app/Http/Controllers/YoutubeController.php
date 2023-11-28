<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use App\Models\Youtube;
use Illuminate\Http\Request;

class YoutubeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $youtube = Youtube::paginate(5);
        $categories = Categories::all();
        return view('backend.pages.Youtube.youtube', compact('youtube', 'categories'))->with('i', (request()->input('page', 1) -1) *5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Categories::all();
        return view('backend.pages.Youtube.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $link = str_replace("https://www.youtube.com/watch?v=","https://www.youtube.com/embed/","$request->link");
        $data = $request->except('link');
        $data['link'] = $link;
        Youtube::create($data);
        return redirect()->route('youtube.index')->with('success', 'Create success');
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

        $query = Youtube::query();

        if ($title) {
            $query->where('title', 'like', '%' . $title . '%');
        }

        if ($category_id) {
            $query->where('category_id', $category_id);
        }

        $youtube = $query->paginate(5);
        $categories = Categories::all();

        return view('backend.pages.Youtube.youtube', compact('youtube', 'categories', 'title', 'category_id'))->with('i', (request()->input('page', 1) -1) *5);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Youtube $youtube)
    {
        $categories = Categories::all();
        $youtubes = $youtube;
        return view('backend.pages.Youtube.edit', compact('categories', 'youtubes'));
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
        $youtube = Youtube::findOrFail($id);
        $youtube->update($request->all());
        return redirect()->route('youtube.index')->with('success', 'Update success');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $youtube = Youtube::findOrFail($id);
        $youtube->delete();
        return redirect()->route('youtube.index')->with('success', 'Update success');
    }
}
