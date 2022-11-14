<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BlogCateagory;
use Illuminate\Http\Request;

class BlogCategoryController extends Controller
{
    private $blogCategories;
    public function addCategory(){
        return view('admin.blog-category.create');

    }
    public function newCategory(Request $request){
        BlogCateagory::saveBlogCategory($request);
        return redirect()->back()->with('success','Blog category created successfully');
    }
    public function manageCategory(){
        $this->blogCategories = BlogCateagory::latest()->get();
        return view('admin.blog-category.manage', ['blogCategories'=> $this->blogCategories]);
    }
    public function editCategory($id){

        return view('admin.blog-category.edit',['blogCategory' =>BlogCateagory::find($id)]);

    }
    public function updateCategory(Request $request, $id){
        BlogCateagory::updateCategory($request,$id);
        return redirect('/manage-blog-category')->with('success','Blog category updated successfully');
    }

    public function deleteCategory($id){
        BlogCateagory::find($id)->delete();
        return redirect()->back()->with('success','Blog category deleted successfully');


    }
}
