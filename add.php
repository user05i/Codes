<?php
require_once 'connect.php';
session_start();

$id = $_SESSION['id'];
$name = $_SESSION['name'];
$depart = $_SESSION['depart'];
$gender = $_SESSION['gender'];
$phone = $_SESSION['phone'];
$admin = $_SESSION['admin'];

$sql = "INSERT INTO user VALUES('$id','$name','$depart','$gender','$phone','password','$admin',false)";

$result = $mysqli->query($sql);

if (!$result) {
        echo $mysqli->error;
        exit();
}

$mysqli->close();

?>

<!DOCTYPE html>
<html>

<head>
        <title>社員参照アプリ</title>
        <meta charset="utf-8">
</head>

<body>
        <h1>社員情報 登録</h1>
        <p>登録を完了しました。</p>
        <p><a href="index.php">登録済みデータを確認する</a></p>
</body>

</html>