<?php
session_start();

$_SESSION['personid'] = $_POST['personid'];
$_SESSION['aftername'] = $_POST['aftername'];
$_SESSION['afterdepart'] = $_POST['afterdepart'];
$_SESSION['afterphone'] = $_POST['afterphone'];
$_SESSION['aftergender'] = $_POST['aftergender'];
$_SESSION['afteradmin'] = $_POST['afteradmin'];
$_SESSION['afterchpass'] = $_POST['afterchpass'];
?>

<!DOCTYPE html>
<html>

<head>
    <title>社員参照アプリ</title>
    <meta charset="utf-8">
</head>

<body>
    <h1>社員情報 確認</h1>
    <p>入力情報をご確認ください。</p>
    <p>社員ID:
        <?php echo $_SESSION["personid"] ?><br>
    <p>氏名:
        <?php echo $_SESSION["aftername"] ?><br>
    <p>所属部署:
        <?php echo $_SESSION["afterdepart"] ?><br>
    <p>性別:
        <?php echo $_SESSION["aftergender"] ?><br>
    <p>電話番号:
        <?php echo $_SESSION["afterphone"] ?><br>
    <p>管理者権限:
        <?php echo $_SESSION["afteradmin"] ?><br>
    <p>パスワード変更要請:
        <?php echo $_SESSION["afterchpass"] ?><br>

    <form method="post" action="change.php">
        <input type="submit">
    </form>
</body>

</html>