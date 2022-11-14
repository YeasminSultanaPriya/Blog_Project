@extends('admin.master')

@section('title')
    Manage Blog
@endsection

@section('body')
    <section class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-12 card mx-auto">
                    <h3 class="text-center pt-3">Manage Blog Category</h3>
                    <div class="card-body">
                        <table id="datatable" class="table">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Category Name</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($blogCategories as $blogCategory)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$blogCategory->category_name}}</td>
                                <td>{{$blogCategory->status==1?'Published':'Unpublished'}}</td>
                                <td>
                                    <a href="{{route('edit-blog-category',['id'=>$blogCategory->id])}}" class="btn btn-sm btn-warning"><i class="bx bx-edit"></i></a>
                                    <a href="{{route('delete-blog-category',['id'=>$blogCategory->id])}}" onclick="return confirm('Are you sure to delete this?')" class="btn btn-sm btn-danger"><i class="bx bx-trash"></i></a>
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
