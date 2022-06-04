@extends('layouts.backend.app')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">All Categories</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <div class="card-body table-responsive">
                    <table class="table">
                        <thead>
                          <tr>
                            <th scope="col">#</th>
                            <th scope="col">Title</th>
                            <th scope="col">Image</th>
                            <th scope="col">Action</th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach ($categories as $category)
                          <tr>
                            <th scope="row">{{$category->id}}</th>
                            <td>{{$category->title}}</td>
                            <td><img src="{{asset('/images').'/'.$category->image}}" alt="" width="50"></td>
                            <td>
                                <a href="{{route('category.edit',$category)}}" class="btn btn-sm btn-primary">Edit</a>
                                <a href="{{route('category.delete',$category)}}" class="btn btn-sm btn-danger">Delete</a>
                            </td>
                          </tr>
                          @endforeach
                        </tbody>
                      </table>
                </div>

            </div>
        </div>
    </div>
@endsection
