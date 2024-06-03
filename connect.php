<?php
#【XXX】を書き換えて使う
$server = "172.31.6.143";
$userName = "megatown";
$password = "password";
$dbName = "empdb";

$mysqli = new mysqli($server, $userName, $password, $dbName);

if ($mysqli->connect_error) {
        echo $mysqli->connect_error;
        exit();
} else {
        $mysqli->set_charset("utf8");
}
?>