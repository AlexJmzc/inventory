$(document).ready(function() {
    $('#equipos').pageMe({
        pagerSelector: '#pagination',
        showPrevNext: true,
        hidePageNumbers: false,
        perPage: 3
    });
});

$(document).ready( function () {
    $('#mytable').DataTable();
} );