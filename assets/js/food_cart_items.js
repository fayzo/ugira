 $(document).ready(function () {

    
    $(document).on('click', '#form-foodcartitem', function (e) {
            // event.preventDefault();
            e.stopPropagation();

                    $.ajax({
                        url: 'food.php',
                        method: "POST",
                        data: new FormData(this),
                        contentType: false,
                        processData: false,
                        success: function (response) {
                            $("#responseSubmitfooditerm").html(response).fadeIn();
                            setInterval(function () {
                                $("#responseSubmitfooditerm").fadeOut();
                            }, 2000);
                            setInterval(function () {
                                // location.reload();
                            }, 2400);
                        }, error: function (response) {
                            $("#responseSubmitfooditerm").html(response).fadeIn();
                            setInterval(function () {
                                $("#responseSubmitfooditerm").fadeOut();
                            }, 3000);
                        }
                    });
        });

 });