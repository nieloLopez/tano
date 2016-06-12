<div class="form-group">
    {!! Form::label('fk_rol', 'Tipo Usuario', array('class'=> 'col-sm-2 control-label')) !!}
    <div class="col-xs-4">
        {!! Form::select('fk_rol', array('1' => 'Administrador', '2' => 'Cliente'), isset($user)?null:'2', array('class' => 'form-control', isset($user)?'disabled':'')) !!}
    </div>
</div>

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

<div class="form-group hidden" id="password-form">
    {!! Form::label('password', 'Password', array('class'=> 'col-sm-2 control-label')) !!}
  <div class="col-xs-4">
      {!! Form::password('password', array('class'=> 'form-control', 'placeholder'=>'Password')) !!}
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
        <button type="submit" class="btn btn-primary">Enviar</button>
        <a class="btn btn-danger" href="{{ url('admin/') }}">Cancelar</a>
    </div>
</div>