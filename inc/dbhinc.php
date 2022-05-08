<?php
$servername = "localhost";
$dbusername = "";
$dbpassword = "";
// public code nen khum de pass db hihi
$dbname = "webnhamnhi";

$conn = mysqli_connect($servername, $dbusername, $dbpassword, $dbname);

if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}
echo "Connected successfully";
?>