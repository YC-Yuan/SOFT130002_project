<?php
session_start();
require_once("query.php");
require_once("pdo.php");
$UID = $_SESSION['UID'];

//如果是POST，说明已提交，直接更改数据库
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    print_r($_POST);
    $imgId = $_POST['imgId'];
    $title = $_POST['title'];
    $description = $_POST['description'];
    $city = $_POST['city'];
    $country = $_POST['country'];
    $content = $_POST['content'];
    $newId = getMaxId() + 1;

    if ($_FILES['file']['name'] != '') {//传入了图片，下载到图片库
        $file = $_FILES['file'];
        $PATH = $file['name'];
        $upload_path = '../../img/travel/';
        if (move_uploaded_file($file['tmp_name'], $upload_path . $PATH)) {
            if ($imgId == '') {//新上传图片，添加到数据库
                $sql = '
                INSERT INTO `travelimage` (`ImageID`,`Title`, `Description`, `CityCode`, `Country_RegionCodeISO`, `UID`, `PATH`, `Content`)
                VALUES ("' . $newId . '","' . $title . '","' . $description . '","' . getCityCode($city) . '","' . getCountryCode($country) . '","' . $UID . '","' . $PATH . '","' . $content . '");';
                //echo 12;
                if (pdo($sql)) header("Location:../html/details.php?imgId=" . $newId);
                else echo "<script>alert('上传失败！');history.back();</script>";
            } else {//老图修改，更改数据库
                $sql = 'UPDATE `travelimage` SET `Title`="' . $title . '",`Description`="' . $description . '",`CityCode`="' . getCityCode($city) . '",`Country_RegionCodeISO`="' . getCountryCode($country) . '",`PATH`="' . $PATH . '",`Content`="' . $content . '" WHERE `ImageID`=' . $imgId;
                //echo 1233;
                if (pdo($sql)) header("Location:../html/details.php?imgId=" . $imgId);
                else echo "<script>alert('老图更新失败！');history.back();</script>";
            }
        } else {//文件重名，上传失败
            echo "<script>alert('文件上传失败！');history.back();</script>";
        }
    } else {//未上传图片，更改数据库
        $sql = 'UPDATE `travelimage` SET `Title`="' . $title . '",`Description`="' . $description . '",`CityCode`="' . getCityCode($city) . '",`Country_RegionCodeISO`="' . getCountryCode($country) . '",`Content`="' . $content . '" WHERE `ImageID`=' . $imgId;
        //echo 123344;
        //echo $sql;
        if (pdo($sql)) header("Location:../html/details.php?imgId=" . $imgId);
        else echo "<script>alert('修改失败！');history.back();</script>";
    }
}