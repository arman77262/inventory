@extends('admin.admin_master')

@section('admin')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

 <div class="page-content">
    <div class="container-fluid">

       <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                    <form action="{{route('store.profile')}}" method="post" enctype="multipart/form-data" id="myForm">

                        @csrf

                        <h4 class="card-title">Add Supplier</h4> <br>

                        <div class="row mb-3">
                            <label for="example-text-input" class="col-sm-2 col-form-label">Supplier Name</label>
                            <div class="form-group col-sm-10">
                                <input class="form-control" name="name" type="text" id="example-text-input">
                            </div>
                        </div>

                         <div class="row mb-3">
                            <label for="example-text-input" class="col-sm-2 col-form-label">Mobile Number</label>
                            <div class="form-group col-sm-10">
                                <input class="form-control" name="mobile_no" type="number" id="example-text-input">
                            </div>
                        </div>

                         <div class="row mb-3">
                            <label for="example-text-input" class="col-sm-2 col-form-label">Email</label>
                            <div class="form-group col-sm-10">
                                <input class="form-control" name="email" type="email" id="example-text-input">
                            </div>
                        </div>

                         <div class="row mb-3">
                            <label for="example-text-input" class="col-sm-2 col-form-label">Address</label>
                            <div class="form-group col-sm-10">
                                <textarea name="address" class="form-control"></textarea>
                            </div>
                        </div>

                        <input type="submit" value="Add Supplier" class="btn btn-success">
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

@endsection
