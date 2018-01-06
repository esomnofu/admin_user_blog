@forelse($errors->all() as $error)
<div class="alert alert-danger"> {{ $error }} </div>
@empty
@endforelse


@if(session()->has('created'))
	<p class="alert alert-success">
		{{ session('created') }}
	</p>
@endif



@if(session()->has('updated'))
	<p class="alert alert-info">
		{{ session('updated') }}
	</p>
@endif


@if(session()->has('deleted'))
	<p class="alert alert-danger">
		{{ session('deleted') }}
	</p>
@endif