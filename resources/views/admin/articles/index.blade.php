@extends('admin.master')

@section('title')
    Manage Article
@endsection

@section('body')
    <section class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-12 card mx-auto">
                    <h3 class="text-center pt-3">Manage Article </h3>
                    <div class="card-body">
                        <table id="datatable" class="table">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Title</th>
                                <th>Description</th>
                                <th>Posted By</th>
                                <th>Image</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($articles as $article)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$article->title}}</td>
                                    <td>{!! \Illuminate\Support\Str::words($article->description, 150) !!}</td>
                                    <td>{{ $article->user->name }}</td>
                                    <td>
                                        <img src="{{asset($article->image)}}" style="height: 80px; width: 80px;" alt="">
                                    </td>
                                    <td>{{$article->status==1?'Published':'Unpublished'}}</td>
                                    <td>
                                        <a href="{{route('articles.edit',$article->id)}}" class="btn btn-sm btn-warning"><i class="bx bx-edit"></i></a>
                                        <form action="{{route('articles.destroy',$article->id)}}" method="post" style="display: inline-block;" onclick="return confirm('Are you sure to delete this?')">
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



