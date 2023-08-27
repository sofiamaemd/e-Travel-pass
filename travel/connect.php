<?php 
/*db */

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "new_epass1";


//connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
//check connection
if (!$conn) {
	die("Connection failed: " . mysqli_connect_error());

}

?>