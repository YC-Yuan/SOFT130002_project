<?php

function getSalt()
{
    return rand(1000000000, 9999999999);
}

function encrypt($password)
{
    $salt=getSalt();
    $passSalt = $password . $salt;
    return sha1($passSalt) . " " . $salt;
}