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
                        <div class="form-body">
                        <span style="color:red;">{{ Session::get('add_kelas') }}</span>
                        <form action="{{ route('guru.store') }}" class="form-horizontal" method="POST" enctype="multipart/form-data">

                            <div class="form-body">
                                <div class="form-group">
                                    <label class="col-md-3 control-label">No Induk</label>
                                    <div class="col-md-5">
                                       <input type="text" name="no_induk_guru" class="form-control">
                                       @if($errors->has('no_induk_guru'))
                                        <span class="help-block" style="color:red;">{{ $errors->first('no_induk_guru') }}</span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-3 control-label">Mata Pelajaran</label>
                                    <div class="col-md-5">
                                      <select class="form-control" name="id_matpel">
                                          <option value="">Pilih Mata Pelajaran</option>
                                          @foreach($data as $key)
                                          <option value="{{ $key['id_matpel']}}">{{ $key['nama_matpel'] }}</option>
                                          @endforeach
                                      </select>
                                       @if($errors->has('id_matpel'))
                                        <span class="help-block" style="color:red;">{{ $errors->first('id_matpel') }}</span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-3 control-label">Nama </label>
                                    <div class="col-md-5">
                                       <input type="text" name="nama_guru" class="form-control">

                                       @if($errors->has('nama_guru'))
                                        <span class="help-block" style="color:red;">{{ $errors->first('nama_guru') }}</span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-3 control-label">Tempat Lahir</label>
                                    <div class="col-md-5">
                                       <input type="text" name="tempat_lahir" class="form-control">

                                       @if($errors->has('tempat_lahir'))
                                        <span class="help-block" style="color:red;">{{ $errors->first('tempat_lahir') }}</span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-3 control-label">Tanggal Lahir </label>
                                    <div class="col-md-5">
                                       <input type="date" name="tanggal_lahir" class="form-control">

                                       @if($errors->has('tanggal_lahir'))
                                        <span class="help-block" style="color:red;">{{ $errors->first('tanggal_lahir') }}</span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-3 control-label">Jenis Kelamin </label>
                                    <div class="col-md-5">
                                      <select class="form-control" name="jenis_kelamin">
                                        <option>Laki - Laki</option>
                                        <option>Perempuan</option>
                                    </select>

                                       @if($errors->has('jenis_kelamin'))
                                        <span class="help-block" style="color:red;">{{ $errors->first('jenis_kelamin') }}</span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-3 control-label">Alamat </label>
                                     <div class="col-md-5">
                                        <textarea name="alamat" class="form-control"></textarea> 
                                       @if($errors->has('alamat'))
                                        <span class="help-block" style="color:red;">{{ $errors->first('alamat') }}</span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-3 control-label">Foto</label>
                                     <div class="col-md-5">
                                        <input type="file" class="form-control" name="foto">
                                    </div>
                                </div>
                            </div>
                             <br>
                            <div class="form-body">
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Email </label>
                                    <div class="col-md-5">
                                        <input type="email" name="email" class="form-control">

                                       @if($errors->has('email'))
                                        <span class="help-block" style="color:red;">{{ $errors->first('email') }}</span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-3 control-label">Username </label>
                                <div class="col-md-5">
                                    <input type="text" name="username" class="form-control">

                                       @if($errors->has('username'))
                                        <span class="help-block" style="color:red;">{{ $errors->first('username') }}</span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-3 control-label">Password </label>
                                <div class="col-md-5">
                                    <input type="password" name="password" class="form-control">
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


