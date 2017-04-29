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
    $('input:checkbox').change(function(){
    if($('#akses1').is(":checked")) {
        $('#aktif1').removeClass("btn btn-default");
        $('#aktif1').addClass("btn btn-primary");
    }
    else{
        $('#aktif1').removeClass("btn btn-primary");
        $('#aktif1').addClass("btn btn-default");
    }
});
     $('input:checkbox').change(function(){
    if($('#akses2').is(":checked")) {
        $('#aktif2').removeClass("btn btn-default");
        $('#aktif2').addClass("btn btn-primary");
    }
    else{
        $('#aktif2').removeClass("btn btn-primary");
        $('#aktif2').addClass("btn btn-default");
    }
}); $('input:checkbox').change(function(){
    if($('#akses3').is(":checked")) {
        $('#aktif3').removeClass("btn btn-default");
        $('#aktif3').addClass("btn btn-primary");
    }
    else{
        $('#aktif3').removeClass("btn btn-primary");
        $('#aktif3').addClass("btn btn-default");
    }
}); $('input:checkbox').change(function(){
    if($('#akses4').is(":checked")) {
        $('#aktif4').removeClass("btn btn-default");
        $('#aktif4').addClass("btn btn-primary");
    }
    else{
        $('#aktif4').removeClass("btn btn-primary");
        $('#aktif4').addClass("btn btn-default");
    }
}); $('input:checkbox').change(function(){
    if($('#akses5').is(":checked")) {
        $('#aktif5').removeClass("btn btn-default");
        $('#aktif5').addClass("btn btn-primary");
    }
    else{
        $('#aktif5').removeClass("btn btn-primary");
        $('#aktif5').addClass("btn btn-default");
    }
}); $('input:checkbox').change(function(){
    if($('#akses6').is(":checked")) {
        $('#aktif6').removeClass("btn btn-default");
        $('#aktif6').addClass("btn btn-primary");
    }
    else{
        $('#aktif6').removeClass("btn btn-primary");
        $('#aktif6').addClass("btn btn-default");
    }
});
</script>
 <script type="text/javascript">

      $( function()
      {
        $('[data-toggle="popover"]').popover()
      }
      );
   </script>
@endsection


