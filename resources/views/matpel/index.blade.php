@extends('pages.home')

@section('content')

<div class="row">
    <div class="container">
        <div class="col-sm-12 register">
            <h3>{{ $title }}</h3>
            @if (Auth::user()->level == 3)
            <a href="{{ route('matpel.add') }}" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i> Add</a>
            @if ($menu == 'sampah')
                    <a href="{{ route('matpel.index') }}" class="btn btn-primary btn-sm"><i class="fa fa-list"></i> Data Matpel</a>                <br/><br/>
                @else
                    <a href="{{ route('matpel.sampah') }}" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i> Sampah</a>                <br/><br/>
                @endif
            @endif

            <div class="row">
                <div class="col-md-12 register">
                    <div class="panel panel-primary">
                        <div class="panel-body">
                            <table class="table table-hover table-bordered">
                                <thead>
                                    <th>No.</th>
                                    <th>Kode Mata Pelajaran</th>
                                    <th>Nama Mata Pelajaran</th>
                                    <th>KKM</th>
                                    <th>Untuk Tingkat</th>
                                    <th>&nbsp;</th>
                                </thead>
                                <tbody>
                                <?php $i = 1; ?>
                                    @foreach($data as $row)
                                        <tr>
                                            <td>{{$i++}}</td>
                                            <td>{{$row->kode_matpel}}</td>
                                            <td>{{$row->nama_matpel}}</td>
                                            <td>{{$row->kkm}}</td>
                                            <td>
                                            @foreach($tingkat as $key)
                                                @if($row->id_matpel == $key->id_matpel)
                                                    {{$key->tingkat." "}}
                                                @endif
                                            @endforeach
                                            </td>
                                            <td style="text-align:center;width:15%;">
                                                @if ($menu == 'sampah')
                                                    <a href="{{ URL::route('matpel.restore', $row->id_matpel) }}" class="btn btn-xs btn-warning">
                                                <i class="fa fa-repeat"></i> Restore</a>
                                                @else
                                                    <a href="{{ URL::route('matpel.edit', $row->id_matpel) }}" class="btn btn-xs btn-primary">
                                                <i class="fa fa-edit"></i> Edit</a>
                                                <a href="{{ URL::route('matpel.delete', $row->id_matpel) }}" class="btn btn-xs btn-danger">
                                                <i class="fa fa-trash"></i> Hapus</a>
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


