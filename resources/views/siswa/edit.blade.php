@extends('pages.home')

@section('content')

<div class="row">
    <div class="container">
        <div class="col-sm-12 content-bottom">
            <h2>{{ $title }}</h2>
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-primary">
                        <div class="panel-body register">
                        {!! Form::model($query, array('route' => ['siswa.update', 'id' => $query->id_siswa], 
                                'class' => 'form-horizontal')) !!}
                               @include('siswa._form')

                               <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-offset-3 col-md-9">
                                            {!! Form::submit('Simpan', array('class' => 'btn btn-success')) !!}
                                            <a href="{{ URL::route('siswa.index') }}" class="btn btn-primary">Kembali</a>
                                        </div>
                                    </div>
                                </div>
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

<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script type="text/javascript">
$(document).ready(function(){
$( "#datepicker" ).datepicker({
      autoclose: true,
      dateFormat: 'yy-mm-dd',
  });
 $( function(){
        $('[data-toggle="popover"]').popover()
      });
});
</script>
@endsection


