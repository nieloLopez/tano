<div class="form-group">
    {!! Form::label('name', 'Nombre', array('class'=> 'col-sm-2 control-label')) !!}
  <div class="col-xs-4">
    {!! Form::text('name', null, array('class'=> 'form-control', 'placeholder'=>'Nombre')) !!}
  </div>
</div>

<div class="form-group">
    {!! Form::label('price', 'Precio', array('class'=> 'col-sm-2 control-label')) !!}
  <div class="col-xs-4">
      {!! Form::text('price', null, array('class'=> 'form-control', 'placeholder'=>'Precio')) !!}
  </div>
</div>

<div class="form-group">
    <div class="col-sm-offset-2 col-sm-10 ">
        <button type="submit" class="btn btn-primary">Guardar</button>
        <a class="btn btn-danger" href="{{ url('admin/activity') }}">Cancelar</a>
    </div>
</div>
