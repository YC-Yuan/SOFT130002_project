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

function getHot()
{
    $sql = 'SELECT travelimage.* FROM travelimage
           INNER JOIN travelimagefavor on travelimage.ImageID =  travelimagefavor.ImageID
             GROUP BY travelimage.ImageID
             ORDER BY COUNT(travelimagefavor.ImageID) DESC
             LIMIT 6';
    return pdo($sql);
}

function getHotRandom($limit)
{
    $sql = 'SELECT travelimage.* FROM travelimage ORDER BY rand() LIMIT '.$limit;
    return pdo($sql);
}

