<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BlogCateagory extends Model
{
    use HasFactory;
    protected $fillable = ['category_name','status'];
    private static $blogCategory;

    public static function saveBlogCategory($request){
        BlogCateagory::create($request->except('_token'));
    }
    public static function updateBlog($request, $id){
        BlogCateagory::find($id)->update($request->except('_token'));
    }

}
