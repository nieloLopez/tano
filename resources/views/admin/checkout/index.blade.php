@extends('app')

@section('content')
    <div class="container" xmlns="http://www.w3.org/1999/html">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">

                <div class="panel panel-default">

                    <div class="panel-heading">
                        <h4>{{ ucfirst($user->name) }}</h4>
                    </div>

                    <!--<div class="alert alert-success hidden" role="alert"></div>-->
                    @if (\Illuminate\Support\Facades\Session::has('message'))
                        <p class="alert alert-success">{{ \Illuminate\Support\Facades\Session::get('message') }}</p>
                    @endif

                    @include('admin/partials/messages')

                    <div class="panel-body">

                        <h5 class='control-label'>Actividades</h5>

                        {!! Form::open(['url' => 'admin/checkout/finish', 'method' => 'POST', 'class' => 'form-horizontal']) !!}
                            @include('admin/checkout/partials/form')
                        {!! Form::close() !!}

                        @include('admin/checkout/partials/table')

                        {!! $payments->render() !!}

                    </div>

                </div>
            </div>
        </div>
    </div>
    @include('admin/checkout/partials/modalPaymentDetails')
@endsection
@include('admin/checkout/partials/scripts')

