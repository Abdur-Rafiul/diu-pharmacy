@extends('frontend.common.app')


@section('content')

    <div class="row">
        @foreach ($medicines as $personal)
            <div class="col-md-3 mt-5">

                <div class="item">

                    <div class="card  border border-info shadow-0 mt-5">

                        <a class="medicine_card" href="{{ route('medicine.details', $personal->id) }}">
                            <div class="bg-image  card-img" >

                                <img src="{{$personal->Medicine_Details->medicine_img1}}" class="img-fluid " />


                                <div class="mask" style="background-color: rgba(251, 251, 251, 0.15)"></div>

                            </div>

                            <div class="card-body" style="height: 160px">
                                <h5 class="card-title">{{ $personal->medicine_name }}</h5>

                                <p>

                                    <a class="discount btn-danger" href="">{{ $personal->Medicine_Details->medicine_discount }}% off</a>
                                    <span><b>TK</b> <del>{{ $personal->Medicine_Details->medicine_price }}</del></span><br>
                                    <span><b>TK {{ $personal->Medicine_Details->medicine_price}}</b> </span><br>
                                    <span class="discount mt-2 mb-2"><b>Stock {{ $personal->Medicine_Details->medicine_stock}}</b> </span><br>


                                </p>

                            </div>

                            <div class="d-grid gap-2">
                                <button class="btn btn-dark medicine1_card" type="button"><a  style="color: white;" href="#!" class="text-center">Add To Cart</a></button>

                            </div>
                        </a>
                    </div>

                </div>

            </div>
        @endforeach
    </div>

@endsection
