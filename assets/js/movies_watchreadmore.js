$(document).ready(function () {

    $(document).on('click', '#add_movies', function (e) {
        $('.progress-hidex').hide();
        $('.progress-hidec').hide();
        $('.progress-hidez').hide();
        e.stopPropagation();
        var movies_view = $(this).data('movies');

        $.ajax({
            url: 'core/ajax_db/movies_addcategories.php',
            method: 'POST',
            dataType: 'text',
            data: {
                movies_view: movies_view,
            }, success: function (response) {
                $(".popupTweet").html(response);
                $(".close-imagePopup").click(function () {
                    $(".movies-popup").hide();
                });
                console.log(response);
            }
        });
    });

     $(document).on('click', '#movies_watchvideo', function (e) {
        e.stopPropagation();
        var movies_id = $(this).data('movies');

        $.ajax({
            url: 'core/ajax_db/movies_watchvideo.php',
            method: 'POST',
            dataType: 'text',
            data: {
                movies_id: movies_id,
            }, success: function (response) {
                $(".popupTweet").html(response);
                $(".close-imagePopup").click(function () {
                    $(".movies-popup").hide();
                });
                console.log(response);
            }
        });
    });

    $(document).on('click', '#form-movies', function (e) {
        // event.preventDefault();
        e.stopPropagation();
        var title_movies = $('#title_movies');
        var director = $('#director');
        var actors = $('#actors');
        var country = $('#country');
        var latest_movies = $('#latest_movies');
        var date_release = $('#date_release');
        var duration = $('#duration');
        var additioninformation = $('#addition-information');
        var categories_movies = $('#categories_movies');
        var photo = $('#photo');
        var youtube = $('#youtube');
        var video = $('#video');

        
        if (isEmpty(title_movies) && isEmpty(director) && isEmpty(latest_movies) && isEmpty(categories_movies) && 
        isEmpty(actors) && isEmpty(country) && isEmpty(date_release) && isEmpty(duration) && isEmpty(additioninformation) && isEmpty(photo) &&
        isEmpty(video) && isEmpty(youtube)) {
            
            var extensions3 = $('#photo').val().split('.').pop().toLowerCase();
            // var extensions4 = $('#video').val().split('.').pop().toLowerCase();

            if (jQuery.inArray(extensions3, ['png', 'jpg', 'mp4', 'mp3', 'jpeg']) == -1) {
                $("#responseSubmitmovies").html('Invalid Image File').fadeIn();
                setInterval(function () {
                    $("#responseSubmitmovies").fadeOut();
                }, 4000);
                $('#photo').val('');
                return false;
            // } 
            // else if (jQuery.inArray(extensions4, ['gif','mp4']) == -1) {
            //     $("#responseSubmitmovies").html('Invalid Image File').fadeIn();
            //     setInterval(function () {
            //         $("#responseSubmitmovies").fadeOut();
            //     }, 4000);
            //     $('#video').val('');
            //     return false;
            } else {
                $.ajax({
                    url: 'core/ajax_db/movies_addcategories.php',
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
                        $("#responseSubmitmovies").html(response).fadeIn();
                        setInterval(function () {
                            $("#responseSubmitmovies").fadeOut();
                        }, 2000);
                        setInterval(function () {
                            location.reload();
                        }, 2400);
                    }, error: function (response) {
                        $("#responseSubmitmovies").html(response).fadeIn();
                        setInterval(function () {
                            $("#responseSubmitmovies").fadeOut();
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

