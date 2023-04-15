@extends('frontend.common.app')

@section('content')

    <div class="row">


        <div class="col-md-12 col-lg-12">

            <div class="owl-slider1 owl-carousel owl-theme">

                <div class="item"><img class="slider-img" src="photo/medicine-1.jpg" alt=""></div>
                <div class="item"><img class="slider-img" src="photo/medicine-2.jpg" alt=""></div>
                <div class="item"><img class="slider-img" src="photo/medicine-3.jpg" alt=""></div>
                <div class="item"><img class="slider-img" src="photo/medicine-4.jpg" alt=""></div>


            </div>
        </div>

    </div>
    @include('frontend.commoncard')
    @include('frontend.trustcard')


    @include('frontend.personalcare')
    @include('frontend.Vitamin')
    @include('frontend.Sexualcare')
    @include('frontend.device')


@endsection

@section('script')

    <script type="text/javascript">


    </script>
@endsection
