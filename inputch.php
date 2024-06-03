<?
// php session_start()
?>

<!DOCTYPE html>
<html>

<head>
    <title>社員参照アプリ</title>
    <meta charset="utf-8">
</head>

<body>
    <h1>社員情報 入力</h1>
    <p>変更したい社員情報を入力してください。</p>
    <form method="post" action="confirmch.php">
        社員ID:
        <input type="number" name="personid" required><br>
        <br>
        氏名:
        <input type="text" name="aftername" required><br>
        <br>
        所属部署:
        <input type="text" name="afterdepart" required><br>
        <br>
        性別:
        <input type="radio" name="aftergender" value="男" required>男性 /
        <input type="radio" name="aftergender" value="女" required>女性<br>
        <br>
        電話番号:
        <input type="text" name="afterphone" required><br>
        <br>
        <!-- パスワード:
<input type="text" name="afterpassword" required><br>
<br> -->
        管理者権限
        <input type="radio" name="afteradmin" value=true required>あり /
        <input type="radio" name="afteradmin" value=false required>なし<br>
        <br>
        <!-- パスワード変更要請
<input type="radio" name="afterchpass" value=false required>あり /
<input type="radio" name="afterchpass" value=true required>なし<br>
<br> -->
        <input type="submit">
    </form>
</body>

</html>