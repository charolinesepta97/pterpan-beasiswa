<?php
class cView {
	function vViewData($sSql) {
		$data = array();
		$query = mysql_query($sSql);
		while( $row=mysql_fetch_array($query) ) 
		$data[]=$row;
		return $data;
	}

	


}
?>