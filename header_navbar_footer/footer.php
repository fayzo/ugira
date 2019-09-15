<div class="popupTweet"></div>
  
  <footer class="blog-footer main-active">
       <p class="mb-1"><?php echo $users->copyright(2018); ?></p>
       <ul class="list-inline">
           <li class="list-inline-item"><a href="#">Privacy</a></li>
           <li class="list-inline-item"><a href="#">Terms</a></li>
           <li class="list-inline-item"><a href="#">Support</a></li>
       </ul>
       <a href="#">Back to top</a>
   </footer>
  <?php if (isset($_SESSION['key'])){ ?>
   <!-- DIRECT CHAT PRIMARY -->
   <div class="row">
       <div class="col-md-3">
           <div class="card direct-chats direct-chat direct-chat-primary">
               <div class="card-header main-active py-2">
                   <h5 class="card-title pb-0"><i> Message Chat</i></h5>

                   <div class="card-tools">
                       <span id="tooltipsmessages1" data-toggle="tooltip" title="3 New Messages" class="badge badge-primary"><?php if( $notific['totalmessage'] > 0){echo '<span>'.$notific['totalmessage'].'</span>'; } ?></span>
                       <button type="button" class="btn btn-tool btn-sm collapse-minus" data-toggle="collapse"
                           data-target="#collapseExample4">
                           <i class="fa fa-minus"></i>
                       </button>
                       <button type="button" class="btn btn-tool btn-sm" data-toggle="tooltip" id="direct-chat-contacts-view" title="Contacts"
                           data-widget="chat-pane-toggle">
                           <i class="fa fa-comments"></i>
                       </button>
                       <button type="button" class="btn btn-tool btn-sm" onclick="removes()"><i class="fa fa-times close-chat"></i>
                           <!--  data-widget="remove"  onclick="removes()" -->
                       </button>
                   </div>
               </div>
               <!-- /.card-header -->
               <div class="collapse" id="collapseExample4">
               </div>
               <!-- collapse -->
           </div>
           <!--/.direct-chat -->
       </div>
       <!-- /.col -->
   </div>
   <!-- /.row -->
   <!-- END DIRECT CHAT PRIMARY -->
   <!-- END DIRECT CHAT PRIMARY -->
   <?php include_once('core/ajax_db/direchat.php') ;?>
   <!-- END DIRECT CHAT PRIMARY -->
<?php } ?>

   <aside>
       <div id="mySidenav" class="sidenav">
           <div class="container">
               <h3>Settings</h3>
               <!-- <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a> -->
               <div class="dropdown">
                   <a class="dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
                       aria-haspopup="true" aria-expanded="false">
                       Choose color
                   </a>
                   <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                       <a class="d-inline-block" href="#" onclick="colors('blue',<?php echo $user_id;?>)">
                           <img src="<?php echo BASE_URL_LINK ;?>image/color/blue.png" width="30px"> </a>
                       <a href="#" onclick="colors('black',<?php echo $user_id;?>)"> <img
                               src="<?php echo BASE_URL_LINK ;?>image/color/black.png" width="30px"></a>
                       <a href="#" onclick="colors('yellow',<?php echo $user_id;?>)"> <img
                               src="<?php echo BASE_URL_LINK ;?>image/color/yellow.png" width="30px"></a>
                       <a href="#" onclick="colors('green',<?php echo $user_id;?>)"> <img
                               src="<?php echo BASE_URL_LINK ;?>image/color/green.png" width="30px"></a>
                       <a href="#" onclick="colors('purple',<?php echo $user_id;?>)"> <img
                               src="<?php echo BASE_URL_LINK ;?>image/color/purple.png" width="30px"></a>
                       <a href="#" onclick="colors('rose',<?php echo $user_id;?>)"> <img
                               src="<?php echo BASE_URL_LINK ;?>image/color/rose.png" width="30px"></a>
                       <a href="#" onclick="colors('chocolate',<?php echo $user_id;?>)"> <img
                               src="<?php echo BASE_URL_LINK ;?>image/color/chocolate.png" width="30px"></a>
                       <a href="#" class="input-holder" onclick="colors('white',<?php echo $user_id;?>)">
                            <button class="search-icon white-bg"></button>  </a>
                       <a href="#" class="input-holder" onclick="colors('purple_white',<?php echo $user_id;?>)">
                            <button class="search-icon purple-bg"></button>  </a>
                       <a href="#" class="input-holder" onclick="colors('purple-blue',<?php echo $user_id;?>)">
                            <button class="search-icon purple-blue"></button>  </a>
                       <a href="#" class="input-holder" onclick="colors('purple-green',<?php echo $user_id;?>)">
                            <button class="search-icon purple-green"></button>  </a>
                       <a href="#" class="input-holder" onclick="colors('orange-white',<?php echo $user_id;?>)">
                            <button class="search-icon orange-white"></button>  </a>
                       <a href="#" class="input-holder" onclick="colors('purple-white',<?php echo $user_id;?>)">
                            <button class="search-icon purple-white"></button>  </a>
                       <a href="#" class="input-holder" onclick="colors('blue-water',<?php echo $user_id;?>)">
                            <button class="search-icon blue-water"></button>  </a>
                       <a href="#" class="input-holder" onclick="colors('blue-green',<?php echo $user_id;?>)">
                            <button class="search-icon blue-green"></button>  </a>
                       <!-- <div class="dropdown-divider"></div>
                      <a class="dropdown-item" href="#">Something else here</a> -->
                  </div>
                </div>

               <div class="dropdown">
                   <a class="dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
                       aria-haspopup="true" aria-expanded="false">
                       Choose background-img
                   </a>
                   <div class="dropdown-menu  background-img" aria-labelledby="navbarDropdown">
                       <a class="d-inline-block" href="#" onclick="background('build',<?php echo $user_id;?>)">
                           <img src="<?php echo BASE_URL_LINK ;?>image/background_image/build.jpg" width="155px"> </a>
                       <a href="#" onclick="background('build1',<?php echo $user_id;?>)"> <img
                               src="<?php echo BASE_URL_LINK ;?>image/background_image/build1.jpg" width="155px"></a>
                       <a href="#" onclick="background('build2',<?php echo $user_id;?>)"> <img
                               src="<?php echo BASE_URL_LINK ;?>image/background_image/build2.jpg" width="155px"></a>
                       <a href="#" onclick="background('chair',<?php echo $user_id;?>)"> <img
                               src="<?php echo BASE_URL_LINK ;?>image/background_image/chair.jpg" width="155px"></a>
                       <a href="#" onclick="background('white-bg',<?php echo $user_id;?>)">
                         <button class="search-icon white-bg" style="width:155px;"></button> </a>
                       <!-- <div class="dropdown-divider"></div>
                      <a class="dropdown-item" href="#">Something else here</a> -->
                  </div>
                </div>

                 <?php if (isset($_SESSION['key'])){ ?>

                   <div class="dropdown">
                       <a class="dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
                           aria-haspopup="true" aria-expanded="false">
                           Choose languange
                       </a>

                       <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                           <a href="#" onclick="language('fr',<?php echo $user_id;?>);"><img
                                   src="<?php echo BASE_URL_LINK ;?>image/flag/iconfinder_Flag_of_France_96147.png"
                                   width="30px"></a>
                           <a href="#" onclick="language('en',<?php echo $user_id;?>);"><img
                                   src="<?php echo BASE_URL_LINK ;?>image/flag/iconfinder_Flag_of_United_Kingdom_96354.png"
                                   width="30px"></a>
                           <a href="#" onclick="language('rw',<?php echo $user_id;?>);"><img
                                   src="<?php echo BASE_URL_LINK ;?>image/flag/iconfinder_Flag_of_Rwanda_96263.png"
                                   width="30px"></a>
                       </div>
                    </div>
                  <?php } ?>

                    <div class="dropdown">
                        <a class="dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">
                            Choose Options
                        </a>
                        <div class="dropdown-menu  background-img p-0 bg-dark border border-dark rounded" aria-labelledby="navbarDropdown">
                            <?php echo $home->options0(); ?>
                         </div>
                    </div>

                       <ul style="list-style-type:none; padding:0px;">
                           <li> <a href="#">About</a></li>
                           <li> <a href="#">Contacts</a></li>
                           <li><a href="<?php echo LOGOUT ;?>">Sign out</a></li>
                       </ul>

                   </div>
               </div>
   </aside>
   <!-- Bootstrap core JavaScript
    ================================================== -->
   <!-- Placed at the end of the document so the pages load faster -->
   <!-- <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script> -->
   <!-- <script>window.jQuery || document.write('<script src="dist/vendor/jquery-slim.min.js"><\/script>')</script> -->
   <script src="<?php echo BASE_URL_LINK ;?>dist/js/jquery.min.js"></script>
   <script src="<?php echo BASE_URL_LINK ;?>dist/js/jquery-ui.js"></script>
   <script src="<?php echo BASE_URL_LINK ;?>js/tooltip_Fetch.js"></script>
   <script src="<?php echo BASE_URL_LINK ;?>dist/js/popper.min.js"></script>
   <script src="<?php echo BASE_URL_LINK ;?>dist/js/jquery.dataTables.min.js"></script>
   <!-- <script src="<?php echo BASE_URL_LINK ;?>dist/js/dataTables.bootstrap.min.js"></script> -->
   <script src="<?php echo BASE_URL_LINK ;?>dist/js/bootstrap4.min.js"></script>
   <script src="<?php echo BASE_URL_LINK ;?>dist/js/bootstrap.min.js"></script>
   <!-- Just to make our placeholder images work. Don't actually copy the next line! -->
   <!-- <script src="<?php echo BASE_URL_LINK ;?>dist/js/holder.min.js"></script> -->
   <script src="<?php echo BASE_URL_LINK ;?>dist/js/DirectChat.js"></script>
   <script src="<?php echo BASE_URL_LINK ;?>dist/js/BoxWidget.js"></script>
   <script src="<?php echo BASE_URL_LINK ;?>dist/js/removeChat.js"></script>
   <script src="<?php echo BASE_URL_LINK ;?>dist/js/siderbarResponsive.js"></script>
   <script src="<?php echo BASE_URL_LINK ;?>dist/js/jquery.Jcrop.min.js"></script>
   <script src="<?php echo BASE_URL_LINK ;?>dist/js/lightslider.js"></script> 

    <script src="<?php echo BASE_URL_LINK ;?>dist/js/jquery.range.js"></script>
   <!-- THIS IS JAVASCRIPTS OF VALIDATION FORMS IN BOOTSTRAP! --> 
   <!-- THIS IS JAVASCRIPTS OF VALIDATION FORMS IN BOOTSTRAP! -->
   <script src="<?php echo BASE_URL_LINK ;?>js/profileEdit.js"></script>
   <script src="<?php echo BASE_URL_LINK ;?>js/settings.js"></script>
   <script src="<?php echo BASE_URL_LINK ;?>js/search.js"></script>
   <script src="<?php echo BASE_URL_LINK ;?>js/message_posts.js"></script>
   <script src="<?php echo BASE_URL_LINK ;?>js/hashtag.js"></script>
   <script src="<?php echo BASE_URL_LINK ;?>js/likes.js"></script>
   <script src="<?php echo BASE_URL_LINK ;?>js/share.js"></script>
   <script src="<?php echo BASE_URL_LINK ;?>js/popupPost.js"></script>
   <script src="<?php echo BASE_URL_LINK ;?>js/comment.js"></script>
   <script src="<?php echo BASE_URL_LINK ;?>js/deleteComment.js"></script>
   <script src="<?php echo BASE_URL_LINK ;?>js/popupPostForm.js"></script>
   <script src="<?php echo BASE_URL_LINK ;?>js/fetch_home.js"></script>
   <script src="<?php echo BASE_URL_LINK ;?>js/follow.js"></script>
   <script src="<?php echo BASE_URL_LINK ;?>js/message.js"></script>
   <script src="<?php echo BASE_URL_LINK ;?>js/posts_comments_home.js"></script>
   <script src="<?php echo BASE_URL_LINK ;?>js/postUsermessage.js"></script>
   <script src="<?php echo BASE_URL_LINK ;?>js/notification.js"></script>
   <script src="<?php echo BASE_URL_LINK ;?>js/messageStickyBottom.js"></script>
   <script src="<?php echo BASE_URL_LINK ;?>js/messageStickyRight.js"></script>
   <script src="<?php echo BASE_URL_LINK ;?>js/businesspages.js"></script>
   <script src="<?php echo BASE_URL_LINK ;?>js/businessPost.js"></script>
   <script src="<?php echo BASE_URL_LINK ;?>js/businessPostView.js"></script>
   <script src="<?php echo BASE_URL_LINK ;?>js/businessApplyJobs.js"></script>
   <script src="<?php echo BASE_URL_LINK ;?>js/fundraising_readmore.js"></script>
   <script src="<?php echo BASE_URL_LINK ;?>js/blog_readmore.js"></script>
   <script src="<?php echo BASE_URL_LINK ;?>js/album_image.js"></script>
   <script src="<?php echo BASE_URL_LINK ;?>js/sale_readmore.js"></script>
   <script src="<?php echo BASE_URL_LINK ;?>js/movies_watchreadmore.js"></script>
   <script src="<?php echo BASE_URL_LINK ;?>js/events_addcategories.js"></script>
   <script src="<?php echo BASE_URL_LINK ;?>js/sports_addcategories.js"></script>
   <script src="<?php echo BASE_URL_LINK ;?>js/football_addcategories.js"></script>
   <script src="<?php echo BASE_URL_LINK ;?>js/rwanda_landscapes_add.js"></script>
   <script src="<?php echo BASE_URL_LINK ;?>js/rwanda_landscapes.js"></script>
   <script src="<?php echo BASE_URL_LINK ;?>js/rwandalandscapes.js"></script>
   <script src="<?php echo BASE_URL_LINK ;?>js/news_addcategories.js"></script>
   <script src="<?php echo BASE_URL_LINK ;?>js/businessApplyRead_inbox.js"></script>
   <script src="<?php echo BASE_URL_LINK ;?>js/house_addcategories.js"></script>
   <script src="<?php echo BASE_URL_LINK ;?>js/car_addcategories.js"></script>
   <script src="<?php echo BASE_URL_LINK ;?>js/food_addcategories.js"></script>
   <!-- <script src="<?php echo BASE_URL_LINK ;?>js/food_cart_items.js"></script> -->
   <script src="<?php echo BASE_URL_LINK ;?>js/domestic_addcategories.js"></script>
   <script src="<?php echo BASE_URL_LINK ;?>js/crowfund_addcategories.js"></script>
   <script src="<?php echo BASE_URL_LINK ;?>js/hotel_addcategories.js"></script>
   <script src="<?php echo BASE_URL_LINK ;?>js/unemplyoment_message.js"></script>
   <script src="<?php echo BASE_URL_LINK ;?>js/school_add.js"></script>
   <script src="<?php echo BASE_URL_LINK ;?>js/crowfund_addomments.js"></script>
   <script src="<?php echo BASE_URL_LINK ;?>js/domesticsHelper_profile.js"></script>
   <script src="<?php echo BASE_URL_LINK ;?>js/fund_addcomment.js"></script>
   <script src="<?php echo BASE_URL_LINK ;?>js/fundraising_like.js"></script>
   <script src="<?php echo BASE_URL_LINK ;?>js/fundraising_deleteComment.js"></script>
   <script src="<?php echo BASE_URL_LINK ;?>js/crowfundraising_like.js"></script>
   <script src="<?php echo BASE_URL_LINK ;?>js/crowfundraising_deleteComment.js"></script>
   <script src="<?php echo BASE_URL_LINK ;?>js/blog_like.js"></script>
   <script src="<?php echo BASE_URL_LINK ;?>js/events_like.js"></script>
   <script src="<?php echo BASE_URL_LINK ;?>js/donation.js"></script>
   <script src="<?php echo BASE_URL_LINK ;?>js/house_delete.js"></script>
   <script src="<?php echo BASE_URL_LINK ;?>js/car_delete.js"></script>
   <script src="<?php echo BASE_URL_LINK ;?>js/sale_delete.js"></script>
   <script src="<?php echo BASE_URL_LINK ;?>js/food_delete.js"></script>
   <script src="<?php echo BASE_URL_LINK ;?>js/domesticsHelper_profile_add.js"></script>
   
   <!-- <script src="<?php echo BASE_URL_LINK ;?>js/add_post_ajax.js"></script> -->
   <script src="<?php echo BASE_URL_LINK ;?>js/manage_admins_ajax.js"></script>
   <script src="<?php echo BASE_URL_LINK ;?>js/login_please.js"></script>
   <!-- daterangepicker -->
   <!-- <script src="<?php echo BASE_URL_LINK ;?>plugin/moment/min/moment.min.js"></script> -->
   <!-- <script src="<?php echo BASE_URL_LINK ;?>plugin/bootstrap-daterangepicker/daterangepicker.js"></script> -->
   <!-- datepicker -->
   <!-- <script src="<?php echo BASE_URL_LINK ;?>plugin/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script> -->
  <script src="<?php echo BASE_URL_LINK ;?>dist/js/sly_scroll/slick.min.js" type="text/javascript" charset="utf-8"></script>

   <script src="<?php echo BASE_URL_LINK ;?>lang/language_rw.js"></script>
   <script src="<?php echo BASE_URL_LINK ;?>lang/language_en.js"></script>
   <script src="<?php echo BASE_URL_LINK ;?>lang/language_fr.js"></script>
   <!-- FastClick -->
   <script src="<?php echo BASE_URL_LINK ;?>plugin/fastclick/fastclick.js"></script>
    <script src="<?php echo BASE_URL_LINK ;?>plugin/iCheck/icheck.min.js"></script>
   <!-- Page Script -->
   <script src="<?php echo BASE_URL_LINK ;?>plugin/ckeditor/ckeditor.js"></script>
   <script src="<?php echo BASE_URL_LINK ;?>plugin/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
    <script>
//  FastClick is a simple, easy-to-use library for eliminating
//  the 300ms delay between a physical tap and the firing of a `click` 
//  event on mobile browsers. The aim is to make your application feel less laggy and
//  more responsive while avoiding any interference with your current logic.

$(function() {
    // FastClick.attach(document.body);
    // Replace the <textarea id="editor1"> with a CKEditor
    // instance, using default configuration.
    ClassicEditor
      .create(document.querySelector('#editor1'))
      .then(function (editor) {
        // The editor instance
      })
      .catch(function (error) {
        console.error(error);
      });

    // bootstrap WYSIHTML5 - text editor

    $('.textarea').wysihtml5({
      toolbar: { fa: true }
    });

    //Enable iCheck plugin for checkboxes
    //iCheck for checkbox and radio inputs
    $('.mailbox-messages input[type="checkbox"]').iCheck({
        checkboxClass: 'icheckbox_flat-blue',
        radioClass: 'iradio_flat-blue'
    });

    //Enable check and uncheck all functionality
    $('.checkbox-toggle').click(function() {
        var clicks = $(this).data('clicks');
        if (clicks) {
            //Uncheck all checkboxes
            $('.mailbox-messages input[type=\'checkbox\']').iCheck('uncheck');
            $('.fa', this).removeClass('fa-check-square-o').addClass('fa-square-o');
        } else {
            //Check all checkboxes
            $('.mailbox-messages input[type=\'checkbox\']').iCheck('check');
            $('.fa', this).removeClass('fa-square-o').addClass('fa-check-square-o');
        }
        $(this).data('clicks', !clicks);
    });

    //Handle starring for glyphicon and font awesome
    $('.mailbox-star').click(function(e) {
        e.preventDefault();
        //detect type
        var $this = $(this).find('a > i');
        var glyph = $this.hasClass('glyphicon');
        var fa = $this.hasClass('fa');

        //Switch states
        if (glyph) {
            $this.toggleClass('glyphicon-star');
            $this.toggleClass('glyphicon-star-empty');
        }

        if (fa) {
            $this.toggleClass('fa-star');
            $this.toggleClass('fa-star-o');
        }
    });
});

//   if ('addEventListener' in document) {
// 	document.addEventListener('DOMContentLoaded', function() {
// 		FastClick.attach(document.body);
// 	}, false);
//   }

       var lang = document.body.className;
       console.log(lang);
       if (lang == 'rw') {
           // var json = JSON.stringify(data);
           // var js = JSON.parse(json);
           console.log(en.welcome);
           document.getElementById('welcome-json').innerHTML = rw.welcome;
       } else if (lang == 'fr') {
           console.log(fr.welcome);
           document.getElementById('welcome-json').innerHTML = fr.welcome;
       } else{
           document.getElementById('welcome-json').innerHTML = en.welcome;
       }
  </script>
  <script src="<?php echo BASE_URL_LINK ;?>dist/js/easing.js" type="text/javascript"></script>
    <!-- UItoTop plugin -->
    <script src="<?php echo BASE_URL_LINK ;?>dist/js/jquery.ui.totop.js" type="text/javascript"></script>
    <!-- Starting the plugin -->
    <script type="text/javascript">
        $(document).ready(function() {
            $().UItoTop({ easingType: 'easeOutQuart' });

        });

        /* ****************COUNTING TO TIME************** */
        /* ****************COUNTING TO TIME************** */
        /* ****************COUNTING TO TIME************** */
        var time = function (){
          var year = new Date().getFullYear();
        //   var year = new Date().getFullYear().toString().substr(-2);
          var month_1_ = new Date().getMonth() + 1;
          var month_1 = new Date().getMonth();
          var days= new Date().getDate();
          var hours= new Date().getHours();
          var minutes= new Date().getMinutes();
          var seconds= new Date().getSeconds();
          var week_days= new Date().getDay();
          var weeks= ["Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"];
          var weeks_= ["Sun", "Mon", "Tues", "Wed", "Thurs", "Fri", "Satur"];
          var week= weeks_[week_days];
          var months = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October",
          "November", "December"];
          var months_ = ["Jan", "Feb", "Mar", "Apr", "May", "June", "July", "Aug", "Sept", "Oct",
          "Nov", "Dec"];
          var month=months_[month_1];
          // document.getElementById('time').innerHTML = days + "d " + hours + "h " + minutes + "m " + seconds + "s "+ year + "y";
          // document.getElementById('time').innerHTML = week +" "+month +" " + days +" "+year+", "+ hours +"h:"+ minutes
          // +"m:"+ seconds +"s";
          document.getElementById('clock').innerHTML =
            week + " " +
            month + " "+
            days + ", " +
            year + " " +
            hours + "h:" + 
            minutes + "m:" +
    	    seconds + "s";
        };
        //   document.getElementById('clock').innerHTML =
        //     week + " " +
        //     month + " "+
        //     days + ", " +
        //     year + " " +"<br><span style='magrin-top:2px;'> "+
        //     hours + "h:" + 
        //     minutes + "m:" +
    	//     seconds + "s </span>";
        // };

       var interval = setInterval(function (){time();}, 1000);


    </script>
    <script>
    $('.carousel').carousel({
      interval:8000,
      keyboard: true,
      pause:'hover',
      wrap:true
    });

    $('#slider4').on('slide.bs.carousel', function(){
      console.log('slide');
    });

    $(document).ready(function(){
        var size;
        $('#cropbox').Jcrop({
          bgColor:'black',
          bgOpacity: .4,
          onChange: showPreview,
          aspectRatio: 1,
          onSelect: function(c){
           size = {x:c.x,y:c.y,w:c.w,h:c.h};
           $("#crop").css("visibility", "visible");   
          }
        });
     
        $("#crop").click(function(){
            var img = $("#cropbox").attr('src');
            $("#showcropSubmit").show();
            $("#cropped_img").show();
            $("#cropped_img").attr('src','image-crop.php?x='+size.x+'&y='+size.y+'&w='+size.w+'&h='+size.h+'&img='+img);
        });
    });

    function showPreview(coords)
    {
	    var rx = 100 / coords.w;
	    var ry = 100 / coords.h;
    
	    $('#preview').css({
	    	width: Math.round(rx * 500) + 'px',
	    	height:  Math.round(ry * 500) + 'px',
	    	marginLeft: '-' + Math.round(rx * coords.x) + 'px',
	    	marginTop: '-' + Math.round(ry * coords.y) + 'px'
            });
        $('#x').val(coords.x);
        $('#y').val(coords.y);
        $('#w').val(coords.w);
        $('#h').val(coords.h);
    }

    function checkCoords()
    {
       if (parseInt($('#w').val())) 
       return true;
       alert('Please select a crop region then press submit.');
       return false;
    };

	 $(document).on('click', '#form-crop', function (e) {
        event.preventDefault();

			$.ajax({
				url: "core/ajax_db/profileEdit.php",
				method: "POST",
				data:new FormData(this),
				processData: false,
				contentType: false,
				success: function (response) {
					alert(response);
				}, error: function (xhr, status, error) {
					console.log(status, error);
				}
			});
	});

      $('.regular').slick({
     dots: true,
    //  prevArrow: $('.slick-prev'),
    //  nextArrow: $('.next'),
     infinite: false,
     speed: 300,
     slidesToShow: 1,
     slidesToScroll: 1,
     responsive: [
       {
         breakpoint: 1024,
         settings: {
          slidesToShow: 1,
           slidesToScroll: 1,
           infinite: true,
           dots: true
         }
       },
       {
         breakpoint: 700,
         settings: {
           slidesToShow: 1,
           slidesToScroll: 1
         }
       },
       {
         breakpoint: 480,
         settings: {
           slidesToShow: 1,
           slidesToScroll: 1
         }
       }
       // You can unslick at a given breakpoint now by adding:
       // settings: "unslick"
       // instead of a settings object
       ]
   });

</script>
 <script>
$('.price_range').jRange({
    from: 0,
    to: 500,
    step: 50,
    scale: [0,100,200,300,400,500],
    format: '%s USD',
    width: 300,
    showLabels: true,
    isRange : true,
    theme: "theme-blue",
    onstatechange: function(){
           $('.price_range').change();
        }
});

  $('.price_range').change(function(){
          var price_range = $('.price_range').val();
            $.ajax({
                type: 'POST',
                url: 'core/ajax_db/hotel_add.php',
                data:'price_range='+price_range,
                beforeSend: function () {
                    $('.container').css("opacity", ".5");
                },
                success: function (html) {
                    $('#productContainer').html(html);
                    $('.container').css("opacity", "");
                }
            });
    });
    
//   $('#codecell').change(function(){
//           var province = $('#provincecode');
//           var district = $('#districtcode');
//           var sector = $('#sectorcode');
//           var cell = $('#codecell');
//         if (isEmpty(province) && isEmpty(district) && isEmpty(sector) && isEmpty(cell)){
//           var province = $('#provincecode').val();
//           var district = $('#districtcode').val();
//           var sector = $('#sectorcode').val();
//           var cell = $('#codecell').val();
//           var type_of_school = $('#type_of_school').val();

//             $.ajax({
//                 type: 'POST',
//                 url: 'core/ajax_db/getcell.php',
//                 data:'type_of_school='+type_of_school+'&province='+province+'&district='+district+'&sector'+sector+'&cell='+cell,
//                 beforeSend: function () {
//                     $('.cell-hide').css("opacity", ".5");
//                 },
//                 success: function (html) {
//                     $('#cell-hide').html(html);
//                     $('.cell-hide').css("opacity", "");
//                 }
//             });
//         }
//     });

</script>

    <!-- #endregion Jssor Slider End -->
   </body>

   </html>