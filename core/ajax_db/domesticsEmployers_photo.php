<?php 
session_start();
include('../init.php');
$users->preventUsersAccess($_SERVER['REQUEST_METHOD'],realpath(__FILE__),realpath($_SERVER['SCRIPT_FILENAME']));

if (isset($_POST['photo']) && !empty($_POST['photo'])) {
    $photo= $_POST['photo'];
    $employer_id= $_POST['employer_id'];
    $user_id= $_POST['user_id'];
    $users->updateReal('employersdomestics',array('photo_'=> $photo),array('employers_id' => $employer_id, 'user_id_' => $user_id));
}
if (isset($_POST['employer']) && !empty($_POST['employer'])) {
    $employer_id= $_POST['employer'];
    $user_id= $_POST['user'];
     ?>
<style>
.img-popup-bodys{
    border-radius: 4px;
    overflow: hidden;
}
</style>

<div class="employers-popup">
    <div class="wrap6">
        <span class="colose">
        	<button class="close-imagePopup"><i class="fa fa-times" aria-hidden="true"></i></button>
        </span>
        <div class="img-popup-wrap">
        	<div class="img-popup-bodys">
                <span id="responseSubmit-Employers"></span>

                    <h4 class="text-center" style="text-decoration:underline;">Select One Profile Picture </h4>
                    <script>
                        $('input[type="checkbox"]').on('change', function() {
                            $('input[type="checkbox"]').not(this).prop('checked', false).attr('id','').attr('name','');
                            $(this).prop('checked', true).attr('id','photo').attr('name','photo');
                        });
                    </script>
                <form method="post" id="form-employers-photo" name="form-employers-photo" >
                    <input type="hidden" name="employer_id" id="employer_id" value="<?php echo $employer_id; ?>">
                    <input type="hidden" name="user_id" id="user_id" value="<?php echo $user_id; ?>">
                   
                    <div class="form-row mt-2 mb-3 mr-2">
                            <div class="col">

                                <div class="form-check">
                                    <?php for ($i=1; $i < 27; $i++) { ?>
                                        <label class="form-check-label">
                                                <input class="form-check-input ml-1" type="checkbox" name="photo" id="photo" value="<?php echo $i?>.png"> <img src="<?php echo BASE_URL_PUBLIC.'uploads/domesticsEmployers/'.$i.'.png'; ?>" class="mt-3" width="100px" height="100px" style="border: #bf4170 1px solid;">
                                            </label>
                                    <?php } ?>
                                </div>

                             </div>
                    </div>
                    <button type="button" id="form-employers-photo0" class="btn btn-primary btn-md btn-block mb-3">Submit Photo</button>
                </form>
          </div><!-- img-popup-body -->
        </div><!-- tweet-show-popup-box -->
    </div> <!-- Wrp4 -->
</div> <!-- apply-popup" -->
<?php } 

?> 