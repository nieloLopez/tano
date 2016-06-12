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

                var row = $(this).parents('tr');
                var id = row.data('id');
                var url = '/admin/checkout/getPaymentDetails/' + id;

                $.ajax({
                    data:  id,
                    url:   url,
                    type:  'GET',

                    success:  function (data) {
                    }
                });

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