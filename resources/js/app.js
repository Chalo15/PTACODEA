require("./_bootstrap");

/**
 * Plugins
 */
$(function () {

    // Select2
    $('.select2').select2(/* Select2 Configurations */require('./config/_select2.config').default);

    // Datatables
    $('.datatable').DataTable(/** Datatables Configuration */ require('./config/_datatables.config').default);

    // Tooltips
    $(function () {
        $('[data-toggle="tooltip"]').tooltip();
    })
})
