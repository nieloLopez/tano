<div class="form-group">
    {!! Form::label('name', 'Nombre', array('class'=> 'col-sm-2 control-label')) !!}
  <div class="col-xs-4">
    {!! Form::text('name', null, array('class'=> 'form-control', 'placeholder'=>'Nombre')) !!}
  </div>
</div>

<div class="form-group">
    {!! Form::label('dni', 'Dni', array('class'=> 'col-sm-2 control-label')) !!}
  <div class="col-xs-4">
      {!! Form::text('dni', null, array('class'=> 'form-control', 'placeholder'=>'Dni')) !!}
  </div>
</div>

<div class="form-group">
    {!! Form::label('email', 'Email', array('class'=> 'col-sm-2 control-label')) !!}
  <div class="col-xs-4">
      {!! Form::email('email', null, array('class'=> 'form-control', 'placeholder'=>'Email')) !!}
  </div>
</div>

<div class="form-group">
    {!! Form::label('birthday', 'Cumpleaños', array('class'=> 'col-sm-2 control-label')) !!}
    <div class="col-xs-4">
        {!! Form::input('date', 'birthday', null, ['Class'=>'form-control']) !!}
    </div>
</div>

<div class="form-group">
    {!! Form::label('address', 'Dirección', array('class'=> 'col-sm-2 control-label')) !!}
  <div class="col-xs-4">
      {!! Form::text('address', null, array('class'=> 'form-control', 'placeholder'=>'Dirección')) !!}
  </div>
</div>

<div class="form-group">
    {!! Form::label('telephone', 'Teléfono', array('class'=> 'col-sm-2 control-label')) !!}
  <div class="col-xs-4">
      {!! Form::text('telephone', null, array('class'=> 'form-control', 'placeholder'=>'Teléfono')) !!}
  </div>
</div>

<div class="form-group">
    <div class="col-sm-offset-2 col-sm-10 ">
        <button type="submit" class="btn btn-primary">Guardar</button>
        <a class="btn btn-danger" href="{{ url('admin/') }}">Cancelar</a>
    </div>
</div>