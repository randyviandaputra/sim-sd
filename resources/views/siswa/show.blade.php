@extends('pages.home')

@section('content')
<div class="container">
        <div class="col-md-4">
          <div class="modal-content frm">
            <div align="center">
              <div class="modal-header" style="background-color: #2282C8 ; color: #ffffff ;">
                <div class="display-4">Siswa</div>
              </div>
              <div class="modal-body" style="height:355px" >              
                    <img alt="User Pic" src="/image/siswa/{{$siswa->foto}}" class="img-circle img-responsive" width="150px" height="150px"><br>
                    <table class="table">
                      <tr>
                        <td>NIS</td>
                        <td>:</td>
                        <td>{{$siswa->no_induk_siswa}}</td>
                      </tr>
                      <tr>
                        <td>Nama</td>
                        <td>:</td>
                        <td>{{$siswa->nama_siswa}}</td>
                      </tr>
                      <tr>
                        <td>Tingkat/Kelas</td>
                        <td>:</td>
                        <td>{{$siswa->kelas->tingkat."-".$siswa->kelas->nama_kelas}}</td>
                      </tr>
                      <tr>
                        <td>Angkatan</td>
                        <td>:</td>
                        <td>{{$siswa->angkatan_tahun}}</td>
                      </tr>
                    </table>
              </div>
            </div>
          </div>
        </div>

        <div class="col-md-8">
          <div class="modal-content frm">
            <div align="center">
              <div class="modal-header" style="background-color: #2282C8 ; color: #ffffff ;">
                <div class="display-4">Detail</div>
              </div>
              <div class="modal-body" style="height:325px">
              <table class="table">
                      <tr>
                        <td>Jenis Kelamin</td>
                        <td>:</td>
                        <td>{{$siswa->jenis_kelamin}}</td>
                      </tr>
                      <tr>
                        <td>Tempat Tanggal Lahir</td>
                        <td>:</td>
                        <td>{{$siswa->tempat_lahir.", ".$siswa->tanggal_lahir}}</td>
                      </tr>
                      <tr>
                        <td>Alamat</td>
                        <td>:</td>
                        <td>{{$siswa->alamat}}</td>
                      </tr>
                      <tr>
                        <td>Golongan Darah</td>
                        <td>:</td>
                        <td>{{$siswa->golongan_darah}}</td>
                      </tr>
                      <tr>
                        <td>Hobi</td>
                        <td>:</td>
                        <td>{{$siswa->hobi}}</td>
                      </tr>
                      <tr>
                        <td>Telepon</td>
                        <td>:</td>
                        <td>{{$siswa->telepon}}</td>
                      </tr>
                      <tr>
                        <td>Agama</td>
                        <td>:</td>
                        <td>{{$siswa->agama}}</td>
                      </tr>
                      <tr>
                        <td>Tanggal Masuk</td>
                        <td>:</td>
                        <td>{{$siswa->tanggal_masuk}}</td>
                      </tr>
                    </table>
              </div>
              <div class="modal-footer" style="margin:0; padding:0;">
                    <a align="center" class="btn btn-success form-control frm print" href="{{ route('siswa.index') }}"><i class="fa fa-back" aria-hidden="true"></i> Kembali</a>
                  </div>
            </div>
          </div>
        </div>

</div>
@endsection()
@section('javascript')
 <script type="text/javascript">

      $( function()
      {
        $('[data-toggle="popover"]').popover()
      }
      );
   </script>
@endsection