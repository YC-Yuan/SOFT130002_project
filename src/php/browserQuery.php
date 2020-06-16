<?php
require_once('pdo.php');

function getHottestContent($limit)
{//找出4个最热主题
    if ($limit == 0) $sql = 'SELECT `Content` FROM `travelimage` GROUP BY travelimage.Content ORDER BY COUNT(travelimage.Content) DESC';
    else $sql = 'SELECT `Content` FROM `travelimage` GROUP BY travelimage.Content ORDER BY COUNT(travelimage.Content) DESC LIMIT ' . $limit;
    $result = pdo($sql);
    $content = array();
    for ($i = 1; $i <= $result->rowCount(); $i++) {
        $row = $result->fetch();
        array_push($content, $row['Content']);
    }
    return $content;
}

function getHottestCountryISO($limit)
{
    if ($limit == 0) $sql = 'SELECT `Country_RegionCodeISO` FROM `travelimage` GROUP BY travelimage.Country_RegionCodeISO ORDER BY COUNT(travelimage.Country_RegionCodeISO) DESC';
    else    $sql = 'SELECT `Country_RegionCodeISO` FROM `travelimage` GROUP BY travelimage.Country_RegionCodeISO ORDER BY COUNT(travelimage.Country_RegionCodeISO) DESC LIMIT ' . $limit;
    $result = pdo($sql);
    $ISO = array();
    for ($i = 1; $i <= $result->rowCount(); $i++) {
        $row = $result->fetch();
        array_push($ISO, $row['Country_RegionCodeISO']);
    }
    return $ISO;
}

function getHottestCityCode($limit)
{
    if ($limit == 0) $sql = 'SELECT `CityCode` FROM `travelimage` GROUP BY travelimage.CityCode ORDER BY COUNT(travelimage.CityCode) DESC';
    else    $sql = 'SELECT `CityCode` FROM `travelimage` GROUP BY travelimage.CityCode ORDER BY COUNT(travelimage.CityCode) DESC LIMIT ' . $limit;
    $result = pdo($sql);
    $CityCode = array();
    for ($i = 1; $i <= $result->rowCount(); $i++) {
        $row = $result->fetch();
        array_push($CityCode, $row['CityCode']);
    }
    return $CityCode;
}

//单字段查询
//标题模糊查询
function getImgByTitle($title)
{
    $keys = explode(" ", $title);
    $keyNum = count($keys);

    $sql = 'SELECT * FROM travelimage WHERE `Title` LIKE  "%' . $keys[0] . '%"';
    for ($i = 2; $i <= $keyNum; $i++) {
        $sql = $sql . ' AND `Title` LIKE "%' . $keys[$i - 1] . '%"';
    }

    return pdo($sql);
}

function getImgByContent($content)
{
    $sql = 'SELECT * FROM travelimage WHERE `content` = "' . $content . '"';
    return pdo($sql);
}

function getImgByCountry($countryCode)
{
    $sql = 'SELECT * FROM travelimage WHERE `Country_RegionCodeISO` = "' . $countryCode . '"';
    return pdo($sql);
}

function getImgByCity($cityCode)
{
    $sql = 'SELECT * FROM travelimage WHERE `CityCode` = "' . $cityCode . '"';
    return pdo($sql);
}
