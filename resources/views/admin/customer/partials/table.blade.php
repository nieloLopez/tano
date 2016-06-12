<table class="table table-striped">
    <tr>
        <th>Nombre</th>
        <th>Acciones</th>
    </tr>
    @foreach ($customers as $customer)
        <tr data-id="{{ $customer->id }}">
            <td class="col-md-6">{{ $customer->name }}</td>
            <td class="col-md-6">
                <a class="col-md-4"href="{{ url('admin/checkout/'.$customer->id) }}">
                    <span class="glyphicon glyphicon-usd" aria-hidden="true"></span>
                </a>

                <a class="col-md-4"href="{{ url('admin/customer/edit/'.$customer->id) }}">
                    <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                </a>

                <a class="col-md-4 btn-delete"href="{{ url('#!') }}">
                    <span class="glyphicon glyphicon-ban-circle" aria-hidden="true"></span>
                </a>
            </td>
        </tr>
    @endforeach
</table>
{!! $customers->appends(Request::only(['search']))->render() !!}