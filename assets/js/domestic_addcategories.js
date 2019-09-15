$(document).ready(function () {

    $(document).on('click', '#helper-family', function (e) {
        e.stopPropagation();

        $.ajax({
            url: 'core/ajax_db/domestic_addcategories.php',
            method: 'POST',
            dataType: 'text',
            data: {
                helper_family: 'helper-family',
            }, success: function (response) {
                $(".domestic-forms").html(response);
                console.log(response);
                $(".tweet-show-popup-wrap").hide();

            }
        });
    });

    $(document).on('click', '#job-helper', function (e) {
        e.stopPropagation();

        $.ajax({
            url: 'core/ajax_db/domestic_addcategories.php',
            method: 'POST',
            dataType: 'text',
            data: {
                job_helper: 'job-helper',
            }, success: function (response) {
                $(".domestic-forms").html(response);
                $(".tweet-show-popup-wrap").hide();

                console.log(response);
            }
        });
    });

    $(document).on('click', '#domestics', function (e) {
        e.stopPropagation();
        var domestics = $(this).data('domestics');
        $.ajax({
            url: 'core/ajax_db/domestic_addcategories.php',
            method: 'POST',
            dataType: 'text',
            data: {
                domestics: domestics,
            }, success: function (response) {
                $(".domestic-forms").html(response);
                console.log(response);
            }
        });
    });

    $(document).on('click', '.loginTermsCondition', function (e) {
        e.stopPropagation();
        $.ajax({
            url: 'core/ajax_db/domestic_addcategories.php',
            method: 'POST',
            dataType: 'text',
            data: {
                loginTermsCondition: 'loginTermsCondition',
            }, success: function (response) {
                $(".domestic-forms").html(response);
                $(".tweet-show-popup-wrap").hide();
                console.log(response);
            }
        });
    });

    $(document).on('click', '.loginTermsCondition0', function (e) {
        e.stopPropagation();
        $.ajax({
            url: 'core/ajax_db/domestic_addcategories.php',
            method: 'POST',
            dataType: 'text',
            data: {
                loginTermsCondition0: 'loginTermsCondition0',
            }, success: function (response) {
                $(".domestic-forms").html(response);
                $(".tweet-show-popup-wrap").hide();
                console.log(response);
            }
        });
    });

    $(document).on('click', '.TermsCondition', function (e) {
        e.stopPropagation();
        $.ajax({
            url: 'core/ajax_db/domestic_addcategories.php',
            method: 'POST',
            dataType: 'text',
            data: {
                TermsCondition: 'TermsCondition',
            }, success: function (response) {
                $(".popupTweet").html(response);
                $(".tweet-show-popup-box-cut").click(function () {
                    $(".tweet-show-popup-wrap").hide();
                });
                console.log(response);
            }
        });
    });

    $(document).on('click', '.TermsConditions', function (e) {
        e.stopPropagation();
        $.ajax({
            url: 'core/ajax_db/domestic_addcategories.php',
            method: 'POST',
            dataType: 'text',
            data: {
                TermsCondition0: 'TermsCondition0',
            }, success: function (response) {
                $(".popupTweet").html(response);
                $(".tweet-show-popup-box-cut").click(function () {
                    $(".tweet-show-popup-wrap").hide();
                });
                console.log(response);
            }
        });
    });

    $(document).on('click', '.loginTerms', function (e) {
        e.stopPropagation();
        $.ajax({
            url: 'core/ajax_db/domestic_addcategories.php',
            method: 'POST',
            dataType: 'text',
            data: {
                loginTerms: 'loginTerms',
            }, success: function (response) {
                $(".popupTweet").html(response);
                $(".tweet-show-popup-box-cut").click(function () {
                    $(".tweet-show-popup-wrap").hide();
                });
                console.log(response);
            }
        });
    });

    $(document).on('click', '.loginTerms0', function (e) {
        e.stopPropagation();
        $.ajax({
            url: 'core/ajax_db/domestic_addcategories.php',
            method: 'POST',
            dataType: 'text',
            data: {
                loginTerms0: 'loginTerms0',
            }, success: function (response) {
                $(".popupTweet").html(response);
                $(".tweet-show-popup-box-cut").click(function () {
                    $(".tweet-show-popup-wrap").hide();
                });
                console.log(response);
            }
        });
    });

    $(document).on('click', '#job-helper-readmore', function (e) {
        e.stopPropagation();
        var blog_id = $(this).data('blog');

        $.ajax({
            url: 'core/ajax_db/blog_readmore.php',
            method: 'POST',
            dataType: 'text',
            data: {
                blog_id: blog_id,
            }, success: function (response) {
                $(".popupTweet").html(response);
                $(".close-imagePopup").click(function () {
                    $(".blog-popup").hide();
                });
                console.log(response);
            }
        });
    });

    $(document).on('click', '#form-domestics', function (e) {
        // event.preventDefault();
        e.stopPropagation();
        var firstname = $('#firstname');
        var lastname = $('#lastname');
        var phone = $('#phone');
        var country = $('#country');
        var additioninformation = $('#addition-information');
        // var photo = $('#photo');
        var other_photo = $('#other-photo');
        var video = $('#video');
        var youtube = $('#youtube');
        var gender = $('#gender');
        var location_province = $('.provincecode');
        var location_districts = $('.districtcode');
        var location_Sector = $('.sectorcode');
        var location_cell = $('.codecell');
        var location_village = $('.CodeVillage');
        // var location_province = $('#location_province');
        // var location_districts = $('#location_districts');
        // var location_Sector = $('#location_sectors');
        // var location_cell = $('#location_cell');
        // var location_village = $('#location_village');
        var username = $('#usernam');
        var status = $('#status');
        var password= $('#password');
        var email = $('#email');
        var cpassword = $('#cpassword');
        var photo = document.forms["form-domestics"]["photo"];

        if (isEmpty(country) && isEmpty(location_province) && isEmpty(location_districts) &&
            isEmpty(location_Sector) && isEmpty(location_cell) && isEmpty(location_village) &&
            isEmpty(additioninformation) && isEmpty(firstname) && isEmpty(lastname) &&
            isEmpty(phone) && isEmpty(username) && isEmpty(email) && isEmpty(password) && isEmpty(cpassword) &&
            isEmpty(status) && isEmpty(gender) && photo.checked == true) {
             var email = $('#email').val();

            if (email.value == "") { 
                alert('Email address is required.'); return false; 
            }
            if (email.indexOf("@") < 1 || email.lastIndexOf(".") < email.indexOf("@") + 2 || email.lastIndexOf(".") + 2 >= email.length) {
                alert('Email do not match..'); return false; 
            }
            if (phone.value == "") { 
                alert('Phone is required.'); return false; 
            }else {
            
            // var extensions1 = $('#photo').val().split('.').pop().toLowerCase();
            // var extensions2 = $('#other-photo').val().split('.').pop().toLowerCase();

            // if (jQuery.inArray(extensions1, ['gif', 'png', 'jpg', 'mp4', 'mp3', 'jpeg', 'bmp', 'pdf', 'doc', 'ppt', 'docx', 'xlsx', 'xls', 'zip']) == -1) {
            //     $("#responseSubmitdomestics").html('Invalid Image File').fadeIn();
            //     setInterval(function () {
            //         $("#responseSubmitdomestics").fadeOut();
            //     }, 4000);
            //     $('#photo').val('');
            //     return false;
            // } else if (jQuery.inArray(extensions2, ['gif', 'png', 'jpg', 'mp4', 'mp3', 'jpeg', 'bmp', 'pdf', 'doc', 'ppt', 'docx', 'xlsx', 'xls', 'zip']) == -1) {
            //     $("#responseSubmitdomestics").html('Invalid Image File').fadeIn();
            //     setInterval(function () {
            //         $("#responseSubmitdomestics").fadeOut();
            //     }, 4000);
            //     $('#other-photo').val('');
            //     return false;
            // } else {
                $.ajax({
                    url: 'core/ajax_db/domestic_addcategories.php',
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
                        $("#responseSubmitdomestics").html(response).fadeIn();
                        setInterval(function () {
                            $("#responseSubmitdomestics").fadeOut();
                        }, 2000);
                        setInterval(function () {
                            // location.reload();
                        }, 2400);
                    }, error: function (response) {
                        $("#responseSubmitdomestics").html(response).fadeIn();
                        setInterval(function () {
                            $("#responseSubmitdomestics").fadeOut();
                        }, 3000);
                    }
                });
                return false;
            }
        }
        if (photo.checked == false) {
            alert("Please Select photo");
            return true;
        }
    });
    
    $(document).on('click', '#form-domesticss', function (e) {
        // event.preventDefault();
        e.stopPropagation();
        var firstname = $('#firstname');
        var lastname = $('#lastname');
        var phone = $('#phone');
        var country = $('#country');
        var additioninformation = $('#addition-information');
        var photo = $('#photo');
        var gender = $('#gender');
        var location_province = $('.provincecode');
        var location_districts = $('.districtcode');
        var location_Sector = $('.sectorcode');
        var location_cell = $('.codecell');
        var location_village = $('.CodeVillage');

        // var location_province = $('#location_province');
        // var location_districts = $('#location_districts');
        // var location_Sector = $('#location_sectors');
        // var location_cell = $('#location_cell');
        // var location_village = $('#location_village');
        var username = $('#usernam');
        var status = $('#status');
        var email = $('#email');
        var password = $('#password');
        var cpassword = $('#cpassword');

        if (isEmpty(country) && isEmpty(location_province) && isEmpty(location_districts) &&
            isEmpty(location_Sector) && isEmpty(location_cell) && isEmpty(location_village) &&
            isEmpty(gender) && isEmpty(additioninformation) && isEmpty(firstname) && isEmpty(lastname) &&
            isEmpty(phone) && isEmpty(username) && isEmpty(email) && isEmpty(password) && isEmpty(cpassword) &&
            isEmpty(status) && isEmpty(gender) && isEmpty(photo)) {

            var extensions1 = $('#photo').val().split('.').pop().toLowerCase();
            // var extensions2 = $('#other-photo').val().split('.').pop().toLowerCase();

            if (jQuery.inArray(extensions1, ['gif', 'png', 'jpg', 'mp4', 'mp3', 'jpeg', 'bmp', 'pdf', 'doc', 'ppt', 'docx', 'xlsx', 'xls', 'zip']) == -1) {
                $("#responseSubmitdomestics").html('Invalid Image File').fadeIn();
                setInterval(function () {
                    $("#responseSubmitdomestics").fadeOut();
                }, 4000);
                $('#photo').val('');
                return false;
            // } else if (jQuery.inArray(extensions2, ['gif', 'png', 'jpg', 'mp4', 'mp3', 'jpeg', 'bmp', 'pdf', 'doc', 'ppt', 'docx', 'xlsx', 'xls', 'zip']) == -1) {
            //     $("#responseSubmitdomestics").html('Invalid Image File').fadeIn();
            //     setInterval(function () {
            //         $("#responseSubmitdomestics").fadeOut();
            //     }, 4000);
            //     $('#other-photo').val('');
            //     return false;
            }else {
                $.ajax({
                    url: 'core/ajax_db/domestic_addcategories.php',
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
                        $("#responseSubmitdomestics").html(response).fadeIn();
                        setInterval(function () {
                            $("#responseSubmitdomestics").fadeOut();
                        }, 2000);
                        setInterval(function () {
                            // location.reload();
                        }, 2400);
                    }, error: function (response) {
                        $("#responseSubmitdomestics").html(response).fadeIn();
                        setInterval(function () {
                            $("#responseSubmitdomestics").fadeOut();
                        }, 3000);
                    }
                });
                return false;
            }
        }
    });
    
});

function domesticsLogin(key) {
    var username = $("#Username");
    var email = $("#inputEmail");
    var password = $("#inputPassword");
    //   use 1 or second method to validaton
    if (isEmpty(username) && isEmpty(email) && isEmpty(password)) {
        //    alert("complete register");
        $.ajax({
            url: 'core/ajax_db/domestic_addcategories.php',
            method: "POST",
            dataType: "text",
            data: {
                key: key,
                username: username.val(),
                email: email.val(),
                password: password.val(),
            },
            success: function (response) {
                $("#response").html(response).fadeIn();
                setInterval(function () {
                    $("#response").fadeOut();
                }, 2000);
                console.log(response);
                if (response.indexOf('SUCCESS') >= 0) {
                    // window.location = '../indexx.php';
                        window.location = 'domestics_ViewEmployers.php';
                } else if (response.indexOf('Fail') >= 0) {
                    setInterval(() => {
                            location.reload();
                    }, 1000);
                    isEmptys(password);
                } else {
                    isEmptyCorrect(username) || isEmptyCorrect(password);
                }
            }
        });
    }
}

function employersLogin(key) {
    var username = $("#Username");
    var email = $("#inputEmail");
    var password = $("#inputPassword");
    //   use 1 or second method to validaton
    if (isEmpty(username) && isEmpty(email) && isEmpty(password)) {
        //    alert("complete register");
        $.ajax({
            url: 'core/ajax_db/domestic_addcategories.php',
            method: "POST",
            dataType: "text",
            data: {
                key: key,
                username: username.val(),
                email: email.val(),
                password: password.val(),
            },
            success: function (response) {
                $("#response").html(response).fadeIn();
                setInterval(function () {
                    $("#response").fadeOut();
                }, 2000);
                console.log(response);
                if (response.indexOf('SUCCESS') >= 0) {
                    // window.location = '../indexx.php';
                    window.location = 'domestics_EmployersViewdomestics.php';
                } else if (response.indexOf('Fail') >= 0) {
                    setInterval(() => {
                            location.reload();
                        // window.location = 'lockscreen.php';
                    }, 1000);
                    isEmptys(password);
                } else {
                    isEmptyCorrect(username) || isEmptyCorrect(password);
                }
            }
        });
    }
}

function isEmpty(caller) {
    if (caller.val() == "") {
        caller.css("outline", "1px solid red");
        return false;
    } else {
        caller.css("outline", "1px solid green ");
    }
    return true;
}
function isEmptyCorrect(caller) {
    if (caller.val() != "") {
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
