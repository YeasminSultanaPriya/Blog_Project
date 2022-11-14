<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\BlogCateagory;
use App\Models\BlogSubCategory;
use Illuminate\Http\Request;
use function League\Flysystem\Local\delete;

class BlogsController extends Controller
{
    private $blog;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.blogs.index', [
            'blogs' => Blog::latest()->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.blogs.create',
        ['blogCategories' => BlogCateagory::where('status',1)->get(),
        'blogSubCategories' => BlogSubCategory::where('status',1)->get(),]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Blog::createBlog($request);
        return redirect()->back()->with('success','Blog created successfully');
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

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('admin.blogs.edit', [
            'blogCategories' => BlogCateagory::where('status',1)->get(),
            'blogSubCategories' => BlogSubCategory::where('status',1)->get(),
            'blog' => Blog::find($id),
        ]);
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
        Blog::updateBlog($request, $id);
        return redirect('/blogs')->with('success','Blog updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
//        Blog::find($id)->delete();
//        return back()->with('success', 'Blog Deleted Successfully');
        $this->blog = Blog::find($id);
        if (file_exists($this->blog->image)){
            unlink($this->blog->image);
        }
        delete($this->blog->delete);
        return redirect()->back()->with('success','Blog Deleted Successfully');
    }
    public function getSubCategory($id)
    {
        $subCategories = BlogSubCategory::where('category_id', $id)->get();
        return json_encode($subCategories);
    }
}
