@extends('pages.home')

@section('content')

<div class="row">
    <div class="container">
    	<div class="col-sm-12 content-bottom">
    		<h2>{{ $title }}</h2>
			<div class="row">
  				<div class="col-md-12">
					<div class="panel panel-primary">
						<div class="panel-body">

							{!! Form::model($query, array('route' => ['nilai.update', 'id' => $data[0]->id_matpel], 
								'class' => 'form-horizontal')) !!}

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
@section('javascript')
 <script type="text/javascript">

      $( function()
      {
        $('[data-toggle="popover"]').popover()
      }
      );
   </script>
@endsection




