@extends('admin.master')

@section('title')
    Edit blog

@endsection

@section('body')
    <section class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-10 mx-auto">
                    <div class="card" style="border: 1px solid lightgrey">
                        <div class="card-header">
                            <h3>Edit Blog </h3>
                        </div>
                        <div class="card-body">

                            <form action="{{route('blogs.update', $blog->id  )}}" method="post" enctype="multipart/form-data">
                                @csrf
                                @method('put')
                                <div class="row mt-2">
                                    <label for="" class="col-md-4">Category Name</label>
                                    <div class="col-md-8">
                                        <select name="blog_category_id" id="categoryName" class="form-control">
                                            <option value="">Select a Category</option>
                                            @foreach($blogCategories as $blogCategory)
                                                <option value="{{$blogCategory->id}}" {{ $blog->blog_category_id == $blogCategory->id ? 'selected': '' }}>{{$blogCategory->category_name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="row mt-2">
                                    <label for="" class="col-md-4">Sub Category Name</label>
                                    <div class="col-md-8">
                                        <select name="blog_sub_category_id" id="subCategoryName" class="form-control">
                                            <option value="" disabled selected>Select a Category</option>
                                            @foreach($blogSubCategories as $blogSubCategory)
                                                <option value="{{$blogSubCategory->id}}" {{ $blog->blog_sub_category_id == $blogSubCategory->id? 'selected': '' }}>{{$blogSubCategory->sub_category_name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="row mt-2">
                                    <label for="" class="col-md-4">Blog Title</label>
                                    <div class="col-md-8">
                                        <input type="text" name="blog_title" value="{{$blog->blog_title}}" class="form-control">
                                    </div>
                                </div>
                                <div class="row mt-2">
                                    <label for="" class="col-md-4">Blog Description</label>
                                    <div class="col-md-8">
                                        <textarea name="description" class="form-control" id="summernote" cols="30" rows="10">{!! $blog->description !!}</textarea>
                                    </div>
                                </div>
                                <div class="row mt-2">
                                    <label for="" class="col-md-4">Featured Image</label>
                                    <div class="col-md-8">
                                        <input type="file" name="image" accept="image/*">
                                        @if($blog->image)
                                            <img src="{{asset($blog->image)}}" style="height: 80px;" alt="">
                                        @endif
                                    </div>
                                </div>
                                <div class="row mt-2">
                                    <label for="" class="col-md-4">Status</label>
                                    <div class="col-md-8">
                                        <label for=""><input type="radio" name="status" {{ $blog->status == 1? 'checked':'' }} value="1">Published</label>
                                        <label for=""><input type="radio" name="status" {{ $blog->status == 0? 'checked':'' }} value="0">Unpublished</label>
                                    </div>
                                </div>
                                <div class="row mt-2">
                                    <label for="" class="col-md-4"></label>
                                    <div class="col-md-8">
                                        <input type="submit"  class="btn btn-success" value="Update Blog">
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection

