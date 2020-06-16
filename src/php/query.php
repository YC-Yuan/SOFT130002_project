<?php
require_once('pdo.php');

//搜所有图片
function getAllImg()
{
    $sql = 'SELECT travelimage.* FROM travelimage';
    return pdo($sql);
}

//ID搜各种
function getImg($imgId)
{
    //按图片ID搜索图片
    $sql = 'SELECT * FROM `travelimage` WHERE ImageID=' . $imgId;
    $result = pdo($sql);
    return $result->fetch();
}

function getFavorNum($imgId)
{
    $sql = 'SELECT * FROM `travelimagefavor` WHERE ImageID=' . $imgId;
    return pdo($sql)->rowCount();
}

//UID搜各种
function getUserName($UID)
{
    $sql = 'SELECT * FROM `traveluser` WHERE UID=' . $UID;
    $result = pdo($sql);
    return $result->fetch()['UserName'];
}

function getMyPhoto($UID)
{
    $sql = 'SELECT * FROM `travelimage` WHERE UID=' . $UID;
    return pdo($sql);
}

function getFavorPhoto($UID)
{
    $sql = 'SELECT travelimage.* FROM travelimage,travelimagefavor 
                WHERE travelimagefavor.UID=' . $UID . ' AND travelimage.ImageID=travelimagefavor.ImageID';
    return pdo($sql);
}

//city&cityCode
function getCity($cityCode)
{
    if ($cityCode != null) {
        $sql = 'SELECT * FROM `geocities` WHERE GeoNameID=' . $cityCode;
        $result = pdo($sql);
        $geo = $result->fetch();
        $city = $geo['AsciiName'];
    } else {
        $city = 'unknown';
    }
    return $city;
}

function getCityCode($city)
{
    if ($city != null) {
        $sql = 'SELECT * FROM `geocities` WHERE AsciiName=' . $city;
        $result = pdo($sql);
        $geo = $result->fetch();
        $cityCode = $geo['AsciiName'];
    } else {
        $cityCode = 'unknown';
    }
    return $cityCode;
}

function getCountry($countryCode)
{
    if ($countryCode != null) {
        $sql = 'SELECT * FROM `geocountries_regions` WHERE ISO="' . $countryCode . '"';
        $result = pdo($sql);
        $country = $result->fetch()['Country_RegionName'];
    } else {
        $country = 'unknown';
    }
    return $country;
}

function getCountryCode($country)
{
    if ($country != null) {
        $sql = 'SELECT * FROM `geocountries_regions` WHERE Country_RegionName="' . $country . '"';
        $result = pdo($sql);
        $countryCode = $result->fetch()['ISO'];
    } else {
        $countryCode = 'unknown';
    }
    return $countryCode;
}

function isFavored($UID, $imageId)
{
    $sql = 'SELECT * FROM `travelimagefavor` WHERE UID=' . $UID . ' AND ImageID=' . $imageId;
    $result = pdo($sql);
    if ($result->rowCount() > 0) {
        return true;
    } else return false;
}