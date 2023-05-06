@extends('backend.layouts.app')

@section('content')


    <div class="row d-flex">
        <div class="col-md-12">
            <div class="card mt-5">
                <div class="card-header text-white" style="background: #16263d">
                    <h2>Edit Pharmacy</h2>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{route('pharmacy.update',$pharmacy->id)}}" enctype="multipart/form-data">
                        @csrf
                        @method('put')
                        <div class="form-group">
                            <label for="name">Pharmacy Name (*)</label>
                            <input type="text" value="{{$pharmacy->name}}" placeholder="Please Enter Your Pharmacy Name" class="form-control" name="name" id="name" required/>
                        </div>


                        <div class="form-group">
                            <label for="phone">Pharmacy Photo(*)</label>
                            <input type="file" value="{{ $pharmacy->img}}" class="form-control" name="photo" id="photo" />
                        </div>
                        <div class="form-group">
                            <label for="phone">Pharmacy Description</label>
                            <textarea  name="description" id="" cols="30" rows="10">{{$pharmacy->description}}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="phone">Pharmacy Email(*)</label>
                            <input type="email" value="{{$pharmacy->email}}" class="form-control" name="email" id="photo" />
                        </div>
                        <div class="form-group">
                            <label for="phone">Pharmacy password(*)</label>
                            <input value="{{$pharmacy->password}}" type="text" class="form-control" name="password" id="photo" />
                        </div>

                        <button type="submit" class="btn btn-primary mt-2">Submit</button>
                    </form>
                </div>
            </div>
        </div>
@endsection
