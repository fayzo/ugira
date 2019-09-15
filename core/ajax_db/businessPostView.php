<?php 
session_start();
include('../init.php');
$users->preventUsersAccess($_SERVER['REQUEST_METHOD'],realpath(__FILE__),realpath($_SERVER['SCRIPT_FILENAME']));

if (isset($_POST['job_id']) && !empty($_POST['job_id'])) {
    // $user_id= $_SESSION['key'];
    $job_id= $_POST['job_id']; 
    $business_id= $_POST['business_id']; 
    $user = $home->jobsviewData($business_id,$job_id);
    ?>

 <div class="job-popup">
      <div class="wrap6">
        <span class="colose">
        	<button class="close-imagePopup"><i class="fa fa-times" aria-hidden="true"></i></button>
        </span>
        <div class="img-popup-wrap">
        	<div class="img-popup-body">

                <div class="card">
                    <div class="card-header">
                        <div class="user-block">
                             <div class="user-blockImgBorder" style="top:20px;">
                             <div class="user-blockImg">
                                   <?php if (!empty($user['profile_img'])) {?>
                                   <img src="<?php echo BASE_URL_LINK ;?>image/users_profile_cover/<?php echo $user['profile_img'] ;?>" alt="User Image">
                                   <?php  }else{ ?>
                                     <img src="<?php echo BASE_URL_LINK.NO_PROFILE_IMAGE_URL ;?>" alt="User Image">
                                   <?php } ?>
                             </div>
                             </div>
                             <span class="username">
                                 <a style="padding-right:3px;" class="h5" href="<?php echo BASE_URL_PUBLIC.$user['username'] ;?>"><?php echo $home->htmlspecialcharss($user['job_title']) ;?></a>
                             </span>
                                 <a style="padding-right:3px;" href="<?php echo BASE_URL_PUBLIC.$user['username'] ;?>"><?php echo $home->htmlspecialcharss($user['companyname']).' || '.$user['country'];?> <i class="flag-icon flag-icon-<?php echo strtolower($user['country']) ;?> h4 mb-0"
                            id="<?php echo strtolower( $jobs['location']) ;?>" title="us"></i></a>
                              <span class="description">Shared public - <?php echo $home->timeAgo($user['created_on']); ?>  . <span>Views: 234 times</span></span>
                         </div>
                         <!-- <h2>job title <s?php echo $user['job_title']; ?></h2> -->
                    </div> <!-- card-header -->
                    <div class="card-body">

                      <div class="card mt-2 mb-2 retweetcolor">
                        <div class="card-body">
                           <div class="row">
                             <div class="col-md-2">
                                 <div class="user-jobImgall">
                                       <?php if (!empty($user['profile_img'])) {?>
                                       <img src="<?php echo BASE_URL_LINK ;?>image/users_profile_cover/<?php echo $user['profile_img'] ;?>" alt="User Image">
                                       <?php  }else{ ?>
                                         <img src="<?php echo BASE_URL_LINK.NO_PROFILE_IMAGE_URL ;?>" alt="User Image">
                                       <?php } ?>
                                 </div>
                             </div> <!-- col-md-3 -->
                             <div class="col-md-10">
                               <span><?php echo $user['companyname']; ?></span>
                               <h5>Company Overview</h5>
                               <span><?php echo $user['overview']; ?></span>
                             </div> <!-- col-md-9 -->
                           </div>
                        </div>
                      </div>

                        <p class="card-text">job-id -<?php echo $job_id ;?></p>
                        <p class="card-text">business-id -<?php echo $business_id ;?></p>
                        <h4 >Job Title: <?php echo $user['job_title'] ;?> </h4>
                          <hr>
                      
                             <h4 >Job Summary: </h4>
                             <div><?php echo $user['job_summary'] ;?></div>
                           <hr>
                      
                             <h4>Responsibilities and Duties: </h4>
                            <div> <?php echo $user['responsibilities_duties'] ;?></div>
                           <hr>
                      
                           <h4 >Qualifications and Skills: </h4>
                           <div><?php echo $user['qualifications_skills'] ;?></div>

                         <hr>
                            <h4 class="card-title">Terms and conditions: </h4>
                           <div><?php echo $user['conditions'] ;?></div>
                          <hr>
                  
                            <h4 class="card-title">Deadline to submit: </h4>
                           <div><?php echo $user['deadline'] ;?></div>
                          <hr>
                  
                            <h4 class="card-title">Apply to website: </h4>
                             <div><?php echo $user['website'] ;?></div>
                          <hr>
                        <!-- <h4 >Job Title: </h4>
                            <label for="">Examples of Accountant job titles </label>
                            <ul style="list-style-type:dot">
                               <li> Accountant</li>
                               <li>Entry-level Accountant/Bookkeeper </li>
                               <li>Accounts Payable Specialist</li>
                               <li>Payroll and Collections Accountant </li>
                               <li>Senior Staff Accountant  </li>
                            </ul>
                          <hr>
                      
                             <h4 >Job Summary: </h4>
                             <p> Example of an Accountant job summary. </p>
                             <ul style="list-style-type:dot">
                                <li>We’re looking for an organized and driven Staff Accountant to join our growing team at our company. The Staff Accountant position will work closely with our other accountants and operations personnel and handle day-to-day bookkeeping. We’re an energetic company and are looking for a passionate individual to join our organization and revitalize our record keeping and bring more organization to our day to day financials.</li>
                             </ul>
                           <hr>
                      
                             <h4>Responsibilities and Duties: </h4>
                             <p >Examples of an Accountant Responsibilities. </p>
                             <ul style="list-style-type:dot">
                                 <li>Perform monthly, quarterly and annual accounting activities including reconciliations of bank and credit card accounts, coordination and completion of annual audits, and reviewing financial reports/support as necessary</li>
                                 <li> Analyze and report on financial status including income statement variances, communicating financial results to management, budget preparation and analysis</li>
                                 <li> Improve systems and procedures and initiate corrective actions</li>
                                 <li> Oversee taxes and abide by federal regulations</li>
                             </ul>
                           <hr>
                      
                           <h4 >Qualifications and Skills: </h4>
                           <p >Examples of an Accountant skills. </p>
                           <ul style="list-style-type:dot">
                               <li>2+ years accounting experience</li>
                               <li>Expertise with QuickBooks</li>
                               <li>Extensive knowledge of US GAAP</li>
                               <li>Advanced computer skills in MS Office, accounting software and databases</li>
                               <li>Excellent organizational, problem-solving, project management and communication skills</li>
                               <li>Additional experience in Audit and International accounting</li>
                               <li>Experience with SaaS companies</li>
                               <li>CPA certification  </li>
                           </ul>
                         <hr>
                            <h4 class="card-title">Terms and conditions: </h4>
                            <p class="card-title">Explaination of Terms and conditions: </p>
                            <p>Include a list of hard and soft skills. Of course, the job description should specify education, previous job experience, certifications and technical skills required for the role. You may also include soft skills, like communication and problem solving, as well as personality traits that you envision for a successful hire.
                                   Keep your list concise. While you may be tempted to list out every requirement you envision for your ideal hire, including too many qualifications and skills could dissuade potential candidates.         
                            </p>
                            <p class="card-text">Examples of Terms and conditions. </p>
                            <ul style="list-style-type:dot">
                                   <li>Bachelor’s Degree in Mathematics or Computer Engineering</li>
                                   <li>2+ years’ Data mining experience</li>
                                   <li>3+ years in a data analyst role</li>
                                   <li>Ability to collaborate effectively and work as part of a team</li>
                                   <li>Strong attention to detail </li>
                            </ul>
                          <hr>
                  
                            <h4 class="card-title">Deadline to submit: </h4>
                            <p class="card-title">Explaination of Deadline to submit: </p>
                            <p>Include a list of hard and soft skills. Of course, the job description should specify education, previous job experience, certifications and technical skills required for the role. You may also include soft skills, like communication and problem solving, as well as personality traits that you envision for a successful hire.
                                   Keep your list concise. While you may be tempted to list out every requirement you envision for your ideal hire, including too many qualifications and skills could dissuade potential candidates.         
                            </p>
                            <p class="card-text">Examples of Deadline to submit. </p>
                            <ul style="list-style-type:dot">
                                   <li>Bachelor’s Degree in Mathematics or Computer Engineering</li>
                                   <li>2+ years’ Data mining experience</li>
                                   <li>3+ years in a data analyst role</li>
                                   <li>Ability to collaborate effectively and work as part of a team</li>
                                   <li>Strong attention to detail </li>
                            </ul>
                          <hr>
                  
                            <h4 class="card-title">Apply to website: </h4>
                            <p class="card-title">Explaination of Apply to website: </p>
                            <p>Include a list of hard and soft skills. Of course, the job description should specify education, previous job experience, certifications and technical skills required for the role. You may also include soft skills, like communication and problem solving, as well as personality traits that you envision for a successful hire.
                                   Keep your list concise. While you may be tempted to list out every requirement you envision for your ideal hire, including too many qualifications and skills could dissuade potential candidates.         
                            </p>
                            <p class="card-text">Examples of Apply to website. </p>
                            <ul style="list-style-type:dot">
                                   <li>Bachelor’s Degree in Mathematics or Computer Engineering</li>
                                   <li>2+ years’ Data mining experience</li>
                                   <li>3+ years in a data analyst role</li>
                                   <li>Ability to collaborate effectively and work as part of a team</li>
                                   <li> <input type="button" id="Apply" value="Apply" data-applyjob="<?php echo $job_id ;?>" data-business="<?php echo $business_id ;?>" class="btn btn-success"></li>
                            </ul>
                              <span>Deadline: june 23 </span>
                             <span >number of positions: 2</span>
                          <hr> -->
                          <input type="button" id="Apply" value="Apply" data-applyjob="<?php echo $job_id ;?>" data-business="<?php echo $business_id ;?>" class="btn btn-success">
                    </div>
                </div>

            </div><!-- img-popup-body -->
        </div><!-- tweet-show-popup-box -->
    </div> <!-- Wrp4 -->
</div> <!-- job-popup" -->

<?php } 

if (isset($_POST['search']) && !empty($_POST['search'])) {
    // $user_id= $_SESSION['key'];
    $search= $users->test_input($_POST['search']);
    $result= $home->searchJobs($search);
    echo '<h4 style="padding: 0px 10px;">'.$_POST['search'].'</h4> ';

     if (is_array($result) || is_object($result)){

     foreach ($result as $jobs) { ?>

          <div class="col-12 px-0 py-2 jobHover border-bottom jobHovers more" data-job="<?php echo $jobs['job_id'];?>"  data-business="<?php echo $jobs['business_id'];?>">
            <div class="user-block mb-2" >
             <div class="row">
              <div class="col-2">
                   <div class="user-jobImgall">
                         <?php if (!empty($jobs['profile_img'])) { ?>
                         <img src="<?php echo BASE_URL_LINK ;?>image/users_profile_cover/<?php echo $jobs['profile_img'] ;?>" alt="User Image">
                         <?php  }else{ ?>
                           <img src="<?php echo BASE_URL_LINK.NO_PROFILE_IMAGE_URL ;?>" alt="User Image">
                         <?php } ?>
                   </div>
              </div>
              <div class="col-10 pl-4">
                   <span>
                       <a style="padding-right:3px;" href="<?php echo BASE_URL_PUBLIC ;?>"><?php echo htmlspecialchars($jobs['companyname']); ?></a> || 
                       <i class="flag-icon flag-icon-<?php echo strtolower($jobs['location']) ;?> h4 mb-0"
                            id="<?php echo strtolower( $jobs['location']) ;?>" title="us"></i>
                   </span><br>
                   <span>Job Title: <?php echo htmlspecialchars($jobs['job_title']); ?></span><br>
                   <span>Shared public -<?php echo $home->timeAgo($jobs['created_on']); ?></span><br>
                   <span>Deadline to submit - <?php echo htmlspecialchars($jobs['deadline']); ?></span>
               </div>
             </div>
             </div>
            </div>
            <hr>
<p><div><ul><li>Perform monthly, quarterly and annual accounting activities including reconciliations of bank and credit card accounts, coordination and completion of annual audits, and reviewing financial reports/support as necessary</li>
<li><div><p>Perform monthly, quarterly and annual accounting activities including reconciliations of bank and credit card accounts, coordination and completion of annual audits, and reviewing financial reports/support as necessaryï»¿</p></div></li>
</ul></div></p>
        <?php } 
        }
} ?>
