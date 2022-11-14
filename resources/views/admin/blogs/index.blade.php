@extends('admin.master')

@section('title')
    Manage Blog
@endsection

@section('body')
    <section class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-12 card mx-auto">
                    <h3 class="text-center pt-3">Manage Blog </h3>
                    <div class="card-body">
                        <table id="datatable" class="table">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Category Name</th>
                                <th>Sub Category Name</th>
                                <th>Blog Title</th>
                                <th>Blog Description</th>
                                <th>Image</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($blogs as $blog)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$blog->blogCategory->category_name}}</td>
                                    <td>{{$blog->blogSubCategory->sub_category_name}}</td>
                                    <td>{{$blog->blog_title}}</td>
                                    <td>{!! \Illuminate\Support\Str::words($blog->description, 20) !!}</td>
                                    <td>
                                        <img src="{{asset($blog->image)}}" style="height: 80px; width: 80px;" alt="">
                                    </td>
                                    <td>{{$blog->status==1?'Published':'Unpublished'}}</td>
                                    <td>
                                        <a href="{{route('blogs.edit',$blog->id)}}" class="btn btn-sm btn-warning"><i class="bx bx-edit"></i></a>
                                        <form action="{{route('blogs.destroy',$blog->id)}}" method="post" style="display: inline-block;" onclick="return confirm('Are you sure to delete this?')">
                                            @csrf
                                            @method('delete')
                                            <button type="submit" class="btn btn-danger btn-sm">
                                                <i class="bx bx-trash"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection


