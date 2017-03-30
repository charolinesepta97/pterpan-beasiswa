<?php
// insert
if (!empty($_POST["save"])) {
  if ($_GET["save"]=="yes") {
     $datafield = array("kodemk","namamk","sks");
     $datavalue = array('"'.$_POST["kodemk"].'"','"'.$_POST["namamk"].'"',$_POST["sks"]);
     $update = new cInsert();
     $update -> vInsertData($datafield,"matakuliah",$datavalue);
  }
}
?>



<?php
// edit
if (!empty($_POST["edit"])) {
  if ($_GET["edit"]=="yes") {
     $datafield = array("kodemk","namamk","sks");
     $datavalue = array('"'.$_POST["kodemk"].'"','"'.$_POST["namamk"].'"',$_POST["sks"]);
     $datakey = ' kodemk ="'.$_POST["kodemk"].'"';
     $update = new cUpdate();
     $update -> vUpdateData($datafield,"matakuliah",$datavalue,$datakey);
  }
}
?>


<?php
// delete
if (!empty($_POST["del"])) {
  if ($_GET["del"]=="yes") {
     $delete = new cDelete();
     $delete->_dDeleteData($_POST["hiddendeletevalue0"],$_POST["hiddendeletevalue1"],$_POST["hiddendeletevalue2"]);
  }
}
?>


<?php
  // array insert
  $afield=array(
   array("KODE MATAKULIAH","kodemk","",1,""),
   array("MATAKULIAH","namamk","",1,""),
   array("SKS","sks","",1,""),
  );

  // tombol insert new
  echo "<p>";
    _CreateWindow(0,"insert","insert-form","insert-button",700,500,"ADD NEW","",$afield,"","?l=".$_GET["l"]."&c=view&save=yes");
  echo "</p>";


  // cari
  echo '<form method="post" action="?l='.$_GET["l"].'">';
  _mytable("table","table table-hover","","20%","","","");
  _mytable("tr","","","","","","");
    _mytable("td","","","10%","l","","<b>Pencarian</b>");
    _mytable("td","","","5%","l","","<input type='text' name='ncari' size='20' maxlength='20' class='textbox'>");
    _mytable("td","","","5%","l","","<input type='submit' value='Cari' name='cari' class='btn btn-primary btn-xs'>");
  _mytable("/tr","","","","","","");
  _mytable("/table","","","","","","");
  echo "</form>";

  if(!empty($_GET["pg"])){
    $page = $_GET["pg"]-1;
  } else {
    $page = 0;
  }
  $rpp = 25; // Rows per page
  $limit = ($page*$rpp);


//
  // array view
  // write sql here!
  $sqlview="select a.kodemk,a.namamk,a.sks from matakuliah a  ";
  // end of sql
	if(!empty($_POST['ncari'])){
		$sqlview = $sqlview." WHERE a.kodemk like '%".$_POST['ncari']."%' OR a.namamk LIKE '%".$_POST['ncari']."%' OR a.sks='".$_POST['ncari']."'";
	}else{
		$sqlview = $sqlview." ";
	}
	$sqlview = $sqlview." ORDER BY a.kodemk LIMIT $limit, $rpp ";


  $view = new cView();
  $arrayView = $view->vViewData($sqlview);

  // Header Tabel
  _mytable("table","table table-hover","","100%","","","");
  _mytable("tr","","","","","","");
    _mytable("th","","","%","","","KODE MATAKULIAH");
    _mytable("th","","","%","","","MATAKULIAH");
    _mytable("th","","","%","","","SKS");

  _mytable("th","","","%","","","DETIL");
  _mytable("th","","","%","","","EDIT");
  _mytable("th","","","%","","","HAPUS");  _mytable("/tr","","","","","","");

  $cnourut=0;
  foreach($arrayView as $dataarray) {
  $cnourut=$cnourut + 1;
     _mytable("td","","","","l","",$dataarray["kodemk"]);
     _mytable("td","","","","l","",$dataarray["namamk"]);
     _mytable("td","","","","l","",$dataarray["sks"]);

  $datadetail=array(
   array("KODE MATAKULIAH","kodemk",$dataarray["kodemk"],"1",""),
   array("MATAKULIAH","namamk",$dataarray["namamk"],"1",""),
   array("SKS","sks",$dataarray["sks"],"1",""),
  );
  echo "<td>";
    _CreateWindow($cnourut,"view","view-form","view-button",700,500,"VIEW DETAIL","",$datadetail,"","?l=".$_GET["l"]."&c=view&view=yes");
  echo "</td>";

  $dataupdate=array(
   array("KODE MATAKULIAH","kodemk",$dataarray["kodemk"],"2",""),
   array("KODE MATAKULIAH","kodemk",$dataarray["kodemk"],"1",""),
   array("MATAKULIAH","namamk",$dataarray["namamk"],"1",""),
   array("SKS","sks",$dataarray["sks"],"1",""),
  );
  echo "<td>";
    _CreateWindow($cnourut,"edit","edit-form","edit-button",700,500,"EDIT RECORD","",$dataupdate,"","?l=".$_GET["l"]."&c=view&edit=yes&pg=".$_GET["pg"]);
  echo "</td>";

  $datadelete=array(
   array("kodemk",$dataarray["kodemk"],"matakuliah")
  );
  echo "<td>";
    _CreateWindow($cnourut,"del","del-form","del-button",300,150,"DELETE RECORD","",$datadelete,"","?l=".$_GET["l"]."&c=view&del=yes&pg=".$_GET["pg"]);
  echo "</td>";

  _mytable("/tr","","","","","","");
  }
  _mytable("/table","","","","","","");
?>

  <?php // buat page (link,range page, page,table,rowperpage)
  _createpage($_GET["l"],"5",$page,"matakuliah order by kodemk  ",$rpp);
  ?>

