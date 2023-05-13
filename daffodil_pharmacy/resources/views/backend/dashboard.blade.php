@extends('backend.layouts.app')
@section('content')
    <div class="container-fluid px-4">
        <div class="row g-3 my-2">
            <div class="col-md-3">
                <div class="p-3 bg-white shadow-sm d-flex justify-content-around align-items-center rounded">
                    <div>
                        <h3 class="fs-2">{{$users}}</h3>
                        <p class="fs-5">Total User</p>
                    </div>
{{--                    <i class="fa-solid fa-user fs-1 primary-text border rounded-full secondary-bg p-3"></i>--}}
                    <i class="fa-regular fs-2 text-primary fa-user"></i>
                </div>
            </div>

            <div class="col-md-3">
                <div class="p-3 bg-white shadow-sm d-flex justify-content-around align-items-center rounded">
                    <div>
                        <h3 class="fs-2">{{$orders}}</h3>
                        <p class="fs-5">Total Orders</p>
                    </div>
{{--                    <i class="fa-solid fa-person-dress fs-1 primary-text border rounded-full secondary-bg p-3"></i>--}}
                    <i class="fa-brands fs-2 text-dark fa-first-order"></i>
                </div>
            </div>

            <div class="col-md-3">
                <div class="p-3 bg-white shadow-sm d-flex justify-content-around align-items-center rounded">
                    <div>
                        <h3 class="fs-2">{{$categories}}</h3>
                        <p class="fs-5">Total Categories</p>
                    </div>
{{--                    <i class="fa-sharp fa-solid fa-person-booth fs-1 primary-text border rounded-full secondary-bg p-3"></i>--}}
                    <i class="fa-brands fs-2 text-primary fa-medrt"></i>
                </div>
            </div>

            <div class="col-md-3">
                <div class="p-3 bg-white shadow-sm d-flex justify-content-around align-items-center rounded">
                    <div>
                        <h3 class="fs-2">{{$pharmacies}}</h3>
                        <p class="fs-5">Total Pharmacy</p>
                    </div>
{{--                    <i class="fa-sharp fa-solid fa-person-booth fs-1 primary-text border rounded-full secondary-bg p-3"></i>--}}
                    <i class="fa-solid fs-2 text-danger fa-prescription-bottle-medical"></i>
                </div>
            </div>
            <div class="col-md-3">
                <div class="p-3 bg-white shadow-sm d-flex justify-content-around align-items-center rounded">
                    <div>
                        <h3 class="fs-2">{{$medicines}}</h3>
                        <p class="fs-5">Total Medicine</p>
                    </div>
{{--                    <i class="fa-sharp fa-solid fa-person-booth fs-1 primary-text border rounded-full secondary-bg p-3"></i>--}}
                    <i class="fa-solid fa-capsules fs-2 text-primary"></i>
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
