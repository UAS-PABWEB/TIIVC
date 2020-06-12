$(function () {
    $('form').submit(function (e) {
        $('.btn-submit').attr('disabled', 'disabled');
    });

    $('.btn-modal').click(function (e) {
        if ($(this).data('content')) {
            $('.modal-body').html('<p>Hapus ' + $(this).data('content') + '?</p>');
        }

        $('.form-submit').attr('href', $(this).data('link'));
    });

    $('.change-debt-status').click(function (e) {
        e.preventDefault();
        if ($(this).data('link') != null) {
            window.location.href = $(this).data('link');
        }
    });

    //Date range picker
    $('#reservationdate').datetimepicker({
        format: 'DD MMMM YYYY'
    });
    //Date range picker
    $('#reservation').daterangepicker();

    // === IMAGE PREVIEW ===
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('.img-preview').attr('src', e.target.result);
                $('.img-preview').attr('href', e.target.result);
            }

            reader.readAsDataURL(input.files[0]); // convert to base64 string
        }
    }
    // image preview
    $("#file").change(function () {
        readURL(this);
    });
});
