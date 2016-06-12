@section('scripts')
    <script>
        $(document).ready(function () {

            var idRol = $('select#fk_rol').val();
            if(idRol == 1) {
                $('#password-form').removeClass('hidden');
                $('#password-form').addClass('show');
            }
            $('select#fk_rol').change(function () {
                var idRol = $(this).val();
                if (idRol == 1) {
                    $('#password-form').removeClass('hidden');
                    $('#password-form').addClass('show');
                } else if (idRol == 2) {
                    $('#password-form').removeClass('show');
                    $('#password-form').addClass('hidden');
                } else {
                    $('#password-form').removeClass('show');
                    $('#password-form').addClass('hidden');
                }
            });


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