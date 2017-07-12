<?php

/**
 * @author CESAR A3
 * @copyright 2015
 */

session_start();
require_once("../view/header_inc.php");
include_once("../model/cls_TBLUsers.php");
$V_STR_CONTROL=NULL;
if (isset($_SESSION['login']))
    {
    $V_STR_CONTROL=$_SESSION['login'];        
    }
$V_STR_CONTROL="login";
if ($V_STR_CONTROL!="login")
{
    echo '
    <div class="alert alert-danger" role="alert">
        <strong>ERROR!</strong> This is not a valid Page!.
        <a href="index.php">Main Page</a>
    </div>';
}
else
{
    $V_STR_EMAILUSER=NULL;
    $V_STR_PWD=NULL;
    if (isset($_POST['email']))
        $V_STR_EMAILUSER=$_POST['email'];
    if (isset($_POST['password']))
        $V_STR_PWD=$_POST['password'];
        
    $V_STR_EMAILUSER="cesaring28@gmail.com";
    $V_STR_PWD="cesarin28";

    if (is_null($V_STR_EMAILUSER) || $V_STR_EMAILUSER=="" || is_null($V_STR_PWD) || $V_STR_PWD=="")
        {
        echo '
        <div class="alert alert-danger" role="alert">
            <strong>ERROR!</strong> Page without values!.
            <a href="/pbapp/index.php">Main Page</a>
        </div>';            
        exit;
        }
    $OBJ_USER=new cls_TBLUsers(null,$V_STR_EMAILUSER,null);
    $V_SW_EXISTE=$OBJ_USER->search_user();
    if ($V_SW_EXISTE==TRUE)
        {
        $V_STR_PWDUSER=$OBJ_USER->fset_pwduser();
        $V_STR_NOMUSER=$OBJ_USER->fset_nameuser();
        $V_STR_PWDUSER1=$OBJ_USER->pwd_user($V_STR_PWD);
        if ($V_STR_PWDUSER!=$V_STR_PWDUSER1)
            {
            echo '
            <div class="alert alert-warning" role="alert">
                <strong>Warning!</strong> Password Incorrect, Please verify!.
                Please Click <a href="javascript:history.back(1)">Here</a> to return login page.
            </div>';            
            }
        }
    else
        {
        echo '
        <div class="alert alert-warning" role="alert">
            <strong>Warning!</strong> The user doesn\'t exists!.
            please use the register option in top menu.
        </div>';
        }    
}
require_once("../view/footer_inc.php");
?>