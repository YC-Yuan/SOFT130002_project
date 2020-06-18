<?php
require_once('pdo.php');
require_once('query.php');
//根据js传入的City，获取对应的城市
$country = $_GET['country'];
$sql = 'SELECT `CityCode` FROM `travelimage` WHERE `Country_RegionCodeISO`="' . $country . '" GROUP BY travelimage.CityCode ORDER BY COUNT(travelimage.CityCode) DESC';
$result = pdo($sql);
for ($i = 1; $i <= $result->rowCount(); $i++) {
    $row = $result->fetch();
    if (isset($row['CityCode'])) {
        echo $row['CityCode'] . '&' . getCity($row['CityCode']);
    } else echo 'null';
    if ($i != $result->rowCount()) echo '|';
}