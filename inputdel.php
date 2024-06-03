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
    <p>削除したい社員情報を入力してください。</p>
    <form method="post" action="confirmdel.php">
        社員ID:
        <input type="number" name="id" required><br>
        <br>
        氏名:
        <input type="text" name="name" required><br>
        <br>
        所属部署:
        <input type="text" name="depart" required><br>
        <br>
        <!-- 性別:
<input type="radio" name="gender" value="男" required>男性 /
<input type="radio" name="gender" value="女" required>女性<br>
<br>
電話番号:
<input type="text" name="phone" required><br>
<br>
パスワード:
<input type="text" name="password" required><br>
<br>
管理者権限
<input type="radio" name="admin" value=true required>あり /
<input type="radio" name="admin" value=false required>なし<br>
<br> -->
        <input type="submit">
    </form>
</body>

</html>