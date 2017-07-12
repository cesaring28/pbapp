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
include_once("../model/cls_TBLPhoneBook.php");
$V_OBJCFG=new cls_Config();
date_default_timezone_set($V_OBJCFG->V_CONFIG['timezone']);
$V_STR_ROOTURL=$V_OBJCFG->V_CONFIG['root_url'];
$V_STR_ROOT=$V_OBJCFG->V_CONFIG['root_dir'];
$V_STR_MAINPAGE=$V_STR_ROOTURL.$V_STR_ROOT."admin/index.php";
$V_STR_NOMUSER=NULL;
if (isset($_SESSION['login_user']))
    {
    $V_STR_NOMUSER=$_SESSION['user_name'];
    }
//$V_STR_NOMUSER="CESAR A3";
if (is_null($V_STR_NOMUSER) || $V_STR_NOMUSER=="")
    {
    header("Location: ".$V_STR_ROOTURL.$V_STR_ROOT."index.php");
    }
if ($_POST)
    {
    $V_NUM_PHONE=$_POST['phone'];
    $V_STR_NAME=addslashes($_POST['name']);
    $V_FEC_DATEADD=$_POST['date_add'];
    $V_STR_NOTES=addslashes($_POST['add_notes']);
    /*
    $V_NUM_PHONE="5712759900";
    $V_STR_NAME="NOMBRE DE PRUEBA";
    $V_FEC_DATEADD="2015-08-14";
    $V_STR_NOTES="REGISTRO DE PRUEBAS";
    */
    $V_OBJPB=new cls_TBLPhoneBook($V_STR_NAME,$V_NUM_PHONE,$V_FEC_DATEADD,$V_STR_NOTES);
    $V_SW_GRABA=$V_OBJPB->save_phonebook();
    if ($V_SW_GRABA==2)
        {
        echo'
        <div class="alert alert-danger alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <strong>Warning!</strong> This Phone Number Already Exists.
        </div>';
        }
    else
        {
        if ($V_SW_GRABA==1)
            {
            echo '
            <div class="alert alert-success alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <strong>Record Saved!</strong> <a href="'.$V_STR_ROOTURL.$V_STR_ROOT.'admin/index.php">View Data</a>.
            </div>';
            }
        else
            {
            echo'
            <div class="alert alert-danger alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <strong>Failed to Save Record!</strong> Please try later.
            </div>';
            }            
        }
    }
$V_STR_NOMUSER=$_SESSION['user_name'];
$_SESSION['field_locked']=NULL;
include_once("../view/header2_inc.php");
include_once("../view/formPB_inc.php");
?>