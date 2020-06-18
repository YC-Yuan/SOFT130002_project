<?php
require_once('pdo.php');
require_once('salt.php');

$sql = 'SELECT * FROM `traveluser`WHERE `Salt`IS null';
$users = pdo($sql);

while ($row = $users->fetch()) {
    $password = $row["Pass"];
    $info = encrypt($password);
    $infos = explode(" ", $info);
    $pass = $infos[0];
    $salt = $infos[1];
    $UID=$row['UID'];


    $sql = 'UPDATE `traveluser` SET `Pass`="' . $pass . '",`Salt`="' . $salt . '" WHERE `UID`="'.$UID.'"';
    pdo($sql);
}
