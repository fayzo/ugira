$(document).ready(function () {

    $(document).on('click', '#sale-readmore', function (e) {
        e.stopPropagation();
        var fund_id = $(this).data('fund');

        $.ajax({
            url: 'core/ajax_db/sale_readmore.php',
            method: 'POST',
            dataType: 'text',
            data: {
                fund_id: fund_id,
            }, success: function (response) {
                $(".popupTweet").html(response);
                $(".close-imagePopup").click(function () {
                    $(".fund-popup").hide();
                });
                console.log(response);
            }
        });
    });

    $(document).on('click', '#add_sale', function (e) {
        $('.progress-hidex').hide();
        $('.progress-hidec').hide();
        $('.progress-hidez').hide();
        e.stopPropagation();
        var sale_view = $(this).data('sale');

        $.ajax({
            url: 'core/ajax_db/sale_add.php',
            method: 'POST',
            dataType: 'text',
            data: {
                sale_view: sale_view,
            }, success: function (response) {
                $(".popupTweet").html(response);
                $(".close-imagePopup").click(function () {
                    $(".sale-popup").hide();
                });
                console.log(response);
            }
        });
    });

    $(document).on('click', '#form-sale', function (e) {
        // event.preventDefault();
        e.stopPropagation();
        var title = $('#title');
        var code = $('#code');
        var price = $('#price');
        var phone = $('#phone');
        var country = $('#country');
        var province = $('#province');
        var additioninformation = $('#addition-information');
        var districts = $('#districts');
        var city = $('#city');
        var sector = $('#sector');
        var cell = $('#cell');
        var village = $('#village');
        var photo = $('#photo');
        var other_photo = $('#other-photo');
        var video = $('#video');
        var youtube = $('#youtube');
        var categories_sale = $('#categories_sale');

        if (isEmpty(country) && isEmpty(city) && isEmpty(province) && isEmpty(districts) &&
            isEmpty(sector) && isEmpty(cell) && isEmpty(village) && isEmpty(categories_sale) && 
            isEmpty(additioninformation) && isEmpty(title) && isEmpty(code) && isEmpty(price) && isEmpty(phone) &&
             isEmpty(photo) && isEmpty(other_photo) && isEmpty(video) && isEmpty(youtube)) {
            
            var extensions1 = $('#photo').val().split('.').pop().toLowerCase();
            var extensions2 = $('#other-photo').val().split('.').pop().toLowerCase();
            
            if (jQuery.inArray(extensions1, ['gif', 'png', 'jpg', 'mp4', 'mp3', 'jpeg', 'bmp', 'pdf', 'doc', 'ppt', 'docx', 'xlsx', 'xls', 'zip']) == -1) {
                $("#responseSubmitsale").html('Invalid Image File').fadeIn();
                setInterval(function () {
                    $("#responseSubmitsale").fadeOut();
                }, 4000);
                $('#photo').val('');
                return false;
            } else if (jQuery.inArray(extensions2, ['gif', 'png', 'jpg', 'mp4', 'mp3', 'jpeg', 'bmp', 'pdf', 'doc', 'ppt', 'docx', 'xlsx', 'xls', 'zip']) == -1) {
                $("#responseSubmitsale").html('Invalid Image File').fadeIn();
                setInterval(function () {
                    $("#responseSubmitsale").fadeOut();
                }, 4000);
                $('#other-photo').val('');
                return false;
            } else {
                $.ajax({
                    url: 'core/ajax_db/sale_add.php',
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
                        $("#responseSubmitsale").html(response).fadeIn();
                        setInterval(function () {
                            $("#responseSubmitsale").fadeOut();
                        }, 2000);
                        setInterval(function () {
                            // location.reload();
                        }, 2400);
                    }, error: function (response) {
                        $("#responseSubmitsale").html(response).fadeIn();
                        setInterval(function () {
                            $("#responseSubmitsale").fadeOut();
                        }, 3000);
                    }
                });
                return false;
            }
        }
    });

    $(document).on('click', '.imageSaleViewPopup', function (e) {
        e.stopPropagation();
        var fund_id = $(this).data('fund');
        $.ajax({
            url: 'core/ajax_db/saleImageViewPopup.php',
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
