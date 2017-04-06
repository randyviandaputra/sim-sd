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
                        @if ($errors->any())
                          <div class="alert alert-danger alert-dismissible" role="alert">
                             <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><em>
                          <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                         </ul>
                        </em>
                        </div>
                        @endif
                        <form action="{{ route('kelas.store') }}" method="POST">

                            <div class="form-body">
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Tingkat</label>
                                    <div class="col-md-3">
                                       <select name="tingkat" class="form-control">
                                           <option value="">Tingkat</option>
                                           <option value="1">1</option>
                                           <option value="2">2</option>
                                           <option value="3">3</option>
                                           <option value="4">4</option>
                                           <option value="5">5</option>
                                           <option value="6">6</option>
                                       </select>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class="form-body">
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Nama Kelas</label>
                                    <div class="col-md-3">
                                       <input type="text" name="nama_kelas" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class="form-body">
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Wali Kelas</label>
                                    <div class="col-md-3">
                                       <select name="id_guru" class="form-control">
                                           <option value="">Pilih Wali Kelas</option>
                                           @foreach($guru as $key)
                                           <option value="{{ $key->id_guru }}">{{ $key->nama_guru }}</option>
                                           @endforeach
                                       </select>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class="form-body">
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Status</label>
                                    <div class="col-md-3">
                                       <select name="aktif" class="form-control">
                                           <option value="">Status</option>
                                           <option value="Y">Aktif</option>
                                           <option value="N">Tidak Aktif</option>
                                       </select>
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


