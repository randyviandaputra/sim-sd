@extends('pages.home')

@section('content')
	<form action="{{route('post.login')}}" method="POST">
			<br class="hidden-xs-down">
			<br class="hidden-md-up hidden-xs-down">
			<br class="hidden-md-up hidden-xs-down">
			<div class="container modal-content register" style="max-width:500px;">
				<div class="col-md-12 col-sm-12 col-xs-12">
					<div class="modal-header">
						<h1 class="modal-title" id="myModalLabel">
							<img class="" src="http://1.bp.blogspot.com/-Bh67v_o9ouY/VCAlZp1s-2I/AAAAAAAAAQk/MESy8z88hp4/s1600/Logo%2BSD%2B(sekolah%2Bdasar).png" style="width:90px;">
						<strong style="font-size: 19px;">Sistem Informasi Sekolah Dasar</strong>
						</h1>
					</div>
					<div class="modal-body">
						<div class="form-group container col-md-12 col-sm-12 col-xs-12" style="margin:0; padding:0;">
							<div class="col-md-2 col-sm-2 col-xs-2" style="margin:0; padding:0;">
								<button class="form-control btn-primary" style="border-right:0px; background-color: #474C5E;" disabled><span class="fa fa-user-o"></span></button>
							</div>
							<div class="col-md-10 col-sm-10 col-xs-10" style="margin:0; padding:0;">
								<input type="text" name="username" class="form-control" placeholder="username">
							</div>
						</div>
						<div class="form-group container col-md-12 col-sm-12 col-xs-12" style="margin:0; padding:0; margin-top:1px; margin-bottom:15px;">
							<div class="col-md-2 col-sm-2 col-xs-2" style="margin:0; padding:0;">
								<button class="form-control btn-primary" style="border-right:0px; background-color: #474C5E;" disabled><span class="fa fa-key"></span></button>
							</div>
							<div class="col-md-10 col-sm-10 col-xs-10" style="margin:0; padding:0;">
								<input type="password" name="password" class="form-control" placeholder="**********">
							</div>
						</div>
						<div class="text-left col-md-8 col-sm-8 col-xs-8">
						</div>
						<button type="submit" class="btn btn-lg btn-default" style="background-color: #474C5E; color:#fff; width: 100%;">Login</button>
					</div>
					<div class="modal-footer col-md-12 col-sm-12 col-xs-12" style="margin-right:0; padding-right:0;">
						<div class="col-md-12">
							<p class="text-muted register-footer" align="center">Copyright &copy; @php echo date('Y') @endphp | Created By : Teddi Kuspiadi | NPM : 13402396 | All Right Reserved</p>
						</div>
					</div>
				</div>
			</div>
			{{ csrf_field() }}
		</form>
@endsection()