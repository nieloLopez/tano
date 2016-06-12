@section('scripts')
    <script>
        $(document).ready(function () {
            var amount = 0;
            $('.check-activity').click(function(){
                if( $(this).is(':checked') ){
                    amount += parseInt($(this).attr('data-price'));
                    $('input#price').val(amount);
                } else {
                    amount -= parseInt($(this).attr('data-price'));
                    $('input#price').val(amount);
                }
            });


            $(".openModal").click(function () {
                debugger;
                var row = $(this).parents('tr');
                var id = row.data('id');

                var url = $('#form-get-payment').attr('action').replace('PAYMENT_ID', id);
                var data = $('#form-get-payment').serialize();
                debugger;
                /*
                $.post(url, data, function (result) {
                    row.fadeOut();
                    $('.alert-success').removeClass('hidden');
                    $('.alert-success').removeClass('show');
                    $('.alert-success').html(result.message);
                }).fail(function () {
                    row.show();
                })
                */

                $("#userModal").modal('show');
            });
            $("#saveBtn").click(function() {
                var data = $("#userForm").serialize();
                alert(data);
                // $.post, etc..
            });
        });
    </script>
@endsection