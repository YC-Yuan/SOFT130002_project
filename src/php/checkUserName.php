<?php
require_once("config.php");
$pdo = new PDO(DBCONNSTRING, DBUSER, DBPASS);
//very simple (and insecure) check of valid credentials.
$sql = "SELECT * FROM traveluser WHERE UserName=:name";

$statement = $pdo->prepare($sql);
$statement->bindValue(':name', $_GET['name']);
$statement->execute();

if($statement->rowCount()>0) echo 'true';
else echo 'false';