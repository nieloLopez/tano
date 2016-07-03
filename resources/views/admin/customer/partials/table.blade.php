<table class="table table-striped">
    <tr>
        <th>Nombre</th>
        <th>Acciones</th>
    </tr>
    @foreach ($customers as $customer)
        <tr {{($customer->status) ? 'class=bg-warning' : '' }} data-id="{{ $customer->id }}">
            <td class="col-md-6">{{ $customer->name }}</td>
            <td class="col-md-6">
                @if($customer->fk_rol != 1)
                    <a class="col-md-4"href="{{ url('admin/checkout/list/'.$customer->id) }}">
                        <span class="glyphicon glyphicon-usd" aria-hidden="true"></span>
                    </a>
                @endif
                <a class="col-md-4"href="{{ url('admin/customer/edit/'.$customer->id) }}">
                    <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                </a>
                @if($customer->fk_rol != 1)
                    <a class="col-md-4 btn-delete"href="{{ url('#!') }}">
                        <span class="glyphicon glyphicon-thumbs-{{($customer->status) ? 'down' : 'up' }}" aria-hidden="true"></span>
                    </a>
                @endif
            </td>
        </tr>
    @endforeach
</table>
{!! $customers->appends(Request::only(['search']))->render() !!}
