jQuery(function () {
    var showPoint = 'show.php';
    var statusPoint = 'status.php';
    var table = jQuery('#table').on('init.dt', function (target, d, f) {
        var t = target.currentTarget;
        var rows = jQuery(t).find('tbody > tr');
        rows.each(function (value, row) {
            var className = jQuery(row).find('option:selected').val()
            jQuery(row).addClass(className);
        });
    }).DataTable({
        pagingType: 'full_numbers',
        processing: true,
        serverSide: true,
        searching: false,
        ajax: showPoint + '?action=fetch',
        iDisplayLength: 20,
        lengthMenu: [[10, 20, 50, 100], [10, 20, 50, 100]],
        columns: [
            {"data": "id"},
            {"data": "code"},
            {"data": "type"},
            {"data": "application"},
            {"data": "message", orderable: false},
            {"data": "date_create"},
            {"data": "date_update"},
            {
                data: "status",
                editable: true,
                className: 'sel_type',
                render: function (data) {

                    var sel = '<select>';
                    sel += '<option value="received"';
                    if (data === 'received')
                        sel += 'selected';
                    sel += '>received</option><option value="read"';
                    if (data === 'read')
                        sel += 'selected';
                    sel += '>read</option><option value="fixed"';
                    if (data === 'fixed')
                        sel += 'selected';
                    sel += '>fixed</option></select>';
                    return sel;
                }
            }
        ]
    });

    /**
     * Update status row
     */
    jQuery('#table tbody').on('change', 'select', function () {
        var row = table.row(jQuery(this).parents('tr'));
        var status = jQuery(this).find('option:selected').val();
        var statuses = ['fixed', 'received', 'read'];
        var then = this;


        jQuery.post(statusPoint + '?action=update', {
            id: row.data().id,
            status: status
        }, function (response) {

            var isTrueSet = (response === 'true');
            var tablerow = jQuery(then).parents('tr');

            if (isTrueSet) {
                for (var i = 0; i < statuses.length; i++) {
                    tablerow.removeClass(statuses[i]);
                }
                tablerow.addClass(status);
            }
        });
    })
});