@extends('layout')

@section('content')

<h2 style="margin-top: 30px">Add New User With AJAX</h2>

<div class="alert alert-warning" id="message">Please Fill Form Berikut</div>

<form action="" id="myForm" method="POST">
    @csrf

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Name:</strong>
                <input type="text" name="name" class="form-control" placeholder="Name">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Email:</strong>
                <input type="email" name="email" class="form-control" placeholder="Email">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Password:</strong>
                <input type="password" name="password" class="form-control" placeholder="Password">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>

</form>

<style type="text/css">
    ul{
        margin-bottom: 0 !important;
    }
</style>

<script type="text/javascript">
    $('#myForm').on('submit', function(e){
        e.preventDefault();

        $('#message').removeClass('alert-danger').removeClass('alert-success').addClass('alert-warning').text('loading. . . .');

        var uri = "{{ url('user/ajaxcreate') }}";
        var formData = new FormData($('#myForm')[0]);

        console.log(uri);
        console.log(formData);

        var success_func = function(response){
            if(response.status){
                $('#message').removeClass('alert-danger').removeClass('alert-warning').addClass('alert-success').text(response.data['name'] + ' Berhasil Tersimpan');
            } else {
                $('#message').removeClass('alert-warning').removeClass('alert-success').addClass('alert-danger').text('Gagal Tersimpan');
            }
        }

        var fail_func = function(response){
            console.log(response);
            $('#message').removeClass('alert-warning').removeClass('alert-success').addClass('alert-danger').html('<ul></ul>');

            $.each(response.error, function( key, value ) {
                $("#message").find("ul").append('<li>'+value+'</li>');
            });
        }        

        myAjaxPost(uri, formData, success_func, fail_func);
    });
</script>
@endsection