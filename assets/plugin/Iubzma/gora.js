<?php 
include('database/db.php');
include('class/Users.php');
include('class/Comment.php');
include('class/Home.php');
include('class/Follow.php');
include('class/Message.php');
include('class/Trending.php');
include('class/Notification.php');
include('class/Fundraising.php');
include('class/Sale.php');
include('class/Blog.php');
include('class/Posts.php');
include('class/Movies.php');
include('class/Events.php');
include('class/Sports.php');
include('class/Football.php');
include('class/Landscapes.php');
include('class/News.php');
include('class/Food.php');
include('class/House.php');
include('class/Car.php');
include('class/Crowfund.php');
include('class/Unemployment.php');
include('class/School.php');
include('class/Domestics.php');
include('class/Hotel.php');

define('BASE_URL_LINK', 'http://localhost:80/Blog_nyarwanda_CMS/assets/');
// SETTING FILE
define('LOGIN', 'http://localhost:80/Blog_nyarwanda_CMS/include/login.php');
define('LOGOUT', 'http://localhost:80/Blog_nyarwanda_CMS/include/logout.php');
define('LOCKSCREEN_LOGIN', 'http://localhost:80/Blog_nyarwanda_CMS/include/lockscreen.php');
define('LOCKSCREEN_LOGINCORE', 'http://localhost:80/Blog_nyarwanda_CMS/core/ajax_db/lockscreen.php?login_id=1');
define('FORGET_PASSPOWRD', 'http://localhost:80/Blog_nyarwanda_CMS/include/forgotpassword.php');
define('CREATE_PASSPOWRD', 'http://localhost:80/Blog_nyarwanda_CMS/include/createpassword.php');
// PRIVATE FILE
define('LOGIN_PRIVATE', 'http://localhost:80/Blog_nyarwanda_CMS/private/include/login_private.php');
define('LOCKSCREEN_LOGIN_PRIVATE', 'http://localhost:80/Blog_nyarwanda_CMS/private/include/lockscreen_private.php');
define('LOGOUT_PRIVATE', 'http://localhost:80/Blog_nyarwanda_CMS/private/include/logout_private.php');
// PRIVATE FILE

// END SETTING FILE
define('HOME', 'http://localhost:80/Blog_nyarwanda_CMS/home.php');
define('ACTIVITIES', 'http://localhost:80/Blog_nyarwanda_CMS/activities.php');
define('INDEXX', 'http://localhost:80/Blog_nyarwanda_CMS/indexx.php');
define('SHOPPING', 'http://localhost:80/Blog_nyarwanda_CMS/shopping.php');
define('FOLLOWERS', 'http://localhost:80/Blog_nyarwanda_CMS/followers.php');
define('FOLLOWING', 'http://localhost:80/Blog_nyarwanda_CMS/following.php');
define('PROFILE', 'http://localhost:80/Blog_nyarwanda_CMS/profile.php');
define('PROFILE_EDIT', 'http://localhost:80/Blog_nyarwanda_CMS/profileEdit.php');
define('HASHTAG', 'http://localhost:80/Blog_nyarwanda_CMS/hashtag.php');
define('JOBS', 'http://localhost:80/Blog_nyarwanda_CMS/jobs.php');
define('NOTIFICATION', 'http://localhost:80/Blog_nyarwanda_CMS/NOTIFICATION.php');
define('SETTINGS', 'http://localhost:80/Blog_nyarwanda_CMS/settings.php');
// PRIVATE_URL_VIEW
define('BASE_URL_PUBLIC', 'http://localhost:80/Blog_nyarwanda_CMS/');
define('BASE_URL_PRIVATE', 'http://localhost:80/Blog_nyarwanda_CMS/private');
define( 'NO_PROFILE_IMAGE_URL', 'image/users_profile_cover/defaultprofileimage.png');
define( 'NO_COVER_IMAGE_URL', 'image/users_profile_cover/defaultCoverImage.png');
// END_PRIVATE_URL_VIEW
// <!-- use PHP Version 5.6.1 > 7.2.20  -->
?>