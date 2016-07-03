<table class="table table-striped">
    <tr>
        <th>Fecha Pago</th>
        <th>Debe</th>
        <th></th>
    </tr>
    @foreach ($payments as $payment)
        <tr data-id="{{ $payment->id }}">
            <td class="col-md-4">{{ $payment->date_payment }}</td>
            <td class="col-md-2">$ {{ $payment->price - $payment->amount }}</td>

            <td class="col-md-2">
                <a class="col-md-4"href="{{ url('admin/checkout/edit/'.$payment->id) }}">
                    <span class="glyphicon glyphicon-usd" aria-hidden="true"></span>
                </a>

                <a class="col-md-4 openModal" href="#!">
                    <span class="glyphicon glyphicon-search" aria-hidden="true"></span>
                </a>
            </td>
        </tr>
    @endforeach
</table>
{!! $payments->render() !!}