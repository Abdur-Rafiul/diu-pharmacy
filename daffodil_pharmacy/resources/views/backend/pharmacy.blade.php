
@extends('backend.layouts.app')

@section('content')


    <div class="row d-flex">
        <div class="col-md-4">
            <div class="card mt-5">
                <div class="card-header text-white" style="background: #16263d">
                    <h2>New Pharmacy</h2>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{route('pharmacy.store')}}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="name">Pharmacy Name (*)</label>
                            <input type="text" placeholder="Please Enter Your Pharmacy Name" class="form-control" name="name" id="name" required/>
                        </div>


                        <div class="form-group">
                            <label for="phone">Pharmacy Photo(*)</label>
                            <input type="file" class="form-control" name="photo" id="photo" />
                        </div>
                        <div class="form-group">
                            <label for="phone">Pharmacy Description</label>
                            <textarea name="description" id="" cols="30" rows="10"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="phone">Pharmacy Email(*)</label>
                            <input type="email" class="form-control" name="email" id="photo" />
                        </div>
                        <div class="form-group">
                            <label for="phone">Pharmacy password(*)</label>
                            <input type="text" class="form-control" name="password" id="photo" />
                        </div>

                        <button type="submit" class="btn btn-primary mt-2">Submit</button>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-md-8 p-0">
            <div class="card mt-5">
                <div class="card-header" style="background: #16263d">
                    <h2 class="float-left text-white">Pharmacy List</h2>

                </div>
                <div class="card-body">
                    <table id="dataTable" class="table">
                        <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">Photo</th>
{{--                            <th scope="col">Description</th>--}}
                            <th scope="col">Email</th>
{{--                            <th scope="col">Password</th>--}}
                            <th scope="col" style="width: 150px">Action</th>
                        </tr>
                        </thead>
                        <tbody>


                        @foreach ($pharmacy as $pharmacy)
                            <tr>
                                <th scope="row">{{ $loop->index+1 }}</th>
                                <td>{{ $pharmacy->name }}</td>
                                <td>
                                    <img class="" style="width: 20px" src="{{ $pharmacy->img }}" alt="">
                                </td>

{{--                                <td>--}}

{{--                                    <td>{{ $pharmacy->description }}</td>--}}
{{--                                </td>--}}

                                    <td>{{ $pharmacy->email }}</td>


{{--                                <td>--}}
{{--                                    <td>{{ $pharmacy->password }}</td>--}}
{{--                                    --}}
{{--                                </td>--}}

                                <td>
                                    <a style="width:60px" class="btn btn-sm btn-outline-success" href="{{route('pharmacy.edit',$pharmacy->id)}}">Edit</a>

                                    <form action="{{ route('pharmacy.destroy', $pharmacy->id) }}" method="post" class="form-custom-inline">
                                        @csrf
                                        @method('delete')
                                        <button style="width:60px" class="btn btn-sm btn-outline-danger"  type="submit">Delete</button>
                                    </form>

                                </td>
                            </tr>
                        @endforeach

                        </tbody>
                    </table>

                </div>
            </div>
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
