
<div class="form-body">
        
    <div class="form-group">
        {!! Form::label('id_kelas', 'Kelas', array('class' => 'col-md-3 control-label')) !!}
        <div class="col-md-3">
            {!! Form::select('id_kelas', $kelas, null, array('class' => 'form-control')) !!}
            @if($errors->has('id_kelas'))
            <span class="help-block" style="color:red;">{{ $errors->first('id_kelas') }}</span>
            @endif
        </div>
    </div>

        @if($errors->has('nama_siswa'))
            <div class="form-group has-error has-feedback">
             {!! Form::label('', 'Nama Siswa', array('class' => 'col-md-3 control-label', 'for' => 'inputError2')) !!}
        @else
            <div class="form-group">
            {!! Form::label('', 'Nama Siswa', array('class' => 'col-md-3 control-label')) !!}
        @endif
        <div class="col-md-3">
            @if($errors->has('nama_siswa'))
            {!! Form::text('nama_siswa', null, array('class' => 'form-control','data-container' => 'body', 'data-toggle' => 'popover', 'data-placement' => 'right', 'data-content' => $errors->first('nama_siswa'), 'data-trigger' => 'focus', 'id' => 'inputError2','aria-describedby' => 'inputError2Status')) !!}
             <span class="glyphicon glyphicon-remove form-control-feedback" aria-hidden="true"></span>
             <span id="inputError2Status" class="sr-only">(error)</span>
            @else
                 {!! Form::text('nama_siswa', null, array('class' => 'form-control')) !!}
            @endif
        </div>
    </div>

        @if($errors->has('tempat_lahir'))
            <div class="form-group has-error has-feedback">
             {!! Form::label('', 'Tempat Lahir', array('class' => 'col-md-3 control-label', 'for' => 'inputError2')) !!}
        @else
            <div class="form-group">
            {!! Form::label('', 'Tempat Lahir', array('class' => 'col-md-3 control-label')) !!}
        @endif
        <div class="col-md-3">
            @if($errors->has('tempat_lahir'))
            {!! Form::text('tempat_lahir', null, array('class' => 'form-control','data-container' => 'body', 'data-toggle' => 'popover', 'data-placement' => 'right', 'data-content' => $errors->first('tempat_lahir'), 'data-trigger' => 'focus', 'id' => 'inputError2','aria-describedby' => 'inputError2Status')) !!}
             <span class="glyphicon glyphicon-remove form-control-feedback" aria-hidden="true"></span>
             <span id="inputError2Status" class="sr-only">(error)</span>
            @else
                 {!! Form::text('tempat_lahir', null, array('class' => 'form-control')) !!}
            @endif
        </div>
    </div>

    @if($errors->has('tanggal_lahir'))
            <div class="form-group has-error has-feedback">
             {!! Form::label('', 'Tanggal Lahir', array('class' => 'col-md-3 control-label', 'for' => 'inputError2')) !!}
        @else
            <div class="form-group">
            {!! Form::label('', 'Tanggal Lahir', array('class' => 'col-md-3 control-label')) !!}
        @endif
        <div class="col-md-3">
            @if($errors->has('tanggal_lahir'))
            {!! Form::text('tanggal_lahir', null, array('id' => 'datepicker','class' => 'form-control','data-container' => 'body', 'data-toggle' => 'popover', 'data-placement' => 'right', 'data-content' => $errors->first('tanggal_lahir'), 'data-trigger' => 'focus', 'id' => 'inputError2','aria-describedby' => 'inputError2Status')) !!}
             <span class="glyphicon glyphicon-remove form-control-feedback" aria-hidden="true"></span>
             <span id="inputError2Status" class="sr-only">(error)</span>
            @else
                 {!! Form::text('tanggal_lahir', null , array('id' => 'datepicker', 'class' => 'form-control')) !!}
            @endif
        </div>
    </div>

    <div class="form-group">
        {!! Form::label('jenis_kelamin', 'Jenis Kelamin', array('class' => 'col-md-3 control-label')) !!}
        <div class="col-md-3">
            {!! Form::select('jenis_kelamin', $jenis_kelamin, null, array('class' => 'form-control')) !!}
            @if($errors->has('jenis_kelamin'))
            <span class="help-block" style="color:red;">{{ $errors->first('jenis_kelamin') }}</span>
            @endif
        </div>
    </div>

    <div class="form-group">
        {!! Form::label('golongan_darah', 'golongan_darah', array('class' => 'col-md-3 control-label')) !!}
        <div class="col-md-3">
            {!! Form::select('golongan_darah', $golongan_darah, null, array('class' => 'form-control')) !!}
            @if($errors->has('golongan_darah'))
            <span class="help-block" style="color:red;">{{ $errors->first('golongan_darah') }}</span>
            @endif
        </div>
    </div>

    @if($errors->has('alamat'))
            <div class="form-group has-error has-feedback">
             {!! Form::label('', 'Alamat', array('class' => 'col-md-3 control-label', 'for' => 'inputError2')) !!}
        @else
            <div class="form-group">
            {!! Form::label('', 'Alamat', array('class' => 'col-md-3 control-label')) !!}
        @endif
        <div class="col-md-3">
            @if($errors->has('alamat'))
            {!! Form::textarea('alamat', null, array('class' => 'form-control','data-container' => 'body', 'data-toggle' => 'popover', 'data-placement' => 'right', 'data-content' => $errors->first('alamat'), 'data-trigger' => 'focus', 'id' => 'inputError2','aria-describedby' => 'inputError2Status')) !!}
             <span class="glyphicon glyphicon-remove form-control-feedback" aria-hidden="true"></span>
             <span id="inputError2Status" class="sr-only">(error)</span>
            @else
                 {!! Form::textarea('alamat', null, array('class' => 'form-control')) !!}
            @endif
        </div>
    </div>
    @if($errors->has('hobi'))
            <div class="form-group has-error has-feedback">
             {!! Form::label('', 'Hobi', array('class' => 'col-md-3 control-label', 'for' => 'inputError2')) !!}
        @else
            <div class="form-group">
            {!! Form::label('', 'Hobi', array('class' => 'col-md-3 control-label')) !!}
        @endif
        <div class="col-md-3">
            @if($errors->has('hobi'))
            {!! Form::textarea('hobi', null, array('class' => 'form-control','data-container' => 'body', 'data-toggle' => 'popover', 'data-placement' => 'right', 'data-content' => $errors->first('hobi'), 'data-trigger' => 'focus', 'id' => 'inputError2','aria-describedby' => 'inputError2Status')) !!}
             <span class="glyphicon glyphicon-remove form-control-feedback" aria-hidden="true"></span>
             <span id="inputError2Status" class="sr-only">(error)</span>
            @else
                 {!! Form::textarea('hobi', null, array('class' => 'form-control')) !!}
            @endif
        </div>
    </div>


    <div class="form-group">
        <label class="col-md-3 control-label">Foto</label>
         <div class="col-md-3">
            {!! Form::file('foto', null, array('class' => 'form-control')) !!}
        </div>
    </div>

    @if($errors->has('telepon'))
            <div class="form-group has-error has-feedback">
             {!! Form::label('', 'No. Tlp', array('class' => 'col-md-3 control-label', 'for' => 'inputError2')) !!}
        @else
            <div class="form-group">
            {!! Form::label('', 'No. Tlp', array('class' => 'col-md-3 control-label')) !!}
        @endif
        <div class="col-md-3">
            @if($errors->has('telepon'))
            {!! Form::text('telepon', null, array('class' => 'form-control','data-container' => 'body', 'data-toggle' => 'popover', 'data-placement' => 'right', 'data-content' => $errors->first('telepon'), 'data-trigger' => 'focus', 'id' => 'inputError2','aria-describedby' => 'inputError2Status')) !!}
             <span class="glyphicon glyphicon-remove form-control-feedback" aria-hidden="true"></span>
             <span id="inputError2Status" class="sr-only">(error)</span>
            @else
                 {!! Form::text('telepon', null, array('class' => 'form-control')) !!}
            @endif
        </div>
    </div>

    <div class="form-group">
        {!! Form::label('agama', 'Agama', array('class' => 'col-md-3 control-label')) !!}
        <div class="col-md-3">
            {!! Form::select('agama', $agama, null, array('class' => 'form-control')) !!}
            @if($errors->has('agama'))
            <span class="help-block" style="color:red;">{{ $errors->first('agama') }}</span>
            @endif
        </div>
    </div>

</div>    

