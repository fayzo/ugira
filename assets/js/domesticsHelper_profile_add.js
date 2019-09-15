$(document).ready(function () {

    $(document).on('click', '#add_employers_profile', function (e) {
        e.stopPropagation();
        var employers = $(this).data('employers');

        $.ajax({
            url: 'core/ajax_db/domesticsHelper_profile_add.php',
            method: 'POST',
            dataType: 'text',
            data: {
                employers: employers,
            }, success: function (response) {
                $(".popupTweet").html(response);
                $(".close-imagePopup").click(function () {
                    $(".employers-popup").hide();
                });
                console.log(response);
            }
        });
    });

    $(document).on('click', '#photo_change_employers', function (e) {
        e.stopPropagation();
        var employer = $(this).data('employer');
        var user = $(this).data('user');

        $.ajax({
            url: 'core/ajax_db/domesticsEmployers_photo.php',
            method: 'POST',
            dataType: 'text',
            data: {
                employer: employer,
                user: user,
            }, success: function (response) {
                $(".popupTweet").html(response);
                $(".close-imagePopup").click(function () {
                    $(".employers-popup").hide();
                });
                console.log(response);
            }
        });
    });

    $(document).on('click', '#edit-domestics-profile', function (e) {
        e.stopPropagation();
        var domestics_id_edit = $(this).data('domestics');
        var user = $(this).data('user');

        $.ajax({
            url: 'core/ajax_db/domesticHelper_Profile.php',
            method: 'POST',
            dataType: 'text',
            data: {
                domestics_id_edit: domestics_id_edit,
                user: user,
            }, success: function (response) {
                $(".popupTweet").html(response);
                $(".close-imagePopup").click(function () {
                    $(".domestic-popup").hide();
                });
                console.log(response);
            }
        });
    });

    $(document).on('click', '#form-employers-photo0', function (e) {
        e.stopPropagation();
        var photo = document.forms["form-employers-photo"]["photo"];
        var photos = $('#photo').val();
        var employer_id = $('#employer_id').val();
        var user_id = $('#user_id').val();

        if (photo.checked == true) {
    
            $.ajax({
                url: 'core/ajax_db/domesticsEmployers_photo.php',
                method: 'POST',
                dataType: 'text',
                data: {
                    photo: photos,
                    employer_id: employer_id,
                    user_id: user_id,
                }, success: function (response) {
                    console.log(response);
                    $("#responseSubmit-Employers").html(response).fadeIn();
                    setInterval(function () {
                        $("#responseSubmit-Employers").fadeOut();
                    }, 2000);
                    setInterval(function () {
                        location.reload();
                    }, 2400);
                }, error: function (response) {
                    $("#responseSubmit-Employers").html(response).fadeIn();
                    setInterval(function () {
                        $("#responseSubmit-Employers").fadeOut();
                    }, 3000);
                }
            });
        }

        if (photo.checked == false) {
            alert("Please Select photo");
            return true;
        }
    });


    $(document).on('click', '#form_domestics_jobs', function (e) {
        // event.preventDefault();
        e.stopPropagation();
        var family_type = $('#family_type');
        var status_type = $('#status_type');
        var country = $('#country');
        var looking_for = $('#looking_for');
        var language_speak = $('#language_speak');
        var province = $('.provincecode');
        var districts = $('.districtcode');
        var sector = $('.sectorcode');
        var cell = $('.codecell');
        var village = $('.CodeVillage');
        var required_skills = $('#required_skills');
        var salary_accomodation = $('#salary_accomodation');
        var cooking_skills = $('#cooking_skills');
        var main_duties = $('#main_duties');
        var other_skills = $('#other_skills');
        var additioninformation = $('#addition-information');

        if (isEmpty(family_type) && isEmpty(status_type) && isEmpty(country) && isEmpty(looking_for) && 
            isEmpty(province) && isEmpty(districts) && isEmpty(sector) && isEmpty(cell) && isEmpty(village) && 
            isEmpty(language_speak) && isEmpty(required_skills) && isEmpty(salary_accomodation) && 
            isEmpty(cooking_skills) && isEmpty(main_duties) && isEmpty(other_skills) && 
            isEmpty(additioninformation) ) {

                $.ajax({
                    url: 'core/ajax_db/domesticsHelper_profile_add.php',
                    method: "POST",
                    data: new FormData(this),
                    contentType: false,
                    processData: false,

                    success: function (response) {
                        $("#responseSubmit-Employers").html(response).fadeIn();
                        setInterval(function () {
                            $("#responseSubmit-Employers").fadeOut();
                        }, 2000);
                        setInterval(function () {
                            // location.reload();
                        }, 2400);
                    }, error: function (response) {
                        $("#responseSubmit-Employers").html(response).fadeIn();
                        setInterval(function () {
                            $("#responseSubmit-Employers").fadeOut();
                        }, 3000);
                    }
                });
            }
       
    });

});
