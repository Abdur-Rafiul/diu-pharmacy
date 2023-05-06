
@extends('backend.layouts.app')

@section('content')


    <div class="row d-flex">
        <div class="col-md-4">
            <div class="card mt-5">
                <div class="card-header text-white" style="background: #16263d">
                    <h2>New Category</h2>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{route('category.store')}}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="name">Category Name (*)</label>
                            <input type="text" placeholder="Please Enter Your Category Name" class="form-control" name="name" id="name" required/>
                        </div>


                        <div class="form-group">
                            <label for="phone">Category Photo(*)</label>
                            <input type="file" class="form-control" name="photo" id="photo" />
                        </div>

                        <button type="submit" class="btn btn-primary mt-2">Submit</button>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-md-8 p-0">
            <div class="card mt-5">
                <div class="card-header" style="background: #16263d">
                    <h2 class="float-left text-white">Category List</h2>

                </div>
                <div class="card-body">
                    <table id="dataTable" class="table">
                        <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">Photo</th>
                            <th scope="col" style="width: 150px">Action</th>
                        </tr>
                        </thead>
                        <tbody>


                        @foreach ($category as $category)
                            <tr>
                                <th scope="row">{{ $loop->index+1 }}</th>
                                <td>{{ $category->category_name }}</td>
                                <td>
                                    <img class="w-25" src="{{ $category->category_img }}" alt="">
                                </td>

                                <td>
                                    <a style="width:60px" class="btn btn-sm btn-outline-success" href="{{route('category.edit',$category->id)}}">Edit</a>

                                    <form action="{{ route('category.destroy', $category->id) }}" method="post" class="form-custom-inline">
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
