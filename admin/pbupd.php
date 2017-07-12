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
    $V_NUM_PHONE=$_POST['phone1'];
    $V_STR_NAME=addslashes($_POST['name']);
    $V_FEC_DATEADD=$_POST['date_add'];
    $V_STR_NOTES=addslashes($_POST['add_notes']);
    /*
    $V_NUM_PHONE="2243494";
    $V_STR_NAME="DORITA MINUTO DE DIOS ANTES";
    $V_FEC_DATEADD="2015-08-14";
    $V_STR_NOTES="REGISTRO DE PRUEBAS MINUTO DE DIOS BLOQUE D APTO 509";
    */
    $V_OBJPB=new cls_TBLPhoneBook($V_STR_NAME,$V_NUM_PHONE,$V_FEC_DATEADD,$V_STR_NOTES);
    $V_SW_UPDATE=$V_OBJPB->update_phonebook();
    if ($V_SW_UPDATE==1)
        {
        header("Location: ".$V_STR_ROOTURL.$V_STR_ROOT."/admin/index.php");
        }
    else
        {
        echo'
        <div class="alert alert-danger alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <strong>Failed to Update Record!</strong> Please try later.
        </div>';
        exit;
        }            
    }
if (isset($_GET['P_ID']))
    {
    $V_NUM_PHONE=$_GET['P_ID'];
    $V_OBJPB=new cls_TBLPhoneBook(NULL,$V_NUM_PHONE,NULL,NULL);
    $V_SW_EXIST=$V_OBJPB->search_phone();
    if ($V_SW_EXIST==FALSE)
        {
        echo'
        <div class="alert alert-danger alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <strong>ERROR!</strong> Record Doesn\'t Exists.
        </div>';
        exit;
        }
    else
        {
        $V_STR_NAME=$V_OBJPB->fset_name();
        $V_FEC_DATEADD=$V_OBJPB->fset_dateadd();
        $V_STR_NOTES=$V_OBJPB->fset_addnotes();
        $V_STR_NOTES=$V_OBJPB->fset_addnotes();
        }
    }
$V_STR_NOMUSER=$_SESSION['user_name'];
$_SESSION['field_locked']="readonly";
include_once("../view/header2_inc.php");
include_once("../view/formPB_inc.php");
?>