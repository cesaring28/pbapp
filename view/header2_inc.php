<?php

/**
 * @author CESAR A3
 * @copyright 2015
 */
if (!isset($_SESSION['on']) || $_SESSION!=TRUE)
    {
    session_start();
    }
include_once("../config_inc.php");
$V_OBJCFG=new cls_Config();
date_default_timezone_set($V_OBJCFG->V_CONFIG['timezone']);
$V_STR_ROOTURL=$V_OBJCFG->V_CONFIG['root_url'];
$V_STR_ROOT=$V_OBJCFG->V_CONFIG['root_dir'];
$V_STR_NOMUSER=NULL;
if (isset($_SESSION['login_user']))
    {
    $V_STR_NOMUSER=$_SESSION['user_name'];
    $V_STR_EMAIL=$_SESSION['login_user'];
    }
//$V_STR_NOMUSER="CESAR A3";
if (is_null($V_STR_NOMUSER) || $V_STR_NOMUSER="")
    {
    header("Location: ".$V_STR_ROOTURL.$V_STR_ROOT."index.php");
    }
$V_STR_NOMUSER=$_SESSION['user_name'];
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
        <!-- Bootstrap theme -->
        <link href="'.$V_STR_ROOT.'bootstrap335/css/bootstrap-theme.min.css" rel="stylesheet">
    
        <!-- Custom styles for this template -->
        <link href="'.$V_STR_ROOT.'css/theme.css" rel="stylesheet">
        <link href="'.$V_STR_ROOT.'css/style.css" rel="stylesheet">
        <link href="'.$V_STR_ROOT.'css/prettify.css" rel="stylesheet">
        <script src="'.$V_STR_ROOT.'js/prettify.js"></script>
        <link href="'.$V_STR_ROOT.'css/datepicker.css" rel="stylesheet">
    </head>
  <body>
    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">Welcome to Phone Book Application '.$V_STR_NOMUSER.'</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
            
            <li><a href="'.$V_STR_ROOT.'logout.php">Log Out</a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>';
?>