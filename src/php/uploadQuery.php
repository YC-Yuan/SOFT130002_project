<?php
require_once('pdo.php');
require_once('query.php');


if (isset($_GET['country'])) {
    $country = $_GET['country'];

    $sql = 'SELECT * FROM `geocountries_regions` WHERE `Country_RegionName` ="' . $country . '"';
    $result = pdo($sql);
    if ($result->rowCount() > 0) {
        echo 'true';
        return;
    } else {
        $keys = explode(" ", $country);
        $keyNum = count($keys);
        $sql = 'SELECT * FROM `geocountries_regions` WHERE `Country_RegionName` LIKE  "%' . $keys[0] . '%"';
        for ($i = 2; $i <= $keyNum; $i++) {
            $sql = $sql . ' AND `Country_RegionName` LIKE "%' . $keys[$i - 1] . '%"';
        }
        $sql = $sql . ' LIMIT 5';
        $result = pdo($sql);
        if ($result->rowCount() > 0) {
            echo $result->fetch()['Country_RegionName'];
            while ($row = $result->fetch()) {
                echo '|' . $row['Country_RegionName'];
            }
        } else {
            echo 'false';
            return;
        }
    }
} else {
    $city = $_GET['city'];

    $sql = 'SELECT * FROM `geocities` WHERE `AsciiName` ="' . $city . '"';
    $result = pdo($sql);
    if ($result->rowCount() > 0) {
        echo 'true';
        return;
    } else {
        $keys = explode(" ", $city);
        $keyNum = count($keys);
        $sql = 'SELECT * FROM `geocities` WHERE `AsciiName` LIKE  "%' . $keys[0] . '%"';
        for ($i = 2; $i <= $keyNum; $i++) {
            $sql = $sql . ' AND `AsciiName` LIKE "%' . $keys[$i - 1] . '%"';
        }
        $sql = $sql . ' LIMIT 5';
        $result = pdo($sql);
        if ($result->rowCount() > 0) {
            echo $result->fetch()['AsciiName'];
            while ($row = $result->fetch()) {
                echo '|' . $row['AsciiName'];
            }
        } else {
            echo 'false';
            return;
        }
    }
}


