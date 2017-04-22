@extends('pages.home')

@section('content')

<div class="row">
    <div class="container">
        <div class="col-sm-12 content-bottom">
            <h2>    
            {{ $title }} 
            @if(Auth::user()->level == 1)
            <a href="{{ route('siswa.index') }}" class="btn btn-success btn-sm pull-left" ><i class="fa fa-chevron-left"></i> back</a>
                @if(count($_GET) >= 1)
                    @if($_GET['semester'] != "" AND count($matpel) >= 1 AND count($nilai) >= 1)
                        <a href="" class="btn btn-danger btn-sm pull-right" data-toggle="modal" data-target="#show"><i class="fa fa-save"></i> Save to PDF</a>
                    <div class="modal fade in" id="show">
                      <div class="modal-dialog" role="document">
                        <div class="modal-content frm">
                          <div class="modal-header content-bottom">
                            <button type="button" class="close" data-dismiss="modal">×</button>
                            <div class="modal-title display-4" s id="myModalLabel" align="center" style="vertical-align: middle;"><h1>Detail</h1></div>
                          </div>
                          <div class="modal-body register" style="margin:0; padding:0;">
                            <div class="embed-responsive embed-responsive-4by3">
                            <br>
                            <br>
                            <br>
                              <form method="POST" action="{{ route('nilai.pdf',array($siswa->no_induk_siswa, $_GET['semester'])) }}" accept-charset="UTF-8" class="form-horizontal"  target="_parent">
                                <div class="form-body">

                                  <div class="form-group">
                                    <label class="col-md-3 control-label">Catatan</label>
                                      <div class="col-md-9">
                                          <textarea name="catatan" class="form-control"></textarea>
                                      </div>
                                  </div>

                                  @if($_GET['semester'] == 2 || $_GET['semester'] == 4 || $_GET['semester'] == 6 || $_GET['semester'] == 8 || $_GET['semester'] == 10 || $_GET['semester'] == 12)
                                  <div class="form-group">
                                    <label class="col-md-3 control-label">Status</label>
                                      <div class="col-md-9">
                                          <select name="status" class="form-control">
                                            <option value="">Pilih</option>
                                            <option value="naik">Naik Kelas</option>
                                            <option value="tidak">Tidak Naik Kelas</option>
                                          </select>
                                      </div>
                                  </div>
                                  @else
                                      <input type="hidden" name="status" value="0">
                                   @endif
                                  <br>
                                   <div class="form-group">
                                      <div class="row pull-right" style="padding-right: 30px;">
                                          <div class="col-md-12">
                                               <button class="btn btn-success">Simpan</button>
                                          </div>
                                      </div>
                                  </div>
                                        {{ csrf_field() }}

                                </div>

                              </form> 
                                
                            </div>
                          </div>
                        </div>
                      </div>
                    @endif
                @endif
            @endif
            </h2>
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-primary">
                        <div class="panel-body">
                            <div class="form-body">
                                <div class="col-md-12">
                                    <table align="center">
                                        <tr>
                                            <td>Nama&nbsp;</td>
                                            <td>:&nbsp;</td>
                                            <td>{{ strtoupper($siswa->nama_siswa) }}</td>
                                        </tr>
                                        <tr>
                                            <td>Tempat dan tanggal Lahir&nbsp;</td>
                                            <td>:&nbsp;</td>
                                            <td>{{ ucfirst($siswa->tempat_lahir) }},&nbsp; {{ date("d F Y",strtotime($siswa->tanggal_lahir)) }}</td>
                                        </tr>
                                        <tr>
                                            <td>Nomor Induk&nbsp;</td>
                                            <td>:&nbsp;</td>
                                            <td>{{ $siswa->no_induk_siswa }}</td>
                                        </tr>
                                        <tr>
                                            <td>Semester&nbsp;</td>
                                            <td>:&nbsp;</td>
                                            <td>
                                            <?php 
                                            if($siswa->tingkat == 1)
                                             {
                                                $semesters = array("1" , "2" );
                                             }
                                             elseif($siswa->tingkat == 2)
                                             {
                                                $semesters = array("1" , "2" , "3" , "4");
                                             }
                                             elseif($siswa->tingkat == 3)
                                             {
                                                $semesters = array("1" , "2" , "3" , "4", "5", "6");
                                             }
                                             elseif($siswa->tingkat == 4)
                                             {
                                                $semesters = array("1" , "2" , "3" , "4", "5", "6", "7", "8");
                                             }
                                             elseif($siswa->tingkat == 5)
                                             {
                                                $semesters = array("1" , "2" , "3" , "4", "5", "6", "7", "8", "9", "10");
                                             }
                                             elseif($siswa->tingkat == 6)
                                             {
                                                $semesters = array("1" , "2" , "3" , "4", "5", "6", "7", "8", "9", "10", "11", "12");
                                             }
                                            ?>
                                            <form method="GET" action="{{route('nilai.show', $siswa->id_siswa)}}" accept-charset="UTF-8" class="form-inline">
                                            <select name="semester" class="form-control">
                                               <option value="">Semester</option>
                                               <?php 
                                                for ($i=0; $i < count($semesters); $i++) { ?>
                                                   <option value="{{ $semesters[$i] }}">{{ $semesters[$i] }}</option>
                                                <?php } ?>
                                            </select>
                                            <button class="btn btn-primary" type="submit">Cari</i></button>
                                            </form>
                                       </td>
                                        </tr>
                                        @if(count($_GET) >= 1)
                                          @if(count($nilai) >= 1 )
                                            <tr>
                                                <td>Kelas&nbsp;</td>
                                                <td>:&nbsp;</td>
                                                <td>{{ $nilai[0]->kelas }}</td>
                                            </tr>
                                          @else
                                            <tr>
                                                <td>Keterangan&nbsp;</td>
                                                <td>:&nbsp;</td>
                                                <td style="color:red;">Belum ada satupun nilai yang masuk</td>
                                            </tr>
                                          @endif
                                        @endif
                                    </table>
                                    <br>
                                </div>
                                <div class="col-md-6">
                                    
                                </div>
                            @if(count($_GET) >= 1)
                                @if($_GET['semester'])
                                <table class="table table-bordered" id="table" style="margin-left:3px; margin-right: 3px;">
                                      <tr>
                                          <td  align="center" rowspan="2" ><b>Mata Pelajaran</b></td>
                                          <td align="center" rowspan="2"><b>KKM</b></td>
                                          <td colspan="4" align="center"><b>Nilai</b></td>
                                          <td  align="center" rowspan="2"><b>Rata - rata<b></td>
                                      </tr>
                                      <tr>
                                          <td align="center"><b>Tugas</b></td>
                                          <td align="center"><b>Absensi</b></td>
                                          <td align="center"><b>UTS</b></td>
                                          <td align="center"><b>UAS</b></td>
                                      </tr>
                                    @if(count($matpel) >= 1)
                                      @foreach($matpel as $row)
                                      <tr>
                                            <td>{{ $row->nama_matpel }}</td>
                                            <td align="center">{{ $row->kkm }}</td>
                                          <?php
                                              if ($_GET['semester']){
                                                  $cek = App\Models\transaksi_nilai::join('gurus','gurus.id_guru','=','transaksi_nilais.id_guru')->where('transaksi_nilais.no_induk_siswa','=',$siswa->no_induk_siswa)->where('transaksi_nilais.semester','=',$_GET['semester'])->where('gurus.id_matpel','=',$row->id_matpel)->where('transaksi_nilais.status','=',$status)->first();
                                              }
                                          ?>
                                          @if($cek)
                                                <td align="center" <?php echo $cek->nilai_tugas < $row->kkm ? 'style="color:red;"' : '' ?>>{{ $cek->nilai_tugas }}</td>
                                                <td align="center" <?php echo $cek->nilai_absensi < $row->kkm ? 'style="color:red;"' : '' ?>>{{ $cek->nilai_absensi }}</td>
                                                <td align="center" <?php echo $cek->nilai_uts < $row->kkm ? 'style="color:red;"' : '' ?>>{{ $cek->nilai_uts }}</td>
                                                <td align="center" <?php echo $cek->nilai_uas < $row->kkm ? 'style="color:red;"' : '' ?>>{{ $cek->nilai_uas }}</td>
                                                <td align="center" >{{ $cek->nilai_rata_rata }}</td>
                                          @else
                                              <td>&nbsp;</td>
                                              <td>&nbsp;</td>
                                              <td>&nbsp;</td>
                                              <td>&nbsp;</td>
                                              <td>&nbsp;</td>
                                          @endif
                                      </tr>
                                      @endforeach
                                    @else
                                        <tr>
                                            <td align="center" style="color:red;"><i>tidak satupun <br>matapelajaran di tingkat : {{$tingkat}}</i></td>
                                            <td>&nbsp;</td>
                                            <td>&nbsp;</td>
                                            <td>&nbsp;</td>
                                            <td>&nbsp;</td>
                                            <td>&nbsp;</td>
                                            <td>&nbsp;</td>
                                        </tr>
                                    @endif
                                    <tr>
                                        <td  colspan="2" align="center"><b>Jumlah</b></td>
                                        <?php 
                                        $tugas = 0;
                                        $absen = 0;
                                        $uts = 0;
                                        $uas = 0;
                                        if(count($matpel) >= 1){ 
                                          foreach ($nilai as $key) {
                                              $tugas += $key['nilai_tugas'];
                                              $absen += $key['nilai_absensi'];
                                              $uts += $key['nilai_uts'];
                                              $uas += $key['nilai_uas']; 
                                          }
                                        }
                                        ?>
                                        <td align="center">{{ $tugas }}</td>
                                        <td align="center">{{ $absen }}</td>
                                        <td align="center">{{ $uts }}</td>
                                        <td align="center">{{ $uas }}</td>
                                        <td align="center">-</td>
                                    </tr>
                                    <tr>
                                        <td colspan="2" align="center"><b>Rata Rata</b></td>
                                        <?php
                                          if (count($matpel) >= 1){

                                            $jumlah = count($matpel);
                                            $rtugas= $tugas/$jumlah;
                                            $rabsen= $absen/$jumlah;
                                            $ruts= $uts/$jumlah;
                                            $ruas= $uas/$jumlah;
                                          }
                                          else{

                                            $rtugas= 0;
                                            $rabsen= 0;
                                            $ruts= 0;
                                            $ruas= 0;
                                          }
                                        ?>
                                            <td align="center">{{substr($rtugas, 0, 5)}}</td>
                                            <td align="center">{{ substr($rabsen,0, 5) }}</td>
                                            <td align="center">{{ substr($ruts,0, 5) }}</td>
                                            <td align="center">{{ substr($ruas,0, 5) }}</td>
                                            <td align="center">-</td>
                                    </tr>
                                </table>
                                @endif
                            @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection()