<?php include "header_navbar_footer/Get_usernameProfile.php"?>
<title>Jobs</title>
<style>
#black .large-2 {
  height: 50vh;
  overflow-y: scroll;
  margin-bottom: 10px;
  width: 100%;
  /* background: #ccc; */
}

#black .large-2::-webkit-scrollbar-track {
  border: 1px solid #000;
  padding: 2px 0;
  background-color: #404040;
}

#black .large-2::-webkit-scrollbar {
  width: 10px;
}

#black .large-2::-webkit-scrollbar-thumb {
  border-radius: 10px;
  box-shadow: inset 0 0 6px rgba(0,0,0,.3);
  background-color: #737272;
  border: 1px solid #000;
}

.large-2 {
  height: 50vh;
  overflow-y: scroll;
  margin-bottom: 10px;
  /* margin-bottom: 25px; */
  width: 100%;
  /* background: #ccc; */
}

.large-2::-webkit-scrollbar-track {
  border: 1px solid #fff;
  padding: 2px 0;
  background-color: #f7f7f7;
}

.large-2::-webkit-scrollbar {
  width: 10px;
}

.large-2::-webkit-scrollbar-thumb {
  border-radius: 10px;
  box-shadow: inset 0 0 6px rgba(0,0,0,.3);
  background-color: #f7f7f7;
  border: 1px solid #fff;
}
</style>
<?php include "header_navbar_footer/header.php"?>
<?php include "header_navbar_footer/navbar.php"?>

        <header class="blog-header mt-3 py-2 mb-3 bg-light">
          <div class="row flex-nowrap justify-content-between align-items-center">
          <div class="col-12 text-center">
           <?php echo $home->links(); ?>
          </div>
        </div>
        <div class="row flex-nowrap justify-content-between align-items-center">
          <div class="col-4">
          </div>
          <div class="col-4 text-center">
            <a class="blog-header-logo text-dark" href="#">Jobs</a>
          </div>
          <div class="col-4 d-flex justify-content-end align-items-center">
           
          </div>
        </div>
      </header>
<!-- container-fuild -->
<div class="container mb-5 mt-3">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1><i>Jobs</i></h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="<?php echo HOME ;?>">Home</a></li>
                      <?php if (isset($_SESSION['key'])){ ?>
                      <?php if ($user['user_id'] === $_SESSION['key']) { ?>
                    <li class="breadcrumb-item"><span id="messagePopup" class="more" data-user="<?php echo $user['user_id'];?>"><a href="javascript:void(0);" ><i style="font-size: 20px;" class="fa fa-envelope-o"></i> Message </a></span></li>
                    <?php } } ?>
                    <li class="breadcrumb-item active"><i><a href="<?php echo PROFILE ;?>"> User Profile</a></i></li>
                </ol>
            </div>
        </div>
    </section>

    <!-- Main content -->
    <section class="content">

          <div class="row">
            <div class="col-md-12 mb-4" id="jobs-hides" >
                <?php echo $home->jobsfetchALL0('Featured',1) ;?>
            </div><!-- /.col -->
          </div><!-- /.row -->

    </section>
    <!-- /.content -->

</div>
<!-- /.content-wrapper -->

<?php include "header_navbar_footer/footer.php"?>
<!-- <script>
$(document).ready(function(){
    $('.container').height($(window).height());
});
</script> -->