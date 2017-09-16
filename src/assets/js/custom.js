jQuery(function () {
    var entryPoint = 'show.php';
    var table = jQuery('#table').DataTable({
        pagingType: 'full_numbers',
        processing: true,
        serverSide: true,
        searching: false,
        ajax: entryPoint + '?action=fetch',
        columns: [
            {"data": "id"},
            {"data": "code"},
            {"data": "type"},
            {"data": "application"},
            {"data": "message", orderable: false},
            {"data": "date_create"},
            {"data": "date_update"},
            {
                "data": "status", editable: true, className: 'sel_type', render: function (data, type, row) {
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
        var then = this;

        jQuery.post(entryPoint + '?action=update', {
            id: row.data().id,
            status: status
        }, function (response) {

            var isTrueSet = (response === 'true');
            var tablerow = jQuery(then).parents('tr');

            if (isTrueSet) {
                tablerow.addClass('selected');
            } else {
                tablerow.addClass('orangered');
            }
            setTimeout(function () {
                tablerow.removeClass('selected');
                tablerow.removeClass('orangered');
            }, 1000);
        });
    });
});