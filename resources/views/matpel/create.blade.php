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
                        <div class="form-body">
                        <span style="color:red;">{{ Session::get('add_guru') }}</span>
                        <form action="{{ route('matpel.store') }}" method="POST" class="form-horizontal">
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Kode Matpel</label>
                                    <div class="col-md-3">
                                       <input type="text" name="kode_matpel" class="form-control">

                                       @if($errors->has('kode_matpel'))
                                        <span class="help-block" style="color:red;">{{ $errors->first('kode_matpel') }}</span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-3 control-label">Nama Matpel</label>
                                    <div class="col-md-3">
                                       <input type="text" name="nama_matpel" class="form-control">

                                       @if($errors->has('nama_matpel'))
                                        <span class="help-block" style="color:red;">{{ $errors->first('nama_matpel') }}</span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-3 control-label">KKM</label>
                                    <div class="col-md-3">
                                       <input type="text" name="kkm" class="form-control">

                                       @if($errors->has('kkm'))
                                        <span class="help-block" style="color:red;">{{ $errors->first('kkm') }}</span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-3 control-label">Untuk Tingkat :</label>
                                    <div class="col-md-3">
                                         <div class="btn-group" data-toggle="buttons">
                                             <?php
                                                for ($i=1; $i <= 6  ; $i++) {?>
                                                 <label class="btn btn-primary">
                                                    <input type="checkbox" name="tingkat[]" id="akses" value="{{ $i }}">{{$i}}</input>
                                                 </label>                                    
                                                 <?php }
                                                 ?>
                                               @if($errors->has('tingkat'))
                                                <span class="help-block" style="color:red;">{{ $errors->first('tingkat') }}</span>
                                               @endif
                                           </div>
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
                            {{ csrf_field() }}

                        </form>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection()


