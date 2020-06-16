<?php
require_once("config.php");
require_once("pdo.php");
$change = $_GET['change'];
$UID = $_GET['UID'];
$imgId = $_GET['imgId'];

if ($change == "true") {//已收藏，想取消
    $sql = 'DELETE FROM travelimagefavor WHERE `UID` = ' . $UID . ' and `ImageID` = ' . $imgId;
    $result = pdo($sql);

    $favorNum = getFavorNum($imgId);

    if ($result) echo 'true&' . $favorNum;
    else echo 'false&' . $favorNum;
} else {//未收藏，想收藏
    $sql = "
INSERT INTO `travelimagefavor` (`UID`, `ImageID`)
VALUES ('" . $UID . "', '" . $imgId . "')";
    $result = pdo($sql);

    $favorNum = getFavorNum($imgId);

    if ($result) echo 'true&' . $favorNum;
    else echo 'false&' . $favorNum;
}