$(document).ready(function () {

    $(document).on('click', '#rwandaLandscapes-readmore', function (e) {
        e.stopPropagation();
        var Landscapes_id = $(this).data('landscapes');

        $.ajax({
            url: 'core/ajax_db/rwandaLandscapes_readmore.php',
            method: 'POST', 
            dataType: 'text',
            data: {
                Landscapes_id: Landscapes_id,
            }, success: function (response) {
                $(".popupTweet").html(response);
                $(".close-imagePopup").click(function () {
                    $(".Landscapes-popup").hide();
                });
                console.log(response);
            }
        });
    });

    $(document).on('click', '#add_rwandalandscapes', function (e) {
        $('.progress-hidex').hide();
        $('.progress-hidec').hide();
        $('.progress-hidez').hide();
        // $('.status').removeClass().addClass('status-remove');
        $('#provincecode').attr('id', 'count-remove1');
        $('#districtcode').attr('id', 'count-remove2');
        $('#sectorcode').attr('id', 'count-remove3');
        $('#codecell').attr('id', 'count-remove4');
        $('#CodeVillage').attr('id', 'count-remove5');

        e.stopPropagation();
        var landscapes_view = $(this).data('rwandalandscapes');

        $.ajax({
            url: 'core/ajax_db/rwanda_landscapes_add.php',
            method: 'POST',
            dataType: 'text',
            data: {
                landscapes_view: landscapes_view,
            }, success: function (response) {
                $(".popupTweet").html(response);
                $(".close-imagePopup").click(function () {
                    $(".landscapes-popup").hide();
                        $('#count-remove1').attr('id', 'provincecode');
                        $('#count-remove2').attr('id', 'districtcode');
                        $('#count-remove3').attr('id', 'sectorcode');
                        $('#count-remove4').attr('id', 'codecell');
                        $('#count-remove5').attr('id', 'CodeVillage');
                });
                console.log(response);
            }
        });
    });

    $(document).on('click', '#form-landscapes', function (e) {
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
        var categories_of_landscapes = $('#categories_of_landscapes');
        var location_province = $('#location_province');
        // var location_districts = $('#location_districts');
        // var location_Sector = $('#location_sectors');
        // var location_cell = $('#location_cell');
        // var location_village = $('#location_village');
        var location_province = $('.provincecode');
        var location_districts = $('.districtcode');
        var location_Sector = $('.sectorcode');
        var location_cell = $('.codecell');
        var location_village = $('.CodeVillage');
        
        if (isEmpty(country) && isEmpty(location_province) &&isEmpty(location_districts) && 
            isEmpty(location_Sector) && isEmpty(location_cell) && isEmpty(location_village) &&
            isEmpty(categories_of_landscapes) && isEmpty(additioninformation) && isEmpty(title) && isEmpty(author) && 
            isEmpty(phone) && isEmpty(photo) && isEmpty(other_photo) && isEmpty(video) && isEmpty(youtube)) {
            
            var extensions1 = $('#photo').val().split('.').pop().toLowerCase();
            var extensions2 = $('#other-photo').val().split('.').pop().toLowerCase();
            
            if (jQuery.inArray(extensions1, ['gif', 'png', 'jpg', 'mp4', 'mp3', 'jpeg', 'bmp', 'pdf', 'doc', 'ppt', 'docx', 'xlsx', 'xls', 'zip']) == -1) {
                $("#responseSubmitlandscapes").html('Invalid Image File').fadeIn();
                setInterval(function () {
                    $("#responseSubmitlandscapes").fadeOut();
                }, 4000);
                $('#photo').val('');
                return false;
            } else if (jQuery.inArray(extensions2, ['gif', 'png', 'jpg', 'mp4', 'mp3', 'jpeg', 'bmp', 'pdf', 'doc', 'ppt', 'docx', 'xlsx', 'xls', 'zip']) == -1) {
                $("#responseSubmitlandscapes").html('Invalid Image File').fadeIn();
                setInterval(function () {
                    $("#responseSubmitlandscapes").fadeOut();
                }, 4000);
                $('#other-photo').val('');
                return false;
            } else {
                $.ajax({
                    url: 'core/ajax_db/rwanda_landscapes_add.php',
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
                        $("#responseSubmitlandscapes").html(response).fadeIn();
                        setInterval(function () {
                            $("#responseSubmitlandscapes").fadeOut();
                        }, 2000);
                        setInterval(function () {
                            // location.reload();
                        }, 2400);
                    }, error: function (response) {
                        $("#responseSubmitlandscapes").html(response).fadeIn();
                        setInterval(function () {
                            $("#responseSubmitlandscapes").fadeOut();
                        }, 3000);
                    }
                });
                return false;
            }
        }
    });

    $(document).on('click', '#districts-readmore', function (e) {
        e.stopPropagation();
        var districts = $(this).data('districts');

        $.ajax({
            url: 'core/ajax_db/landscapes_search.php',
            method: 'POST',
            dataType: 'text',
            data: {
                districts: districts,
                pages: '1',
            }, success: function (response) {
                $(".districts").html(response);
                console.log(response);
            }
        });
    });

    $(document).on('click', '#sector-readmore', function (e) {
        e.stopPropagation();
        var sector = $(this).data('sector');

        $.ajax({
            url: 'core/ajax_db/landscapes_search.php',
            method: 'POST',
            dataType: 'text',
            data: {
                sector: sector,
                pages: '1',
            }, success: function (response) {
                $(".districts").html(response);
                console.log(response);
            }
        });
    });

    $(document).on('click', '#cell-readmore', function (e) {
        e.stopPropagation();
        var cell = $(this).data('cell');

        $.ajax({
            url: 'core/ajax_db/landscapes_search.php',
            method: 'POST',
            dataType: 'text',
            data: {
                cell: cell,
                pages: '1',
            }, success: function (response) {
                $(".districts").html(response);
                console.log(response);
            }
        });
    });
    
    $(document).on('click', '#kigali-districts-readmore', function (e) {
        e.stopPropagation();
        var province = $(this).data('province');

        $.ajax({
            url: 'core/ajax_db/landscapes_search.php',
            method: 'POST',
            dataType: 'text',
            data: {
                province: province,
                pages: '1',
            }, success: function (response) {
                $(".districts").html(response);
                console.log(response);
            }
        });
    });

    $(document).on('click', '#province-readmore', function (e) {
        e.stopPropagation();
        var province = $(this).data('province');

        $.ajax({
            url: 'core/ajax_db/rwandalandscapes_province.php',
            method: 'POST',
            dataType: 'text',
            data: {
                province: province,
                pages: '1',
            }, success: function (response) {
                $(".province-districts").html(response);
                console.log(response);
            }
        });
    });

    $(document).on('click', '#province-districts-readmore', function (e) {
        e.stopPropagation();
        var districts = $(this).data('districts');

        $.ajax({
            url: 'core/ajax_db/rwandalandscapes_province.php',
            method: 'POST',
            dataType: 'text',
            data: {
                districts: districts,
                pages: '1',
            }, success: function (response) {
                $(".province-districts").html(response);
                console.log(response);
            }
        });
    });

    $(document).on('click', '#province-sector-readmore', function (e) {
        e.stopPropagation();
        var sector = $(this).data('sector');

        $.ajax({
            url: 'core/ajax_db/rwandalandscapes_province.php',
            method: 'POST',
            dataType: 'text',
            data: {
                sector: sector,
                pages: '1',
            }, success: function (response) {
                $(".province-districts").html(response);
                console.log(response);
            }
        });
    });

    $(document).on('click', '#province-cell-readmore', function (e) {
        e.stopPropagation();
        var cell = $(this).data('cell');

        $.ajax({
            url: 'core/ajax_db/rwandalandscapes_province.php',
            method: 'POST',
            dataType: 'text',
            data: {
                cell: cell,
                pages: '1',
            }, success: function (response) {
                $(".province-districts").html(response);
                console.log(response);
            }
        });
    });

    $(document).on('click', '#village-readmore', function (e) {
        e.stopPropagation();
        var village_id = $(this).data('village');

        $.ajax({
            url: 'core/ajax_db/landscapes_search.php',
            method: 'POST',
            dataType: 'text',
            data: {
                village_id: village_id,
            }, success: function (response) {
                $(".popupTweet").html(response);
                $(".close-imagePopup").click(function () {
                    $(".landscapes-popup").hide();
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
