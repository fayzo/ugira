      <header class="blog-header mt-3 py-2 bg-light">
        <div class="row flex-nowrap justify-content-between align-items-center">
          <div class="col-12 text-center">
           <?php echo $home->links(); ?>
          </div>
        </div>
        <div class="row flex-nowrap justify-content-between align-items-center">
          <div class="col-4 ">
          <?php if (isset($_SESSION['key'])) { ?>
            <button type="button" class="btn btn-light" id="add_car" data-car="<?php echo $_SESSION['key']; ?>" > + Add car </button>
           <?php } ?>
          </div>
          <div class="col-4 text-center">
            <a class="blog-header-logo text-dark" href="#">City maid</a>
          </div>
          <div class="col-4 d-flex justify-content-end align-items-center">
          </div>
        </div>
      </header>

<div class="container-fluid mb-5">

     <div class="row mt-2">
         <div class="col-md-3">
             <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Title</h4>
                    <p class="card-text">Text</p>
                </div>
                <div class="card-body">
                    <h4 class="card-title">Title</h4>
                    <p class="card-text">Text</p>
                </div>
            </div> <!-- card -->
         </div> <!-- col -->

         <div class="col-md-6 domestic-forms" id="car-hides">
             <?php echo $domestics->domesticshelpers(); ?>
         </div> <!-- col -->

         <div class="col-md-3">
           <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Title</h4>
                    <p class="card-text">Text</p>
                </div>
                <div class="card-body">
                    <h4 class="card-title">Title</h4>
                    <p class="card-text">Text</p> 
                </div>
            </div> <!-- card -->
         </div> <!-- col -->
     </div><!-- row -->
</div><!-- container-fluid -->

<!-- Domestic Helper Job Description
Domestic Helpers perform a variety of tasks within an employer’s home, such as providing care for a child or elderly family member, housecleaning, running errands and cooking. They may also be referred to as a Housekeeper, Maid or Nanny. While most Domestic Helpers live separately from the family they work for, some will be provided room and board in addition to their wages.

Domestic Helpers generally work as independent contractors and report to one or more of the family members for their duties and instructions. Some Domestic Helpers may work for a staffing agency and be paired up with families looking for assistance. The Domestic Helper may perform some or all of their duties while the family is away from the house or they may work in a home where one or more of the heads of the household work from home.

 

Domestic Helper Duties and Responsibilities 
The true scope of a Domestic Helper’s job will depend upon the needs of the family they work for, but there are a few primary responsibilities that can be applied to nearly all Domestic Helper positions. A review of current job listings identified the following core responsibilities.

Complete Housekeeping Tasks

One of the main duties of a Domestic Helper is providing regular housekeeping. This may include sweeping, mopping, vacuuming, laundry and cleaning dishes. They may also be asked to prepare some or all of the family meals. Some Domestic Helpers are also tasked with gardening or lawn maintenance.

Run Errands

In addition to their daily cleaning duties, Domestic Helpers are called upon to periodically perform errands. These will vary depending on the needs of the family but may include, dropping off or picking up children, grocery shopping, making a trip to the drycleaner or taking a family member to doctor appointments or other engagements.

Provide Caregiving Services

Domestic Helpers often act as caregivers to small children or elderly members of the family. This may encompass a large amount of duties from helping them to bathe and dress to ensuring they take their daily medications. Some Domestic Helpers are hired primarily to perform these duties, while others may only occasionally assist in this area.

 

Domestic Helper Skills
Domestic Helpers must be reliable and physically able to perform their duties. They should have good time management skills as well as the ability to work with minimal supervision. Domestic Helpers should also possess good communication skills. In addition to these traits, employers look for applicants with the following skillsets.

Core skills: Based on job listings we looked at, employers want Domestic Helpers with these core skills. If you want to work as a Domestic Helper, focus on the following.


Knowledge of cleaning procedures and practices
Experience as a caregiver to small children or elderly adults
Ability to read and follow instructions
Ability to prepare meals and snacks
Knowledgeable of safety practices
Ability to meet physical requirements, such as lifting, bending, and standing for duration of shift
Advanced skills: While most employers did not require the following skills, multiple job listings included them as preferred. Add these to your skillset and broaden your career options.

CPR certification
Valid driver license
 

Domestic Helper Resources
There are some helpful and informational resources available on the Web for those interested in becoming a Domestic Helper. We scoured the internet and found these links full of learning opportunities.
   -->