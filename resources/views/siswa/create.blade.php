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
                        <form action="{{ route('siswa.store') }}" method="POST" enctype="multipart/form-data">
                            <div class="form-body">
                                <div class="form-group">
                                    <label class="col-md-3 control-label">No Induk</label>
                                    <div class="col-md-3">
                                       <input type="text" name="no_induk_siswa" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class="form-body">
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Kelas</label>
                                    <div class="col-md-3">
                                      <select class="form-control" name="id_kelas">
                                          <option>Pilih Kelas</option>
                                          @foreach($kelas as $key)
                                          <option value="{{ $key['id_kelas']}}">{{ $key['nama_kelas'] }}</option>
                                          @endforeach
                                      </select>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class="form-body">
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Nama </label>
                                    <div class="col-md-3">
                                       <input type="text" name="nama_siswa" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class="form-body">
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Tempat Lahir</label>
                                    <div class="col-md-3">
                                       <input type="text" name="tempat_lahir" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <br>

                            <div class="form-body">
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Tanggal Lahir </label>
                                    <div class="col-md-3">
                                       <input type="date" name="tanggal_lahir" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <br>

                            <div class="form-body">
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Jenis Kelamin </label>
                                    <div class="col-md-3">
                                      <select class="form-control" name="jenis_kelamin">
                                        <option>Jenis Kelamin</option>
                                        <option>Laki - Laki</option>
                                        <option>Perempuan</option>
                                    </select>
                                    </div>
                                </div>
                            </div>
                            <br>

                            <div class="form-body">
                                <div class="form-group">
                                    <label class="col-md-3 control-label">golongan darah</label>
                                    <div class="col-md-3">
                                       <input type="text" name="golongan_darah" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <br>

                            <div class="form-body">
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Alamat </label>
                                     <div class="col-md-3">
                                        <textarea name="alamat" class="form-control"></textarea> 
                                    </div>
                                </div>
                            </div>
                             <br>
                              <br>

                            <div class="form-body">
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Foto</label>
                                     <div class="col-md-3">
                                        <input type="file" class="form-control" name="foto">
                                    </div>
                                </div>
                            </div>
                             <br>
                            <br>


                            <div class="form-body">
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Telepon </label>
                                <div class="col-md-3">
                                    <input type="text" name="telepon" class="form-control">
                                    </div>
                                </div>
                            </div>
                            
                            <br>

                            <div class="form-body">
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
                                    </div>
                                </div>
                            </div>
                            <br>

                            <div class="form-body">
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Username </label>
                                <div class="col-md-3">
                                    <input type="text" name="username" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <br>

                            <div class="form-body">
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


