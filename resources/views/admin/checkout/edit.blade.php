@extends('app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Editar Pago</div>
                <div class="panel-body">
                    @include('admin/partials/messages')
                    <h5 class='control-label'>Actividades</h5>

                    <form action="{{ url('admin/checkout/update/' . $id) }}" method="POST" class='form-horizontal'>
                        <input name="_method" type="hidden" value="PUT">
                        {!! Form::token() !!}
                        @foreach($activities as $activity)
                            <div class="form-group">
                                <div class="col-sm-10">
                                    <div class="checkbox">

                                        @foreach($paymentData['paymentActivities'] as $paymentActivity)

                                            <label id={{ 'activity' . $activity->id }} >

                                                {!! Form::checkbox('activity[]', $activity->id,
                                                ($activity->id == $paymentActivity->id) ? 'checked' : '',
                                                array('id' =>'activity' . $activity->id, 'data-price' => $activity->price,
                                                'class' => 'check-activity',
                                                 ($activity->id == $paymentActivity->id) ? 'disabled' : '')) !!}

                                                $ {{  $activity->name }}
                                                $ {{  $activity->price }}
                                            </label>

                                        @endforeach

                                    </div>
                                </div>
                            </div>
                        @endforeach


                        <div class="form-group" >
                            <h4 class='col-sm-1'>Monto</h4>
                            <div class="col-sm-2">
                                {!! Form::text('price', $paymentData['payPending'][0]->pay_pending, array('class'=> 'form-control', 'readonly'=>'', 'id' => 'price-pending')) !!}
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
                                <a class="btn btn-danger" href="{{ url('admin/checkout/list/' . $idCustomer) }}">Cancelar</a>
                            </div>
                        </div>

                    </form>


                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@include('admin/checkout/partials/scripts')
