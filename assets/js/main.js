$(document).ready(function(){
    $('[data-toggle="datepicker"]').datepicker({
        format: 'dd-mm-yyyy'
    });


    $('.my_table').DataTable();
})