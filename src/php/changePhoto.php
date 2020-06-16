<?php
require_once('config.php');
require_once('pdo.php');

function deletePhoto($UID, $imgId)
{
    $sql = 'DELETE FROM travelimage WHERE `UID` = ' . $UID . ' and `ImageID` = ' . $imgId;
    return pdo($sql);
}

function deleteFavor($UID, $imgId)
{
    $sql = 'DELETE FROM travelimagefavor WHERE `UID` = ' . $UID . ' and `ImageID` = ' . $imgId;
    return pdo($sql);
}