@extends('app')

@section('content')
<div class="container">

    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading"><h3>Agregar Pago</h3></div>
                <div class="panel-body">
                    @include('admin/partials/messages')
                    <h5 class='control-label'>Actividades</h5>
                    {!! Form::open(['url' => 'admin/checkout/finish', 'method' => 'POST', 'class' => 'form-horizontal']) !!}
                        @include('admin/checkout/partials/form')
                    {!! Form::close() !!}
                </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@include('admin/checkout/partials/scripts')
