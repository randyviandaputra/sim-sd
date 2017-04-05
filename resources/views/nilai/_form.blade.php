
<div class="form-body">
    Nama : {{ $query->nama_siswa }}&nbsp;&nbsp; Kelas : {{ $query->tingkat."".$query->nama_kelas }}
    <br>
    <div class="col-md-3">
    {!! Form::hidden('no_induk_siswa', $query->no_induk_siswa) !!}
    {!! Form::hidden('id_guru', Auth::user()->user_id) !!}
    {!! Form::hidden('semester', $semester) !!}
    </div>
    <legend>Input Nilai {{ $matpel->nama_matpel }}</legend>
    <div class="form-group">
        {!! Form::label('', 'Nilai Tugas', array('class' => 'col-md-3 control-label')) !!}
        <div class="col-md-3">
            {!! Form::text('nilai_tugas', null, array('class' => 'form-control')) !!}
            @if($errors->has('nilai_tugas'))
            <span class="help-block" style="color:red;">{{ $errors->first('nilai_tugas') }}</span>
            @endif
        </div>
    </div>
    <div class="form-group">
        {!! Form::label('', 'Nilai Absensi', array('class' => 'col-md-3 control-label')) !!}
        <div class="col-md-3">
            {!! Form::text('nilai_absensi', null, array('class' => 'form-control')) !!}
            @if($errors->has('nilai_absensi'))
            <span class="help-block" style="color:red;">{{ $errors->first('nilai_absensi') }}</span>
            @endif
        </div>
    </div>
    <div class="form-group">
        {!! Form::label('', 'Nilai UTS', array('class' => 'col-md-3 control-label')) !!}
        <div class="col-md-3">
            {!! Form::text('nilai_uts', null, array('class' => 'form-control')) !!}
            @if($errors->has('nilai_uts'))
            <span class="help-block" style="color:red;">{{ $errors->first('nilai_uts') }}</span>
            @endif
        </div>
    </div>
    <div class="form-group">
        {!! Form::label('', 'Nilai UAS', array('class' => 'col-md-3 control-label')) !!}
        <div class="col-md-3">
            {!! Form::text('nilai_uas', null, array('class' => 'form-control')) !!}
            @if($errors->has('nilai_uas'))
            <span class="help-block" style="color:red;">{{ $errors->first('nilai_uas') }}</span>
            @endif
        </div>
    </div>
    <div class="form-group">
        {!! Form::label('', 'semester', array('class' => 'col-md-3 control-label')) !!}
        <div class="col-md-3">
            <p class="form-control-static">
            {{ $semester }}
            </p>
        </div>
    </div>
    <div class="form-group">
        {!! Form::label('', 'Nama Guru', array('class' => 'col-md-3 control-label')) !!}
        <div class="col-md-3">
            <p class="form-control-static">
            {{ $guru->nama_guru }}
            </p>
        </div>
    </div>

    <div class="form-group">
        <div class="row">
            <div class="col-md-offset-3 col-md-9">
                {!! Form::submit('Simpan', array('class' => 'btn btn-success')) !!}
                <a href="{{ URL::route('siswa.index') }}" class="btn btn-primary">Kembali</a>
            </div>
        </div>
    </div>
</div>    

