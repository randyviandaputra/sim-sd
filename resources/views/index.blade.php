@extends('pages.home')

@section('content')
<div class="container">
<br>
<br>
	<div class="col-md-4 col-md-offset-4" style="border: 1px solid grey;">
		<form action="{{route('post.login')}}" method="post" autocomplete="off">
			<h3 class="text-center text-capitalize text-inverse">Silahkan Login</h3>
			@if (count($errors)>0)
				<div class="alert alert-danger">
					@foreach ($errors->all() as $error)
						<p>{{$error}}</p>
					@endforeach
				</div>
			@endif
			<div class="form-group">
				<input type="text" class="form-control" name="username" placeholder="Username">
			</div>
			<div class="form-group">
				<input type="password" class="form-control" name="password" placeholder="Password">
			</div>
			<div class="form-group">
				<input type="submit" class="btn btn-block btn-primary text-capitalize form-control" value="login" />
			</div>
			{{ csrf_field() }}
		</form>
</div>
</div>
</div>
	<br><br>
@endsection()