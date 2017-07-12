<?php
/**
 * @author CESAR A3
 * @copyright 2015
 */
session_start();
require_once("../view/header_inc.php");
include_once("../model/cls_TBLUsers.php");
$OBJ_CONFIG=new cls_Config();
$V_STR_ROOTURL=$OBJ_CONFIG->V_CONFIG['root_url'];
$V_STR_ROOT=$OBJ_CONFIG->V_CONFIG['root_dir'];
$V_STR_CONTROL=NULL;
if (isset($_SESSION['MyPg']))
    {
    $V_STR_CONTROL=$_SESSION['MyPg'];        
    }

//$V_STR_CONTROL="NewUsr";
if ($V_STR_CONTROL!="NewUsr")
    {
    header("Location: ".$V_STR_ROOTURL.$V_STR_ROOT."index.php");
    }
else
    {
    $V_STR_NOMUSER=NULL;
    $V_STR_EMAILUSER=NULL;
    $V_STR_PWD=NULL;
    if (isset($_POST['name']))
        $V_STR_NOMUSER=$_POST['name'];
    if (isset($_POST['email']))
        $V_STR_EMAILUSER=$_POST['email'];
    if (isset($_POST['password']))
        $V_STR_PWD=$_POST['password'];
    /*
    $V_STR_NOMUSER="ANGELICA LOPEZ";
    $V_STR_EMAILUSER="angelica.lopeztorres@gmail.com";
    $V_STR_PWD="CesMao20";
    */
    if (is_null($V_STR_NOMUSER) || $V_STR_NOMUSER=="" || is_null($V_STR_EMAILUSER) || $V_STR_EMAILUSER=="" || is_null($V_STR_PWD) || $V_STR_PWD=="")
        {
        echo '
        <div class="alert alert-danger" role="alert">
            <strong>ERROR!</strong> Page without values!.
            <a href="'.$V_STR_ROOT.'index.php">Main Page</a>
        </div>';            
        exit;
        }
    $OBJ_USER=new cls_TBLUsers($V_STR_NOMUSER,$V_STR_EMAILUSER,$V_STR_PWD);
    $V_SW_EXISTE=$OBJ_USER->search_user();
    if ($V_SW_EXISTE==TRUE)
        {
        echo '
        <div class="alert alert-warning" role="alert">
            <strong>Warning!</strong> The user exists!.
        </div>
        <div class="alert alert-warning" role="alert">
            Please Click <a href="'.$V_STR_ROOT.'index.php">Here</a> to login into the application.
        </div>';
        }
    else
        {
        $OBJ_USER->save_user();
        echo '
        <div class="alert alert-success" role="alert">
            <strong>Congratulations!</strong> user successfully registered.
        </div>
        <div class="alert alert-success" role="alert">
            Please Click <a href="'.$V_STR_ROOT.'index.php">Here</a> to login into the application.
        </div>';
        }
    
    }
require_once("../view/footer_inc.php");
?>