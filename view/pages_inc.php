<?php
/**
 * @author CESAR A3
 * @copyright 2015
 */

function pagination($P_COUNT, $P_XPAGE=10, $P_HREFER) {
	$V_STR_OUTPUT = '';
	$V_STR_PAGINGID = "link_perpage_box";
	if(!isset($_POST["page_number"])) 
        $_POST["page_number"] = 1;
	if($P_XPAGE != 0)
        $V_NUM_PAGES  = ceil($P_COUNT/$P_XPAGE);
	if($V_NUM_PAGES>1) 
        {
		if(($_POST["page_number"]-3)>0) 
            {
			if($_POST["page_number"] == 1)
				$V_STR_OUTPUT = $V_STR_OUTPUT . '<span id=1 class="current-page">1</span>';
			else				
				$V_STR_OUTPUT = $V_STR_OUTPUT . '<input type="submit" name="page_number" class="perpage-link" value="1" />';
            }
        if(($_POST["page_number"]-3)>1) 
            {
            $V_STR_OUTPUT = $V_STR_OUTPUT . '...';
            }
		
		for($i=($_POST["page_number"]-2); $i<=($_POST["page_number"]+2); $i++)	
            {
			if($i<1) 
                continue;
			if($i>$V_NUM_PAGES)
                break;
			if($_POST["page_number"] == $i)
				$V_STR_OUTPUT = $V_STR_OUTPUT . '<span id='.$i.' class="current-page" >'.$i.'</span>';
			else				
				$V_STR_OUTPUT = $V_STR_OUTPUT . '<input type="submit" name="page_number" class="perpage-link" value="' . $i . '" />';
            }
		
		if(($V_NUM_PAGES-($_POST["page_number"]+2))>1)
            {
			$V_STR_OUTPUT = $V_STR_OUTPUT . '...';
            }
		if(($V_NUM_PAGES-($_POST["page_number"]+2))>0)
            {
			if($_POST["page_number"] == $V_NUM_PAGES)
				$V_STR_OUTPUT = $V_STR_OUTPUT . '<span id=' . ($V_NUM_PAGES) .' class="current-page">' . ($V_NUM_PAGES) .'</span>';
			else				
				$V_STR_OUTPUT = $V_STR_OUTPUT . '<input type="submit" name="page_number" class="perpage-link" value="' . $V_NUM_PAGES . '" />';
            }
        }
	return $V_STR_OUTPUT;
}
	
function show_pagination($P_SQL, $P_XPAGE = 10, $P_HREFER) {
	$V_STR_RESULT  = mysql_query($P_SQL);
	$V_NUM_COUNT   = mysql_num_rows($V_STR_RESULT);
	$V_STR_PAGES = pagination($V_NUM_COUNT,$P_XPAGE,$P_HREFER);
	return $V_STR_PAGES;
}
?>