<!DOCTYPE html>
<html>
<head>
	<link href="{{ asset('assets/lib/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
	<script src="{{ asset('assets/lib/jquery.min.js') }}"></script>

	<script type="text/javascript">
		function myAjaxPost(uri, formData, success_func, fail_func){
			$.ajax({
				type: "POST",
				url: uri,
				data: formData,
				cache: false,
				contentType: false,
				processData: false,
				success: function(response){
					console.log(response);
					if( ! response.status){                 
						fail_func(response);
					} else{
						success_func(response);
					}
				},
			});
		}
	</script>

</head>
<body>
	
	<div class="container">
		@yield('content')
	</div>
	
</body>
</html>