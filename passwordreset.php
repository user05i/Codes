<?php
require_once 'connect.php';
session_start();

$_SESSION['password'] = $_POST['password'];

$sql = "UPDATE user SET password='password', chpass=false where id=" . $_SESSION['id'] . " and name = '" . $_SESSION['name'] . "' and depart = '" . $_SESSION['depart'] . "'";
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
        <h1>Password has been reset!</h1>
        <p><a href="index.php">社員参照ページに戻る</a></p>
</body>

</html>