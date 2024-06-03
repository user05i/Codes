<?php
require_once 'connect.php';
session_start();

$id = $_SESSION['id'];
$name = $_SESSION['name'];
$depart = $_SESSION['depart'];
// $gender = $_SESSION['gender'];
// $phone = $_SESSION['phone'];
// $password = $_SESSION['password'];
// $admin = $_SESSION['admin'];

$sql = "DELETE FROM user WHERE id = '" . $id . "' and name = '" . $name . "' and depart = '" . $depart . "'";

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
        <h1>社員情報 削除</h1>
        <p>削除を完了しました。</p>
        <p><a href="index.php">登録済みデータを確認する</a></p>
</body>

</html>