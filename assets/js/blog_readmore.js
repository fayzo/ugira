$(document).ready(function () {

    $(document).on('click', '#add_blog', function (e) {
        $('.progress-hidex').hide();
        $('.progress-hidec').hide();
        $('.progress-hidez').hide();
        e.stopPropagation();
        var blog_view = $(this).data('blog');

        $.ajax({
            url: 'core/ajax_db/blog_addcategories.php',
            method: 'POST',
            dataType: 'text',
            data: {
                blog_view: blog_view,
             }, success: function (response) {
                $(".popupTweet").html(response);
                $(".close-imagePopup").click(function () {
                    $(".blog-popup").hide();
                });
                console.log(response);
            }
        });
    });

    $(document).on('click', '#blog-readmore', function (e) {
        e.stopPropagation();
        var blog_id = $(this).data('blog');

        $.ajax({
            url: 'core/ajax_db/blog_readmore.php',
            method: 'POST',
            dataType: 'text',
            data: {
                blog_id: blog_id,
                username: 'jojo',
            }, success: function (response) {
                $(".popupTweet").html(response);
                $(".close-imagePopup").click(function () {
                    $(".blog-popup").hide();
                });
                console.log(response);
            }
        });
    });

    $(document).on('click', '#form-blog', function (e) {
        // event.preventDefault();
        e.stopPropagation();
        var title = $('#title');
        var authors = $('#authors');
        var additioninformation = $('#addition-information');
        var photo = $('#photo');
        var other_photo = $('#other-photo');
        var video = $('#video');
        var youtube = $('#youtube');
        var categories_blog = $('#categories_blog');
        var photo_Titleo0 = $('#photo-Titleo0');
        var photo_Title0 = $('#photo-Title0');
        var photo_Title1 = $('#photo-Title1');
        var photo_Title2 = $('#photo-Title2');
        var photo_Title3 = $('#photo-Title3');
        var photo_Title4 = $('#photo-Title4');
        var photo_Title5 = $('#photo-Title5');

        
        if (isEmpty(title) && isEmpty(authors) && isEmpty(categories_blog) && isEmpty(additioninformation) &&
            isEmpty(photo) && isEmpty(other_photo) && isEmpty(video) && isEmpty(youtube) && isEmpty(photo_Titleo0) && isEmpty(photo_Title0) && isEmpty(photo_Title1) && isEmpty(photo_Title2) &&
            isEmpty(photo_Title3) && isEmpty(photo_Title4) && isEmpty(photo_Title5)) {
            
            var extensions3 = $('#photo').val().split('.').pop().toLowerCase();
            var extensions4 = $('#other-photo').val().split('.').pop().toLowerCase();

            if (jQuery.inArray(extensions3, ['gif', 'png', 'jpg', 'mp4', 'mp3', 'jpeg', 'bmp', 'pdf', 'doc', 'ppt', 'docx', 'xlsx', 'xls', 'zip']) == -1) {
                $("#responseSubmitblog").html('Invalid Image File').fadeIn();
                setInterval(function () {
                    $("#responseSubmitblog").fadeOut();
                }, 4000);
                $('#photo').val('');
                return false;
            } else if (jQuery.inArray(extensions4, ['gif', 'png', 'jpg', 'mp4', 'mp3', 'jpeg', 'bmp', 'pdf', 'doc', 'ppt', 'docx', 'xlsx', 'xls', 'zip']) == -1) {
                $("#responseSubmitblog").html('Invalid Image File').fadeIn();
                setInterval(function () {
                    $("#responseSubmitblog").fadeOut();
                }, 4000);
                $('#other-photo').val('');
                return false;
            } else {
                $.ajax({
                    url: 'core/ajax_db/blog_addcategories.php',
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
                        $("#responseSubmitblog").html(response).fadeIn();
                        setInterval(function () {
                            $("#responseSubmitblog").fadeOut();
                        }, 2000);
                        setInterval(function () {
                            location.reload();
                        }, 2400);
                    }, error: function (response) {
                        $("#responseSubmitblog").html(response).fadeIn();
                        setInterval(function () {
                            $("#responseSubmitblog").fadeOut();
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


    $(document).on('click', '.blog-retweet0', function () {
        $blog_id = $(this).data('blog');
        $tweet_blog_by = $(this).data('user');
        $counter = $(this).find('.retweetcounter');
        $count = $counter.text();
        $button = $(this);

        $.ajax({
            url: 'core/ajax_db/blog_share.php',
            method: 'POST',
            dataType: 'text',
            data: {
                showpopretweet_blog_id: $blog_id,
                tweet_blog_By: $tweet_blog_by,
            }, success: function (response) {
                $('.popupTweet').html(response);
                $('.close-retweet-popup').click(function () {
                    $('.blog-share-popup').hide();
                });

                console.log(response);
            }
        });
    });

    $(document).on('click', '.blog-retweet-it', function () {
        $comment = $('.retweetMsg').val();

        $.ajax({
            url: 'core/ajax_db/blog_share.php',
            method: 'POST',
            dataType: 'text',
            data: {
                retweet: $blog_id,
                tweet_By: $tweet_blog_by,
                comments: $comment
            }, success: function (response) {
                $('.blog-share-popup').hide();
                $count++;
                $counter.text($count++);
                $button.removeClass('.blog-retweet0').addClass('.blog-retweeted0');

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
