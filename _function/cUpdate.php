<?php
class cUpdate {
	// penerimaan
    function vUpdateData($afields,$atable,$avalues,$datakey) {
		$countarray_field = count($afields)-1;
		$countarray_value = count($avalues)-1;
		$fieldname = "";
		$datavalue = "";
		for ($i=0;$i<=$countarray_field;$i++) {
			if ($i==$countarray_field) {
				$separator = "";
			} else {
				$separator = ",";
			}
			$fieldname=$fieldname.$afields[$i].'='.$avalues[$i].$separator;
		}
		$allstatement = "UPDATE ".$atable." SET ".$fieldname." WHERE ".$datakey."";
		$query = $allstatement;
		//echo $query;
		
		$result = mysql_query($query);
		if ($result) {
			echo '<div class="alert alert-success" role="alert"><span class="glyphicon glyphicon-ok" aria-hidden="true"></span>&nbsp;Data berhasil diedit/update</div>';
		} else {
			echo '<div class="alert alert-danger" role="alert"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span>&nbsp;Terjadi kesalahan, data gagal diedit/update</div>';
		}
		
	}
}
?>