<?php
if (isset ( $_GET [VIEW] )) {
	switch ($_GET [VIEW]) {
		case CREATE : 
		case EDIT : require_once ('public/pages/User/pageFormUser.php'); break;
		default :
			require_once ('public/pages/User/pageViewTable.php');
	}
} else {
	require_once ('public/pages/User/pageViewTable.php');
}
?>