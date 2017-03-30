<?php
// insert
if (!empty($_POST["save"])) {
  if ($_GET["save"]=="yes") {
     $datafield = array("nim","nama","tmp_lahir","tgl_lahir","jkel");
     $datavalue = array('"'.$_POST["nim"].'"','"'.$_POST["nama"].'"','"'.$_POST["tmp_lahir"].'"','"'.$_POST["tgl_lahir"].'"','"'.$_POST["jkel"].'"');
     $update = new cInsert();
     $update -> vInsertData($datafield,"mahasiswa",$datavalue);
  }
}
?>



<?php
// edit
if (!empty($_POST["edit"])) {
  if ($_GET["edit"]=="yes") {
     $datafield = array("nim","nama","tmp_lahir","tgl_lahir","jkel");
     $datavalue = array('"'.$_POST["nim"].'"','"'.$_POST["nama"].'"','"'.$_POST["tmp_lahir"].'"','"'.$_POST["tgl_lahir"].'"','"'.$_POST["jkel"].'"');
     $datakey = ' nim ="'.$_POST["nim"].'"';
     $update = new cUpdate();
     $update -> vUpdateData($datafield,"mahasiswa",$datavalue,$datakey);
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
   array("NOMOR INDUK MAHASISWA","nim","",1,""),
   array("NAMA","nama","",1,""),
   array("TEMPAT LAHIR","tmp_lahir","",1,""),
   array("TANGGAL LAHIR","tgl_lahir","",1,""),
   array("JENIS KELAMIN","jkel","",5,"select jkel as field1, jkel as field2 from refkelamin"),
  );

  // tombol insert new
  echo "<p>";
    _CreateWindow(0,"insert","insert-form","insert-button",700,500,"ADD NEW","",$afield,"","?l=".$_GET["l"]."&c=view&save=yes");
  echo "</p>";


  // cari
  echo '<form method="post" action="?l=1">';
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
  $sqlview="select a.nim,a.nama,a.tmp_lahir,a.tgl_lahir,a.jkel from mahasiswa a order by a.nim ";
  // end of sql

  $view = new cView();
  $arrayView = $view->vViewData($sqlview);

  // Header Tabel
  _mytable("table","table table-hover","","100%","","","");
  _mytable("tr","","","","","","");
    _mytable("th","","","%","","","NOMOR INDUK MAHASISWA");
    _mytable("th","","","%","","","NAMA");
    _mytable("th","","","%","","","TEMPAT LAHIR");
    _mytable("th","","","%","","","TANGGAL LAHIR");
    _mytable("th","","","%","","","JENIS KELAMIN");

  _mytable("th","","","%","","","DETIL");
  _mytable("th","","","%","","","EDIT");
  _mytable("th","","","%","","","HAPUS");  _mytable("/tr","","","","","","");

  $cnourut=0;
  foreach($arrayView as $dataarray) {
  $cnourut=$cnourut + 1;
     _mytable("td","","","","l","",$dataarray["nim"]);
     _mytable("td","","","","l","",$dataarray["nama"]);
     _mytable("td","","","","l","",$dataarray["tmp_lahir"]);
     _mytable("td","","","","l","",$dataarray["tgl_lahir"]);
     _mytable("td","","","","l","",$dataarray["jkel"]);

  $datadetail=array(
   array("NOMOR INDUK MAHASISWA","nim",$dataarray["nim"],"1",""),
   array("NAMA","nama",$dataarray["nama"],"1",""),
   array("TEMPAT LAHIR","tmp_lahir",$dataarray["tmp_lahir"],"1",""),
   array("TANGGAL LAHIR","tgl_lahir",$dataarray["tgl_lahir"],"1",""),
   array("JENIS KELAMIN","jkel",$dataarray["jkel"],"1",""),
  );
  echo "<td>";
    _CreateWindow($cnourut,"view","view-form","view-button",700,500,"VIEW DETAIL","",$datadetail,"","?l=".$_GET["l"]."&c=view&view=yes");
  echo "</td>";

  $dataupdate=array(
   array("NOMOR INDUK MAHASISWA","nim",$dataarray["nim"],"2",""),
   array("NOMOR INDUK MAHASISWA","nim",$dataarray["nim"],"1",""),
   array("NAMA","nama",$dataarray["nama"],"1",""),
   array("TEMPAT LAHIR","tmp_lahir",$dataarray["tmp_lahir"],"1",""),
   array("TANGGAL LAHIR","tgl_lahir",$dataarray["tgl_lahir"],"1",""),
   array("JENIS KELAMIN","jkel",$dataarray["jkel"],"5","select jkel as field1, jkel as field2 from refkelamin"),
  );
  echo "<td>";
    _CreateWindow($cnourut,"edit","edit-form","edit-button",700,500,"EDIT RECORD","",$dataupdate,"","?l=".$_GET["l"]."&c=view&edit=yes&pg=".$_GET["pg"]);
  echo "</td>";

  $datadelete=array(
   array("nim",$dataarray["nim"],"mahasiswa")
  );
  echo "<td>";
    _CreateWindow($cnourut,"del","del-form","del-button",300,150,"DELETE RECORD","",$datadelete,"","?l=".$_GET["l"]."&c=view&del=yes&pg=".$_GET["pg"]);
  echo "</td>";

  _mytable("/tr","","","","","","");
  }
  _mytable("/table","","","","","","");
?>

  <?php // buat page (link,range page, page,table,rowperpage)
  _createpage($_GET["l"],"5",$page,"mahasiswa order by nim  ",$rpp);
  ?>