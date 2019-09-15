$(document).ready(function () {

    $(document).on('click', '.emailSent', function (e) {
        e.stopPropagation();
        var user_id = $(this).data('user');

        $.ajax({
            url: 'core/ajax_db/unemployment_Emailmessage.php',
            method: 'POST',
            dataType: 'text',
            data: {
                user_id: user_id,
            }, success: function (response) {
                $(".popupTweet").html(response);
                $(".close-imagePopup").click(function () {
                    $(".user-popup").hide();
                });
                console.log(response);
            }
        });
    });

    $(document).on('keyup', '.searchUnemployment', function () {
        if ($(this).val() != "") {
            $('.job-hide').hide();
        } else {
            $('.job-hide').show();
        }
        var searching = $(this).val();
        $.ajax({
            url: 'core/ajax_db/unemployment_Emailmessage.php',
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

    $(document).on('click', '#unemployment', function () {
        var user_id = $(this).data('user');
        $.ajax({
            url: 'core/ajax_db/unemployment_profile.php',
            method: 'POST',
            dataType: 'text',
            data: {
                user_id: user_id,
            }, success: function (response) {
                $(".popupTweet").html(response);
                $(".close-imagePopup").click(function () {
                    $(".user-popup").hide();
                });
                console.log(response);
            }
        });
    });
});