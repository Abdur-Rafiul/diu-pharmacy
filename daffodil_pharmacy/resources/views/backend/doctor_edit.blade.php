
@extends('backend.layouts.app')

@section('content')


    <div class="row d-flex">
        <div class="col-md-10">
            <div class="card mt-5">
                <div class="card-header text-white" style="background: #16263d">
                    <h2>Edit Doctor</h2>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{route('doctor.update',$doctor->id)}}" enctype="multipart/form-data">
                        @csrf
                        @method('put')
                        <div class="form-group">
                            <label for="name">Doctor Name (*)</label>
                            <input value="{{ $doctor->doctor_name }}" type="text" placeholder="Please Enter Your Doctor Name" class="form-control" name="name" id="name" required/>
                        </div>


                        <div class="form-group">
                            <label for="phone">Doctor Photo(*)</label>
                            <input value="{{ $doctor->img }}" type="file" class="form-control" name="photo" id="photo" />
                            <label for="phone">Speciality</label>
                        </div>
                        <div class="form-group">

                            <textarea name="Speciality" id="" cols="30" rows="10">{{ $doctor->Speciality }}</textarea>

                        </div>
                        <label for="phone">Degree</label>
                        <div class="form-group">

                            <textarea name="Degree" id="" cols="30" rows="10">{{ $doctor->Degree }}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="phone">Email(*)</label>
                            <input type="email" value="{{ $doctor->Email }}" class="form-control" name="email" id="photo" />
                        </div>
                        <div class="form-group">
                            <label for="phone">Phone(*)</label>
                            <input value="{{ $doctor->Phone }} " type="text" class="form-control" name="phone" id="photo" />
                        </div>
                        <div class="form-group">
                            <label for="phone">Hospital(*)</label>
                            <input value="{{ $doctor->Hospital }}" type="text" class="form-control" name="hospital" id="photo" />
                        </div>

                        <div class="form-group mt-5">
                            <h6>Common Category</h6>
                            @foreach($doctor->category as $cat)

                                <span>{{$cat->category_name}}</span><br>

                            @endforeach
                            <select name="cat_id" id="">
                                <label for="phone">Category(*)</label>

                                @foreach($category as $category)
                                    <option value="{{$category->id}}">{{$category->category_name}}</option>
                                @endforeach
                            </select>
                        </div>

                        <button type="submit" class="btn btn-primary mt-2">Submit</button>
                    </form>
                </div>
            </div>
        </div>

@endsection
