<?php

/**
 * @author CESAR A3
 * @copyright 2015
 */

echo '
<div class="row-fluid">
    <div class="span6 offset6">
        <div id="maincontent" class="span8"> 
            <form id="form-pb" class="form-horizontal" method="post">
              <div class="alert alert-danger" role="alert">
                  <strong><h4>Are You sure to Delete Record?</h4></strong>
              </div>
              <br/>
            
              <div class="form-control-group">
                <label class="control-label" for="phone">Phone Number</label>
                <div class="controls">
                  <input type="text" class="input-xlarge" name="phone" id="phone" value="'.$V_NUM_PHONE.'" onkeypress="return event.charCode === 0 || /\d/.test(String.fromCharCode(event.charCode));" disabled>
                </div>
              </div>
            
              <div class="form-control-group">
                <label class="control-label" for="name">Name</label>
                <div class="controls">
                  <input type="text" class="input-xlarge" name="name" id="name" value="'.$V_STR_NAME.'" disabled>
                </div>
              </div>
            
              <div class="form-control-group">
                <label class="control-label" for="date_add">Date Add</label>
                <div class="controls">
                  <input type="text" class="input-xlarge" name="date_add" id="date_add" value="'.$V_FEC_DATEADD.'" disabled>
                </div>
              </div>
            
              <div class="form-control-group">
                <label class="control-label" for="add_notes">Additional Notes</label>
                <div class="controls">
                  <textarea readonly class="input-xlarge" rows="3" id="add_notes" name="add_notes">'.$V_STR_NOTES.'</textarea>
                </div>
              </div>
            
              <button type="submit" class="btn btn-sm btn-danger">Yes</button>
              <input type="reset" class="btn btn-sm btn-primary" value="Back" onclick="window.location=\''.$V_STR_MAINPAGE.'\'">
              <input type="hidden" name="phone1" value="'.$V_NUM_PHONE.'">
            </form>
        </div>
    </div>
</div>
<script src="../js/jquery-1.7.1.min.js"></script> 
<script src="../js/jquery.validate.js"></script> 
<script src="../js/validate_pbdata.js"></script> 
<script>
		addEventListener(\'load\', prettyPrint, false);
		$(document).ready(function(){
		$(\'pre\').addClass(\'prettyprint linenums\');
			});
</script> 
</body>
</html>';
?>