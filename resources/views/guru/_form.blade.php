
<div class="form-body">
        <span style="color:red;">{{ Session::get('add_kelas') }}</span>
        @if($errors->has('no_induk_guru'))
            <div class="form-group has-error has-feedback">
             {!! Form::label('', 'No Induk', array('class' => 'col-md-3 control-label', 'for' => 'inputError2')) !!}
        @else
            <div class="form-group">
            {!! Form::label('', 'No Induk', array('class' => 'col-md-3 control-label')) !!}
        @endif
        <div class="col-md-3">
            @if($errors->has('no_induk_guru'))
            {!! Form::text('no_induk_guru', null, array('class' => 'form-control','data-container' => 'body', 'data-toggle' => 'popover', 'data-placement' => 'right', 'data-content' => $errors->first('no_induk_guru'), 'data-trigger' => 'focus', 'id' => 'inputError2','aria-describedby' => 'inputError2Status')) !!}
             <span class="glyphicon glyphicon-remove form-control-feedback" aria-hidden="true"></span>
             <span id="inputError2Status" class="sr-only">(error)</span>
            @else
                 {!! Form::text('no_induk_guru', null, array('class' => 'form-control')) !!}
            @endif
        </div>
    </div>

    <div class="form-group">
        {!! Form::label('id_matpel', 'Mata Pelajaran', array('class' => 'col-md-3 control-label')) !!}
        <div class="col-md-3">
            {!! Form::select('id_matpel', $matpel, null, array('class' => 'form-control')) !!}
            @if($errors->has('id_matpel'))
            <span class="help-block" style="color:red;">{{ $errors->first('id_matpel') }}</span>
            @endif
        </div>
    </div>

        @if($errors->has('nama_guru'))
            <div class="form-group has-error has-feedback">
             {!! Form::label('', 'Nama Guru', array('class' => 'col-md-3 control-label', 'for' => 'inputError2')) !!}
        @else
            <div class="form-group">
            {!! Form::label('', 'Nama Guru', array('class' => 'col-md-3 control-label')) !!}
        @endif
        <div class="col-md-3">
            @if($errors->has('nama_guru'))
            {!! Form::text('nama_guru', null, array('class' => 'form-control','data-container' => 'body', 'data-toggle' => 'popover', 'data-placement' => 'right', 'data-content' => $errors->first('nama_guru'), 'data-trigger' => 'focus', 'id' => 'inputError2','aria-describedby' => 'inputError2Status')) !!}
             <span class="glyphicon glyphicon-remove form-control-feedback" aria-hidden="true"></span>
             <span id="inputError2Status" class="sr-only">(error)</span>
            @else
                 {!! Form::text('nama_guru', null, array('class' => 'form-control')) !!}
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
            {!! Form::text('tanggal_lahir', null, array('id' => 'datepicker','class' => 'form-control','data-container' => 'body', 'data-toggle' => 'popover', 'data-placement' => 'right', 'data-content' => $errors->first('tanggal_lahir'), 'data-trigger' => 'focus','aria-describedby' => 'inputError2Status')) !!}
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


    <div class="form-group">
        <label class="col-md-3 control-label">Foto</label>
         <div class="col-md-3">
            {!! Form::file('foto', null, array('class' => 'form-control')) !!}
        </div>
    </div>

</div>    

