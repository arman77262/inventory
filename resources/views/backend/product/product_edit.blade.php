@extends('admin.admin_master')

@section('admin')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

 <div class="page-content">
    <div class="container-fluid">

       <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                    <form action="{{route('product.update')}}" method="post" id="myForm">

                        @csrf

                        <input type="hidden" name="id" value="{{$product->id}}">

                        <h4 class="card-title">Edit Supplier</h4> <br>

                        <div class="row mb-3">
                            <label for="example-text-input" class="col-sm-2 col-form-label">Product Name</label>
                            <div class="form-group col-sm-10">
                                <input class="form-control" name="name" type="text" id="example-text-input" value="{{$product->name}}">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label">Supplier Name</label>
                            <div class="col-sm-10">
                                <select name="supplier_id" class="form-select" aria-label="Default select example">
                                    <option selected="">Select Supplier Name</option>

                                    @foreach ($supplier as $sup)
                                        <option value="{{$sup->id}}" {{$sup->id == $product->supplier_id ? 'selected' : ''}}>{{$sup->name}}</option>
                                    @endforeach

                                </select>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label">Category Name</label>
                            <div class="col-sm-10">
                                <select name="category_id" class="form-select" aria-label="Default select example">
                                    <option selected="">Select Category Name</option>

                                    @foreach ($category as $cat)
                                        <option value="{{$cat->id}}" {{$cat->id == $product->category_id ? 'selected' : ''}}>{{$cat->name}}</option>
                                    @endforeach

                                </select>
                            </div>
                        </div>


                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label">Unit Name</label>
                            <div class="col-sm-10">
                                <select name="unit_id" class="form-select" aria-label="Default select example">
                                    <option selected="">Select Unit Name</option>

                                    @foreach ($unit as $uni)
                                        <option value="{{$uni->id}}" {{$uni->id == $product->unit_id ? 'selected' : ''}}>{{$uni->name}}</option>
                                    @endforeach

                                </select>
                            </div>
                        </div>


                        <input type="submit" value="Update Product" class="btn btn-success">
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
                category_id : {
                    required : true,
                },
                supplier_id: {
                    required : true,
                },
                unit_id: {
                    required : true,
                },
            },
            messages :{
                name: {
                    required : 'Please Enter Your Name',
                },
                category_id: {
                    required : 'Please Select Category Name',
                },
                supplier_id: {
                    required : 'Please Select Supplier Name',
                },
                unit_id: {
                    required : 'Please Select Unit Name',
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
