<?php
class cDelete {
	function _dDeleteData($field,$value,$table) 
	{
		$sqldel = "DELETE FROM ".$table." WHERE ".$field." = ".$value ;
		//echo $sqldel;
		$query = mysqli_query($GLOBALS["conn"],$sqldel);
		//echo dError("Data sudah dihapus","yes");
		if ($query) {
			echo '<div class="alert alert-success" role="alert"><span class="glyphicon glyphicon-ok" aria-hidden="true"></span>&nbsp;Data berhasil dihapus</div>';
		} else {
			echo '<div class="alert alert-danger" role="alert"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span>&nbsp;Terjadi kesalahan, data gagal dihapus</div>';
		}
	}
}
?>