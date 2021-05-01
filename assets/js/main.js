$(document).ready(function(){
    $('[data-toggle="datepicker"]').datepicker({
        format: 'dd-mm-yyyy'
    });


    $('.my_table').DataTable();

    $(".ubah-riwayat").click(function(){
        var form = $("#edit_riwayat_form");
        var id = $(this).data('id');
        var originUrl = form.attr('action');
        var tanggal_masuk = $(this).data('tanggal-masuk');
        var alasan_dirawat = $(this).data('alasan-dirawat');

        form.attr('action', originUrl.replace('{id}', id));
        form.find('.tanggal_masuk').val(tanggal_masuk);
        form.find('.alasan_dirawat').val(alasan_dirawat);
    })
})