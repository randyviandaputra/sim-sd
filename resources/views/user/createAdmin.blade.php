@extends('pages.home')

@section('content')
<div class="container">
<br>
<br>
	<div class="col-md-4 col-md-offset-4" style="border: 1px solid grey;">
		<form action="{{route('post.admin')}}" method="post" autocomplete="off">
			<h3 class="text-center text-capitalize text-inverse">Buat Akun Admin</h3>
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
				<input type="submit" class="btn btn-block btn-success text-capitalize form-control" value="Buat" />
			</div>
			{{ csrf_field() }}
		</form>
</div>
</div>
</div>
	<br><br>
@endsection()