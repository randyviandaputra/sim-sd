@extends('pages.home')

@section('content')

<div class="row">
    <div class="container">
    	<div class="col-sm-12 content-bottom">
    		<h2>{{ $title }}</h2>
			@include('layouts.partials.validation')
			<div class="row">
  				<div class="col-md-12">
					<div class="panel panel-primary">
						<div class="panel-body">

							{!! Form::open(array('route' => 'nilai.store', 'class' => 'form-horizontal')) !!}

			                @include('nilai._form')

			                {!! Form::close() !!}

						</div>
					</div>
  				</div>
  			</div>
    	</div>
    </div>
</div>

@endsection()


