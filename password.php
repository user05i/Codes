<?php
require_once 'connect.php';
session_start();

$_SESSION['password'] = $_POST['password'];

$sql = "UPDATE user SET password='" . $_SESSION['password'] . "', chpass=true where id=" . $_SESSION['userid'];
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
        <h1>パスワード 登録</h1>
        <p>登録を完了しました。</p>
        <p><a href="start.php">ログインする</a></p>
</body>

</html>