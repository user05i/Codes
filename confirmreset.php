<?php
session_start();

$_SESSION['id'] = $_POST['id'];
$_SESSION['name'] = $_POST['name'];
$_SESSION['depart'] = $_POST['depart'];
// $_SESSION['phone'] = $_POST['phone'];
// $_SESSION['gender'] = $_POST['gender'];
// $_SESSION['admin'] = $_POST['admin'];
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
        <?php echo $_SESSION["id"] ?><br>
    <p>氏名:
        <?php echo $_SESSION["name"] ?><br>
    <p>所属部署:
        <?php echo $_SESSION["depart"] ?><br>
        <!-- <p>性別:
<?php echo $_SESSION["gender"] ?><br>
<p>電話番号:
<?php echo $_SESSION["phone"] ?><br> -->

    <form method="post" action="passwordreset.php">
        <input type="submit">
    </form>
</body>

</html>