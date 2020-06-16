<?php
require_once('config.php');

function pdo($sql)
{
    $pdo = new PDO(DBCONNSTRING, DBUSER, DBPASS);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $result = $pdo->query($sql);
    $pdo = null;
    return $result;
}
