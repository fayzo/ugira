$(document).ready(function () {

    $(document).on('click', '#hotel-readmore', function (e) {
        e.stopPropagation();
        var hotel_id = $(this).data('hotel');

        $.ajax({
            url: 'core/ajax_db/hotel_readmore.php',
            method: 'POST',
            dataType: 'text',
            data: {
                hotel_id: hotel_id,
            }, success: function (response) {
                $(".popupTweet").html(response);
                $(".close-imagePopup").click(function () {
                    $(".hotel-popup").hide();
                });
                console.log(response);
            }
        });
    });

    $(document).on('click', '#add_hotel', function (e) {
        $('.progress-hidex').hide();
        $('.progress-hidec').hide();
        $('.progress-hidez').hide();
        e.stopPropagation();
        var hotel_view = $(this).data('hotel');

        $.ajax({
            url: 'core/ajax_db/hotel_addcategories.php',
            method: 'POST',
            dataType: 'text',
            data: {
                hotel_view: hotel_view,
            }, success: function (response) {
                $(".popupTweet").html(response);
                $(".close-imagePopup").click(function () {
                    $(".hotel-popup").hide();
                });
                console.log(response);
            }
        });
    });

    $(document).on('click', '#form-hotel', function (e) {
        // event.preventDefault();
        e.stopPropagation();
        var title = $('#title');
        var author = $('#author');
        var phone = $('#phone');
        var country = $('#country');
        var additioninformation = $('#addition-information');
        var photo = $('#photo');
        var other_photo = $('#other-photo');
        var video = $('#video');
        var youtube = $('#youtube');
        var range = $('#range');
        var price = $('#price');
        var location_province = $('#location_province');
        var location_districts = $('#location_districts');
        var location_Sector = $('#location_sectors');
        var location_cell = $('#location_cell');
        var location_village = $('#location_village');

        if (isEmpty(country) && isEmpty(location_province) && isEmpty(location_districts) &&
            isEmpty(location_Sector) && isEmpty(location_cell) && isEmpty(location_village) &&
            isEmpty(title) && isEmpty(additioninformation) && isEmpty(author) && isEmpty(phone) && 
            isEmpty(price) && isEmpty(range) &&  isEmpty(photo) && isEmpty(other_photo) && isEmpty(video) && isEmpty(youtube)) {

            var extensions1 = $('#photo').val().split('.').pop().toLowerCase();
            var extensions2 = $('#other-photo').val().split('.').pop().toLowerCase();

            if (jQuery.inArray(extensions1, ['gif', 'png', 'jpg', 'mp4', 'mp3', 'jpeg', 'bmp', 'pdf', 'doc', 'ppt', 'docx', 'xlsx', 'xls', 'zip']) == -1) {
                $("#responseSubmithotel").html('Invalid Image File').fadeIn();
                setInterval(function () {
                    $("#responseSubmithotel").fadeOut();
                }, 4000);
                $('#photo').val('');
                return false;
            } else if (jQuery.inArray(extensions2, ['gif', 'png', 'jpg', 'mp4', 'mp3', 'jpeg', 'bmp', 'pdf', 'doc', 'ppt', 'docx', 'xlsx', 'xls', 'zip']) == -1) {
                $("#responseSubmithotel").html('Invalid Image File').fadeIn();
                setInterval(function () {
                    $("#responseSubmithotel").fadeOut();
                }, 4000);
                $('#other-photo').val('');
                return false;
            } else {
                $.ajax({
                    url: 'core/ajax_db/hotel_addcategories.php',
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
                        $("#responseSubmithotel").html(response).fadeIn();
                        setInterval(function () {
                            $("#responseSubmithotel").fadeOut();
                        }, 2000);
                        setInterval(function () {
                            // location.reload();
                        }, 2400);
                    }, error: function (response) {
                        $("#responseSubmithotel").html(response).fadeIn();
                        setInterval(function () {
                            $("#responseSubmithotel").fadeOut();
                        }, 3000);
                    }
                });
                return false;
            }
        }
    });

    $(document).on('keyup', '.searchHotel', function () {
        if ($(this).val() != "") {
            $('#productContainer').hide();
        } else {
            $('#productContainer').show();
        }
        var searching = $(this).val();
        $.ajax({
            url: 'core/ajax_db/hotel_add.php',
            method: 'POST',
            dataType: 'text',
            data: {
                search: searching,
            }, success: function (response) {
                $(".hotel-show").html(response);
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
