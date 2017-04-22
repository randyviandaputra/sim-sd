@extends('pages.home')

@section('content')

<div class="row">
    <div class="container">
        <div class="col-sm-12 register">
            <h3>{{ $title }}</h3>
            @if (Auth::user()->level == 3)
            <a href="{{ route('jadwal.add', $id) }}" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i> Add</a>
            <br/><br/>
            @endif
            <br>
            <div class="row">
                <div class="col-md-12 register">
                    <div class="panel panel-primary">
                        <div class="panel-body">
                            <table class="table table-hover table-bordered" id="table">
                             <thead>
                                 <td align="center"><b>Hari</b></td>
                                 <td align="center"><b>Mata Pelajaran</b></td>
                             </thead>
                             <tr>
                                 <td>Senin</td>
                                 <td>
                                     @foreach($data as $key)
                                        @if($key->hari == 1)
                                        {{$key->nama_matpel}}
                                            @if(Auth::user()->level == 3)
                                                <a href="{{ route('jadwal.delete',$key->id_jadwal) }}" class="btn btn-danger btn-xs"><i class="fa fa-remove"></i></a>
                                            @endif
                                            ,&nbsp;
                                        &nbsp;
                                        @endif
                                     @endforeach
                                 </td>
                             </tr>
                             <tr>
                                 <td>Selasa</td>
                                 <td>
                                     @foreach($data as $key)
                                        @if($key->hari == 2)
                                        {{$key->nama_matpel}}
                                            @if(Auth::user()->level == 3)
                                                <a href="{{ route('jadwal.delete',$key->id_jadwal) }}" class="btn btn-danger btn-xs"><i class="fa fa-remove"></i></a>
                                            @endif
                                            ,&nbsp;
                                        @endif
                                     @endforeach
                                 </td>
                             </tr>
                             <tr>
                                 <td>Rabu</td>
                                 <td>
                                     @foreach($data as $key)
                                        @if($key->hari == 3)
                                        {{$key->nama_matpel}}
                                            @if(Auth::user()->level == 3)
                                                <a href="{{ route('jadwal.delete',$key->id_jadwal) }}" class="btn btn-danger btn-xs"><i class="fa fa-remove"></i></a>
                                            @endif
                                            ,&nbsp;
                                        @endif
                                     @endforeach
                                 </td>
                             </tr>
                             <tr>
                                 <td>Kamis</td>
                                 <td>
                                     @foreach($data as $key)
                                        @if($key->hari == 4)
                                        {{$key->nama_matpel}}
                                            @if(Auth::user()->level == 3)
                                                <a href="{{ route('jadwal.delete',$key->id_jadwal) }}" class="btn btn-danger btn-xs"><i class="fa fa-remove"></i></a>
                                            @endif
                                            ,&nbsp;
                                        @endif
                                     @endforeach
                                 </td>
                             </tr>
                             <tr>
                                 <td>Jumat</td>
                                 <td>
                                     @foreach($data as $key)
                                        @if($key->hari == 5)
                                        {{$key->nama_matpel}}
                                            @if(Auth::user()->level == 3)
                                                <a href="{{ route('jadwal.delete',$key->id_jadwal) }}" class="btn btn-danger btn-xs"><i class="fa fa-remove"></i></a>
                                            @endif
                                            ,&nbsp;
                                        @endif
                                     @endforeach
                                 </td>
                             </tr>
                             <tr>
                                 <td>Sabtu</td>
                                 <td>
                                     @foreach($data as $key)
                                        @if($key->hari == 6)
                                        {{$key->nama_matpel}}
                                            @if(Auth::user()->level == 3)
                                                <a href="{{ route('jadwal.delete',$key->id_jadwal) }}" class="btn btn-danger btn-xs"><i class="fa fa-remove"></i></a>
                                            @endif
                                            ,&nbsp;
                                        @endif
                                     @endforeach
                                 </td>
                             </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection()


