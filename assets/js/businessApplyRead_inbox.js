$(document).ready(function () {

    $(document).on('click', '#form-inbox',function (e) {
        e.preventDefault();

                $.ajax({
                    url: 'core/ajax_db/businessApplyViewInbox.php',
                    method: "POST",
                    data: new FormData(this),
                    contentType: false,
                    processData: false,
                    success: function (response) {
                        $("#responseSubmitdelete").html(response).fadeIn();
                        setInterval(function () {
                            $("#responseSubmitdelete").fadeOut();
                        }, 2000);
                        setInterval(function () {
                            // location.reload();
                        }, 2400);
                    }, error: function (response) {
                        $("#responseSubmitdelete").html(response).fadeIn();
                        setInterval(function () {
                            $("#responseSubmitdelete").fadeOut();
                        }, 3000);
                    }
                });
         
    });

    $(document).on('click', '#form-trash',function (e) {
        e.preventDefault();

                $.ajax({
                    url: 'core/ajax_db/businessApplyViewTrash.php',
                    method: "POST",
                    data: new FormData(this),
                    contentType: false,
                    processData: false,
                    success: function (response) {
                        $("#responseSubmitdelete").html(response).fadeIn();
                        setInterval(function () {
                            $("#responseSubmitdelete").fadeOut();
                        }, 2000);
                        setInterval(function () {
                            // location.reload();
                        }, 2400);
                    }, error: function (response) {
                        $("#responseSubmitdelete").html(response).fadeIn();
                        setInterval(function () {
                            $("#responseSubmitdelete").fadeOut();
                        }, 3000);
                    }
                });
         
    });

    $('#form-trash0').submit(function (event) {
        // $('#form-trash0').find('input[type=checkbox]').prop('checked', function (event){
            e.preventDefault();
            // var b = $("input:checkbox:not(:checked)");
            // $(b).each(function () {
            //     $(this).val(0);
            //     $(this).attr("checked", true);
            // });

                $.ajax({
                    url: 'core/ajax_db/businessApplyViewTrash.php',
                    method: "POST",
                    data: $(this).serialize(),
                    contentType: false,
                    processData: false,
                    success: function (response) {
                        $("#responseSubmitdelete").html(response).fadeIn();
                        setInterval(function () {
                            $("#responseSubmitdelete").fadeOut();
                        }, 2000);
                        setInterval(function () {
                            // location.reload();
                        }, 2400);
                        console.log(response);
                    }, error: function (response) {
                        $("#responseSubmitdelete").html(response).fadeIn();
                        setInterval(function () {
                            $("#responseSubmitdelete").fadeOut();
                        }, 3000);
                    }
                });
         
            // });
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
