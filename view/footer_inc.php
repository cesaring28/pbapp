<?php

/**
 * @author CESAR A3
 * @copyright 2015
 */
//include_once("../config_inc.php");
$OBJ_CLS=new cls_Config();
$V_STR_ROOT=$OBJ_CLS->V_CONFIG['root_dir'];
echo '
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="'.$V_STR_ROOT.'bootstrap335/js/bootstrap.min.js"></script>
  </body>
</html>';
?>