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
                          <div class="form-body">
                                <div class="panel-body">
                        <div class="form-body">
                        <form action="{{ route('siswa.update',$data->id_siswa) }}" method="POST" enctype="multipart/form-data">
                            <div class="form-body">
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Kelas</label>
                                    <div class="col-md-3">
                                      <select class="form-control" name="id_kelas">
                                      <option value="{{ $data->id_kelas}}">{{ $data->nama_kelas }}</option>
                                          @foreach($kelas as $key)
                                            @if ($data->id_kelas != $key['id_kelas'])
                                              <option value="{{ $key['id_kelas']}}">{{ $key['nama_kelas'] }}</option>
                                            @endif
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
                                       <input type="text" name="nama_siswa" class="form-control" value="{{$data->nama_siswa}}">
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class="form-body">
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Tempat Lahir</label>
                                    <div class="col-md-3">
                                       <input type="text" name="tempat_lahir" class="form-control" value="{{$data->alamat}}">
                                    </div>
                                </div>
                            </div>
                            <br>

                            <div class="form-body">
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Tanggal Lahir </label>
                                    <div class="col-md-3">
                                       <input type="date" name="tanggal_lahir" class="form-control" value="{{$data->tanggal_lahir}}">
                                    </div>
                                </div>
                            </div>
                            <br>

                            <div class="form-body">
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Jenis Kelamin </label>
                                    <div class="col-md-3">
                                    @php
                                      $jk = array('Laki - Laki', 'Perempuan');
                                    @endphp
                                      <select class="form-control" name="jenis_kelamin">
                                        <option value="{{$data->jenis_kelamin}}">{{$data->jenis_kelamin}}</option>
                                        @for ($i = 0; $i < count($jk) ; $i++)
                                          @if ($jk[$i] != $data->jenis_kelamin)
                                            <option value="{{$jk[$i]}}">{{$jk[$i]}}</option>
                                          @endif
                                        @endfor
                                      </select>
                                    </div>
                                </div>
                            </div>
                            <br>

                            <div class="form-body">
                                <div class="form-group">
                                    <label class="col-md-3 control-label">golongan darah</label>
                                    <div class="col-md-3">
                                       <input type="text" name="golongan_darah" class="form-control" value="{{$data->golongan_darah}}">
                                    </div>
                                </div>
                            </div>
                            <br>

                            <div class="form-body">
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Alamat </label>
                                     <div class="col-md-3">
                                        <textarea name="alamat" class="form-control">{{$data->alamat}}</textarea> 
                                    </div>
                                </div>
                            </div>
                             <br>
                              <br>


                            <div class="form-body">
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Telepon </label>
                                <div class="col-md-3">
                                    <input type="text" name="telepon" class="form-control" value="{{$data->telepon}}">
                                    </div>
                                </div>
                            </div>
                            
                            <br>

                            <div class="form-body">
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Agama</label>
                                    <div class="col-md-3">
                                      <select class="form-control" name="agama">
                                      @php
                                          $agama = array('Islam','Kristen','Hindu','Hindu','Protestan');
                                      @endphp
                                      <option value="{{$data->agama}}">{{$data->agama}}</option>
                                        @for ($i = 0; $i < count($agama) ; $i++)
                                            @if ($data->agama != $agama[$i])
                                              <option value="{{$agama[$i]}}">{{$agama[$i]}}</option>
                                            @endif
                                        @endfor
                                    </select>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class="form-body">
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Foto</label>
                                     <div class="col-md-3">
                                        <input type="file" class="form-control" name="foto"  value="{{ $data->foto }}">
                                    </div>
                                </div>
                            </div>
                            <br>

                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-offset-3 col-md-9">
                                        <button class="btn btn-success">Simpan</button>
                                    </div>
                                </div>
                            </div>
                            {{ csrf_field() }}
                            </div>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection()


