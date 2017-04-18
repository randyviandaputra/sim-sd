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
                        <form action="{{ route('matpel.update',$data[0]->id_matpel) }}" method="POST" class="form-horizontal">
                            <div class="form-body">
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Kode Matpel</label>
                                    <div class="col-md-3">
                                       <input type="text" name="kode_matpel" class="form-control" value="{{ $data[0]->kode_matpel }}">
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class="form-body">
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Nama Matpel</label>
                                    <div class="col-md-3">
                                       <input type="text" name="nama_matpel" class="form-control" value="{{ $data[0]->nama_matpel }}">
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class="form-body">
                                <div class="form-group">
                                    <label class="col-md-3 control-label">KKM</label>
                                    <div class="col-md-3">
                                       <input type="text" name="kkm" class="form-control" value="{{ $data[0]->kkm }}">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                    <label class="col-md-3 control-label">Untuk Tingkat :</label>
                                    <div class="col-md-3">
                                    <div class="btn-group" data-toggle="buttons">
                                    <?php
                                        for ($i=1; $i < 7; $i++) {
                                            $role = App\Models\role_matpel::where('id_matpel','=',$data[0]->id_matpel)->where('tingkat','=',$i)->first();
                                        ?>
                                        <label 
                                            @if($role)
                                               class="btn btn-primary active"
                                            @else
                                               class="btn btn-primary"    
                                            @endif
                                        >
                                                    <input type="checkbox" name="tingkat[]" id="akses" value="{{ $i }}"
                                        @if($role)
                                        checked 
                                        @endif
                                                    >{{$i}}</input>
                                        </label>  
                                        
                                     <?php }?> 
                                     </div>  
                                       @if($errors->has('tingkat'))
                                        <span class="help-block" style="color:red;">{{ $errors->first('tingkat') }}</span>
                                        @endif
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


