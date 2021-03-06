<?php
/**
 * @author CESAR A3
 * @copyright 2015
 */
include_once("../config_inc.php");
$OBJ_CLS=new cls_Config();
date_default_timezone_set($OBJ_CLS->V_CONFIG['timezone']);
$V_STR_ROOT=$OBJ_CLS->V_CONFIG['root_dir'];
echo '
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

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
<body>
    <!-- Fixed navbar -->
    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">Phone Book Application</a>
        </div>
      </div>
    </nav>';
?>