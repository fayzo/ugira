$(document).ready(function () {

    $(document).on('click', '#domestics-view', function (e) {
        e.stopPropagation();
        var domestic_id = $(this).data('domestics');
        var user_id = $(this).data('user');

        $.ajax({
            url: 'core/ajax_db/domesticHelper_Profile.php',
            method: 'POST',
            dataType: 'text',
            data: {
                domestic_id: domestic_id,
                user_id: user_id,
            }, success: function (response) {
                $(".popupTweet").html(response);
                $(".close-imagePopup").click(function () {
                    $(".domestic-popup").hide();
                });
                console.log(response);

            }
        });
    });

    $(document).on('click', '#employers-view', function (e) {
        e.stopPropagation();
        var jobs_id = $(this).data('employer');
        var user_id = $(this).data('user');

        $.ajax({
            url: 'core/ajax_db/domesticEmployer_Profile.php',
            method: 'POST',
            dataType: 'text',
            data: {
                jobs_id: jobs_id,
                user_id: user_id,
            }, success: function (response) {
                $(".popupTweet").html(response);
                $(".close-imagePopup").click(function () {
                    $(".employer-popup").hide();
                });
                console.log(response);

            }
        });
    });
});
