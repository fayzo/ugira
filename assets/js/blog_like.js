$(document).ready(function () {
    
    $(document).on('click', '#blog_Comment', function () {
        var comment = $('#commentField').val();
        var blog_id = $('#commentField').data('blog');

        if (comment != "") {
            $.ajax({
                url: 'core/ajax_db/blog_comment.php',
                method: 'POST',
                dataType: 'text',
                data: {
                    comments: comment,
                    blog_id: blog_id,
                }, success: function (response) {
                    $('#comments').html(response);
                    $('#commentField').val("");
                    console.log(response);
                }
            });
        }

    });

    $(document).on('click', '.deleteblog', function (e) {
        e.preventDefault();
        var blog_id = $(this).data('blog');
        var user_id = $(this).data('user');

        $.ajax({
            url: 'core/ajax_db/Blog_delete.php',
            method: 'POST',
            dataType: 'text',
            data: {
                deleteBlog: user_id,
                showpopupdelete: blog_id,
            }, success: function (response) {
                $(".popupTweet").html(response);
                $(".close-retweet-popup,.cancel-it").click(function () {
                    $(".blog-popup").hide();
                });
                $(".delete-it-blog").click(function () {
                    $.ajax({
                        url: 'core/ajax_db/Blog_delete.php',
                        method: 'POST',
                        dataType: 'text',
                        data: {
                            deleteTweetHome: blog_id,
                        }, success: function (response) {
                            $("#responseDeletePost").html(response);
                            setInterval(function () {
                                $("#responseDeletePost").fadeOut();
                            }, 1000);
                            setInterval(function () {
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

    $(document).on('click', '.deleteblogComment', function (e) {
        e.preventDefault();
        var blog_id = $(this).data('blog');
        var comment_id = $(this).data('comment');

        $.ajax({
            url: 'core/ajax_db/blog_comment.php',
            method: 'POST',
            dataType: 'text',
            data: {
                blog_id: blog_id,
                deletecomment_id: comment_id,
            }, success: function (response) {
                $("#responseComment").html(response);
                $("#userComment" + comment_id).html('');
                setInterval(function () {
                    $("#responseComment").fadeOut();
                }, 1000);
                console.log(response);
            }
        });
    });

    $(document).on('click', '.like-blog-btn', function () {
        var blog_id = $(this).data('blog');
        var user_id = $(this).data('user');
        var likescounter = $(this).find('.likescounter');
        var counter = likescounter.text();
        var button = $(this);

        $.ajax({
            url: 'core/ajax_db/blog_like.php',
            method: 'POST',
            dataType: 'text',
            data: {
                like: blog_id,
                user_id: user_id,
            }, success: function (response) {
                likescounter.show();
                button.addClass('unlike-blog-btn');
                button.removeClass('like-blog-btn');
                counter++;
                likescounter.text(counter++);
                button.find('.fa-heart-o').addClass('fa-heart').css('color', 'black');
                button.find('.fa-heart').removeClass('fa-heart-o');
               
                // location.reload();

                console.log(response);
            }
        });
    });
});


$(document).ready(function () {
    $(document).on('click', '.unlike-blog-btn', function () {
        var blog_id = $(this).data('blog');
        var user_id = $(this).data('user');
        var likescounter = $(this).find('.likescounter');
        var counter = likescounter.text();
        var button = $(this);

        $.ajax({
            url: 'core/ajax_db/blog_like.php',
            method: 'POST',
            dataType: 'text',
            data: {
                unlike: blog_id,
                user_id: user_id,
            }, success: function (response) {
                likescounter.show();
                button.addClass('like-blog-btn');
                button.removeClass('unlike-blog-btn');
                counter--;
                if (counter === 0) {
                    likescounter.hide();
                } else {
                    likescounter.text(counter--);
                }
                button.find('.fa-heart').addClass('fa-heart-o');
                button.find('.fa-heart-o').removeClass('fa-heart');


                console.log(response);
            }
        });
    });
});

$(document).ready(function () {
    $(document).on('click', '.like-blogUser-btn', function () {
        var comment_id = $(this).data('comment');
        var user_id = $(this).data('user');
        var likescounter = $(this).find('.likescounter');
        var counter = likescounter.text();
        var button = $(this);

        $.ajax({
            url: 'core/ajax_db/blogUserComment_like.php',
            method: 'POST',
            dataType: 'text',
            data: {
                like: comment_id,
                user_id: user_id,
            }, success: function (response) {
                likescounter.show();
                button.addClass('unlike-blogUser-btn');
                button.removeClass('like-blogUser-btn');
                counter++;
                likescounter.text(counter++);
                button.find('.fa-heart-o').addClass('fa-heart').css('color', 'black');
                button.find('.fa-heart').removeClass('fa-heart-o');
               
                // location.reload();

                console.log(response);
            }
        });
    });
});


$(document).ready(function () {
    $(document).on('click', '.unlike-blogUser-btn', function () {
        var comment_id = $(this).data('comment');
        var user_id = $(this).data('user');
        var likescounter = $(this).find('.likescounter');
        var counter = likescounter.text();
        var button = $(this);

        $.ajax({
            url: 'core/ajax_db/blogUserComment_like.php',
            method: 'POST',
            dataType: 'text',
            data: {
                unlike: comment_id,
                user_id: user_id,
            }, success: function (response) {
                likescounter.show();
                button.addClass('like-blogUser-btn');
                button.removeClass('unlike-blogUser-btn');
                counter--;
                if (counter === 0) {
                    likescounter.hide();
                } else {
                    likescounter.text(counter--);
                }
                button.find('.fa-heart').addClass('fa-heart-o');
                button.find('.fa-heart-o').removeClass('fa-heart');


                console.log(response);
            }
        });
    });
});