@section('scripts')
    <script>
        $(document).ready(function () {
            $('.btn-delete').click(function () {

                var row = $(this).parents('tr');
                var id = row.data('id');
                var url = $('#form-delete').attr('action').replace('USER_ACTIVITY', id);
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