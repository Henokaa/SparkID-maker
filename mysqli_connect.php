<?php
// DEFINE("host",'localhost');
// DEFINE("user", 'MyXamppUser');
// DEFINE("pass", 'helloXampp'); 
// DEFINE("db", 'bossa_db');

// $conn = mysqli_connect(host, user, pass, db);
// if ($conn)
// 	echo "";
// 	//echo "Connection to MySQL successful!<br>";
// else
// 	die("Unable to connect to MySQL: ". mysqli_connect_error() ."<br>");

DEFINE("host",'sql112.epizy.com');
DEFINE("user", 'epiz_28977500');
DEFINE("pass", 'gF3xWjRo2yn'); 
DEFINE("db", 'epiz_28977500_bossa_db');

$conn = mysqli_connect(host, user, pass, db);
if ($conn)
	echo "";
	//echo "Connection to MySQL successful!<br>";
else
	die("Unable to connect to MySQL: ". mysqli_connect_error() ."<br>");
?>