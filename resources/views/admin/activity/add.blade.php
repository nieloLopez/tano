@extends('app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading"><h3>Agregar Actividad</h3></div>
                <div class="panel-body">
                    @include('admin/partials/messages')
                    {!! Form::open(['url' => 'admin/activity/store', 'method' => 'POST', 'class' => 'form-horizontal']) !!}
                        @include('admin/activity/partials/form')
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@include('admin/customer/partials/scripts')