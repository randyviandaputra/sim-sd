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
                        {!! Form::open(array('route' => 'guru.store', 'class' => 'form-horizontal', 'enctype' =>'multipart/form-data')) !!}
                               @include('guru._form')

                               @if($errors->has('email'))
                                      <div class="form-group has-error has-feedback">
                                       {!! Form::label('', 'Email', array('class' => 'col-md-3 control-label', 'for' => 'inputError2')) !!}
                                  @else
                                      <div class="form-group">
                                      {!! Form::label('', 'Email', array('class' => 'col-md-3 control-label')) !!}
                                  @endif
                                  <div class="col-md-3">
                                      @if($errors->has('email'))
                                      {!! Form::email('email', null, array('class' => 'form-control','data-container' => 'body', 'data-toggle' => 'popover', 'data-placement' => 'right', 'data-content' => $errors->first('email'), 'data-trigger' => 'focus', 'id' => 'inputError2','aria-describedby' => 'inputError2Status')) !!}
                                       <span class="glyphicon glyphicon-remove form-control-feedback" aria-hidden="true"></span>
                                       <span id="inputError2Status" class="sr-only">(error)</span>
                                      @else
                                           {!! Form::email('email', null, array('class' => 'form-control')) !!}
                                      @endif
                                  </div>
                              </div>

                              @if($errors->has('username'))
                                      <div class="form-group has-error has-feedback">
                                       {!! Form::label('', 'Username', array('class' => 'col-md-3 control-label', 'for' => 'inputError2')) !!}
                                  @else
                                      <div class="form-group">
                                      {!! Form::label('', 'Username', array('class' => 'col-md-3 control-label')) !!}
                                  @endif
                                  <div class="col-md-3">
                                      @if($errors->has('username'))
                                      {!! Form::text('username', null, array('class' => 'form-control','data-container' => 'body', 'data-toggle' => 'popover', 'data-placement' => 'right', 'data-content' => $errors->first('username'), 'data-trigger' => 'focus', 'id' => 'inputError2','aria-describedby' => 'inputError2Status')) !!}
                                       <span class="glyphicon glyphicon-remove form-control-feedback" aria-hidden="true"></span>
                                       <span id="inputError2Status" class="sr-only">(error)</span>
                                      @else
                                           {!! Form::text('username', null, array('class' => 'form-control')) !!}
                                      @endif
                                  </div>
                              </div>
                              @if($errors->has('password'))
                                      <div class="form-group has-error has-feedback">
                                       {!! Form::label('', 'Password', array('class' => 'col-md-3 control-label', 'for' => 'inputError2')) !!}
                                  @else
                                      <div class="form-group">
                                      {!! Form::label('', 'Password', array('class' => 'col-md-3 control-label')) !!}
                                  @endif
                                  <div class="col-md-3">
                                      @if($errors->has('password'))
                                      {!! Form::password('password', array('class' => 'form-control','data-container' => 'body', 'data-toggle' => 'popover', 'data-placement' => 'right', 'data-content' => $errors->first('password'), 'data-trigger' => 'focus', 'id' => 'inputError2','aria-describedby' => 'inputError2Status')) !!}
                                       <span class="glyphicon glyphicon-remove form-control-feedback" aria-hidden="true"></span>
                                       <span id="inputError2Status" class="sr-only">(error)</span>
                                      @else
                                           {!! Form::password('password', array('class' => 'form-control')) !!}
                                      @endif
                                  </div>
                              </div>


                               <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-offset-3 col-md-9">
                                            {!! Form::submit('Simpan', array('class' => 'btn btn-success')) !!}
                                            <a href="{{ URL::route('guru.index') }}" class="btn btn-primary">Kembali</a>
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
