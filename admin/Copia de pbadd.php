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
if (is_null($V_STR_NOMUSER) || $V_STR_NOMUSER="")
    {
    header("Location: ".$V_STR_ROOTURL.$V_STR_ROOT."index.php");
    }
if ($_POST)
    {
    $V_NUM_PHONE=$_POST['phone'];
    $V_STR_NAME=$_POST['name'];
    $V_FEC_DATEADD=$_POST['date_add'];
    $V_STR_NOTES=$_POST['add_notes'];
    $V_OBJPB=new cls_TBLPhoneBook($V_STR_NAME,$V_NUM_PHONE,$V_FEC_DATEADD,$V_STR_NOTES);
    $V_SW_GRABA=$V_OBJPB->save_phonebook();
    if (!$V_SW_GRABA)
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
$V_STR_NOMUSER=$_SESSION['user_name'];
include_once("../view/header2_inc.php");
echo '
<div class="row-fluid">
    <div class="span6 offset6">
        <div id="maincontent" class="span8"> 
            <form id="form-pb" class="form-horizontal" method="post">
              <h4>Phone Book Record</h4>
              <br/>
            
              <div class="form-control-group">
                <label class="control-label" for="phone">Phone Number</label>
                <div class="controls">
                  <input type="text" class="input-xlarge" name="phone" id="phone">
                </div>
              </div>
            
              <div class="form-control-group">
                <label class="control-label" for="name">Name</label>
                <div class="controls">
                  <input type="text" class="input-xlarge" name="name" id="name">
                </div>
              </div>
            
              <div class="form-control-group">
                <label class="control-label" for="date_add">Date Add</label>
                <div class="controls">
                  <input type="text" class="input-xlarge" name="date_add" id="date_add">
                </div>
              </div>
            
              <div class="form-control-group">
                <label class="control-label" for="add_notes">Additional Notes</label>
                <div class="controls">
                  <textarea class="input-xlarge" rows="3" id="add_notes" name="add_notes"></textarea>
                </div>
              </div>
            
              <button type="submit" class="btn btn-success">Submit</button>
              <input type="reset" class="btn btn-warning" value="Back" onclick="window.location=\''.$V_STR_MAINPAGE.'\'">
            </form>
        </div>
    </div>
</div>
<script src="js/jquery-1.7.1.min.js"></script> 
<script src="js/jquery.validate.js"></script> 
<script src="js/script.js"></script> 
<script>
		addEventListener(\'load\', prettyPrint, false);
		$(document).ready(function(){
		$(\'pre\').addClass(\'prettyprint linenums\');
			});
</script> 
</body>
</html>';
?>