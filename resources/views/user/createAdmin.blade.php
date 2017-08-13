@extends('pages.home')

@section('content')
{{-- <div class="container">
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
	<br><br> --}}

	<form action="{{route('post.admin')}}" method="POST" class="form-horizontal">
			<br class="hidden-xs-down">
			<br class="hidden-md-up hidden-xs-down">
			<br class="hidden-md-up hidden-xs-down">
			<div class="container modal-content register" style="max-width:800px;">
				<div class="col-md-12 col-sm-12 col-xs-12">
					<div class="modal-header">
						<h1 class="modal-title" id="myModalLabel">
							<img class="register-logo" src="/assets/img/logo_sd.png" style="width:90px;">
							<strong class="register-heading">Data Sekolah</strong>
						</h1>
					</div>
					<div class="modal-body">

						<div class="form-group">
							<label  class="col-sm-4 control-label">Nama Sekolah</label>
							<div class="col-sm-8">
      							<input type="text" class="form-control" name="nama"  placeholder="Contoh : Negeri Cilame">
    						</div>
						</div>

						<div class="form-group">
							<label  class="col-sm-4 control-label">Daerah</label>
							<div class="col-sm-8">
      							<input type="text" class="form-control" name="daerah" placeholder="Contoh : Bandung, Cimahe, Soreang dsbg">
    						</div>
						</div>

						<div class="form-group">
							<label  class="col-sm-4 control-label">Nama Kepala Sekolah</label>
							<div class="col-sm-8">
      							<input type="text" class="form-control" name="kepala" placeholder="Nama Kepala Sekolah">
    						</div>
						</div>

						<div class="form-group">
							<label  class="col-sm-4 control-label">NIP Kepala Sekolah</label>
							<div class="col-sm-8">
      							<input type="text" class="form-control" name="nip" placeholder="NIP kepala Sekolah">
    						</div>
						</div>
						<br>
						<br>
						<br>
						<h3 align="center">Data Admin</h3>
						<hr>

						<div class="form-group">
							<label  class="col-sm-4 control-label">Username</label>
							<div class="col-sm-8">
      							<input type="text" class="form-control" name="username"  placeholder="username">
    						</div>
						</div>

						<div class="form-group">
							<label  class="col-sm-4 control-label">Password</label>
							<div class="col-sm-8">
      							<input type="password" class="form-control" name="password" placeholder="************">
    						</div>
						</div>

						<button type="submit" class="btn btn-lg btn-default register-button">D&nbsp;A&nbsp;F&nbsp;T&nbsp;A&nbsp;R</button>
					</div>
					<div class="modal-footer col-md-12 col-sm-12 col-xs-12" style="margin-right:0; padding-right:0;">
						<div class="col-md-12">
							<p class="text-muted register-footer" align="center">Copyright &copy; @php echo date('Y') @endphp | Created By : Teddi Kuspiadi | NPM :13402396 | All Right Reserved</p>
						</div>
					</div>
				</div>
			</div>
			{{ csrf_field() }}
		</form>
@endsection()