
<div class="form-body">
    Nama : {{ $query->nama_siswa }}&nbsp;&nbsp; Kelas : {{ $query->tingkat."-".$query->nama_kelas }}
    <br>
    <div class="col-md-3">
    {!! Form::hidden('no_induk_siswa', $query->no_induk_siswa) !!}
    {!! Form::hidden('kelas',  $query->tingkat."-".$query->nama_kelas) !!}
    {!! Form::hidden('id_guru', Auth::user()->user_id) !!}
    {!! Form::hidden('semester', $semester) !!}
    </div>
    <legend>Input Nilai {{ $matpel->nama_matpel }}</legend>
        @if($errors->has('nilai_tugas'))
            <div class="form-group has-error has-feedback">
             {!! Form::label('', 'Nilai Tugas', array('class' => 'col-md-3 control-label', 'for' => 'inputError2')) !!}
        @else
            <div class="form-group">
            {!! Form::label('', 'Nilai Tugas', array('class' => 'col-md-3 control-label')) !!}
        @endif
        <div class="col-md-3">
            @if($errors->has('nilai_tugas'))
            {!! Form::text('nilai_tugas', null, array('class' => 'form-control','data-container' => 'body', 'data-toggle' => 'popover', 'data-placement' => 'right', 'data-content' => $errors->first('nilai_tugas'), 'data-trigger' => 'focus', 'id' => 'inputError2','aria-describedby' => 'inputError2Status')) !!}
             <span class="glyphicon glyphicon-remove form-control-feedback" aria-hidden="true"></span>
             <span id="inputError2Status" class="sr-only">(error)</span>
            @else
                 {!! Form::text('nilai_tugas', null, array('class' => 'form-control')) !!}
            @endif
        </div>
    </div>

    @if($errors->has('nilai_absensi'))
            <div class="form-group has-error has-feedback">
             {!! Form::label('', 'Nilai Absensi', array('class' => 'col-md-3 control-label', 'for' => 'inputError2')) !!}
        @else
            <div class="form-group">
            {!! Form::label('', 'Nilai Absensi', array('class' => 'col-md-3 control-label')) !!}
        @endif
        <div class="col-md-3">
            @if($errors->has('nilai_absensi'))
            {!! Form::text('nilai_absensi', null, array('class' => 'form-control','data-container' => 'body', 'data-toggle' => 'popover', 'data-placement' => 'right', 'data-content' => $errors->first('nilai_absensi'), 'data-trigger' => 'focus', 'id' => 'inputError2','aria-describedby' => 'inputError2Status')) !!}
             <span class="glyphicon glyphicon-remove form-control-feedback" aria-hidden="true"></span>
             <span id="inputError2Status" class="sr-only">(error)</span>
            @else
                 {!! Form::text('nilai_absensi', null, array('class' => 'form-control')) !!}
            @endif
        </div>
    </div>

    @if($errors->has('nilai_uts'))
            <div class="form-group has-error has-feedback">
             {!! Form::label('', 'Nilai UTS', array('class' => 'col-md-3 control-label', 'for' => 'inputError2')) !!}
        @else
            <div class="form-group">
            {!! Form::label('', 'Nilai UTS', array('class' => 'col-md-3 control-label')) !!}
        @endif
        <div class="col-md-3">
            @if($errors->has('nilai_uts'))
            {!! Form::text('nilai_uts', null, array('class' => 'form-control','data-container' => 'body', 'data-toggle' => 'popover', 'data-placement' => 'right', 'data-content' => $errors->first('nilai_uts'), 'data-trigger' => 'focus', 'id' => 'inputError2','aria-describedby' => 'inputError2Status')) !!}
             <span class="glyphicon glyphicon-remove form-control-feedback" aria-hidden="true"></span>
             <span id="inputError2Status" class="sr-only">(error)</span>
            @else
                 {!! Form::text('nilai_uts', null, array('class' => 'form-control')) !!}
            @endif
        </div>
    </div>

    @if($errors->has('nilai_uas'))
            <div class="form-group has-error has-feedback">
             {!! Form::label('', 'Nilai UAS', array('class' => 'col-md-3 control-label', 'for' => 'inputError2')) !!}
        @else
            <div class="form-group">
            {!! Form::label('', 'Nilai UAS', array('class' => 'col-md-3 control-label')) !!}
        @endif
        <div class="col-md-3">
            @if($errors->has('nilai_uas'))
            {!! Form::text('nilai_uas', null, array('class' => 'form-control','data-container' => 'body', 'data-toggle' => 'popover', 'data-placement' => 'right', 'data-content' => $errors->first('nilai_uas'), 'data-trigger' => 'focus', 'id' => 'inputError2','aria-describedby' => 'inputError2Status')) !!}
             <span class="glyphicon glyphicon-remove form-control-feedback" aria-hidden="true"></span>
             <span id="inputError2Status" class="sr-only">(error)</span>
            @else
                 {!! Form::text('nilai_uas', null, array('class' => 'form-control')) !!}
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

