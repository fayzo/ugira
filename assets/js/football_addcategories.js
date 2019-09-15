$(document).ready(function () {

    $(document).on('click', '#add_football', function (e) {
        $('.progress-hidex').hide();
        $('.progress-hidec').hide();
        $('.progress-hidez').hide();
        e.stopPropagation();
        var football_view = $(this).data('football');

        $.ajax({
            url: 'core/ajax_db/football_addcategories.php',
            method: 'POST',
            dataType: 'text',
            data: {
                football_view: football_view,
            }, success: function (response) {
                $(".popupTweet").html(response);
                $(".close-imagePopup").click(function () {
                    $(".football-popup").hide();
                });
                console.log(response);
            }
        });
    });

    $(document).on('click', '#football-readmore', function (e) {
        e.stopPropagation();
        var football_id = $(this).data('football');

        $.ajax({
            url: 'core/ajax_db/football_readmore.php',
            method: 'POST',
            dataType: 'text',
            data: {
                blog_id: blog_id,
            }, success: function (response) {
                $(".popupTweet").html(response);
                $(".close-imagePopup").click(function () {
                    $(".football-popup").hide();
                });
                console.log(response);
            }
        });
    });

    $(document).on('click', '#form-football', function (e) {
        // event.preventDefault();
        e.stopPropagation();
        var match_game = $('#match_game');
        var date_of_match = $('#date_of_match');
        var location_of_match = $('#location_of_match');
        var additioninformation = $('#addition-information');
        var photo = $('#photo');
        var other_photo = $('#other-photo');

        if (isEmpty(match_game) && isEmpty(date_of_match) && isEmpty(location_of_match) && isEmpty(additioninformation) && 
            isEmpty(photo) && isEmpty(other_photo)) {

            var extensions3 = $('#photo').val().split('.').pop().toLowerCase();
            var extensions4 = $('#other-photo').val().split('.').pop().toLowerCase();

            if (jQuery.inArray(extensions3, ['gif', 'png', 'jpg', 'mp4', 'mp3', 'jpeg', 'bmp', 'pdf', 'doc', 'ppt', 'docx', 'xlsx', 'xls', 'zip']) == -1) {
                $("#responseSubmitfootball").html('Invalid Image File').fadeIn();
                setInterval(function () {
                    $("#responseSubmitfootball").fadeOut();
                }, 4000);
                $('#photo').val('');
                return false;
            } else if (jQuery.inArray(extensions4, ['gif', 'png', 'jpg', 'mp4', 'mp3', 'jpeg', 'bmp', 'pdf', 'doc', 'ppt', 'docx', 'xlsx', 'xls', 'zip']) == -1) {
                $("#responseSubmitfootball").html('Invalid Image File').fadeIn();
                setInterval(function () {
                    $("#responseSubmitfootball").fadeOut();
                }, 4000);
                $('#other-photo').val('');
                return false;
            } else {
                $.ajax({
                    url: 'core/ajax_db/football_addcategories.php',
                    method: "POST",
                    data: new FormData(this),
                    contentType: false,
                    processData: false,
                    xhr: function () {
                        var xhr = new XMLHttpRequest();
                        xhr.upload.addEventListener('progress', function (e) {
                            var progress = Math.round((e.loaded / e.total) * 100);
                            $('.progress-hidex').show();
                            $('.progress-hidec').show();
                            $('.progress-hidez').show();
                            $('#prox').css('width', progress + '%');
                            $('#proc').css('width', progress + '%');
                            $('#proz').css('width', progress + '%');
                            $('#prox').html(progress + '%');
                            $('#proc').html(progress + '%');
                            $('#proz').html(progress + '%');
                        });

                        xhr.addEventListener('load', function (e) {
                            $('.progress-bar').removeClass('bg-info').addClass('bg-success').html('<span>upload completed  <span class="fa fa-check"></span></span>');
                        });
                        return xhr;
                    },
                    success: function (response) {
                        $("#responseSubmitfootball").html(response).fadeIn();
                        setInterval(function () {
                            $("#responseSubmitfootball").fadeOut();
                        }, 2000);
                        setInterval(function () {
                            location.reload();
                        }, 2400);
                    }, error: function (response) {
                        $("#responseSubmitfootball").html(response).fadeIn();
                        setInterval(function () {
                            $("#responseSubmitfootball").fadeOut();
                        }, 3000);
                    }
                });
                return false;
            }
        }
    });

    $(document).on('click', '.imagefootballViewPopup', function (e) {
        e.stopPropagation();
        var fund_id = $(this).data('fund');
        $.ajax({
            url: 'core/ajax_db/FundraisingImageViewPopup.php',
            method: 'POST',
            dataType: 'text',
            data: {
                showpimage: fund_id,
            }, success: function (response) {
                $(".popupTweet").html(response);
                $(".close-imagePopup").click(function () {
                    $(".img-popup").hide();
                });
                console.log(response);
            }
        });
    });
});

function isEmpty(caller) {
    if (caller.val() == "") {
        caller.css("outline", "1px solid red");
        return false;
    } else {
        caller.css("outline", "1px solid green ");
    }
    return true;
}

function isEmptys(caller) {
    if (caller.val() != "") {
        caller.css("outline", "1px solid red");
        return false;
    }
    return true;
}
