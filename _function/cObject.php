<?php 
class cObject {
	function _myobject($object,$name,$class,$id,$value,$caption,$maxlength,$size,$rows,$cols,$required) {
		switch ($object) {
			case 1:
				$class="textbox";
				echo '<input type="text" name="'.$name.'" class="'.$class.'" id="'.$id.'" value="'.$value.'" maxlength="'.$maxlength.'" size="'.$size.'" '.$required.'>';
				break;
			case 2:
				echo '<input type="hidden" name="'.$name.'" id="'.$id.'" value="'.$value.'">';
				break;
			case 3:
				$class="textarea";
				echo '<textarea name="'.$name.'" class="'.$class.'" id="'.$id.'" rows="'.$rows.'" cols="'.$cols.'" '.''.'>'.$value.'</textarea>';
				break;
			case 4:
				echo '<input type="radio" name="'.$name.'" id="'.$id.'" value="'.$value.'" '.$required.'>'.$caption;
				break;
			case 5:
				echo '<select name="'.$name.' class="'.$class.'" id="'.$id.'"'.$required.'">';
					echo '<option value="'.$value.'">'.$caption;
				echo '</select>';
				break;
			case 6:
				echo '<button type="submit" name="'.$name.'" class="'.$class.'" id="'.$id.'" value="'.$value.'">'.$caption.'</button> ';
				break;
			case 7:
				echo '<button type="reset" name="'.$name.'" class="'.$class.'" id="'.$id.'" value="'.$value.'">'.$caption.'</button>';
				break;
			case 8:
				echo '<input type="checkbox" name="'.$name.'" class="'.$class.'" id="'.$id.'" value="'.$value.'">'.$caption.'';
				break;
		}
	}

	function _hiddenvalue($name,$value) {
		echo '<input type="hidden" name="'.$name.'" value='.$value.'>';
	}

	function _mytable($object,$class,$id,$width,$align,$valign,$value) {
			switch ($object) {
				case "table":
					echo '<table class="'.$class.'" id="'.$id.'" width="'.$width.'" '.$value.'>';
					break;
				case "th":
					echo '<th class="'.$class.'" id="'.$id.'" width="'.$width.'" align="'.$align.'" valign="'.$valign.'">'.$value.'</th>';
					break;
				case "tr":		// open tr
					echo '<tr class="'.$class.'">';
					break;
				case "td":		// td
					switch ($align) {
						case "c":
							$align="center";
							break;
						case "r":
							$align="right";
							break;
						case "":
							$align="left";
							break;
					}
					switch ($valign) {
						case "":
							$valign="top";
							break;
						case "m":
							$align="midle";
							break;
						case "b":
							$align="bottom";
							break;
					}
					echo '<td class="'.$class.'" id="'.$id.'" width="'.$width.'" align="'.$align.'" valign="'.$valign.'">'.$value.'</td>';
					break;
				case "/tr":		// close tr
					echo '</tr>';
					break;
				case "/table":	// close table
					echo '</table>';
					break;
			}
	}

	function _CreateForm($i,$divid,$buttonid,$width,$height) 
	//function _CreateFormUpdate($i,$divid,$buttonid)
	{
		//$width = 600;
		//$height = 600;
		$divid  =  $divid.$i;
		$buttonid = $buttonid.$i;
		echo "<script>";
			echo "$(function() {";
				echo 'var link = "#'.$divid.'";';
				echo 'var tombol = "#'.$buttonid.'";';
				echo '$( link ).dialog({';
				echo 'autoOpen: false,';
				echo 'height: '.$height.',';
				echo 'width: '.$width.',';
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



	function _CreateWindow($number,$type,$name,$button,$width,$height,$title,$acaption,$afield,$value,$linkurl) {
		// tipe "insert", "update", "delete"
		$idwindow = $name.$number;
		$opwindow = $button.$number;
		echo "<script>";
			echo "$(function() {";
				echo 'var link = "#'.$idwindow.'";';
				echo 'var tombol = "#'.$opwindow.'";';
				echo '$( link ).dialog({';
				echo 'autoOpen: false,';
				echo 'height: '.$height.',';
				echo 'width: '.$width.',';
				echo 'modal: true';			
				echo '});';
				echo '$( tombol )';
				echo '.button()';
				echo '.click(function() {';
				echo '$(link).dialog( "open" );';
				echo '});';
			echo '});';
		echo "</script>";

		$count_caption = count($acaption)-1;
		$count_field   = count($afield)-1;

		echo '<div id="'.$idwindow.'" title="'.$title.'" class="openwindow">';
		echo '<form method="post" action="'.$linkurl.'">';
		
		switch ($type) {
			case "view":
				break;
			case "insert":
				for ($i=0;$i<=$count_caption;$i++) {
					?>
					<fieldset><h4><?php echo strtoupper($acaption[$i]);?></h4></fieldset>
					<?php 
					_myobject($afield[$i][1],$afield[$i][0],"","","","","","20","","","");
					?>
					<?php
				}
				echo '<input type="submit" class="btn btn-primary btn-sm" name="save" value="SAVE">';
				echo '<input type="reset" class="btn btn-primary btn-sm" value="RESET">';
				break;
			case "edit":
				for ($i=0;$i<=$count_field;$i++) {
					?>
						<fieldset><h4><?php echo strtoupper($afield[$i][0]);?></h4></fieldset>
						<?php 
						_myobject($afield[$i][3],trim($afield[$i][1]),"","",$afield[$i][2],"","","60","","","required");
						?>
					<?php
				}
				echo '<input type="submit" class="btn btn-primary btn-sm" name="edit" value="SAVE">';
				echo '<input type="reset" class="btn btn-primary btn-sm" value="RESET">';
				break;
			case "del":
				//$del = new cDelete;
				//$del->_dDeleteData($afield);
				echo '<h4>Yakin akan menghapus ? <span class="label label-default"></span></h4>';
				echo '<input type="submit" class="btn btn-primary btn-sm" name="del" value="DELETE">';
				for ($k=0;$k<=2;$k++) {
					echo '<input type="hidden" name="hiddendeletevalue'.$k.'" value="'.$afield[0][$k].'">';
				}
				break;
		}
		echo '</form>';
		
		echo '</div>';
		echo '<button id="'.$opwindow.'" class="btn btn-primary btn-xs" title="'.$title.'">'.$title.'</button>';
		return $opwindow;
	}
}  // end of object
	?>