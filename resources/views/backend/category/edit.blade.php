@extends('layouts.backend.app')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card card-primary">
                <div class="card-header">
                    <div class="d-flex">
                        <h3 class="card-title">Update Category</h3>
                        <a href="{{route('category.index')}}">{{__Categories}}</a>
                    </div>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form action="{{route('category.update')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="category_id" value="{{$category->id}}">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="title">Category Title</label>
                            <input name="title" type="text" class="form-control" id="title" placeholder="Category Title" value="{{$category->title}}">
                        </div>
                        <div class="form-group">
                            <label for="image">File input</label>
                            <div class="input-group">
                                <div class="custom-file">
                                    <input type="file" name="image" class="custom-file-input" id="image">
                                    <label class="custom-file-label" for="image">Choose file</label>
                                </div>
                                {{-- <div class="input-group-append">
                                    <span class="input-group-text">Upload</span>
                                </div> --}}
                            </div>
                        </div>
                        <div class="form-group">
                            <img src="{{asset('images').'/'.$category->image}}" alt="" width="100">
                        </div>
                    </div>
                    <!-- /.card-body -->

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Update Category</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
