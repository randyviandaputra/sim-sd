
<div class="form-body">
        <span style="color:red;">{{ Session::get('add_guru') }}</span>
        @if($errors->has('kode_matpel'))
            <div class="form-group has-error has-feedback">
             {!! Form::label('', 'Kode Matpel', array('class' => 'col-md-3 control-label', 'for' => 'inputError2')) !!}
        @else
            <div class="form-group">
            {!! Form::label('', 'Kode Matpel', array('class' => 'col-md-3 control-label')) !!}
        @endif
        <div class="col-md-3">
            @if($errors->has('kode_matpel'))
            {!! Form::text('kode_matpel', null, array('class' => 'form-control','data-container' => 'body', 'data-toggle' => 'popover', 'data-placement' => 'right', 'data-content' => $errors->first('kode_matpel'), 'data-trigger' => 'focus', 'id' => 'inputError2','aria-describedby' => 'inputError2Status')) !!}
             <span class="glyphicon glyphicon-remove form-control-feedback" aria-hidden="true"></span>
             <span id="inputError2Status" class="sr-only">(error)</span>
            @else
                 {!! Form::text('kode_matpel', null, array('class' => 'form-control')) !!}
            @endif
        </div>
    </div>

        @if($errors->has('nama_matpel'))
            <div class="form-group has-error has-feedback">
             {!! Form::label('', 'Nama Matpel', array('class' => 'col-md-3 control-label', 'for' => 'inputError2')) !!}
        @else
            <div class="form-group">
            {!! Form::label('', 'Nama Matpel', array('class' => 'col-md-3 control-label')) !!}
        @endif
        <div class="col-md-3">
            @if($errors->has('nama_matpel'))
            {!! Form::text('nama_matpel', null, array('class' => 'form-control','data-container' => 'body', 'data-toggle' => 'popover', 'data-placement' => 'right', 'data-content' => $errors->first('nama_matpel'), 'data-trigger' => 'focus', 'id' => 'inputError2','aria-describedby' => 'inputError2Status')) !!}
             <span class="glyphicon glyphicon-remove form-control-feedback" aria-hidden="true"></span>
             <span id="inputError2Status" class="sr-only">(error)</span>
            @else
                 {!! Form::text('nama_matpel', null, array('class' => 'form-control')) !!}
            @endif
        </div>
    </div>

        @if($errors->has('kkm'))
            <div class="form-group has-error has-feedback">
             {!! Form::label('', 'KKM', array('class' => 'col-md-3 control-label', 'for' => 'inputError2')) !!}
        @else
            <div class="form-group">
            {!! Form::label('', 'KKM', array('class' => 'col-md-3 control-label')) !!}
        @endif
        <div class="col-md-3">
            @if($errors->has('kkm'))
            {!! Form::text('kkm', null, array('class' => 'form-control','data-container' => 'body', 'data-toggle' => 'popover', 'data-placement' => 'right', 'data-content' => $errors->first('kkm'), 'data-trigger' => 'focus', 'id' => 'inputError2','aria-describedby' => 'inputError2Status')) !!}
             <span class="glyphicon glyphicon-remove form-control-feedback" aria-hidden="true"></span>
             <span id="inputError2Status" class="sr-only">(error)</span>
            @else
                 {!! Form::text('kkm', null, array('class' => 'form-control')) !!}
            @endif
        </div>
    </div>
</div>    

