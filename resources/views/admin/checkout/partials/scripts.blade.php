@section('scripts')
    <script>
        $(document).ready(function () {

            $('.check-activity').click(function(){
                var amount = 0;
                if( $(this).is(':checked') ){
                    amount += parseInt($(this).attr('data-price'));
                    $('input#price').val(amount);
                } else {
                    amount -= parseInt($(this).attr('data-price'));
                    $('input#price').val(amount);
                }
            });


            $('.check-activity').click(function(){
                var amount = parseInt($('#price-pending').val());
                if( $(this).is(':checked') ){

                    //alert(parseInt($(this).attr('data-price')));
                    amount += parseInt($(this).attr('data-price'));
                    $('input#price-pending').val(amount);
                } else {
                    amount -= parseInt($(this).attr('data-price'));
                    $('input#price-pending').val(amount);
                }
            });



            $(".openModal").click(function () {

                var row = $(this).parents('tr');
                var id = row.data('id');
                var url = '/admin/checkout/getPaymentDetails/' + id;
                $('#tablePaymentActivities tbody').remove();
                $('#tablePaymentItems tr.tr-payment-item').remove();
                $('td#pay-pending').html('asdasd');

                $.ajax({
                    data:  id,
                    url:   url,
                    type:  'GET',

                    success:  function (data) {

                        $('td#pay-pending').html('$ ' + data.data.payPending[0].pay_pending);

                        $.each( data.data.paymentItems, function( key, value ) {
                        var tr = "<tr class='tr-payment-item'> " +
                                    "<td>" + value['name']  + "</td>" +
                                    "<td>" + value['date_payment']  + "</td>" +
                                    "<td>" + value['amount_pay']  + "</td>" +
                                "</tr>";

                            $(tr).appendTo( $('#tablePaymentItems') );
                        });

                        $.each( data.data.paymentActivities, function( key, value ) {
                            var tr = "<tr> " +
                                    "<td>" + value['name']  + "</td>" +
                                    "<td>" + value['date_payment']  + "</td>" +
                                    "<td>" + value['price']  + "</td>" +
                                    "</tr>";

                            $(tr).appendTo( $('#tablePaymentActivities') );
                        });

                    }
                });

                $("#userModal").modal('show');
            });

        });
    </script>
@endsection