$(document).ready(function () {
  $("#example").DataTable({
    paging: true,
    fixedColumns: true,
    lengthChange: false,
    pageLength: 4,

    dom: "Bfrtip",
    buttons: [
      {
        extend: "print",
        text: "Print all",
        exportOptions: {
          columns: ':visible',
        },
      },
      {
        extend: "print",
        text: "Print selected",
      },

      'colvis'
    ],
    select: true,

    columnDefs: [{
      targets: -1,
      visible: false
    }]
  });
});
