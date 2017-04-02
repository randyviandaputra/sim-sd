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
                                    <td>{{$row->kelas->nama_kelas}}</td>
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
                                             $nilai = App\Models\transaksi_nilai::join('gurus','gurus.id_guru','=','transaksi_nilais.id_guru')->where('transaksi_nilais.no_induk_siswa','=',$row->no_induk_siswa)->first();
                                             $guru = App\Models\Guru::where('id_guru','=',Auth::user()->user_id)->first();
                                        ?>
                                         @if($walikelas)       
                                            <a href="{{ route('nilai.show', $row->id_siswa) }}" class="btn btn-xs btn-primary" title="show">
                                            <i class="glyphicon glyphicon-eye-open"></i></a>
                                         @endif
                                         @if($nilai)
                                            @if($nilai->id_matpel == $guru->id_matpel)
                                             <a href="{{ route('nilai.edit',$nilai->id_nilai) }}" class="btn btn-xs btn-success" title="edit">
                                            <i class="glyphicon glyphicon-pencil"></i></a>
                                            @else
                                             <a href="{{ route('nilai.add',$row->id_siswa) }}" class="btn btn-xs btn-primary" title="isi">
                                            <i class="glyphicon glyphicon-pencil"></i></a>
                                            @endif
                                        @else
                                            <a href="{{ route('nilai.add',$row->id_siswa) }}" class="btn btn-xs btn-primary" title="isi">
                                            <i class="glyphicon glyphicon-pencil"></i></a>
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


