@extends('backend.layouts.app')
@section('content')
    <div class="container-fluid px-4">
        <div class="row g-3 my-2">
            <div class="col-md-3">
                <div class="p-3 bg-white shadow-sm d-flex justify-content-around align-items-center rounded">
                    <div>
                        <h3 class="fs-2">12</h3>
                        <p class="fs-5">Total User</p>
                    </div>
                    <i class="fa-solid fa-user fs-1 primary-text border rounded-full secondary-bg p-3"></i>
                </div>
            </div>

            <div class="col-md-3">
                <div class="p-3 bg-white shadow-sm d-flex justify-content-around align-items-center rounded">
                    <div>
                        <h3 class="fs-2">12</h3>
                        <p class="fs-5">Total Customer</p>
                    </div>
                    <i class="fa-solid fa-person-dress fs-1 primary-text border rounded-full secondary-bg p-3"></i>
                </div>
            </div>

            <div class="col-md-3">
                <div class="p-3 bg-white shadow-sm d-flex justify-content-around align-items-center rounded">
                    <div>
                        <h3 class="fs-2">14</h3>
                        <p class="fs-5">Total Basha</p>
                    </div>
                    <i class="fa-sharp fa-solid fa-person-booth fs-1 primary-text border rounded-full secondary-bg p-3"></i>
                </div>
            </div>

            <div class="col-md-3">
                <div class="p-3 bg-white shadow-sm d-flex justify-content-around align-items-center rounded">
                    <div>
                        <h3 class="fs-2">15</h3>
                        <p class="fs-5">Total Booking Basha</p>
                    </div>
                    <i class="fa-sharp fa-solid fa-person-booth fs-1 primary-text border rounded-full secondary-bg p-3"></i>
                </div>
            </div>
        </div>

        <div class="my-5">
            @yield('content')
        </div>

    </div>
    </div>
@endsection

@section('script')



@endsection
