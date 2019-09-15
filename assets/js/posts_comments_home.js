$(document).ready(function () {

    $(document).on('click','#post_HomeComment',function () {
        var comment = $('#commentHome').val();
        var tweet_id = $('#commentHome').data('tweet');

        if (comment != "") {
              $.ajax({
                    url: 'core/ajax_db/posts_comments.php',
                    method: 'POST',
                    dataType: 'text',
                    data: {
                        comments: comment,
                        tweet_id: tweet_id,
                    }, success: function (response) {
                        $('#commentsHome').html(response);
                        $('#commentHome').val("");
                        console.log(response);
                    }
                });
        }

    });
});
function myFunction() {
    $("input[id^='commentHome']").attr('id', '');
    $("span[id^='commentsHome']").attr('id', '');
}

function keyupFunction() {
   $('.form-control').on('keyup',function(){
       $(this).attr('id', 'commentHome');
       $('.commentsHome').attr('id', 'commentsHome');
    });
}
