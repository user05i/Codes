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
    <p>パスワードをリセットしたい社員の情報を入力してください。</p>
    <form method="post" action="confirmreset.php">
        社員ID:
        <input type="number" name="id" required><br>
        <br>
        氏名:
        <input type="text" name="name" required><br>
        <br>
        所属部署:
        <input type="text" name="depart" required><br>
        <br>
        <input type="submit">
    </form>
</body>

</html>