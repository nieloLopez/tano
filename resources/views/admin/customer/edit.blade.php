@extends('app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Editar Usuario {{ $user->name }}</div>
                <div class="panel-body">
                    @include('admin/partials/messages')
                    {!! Form::model($user, ['url' => ['admin/customer/update', $user->id], 'method' => 'PUT', 'class' => 'form-horizontal']) !!}
                        @include('admin/customer/partials/form')
                    {!! Form::close() !!}                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@include('admin/customer/partials/scripts')
