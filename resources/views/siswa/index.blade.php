@extends('pages.home')

@section('content')

<div class="row">
    <div class="container">
        <div class="col-sm-12">
            <h3>{{ $title }}</h3>
            @if (Auth::user()->level == 3)
            <a href="{{ route('siswa.add') }}" class="btn btn-primary btn-sm"><i class="glyphicon glyphicon-plus"></i> Add</a>
            @if ($menu == 'sampah')
                    <a href="{{ route('siswa.index') }}" class="btn btn-primary btn-sm"><i class="glyphicon glyphicon-trash"></i> Data Siswa</a>                <br/><br/>
                @else
                    <a href="{{ route('siswa.sampah') }}" class="btn btn-danger btn-sm"><i class="glyphicon glyphicon-trash"></i> Sampah</a>                <br/><br/>
                @endif
            <br>
            @endif
            @include('Siswa._search')
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
                                             $nilai1 = App\Models\transaksi_nilai::join('gurus','gurus.id_guru','=','transaksi_nilais.id_guru')->where('transaksi_nilais.no_induk_siswa','=',$row->no_induk_siswa)->where('transaksi_nilais.semester','=',$ganjil)->where('transaksi_nilais.id_guru','=',Auth::user()->user_id)->first();
                                             $nilai2 = App\Models\transaksi_nilai::join('gurus','gurus.id_guru','=','transaksi_nilais.id_guru')->where('transaksi_nilais.no_induk_siswa','=',$row->no_induk_siswa)->where('transaksi_nilais.semester','=',$genap)->where('transaksi_nilais.id_guru','=',Auth::user()->user_id)->first();
                                        ?>
                                         @if($walikelas)       
                                            <a href="{{ route('nilai.show', $row->id_siswa) }}" class="btn btn-xs btn-primary" title="show">
                                            <i class="glyphicon glyphicon-eye-open"></i></a>
                                         @endif
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


