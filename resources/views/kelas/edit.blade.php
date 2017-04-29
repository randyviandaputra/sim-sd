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
                        {!! Form::model($query, array('route' => ['kelas.update', 'id' => $query->id_kelas], 
                                'class' => 'form-horizontal')) !!}
                               @include('kelas._form')

                               <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-offset-3 col-md-9">
                                            {!! Form::submit('Simpan', array('class' => 'btn btn-success')) !!}
                                            <a href="{{ URL::route('kelas.index') }}" class="btn btn-primary">Kembali</a>
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
<script type="text/javascript">
$(document).ready(function (){
  
      $( function()
      {
        $('[data-toggle="popover"]').popover()
      }
      );
    $('.datepicker').datepicker();
})
</script>
@endsection


