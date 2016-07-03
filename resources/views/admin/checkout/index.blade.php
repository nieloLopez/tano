@extends('app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">

                <div class="panel panel-default">

                    <div class="panel-heading">
                        <h4>Historial de pagos de {{ ucfirst($user->name) }}</h4>
                    </div>
                    <div class="panel-heading">
                        <a class="btn btn-primary " href="{{ url('admin/checkout/add/'.$user->id) }}">Abonar</a>
                    </div>
                    <!--<div class="alert alert-success hidden" role="alert"></div>-->
                    @if (\Illuminate\Support\Facades\Session::has('message'))
                        <p class="alert alert-success">{{ \Illuminate\Support\Facades\Session::get('message') }}</p>
                    @endif

                    @include('admin/partials/messages')

                    <div class="panel-body">
                        @include('admin/checkout/partials/table')
                    </div>

                </div>
            </div>
        </div>
    </div>
    @include('admin/checkout/partials/modalPaymentDetails')
@endsection
@include('admin/checkout/partials/scripts')
