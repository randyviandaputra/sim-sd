@extends('pages.home')

@section('content')

<div class="row">
    <div class="container">
        <div class="col-sm-12">
            <h3>{{ $title }}</h3>
            <h4>Semester : {{ $semester }}</h4>
            @if (Auth::user()->level == 3)
            <a href="{{ route('siswa.add') }}" class="btn btn-primary btn-sm"><i class="glyphicon glyphicon-plus"></i> Add</a>
            @if ($menu == 'sampah')
                    <a href="{{ route('siswa.index') }}" class="btn btn-primary btn-sm"><i class="glyphicon glyphicon-trash"></i> Data Siswa</a>                <br/><br/>
                @else
                    <a href="{{ route('siswa.sampah') }}" class="btn btn-danger btn-sm"><i class="glyphicon glyphicon-"></i> Sampah</a>                <br/><br/>
                @endif
            <br>
            @endif
            @if(Auth::user()->level == 3)
                @include('Siswa._search')
            @elseif(Auth::user()->level == 1)
                @if($title == "Siswa")
                    @include('siswa._searchAksesGuru')
                @else
                    @if($semester == "GENAP")
                      @if($bulan == "06")
                          <a href="" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#show"><i class="glyphicon glyphicon-send"></i> Kenaikan Kelas</a><br>
                       @endif
                     @endif
                     <div class="modal fade bd-example-modal-lg" id="show">
                      <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content frm">
                          <div class="modal-header" style="background-color: #003566 ; color: silver ;">
                            <button type="button" class="close" data-dismiss="modal">×</button>
                            <div class="modal-title display-4"  id="myModalLabel" align="center" style="vertical-align: middle;"><h1>Detail</h1></div>
                          </div>
                          <div class="modal-body" style="margin:0; padding:0;">
                            <div class="embed-responsive embed-responsive-4by3">
                            <br>
                            <br>
                            <br>
                              <form method="POST" action="{{ route('siswa.naik') }}" accept-charset="UTF-8"  target="_parent">
                              <br>
                              <div class="panel panel-default" style="margin-left:3px; margin-right: 3px; border-radius: 0px;">
                               <div class="panel-body">
                                 <select class="form-control" name="kelas" required="">
                                      <option value="">Naik ke kelas</option>
                                      @foreach($kenaikan as $key)
                                      <option value="{{ $key->id_kelas }}">{{ $key['tingkat']."-".$key->nama_kelas }}</option>
                                      @endforeach
                                  </select><br><br>
                                    <table class="table table-hover table-bordered" id="table">
                                      <tr>
                                        <td rowspan="2" align="center">No.Induk Siswa</td>
                                        <td rowspan="2" align="center">Nama Siswa</td>
                                        <td colspan="2" align="center">AKSI</td>
                                      </tr>
                                      <tr>
                                          <td>NAIK</td>
                                          <td>TIDAK</td>
                                      </tr>
                                      <tbody>
                                      <?php $i = 0; ?>
                                        @foreach($data as $row)
                                        <tr>
                                            <td>{{ $row->no_induk_siswa }}</td>
                                            <td>{{ $row->nama_siswa}}</td>
                                            <td><input type="radio" name="status[{{$i}}]" value="naik" checked></td>
                                            <td><input type="radio" name="status[{{$i}}]" value="tidak"></td>
                                            <input type="hidden" name="nis[{{$i}}]" value="{{$row->no_induk_siswa}}">
                                        </tr>

                                      <?php $i++; ?>
                                        @endforeach
                                    </tbody>
                                    </table>
                                     <div class="form-group">
                                      <div class="row pull-right" style="padding-right: 30px;">
                                          <div class="col-md-12">
                                               <button class="btn btn-success">Simpan</button>
                                          </div>
                                      </div>
                                  </div>
                                        {{ csrf_field() }}
                                </div>
                                </div>
                              </form> 
                            </div>
                          </div>
                        </div>
                      </div>
                      </div>
                @endif
            @endif
            <br>
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-primary">
                        <div class="panel-body">
                            <table class="table table-hover" id="table">
                              <thead>
                                <th>No.Induk Siswa</th>
                                <th>Nama Siswa</th>
                                <th>Alamat</th>
                                <th>Jenis Kelamin</th>
                                <th>Kelas</th>
                                <th>Angkatan</th>
                                <th>&nbsp;</th>
                              </thead>
                              <tbody>
                                @foreach($data as $row)
                                <tr>
                                    <td>{{$row->no_induk_siswa}}</td>
                                    <td>{{$row->nama_siswa}}</td>
                                    <td>{{$row->alamat}}</td>
                                    <td>{{$row->jenis_kelamin}}</td>
                                    <td>{{$row->kelas->tingkat."-".$row->kelas->nama_kelas}}</td>
                                    <td>{{$row->angkatan_tahun}}</td>
                                    <td>
                                    @if(Auth::user()->level == 3)
                                        @if ($menu == 'sampah')
                                            <a href="{{ URL::route('siswa.restore', $row->id_siswa) }}" class="btn btn-xs btn-warning" data-method="delete" data-token="{{csrf_token()}}" data-confirm="Are you sure ?">
                                        <i class="glyphicon glyphicon-repeat"></i></a>
                                        @else
                                            <a href="{{ URL::route('siswa.edit', $row->id_siswa) }}" class="btn btn-xs btn-primary" title="Edit">
                                        <i class="glyphicon glyphicon-edit"></i></a>
                                        <a href="{{ URL::route('siswa.delete', $row->id_siswa) }}" class="btn btn-xs btn-danger" data-method="delete" data-token="{{csrf_token()}}" data-confirm="Are you sure ?">
                                        <i class="glyphicon glyphicon-trash"></i></a>
                                        @endif
                                    @endif
                                    @if(Auth::user()->level == 1)
                                        <?php 
                                             $walikelas =  App\Models\kelas::where('id_guru',Auth::user()->user_id)->where('id_kelas','=',$row->id_kelas)->first();
                                             $guru = App\Models\Guru::where('id_guru','=',Auth::user()->user_id)->first();
                                                if($row->kelas->tingkat == 1)
                                             {
                                                $ganjil = 1;
                                                $genap = 2;
                                             }
                                             elseif($row->kelas->tingkat == 2)
                                             {
                                                $ganjil = 3;
                                                $genap = 4;
                                             }
                                             elseif($row->kelas->tingkat == 3)
                                             {
                                                $ganjil = 5;
                                                $genap = 6;
                                             }
                                             elseif($row->kelas->tingkat == 4)
                                             {
                                                $ganjil = 7;
                                                $genap = 8;
                                             }
                                             elseif($row->kelas->tingkat == 5)
                                             {
                                                $ganjil = 9;
                                                $genap = 10;
                                             }
                                             elseif($row->kelas->tingkat == 6)
                                             {
                                                $ganjil = 11;
                                                $genap = 12;
                                             }
                                             $nilai1 = App\Models\transaksi_nilai::join('gurus','gurus.id_guru','=','transaksi_nilais.id_guru')->where('transaksi_nilais.no_induk_siswa','=',$row->no_induk_siswa)->where('transaksi_nilais.semester','=',$ganjil)->where('transaksi_nilais.status','=','aktif')->where('transaksi_nilais.id_guru','=',Auth::user()->user_id)->first();
                                             $nilai2 = App\Models\transaksi_nilai::join('gurus','gurus.id_guru','=','transaksi_nilais.id_guru')->where('transaksi_nilais.no_induk_siswa','=',$row->no_induk_siswa)->where('transaksi_nilais.semester','=',$genap)->where('transaksi_nilais.status','=','aktif')->where('transaksi_nilais.id_guru','=',Auth::user()->user_id)->first();
                                        ?>
                                         @if($walikelas)       
                                            <a href="{{ route('nilai.show', $row->id_siswa) }}" class="btn btn-xs btn-primary" title="show">
                                            <i class="glyphicon glyphicon-eye-open"></i></a>
                                         @endif

                                         @if($title == "Siswa")
                                               @if($nilai1)
                                                  @if($nilai1->id_matpel == $guru->id_matpel)
                                                     <a href="{{ route('nilai.edit',array($nilai1->id_nilai, $ganjil)) }}" class="btn btn-xs btn-success" title="edit Semester {{$ganjil}}">
                                                    <i class="glyphicon glyphicon-pencil">{{$ganjil}}</i></a>
                                                  @else
                                                    <a href="{{ route('nilai.add', array($row->id_siswa, $ganjil)) }}" class="btn btn-xs btn-primary" title="isi nilai Semester {{$ganjil}}">
                                                    <i class="glyphicon glyphicon-pencil">{{$ganjil}}</i></a>
                                                  @endif
                                              @else
                                                  <a href="{{ route('nilai.add',array($row->id_siswa, $ganjil)) }}" class="btn btn-xs btn-primary" title="isi nilai Semester {{$ganjil}}">
                                                  <i class="glyphicon glyphicon-pencil">{{$ganjil}}</i></a>
                                              @endif

                                              @if($semester == "GENAP") 
                                                @if($nilai2)
                                                    @if($nilai2->id_matpel == $guru->id_matpel)
                                                      <a href="{{ route('nilai.edit',array($nilai2->id_nilai, $genap)) }}" class="btn btn-xs btn-success" title="edit Semester {{$genap}}">
                                                      <i class="glyphicon glyphicon-pencil">{{$genap}}</i></a>
                                                    @else
                                                       <a href="{{ route('nilai.add',array($row->id_siswa, $genap)) }}" class="btn btn-xs btn-primary" title="isi nilai Semester {{$genap}}">
                                                      <i class="glyphicon glyphicon-pencil">{{$genap}}</i></a>
                                                    @endif
                                                @else
                                                    <a href="{{ route('nilai.add',array($row->id_siswa, $genap)) }}" class="btn btn-xs btn-primary" title="isi nilai Semester {{$genap}}">
                                                    <i class="glyphicon glyphicon-pencil">{{$genap}}</i></a>
                                                @endif
                                              @endif
                                          @endif

                                    @endif
                                    </td>
                                </tr>
                                @endforeach
                              </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection()


