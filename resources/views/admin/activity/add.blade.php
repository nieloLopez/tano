@extends('app')

@section('content')  

<div class="container">

    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Agregar Usuario</div>
                <div class="panel-body">

                    @include('admin/partials/messages')

                    {!! Form::open(['url' => 'admin/activity/store', 'method' => 'POST', 'class' => 'form-horizontal']) !!}

                        @include('admin/activity/partials/form')
                        
                        <div class="form-group">
                          <div class="col-sm-offset-2 col-sm-10 ">
                            <button type="submit" class="btn btn-primary">Enviar</button>
                            <a class="btn btn-danger" href="{{ url('admin/activity') }}">Cancelar</a>
                          </div>
                        </div>
                        
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@include('admin/customer/partials/scripts')