@extends('frontend.common.app')


@section('content')

    <div class="row mt-5">

        @foreach ($all_doctor as $doctor)
            <div class="col-md-4 mt-5">
                <div class="card" style="width: 18rem;">
                    <img  src="{{$doctor->img}}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h3 class="card-title text-danger">{{$doctor->doctor_name}}</h3>
                        <h5 class="card-title">Speciality - {{$doctor->Speciality}}</h5>
                        <h5 class="card-title">Degree - {{$doctor->Degree}}</h5>
                        <h5 class="card-title">Email - {{$doctor->Email}}</h5>
                        <h5 class="card-title">Phone - {{$doctor->Phone}}</h5>
                        <h5 class="card-title">Hospital - {{$doctor->Hospital}}</h5>

                    </div>
                </div>
            </div>
        @endforeach
    </div>



@endsection
