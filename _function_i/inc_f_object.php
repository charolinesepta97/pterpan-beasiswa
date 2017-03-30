<?php 
function _myobject($object,$name,$class,$id,$value,$caption,$maxlength,$size,$rows,$cols,$required,$placeholder,$disabled) {
	switch ($object) {
		case 1:		//textbox
			echo '<input type="text" name="'.$name.'" class="'.$class.'" id="'.$id.'" value="'.$value.'" maxlength="'.$maxlength.'" size="'.$size.'" '.$required.' placeholder="'.$placeholder.'" '.$disabled.'>';
			break;
		case 11:		//textbox
			echo '<input type="text" name="'.$name.'" class="'.$class.'" id="'.$id.'" value="'.$value.'" maxlength="'.$maxlength.'" size="'.$size.'" '.$required.' placeholder="'.$placeholder.'" '.$disabled.'>';
			break;
		case 2:		//hidden	
			echo '<input type="hidden" name="'.$name.'" id="'.$id.'" value="'.$value.'">';
			break;
		case 3:		//textarea
			$class="textarea";
			echo '<textarea name="'.$name.'" class="'.$class.'" id="'.$id.'" rows="'.$rows.'" cols="'.$cols.'" '.''.'>'.$value.'</textarea>';
			break;
		case 4:		//
			  $view = new cView();
			  $view->vViewData($value);
			  $arraypilihan = $view->vViewData($value);
			  $x = 0;
			  foreach($arraypilihan as $datapilihan) {
				  $data[$x][0] = $datapilihan["field1"];
			  	  $data[$x][1] = $datapilihan["field2"];
			  	  $x=$x+1;	
			  }
			  ?>
				<?php for ($i=0;$i<=$x-1;$i++) {		?>
				<div class="radio">
					<label>
						<input type="radio" name="<?php echo $name;?>" id="optionsRadios1" value="<?php echo $data[$i][0];?>"><?php echo $data[$i][1];?>
					</label>
				</div>
				<?php } ?>
			  <?php
			break;
		case 5:  // select 
			  $view = new cView();
			  $view->vViewData($caption);
			  $arraypilihan = $view->vViewData($caption);
			  $x = 0;
			  $data[0][0] = "-";
			  $data[0][1] = "- pilihan -";
			  foreach($arraypilihan as $datapilihan) {
			  	  $x=$x+1;	
				  $data[$x][0] = $datapilihan["field1"];
			  	  $data[$x][1] = $datapilihan["field2"];
			  }
			  ?>
				 <select name="<?php echo $name;?>" class="<?php echo $class;?>" id="<?php echo $id; ?>" <?php echo $required;?>>
				  <?php 
				  for ($i=0;$i<=$x;$i++) {				  
				    if ($data[$i][0]==$value) {
					?>	
					<option value="<?php echo $data[$i][0];?>" selected><?php echo $data[$i][1];?></option>
				  <?php } else { ?>	
					<option value="<?php echo $data[$i][0];?>" ><?php echo $data[$i][1];?></option>
				  <?php } 
				  }?>
				</select>
			  <?php 
			break;
		case 6:
			echo '<button type="submit" name="'.$name.'" class="'.$class.'" id="'.$id.'" value="'.$value.'">'.$caption.'</button> ';
			break;
		case 7:
			echo '<button type="reset" name="'.$name.'" class="'.$class.'" id="'.$id.'" value="'.$value.'">'.$caption.'</button>';
			break;
		case 8:	// checkbox
			echo '<input type="checkbox" name="'.$name.'" class="'.$class.'" id="'.$id.'" value="'.$value.'" '.$placeholder.'>'.$caption.'';
			echo '<br />';
			break;
		case 9:
			
			break;
		case 11:	//textbox disabled
			echo '<input type="text" name="'.$name.'" class="'.$class.'" id="'.$id.'" value="'.$value.'" maxlength="'.$maxlength.'" size="'.$size.'" '.$required.' placeholder="'.$placeholder.'" disabled>';
			break;

	}
}

function _createDatePicker($n,$id){
	$datepickerid = $id.$n;
	echo'
	<script>
	$(function() {
	$( "#'.$datepickerid.'" ).datepicker( {
		dateFormat : "MM dd yy",
		}
		);
	});
	</script>
	';
}

function _createAjax($id1,$id2,$ajax){
	echo'
	<script type="text/javascript">
	var htmlobjek;
	$(document).ready(function(){
	  //apabila terjadi event onchange terhadap object <select id=propinsi>
	  $("#'.$id1.'").change(function(){
		var dataget = $("#'.$id1.'").val();
		$.ajax({
			url: "'.$ajax.'",
			data: "dataget="+dataget,
			cache: false,
			success: function(msg){
				$("#'.$id2.'").html(msg);
			}
		});
	  });
	});
	</script>
	';
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

	//echo $idwindow." ".$opwindow;
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

	// hitung jumlah array
	//$count_caption = count($acaption)-1;
	$count_field   = count($afield)-1;


	echo '<div id="'.$idwindow.'" title="'.$title.'" class="openwindow">';
	echo '<form  class="" method="post" action="'.$linkurl.'">';
	
	switch ($type) {
		case "view":
				$gicons = "glyphicon glyphicon-zoom-in";
				$clsbtn = "btn btn-success btn-xs";
				//_myobject($object,$name,$class,$id,$value,$caption,$maxlength,$size,$rows,$cols,$required,$placeholder,$disabled)
				for ($i=0;$i<=$count_field;$i++) {
					switch ($afield[$i][3]) {
						case 1:
						  echo '<div class="form-group">';
							  echo '<label for="caption'.$i.'">'.strtoupper($afield[$i][0]).'</label>';
								echo '<div class="alert alert-success" role="alert">';
								  echo $afield[$i][2];
							    echo '</div>';
						  echo '</div>';
						break;
						case 3:
						  echo '<div class="form-group">';
							  echo '<label for="caption'.$i.'">'.strtoupper($afield[$i][0]).'</label>';
								echo '<div class="alert alert-success" role="alert">';
								  echo $afield[$i][2];
							    echo '</div>';
						  echo '</div>';
						break;
						case 4:
						  echo '<div class="form-grup">';
							  echo '<label for="caption'.$i.'">'.strtoupper($afield[$i][0]).'</label>';
							  _myobject($afield[$i][3],$afield[$i][1],"form-control","",trim($afield[0][4]),"","","20","","","required",strtolower($afield[$i][0]),"");
						  echo '</div>';
						break;
						case 5:
						  echo '<div class="form-group">';
							  echo '<label for="caption'.$i.'">'.strtoupper($afield[$i][0]).'</label>';
							  _myobject($afield[$i][3],$afield[$i][1],"form-control","","",trim($afield[0][4]),"","20","","","required",strtolower($afield[$i][0]),"");
						  echo '</div>';
						break;
						case 8:
						  echo '<div class="form-group">';
							  echo '<label for="caption'.$i.'">'.strtoupper($afield[$i][0]).'</label>';
							  _myobject($afield[$i][3],$afield[$i][1],"form-control","","",trim($afield[0][4]),"","20","","","required",strtolower($afield[$i][0]),"");
							  echo "xx";
						  echo '</div>';
						break;
					}
					?>
					<?php
				}
			break;
		case "insert":
				$gicons = "glyphicon glyphicon-plus-sign";
				$clsbtn = "btn btn-primary btn-xs";
				//$object,$name,$class,$id,$value,$caption,$maxlength,$size,$rows,$cols,$required,$placeholder
				for ($i=0;$i<=$count_field;$i++) {
					switch ($afield[$i][3]) {
						case 1:
						  echo '<div class="form-group">';
							  echo '<label for="caption'.$i.'">'.strtoupper($afield[$i][0]).'</label>';
							  //_myobject($afield[$i][3],$afield[$i][1],"form-control","datepicker1","","","","20","","","required",strtolower($afield[$i][0]),"");
							  _myobject($afield[$i][3],$afield[$i][1],"form-control","",$afield[$i][2],"","","20","","","required",strtolower($afield[$i][0]),"");
						  echo '</div>';
						break;
						case 2:
						  echo '<div class="form-group">';
							  //_myobject($afield[$i][3],$afield[$i][1],"form-control","datepicker1","","","","20","","","required",strtolower($afield[$i][0]),"");
							  _myobject($afield[$i][3],$afield[$i][1],"form-control","",$afield[$i][2],"","","20","","","required",strtolower($afield[$i][0]),"");
						  echo '</div>';
						break;
						case 3:
						  echo '<div class="form-group">';
							  echo '<label for="caption'.$i.'">'.strtoupper($afield[$i][0]).'</label>';
							  _myobject($afield[$i][3],$afield[$i][1],"form-control","","","","","20","","","required",strtolower($afield[$i][0]),"");
						  echo '</div>';
						break;
						case 11:
						  echo '<div class="form-group">';
							  echo '<label for="caption'.$i.'">'.strtoupper($afield[$i][0]).'</label>';
							  //_myobject($afield[$i][3],$afield[$i][1],"form-control","datepicker1","","","","20","","","required",strtolower($afield[$i][0]),"");
							  _myobject($afield[$i][3],$afield[$i][1],"form-control",$afield[$i][1],$afield[$i][2],"","","20","","","required",strtolower($afield[$i][0]),"");
						  echo '</div>';
						break;
						case 4:
						  echo '<div class="form-grup">';
							  echo '<label for="caption'.$i.'">'.strtoupper($afield[$i][0]).'</label>';
							  _myobject($afield[$i][3],$afield[$i][1],"form-control","",trim($afield[0][4]),"","","20","","","required",strtolower($afield[$i][0]),"");
						  echo '</div>';
						break;
						case 5:
						  echo '<div class="form-group">';
							  echo '<label for="caption'.$i.'">'.strtoupper($afield[$i][0]).'</label>';
							  _myobject($afield[$i][3],$afield[$i][1],"form-control",$afield[$i][1],"",trim($afield[$i][4]),"","20","","","required",strtolower($afield[$i][0]),"");
						  echo '</div>';
						break;
						case 8:
							echo '<label class="checkbox-inline">';
							  _myobject($afield[$i][3],$afield[$i][1],"","inlineCheckbox1","1",strtoupper($afield[$i][0]),"","","","","",strtolower($afield[$i][0]),"","RENCANA  PELAKSANAAN","")		;
							echo '</label>';
						break;
						
					}
					?>
					<?php
				}
				echo '<div>';
				echo '<br />';
				echo '<input type="submit" class="btn btn-primary btn-sm" id="" name="save" value="SAVE">';
				echo '<input type="reset" class="btn btn-primary btn-sm" value="RESET">';
				echo '</div>';

				echo "<br />";
				echo "<br />";
			break;
		case "edit":
				$gicons = "glyphicon glyphicon-pencil";
				$clsbtn = "btn btn-primary btn-xs";
				//_myobject($object,$name,$class,$id,$value,$caption,$maxlength,$size,$rows,$cols,$required,$placeholder,$disabled)
				for ($i=0;$i<=$count_field;$i++) {

				if ($afield[$i][3]==1 or $afield[$i][3]==3 or $afield[$i][3]==5) {
					  echo '<div class="form-group">';
						  echo '<label for="caption'.$i.'">'.strtoupper($afield[$i][0]).'</label>';
						  _myobject($afield[$i][3],$afield[$i][1],"form-control","caption".$i,$afield[$i][2],$afield[$i][4],"","20","","","required",strtolower($afield[$i][0]),"");
					  echo '</div>';
				}
					
				if ($afield[$i][3]==11) {
					  echo '<div class="form-group">';
						  echo '<label for="caption'.$i.'">'.strtoupper($afield[$i][0]).'</label>';
						  _myobject($afield[$i][3],$afield[$i][1],"form-control",$afield[$i][1],$afield[$i][2],"","","20","","","required",strtolower($afield[$i][0]),"");
					  echo '</div>';
				}	

				if ($afield[$i][3]==2) {
					  echo '<div class="form-group">';
						  //echo '<label for="caption'.$i.'">'.strtoupper($afield[$i][0]).'</label>';
						  _myobject($afield[$i][3],$afield[$i][1],"form-control","caption".$i,$afield[$i][2],$afield[$i][4],"","20","","","required",strtolower($afield[$i][0]),"");
					  echo '</div>';
				}

				if ($afield[$i][3]==8) {
					echo '<label class="checkbox-inline">';
					if ($afield[$i][2]=="1") {
						$checked="checked";
					} else {
						$checked="";
					}
					//_myobject($object,$name,$class,$id,$value,$caption,$maxlength,$size,$rows,$cols,$required,$placeholder,$disabled)
					  _myobject($afield[$i][3],$afield[$i][1],"","inlineCheckbox1","1",strtoupper($afield[$i][0]),"","","","","",$checked,"","")		;
					echo '</label>';
					}
				}
	
				echo "<p>";
				echo "<br />";
				echo '<input type="submit" class="btn btn-primary btn-sm" name="edit" value="SAVE">';
				echo '<input type="reset" class="btn btn-primary btn-sm" value="RESET">';
				echo "</p>";
			echo "<br />";
			echo "<br />";
			break;
		case "del":
			$gicons = "glyphicon glyphicon-trash";
			$clsbtn = "btn btn-danger btn-xs";
			echo '<h4>Yakin akan menghapus ? <span class="label label-default"></span></h4>';
			echo '<input type="submit" class="btn btn-primary btn-sm" name="del" value="DELETE">';
			for ($k=0;$k<=2;$k++) {
				echo '<input type="hidden" name="hiddendeletevalue'.$k.'" value="'.$afield[0][$k].'">';
			}
			break;
	}
	echo '</div>';
	echo '<p>';	
	if ($type=="insert") {
		echo '<button id="'.$opwindow.'" class="'.$clsbtn.'" title="'.$title.'">'.''.'<span class="'.$gicons.'" aria-hidden="true"></span>&nbsp;'.$title.'</button>';
	} else {
		echo '<button id="'.$opwindow.'" class="'.$clsbtn.'" title="'.$title.'">'."".'<span class="'.$gicons.'" aria-hidden="true"></span></button>';
	}
	echo '</p>';	
	echo '</form>';

	//return $opwindow;
} 

function _createpage($l,$range,$page,$table,$rpp){
	$c_conn = new cConnect();
	$conn = $c_conn->goConnect();

	//$res = mysqli_query ("SELECT count(*) FROM ".$table." ");
	//$view = new cView();
	//$spages=$view->vViewData($res)

	$res = "SELECT count(*) as recnumber FROM ".$table." ";
	$view = new cView();
	$view->vViewData($res);
	$arrayView = $view->vViewData($res);
	foreach($arrayView as $dataarray) {
		$maxrows = $dataarray["recnumber"];
		$pages = ceil($maxrows/$rpp);
	}

	//$maxrows = (int)@mysqli_fetch_array($res, 0);
	//$pages = ceil($maxrows/$rpp);
	echo '<nav>
		  <ul class="pagination">
			<li>
			  <a href="?l='.$l.'&pg=1" aria-label="Previous"><span aria-hidden="true">&laquo;</span>
			  </a>
			</li>
	';
	for ($i=($page - $range); $i<(($page + $range)+1); $i++) {
		if (($i > 0) && ($i <= $pages)) {
			if($i == $page+1){
				echo '<li class="active"><a href="#">'.($i).'</a></li>';
			}else{
				echo '<li><a href="?l='.$l.'&pg='.$i.'">'.($i).'</a></li>';
			}
		}
	}
	$last =$pages;
	echo '<li>
			  <a href="?l='.$l.'&pg='.$last.'" aria-label="Next"><span aria-hidden="true">&raquo;</span>
			  </a>
			</li>
		  </ul>
		</nav>
	';

}
?>
