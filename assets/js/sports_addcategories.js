$(document).ready(function () {

    $(document).on('click', '#add_sports', function (e) {
        $('.progress-hidex').hide();
        $('.progress-hidec').hide();
        $('.progress-hidez').hide();
        e.stopPropagation();
        var sports_view = $(this).data('sports');

        $.ajax({
            url: 'core/ajax_db/sports_addcategories.php',
            method: 'POST',
            dataType: 'text',
            data: {
               sports_view : sports_view ,
            }, success: function (response) {
                $(".popupTweet").html(response);
                $(".close-imagePopup").click(function () {
                    $(".sports-popup").hide();
                });
                console.log(response);
            }
        });
    });

    $(document).on('click', '#sports-readmore', function (e) {
        e.stopPropagation();
        var sports_id = $(this).data('sports');

        $.ajax({
            url: 'core/ajax_db/sports_readmore.php',
            method: 'POST',
            dataType: 'text',
            data: {
                blog_id: blog_id,
            }, success: function (response) {
                $(".popupTweet").html(response);
                $(".close-imagePopup").click(function () {
                    $(".sports-popup").hide();
                });
                console.log(response);
            }
        });
    });

    $(document).on('click', '#form-sports', function (e) {
        // event.preventDefault();
        e.stopPropagation();
        var title = $('#title');
        var authors = $('#authors');
        var additioninformation = $('#addition-information');
        var photo = $('#photo');
        var other_photo = $('#other-photo');
        var video = $('#video');
        var youtube = $('#youtube');
        var categories_sports = $('#categories_sports');

        
        if (isEmpty(title) && isEmpty(authors) && isEmpty(categories_sports) && isEmpty(additioninformation) &&
        isEmpty(photo) && isEmpty(other_photo)) {
            
            var extensions3 = $('#photo').val().split('.').pop().toLowerCase();
            var extensions4 = $('#other-photo').val().split('.').pop().toLowerCase();

            if (jQuery.inArray(extensions3, ['gif', 'png', 'jpg', 'mp4', 'mp3', 'jpeg', 'bmp', 'pdf', 'doc', 'ppt', 'docx', 'xlsx', 'xls', 'zip']) == -1) {
                $("#responseSubmitsports").html('Invalid Image File').fadeIn();
                setInterval(function () {
                    $("#responseSubmitsports").fadeOut();
                }, 4000);
                $('#photo').val('');
                return false;
            } else if (jQuery.inArray(extensions4, ['gif', 'png', 'jpg', 'mp4', 'mp3', 'jpeg', 'bmp', 'pdf', 'doc', 'ppt', 'docx', 'xlsx', 'xls', 'zip']) == -1) {
                $("#responseSubmitsports").html('Invalid Image File').fadeIn();
                setInterval(function () {
                    $("#responseSubmitsports").fadeOut();
                }, 4000);
                $('#other-photo').val('');
                return false;
            } else {
                $.ajax({
                    url: 'core/ajax_db/sports_addcategories.php',
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
                        $("#responseSubmitsports").html(response).fadeIn();
                        setInterval(function () {
                            $("#responseSubmitsports").fadeOut();
                        }, 2000);
                        setInterval(function () {
                            location.reload();
                        }, 2400);
                    }, error: function (response) {
                        $("#responseSubmitsports").html(response).fadeIn();
                        setInterval(function () {
                            $("#responseSubmitsports").fadeOut();
                        }, 3000);
                    }
                });
                return false;
            }
        }
    });

    $(document).on('click', '.imageBlogViewPopup', function (e) {
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
