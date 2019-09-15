   
   $(document).ready(function() {
            $("#addPost").on('click', function () {
               $("#table_form").modal('show');
               $("#btn_manager").fadeOut();

            });

            $("#table_form").on('hidden.bs.modal', function () {
               $("#view_Content").fadeOut();
               $("#edit_Content").fadeIn();
               $("#post_editRowID").val(0);
               $("#title").val("");
               $("#athors").val("");
               $("#textarea").val("");
               $("#email").val("");
               $("#date").val("");
               $("#address").val('');
               $("#country").val("");
               $("#state").val("");
               $("#closeBtn").fadeIn();
               $("#btn_manager").fadeOut();
               $("#manager").fadeIn();

            });

            getExistingData_(0,50);
        });

        function deleteRow_(rowID) {
            if (confirm('Are you sure??')) {
                $.ajax({
                    url: 'core/ajax_db/add_post_db.php',
                    method: 'POST',
                    dataType: 'text',
                    data: {
                        key: 'deleteRow',
                        rowID: rowID
                    }, success: function (response) {
                        $("#title"+rowID).parent().remove();
                        alert(response);
                    }
                });
            }
        }

        function viewORedit_(rowID, type) {
            $.ajax({
                url: 'core/ajax_db/add_post_db.php',
                method: 'POST',
                dataType: 'json',
                data: {
                    key: 'viewORedit',
                    rowID: rowID
                }, success: function (response) {
                    if (type == "view") {
                        $("#show_Content").fadeIn();
                        $("#edit_Content").fadeOut();
                        $("#profile_image").fadeOut();
                        $("#imageView").html(response.image);
                        $("#titleView").html(response.title);
                        $("#athorsView").html(response.athors);
                        $("#textareaView").html(response.textarea);
                        $("#emailView").html(response.email);
                        $("#dateView").html(response.date);
                        $("#addressView").html(response.address);
                        $("#countryView").html(response.country);
                        $("#stateView").html(response.state);
                        $("#btn_manager").fadeOut();
                        $("#closeBtn").fadeIn();
                        $("#manager").fadeOut();

                    } else {
                        $("#edit_Content").fadeIn();
                        $("#show_Content").fadeOut();
                        $("#profile_image").fadeOut();
                        $("#post_editRowID").val(rowID);
                        $("#title").val(response.title);
                        $("#athors").val(response.athors);
                        $("#textarea").val(response.textarea);
                        $("#email").val(response.email);
                        $("#date").val(response.date);
                        $("#address").val(response.address);
                        $("#country").val(response.country);
                        $("#state").val(response.state);
                        $("#manager").fadeOut();
                        $("#closeBtn").fadeIn();
                        $("#btn_manager").attr('value', 'update').fadeIn();
                        $("#btn_manager").on('click',function() {
                           manageData('updateRow');
                           $("#table_form").modal('hide');
                           console.log(response);
                        });
                           console.log(response);
                    }

                    $(".modal-title").html(response.title);
                    $("#table_form").modal('show');
                }
            });
        }

        function getExistingData_(begin_nmber, end_nmber) {
            $.ajax({
                url: 'core/ajax_db/add_post_db.php',
                method: 'POST',
                dataType: 'text',
                data: {
                    key: 'fetch_array',
                    begin_nmber: begin_nmber,
                    end_nmber: end_nmber
                }, success: function (response) {
                    if (response != "Max") {
                        $('#tbody1').append(response);
                        begin_nmber += end_nmber;
                        getExistingData_(begin_nmber, end_nmber);
                    } else
                        $(".tablepost").DataTable();
                }
            });
        }

         $(document).ready(function (e) {
        	    $("#form").on('submit',(function(e) {
        		e.preventDefault();
        
                        $.ajax({
                           url: 'core/ajax_db/ajaxupload.php',
                           dataType: 'text',
                           type: "POST",
        			       data:new FormData(this),
        			       contentType: false,
            	           cache: false,
        			       processData:false,
                           beforeSend : function() {
        		        		$("#preview").fadeOut();
        		        		$("#err").fadeOut();
                                $("#btn_manager").fadeOut();
        
        		        	}, success: function (response) {
                                   alert(response);
                                   console.log(response); 
                                   $("#btn_manager").fadeOut();
        
                          }, error: function(e) {
        		           		$("#err").html(e).fadeIn();
        	               	} 	
        
                        });
             }));
        });

        function manageData(key) {
            var editRowID = $("#post_editRowID");
            var title = $("#title");
            var athors = $("#athors");
            var textarea = $("#textarea");
            var email = $("#email");
            var date = $("#date");
            var address = $("#address");
            var country = $("#country");
            var state = $("#state");

                $.ajax({
                   url: 'core/ajax_db/add_post_db.php',
                   method: 'POST',
                   data: {
                       key: key,
                       title: title.val(),
                       athors: athors.val(),
                       textarea: textarea.val(),
                       email: email.val(),
                       date: date.val(),
                       address: address.val(),
                       country: country.val(),
                       state: state.val(),
                       rowID: editRowID.val()

                   }, 
                     beforeSend : function()
		        	{
		        		$("#preview").fadeOut();
		        		$("#err").fadeOut();
		        	},
                   success: function (response) {
                       if (response !="success"){
                           alert(response);
                           console.log(response);

                       }else {
                           $("#title_"+editRowID.val()).html(title.val());
                           $("#athors_"+editRowID.val()).html(athors.val());
                           $("#textarea_"+editRowID.val()).html(textarea.val());
                           $("#email_"+editRowID.val()).html(email.val());
                           $("#date_"+editRowID.val()).html(date.val());
                           $("#address_"+editRowID.val()).html(address.val());
                           $("#country_"+editRowID.val()).html(country.val());
                           $("#state_"+editRowID.val()).html(state.val());
                           title.val("");
                           athors.val("");
                           textarea.val("");
                           email.val("");
                           date.val("");
                           address.val('');
                           country.val("");
                           state.val("");
                           $("#btn_manager").attr('onclick',"manageData('updateRow')").fadeIn();
                       }
                   }, error: function(e) {
		           		$("#err").html(e).fadeIn();
	               	} 	

                });
        }