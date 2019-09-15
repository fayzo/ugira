$(document).ready(function () {

    $(document).on('keyup', '.searchvirunga', function () {
        if ($(this).val() != "") {
            $('.landscapes-hide').hide();
            $('#landscape-paginat').hide();
        } else {
            $('.landscapes-hide').show();
            $('#landscape-paginat').show();
        }
        var searching = $(this).val();
        $.ajax({
            url: 'core/ajax_db/landscapes_search.php',
            method: 'POST',
            dataType: 'text',
            data: {
                search: searching,
            }, success: function (response) {
                $(".landscapes-show").html(response);
                console.log(response);
            }
        });
    });
});