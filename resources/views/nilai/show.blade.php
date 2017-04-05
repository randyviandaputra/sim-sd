@extends('pages.home')

@section('content')

<div class="row">
    <div class="container">
        <div class="col-sm-12 content-bottom">
            <h2>    
            {{ $title }} 
            @if(Auth::user()->level == 1)
            <a href="{{ route('siswa.index') }}" class="btn btn-success btn-sm pull-left" ><i class="glyphicon glyphicon-chevron-left"></i> back</a>
                @if(count($_GET) >= 1)
                    @if($_GET['semester'] != "")
                        <a href="{{ route('nilai.pdf',array($siswa->no_induk_siswa, $_GET['semester'])) }}" class="btn btn-danger btn-sm pull-right" target="_blank"><i class="glyphicon glyphicon-save-file"></i> Seve to PDF</a>
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
                                            <td>Kelas&nbsp;</td>
                                            <td>:&nbsp;</td>
                                            <td>{{ $siswa->tingkat."-".ucfirst($siswa->nama_kelas) }}</td>
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
                                                $ganjil = 1;
                                                $genap = 2;
                                             }
                                             elseif($siswa->tingkat == 2)
                                             {
                                                $ganjil = 3;
                                                $genap = 4;
                                             }
                                             elseif($siswa->tingkat == 3)
                                             {
                                                $ganjil = 5;
                                                $genap = 6;
                                             }
                                             elseif($siswa->tingkat == 4)
                                             {
                                                $ganjil = 7;
                                                $genap = 8;
                                             }
                                             elseif($siswa->tingkat == 5)
                                             {
                                                $ganjil = 9;
                                                $genap = 10;
                                             }
                                             elseif($siswa->tingkat == 6)
                                             {
                                                $ganjil = 11;
                                                $genap = 12;
                                             }
                                            ?>
                                            <form method="GET" action="{{route('nilai.show', $siswa->id_siswa)}}" accept-charset="UTF-8" class="form-inline">
                                            <select name="semester" class="form-control">
                                               <option value="">Semester</option>
                                               <option value="{{$ganjil}}">{{$ganjil}}</option>
                                               <option value="{{$genap}}">{{$genap}}</option>
                                            </select>
                                            <button class="btn btn-primary" type="submit">Cari</i></button>
                                            </form>
                                       </td>
                                        </tr>
                                    </table>
                                    <br>
                                </div>
                                <div class="col-md-6">
                                    
                                </div>
                            @if(count($_GET) >= 1)
                                @if($_GET['semester'])
                                <table class="table table-bordered" id="table">
                                    <tr>
                                        <th rowspan="2">Mata Pelajaran</th>
                                        <th rowspan="2">KKM</th>
                                        <td colspan="4" align="center"><b>Nilai</b></td>
                                        <th rowspan="2">Rata - rata</th>
                                    </tr>
                                    <tr>
                                        <td align="center">Tugas</td>
                                        <td align="center">Absensi</td>
                                        <td align="center">UTS</td>
                                        <td align="center">UAS</td>
                                    </tr>
                                    @foreach($matpel as $row)
                                    <tr>
                                        <td><b>{{ $row->nama_matpel }}</b></td>
                                        <td>{{ $row->kkm }}</td>
                                        @if(count($nilai) >= 1)
                                            @foreach($nilai as $riw)
                                                @if($row->id_matpel == $riw->id_matpel)
                                                    <td>{{ $riw->nilai_tugas }}</td>
                                                    <td>{{ $riw->nilai_absensi }}</td>
                                                    <td>{{ $riw->nilai_uts }}</td>
                                                    <td>{{ $riw->nilai_uas }}</td>
                                                    <td>{{ $riw->nilai_rata_rata }}</td>
                                                @else
                                                    <td>&nbsp;</td>
                                                    <td>&nbsp;</td>
                                                    <td>&nbsp;</td>
                                                    <td>&nbsp;</td>
                                                    <td>&nbsp;</td>
                                                @endif
                                            @endforeach
                                        @else
                                            <td>&nbsp;</td>
                                            <td>&nbsp;</td>
                                            <td>&nbsp;</td>
                                            <td>&nbsp;</td>
                                            <td>&nbsp;</td>
                                        @endif
                                    </tr>
                                    @endforeach
                                    <tr>
                                        <td  colspan="2" align="center"><b>Jumlah</b></td>
                                        <?php 
                                        $tugas = 0;
                                        $absen = 0;
                                        $uts = 0;
                                        $uas = 0;
                                        foreach ($nilai as $key) {
                                            $tugas += $key['nilai_tugas'];
                                            $absen += $key['nilai_absensi'];
                                            $uts += $key['nilai_uts'];
                                            $uas += $key['nilai_uas']; 
                                        }
                                        ?>
                                        <td>{{ $tugas }}.00</td>
                                        <td>{{ $absen }}.00</td>
                                        <td>{{ $uts }}.00</td>
                                        <td>{{ $uas }}.00</td>
                                        <td>-</td>
                                    </tr>
                                    <tr>
                                        <td colspan="2" align="center"><b>Rata Rata</b></td>
                                        <?php

                                            $jumlah = count($matpel);
                                            $rtugas= $tugas/$jumlah;
                                            $rabsen= $absen/$jumlah;
                                            $ruts= $uts/$jumlah;
                                            $ruas= $uas/$jumlah;
                                        ?>
                                        <td>{{ $rtugas }}</td>
                                        <td>{{ $rabsen }}</td>
                                        <td>{{ $ruts }}</td>
                                        <td>{{ $ruas }}</td>
                                        <td>-</td>
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