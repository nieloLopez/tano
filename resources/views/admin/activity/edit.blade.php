@extends('app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading"><h3>Editar Actividad {{ $activity->name }}</h3></div>
                <div class="panel-body">
                    @include('admin/partials/messages')
                    {!! Form::model($activity, ['url' => ['admin/activity/update', $activity->id], 'method' => 'PUT', 'class' => 'form-horizontal']) !!}
                        @include('admin/activity/partials/form')
                    {!! Form::close() !!}                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@include('admin/customer/partials/scripts')
