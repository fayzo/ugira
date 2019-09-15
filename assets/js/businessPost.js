
$(document).ready(function () {
    $("#addPostsjobs").on('click', function () {
        $("#addPostjobs").modal('show');
        $(".view-body").fadeOut();
        // $("#posts").attr('value', 'save').attr('onclick', "ajax_requestsPosts('create')").fadeIn();
    });

    $("#Postjobs").on('hidden.bs.modal', function () {
        $(".edit-body").fadeIn();
        $("#id_posts").val(0);
        $("#businessID_posts").val();
        $(".job-title").val("");
        $(".job-summary").val("");
        $(".responsibilities-duties").val("");
        $(".qualifications-skills").val("");
        $(".terms-conditions").val("");
        $("#categories_jobs").val("");
        $(".deadline").val("");
        $(".website").val("");
    });
    
    jobspostsFetch(0, 50,$('#session').val());
    jobspostsFetchOn(0, 50, $('#session').val());

    $(document).on('click', '#addposts', function () {
        var id = $("#id_posts1");
        var businessID = $("#businessID_posts1");
        var job_title = $(".job-title1");
        var job_summary = $(".job-summary1");
        var responsibilities_duties = $(".responsibilities-duties1");
        var qualifications_skills = $(".qualifications-skills1");
        var conditions = $(".terms-conditions1");
        var deadline = $(".deadline1");
        var website = $(".website1");
        var categories_jobs = $("#categories_jobs1");

        if (isEmpty(categories_jobs) && isEmpty(job_title) && isEmpty(job_summary) && isEmpty(responsibilities_duties) && isEmpty(qualifications_skills) &&
            isEmpty(conditions) && isEmpty(deadline)) {

            $.ajax({
                url: 'core/ajax_db/businessPosts_db.php',
                type: 'post',
                dataType: 'text',
                data: {
                    key: 'create',
                    job_title: job_title.val(),
                    job_summary: job_summary.val(),
                    responsibilities_duties: responsibilities_duties.val(),
                    qualifications_skills: qualifications_skills.val(),
                    conditions: conditions.val(),
                    deadline: deadline.val(),
                    website: website.val(),
                    rowID: id.val(),
                    categories_jobs: categories_jobs.val(),
                    businessID: businessID.val(),

                }, success: function (response) {
                    if (response != "success") {
                        // alert(response);
                        $("#responseBusinessJobs1").html(response);
                    }
                    console.log(response);
                }
            });
        }
    });

});



function PostsEdits(rowID, businessID, type) {

    $.ajax({
        url: 'core/ajax_db/businessPosts_db.php',
        method: 'POST',
        dataType: 'json',
        data: {
            key: 'edit',
            rowID: rowID,
            businessID: businessID,
        }, success: function (response) {
            if (type == "view") {
                $(".edit-body").fadeOut();
                $(".view-body").fadeIn();
                $("#id_posts0").val(rowID);
                $("#businessID_id0").val(businessID);
                $(".job-title0").html(decodeHtmlEntities(response.job_title).replace(/(<([^>]+)>)/ig, ""));
                $(".job-summary0").html(decodeHtmlEntities(response.job_summary).replace(/(<([^>]+)>)/ig, ""));
                $(".responsibilities-duties0").html(decodeHtmlEntities(response.responsibilities_duties).replace(/(<([^>]+)>)/ig, ""));
                $(".qualifications-skills0").html(decodeHtmlEntities(response.qualifications_skills).replace(/(<([^>]+)>)/ig, ""));
                $(".categories_jobs0").html(decodeHtmlEntities(response.categories_jobs).replace(/(<([^>]+)>)/ig, ""));
                $(".terms-conditions0").html(decodeHtmlEntities(response.conditions).replace(/(<([^>]+)>)/ig, ""));
                $(".deadlin0e").html(decodeHtmlEntities(response.deadline).replace(/(<([^>]+)>)/ig, ""));
                $(".website0").html(response.website);
                $("#posts").fadeOut();

            } else {
                $(".edit-body").fadeIn();
                $(".view-body").fadeOut();
                $("#id_posts").val(rowID);
                $("#businessID_posts").val(businessID);
                $(".job-title").val(decodeHtmlEntities(response.job_title).replace(/(<([^>]+)>)/ig, ""));
                $(".job-summary").val(decodeHtmlEntities(response.job_summary).replace(/(<([^>]+)>)/ig, ""));
                $(".responsibilities-duties").val(decodeHtmlEntities(response.responsibilities_duties).replace(/(<([^>]+)>)/ig, ""));
                $(".qualifications-skills").val(decodeHtmlEntities(response.qualifications_skills).replace(/(<([^>]+)>)/ig, ""));
                $(".terms-conditions").val(decodeHtmlEntities(response.conditions).replace(/(<([^>]+)>)/ig, ""));
                $(".categories_jobsx").html(decodeHtmlEntities(response.categories_jobs).replace(/(<([^>]+)>)/ig, ""));
                $(".deadline").val(decodeHtmlEntities(response.deadline).replace(/(<([^>]+)>)/ig, ""));
                $(".website").val(response.website);
                $("#posts").attr('value', 'update').attr('onclick', "ajax_requestsPosts('update')").fadeIn();
            }
            $(".modal-title").html(response.job_title);
            $("#Postjobs").modal('show');
        }
    });
}

function ajax_requestsPosts(key) {
    var id = $("#id_posts");
    var businessID = $("#businessID_posts");
    var job_title= $(".job-title");
    var job_summary= $(".job-summary");
    var responsibilities_duties= $(".responsibilities-duties");
    var qualifications_skills= $(".qualifications-skills");
    var conditions= $(".terms-conditions");
    var deadline= $(".deadline");
    var website = $(".website");
    var categories_jobs = $("#categories_jobs");

    if (isEmpty(categories_jobs) && isEmpty(job_title) && isEmpty(job_summary) && isEmpty(responsibilities_duties) && isEmpty(qualifications_skills) &&
        isEmpty(conditions) && isEmpty(deadline)) {

        $.ajax({
            url: 'core/ajax_db/businessPosts_db.php',
            type: 'post',
            dataType: 'text',
            data: {
                key: key,
                job_title: job_title.val(),
                job_summary: job_summary.val(),
                responsibilities_duties: responsibilities_duties.val(),
                qualifications_skills: qualifications_skills.val(),
                conditions: conditions.val(),
                deadline: deadline.val(),
                website: website.val(),
                rowID: id.val(),
                categories_jobs: categories_jobs.val(),
                businessID: businessID.val(),

            }, success: function (response) {
                if (response != "success") {
                    // alert(response);
                    $("#responseBusinessJobs").html(response);
                }else{
                     job_title.val("");
                     job_summary.val("");
                     responsibilities_duties.val("");
                     qualifications_skills.val("");
                     conditions.val("");
                     deadline.val('');
                     website.val("");
                    categories_jobs.val("");

                }
            }
        });
    }
}

function jobspostsFetch(begin_nmber, end_nmber, session) {

    $.ajax({
        url: 'core/ajax_db/businessPosts_db.php',
        method: 'POST',
        dataType: 'text',
        data: {
            key: 'jobspostsFetch',
            begin_nmber: begin_nmber,
            end_nmber: end_nmber,
            session: session,
        }, success: function (response) {
            if (response != "Max") {
                $('#tbody-jobsFetch').append(response);
                begin_nmber += end_nmber;
            } else
                $(".table-jobsFetch").DataTable();
        }
    });
}

function jobspostsFetchOn(begin_nmber, end_nmber, session) {

    $.ajax({
        url: 'core/ajax_db/businessPosts_db.php',
        method: 'POST',
        dataType: 'text',
        data: {
            key: 'jobspostsFetchOn',
            begin_nmber: begin_nmber,
            end_nmber: end_nmber,
            session: session,
        }, success: function (response) {
            if (response != "Max") {
                $('#tbody-jobsFetchOn').append(response);
                begin_nmber += end_nmber;
            } else
                $(".table-jobsFetchOn").DataTable();
        }
    });
}

function jobsdeleteRow(rowID) {
          if (confirm('Are you sure??')) {
              $.ajax({
                  url: 'core/ajax_db/businessPosts_db.php',
                  method: 'POST',
                  dataType: 'text',
                  data: {
                      key: 'delete',
                      rowID: rowID
                  }, success: function (response) {
                      $("#title"+rowID).parent().remove();
                      jobspostsFetch(0, 50);
                      alert(response);
                  }
         });
     }
 }

function shows(rowID,turnOnOff) {
         if (confirm('Are you sure??')) {
             $.ajax({
                 url: 'core/ajax_db/businessPosts_db.php',
                 method: 'POST',
                 dataType: 'text',
                 data: {
                     key: turnOnOff,
                     rowID: rowID
                 }, success: function (response) {
                     $("#title"+rowID).parent().remove();
                     alert(response);
                 }
          });
      }
 }

function isEmpty(caller) {
    if (caller.val() == "") {
        caller.css("border", "1px solid red");
        return false;
    } else {
        caller.css("border", "1px solid green ");
    }
    return true;
}


function decodeHtmlEntities(str) {
    return String(str).replace(/&amp;/g, '&').replace(/&lt;/g, '<').replace(/&gt;/g, '>').replace(/&quot;/g, '"');
}