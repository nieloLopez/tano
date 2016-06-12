{!! Form::hidden('fk_customer', $user->id) !!}
@foreach($activities as $activity)
    <div class="form-group">
        <div class="col-sm-10">
            <div class="checkbox">
                <label id={{ 'activity' . $activity->id }} >

                    {!! Form::checkbox('activity[]', $activity->id, null,
                    array('id' =>'activity' . $activity->id, 'data-price' => $activity->price,
                    'class' => 'check-activity')) !!}

                    $ {{  $activity->name }}
                    $ {{  $activity->price }}
                </label>

            </div>
        </div>
    </div>
@endforeach
<div class="form-group" >
    <h4 class='col-sm-1'>Monto</h4>
    <div class="col-sm-2">
        {!! Form::text('price', null, array('class'=> 'form-control', 'readonly'=>'', 'id' => 'price')) !!}
    </div>
</div>

<div class="form-group">
    {!! Form::label('amount', 'Abona', array('class' => 'col-sm-1')) !!}
    <div class="col-sm-2">
        {!! Form::text('amount', null, array('class'=> 'form-control', 'placeholder'=>'Abona')) !!}
    </div>
</div>


<div class="form-group">
    <div class="col-sm-offset-2 col-sm-10 ">
        <button type="submit" class="btn btn-success">Pagar</button>
        <a class="btn btn-danger" href="{{ url('admin/') }}">Cancelar</a>
    </div>
</div>