<?php
require_once 'connect.php';
session_start();

$id = $_SESSION['personid'];
$name = $_SESSION['aftername'];
$depart = $_SESSION['afterdepart'];
$gender = $_SESSION['aftergender'];
$phone = $_SESSION['afterphone'];
$password = $_SESSION['afterpassword'];
$admin = $_SESSION['afteradmin'];
$chpass = $_SESSION['afterchpass'];

$sql = "UPDATE user SET name='" . $name . "', depart='" . $depart . "', gender='" . $gender . "', phone='" . $phone . "', password='" . $password . "', admin='" . $admin . "', chpass='" . $chpass . "' where id='" . $id . "'";

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
        <h1>社員情報 変更</h1>
        <p>変更を完了しました。</p>
        <p><a href="index.php">登録済みデータを確認する</a></p>
</body>

</html>