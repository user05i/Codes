<?php
require_once 'connect.php';
session_start();
// phpinfo();


// $id = $_SESSION['id'];
// $name = $_SESSION['name'];
// $depart = $_SESSION['depart'];
// $gender = $_SESSION['gender'];
// $phone = $_SESSION['phone'];
// $password = $_SESSION['password'];
// $admin = $_SESSION['admin'];

// Incremental naming function
function getUniqueFileName($targetDir, $fileName)
{
    echo $fileName;
    // Find the position of the last dot in the filename
    $lastDotPosition = strrpos($fileName, '.');

    // Separate the filename and the extension
    $fileBaseName = substr($fileName, 0, $lastDotPosition);
    echo $fileBaseName;
    $fileExtension = pathinfo($fileName, PATHINFO_EXTENSION);
    $i = 1;
    while (file_exists($targetDir . $fileName)) {
        $fileName = $fileBaseName . '_' . $i . '.' . $fileExtension;
        $i++;
    }
    return $fileName;
}

// Check if there's a file uploaded
if (isset($_FILES["file"])) {
    $targetDir = "uploads/";
    // $fileName = basename($_FILES["file"]["name"]);
    $fileName = $_POST['filename'];
    // $fileName = mb_convert_encoding($fileName, 'UTF-8');
    echo $fileName;
    print_r($fileName);
    // $encodedFileName = rawurlencode($fileName);
    $targetFile = $targetDir . basename($fileName);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));
    echo $imageFileType;

    // Generate a unique filename if the file already exists
    if (file_exists($targetFile)) {
        echo $fileName;
        $newFileName = getUniqueFileName($targetDir, $fileName);
        echo $fileName;
        // $encodedFileName = rawurlencode($fileName);
        $targetFile = $targetDir . $newFileName;
    }

    // Check file size (optional)
    if ($_FILES["file"]["size"] > 500000) {
        echo "Sorry, your file is too large.";
        $uploadOk = 0;
    }

    // Allow certain file formats
    // if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    //     && $imageFileType != "gif") {
    //     echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    //     $uploadOk = 0;
    // }

    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
        // if everything is ok, try to upload file
    } else {
        if (move_uploaded_file($_FILES["file"]["tmp_name"], $targetFile)) {
            // File uploaded successfully, now insert into database

            $downloadLink = "http://www.megatown-list.com/uploads/" . $newFileName; // Change example.com to your domain
            // $sql = "INSERT INTO files (filename, download_link) VALUES ('$fileName', '$downloadLink')";
            $query = "INSERT INTO chatlist VALUES(NULL,'" .
                $_SESSION['userid'] . "','" .
                $_SESSION['username'] . "','" .
                $downloadLink . "',NULL,'" . $fileName . "')";

            if ($mysqli->query($query) === TRUE) {
                echo "The file " . htmlspecialchars($fileName, ENT_QUOTES, 'UTF-8') . " has been uploaded. <br>Download link: <a href='" . $downloadLink . "' download>" . htmlspecialchars($fileName, ENT_QUOTES, 'UTF-8') . "</a>";
            } else {
                echo "Error: " . $sql . "<br>" . $mysqli->error;
            }
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }
} else {
    $query = "INSERT INTO chatlist VALUES(NULL,'" .
        $_SESSION['userid'] . "','" .
        $_SESSION['username'] . "','" .
        $_POST['chat'] . "',NULL,NULL)";
    $result = $mysqli->query($query);
}

// $stmt = $mysqli->prepare($query);


// if($result){
// $resultMessage = "データベースに登録しました。";
// } else {
// $resultMessage = "データベース登録に失敗しました。";
// }
// echo $resultMessage;


#
// ステートメントを閉じる
// $stmt->close();

// データベース接続を閉じる
$mysqli->close();


// セッションに結果メッセージを保存
$_SESSION['resultMessage'] = $resultMessage;


// chatter.phpにリダイレクト
header("Location: chatter.php");
// exit();
#


?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Chatter</title>
    <style type="text/css">
        p,
        form {
            background-color: white;
            width: 400px;
            margin: auto;
            padding: 2em;
        }
    </style>
</head>

<body style="background-color:LightBlue;">
    <p><?php echo "$resultMessage" ?></p>
    <hr>
    <?php
    echo $fileName;
    ?>
    <p><a href="chatter.php">記事一覧に戻る</a></p>
</body>

</html>