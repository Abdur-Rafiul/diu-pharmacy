@extends('backend.layouts.app')

@section('content')


    <div class="row d-flex ms-5">
        <div class="col-md-10">
            <div class="card mt-5">
                <div class="card-header text-white" style="background: #16263d">
                    <h2>New Medicine</h2>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('medicine.update', $medicine->id) }}" enctype="multipart/form-data">
                        @csrf
                        @method('put')
                        <div class="form-group">
                            <label for="name">Medicine Name (*)</label>
                            <input type="text" value="{{$medicine->medicine_name}}" placeholder="Please Enter Your Medicine Name" class="form-control" name="name" id="name" required/>
                        </div>


                        <div class="form-group">
                            <label for="phone">Medicine Photo One(*)</label>
                            <input type="file" value="{{$medicine->Medicine_Details->medicine_img1}}" class="form-control" name="photo1" id="photo" />
                        </div>
                        <div class="form-group">
                            <label for="phone">Medicine Photo Two(*)</label>
                            <input type="file" value="{{$medicine->Medicine_Details->medicine_img2}}" class="form-control" name="photo2" id="photo" />
                        </div>
                        <div class="form-group">
                            <label for="phone">Medicine Photo Three(*)</label>
                            <input type="file" value="{{$medicine->Medicine_Details->medicine_img13}}" class="form-control" name="photo3" id="photo" />
                        </div>
                        <div class="form-group">
                            <label for="phone">Medicine Photo Four(*)</label>
                            <input type="file" value="{{$medicine->Medicine_Details->medicine_img4}}" class="form-control" name="photo4" id="photo" />
                        </div>
                        <div class="form-group">
                            <label for="price">Price (*)</label>
                            <input type="number" value="{{$medicine->Medicine_Details->medicine_price}}" placeholder="Please Enter Your Medicine Price" class="form-control" name="price" id="price" required/>
                        </div>
                        <div class="form-group">
                            <label for="discount">Discount (*)</label>
                            <input type="number" value="{{$medicine->Medicine_Details->medicine_discount}}"  placeholder="Please Enter Discount" class="form-control" name="discount" id="discount" required/>
                        </div>
                        <div class="form-group">
                            <label for="pis">Pis (*)</label>
                            <input type="number" value="{{$medicine->Medicine_Details->medicine_pis}}"  placeholder="Number Of Pis" class="form-control" name="pis" id="pis" required/>
                        </div>
                        <div class="form-group">
                            <label for="box">Box (*)</label>
                            <input type="number" value="{{$medicine->Medicine_Details->medicine_box}}"  placeholder="Number Of Box" class="form-control" name="box" id="box" required/>
                            <label for="description">Sort Description (*)</label>
                        </div>
                        <div class="form-group">

                            <textarea name="description"  id="description" cols="60" rows="15">{{$medicine->Medicine_Details->medicine_description}}</textarea>

                        </div>


                        <div class="form-group">
                            <label for="fee">Pharmacy (*)</label>
                            <select name="pharmacy" class="form-control">
                                <span class="d-none">{{$id = $medicine->Medicine_Details->pharmacy_id}}</span>

                                </span></h6>
                                <option value="{{$id}}">{{\App\Models\Pharmacy::find($id)->name}}</option>
                                @foreach ($pharmacy as $pharmacy)

                                    <option value="{{$pharmacy->id}}">{{$pharmacy->name}}</option>


                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="fee">Category (*)</label>
                            <select name="category" class="form-control">
                                <span class="d-none">{{$id1 = $medicine->category_id}}</span>

                                </span></h6>
                                <option value="{{$id1}}">{{\App\Models\Category::find($id1)->category_name}}</option>
                                @foreach ($category as $category)

                                    <option value="{{$category->id}}">{{$category->category_name}}</option>


                                @endforeach
                            </select>
                        </div>


                        <div class="form-group">
                            <label for="fee">Remark (*)</label>
                            <select name="remark" class="form-control">
                                <span class="d-none">{{$remark = $medicine->remark}}</span>

                                </span></h6>
                                <option value="{{$remark}}">{{$remark}}</option>


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
