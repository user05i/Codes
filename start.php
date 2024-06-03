<?php
session_start();
unset($_SESSION['userid']);
unset($_SESSION['userpname']);
unset($_SESSION['userpassword']);
unset($_SESSION['useradmin']);
unset($_SESSION['afterlogin']);
?>

<!DOCTYPE html>
<html>

<head>
    <title>login</title>
    <style>
        /* 追加：背景画像とレイアウトの設定 */
        body {
            margin: 0;
            padding: 0;
            height: 100vh;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            background-color: white;
            font-family: 'Century Gothic', sans-serif;
            /* フォントを統一 */
        }

        .example {
            display: flex;
            justify-content: center;
            align-items: center;
            background: url('mmm.jpg') no-repeat center center / cover;
            height: 300px;
            width: 100%;
            color: rgba(255, 255, 255, 0.9);
            font-size: 10vw;
            /* ビューポート幅の10%に設定 */
            font-weight: bold;
            word-wrap: break-word;
            text-align: center;
        }

        h1,
        h2 {
            font-family: serif;
            /* フォントをserifに変更 */
        }

        h1 {
            font-size: 2em;
            color: black;
            text-align: center;
        }

        h2 {
            font-size: 1em;
            color: black;
            text-align: center;
        }

        form {
            background-color: white;
            padding: 2em;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        form div {
            display: flex;
            flex-direction: column;
            align-items: flex-start;
            margin-bottom: 1em;
        }

        input[type="text"],
        input[type="password"],
        input[type="submit"] {
            font-family: 'Century Gothic', sans-serif;
            /* フォントを統一 */
            margin-top: 0.5em;
            padding: 0.5em;
            width: 100%;
            max-width: 300px;
            box-sizing: border-box;
        }

        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            border: none;
            cursor: pointer;
            border-radius: 5px;
            margin-top: 1em;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>
</head>

<body>
    <div class="example">M e g a T o w n</div>
    <h1>Welcome to MegaTown!</h1>
    <h2>Please enter your ID and password</h2>
    <form method="post" action="login.php">
        <div>
            <label for="id">ID:</label>
            <input type="text" name="id" id="id">
        </div>
        <div>
            <label for="password">PASSWORD:</label>
            <input type="password" name="password" id="password">
        </div>
        <input type="submit" value="Login">
    </form>
</body>

</html>