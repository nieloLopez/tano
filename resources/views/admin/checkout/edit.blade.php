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
                        @include('admin/checkout/partials/formEditPayment')
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@include('admin/checkout/partials/scripts')
