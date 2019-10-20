@extends('layout')

@section('content')

<div class="text-center" style="display: flex; justify-content: center;align-items: center; margin-top: 50px; border: 1px solid #ddd; border-radius: 10px; padding-top: 50px; padding-bottom: 40px; flex-direction: column;">
	<img src="https://www.google.com/images/branding/googlelogo/1x/googlelogo_color_272x92dp.png" style="margin-bottom: 20px">
	<div id="the-basics" style="width: 600px; display: inline-block;" class="form-group">
		<input class="typeahead form-control" type="text" placeholder="Enter Keywords" style="border-radius: 20px">
	</div>
</div>

<script type="text/javascript">
	var uri = "{{ route('autocomplete') }}";

	$('input.typeahead').typeahead({
		source:  function (query, process) {
			console.log(query);
			console.log(process);

			return $.get(uri, { query: query }, function (data) {
				return process(data);
			});
		}
	});
</script>

@endsection