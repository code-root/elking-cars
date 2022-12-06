/*
 Template Name: Admiria - Bootstrap 4 Admin Dashboard
 Author: Themesbrand
 File: Datatable js
 */

$(document).ready(function() {
    $('#table_id').DataTable( {
          lengthChange: true,
        dom: 'Bfrtip',
        colReorder: true,
        buttons: ['copy', 'excel', 'pdf', 'colvis' , 'print' ]
    } );

    // //Buttons examples
    // var table = $('#table_id').DataTable({
    //     lengthChange: false,
    //     buttons: ['copy', 'excel', 'pdf', 'colvis']
    // });

    // table.buttons().container()
    //     .appendTo('#datatable-buttons_wrapper .col-md-6:eq(0)');
} );