<?php

/**
 * @author Cesar A3
 * @copyright 2015
 */
session_start();
include_once("config_inc.php");
include_once("model/cls_TBLUsers.php");
$OBJ_CONFIG=new cls_Config();
$V_STR_ROOTURL=$OBJ_CONFIG->V_CONFIG['root_url'];
$V_STR_ROOT=$OBJ_CONFIG->V_CONFIG['root_dir'];
date_default_timezone_set($OBJ_CONFIG->V_CONFIG['timezone']);
if($_SERVER["REQUEST_METHOD"]=="POST")
    {
    $V_STR_EMAIL=addslashes($_POST['username']);
    $V_STR_PWDUSR=addslashes($_POST['password']);

    //$V_STR_EMAIL='cesaring28@gmail.com';
    //$V_STR_PWDUSR='cesarin28';

    $OBJ_USER=new cls_TBLUsers(NULL,$V_STR_EMAIL,$V_STR_PWDUSR);
    $V_USER_LOGIN=$OBJ_USER->login_user();
    if ($V_USER_LOGIN==1)
        {
        $_SESSION['login_user']=$V_STR_EMAIL;
        $_SESSION['user_name']=$OBJ_USER->fset_nameuser();
        header("location: ".$V_STR_ROOTURL.$V_STR_ROOT."admin/");
        }
    }
echo '
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="'.$V_STR_ROOT.'img/PBApp.png">

    <title>Phone Book App</title>

    <!-- Bootstrap core CSS -->
    <link href="'.$V_STR_ROOT.'bootstrap335/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/signin.css" rel="stylesheet">
  </head>

  <body>

    <div class="container">

      <form class="form-signin" method="post">
        <h2 class="form-signin-heading">Login Phone Book App</h2>
        <label for="inputEmail" class="sr-only">Email address</label>
        <input name="username" type="email" id="inputEmail" class="form-control" placeholder="Email address" required autofocus>
        <label for="inputPassword" class="sr-only">Password</label>
        <input name="password" type="password" id="inputPassword" class="form-control" placeholder="Password" required>
        <div class="checkbox">
          <label>
            <input type="checkbox" value="remember-me"> Remember me
          </label>
        </div>
        <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
        <div class="form-group">
            <div class="col-md-12 control">
                <div style="border-top: 1px solid#888; padding-top:15px; font-size:85%" >Don\'t have an account! 
                <a href="'.$V_STR_ROOT.'newUser.php">Sign Up Here</a>
                </div>
            </div>
        </div>    

      </form>

    </div> <!-- /container -->
  </body>
</html>
';
?>
