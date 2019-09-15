<?php 
session_start();
include "../core/init.php";

if (!isset($_SESSION['keys'])) {
     header('location: '.LOGIN.'');
    exit();
}

// if (isset($_SESSION['key'])) {
//      header('location: '.HOME.'');
//     exit();
// }

if (isset($_POST['key']) == 'lockscreen') {
    
    $password = $db->real_escape_string($_POST['password']);
    $sql= $db->query("SELECT user_id ,username FROM users WHERE user_id= $_SESSION[keys] AND password='{$password}' ");
    $row= $sql->fetch_assoc();

    if ($sql->num_rows > 0) {
        $datetime= date('Y-m-d H-i-s');
        $db->query("UPDATE users SET last_login = '$datetime'  WHERE user_id= $_SESSION[keys] AND password= '$password' ");
        $db->query("UPDATE users SET counts_login=counts_login + 1 WHERE user_id= $_SESSION[keys] AND password= '$password' ");
        $_SESSION['key'] = $row['user_id'];
        $_SESSION['username'] = $row['username'];
        exit ('<p style="color:green;">success</p>');
    }else{
        exit ('<p style="color:red;">Please Try Again ...?</p>');
    }
    $users->forgotUsernameCountsTodelete('users',
          array('forgotUsernameCounts' => 0, ),$_SESSION['keys']);
  } 

?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>AdminLTE 2 | Lockscreen</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->
    <link href="<?php echo BASE_URL_LINK ;?>dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo BASE_URL_LINK ;?>dist/css/lockscreen.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?php echo BASE_URL_LINK ;?>icon/font-awesome/css/font-awesome.min.css">
    <!-- <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic"> -->
</head>

<body class="hold-transition lockscreen">
    <!-- Automatic element centering -->
    <div class="lockscreen-wrapper">
        <div class="lockscreen-logo">
            <a href="<?php echo LOGIN ;?>"><b>Menya</b>LTE</a>
        </div>
        <!-- User name -->
        <div class="lockscreen-name"><?php echo $_SESSION['username'];?></div>

        <!-- START LOCK SCREEN ITEM -->
        <div class="lockscreen-item">
            <!-- lockscreen image -->
            <div class="lockscreen-image">
                <img src="<?php echo BASE_URL_LINK ;?>image/img/user1-128x128.jpg" alt="User Image">
            </div>
            <!-- /.lockscreen-image -->

            <!-- lockscreen credentials (contains the form) -->
            <form class="lockscreen-credentials">
                <div class="input-group">
                    <input type="password" id="Password" class="form-control" placeholder="password">
                    <div class="input-group-append">
                        <span class="input-group-text btn" onclick="lockscreen('lockscreen')" aria-label="Username"
                            aria-describedby="basic-addon1"><i class="fa fa-arrow-right text-muted"></i></span>
                    </div>
                </div>
            </form>
            <!-- /.lockscreen credentials -->
            <p id="error"></p>
            <!-- <p id="response"></p> -->
        </div>
        <!-- /.lockscreen-item -->

        <div class="help-block text-center">
            Enter your password
        </div>
        <div class="help-block text-center">
            or
        </div>
        <div class="text-center">
            <a href="logout.php">Sign in as a different User</a>
        </div>
    </div>

    <!-- /.center -->
    <div class="lockscreen-footer text-center">
        Copyright &copy; 2018-2019 <b><a href="https://adminlte.io" class="text-black">Fayzo Studio</a>
        </b><br> All rights reserved
    </div>

    <!-- jQuery 3 -->
    <script src="<?php echo BASE_URL_LINK ;?>dist/js/jquery.min.js"></script>
    <script src="<?php echo BASE_URL_LINK ;?>dist/js/popper.min.js"></script>
    <script src="<?php echo BASE_URL_LINK ;?>dist/js/bootstrap.min.js"></script>
    <script>
    function lockscreen(key) {
        var password = $("#Password");
        //   use 1 or second method to validaton
        if (isEmpty(password)) {
            //    alert("complete register");
            $.ajax({
                url: "lockscreen.php",
                method: "POST",
                dataType: "text",
                data: {
                    key: key,
                    password: password.val(),
                },
                success: function(response) {
                    $("#response").html(response);
                    console.log(response);
                    if (response.indexOf('success') >= 0) {
                        setInterval(() => {
                            window.location = '../home.php';
                        }, 1000);
                    } else {
                        isEmptys(password);
                    }
                }
            });
        }
    }

    function isEmpty(caller) {
        if (caller.val() == "") {
            caller.css("border", "1px solid red");
            $('#error').html("Please fill in ...?").css("color", "red");
            $('body').attr("id", 'red');
            return false;
        } else {
            caller.css("border", "1px solid green");
            $('body').attr("id", 'green');
            $('#error').html("Success").css("color", "green");
        }
        return true;
    }

    function isEmptys(caller) {
        if (caller.val() != "") {
            caller.css("border", "1px solid red");
            $('#error').html("Please Try Again ...?").css("color", "red");
            $('body').attr("id", 'red');
            return false;
        }
        return true;
    }
    $('body').attr("id", 'white');
    </script>
</body>

</html>