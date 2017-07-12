<?php

/**
 * @author Cesar A3
 * @copyright 2015
 */
session_start();
$_SESSION['on']=TRUE;
include_once("../config_inc.php");
include_once("../model/cls_TBLPhoneBook.php");
require_once("../view/pages_inc.php");
$V_OBJCFG=new cls_Config();
$V_OBJPB=new cls_TBLPhoneBook(NULL,NULL,NULL,NULL);
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
$V_STR_NAME = "";
$V_STR_PHONE = "";
$V_FEC_DATEADD="";
$V_STR_NOTES="";
$V_STR_QCOND = "";
if(!empty($_POST["search"])) 
    {
	foreach($_POST["search"] as $V_KEY_SEARCH=>$V_STR_SEARCH)
        {
		if(!empty($V_STR_SEARCH)) 
            {
			$V_ARR_SEARCHFIELDS = array("name","phone","date_add","add_notes");
			if(in_array($V_KEY_SEARCH,$V_ARR_SEARCHFIELDS)) 
                {
				if(!empty($V_STR_QCOND)) 
                    {
					$V_STR_QCOND .= " AND ";
                    } 
                else
                    {
					$V_STR_QCOND .= " WHERE ";
                    }
                }
			switch($V_KEY_SEARCH) 
                {
				case "name":
					$V_STR_NAME = $V_STR_SEARCH;
					$V_STR_QCOND .= "name LIKE '%" . $V_STR_SEARCH . "%'";
					break;
				case "phone":
					$V_STR_PHONE = $V_STR_SEARCH;
					$V_STR_QCOND .= "phone LIKE '%" . $V_STR_SEARCH . "%'";
					break;
				case "date_add":
					$V_FEC_DATEADD = $V_STR_SEARCH;
					$V_STR_QCOND .= "date_add LIKE '%" . $V_STR_SEARCH . "%'";
					break;
				case "add_notes":
					$V_STR_NOTES = $V_STR_SEARCH;
					$V_STR_QCOND .= "add_notes LIKE '%" . $V_STR_SEARCH . "%'";
					break;
			    }
            }
        }
    }

$V_STR_SQL = "SELECT * FROM phonebook " . $V_STR_QCOND;
$V_STR_MAINPAGE = $V_STR_ROOTURL.$V_STR_ROOT.'admin/index.php';
$V_NUM_PERPAGE = $V_OBJCFG->V_CONFIG['per_page'];
$V_NUM_PAGE = 1;
if(isset($_POST['page_number']))
    {
	$V_NUM_PAGE = $_POST['page_number'];
    }
$V_NUM_START = ($V_NUM_PAGE-1)*$V_NUM_PERPAGE;
if($V_NUM_START < 0) 
    $V_NUM_START = 0;
$V_STR_ORDER="ORDER BY phone";
$V_STR_QUERY =  "$V_STR_SQL $V_STR_ORDER LIMIT $V_NUM_START,$V_NUM_PERPAGE";
$V_ARR_RESULT=$V_OBJPB->read_phones($V_STR_QUERY);
$V_NUM_TOTREG=0;
if(!empty($V_ARR_RESULT)) 
    {
    $V_NUM_TOTREG=$V_OBJPB->phone_count();
	$V_ARR_RESULT["per_page"] = show_pagination($V_STR_SQL, $V_NUM_PERPAGE, $V_STR_MAINPAGE);
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
    <link href="'.$V_STR_ROOT.'css/starter-template.css" rel="stylesheet">
    <link href="'.$V_STR_ROOT.'css/style.css" rel="stylesheet">

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
    </nav>

    <div class="container">
      <div class="starter-template">
        <h2>Phone Book Application - Table maintenance</h2>
      </div>
    </div><!-- /.container -->
    <p>
        <a class="btn btn-primary" href="'.$V_STR_ROOTURL.$V_STR_ROOT.'admin/pbadd.php" role="button">Add Data</a>
    </p>
    <form name="formSearch" method="post" action="'.$V_STR_ROOT.'admin/index.php">
    	<div class="input-group input-group-sm">
        <span class="input-group-addon" id="sizing-addon3">Search Phone</span><input type="text" name="search[phone]" class="form-control" placeholder="Phone Number" aria-describedby="sizing-addon3" value="'.$V_STR_PHONE.'"> <span class="input-group-addon" id="sizing-addon3">Search Name</span><input type="text" name="search[name]" class="form-control" placeholder="Name" aria-describedby="sizing-addon3" value="'.$V_STR_NAME.'"> <span class="input-group-addon" id="sizing-addon3">Search Date</span><input type="text" name="search[date_add]" class="form-control" placeholder="Date" aria-describedby="sizing-addon3" value="'.$V_FEC_DATEADD.'"> <span class="input-group-addon" id="sizing-addon3">Search Notes</span><input type="text" name="search[add_notes]" class="form-control" placeholder="Notes" aria-describedby="sizing-addon3" value="'.$V_STR_NOTES.'"> 
        <span class="input-group-btn"><input type="submit" name="Search" class="btn btn-sm btn-success" value="Search"></span>
        <span class="input-group-btn"><input type="reset" class="btn btn-sm btn-warning" value="Reset" onclick="window.location=\''.$V_STR_MAINPAGE.'\'">
    	</div>';
    if ($V_NUM_TOTREG>0)
        {
        echo '
        <table class="table table-bordered table-hover table-striped">
    	<caption></caption>
    	<thead>
            <tr>
                <th>#</th>
                <th>Phone</th>
                <th>Name</th>
                <th>Date Add</th>
                <th>Notes</th>
            </tr>
    	</thead>
    	<tbody>';
        $V_NUM_CONTA=0;
        foreach($V_ARR_RESULT AS $V_KEY_RESULT=>$V_REG_RESULT)
            {
            $V_NUM_CONTA++;
            if (is_numeric($V_KEY_RESULT))
                {
                echo '
                <tr>
                    <td>'.$V_NUM_CONTA.'</td>
                    <td>'.$V_ARR_RESULT[$V_KEY_RESULT]["phone"].'</td>
                    <td>'.$V_ARR_RESULT[$V_KEY_RESULT]["name"].'</td>
                    <td>'.$V_ARR_RESULT[$V_KEY_RESULT]["date_add"].'</td>
                    <td>'.$V_ARR_RESULT[$V_KEY_RESULT]["add_notes"].'</td>
                    <td width=\'100px\'>
                	    <a class=\'btn btn-warning btn-sm\' href=\'pbupd.php?P_ID='.$V_ARR_RESULT[$V_KEY_RESULT]["phone"].'\' role=\'button\'><span class=\'glyphicon glyphicon-pencil\' aria-hidden=\'true\'></span></a>
                	    <a class=\'btn btn-danger btn-sm\' href=\'pbdel.php?P_ID='.$V_ARR_RESULT[$V_KEY_RESULT]["phone"].'\' role=\'button\'><span class=\'glyphicon glyphicon-trash\' aria-hidden=\'true\'></span></a>
                    </td>
                </tr>';
                }
            }
        if (isset($V_ARR_RESULT["per_page"]))
            {
            echo '
            <tr>
                <td colspan="6" align=right>'.$V_ARR_RESULT["per_page"].'</td>
            </tr>';
            }
        echo '
        </tbody>
        </table>
        ';
        }
    else
        {
        echo '
        <div class="alert alert-warning alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <strong>Warning!</strong> NO Data Found. Please Verify the Search Options or Add new Records.
        </div>';
        }
    echo '</form>
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="'.$V_STR_ROOT.'bootstrap335/js/bootstrap.min.js"></script>
  </body>
</html>';
?>