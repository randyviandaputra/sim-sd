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
                        <form action="{{ route('kelas.update',$data->id_kelas) }}" method="POST">
                            <div class="form-body">
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Nama Kelas</label>
                                    <div class="col-md-3">
                                       <input type="text" name="nama_kelas" class="form-control" value="{{ $data->nama_kelas }}">
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
                                           <option value="{{ $key->id_guru }}"
                                           @if($data->id_guru == $key->id_guru)
                                           selected
                                           @endif
                                           >{{ $key->nama_guru }}</option>
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
                                           <option value="Y"
                                           @if($data->aktif == "Y")
                                           selected
                                           @endif
                                           >Aktif</option>
                                           <option value="N"
                                           @if($data->aktif == "N")
                                           selected
                                           @endif
                                           >Tidak Aktif</option>
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


