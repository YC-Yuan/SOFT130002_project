<?php

$pageCapacity = 16;

function getPageNum($type,$user)
{
    try {
        $pdo = new PDO('mysql:dbname=travels;charset=utf8mb4;', 'webProject', '19302010020');
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


        $sql = 'select count(*) num from travelimage';
        $result = $pdo->query($sql);

        $row = $result->fetch();
        $num = $row['num'];

        global $pageCapacity;
        $pageNum = (int) ($num / $pageCapacity + 1);
        $pdo = null;

        echo $pageNum;

        return $pageNum;
    } catch (PDOException $e) {
        die($e->getMessage());
    }
}

getPageNum();