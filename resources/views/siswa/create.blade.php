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
                        <form action="{{ route('siswa.store') }}" method="POST" enctype="multipart/form-data" class="form-horizontal">
                            <br>
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Kelas</label>
                                    <div class="col-md-3">
                                      <select class="form-control" name="id_kelas">
                                          <option value="">Pilih Kelas</option>
                                          @foreach($kelas as $key)
                                          <option value="{{ $key['id_kelas']}}">{{ $key['tingkat']."-".$key['nama_kelas'] }}</option>
                                          @endforeach
                                      </select>

                                       @if($errors->has('id_kelas'))
                                        <span class="help-block" style="color:red;">{{ $errors->first('id_kelas') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Nama </label>
                                    <div class="col-md-3">
                                       <input type="text" name="nama_siswa" class="form-control">

                                       @if($errors->has('nama_siswa'))
                                        <span class="help-block" style="color:red;">{{ $errors->first('nama_siswa') }}</span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-3 control-label">Tempat Lahir</label>
                                    <div class="col-md-3">
                                       <input type="text" name="tempat_lahir" class="form-control">

                                       @if($errors->has('tempat_lahir'))
                                        <span class="help-block" style="color:red;">{{ $errors->first('tempat_lahir') }}</span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-3 control-label">Tanggal Lahir </label>
                                    <div class="col-md-3">
                                       <input type="date" name="tanggal_lahir" class="form-control">

                                       @if($errors->has('tanggal_lahir'))
                                        <span class="help-block" style="color:red;">{{ $errors->first('tanggal_lahir') }}</span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-3 control-label">Jenis Kelamin </label>
                                    <div class="col-md-3">
                                      <select class="form-control" name="jenis_kelamin">
                                        <option value="">Jenis Kelamin</option>
                                        <option>Laki - Laki</option>
                                        <option>Perempuan</option>
                                    </select>

                                       @if($errors->has('jenis_kelamin'))
                                        <span class="help-block" style="color:red;">{{ $errors->first('jenis_kelamin') }}</span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-3 control-label">golongan darah</label>
                                    <div class="col-md-3">
                                        <select name="golongan_darah" class="form-control">
                                            <option value="">Pilih Golongan Darah</option>
                                            <option value="A">A</option>
                                            <option value="B">B</option>
                                            <option value="O">O</option>
                                            <option value="AB">AB</option>
                                        </select>

                                       @if($errors->has('golongan_darah'))
                                        <span class="help-block" style="color:red;">{{ $errors->first('golongan_darah') }}</span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-3 control-label">Alamat </label>
                                     <div class="col-md-3">
                                        <textarea name="alamat" class="form-control"></textarea> 

                                       @if($errors->has('alamat'))
                                        <span class="help-block" style="color:red;">{{ $errors->first('alamat') }}</span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-3 control-label">Hobi </label>
                                     <div class="col-md-3">
                                        <textarea name="hobi" class="form-control"></textarea> 

                                       @if($errors->has('hobi'))
                                        <span class="help-block" style="color:red;">{{ $errors->first('hobi') }}</span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-3 control-label">Foto</label>
                                     <div class="col-md-3">
                                        <input type="file" class="form-control" name="foto">

                                       @if($errors->has('foto'))
                                        <span class="help-block" style="color:red;">{{ $errors->first('foto') }}</span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-3 control-label">Telepon </label>
                                    <div class="col-md-3">
                                        <input type="text" name="telepon" class="form-control">

                                       @if($errors->has('telepon'))
                                        <span class="help-block" style="color:red;">{{ $errors->first('telepon') }}</span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-3 control-label">Agama</label>
                                    <div class="col-md-3">
                                      <select class="form-control" name="agama">
                                      <option value="">Agama</option>
                                      @php
                                          $agama = array('Islam','Kristen','Hindu','Hindu','Protestan');
                                      @endphp
                                        @for ($i = 0; $i < count($agama) ; $i++)
                                            <option value="{{$agama[$i]}}">{{$agama[$i]}}</option>
                                        @endfor
                                    </select>

                                       @if($errors->has('agama'))
                                        <span class="help-block" style="color:red;">{{ $errors->first('agama') }}</span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-3 control-label">Username </label>
                                <div class="col-md-3">
                                    <input type="text" name="username" class="form-control">

                                       @if($errors->has('username'))
                                        <span class="help-block" style="color:red;">{{ $errors->first('username') }}</span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-3 control-label">Password </label>
                                <div class="col-md-3">
                                    <input type="password" name="password" class="form-control">
                                    </div>
                                </div>
                            </div>

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


