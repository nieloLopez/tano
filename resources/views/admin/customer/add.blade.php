@extends('app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading"><h3>Agregar Usuario</h3></div>
                <div class="panel-body">
                    @include('admin/partials/messages')
                    {!! Form::open(['url' => 'admin/customer/store', 'method' => 'POST', 'class' => 'form-horizontal']) !!}
                        @include('admin/customer/partials/form')
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@include('admin/customer/partials/scripts')
