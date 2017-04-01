<?php session_start(); ?>
<?php
	// include function & css
	//coba push pertama
	include_once("_function_i/cConnect.php");
	include_once("_function_i/cview.php");
	include_once("_function_i/inc_f_object.php");


	date_default_timezone_set('Asia/Jakarta');

	// connection
	$conn = new cConnect();
	$conn->goConnect();
	?>
<?php
	// variable default
	//
	if (empty($okein)) {
		$okein=9;
	} else {
		$okein=$okein;
	}

	if (empty($login)) {
		$login=9;
	} else {
		$login=$login;
	}

	if (empty($cekemail)) {
		$cekemail="";
	} else {
		$cekemail=$cekemail;
	}
?>


<!doctype html>
<html>
<head>
    <meta charset="utf8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title>KHS</title>
	<link rel="stylesheet" href="_jquery-ui-1.11.1/jquery-ui.css">
	<link rel="stylesheet" href="_bootstrap-3.3.4/dist/css/bootstrap.min.css">
	<link rel="stylesheet" href="_css/style.css" type="text/css" media="all" />
	<script src="_bootstrap-3.3.4/js/tests/vendor/jquery.min.js"></script>
	<script src="_bootstrap-3.3.4/dist/js/bootstrap.min.js"></script>
</head>
<body>

<?php
	if (!empty($_POST["uname"]) and !empty($_POST["pword"]) ) {
			$cekemail = $_POST["uname"]."@ukdw.ac.id";

			//settype($login,"boolean");
			//settype($logout,"boolean");
			//$connftp  = @ftp_connect("222.124.22.23");
			//$okein = @ftp_login($connftp,$_POST["uname"],$_POST["pword"]);

			// nilai awal jika di by pass
			$login=1;
			$okein=1;

			// cek uname & pword

			if ($okein==1)  {
				$sqlunpw = "select a.* from user_system a where a.email='".$cekemail."' and a.password='".$_POST["pword"]."'";
				echo $sqlunpw;

				$view = new cView();
				$arrayunpw = $view->vViewData($sqlunpw);
				foreach ($arrayunpw as $dataunpw){

					$_SESSION["user_id"] = $dataunpw["user_id"];
					$_SESSION["nama"] = $dataunpw["nama"];
				}

					if (!empty($dataunpw["nik"])) {
						$login=1;
						$okein=1;
						$cekunamepword=1;
					} else {
						$login=0;
						$okein=0;
						$cekunamepword=0;
					}
			// cek user_role

			$sqluserrole = "select a.number_id,a.user_id,a.session_id,a.role from user_role a where a.user_id ='".$dataunpw["nik"]."' AND session_id='sidosen'";
				echo "<br />";
				echo $sqluserrole ;
				$view = new cView();
				//$view->vViewData($sqluserrole);
				$arrayuserrole = $view->vViewData($sqluserrole);

				$_SESSION["session_id"] = "peterpan";
				$_SESSION["role"] = "1";

				foreach($arrayuserrole as $datauserrole)
				{
					$_SESSION["session_id"]=$datauserrole["session_id"];
					$_SESSION["role"]=$datauserrole["role"];
				}
					if (!empty($_SESSION["session_id"])) {
						$login=1;
						$okein=1;
						$cekunamepword=1;
					} else {
						$login=0;
						$okein=0;
						$cekunamepword=0;
					}



			//
			}  else {
				$login=0;
				$okein=0;
				$cekunamepword=0;
			} // end of $okein
	} else {
		$login=9;
		$okein=9;
		$cekunamepword=0;
	}
?>
    <div id="bar">
        <div id="container">
            <!-- Login Starts Here -->

           <div id="loginContainer">
                <a href="#" id="loginButton">
				<span></span><em></em></a>
                <div style="clear:both">
						<label>
						<?php
							if ($cekunamepword==0 and $login==0 and $okein==0) {
								?>
								<div class="alert alert-danger" role="alert">
								  <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
								  <span class="sr-only">Error:</span>Username/Password salah
								</div>
								<?php
							} else {
								echo "";
							}
						?>
						</label>
				</div>


				<div class="row">
				  <div class="col-xs-6 col-sm-4"></div>
				  <div class="col-xs-6 col-sm-4">
						<h4>LOGIN</h4>
						<form method="POST" action="">
						  <div class="form-group">
							<label for="exampleInputUsername">Username</label>
							<input type="input" name="uname" class="form-control" id="exampleInputUsername" placeholder="username">
						  </div>
						  <div class="form-group">
							<label for="exampleInputPassword1">Password</label>
							<input type="password" name="pword" class="form-control" id="exampleInputPassword1" placeholder="password">
						  </div>
						  <button type="submit" class="btn btn-default">Submit</button>
						</form>
				  </div>
				  <div class="clearfix visible-xs-block"></div>
				  <div class="col-xs-6 col-sm-4"></div>
				</div>
            </div>
            <!-- Login Ends Here -->
        </div>
		<div>

		</div>
    </div>
	<!-- start here -->
	<?php
	if ($okein==1 and $login==1 and $cekunamepword<>0) {
		//echo $dataunpw["nik"]."-".$dataunpw["nama_karyawan"]." ".$dataunpw["unit_base"];
		if ($_SESSION["role"]==1) {
			header('Location: user/');
		}
		if ($_SESSION["role"]==9) {
			header('Location: admin/');
		}
	} else {
		session_destroy();
	}

	//$conn = new cConnect();
	//$conn->goConnect2();

	?>


	<!--  -->

</body>
</html>
