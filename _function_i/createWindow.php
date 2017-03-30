<?php
function _CreateFormUpdatex($i,$divid,$buttonid){
$lebar = "600";
$divid  =  $divid.$i;
$buttonid = $buttonid.$i;
echo "<script>";
	echo "$(function() {";
		echo 'var link = "#'.$divid.'";';
		echo 'var tombol = "#'.$buttonid.'";';
		echo '$( link ).dialog({';
		echo 'autoOpen: false,';
		echo 'height: 600,';
		echo 'width: '.$lebar.',';
		echo 'modal: true';			
		echo '});';
		echo '$( tombol )';
		echo '.button()';
		echo '.click(function() {';
		echo '$(link).dialog( "open" );';
		echo '});';
	echo '});';
echo "</script>";
}
?>