<table class="table table-striped">
    <tr>
        <th>Nombre</th>
        <th>Editar</th>
    </tr>
    @foreach ($activities as $activity)
        <tr data-id="{{ $activity->id }}">
            <td class="col-md-6">{{ $activity->name }}</td>
            <td class="col-md-6">
                <a class="col-md-6"href="{{ url('admin/activity/edit/'.$activity->id) }}">
                    <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                </a>
                {{--
                <a class="col-md-6 btn-delete"href="{{ url('#!') }}">
                    <span class="glyphicon glyphicon-thumbs-down" aria-hidden="true"></span>
                </a>
                --}}
            </td>
        </tr>
    @endforeach
</table>
{!! $activities->appends(Request::only(['search']))->render() !!}

