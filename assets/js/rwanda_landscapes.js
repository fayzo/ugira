$(document).ready(function () {

    $(document).on('click', '#rwandaLandscapes-readmore', function (e) {
        e.stopPropagation();
        var Landscapes_id = $(this).data('landscapes');

        $.ajax({
            url: 'core/ajax_db/rwandaLandscapes_readmore.php',
            method: 'POST',
            dataType: 'text',
            data: {
                Landscapes_id: Landscapes_id,
            }, success: function (response) {
                $(".popupTweet").html(response);
                $(".close-imagePopup").click(function () {
                    $(".Landscapes-popup").hide();
                });
                console.log(response);
            }
        });
    });

    $(document).on('click', '#districts-view', function (e) {
        e.stopPropagation();
        var districts = $(this).data('districts');

        $.ajax({
            url: 'core/ajax_db/rwandalandscapes_province0copy.php',
            method: 'POST',
            dataType: 'text',
            data: {
                districts: districts,
            }, success: function (response) {
                $(".job-hide").html(response);
                console.log(response);
            }
        });
    });

    $(document).on('click', '#sector-view', function (e) {
        e.stopPropagation();
        var sector = $(this).data('sector');

        $.ajax({
            url: 'core/ajax_db/rwandalandscapes_province0copy.php',
            method: 'POST',
            dataType: 'text',
            data: {
                sector: sector,
            }, success: function (response) {
                $(".job-hide").html(response);
                console.log(response);
            }
        });
    });

    $(document).on('click', '#cell-view', function (e) {
        e.stopPropagation();
        var cell = $(this).data('cell');

        $.ajax({
            url: 'core/ajax_db/rwandalandscapes_province0copy.php',
            method: 'POST',
            dataType: 'text',
            data: {
                cell: cell,
            }, success: function (response) {
                $(".job-hide").html(response);
                console.log(response);
            }
        });
    });

    $(document).on('click', '#village-readmore', function (e) {
        e.stopPropagation();
        var village_id = $(this).data('village');

        $.ajax({
            url: 'core/ajax_db/landscapes_search.php',
            method: 'POST',
            dataType: 'text',
            data: {
                village_id: village_id,
            }, success: function (response) {
                $(".popupTweet").html(response);
                $(".close-imagePopup").click(function () {
                    $(".landscapes-popup").hide();
                });
                console.log(response);
            }
        });
    });

    $(document).on('click', '#province-view', function (e) {
        e.stopPropagation();
        var province = $(this).data('province');

        $.ajax({
            url: 'core/ajax_db/rwandalandscapes_province0copy.php',
            method: 'POST',
            dataType: 'text',
            data: {
                province: province,
            }, success: function (response) {
                $(".job-hide").html(response);
                console.log(response);
            }
        });
    });

    $(document).on('keyup', '.searchlandscapes', function () {
        if ($(this).val() != "") {
            $('.job-hide').hide();
        } else {
            $('.job-hide').show();
        }
        var searching = $(this).val();
        $.ajax({
            url: 'core/ajax_db/rwandalandscapes_province0copy.php',
            method: 'POST',
            dataType: 'text',
            data: {
                search: searching,
            }, success: function (response) {
                $(".job-show").html(response);
                console.log(response);
            }
        });
    });

});

