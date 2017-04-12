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
                        <span style="color:red;">{{ Session::get('add_siswa') }}</span>
                        <form action="{{ route('jadwal.store', $kelas->id_kelas) }}" method="POST" class="form-horizontal">
                        <input type="hidden" name="id_kelas" value="{{ $kelas->id_kelas }}">
                                <div class="form-group">
                                    <label class="col-md-3 control-label">hari</label>
                                    <div class="col-md-3">
                                       <select name="hari" class="form-control">
                                           <option value="">hari</option>
                                           <option value="1">Senin</option>
                                           <option value="2">Selasa</option>
                                           <option value="3">Rabu</option>
                                           <option value="4">Kamis</option>
                                           <option value="5">Jumat</option>
                                           <option value="6">Sabtu</option>
                                       </select>

                                       @if($errors->has('hari'))
                                        <span class="help-block" style="color:red;">{{ $errors->first('hari') }}</span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-3 control-label">Mata Pelajaran</label>
                                    <div class="col-md-3">
                                       <select name="mata_pelajaran" class="form-control">
                                           <option value="">Pilih Matpel</option>
                                           @foreach($matpel as $key)
                                           <option value="{{ $key->id_matpel }}">{{ $key->nama_matpel }}</option>
                                           @endforeach
                                       </select>

                                       @if($errors->has('mata_pelajaran'))
                                        <span class="help-block" style="color:red;">{{ $errors->first('mata_pelajaran') }}</span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-3 control-label">Guru</label>
                                    <div class="col-md-3">
                                       <select name="id_guru" class="form-control">
                                           <option value=""> Pilih Guru</option>
                                       </select>

                                       @if($errors->has('id_guru'))
                                        <span class="help-block" style="color:red;">{{ $errors->first('id_guru') }}</span>
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
@section('javascript')

<script type="text/javascript">
    $(document).ready(function() {
        $('select[name="mata_pelajaran"]').on('change', function() {
            var matpel_id = $(this).val();
            if(matpel_id) {
                $.ajax({
                    url: "{{URL::to('kelas/ajax/matpel-guru/')}}/"+matpel_id,
                    type: "GET",
                    dataType: "json",
                    success:function(data) {
                        $('select[name="id_guru"]').empty();
                        $('select[name="id_guru"]').append('<option value=>Pilih Guru</option>');
                        $.each(data, function(key, value) {
                            if(key != ''){ 
                              $('select[name="id_guru"]').append('<option value="'+ value +'">'+ key +'</option>');
                            }
                            else{
                               $('select[name="id_guru"]').append('<option>Tidak Ada Guru</option>');
                            }
                        });
                    }
                });
            }else{
                $('select[name="id_guru"]').empty();
                $('select[name="id_guru"]').append('<option value=>Pilih Guru</option>');
            }
        });
    });
</script>
@endsection


