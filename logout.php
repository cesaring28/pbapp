<?php

/**
 * @author Cesar A3
 * @copyright 2015
 */
session_start();
include_once("config_inc.php");
if(session_destroy())
    {
    $OBJ_CONFIG=new cls_Config();
    $V_STR_ROOTURL=$OBJ_CONFIG->V_CONFIG['root_url'];
    $V_STR_ROOT=$OBJ_CONFIG->V_CONFIG['root_dir'];
    header("location: ".$V_STR_ROOTURL.$V_STR_ROOT."index.php");
    }


?>