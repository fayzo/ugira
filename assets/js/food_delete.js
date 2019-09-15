$(document).ready(function () {

    $(document).on('click', '.deletefood', function (e) {
        e.preventDefault();
        var food_id = $(this).data('food');
        var user_id = $(this).data('user');

        $.ajax({
            url: 'core/ajax_db/food_delete.php',
            method: 'POST',
            dataType: 'text',
            data: {
                deleteEvents: user_id,
                showpopupdelete: food_id,
            }, success: function (response) {
                $(".popupTweet").html(response);
                $(".close-retweet-popup,.cancel-it").click(function () {
                    $(".food-popup").hide();
                });
                $(".delete-it-food").click(function () {
                    $.ajax({
                        url: 'core/ajax_db/food_delete.php',
                        method: 'POST',
                        dataType: 'text',
                        data: {
                            deleteTweetHome: food_id,
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

    $(document).on('click', '.update-food-btn', function (e) {
        e.preventDefault();
        var food_id = $(this).data('food');
        var user_id = $(this).data('user');
        var discount_change = $('#discount_change' + food_id).val();
        var discount_price = $('#discount_price' + food_id).val();
        var price = $('#price' + food_id).val();
        var banner = $('#banner' + food_id).val();

            $.ajax({
                url: 'core/ajax_db/food_delete.php',
                method: 'POST',
                dataType: 'text',
                data: {
                    food_id: food_id,
                    user_id: user_id,
                    discount_change: discount_change,
                    discount_price: discount_price,
                    price: price,
                    banner: banner,
                    
                }, success: function (response) {
                    $("#response"+ food_id).html(response);
                    setInterval(function () {
                        $("#response"+ food_id).fadeOut();
                    }, 1000);
                    setInterval(function () {
                        location.reload();
                    }, 1200);
                    console.log(response);
                }

            });
        });

});