@extends('admin.master')

@section('title')
    Edit blog sub category

@endsection

@section('body')
    <section class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-6 mx-auto">
                    <div class="card" style="border: 1px solid lightgrey">
                        <div class="card-header">
                            <h3>Edit Sub Blog Category</h3>
                        </div>
                        <div class="card-body">

                            <form action="{{route('blog-sub-categories.update',$blogSubCategory->id)}}" method="post">
                                @csrf
                                @method('put')
                                <div class="row mt-2">
                                    <label for="" class="col-md-4">Category Name</label>
                                    <div class="col-md-8">
                                        <select name="category_id" id="" class="form-control">
                                            <option value="">Select a Category</option>
                                            @foreach($blogCategories as $blogCategory)
                                                <option value="{{$blogCategory->id}}" {{$blogCategory->id == $blogSubCategory->category_id? 'selected' : ''}}>{{$blogCategory->category_name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="row mt-2">
                                    <label for="" class="col-md-4">Sub Category Name</label>
                                    <div class="col-md-8">
                                        <input type="text" name="sub_category_name" value="{{$blogSubCategory->sub_category_name}}" class="form-control">
                                    </div>
                                </div>
                                <div class="row mt-2">
                                    <label for="" class="col-md-4">Status</label>
                                    <div class="col-md-8">
                                        <label for=""><input type="radio" name="status" value="1" {{$blogSubCategory->status == 1? 'checked': ''}} >Published</label>
                                        <label for=""><input type="radio" name="status" value="0" {{$blogSubCategory->status == 0? 'checked': ''}}>Unpublished</label>
                                    </div>
                                </div>
                                <div class="row mt-2">
                                    <label for="" class="col-md-4"></label>
                                    <div class="col-md-8">
                                        <input type="submit"  class="btn btn-success" value="Update Sub Category">
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

