@extends('backend.layouts.app')

@section('content')


    <div class="row d-flex">
        <div class="col-md-4">
            <div class="card mt-5">
                <div class="card-header text-white" style="background: #16263d">
                    <h2>New Medicine</h2>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{route('medicine.store')}}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="name">Medicine Name (*)</label>
                            <input type="text" placeholder="Please Enter Your Medicine Name" class="form-control" name="name" id="name" required/>
                        </div>


                        <div class="form-group">
                            <label for="phone">Medicine Photo One(*)</label>
                            <input type="file" class="form-control" name="photo1" id="photo" />
                        </div>
                        <div class="form-group">
                            <label for="phone">Medicine Photo Two(*)</label>
                            <input type="file" class="form-control" name="photo2" id="photo" required/>
                        </div>
                        <div class="form-group">
                            <label for="phone">Medicine Photo Three(*)</label>
                            <input type="file" class="form-control" name="photo3" id="photo" required/>
                        </div>
                        <div class="form-group">
                            <label for="phone">Medicine Photo Four(*)</label>
                            <input type="file" class="form-control" name="photo4" id="photo" required/>
                        </div>
                        <div class="form-group">
                            <label for="price">Price (*)</label>
                            <input type="number" placeholder="Please Enter Your Medicine Price" class="form-control" name="price" id="price" required/>
                        </div>
                        <div class="form-group">
                            <label for="discount">Discount (*)</label>
                            <input type="number"  placeholder="Please Enter Discount" class="form-control" name="discount" id="discount" required/>
                        </div>
                        <div class="form-group">
                            <label for="pis">Pis (*)</label>
                            <input type="number"  placeholder="Number Of Pis" class="form-control" name="pis" id="pis" required/>
                        </div>
                        <div class="form-group">
                            <label for="box">Box (*)</label>
                            <input type="number"  placeholder="Number Of Box" class="form-control" name="box" id="box" required/>
                        </div>
                        <div class="form-group">
                            <label for="description">Sort Description (*)</label>
                            <textarea name="description" id="" cols="40" rows="5"></textarea>
                        </div>


                        <div class="form-group">
                            <label for="fee">Pharmacy (*)</label>
                            <select name="pharmacy" class="form-control">
                                <option value="">Please Select Pharmacy *</option>
                                @foreach ($pharmacy as $pharmacy)

                                    <option value="{{$pharmacy->id}}">{{$pharmacy->name}}</option>


                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="fee">Category (*)</label>
                            <select name="category" class="form-control">
                                <option value="">Please Select Category *</option>
                                @foreach ($category as $category)

                                    <option value="{{$category->id}}">{{$category->category_name}}</option>


                                @endforeach
                            </select>
                        </div>
{{--                        <div class="form-group">--}}
{{--                            <label for="fee">Stock (*)</label>--}}
{{--                            <select name="stock" class="form-control">--}}
{{--                                <option value="">Please Select Stock *</option>--}}


{{--                                    <option value="Available">Available</option>--}}
{{--                                    <option value="Not Available">Not Available</option>--}}



{{--                            </select>--}}
{{--                        </div>--}}

                        <div class="form-group">
                            <label for="fee">Remark (*)</label>
                            <select name="remark" class="form-control">
                                <option value="">Please Select Remark *</option>


                                    <option value="Personal Care">Personal Care</option>
                                    <option value="Vitamin">Vitamin</option>
                                    <option value="Sexual Care">Sexual Care</option>
                                    <option value="Device">Device</option>



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
                    <h2 class="float-left text-white">Medicine List</h2>

                </div>
                <div class="card-body">
                    <table id="dataTable" class="table">
                        <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">Photo</th>
                            <th scope="col">Price</th>
                            <th scope="col" style="width: 150px">Action</th>
                        </tr>
                        </thead>
                        <tbody>


                        @foreach ($medicine as $medicine)
                            <tr>
                                <th scope="row">{{ $loop->index+1 }}</th>
                                <td>{{ $medicine->medicine_name }}</td>
                                <td>
                                    <img class="w-25" src="{{ $medicine->Medicine_Details->medicine_img1 }}" alt="">
                                </td>
                                <td>{{ $medicine->Medicine_Details->medicine_price }}</td>



                                <td>
                                    <a style="width:60px" class="btn btn-sm btn-outline-success" href="{{route('medicine.edit',$medicine->id)}}">Edit</a>

                                    <form action="{{ route('medicine.destroy', $medicine->id) }}" method="post" class="form-custom-inline">
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
