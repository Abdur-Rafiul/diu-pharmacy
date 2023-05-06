@extends('frontend.common.app')


@section('content')
    <header class="mt-5 ml-5 medicine_div" style="background-image: url('{{ asset('photo/button_rainbow.png')}}');">
        <!-- Navbar -->
        <nav class="navbar navbar-expand-lg navbar-light bg-white">
            <div class="container-fluid">
<div class="row mt-5 ml-5">


    <div class="col-lg-2 col-md-2" style="margin-top: 70px">


     <span class="w-50 mt-5"><img class="img1 theImg1" src="{{$medicine->Medicine_Details->medicine_img1}}" alt=""></span><br>
     <span class="w-50 mt-5"><img class="img2 theImg2" src="{{$medicine->Medicine_Details->medicine_img2}}" alt=""></span><br>
     <span class="w-50 mt-5"><img class="img3 theImg3" src="{{$medicine->Medicine_Details->medicine_img3}}" alt=""></span><br>



    </div>
    <div class="col-md-4 col-md-4 " style="margin-top: 300px">

        <img id="theImg" class="w-100 theImg" src="{{$medicine->Medicine_Details->medicine_img4}}" alt="">


    </div>

    <div class="col-md-6 col-sm-12 medicine_des">



                    <div class="row ml-5">
                        <h4 id="h4" class="medicineName mt-2">{{$medicine->medicine_name}}</h4>
                        <h4 id="h4" class="medicineId d-none">{{$medicine->id}}</h4>
                        <h4 id="h4" class="categoryName d-none">{{$medicine->category->category_name}}</h4>
                        <span id="h4" class="box_count "></span>
                        <p class="text-danger" href="">Get <span class="discount1"></span> % OFF</p>

                        <div class="d-flex mb-2">
                            <div class="pis1">
                                <label class="text-primary" for="">Select Medicine Pis</label>
                            <select class="pis">
                                <option value="1">Select</option>

                            </select>
                            <span class="ms-2" style="font-weight: bolder; color: red">Pis</span>
                            </div>
                            <div class="box1">
                                <label class="ms-2 text-primary" for="">Select Medicine Box</label>
                            <select class="box ms-2">
                            </select>
                            <span class="ms-2" style="font-weight: bolder; color: red">Box</span>
                            </div>

                        </div>

                        <h6 id="h6" class="medicine_price1"><b>TK</b> <del class="medicine_price"></del></h6></b>
                        <input class="medicine_special_price1 d-none"  name="price" type="text" value="">


                        <b><h6 id="h6" class="medicine_special_price"></h6></b>

                        <h6 class="text-danger">**Do not buy any medicine without doctor's advice</h6>

                        <button class="col-md-6 btn-danger bg-danger text-white add-to-order">Conform order</button>
                        <button class="col-md-6 btn-danger bg-danger text-white add-to-cart">Add to Cart</button>
                    </div>




    </div>

</div>



            </div>




        </nav>
        <!-- Navbar -->

        <div class="delivery">
            <h5 class="mt-3"><i class="fas fa-bicycle fa-2x text-danger"></i> সারা বাংলাদেশ থেকে অর্ডার করা যাবে।</h5>
            <h6><i class="fas fa-notes-medical"></i><span  class="" style="color: #000000">
                    <span class="d-none">{{$id = $medicine->Medicine_Details->pharmacy_id}}</span>
                <span class="pharmacy_name">{{\App\Models\Pharmacy::find($id)->name}}</span>
                </span></h6>
        </div>

          <div style="color: #000000" class="description1">
              <h5 class="mt-3">Drescription</h5>
              <div class="description">
                    {{$medicine->Medicine_Details->medicine_description}}
              </div>



          </div>

        <div class="row">

            @foreach ($doctor as $doctor)
            <div class="col-md-4 mt-2">
                <div class="card" style="width: 18rem;">
                    <img  src="{{$doctor->img}}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h3 class="card-title text-danger">{{$doctor->doctor_name}}</h3>
                        <h5 class="card-title">Speciality - {{$doctor->Speciality}}</h5>
                        <h5 class="card-title">Degree - {{$doctor->Degree}}</h5>
                        <h5 class="card-title">Email - {{$doctor->Email}}</h5>
                        <h5 class="card-title">Phone - {{$doctor->Phone}}</h5>
                        <h5 class="card-title">Hospital - {{$doctor->Hospital}}</h5>

                    </div>
                </div>
            </div>
            @endforeach
        </div>



    </header>


    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <form name="payment" id="payment" method="post" action="{{route('payment')}}">
                @csrf
                <div class="modal-content">



                    <div class="modal-header">
                        <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <div class="modal-body">
                        <div class="row">



                            <div class="col-md-12">


                                <img class="w-25" id="imgLocation" src="" alt="">
                                <h6  id="h6" class="medicineName mt-2">{{$medicine->medicine_name}}</h6>
                                <h6 id="hh6" class="categoryName d-none">{{$medicine->category->category_name}}</h6>

                                <b><h6 id="h6" class="medicine_special_price"></h6></b><p class="text-danger">Cash On delivery Outside Dhaka 150 tk and within Dhaka 80 tk</p>



                            </div>

                            <input class="d-none" name="mname" type="text" value="{{$medicine->medicine_name}}">
                            <input class="d-none" name="cname" type="text" value="{{$medicine->category->category_name}}">
                            <input class="pharmacy_name1 d-none" name="pharmacy" type="text" value="{{\App\Models\Pharmacy::find($id)->name}}">
                            <input class="d-none" id="imgrobin" name="img" type="text" value="">
                            <input class="medicine_special_price1 d-none"  name="price" type="text" value="">

                            <label class="form-check-label text-primary" for="inlineRadio1">Name</label>
                            <input name="fname" class="fname" type="text" placeholder="Please Enter Your Full Name">
                            <label class="form-check-label text-primary" for="inlineRadio1">Email</label>
                            <input readonly name="email" class="email"  type="text" value="rafiul15@gmail.com" placeholder="Enter Your Email">
                            <label class="form-check-label text-primary" for="inlineRadio1">Phone </label>
                            <input name="phone" class="phone" type="text" placeholder="Please Enter Your Phone Number">
                            <label class="form-check-label text-primary" for="inlineRadio1">Address : </label>
                            <textarea name="address" class="address"></textarea>
                        </div>

                    </div>


                    <Button type="button" class="btn btn-primary cash-on-delivery">Cash On Delivery</Button>
                    <Button type="submit" class="btn btn-danger online-payment">Online Payment</Button>
                </div>

            </form>
        </div>
    </div>
@endsection


@section('script')
    <script type="text/javascript">




        $('.pis').on('change', function() {

            $('.box option').prop("selected", true);

            let medicine_discount  =  parseInt($('.discount1').html());
            let  medicine_price = parseInt($('.medicine_price').html());
           // alert(medicine_discount)

            let box_count = $('.box_count').html();

            let discount = 100 - medicine_discount;

            discount = discount * 0.01 ;

            discount1 = discount * medicine_price;
            let pis = $(".pis option:selected").val();

            //alert(pis)
            let price = medicine_price - discount;

            let price1 = price / box_count;

            // alert(box_count);

            $('.medicine_special_price').html('Special Price '+pis * discount1+' TK');
            $('.medicine_special_price1').val('Special Price '+pis * discount1+' TK');

        });

        $('.box').on('change', function() {

            $('.pis option').prop("selected", false);

            let medicine_discount =  $('.discount1').html();
            let  medicine_price = $('.medicine_price').html();

            let box_count = $('.box_count').html();

            let discount = 100 - medicine_discount;

            discount = discount * 0.01 ;

            discount = discount * medicine_price;
            let box = $(".box option:selected").val();

            //let price = medicine_price - discount;

            let price1 = discount / box_count;
           // alert(box_count)

            $('.medicine_special_price').html('Special Price '+box*box_count * discount+' TK');
            $('.medicine_special_price1').val('Special Price '+box*box_count * discount+' TK');


        });

            $('.img1').click(function (){

                let img1 = $('.theImg1').attr('src');
                //alert(img1)

                $('.theImg').attr('src',img1);

            });

            $('.img2').click(function (){

                let img2 = $('.theImg2').attr('src');
               // alert(img2)
                $('.theImg').attr('src',img2);

            })
            $('.img3').click(function (){

                let img3 = $('.theImg3').attr('src');
                //alert(img3)
                $('.theImg').attr('src',img3);

            })


            const id =  $('.medicineId ').html();


            //alert(medicineName + categoryName);

            axios.post('/MedicineDetails1',{
                id:id,

            })
                .then(function (response) {
                    // handle success
                    // console.log(response.data);

                    if(response.status == 200){

                        var jsonData = response.data;



                        $('.discount1').html(+jsonData.medicine_discount);
                        $('.medicine_price').html(+jsonData.medicine_price);

                        let medicine_price = jsonData.medicine_price;
                        let medicine_discount = jsonData.medicine_discount;

                        let discount = 100 - medicine_discount;

                         discount = discount * 0.01 ;

                         discount = discount * medicine_price;

                         let price = medicine_price - discount;

                         let medicine_pis = parseInt(jsonData.medicine_pis);
                         let medicine_box = parseInt(jsonData.medicine_box);

                         //alert(medicine_box);

                        if(medicine_pis >= 1){
                            for (i = 10; i <= medicine_pis; i = i + 5){


                                $('.pis').append(

                                    "<option value="+i+">"+i+ "</option>"

                                )
                            }



                        }else {
                            $(".pis1").addClass("d-none");
                        }

                        if(medicine_box >= 1){
                            for (i = 1; i <= medicine_box; i = i + 1){


                                $('.box').append(

                                    "<option value="+i+">"+i+ "</option>"

                                )
                            }

                            $('.box').append(

                                "<option value='Select'>Select</option>"

                            )

                        } else {
                            $(".box1").addClass("d-none");
                        }






                        $('.medicine_special_price').html('Special Price '+discount+' TK');
                        $('.medicine_special_price1').val('Special Price '+discount+' TK');

                        $('.box_count').html(medicine_box);
                    }else{


                    }




                })
                .catch(function (error) {
                    // handle error
                    console.log(error);
                })





        $('.add-to-order').click(function (){
            const img = $('#theImg').attr('src');
            $("#imgLocation").attr("src", img);
            $("#imgrobin").val(img);
            $('.modal').modal('show');
        })

        $('.cash-on-delivery').click(function (){

            const address = $('.address').val();
            const img = $('#theImg').attr('src');
            const mname = $('.medicineName').html();
            const cname = $('.categoryName').html();
            const price = $('.medicine_special_price').html();
            const pharmacy = $('.pharmacy_name').html();

            const fname = $('.fname').val();
            const phone = $('.phone').val();
            const delivery_email = $('.email').val();

            //  alert(pharmacy);
            axios.post('/add-to-order', {

                mname : mname,
                cname : cname,
                img : img,
                price : price,
                pharmacy: pharmacy,
                address: address,
                status: '1',
                fname : fname,
                phone : phone,
                delivery_email : delivery_email

            })
                .then(function (response) {
                    const data = response.data;

                    console.log(data)

                    if(data == 1){
                        alert("Order Successful")
                        $('.modal').modal('hide');
                    }else {
                        alert("Order Failed")
                        $('.modal').modal('hide');
                    }





                })
                .catch(function (error) {
                    console.log(error);
                    $('.modal').modal('hide');
                });

            // $('.modal').modal('hide');
        })


        $('.online-payment').click(function (){

            const address = $('.address').val();
            const img = $('#theImg').attr('src');
            const mname = $('.medicineName').html();
            const cname = $('.categoryName').html();
            const price = $('.medicine_special_price').html();
            const pharmacy = $('.pharmacy_name').html();

            const fname = $('.fname').val();
            const phone = $('.phone').val();
            const delivery_email = $('.email').val();

            //  alert(pharmacy);
            axios.post('/payment', {

                mname : mname,
                cname : cname,
                img : img,
                price : price,
                pharmacy : pharmacy,
                address : address,
                status: '2',
                fname : fname,
                phone : phone,
                delivery_email : delivery_email

            })
                .then(function (response) {
                    // window.location = '/payment/'+address+'/'+img+'/'+mname+'/'+cname+'/'+price+'/'+pharmacy+'/'+fname+'/'+phone+'/'+delivery_email

                    window.location = '/payment';






                })
                .catch(function (error) {
                    console.log(error);
                    $('.modal').modal('hide');
                });

            // $('.modal').modal('hide');
        })



        $('.add-to-cart').click(function(){


            const img = $('#theImg').attr('src');
            const mname = $('.medicineName').html();
            const cname = $('.categoryName').html();
            const price = $('.medicine_special_price').html();
            const pharmacy = $('.pharmacy_name').html();


            axios.post('/add-to-cart', {

                mname : mname,
                cname : cname,
                img : img,
                price : price,
                pharmacy: pharmacy

            })
                .then(function (response) {
                    const data = response.data;

                    if(data > 0){
                        alert('Successfully Add To Cart')
                    }else{
                        alert('Failed Add To Cart')
                    }
                    window.location = '/';



                })
                .catch(function (error) {
                    alert('Failed Add To Cart')
                    console.log(error);
                });
        })

    </script>
@endsection

