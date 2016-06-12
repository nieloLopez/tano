@extends('app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">

                    <div class="panel-heading">

                        <a class="btn btn-primary " href="{{ url('admin/activity/add') }}">Registrar</a>
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
                        <p>Total {!! $activities->total() !!} usuarios</p>
                        <table class="table table-striped">
                            <tr>
                                <th>Nombre</th>
                                <th>Acciones</th>
                            </tr>
                            @foreach ($activities as $activity)
                                <tr data-id="{{ $activity->id }}">
                                    <td class="col-md-6">{{ $activity->name }}</td>
                                    <td class="col-md-6">
                                        <a class="col-md-6"href="{{ url('admin/activity/edit/'.$activity->id) }}">
                                            <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                                        </a>

                                        <a class="col-md-6 btn-delete"href="{{ url('#!') }}">
                                            <span class="glyphicon glyphicon-ban-circle" aria-hidden="true"></span>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                        {!! $activities->appends(Request::only(['search']))->render() !!}
                    </div>
                </div>
            </div>
        </div>
        {!! Form::open(['url' => ['admin/activity/disable', 'USER_ID'], 'method' => 'DELETE', 'id' => 'form-delete']) !!}
        {!! Form::close() !!}
    </div>
@endsection

@section('scripts')
    <script>
        $(document).ready(function () {
            $('.btn-delete').click(function () {

                var row = $(this).parents('tr');
                var id = row.data('id');
                var url = $('#form-delete').attr('action').replace('USER_ID', id);
                var data = $('#form-delete').serialize();

                $.post(url, data, function (result) {
                    row.fadeOut();
                    $('.alert-success').removeClass('hidden');
                    $('.alert-success').removeClass('show');
                    $('.alert-success').html(result.message);
                }).fail(function () {
                    row.show();
                })
            });

        });
    </script>
@endsection
