@extends('admin.admin_master')

@section('admin')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

 <div class="page-content">
    <div class="container-fluid">

       <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                    <form action="{{route('customer.update')}}" method="post" enctype="multipart/form-data" id="myForm">

                        @csrf

                        <input type="hidden" name="id" value="{{$customer->id}}">

                        <h4 class="card-title">Add Supplier</h4> <br>

                        <div class="row mb-3">
                            <label for="example-text-input" class="col-sm-2 col-form-label">Customer Name</label>
                            <div class="form-group col-sm-10">
                                <input class="form-control" name="name" type="text" id="example-text-input" value="{{$customer->name}}">
                            </div>
                        </div>

                         <div class="row mb-3">
                            <label for="example-text-input" class="col-sm-2 col-form-label">Customer Number</label>
                            <div class="form-group col-sm-10">
                                <input class="form-control" name="mobile_no" type="number" id="example-text-input" value="{{$customer->mobile_no}}">
                            </div>
                        </div>

                         <div class="row mb-3">
                            <label for="example-text-input" class="col-sm-2 col-form-label">Customer Email</label>
                            <div class="form-group col-sm-10">
                                <input class="form-control" name="email" type="email" id="example-text-input" value="{{$customer->email}}">
                            </div>
                        </div>

                         <div class="row mb-3">
                            <label for="example-text-input" class="col-sm-2 col-form-label">Customer Address</label>
                            <div class="form-group col-sm-10">
                                <textarea name="address" class="form-control">{{$customer->mobile_no}}</textarea>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="example-text-input" class="col-sm-2 col-form-label">Customer Image</label>
                            <div class="form-group col-sm-10">
                                <input class="form-control" name="customer_image" type="file" id="customer_image">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="example-text-input" class="col-sm-2 col-form-label"></label>
                            <div class="col-sm-10">
                                <img class="card-img-top img-fluid" src="{{asset($customer->customer_image)}}" style="width: 200px" alt="Card image cap" id="showImage">
                            </div>
                        </div>

                        <input type="submit" value="Update Customer" class="btn btn-success">
                        <!-- end row -->
                    </form>
                    </div>
                </div>
            </div> <!-- end col -->
        </div>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function (){
        $('#myForm').validate({
            rules: {
                name: {
                    required : true,
                },
                mobile_no: {
                    required : true,
                },
                email: {
                    required : true,
                },
                address: {
                    required : true,
                },
            },
            messages :{
                name: {
                    required : 'Please Enter Your Name',
                },
                mobile_no: {
                    required : 'Please Enter Your Mobile Number',
                },
                email: {
                    required : 'Please Enter Your Email',
                },
                address: {
                    required : 'Please Enter Your Address',
                },
            },
            errorElement : 'span',
            errorPlacement: function (error,element) {
                error.addClass('invalid-feedback');
                element.closest('.form-group').append(error);
            },
            highlight : function(element, errorClass, validClass){
                $(element).addClass('is-invalid');
            },
            unhighlight : function(element, errorClass, validClass){
                $(element).removeClass('is-invalid');
            },
        });
    });

</script>


{{-- Code For Customer Image Recent view --}}
<script type="text/javascript">

    $(document).ready(function() {
        $('#customer_image').change(function(e) {
            var reader = new FileReader();
            reader.onload = function(e){
                $('#showImage').attr('src',e.target.result);
            }
            reader.readAsDataURL(e.target.files['0']);
        });
    });

</script>

@endsection
