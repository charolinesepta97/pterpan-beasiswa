<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
 <head>
  <title>SIDOSEN</title>
  <meta name="Generator" content="EditPlus">
  <meta name="Author" content="">
  <meta name="Keywords" content="">
  <meta name="Description" content="">

	<link rel="stylesheet" href="../_jquery-ui-1.11.1/jquery-ui.css">
	<link rel="stylesheet" href="../_bootstrap-3.3.4/dist/css/bootstrap.min.css">
	<link rel="stylesheet" href="../_css/style.css" type="text/css" media="all" />
	<script src="../_bootstrap-3.3.4/js/tests/vendor/jquery.min.js"></script>
	<script src="../_bootstrap-3.3.4/dist/js/bootstrap.min.js"></script>
	<script src="../_jquery-ui-1.11.1/jquery-1.11.1.js"></script>
	<script src="../_jquery-ui-1.11.1/jquery-ui.js"></script>	

	<script type="text/javascript" src="../_tinymce/js/tinymce/tinymce.min.js"></script>
	<script type="text/javascript">
	tinymce.init({
			selector: "textarea",
			height: 110,
			plugins: [
					"advlist autolink autosave link image lists charmap print preview hr anchor pagebreak spellchecker",
					"searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking",
					"table contextmenu directionality emoticons template textcolor paste fullpage textcolor colorpicker textpattern"
			],

			toolbar1: "bold italic underline strikethrough | subscript superscript | alignleft aligncenter alignright alignjustify | bullist numlist ",
			menubar: false,
			toolbar_items_size: 'small',

			style_formats: [
					{title: 'Bold text', inline: 'b'},
					{title: 'Red text', inline: 'span', styles: {color: '#ff0000'}},
					{title: 'Red header', block: 'h1', styles: {color: '#ff0000'}},
					{title: 'Example 1', inline: 'span', classes: 'example1'},
					{title: 'Example 2', inline: 'span', classes: 'example2'},
					{title: 'Table styles'},
					{title: 'Table row 1', selector: 'tr', classes: 'tablerow1'}
			],

			templates: [
					{title: 'Test template 1', content: 'Test 1'},
					{title: 'Test template 2', content: 'Test 2'}
			]
	});
	</script>
 </head>

 <body>

 <?php
	// include function & css
	include_once("../_function/cConnect.php");
	include_once("../_function/inc_f_object.php");
	include_once("../_function/cinsert.php");
	include_once("../_function/cupdate.php");
	include_once("../_function/cview.php");
	include_once("../_function/cdelete.php");
	include_once("../_function/createWindow.php");

	date_default_timezone_set('Asia/Jakarta');
	session_start();


	// connection
	$conn = new cConnect();
	$conn->goConnect(1);


  ?>
	<nav class="navbar navbar-default">
	  <div class="container-fluid">
		<!-- Brand and toggle get grouped for better mobile display -->
		<div class="navbar-header">
		  <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
			<span class="sr-only">Toggle Navigation</span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
		  </button>
		  <a class="navbar-brand" href="#"><font size="6" color="">SIMakSis</font><!-- <img src="logo.png" width="160" height="48" border="0" alt=""> --></a>
		</div>

		<!-- Collect the nav links, forms, and other content for toggling -->
		<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
		  <ul class="nav navbar-nav">
			<li class="active"><a href="?l=0">HOME<span class="sr-only"></span></a></li>

			<li class="dropdown">
			  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">SETUP REFERENSI<span class="caret"></span></a>
			  <ul class="dropdown-menu" role="menu">
				<li><a href="?l=1">Data Guru/Karyawan</a></li>
				<li><a href="?l=2">Data Siswa</a></li>
				<li><a href="?l=3">Data Kelas</a></li>
				<li class="divider"></li>
				<li><a href="?l=4">Referensi Poin</a></li>
				<li class="divider"></li>
				<li><a href="?l=5">Semester & Tahun Ajaran</a></li>
				<li><a href="?l=6">Jabatan</a></li>
				<li><a href="?l=7">Klasifikasi</a></li>
				<li><a href="?l=17">Klasifikasi 2</a></li>

			  </ul>
			</li>

			<li class="dropdown">
			  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">KEAKTIFAN<span class="caret"></span></a>
			  <ul class="dropdown-menu" role="menu">
				<li><a href="?l=8">Poin</a></li>
				<li><a href="?l=9">Kehadiran</a></li>
			  </ul>
			</li>

			<li class="dropdown">
			  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">LAPORAN/REKAPITULASI<span class="caret"></span></a>
			  <ul class="dropdown-menu" role="menu">
				<li><a href="?l=10">Per Kelas</a></li>
				<li><a href="?l=11">Per Siswa</a></li>
			 </ul>
			</li>
		  </ul>
		  <!-- <form class="navbar-form navbar-left" role="search">
			<div class="form-group">
			  <input type="text" class="form-control" placeholder="Search">
			</div>
			<button type="submit" class="btn btn-default">Submit</button>
		  </form> -->
		  <ul class="nav navbar-nav navbar-right">
			<li>
			<p class="navbar-text"><?php echo strtoupper($_SESSION["semester"])."/".$_SESSION["th_ajaran"]; ?></p>
			</li>
			<li class="dropdown">
			  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><?php echo "[".$_SESSION["nik"]."] ".$_SESSION["nama"]  ;?> <span class="caret"></span></a>
			  <ul class="dropdown-menu" role="menu">
				<li><a href="#"><?php echo $_SESSION["jabatan"];?></a></li>
				<li class="divider"></li>
				<li><a href="../index.php">LOGOUT</a></li>
			  </ul>
			</li>
		  </ul>
		</div><!-- /.navbar-collapse -->
	  </div><!-- /.container-fluid -->
	</nav>
	<div class="container">
		<?php
		if (empty($_GET["l"])) { 
			$pilihlink = 0;
		} else {
			$pilihlink = $_GET["l"];
		}
		switch ($pilihlink) {
			case 0:
				echo "home";
				//include("incText.php");
			break;		
			case 1:
				?>
				<blockquote>
				  <p>DATA GURU/KARYAWAN</p>
				</blockquote>
				<?php
				//include("incKaryawan.php");
			break;		
			case 2:
				?>
				<blockquote>
				  <p>DATA SISWA</p>
				</blockquote>
				<?php
				//include("incSiswa.php");
			break;		
			case 3:
				?>
				<blockquote>
				  <p>DATA KELAS</p>
				</blockquote>
				<?php
				//include("incKelas.php");
			break;	
			case 4:
				?>
				<blockquote>
				  <p>REFERENSI POIN</p>
				</blockquote>
				<?php
				//include("incPoin.php");
			break;	
			case 5:
				?>
				<blockquote>
				  <p>SEMESTER/TAHUN AJARAN</p>
				</blockquote>
				<?php
				//include("incSmsThn.php");
			break;
			case 6:
				?>
				<blockquote>
				  <p>REFERENSI JABATAN</p>
				</blockquote>
				<?php
				//include("incJabatan.php");
			break;
			case 7:
				?>
				<blockquote>
				  <p>REFERENSI KLASIFIKASI POIN</p>
				</blockquote>
				<?php
				//include("incKlasifikasi.php");
			break;
			case 8:
				//include("incInputPoin.php");
			break;
			case 9:
				//include("incSetPembayaran.php");
			break;
			case 10:
				//include("incLapPerKelas.php");
			break;
			case 11:
				//include("incLapPerSiswa.php");
			break;
			case 12:
				//include("incJabatan.php");
			break;
			case 13:
				//include("incKlasifikasi.php");
			break;
		}			
		?>
	</div>
	<br><br>
 </body>
</html>