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
                        {!! Form::open(array('route' => 'matpel.store', 'class' => 'form-horizontal')) !!}
                               @include('matpel._form')

                                <div class="form-group">
                                    <label class="col-md-3 control-label">Untuk Tingkat :</label>
                                    <div class="col-md-3">
                                         <div class="btn-group" data-toggle="buttons">
                                             <?php
                                                for ($i=1; $i <= 6  ; $i++) {?>
                                                 <label id="aktif{{$i}}" class="btn btn-default">
                                                    <input type="checkbox" name="tingkat[]" id="akses{{$i}}" value="{{ $i }}">{{$i}}</input>
                                                 </label>
                                                 <?php }
                                                 ?>
                                               @if($errors->has('tingkat'))
                                                <span class="help-block" style="color:red;">{{ $errors->first('tingkat') }}</span>
                                               @endif
                                           </div>
                                    </div>
                                </div>
                            <br><br>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-offset-3 col-md-9">
                                        <button class="btn btn-success">Simpan</button>
                                    </div>
                                </div>
                            </div>
                            </div>
                            {{ csrf_field() }}
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


