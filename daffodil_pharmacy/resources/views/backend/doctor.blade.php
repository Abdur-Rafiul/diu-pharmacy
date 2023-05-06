
@extends('backend.layouts.app')

@section('content')


    <div class="row d-flex">
        <div class="col-md-4">
            <div class="card mt-5">
                <div class="card-header text-white" style="background: #16263d">
                    <h2>New Doctor</h2>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{route('doctor.store')}}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="name">Doctor Name (*)</label>
                            <input type="text" placeholder="Please Enter Your Doctor Name" class="form-control" name="name" id="name" required/>
                        </div>


                        <div class="form-group">
                            <label for="phone">Doctor Photo(*)</label>
                            <input type="file" class="form-control" name="photo" id="photo" />
                            <label for="phone">Speciality</label>
                        </div>
                        <div class="form-group">

                            <textarea name="Speciality" id="" cols="30" rows="10"></textarea>

                        </div>
                        <label for="phone">Degree</label>
                        <div class="form-group">

                            <textarea name="Degree" id="" cols="30" rows="10"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="phone">Email(*)</label>
                            <input type="email" class="form-control" name="email" id="photo" />
                        </div>
                        <div class="form-group">
                            <label for="phone">Phone(*)</label>
                            <input type="text" class="form-control" name="phone" id="photo" />
                        </div>
                        <div class="form-group">
                            <label for="phone">Hospital(*)</label>
                            <input type="text" class="form-control" name="hospital" id="photo" />
                        </div>

                        <div class="form-group mt-5">

                            <select name="cat_id" id="">
                                <label for="phone">Category(*)</label>
                                <option value="">Please Select Your Category</option>
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

        <div class="col-md-8 p-0">
            <div class="card mt-5">
                <div class="card-header" style="background: #16263d">
                    <h2 class="float-left text-white">Doctor List</h2>

                </div>
                <div class="card-body">
                    <table id="dataTable" class="table">
                        <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">Photo</th>
                            {{--                            <th scope="col">Description</th>--}}
                            <th scope="col">Speciality</th>
                            {{--                            <th scope="col">Password</th>--}}
                            <th scope="col" style="width: 150px">Action</th>
                        </tr>
                        </thead>
                        <tbody>


                        @foreach ($doctor as $doctor)
                            <tr>
                                <th scope="row">{{ $loop->index+1 }}</th>
                                <td>{{ $doctor->doctor_name }}</td>
                                <td>
                                    <img class="" style="width: 20px" src="{{ $doctor->img }}" alt="">
                                </td>

                                {{--                                <td>--}}

                                {{--                                    <td>{{ $pharmacy->description }}</td>--}}
                                {{--                                </td>--}}

                                <td>{{ $doctor->Speciality }}</td>


                                {{--                                <td>--}}
                                {{--                                    <td>{{ $pharmacy->password }}</td>--}}
                                {{--                                    --}}
                                {{--                                </td>--}}

                                <td>
                                    <a style="width:60px" class="btn btn-sm btn-outline-success" href="{{route('doctor.edit',$doctor->id)}}">Edit</a>

                                    <form action="{{ route('doctor.destroy', $doctor->id) }}" method="post" class="form-custom-inline">
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
