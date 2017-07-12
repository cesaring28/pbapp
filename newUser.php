<?php
include_once("view/header1_inc.php");
session_start();
$_SESSION['MyPg']="NewUsr";
echo '
<div class="container">
  <div class="row-fluid">
    <div class="span12">
    <h2>Phone Book App - Registration form</h2>
    </div>
  </div>
  <div class="row-fluid">
  <div class="span6 offset6">
    <div id="maincontent" class="span8"> 
      
      <form id="registration-form" class="form-horizontal" action="controller/newUser1.php" method="post">
       
          <h4>New user Registration<small>(Fill up the form to get register)</small></h4>
          <br/>
          
          <div class="form-control-group">
            <label class="control-label" for="name">First and Last Name</label>
            <div class="controls">
              <input type="text" class="input-xlarge" name="name" id="name">
            </div>
          </div>

          <div class="form-control-group">
            <label class="control-label" for="email">Email Address</label>
            <div class="controls">
              <input type="text" class="input-xlarge" name="email" id="email">
            </div>
          </div>
          
          <div class="form-control-group">
            <label class="control-label" for="name">Password</label>
            <div class="controls">
              <input type="password" class="input-xlarge" name="password" id="password">
            </div>
          </div>
          
          <div class="form-control-group">
            <label class="control-label" for="name"> Retype Password</label>
            <div class="controls">
              <input type="password" class="input-xlarge" name="confirm_password" id="confirm_password">
            </div>
          </div>
                              
          <div class="form-actions">
            <button type="submit" class="btn btn-success btn-large">Register</button>
            <button type="reset" class="btn">Cancel</button>
          </div>
  
      </form>
    </div>
    <!-- .span --> 
  </div>
  <!-- .row -->
  
</div>
<!-- .container --> 

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
