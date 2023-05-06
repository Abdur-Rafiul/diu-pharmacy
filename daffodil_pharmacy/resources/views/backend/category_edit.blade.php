@extends('backend.layouts.app')

@section('content')

<div class="row d-flex">
    <div class="col-md-12">
        <div class="card mt-5">
            <div class="card-header text-white" style="background: #16263d">
                <h2>Edit Category</h2>
            </div>
            <div class="card-body">
                <form method="POST" action="{{route('category.update', $category->id)}}" enctype="multipart/form-data">
                    @csrf
                    @method('put')
                    <div class="form-group">
                        <label for="name">Category Name (*)</label>
                        <input value="{{$category->category_name}}" type="text" placeholder="Please Enter Your Category Name" class="form-control" name="name" id="name" required/>
                    </div>


                    <div class="form-group">
                        <label for="phone">Category Photo(*)</label>
                        <input value="{{ $category->category_img }}" type="file" class="form-control" name="photo" id="photo" />
                    </div>

                    <button type="submit" class="btn btn-primary mt-2">Submit</button>
                </form>
            </div>
        </div>
    </div>
@endsection
