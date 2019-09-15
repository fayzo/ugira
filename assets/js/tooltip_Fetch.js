$(document).ready(function () {

    $('.payoudata').tooltip({
        classes: {
            "ui-tooltip": "highlight"
        },
        position: { my: 'left center', at: 'right+50 center' },
        content: function (result) {
            $.post('core/ajax_db/tooltip_profileFetch.php', {
                id: $(this).attr('id')
            }, function (data) {
                result(data);
            });
        }
    });

});  