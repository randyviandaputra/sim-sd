
<div class="form-body">
    <div class="form-group">
        {!! Form::label('tingkat', 'Tingkat', array('class' => 'col-md-3 control-label')) !!}
        <div class="col-md-3">
            {!! Form::select('tingkat', $tingkat, null, array('class' => 'form-control')) !!}
            @if($errors->has('tingkat'))
            <span class="help-block" style="color:red;">{{ $errors->first('tingkat') }}</span>
            @endif
        </div>
    </div>

        @if($errors->has('nama_kelas'))
            <div class="form-group has-error has-feedback">
             {!! Form::label('', 'Nama Kelas', array('class' => 'col-md-3 control-label', 'for' => 'inputError2')) !!}
        @else
            <div class="form-group">
            {!! Form::label('', 'Nama Kelas', array('class' => 'col-md-3 control-label')) !!}
        @endif
        <div class="col-md-3">
            @if($errors->has('nama_kelas'))
            {!! Form::text('nama_kelas', null, array('class' => 'form-control','data-container' => 'body', 'data-toggle' => 'popover', 'data-placement' => 'right', 'data-content' => $errors->first('nama_kelas'), 'data-trigger' => 'focus', 'id' => 'inputError2','aria-describedby' => 'inputError2Status')) !!}
             <span class="glyphicon glyphicon-remove form-control-feedback" aria-hidden="true"></span>
             <span id="inputError2Status" class="sr-only">(error)</span>
            @else
                 {!! Form::text('nama_kelas', null, array('class' => 'form-control')) !!}
            @endif
        </div>
    </div>

    <div class="form-group">
        {!! Form::label('Wali Kelas', 'Wali Kelas', array('class' => 'col-md-3 control-label')) !!}
        <div class="col-md-3">
            {!! Form::select('id_guru', $guru, null, array('class' => 'form-control')) !!}
            @if($errors->has('id_guru'))
            <span class="help-block" style="color:red;">{{ $errors->first('id_guru') }}</span>
            @endif
        </div>
    </div>

    <div class="form-group">
        {!! Form::label('status', 'Status', array('class' => 'col-md-3 control-label')) !!}
        <div class="col-md-3">
            {!! Form::select('aktif', $status, null, array('class' => 'form-control')) !!}
            @if($errors->has('aktif'))
            <span class="help-block" style="color:red;">{{ $errors->first('aktif') }}</span>
            @endif
        </div>
    </div>


</div>    

