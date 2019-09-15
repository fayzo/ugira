$(document).ready(function (e) {

    $(document).on('click', '.deleteTweet', function (e) {
        e.preventDefault();
        var tweet_id = $(this).data('tweet');
        var comment_by = $(this).data('user');

        $.ajax({
            url: 'core/ajax_db/deletePost.php',
            method: 'POST',
            dataType: 'text',
            data: {
                deleteTweet: comment_by,
                showpopupdelete: tweet_id,
            }, success: function (response) {
                $(".popupTweet").html(response);
                $(".close-retweet-popup,.cancel-it").click(function () {
                    $(".retweet-popup").hide();
                });
                $(".delete-it").click(function () {
                    $.ajax({
                        url: 'core/ajax_db/deletePost.php',
                        method: 'POST',
                        dataType: 'text',
                        data: {
                            deleteTweetHome: tweet_id,
                        }, success: function (response) {
                            $("#responseDeletePost").html(response);
                            setInterval(function() {
                                $("#responseDeletePost").fadeOut();
                            }, 1000);
                            setInterval(function() {
                                location.reload();
                            }, 1100);
                            console.log(response);
                        }

                    });
                });
                console.log(response);
            }

        });
    });

        $(document).on('click', '.deleteComment', function (e) {
        e.preventDefault();
        var tweet_id = $(this).data('tweet');
        var comment_id = $(this).data('comment');

        $.ajax({
            url: 'core/ajax_db/deleteComment.php',
            method: 'POST',
            dataType: 'text',
            data: {
                tweet_idcommment: tweet_id,
                deletecomment: comment_id,
            }, success: function (response) {
                $("#responseComment").html(response);
                $(".tweet-show-popup-box-cut").click(function () {
                    $(".tweet-show-popup-wrap").hide();
                });
                console.log(response);
            }
        });
    });

    $(document).on('click', '.deleteCommentPost', function (e) {
        e.preventDefault();
        var tweet_id = $(this).data('tweet');
        var comment_by = $(this).data('user');

        $.ajax({
            url: 'core/ajax_db/deleteCommentPost.php',
            method: 'POST',
            dataType: 'text',
            data: {
                deleteTweet: comment_by,
                showpopupdelete: tweet_id,
            }, success: function (response) {
                $(".popupTweet").html(response);
                $(".close-retweet-popup,.cancel-its").click(function () {
                    $(".retweet-popup").hide();
                });
                $(".delete-its").click(function () {
                    $.ajax({
                        url: 'core/ajax_db/deleteCommentPost.php',
                        method: 'POST',
                        dataType: 'text',
                        data: {
                            deleteTweetHome: tweet_id,
                        }, success: function (response) {
                            $("#responseDeletePost").html(response);
                            setInterval(function() {
                                $("#responseDeletePost").fadeOut();
                            }, 1000);
                            setInterval(function() {
                                location.reload();
                            }, 1100);
                            console.log(response);
                        }

                    });
                });
                console.log(response);
            }

        });
    });
   
});
