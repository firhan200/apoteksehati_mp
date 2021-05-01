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

    $(".ubah-riwayat-lab").click(function(){
        var form = $("#edit_riwayat_lab_form");
        var id = $(this).data('id');
        var originUrl = form.attr('action');
        var laboratorium_id = $(this).data('laboratorium-id');
        var tanggal_lab = $(this).data('tanggal-lab');
        var hasil_lab = $(this).data('hasil-lab');

        form.attr('action', originUrl.replace('{id}', id));
        form.find('.laboratorium_id').val(laboratorium_id);
        form.find('.tanggal_lab').val(tanggal_lab);
        form.find('.hasil_lab').val(hasil_lab);
    })

    $(".ubah-riwayat-echo").click(function(){
        var form = $("#edit_riwayat_echo_form");
        var id = $(this).data('id');
        var originUrl = form.attr('action');
        var tanggal_echo = $(this).data('tanggal-echo');
        var EF = $(this).data('ef');
        var EA = $(this).data('ea');
        var TAPSE = $(this).data('tapse');
        var masalah_katup = $(this).data('masalah-katup');
        var hipertensi_plumonal = $(this).data('hipertensi-plumonal');

        form.attr('action', originUrl.replace('{id}', id));
        form.find('.tanggal_echo').val(tanggal_echo);
        form.find('.EF').val(EF);
        form.find('.EA').val(EA);
        form.find('.TAPSE').val(TAPSE);
        form.find('.masalah_katup').val(masalah_katup);
        form.find('.hipertensi_plumonal').val(hipertensi_plumonal);
    })
})