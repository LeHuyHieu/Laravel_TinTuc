<?php

namespace App\Http\Controllers;

use App\Models\Blogs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = DB::table('categories')->get();
        $blog = DB::table('Blogs')->paginate(5);
        return view('backend.pages.BlogPost.blog', compact('blog', 'categories'))->with('i',(request()->input('page', 1) -1) *5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = DB::table('categories')->get();
        return view('backend.pages.BlogPost.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $imageName = null;
        $imageBannerName = null;

        if($request->hasFile('image')){
            $image = $request->file('image');
            $imageName = time() . '_'. $image->getClientOriginalName();
            $image->move(public_path('/backend/template/images/uploads'), $imageName);
        }else {
            return redirect()->back()->with('error', 'chưa có úp ảnh');
        }
        if($request->hasFile('image_banner')) {
            $image_banner = $request->file('image_banner');
            $imageBannerName = time() . '_' . $image_banner->getClientOriginalName();
            $image_banner->move(public_path('/backend/template/images/uploads'), $imageBannerName);
        }else {
            return redirect()->back()->with('error', 'chưa có úp ảnh');
        }
        $data = $request->except(['image', 'image_banner']);
        $data['image'] = '/backend/template/images/uploads/' . $imageName;
        $data['image_banner'] = '/backend/template/images/uploads/' . $imageBannerName;

        Blogs::create($data);
        return redirect()->route('blog.index')->with('success', 'Thêm thành công');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function show(Blogs $blog)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function edit(Blogs $blog)
    {
        $categories = DB::table('categories')->get();
        return view('backend.pages.BlogPost.edit', compact('blog', 'categories'));
    }

    public function search(Request $request) {
        $title = $request->input('title');
        $category_id = $request->input('category_id');

        $query = Blogs::query();

        if ($title) {
            $query->where('title', 'like', '%' . $title . '%');
        }

        if ($category_id) {
            $query->where('category_id', $category_id);
        }

        $blog = $query->paginate(5);
        $categories = DB::table('categories')->get();

        return view('backend.pages.BlogPost.blog', compact('blog', 'categories', 'title', 'category_id'))->with('i', (request()->input('page', 1) -1) *5);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $blog = Blogs::findOrFail($id);

        $data = [
            'title' => $request->input('title'),
            'tag' => $request->input('tag'),
            'category_id' => $request->input('category_id'),
            'description' => $request->input('description'),
            'is_read' => (!$request->has('is_read'))?0:$request->input('is_read'),
            'main_content' => $request->input('main_content'),
            'content' => $request->input('content'),
        ];

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $image->move(public_path('/backend/template/images/uploads'), $imageName);
            $data['image'] = '/backend/template/images/uploads/' . $imageName;
        }

        if ($request->hasFile('image_banner')) {
            $imageBanner = $request->file('image_banner');
            $imageNameBanner = time() . '_' . $imageBanner->getClientOriginalName();
            $imageBanner->move(public_path('/backend/template/images/uploads'), $imageNameBanner);
            $data['image_banner'] = '/backend/template/images/uploads/' . $imageNameBanner;
        }

        if ($blog->isDirty() || isset($data['image']) || isset($data['image_banner'])) {
            $blog->update($data);
            return redirect()->route('blog.index')->with('success', 'update_success');
        } else {
            $blog->update($data);
            return redirect()->route('blog.index')->with('info', 'No changes were made.');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $blog = Blogs::findOrFail($id);
        $blog->delete();
        return redirect()->route('blog.index')->with('success', 'Delete success');
    }
}
