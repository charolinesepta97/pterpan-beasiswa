<?php
class cConnect {
	// 1rst connection
	private $dbHost  = "localhost";
	private $dbUser  = "root";
	private $dbPass  = "";
	private $dbName  = "db...";

	
	// 2nd connection
	private $dbHost2 = "localhost";
	private $dbUser2 = "root";
	private $dbPass2 = "";
	private $dbName2 = "...";

	function goConnect() {
		mysql_connect($this->dbHost,$this->dbUser,$this->dbPass);
		mysql_select_db($this->dbName) or die ("error connections !");
	}

	
	function goConnect2() {
		mysql_connect($this->dbHost2,$this->dbUser2,$this->dbPass2);
		mysql_select_db($this->dbName2) or die ("error connection");
	}
	
	//function goConnect($dbHost,$dbUser,$dbPass,$dbName) {
		//mysql_select_db($dbName,mysql_connect($dbHost,$dbUser,$dbPass)) or die("error connection");
	//}


}
?>