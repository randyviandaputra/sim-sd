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
                        <form action="{{ route('guru.update',$guru->id_guru) }}" method="POST" enctype="multipart/form-data">
                            <div class="form-body">
                                <div class="form-group">
                                    <label class="col-md-3 control-label">No Induk</label>
                                    <div class="col-md-3">
                                       <input type="text" name="no_induk_guru" class="form-control" value="{{ $guru->no_induk_guru }}">
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class="form-body">
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Mata Pelajaran</label>
                                    <div class="col-md-3">
                                      <select class="form-control" name="id_matpel">
                                          <option>Pilih Mata Pelajaran</option>
                                          @foreach($data as $key)
                                          <option value="{{ $key['id_matpel']}}"
                                          @if($guru->id_matpel == $key['id_matpel'])
                                            selected
                                          @endif
                                          >{{ $key['nama_matpel'] }}</option>
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
                                       <input type="text" name="nama_guru" class="form-control"  value="{{ $guru->nama_guru}}">
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class="form-body">
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Tempat Lahir</label>
                                    <div class="col-md-3">
                                       <input type="text" name="tempat_lahir" class="form-control" value="{{ $guru->tempat_lahir }}">
                                    </div>
                                </div>
                            </div>
                            <br>

                            <div class="form-body">
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Tanggal Lahir </label>
                                    <div class="col-md-3">
                                       <input type="date" name="tanggal_lahir" class="form-control"  value="{{ $guru->tanggal_lahir }}">
                                    </div>
                                </div>
                            </div>
                            <br>

                            <div class="form-body">
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Jenis Kelamin </label>
                                    <div class="col-md-3">
                                      <select class="form-control" name="jenis_kelamin">
                                        <option
                                        @if($guru->jeni_kelamin == "Laki - Laki")
                                        selected
                                        @endif
                                        >Laki - Laki</option>
                                        <option
                                        @if($guru->jenis_kelamin == "Perempuan")
                                        selected
                                        @endif
                                        >Perempuan</option>
                                    </select>
                                    </div>
                                </div>
                            </div>
                            <br>

                            <div class="form-body">
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Alamat </label>
                                     <div class="col-md-3">
                                        <textarea name="alamat" class="form-control">{{ $guru->alamat }}</textarea> 
                                    </div>
                                </div>
                            </div>
                             <br>
                              <br>

                            <div class="form-body">
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Foto</label>
                                     <div class="col-md-3">
                                        <input type="file" class="form-control" name="foto"  value="{{ $guru->foto }}">
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


