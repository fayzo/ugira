$(document).ready(function () {

    $(document).on('click', '#Apply', function (e) {
        e.stopPropagation();
        var job_id = $(this).data('applyjob');
        var business_id = $(this).data('business');
        $.ajax({
            url: 'core/ajax_db/businessApplyJobs.php',
            method: 'POST',
            dataType: 'text',
            data: {
                apply_id: job_id,
                business_id: business_id,
            }, success: function (response) {
                $(".popupTweet").html(response);
                $(".close-imagePopup").click(function () {
                    $(".apply-popup").hide();
                });
                console.log(response);
            }
        });
    });

    $(document).on('click', '#form-cv', function (e) {
        // event.preventDefault();
        e.stopPropagation();
        // var job_id = $(this).data('job');
        // var business_id = $(this).data('business');
        // var user_id = $(this).data('user');
        var firstname = $('#first-name');
        var middlename = $('#middle-name');
        var lastnam = $('#last-name');
        var email = $('#email');
        var telephone = $('#telephone');
        var degree = $('#degree');
        var field = $('#field');
        var additioninformation = $('#addition-information');
        var deadline = $('#deadline');
        var uploadcv = $('#upload-cv');
        var uploadcertificates = $('#upload-certificates');

        var extensions = $('#upload-cv').val().split('.').pop().toLowerCase();
        var extensions0 = $('#upload-certificates').val().split('.').pop().toLowerCase();

        if (isEmpty(firstname) && isEmpty(middlename) && isEmpty(lastnam) && isEmpty(email) && 
        isEmpty(telephone) && isEmpty(additioninformation) && isEmpty(degree) && isEmpty(field) && 
        isEmpty(deadline) && isEmpty(uploadcv) && isEmpty(uploadcertificates)) {

            if (jQuery.inArray(extensions, ['gif', 'png', 'jpg', 'mp4', 'mp3', 'jpeg', 'bmp', 'pdf', 'doc', 'ppt', 'docx', 'xlsx', 'xls', 'zip']) == -1) {
            $("#responseSubmit").html('Invalid Image File').fadeIn();
            setInterval(function () {
                $("#responseSubmit").fadeOut();
            }, 4000);
            $('#upload-cv').val('');
            return false;
        }else if (jQuery.inArray(extensions0, ['gif', 'png', 'jpg', 'mp4', 'mp3', 'jpeg', 'bmp', 'pdf', 'doc', 'ppt' ,'docx', 'xlsx','xls','zip']) == -1) {
            $("#responseSubmit").html('Invalid Image File').fadeIn();
            setInterval(function () {
                $("#responseSubmit").fadeOut();
            }, 4000);
            $('#upload-certificates').val('');
            return false;
        } else {
            $.ajax({
                url: 'core/ajax_db/businessApplyJobs.php',
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
                        $('#prox').css('width', progress + '%');
                        $('#proc').css('width', progress + '%');
                        $('#prox').html(progress + '%');
                        $('#proc').html(progress + '%');
                    });

                    xhr.addEventListener('load', function (e) {
                        $('.progress-bar').removeClass('bg-info').addClass('bg-success').html('<span>upload completed  <span class="fa fa-check"></span></span>');
                    });
                    return xhr;
                },
                success: function (response) {
                    $("#responseSubmit").html(response).fadeIn();
                    setInterval(function () {
                      $("#responseSubmit").fadeOut();
                    }, 2000);
                    setInterval(function () {
                        // location.reload();
                    }, 2400);
                }, error: function (response) {
                     $("#responseSubmit").html(response).fadeIn();
                    setInterval(function () {
                     $("#responseSubmit").fadeOut();
                    }, 3000);
                }
            });
            return false;
          }
        }
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
