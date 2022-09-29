@extends('admin.admin_master')

@section('admin')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

 <div class="page-content">
    <div class="container-fluid">

       <div class="row">
            <div class="col-6">
                <div class="card">
                    <div class="card-body">
                    <form action="{{route('unit.update')}}" method="post" enctype="multipart/form-data" id="myForm">

                        @csrf

                        <input type="hidden" value="{{$unit->id}}" name="id">

                        <h4 class="card-title">Edit Unit</h4> <br>

                        <div class="row mb-3">
                            <label for="example-text-input" class="col-sm-2 col-form-label">Unit Name</label>
                            <div class="form-group col-sm-10">
                                <input class="form-control" name="name" type="text" id="example-text-input" value="{{$unit->name}}">
                            </div>
                        </div>



                        <input type="submit" value="Update Unit" class="btn btn-success">
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

            },
            messages :{
                name: {
                    required : 'Please Enter Your Name',
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
