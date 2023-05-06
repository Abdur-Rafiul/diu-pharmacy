@extends('backend.layouts.app')

@section('content')

<div class="col-md-12 p-0">
    <div class="card mt-5">
        <div class="card-header" style="background: #16263d">
            <h2 class="float-left text-white">Order List</h2>

        </div>
        <div class="card-body">
            <table id="dataTable" class="table">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Customer Name</th>
                    <th scope="col">Customer Address</th>
                    <th scope="col">Customer Email</th>
                    <th scope="col">Customer Phone</th>
                    <th scope="col">Medicine Name</th>
                    <th scope="col">Medicine Photo</th>
                    <th scope="col">Medicine Price</th>
{{--                    <th scope="col">Pharmacy Name</th>--}}
                    <th scope="col" style="width: 150px">Action</th>
                </tr>
                </thead>
                <tbody>


                @foreach ($order as $order)
                    <tr>
                        <th scope="row">{{ $loop->index+1 }}</th>
                        <td>{{ $order->fname }}</td>
                        <td>{{ $order->address }}</td>
                        <td>{{ $order->delivery_email }}</td>
                        <td>{{ $order->phone }}</td>
                        <td>{{ $order->medicine_name }}</td>
                        <td>
                            <img class="w-25" src="{{ $order->medicine_img }}" alt="">
                        </td>

                        <td>{{$order->medicine_special_price}}</td>
{{--                        <td>{{$order->pharmacy}}</td>--}}
                        <td>
                            <a style="width:60px" class="btn btn-sm btn-outline-success" href="{{route('order.edit',$order->id)}}">Delivery</a>

                            <form action="{{ route('order.destroy', $order->id) }}" method="post" class="form-custom-inline">
                                @csrf
                                @method('delete')
                                <button style="width:60px" class="btn btn-sm btn-outline-danger"  type="submit">Order Cancel</button>
                            </form>

                        </td>
                    </tr>
                @endforeach

                </tbody>
            </table>

        </div>
    </div>
</div>

@endsection

@section('script')

    <script>
        $(document).ready(function(){

            $('#dataTable').DataTable();

            $('.dataTables_length').addClass('bs-select');
        });
    </script>


@endsection
