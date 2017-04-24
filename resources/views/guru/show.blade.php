@extends('pages.home')

@section('content')
<div class="container">
        <div class="col-md-4">
          <div class="modal-content frm">
            <div align="center">
              <div class="modal-header" style="background-color: #2282C8 ; color: #ffffff ;">
                <div class="display-4">guru</div>
              </div>
              <div class="modal-body" style="height:355px" >              
                    <img alt="User Pic" src="/image/guru/{{$guru->foto}}" class="img-circle img-responsive" width="150px" height="150px"><br>
                    <table class="table">
                      <tr>
                        <td>No Induk</td>
                        <td>:</td>
                        <td>{{$guru->no_induk_guru}}</td>
                      </tr>
                      <tr>
                        <td>Nama</td>
                        <td>:</td>
                        <td>{{$guru->nama_guru}}</td>
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
                        <td>Mata Pelajaran</td>
                        <td>:</td>
                        <td>{{$guru->matpel->nama_matpel}}</td>
                      </tr>
                      <tr>
                        <td>Email</td>
                        <td>:</td>
                        <td>{{$guru->email}}</td>
                      </tr>
                      <tr>
                        <td>Alamat</td>
                        <td>:</td>
                        <td>{{$guru->alamat}}</td>
                      </tr>
                      <tr>
                        <td>Jenis Kelamin</td>
                        <td>:</td>
                        <td>{{$guru->jenis_kelamin}}</td>
                      </tr>
                      <tr>
                        <td>Tempat Tanggal Lahir</td>
                        <td>:</td>
                        <td>{{$guru->tempat_lahir.", ".$guru->tanggal_lahir}}</td>
                      </tr>
                    </table>
              </div>
              <div class="modal-footer" style="margin:0; padding:0;">
                    <a align="center" class="btn btn-success form-control frm print" href="{{ route('guru.index') }}"><i class="fa fa-back" aria-hidden="true"></i> Kembali</a>
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