@extends('app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">

                <div class="panel-heading">
                    <a class="btn btn-primary " href="{{ url('admin/customer/add') }}">Registrar</a>
                </div>

                {!! Form::open(['url' => 'admin/', 'method' => 'GET', 'class' => 'navbar-form navbar-left pull-right', 'role' => 'search']) !!}
                    <div class="form-group">
                        {!! Form::Text('search', null, ['class' => 'form-control', 'placeholder' => 'Buscar']) !!}
                    </div>

                    <button type="submit" class="btn btn-default">Buscar</button>
                {!! Form::close() !!}

                <div class="alert alert-success hidden" role="alert"></div>

                @if (\Illuminate\Support\Facades\Session::has('message'))
                    <p class="alert alert-success">{{ \Illuminate\Support\Facades\Session::get('message') }}</p>
                @endif

                <div class="panel-body">
                    <p>Total {!! $customers->total() !!} usuarios</p>

                    @include('admin/customer/partials/table')
                </div>

            </div>
        </div>
    </div>
    {!! Form::open(['url' => ['admin/customer/disable', 'USER_ID'], 'method' => 'DELETE', 'id' => 'form-delete']) !!}
    {!! Form::close() !!}
</div>
@endsection
@include('admin/customer/partials/scripts')
