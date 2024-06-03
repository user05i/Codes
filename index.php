<?php
require_once 'connect.php';
session_start();

echo $_POST['afterLogin'];

// Output the contents of $_SESSION
echo "<pre>";
print_r($_SESSION);
echo "</pre>";

if (isset($_POST['samePage'])) {
  // Define an array to store the selected positions
  $selectedPositions = [];

  // Check if the 'position' checkbox was checked
  if (isset($_POST['position'])) {
    $selectedPositions = $_POST['position'];
  }

  if (!empty($selectedPositions)) {


    // Construct the SQL query based on the selected positions
    $sql = "SELECT * FROM user WHERE position IN ('" . implode("', '", $selectedPositions) . "')";
  } else {
    $sql = "SELECT * FROM user";
  }
} else {
  $sql = "SELECT * FROM user";
}

$result = $mysqli->query($sql);

//クエリー失敗
if (!$result) {
  echo $mysqli->error;
  exit();
}

//レコード件数
$row_count = $result->num_rows;

//連想配列で取得
while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
  $rows[] = $row;
}

//結果セットを解放
$result->free();

// データベース切断
$mysqli->close();

?>

<!DOCTYPE html>
<html>

<head>
  <title>社員参照アプリ</title>
  <meta charset="utf-8">
</head>

<body>
  <h1>社員情報 一覧</h1>

  レコード件数：<?php echo $row_count; ?>

  <table border='1'>
    <tr>
      <th>社員ID</th>
      <th>部署</th>
      <th>役職</th>
      <th>名前</th>
      <th>名前(カナ)</th>
      <th>性別</th>
      <th>電話番号</th>
      <th>誕生日</th>
      <th>年齢</th>
    </tr>

    <?php
    foreach ($rows as $row) {
      ?>
      <tr>
        <td><?php echo $row['id']; ?></td>
        <td><?php echo htmlspecialchars($row['depart'], ENT_QUOTES, 'UTF-8'); ?></td>
        <td><?php echo htmlspecialchars($row['position'], ENT_QUOTES, 'UTF-8'); ?></td>
        <td><?php echo htmlspecialchars($row['name'], ENT_QUOTES, 'UTF-8'); ?></td>
        <td><?php echo htmlspecialchars($row['name_kana'], ENT_QUOTES, 'UTF-8'); ?></td>
        <td><?php echo htmlspecialchars($row['gender'], ENT_QUOTES, 'UTF-8'); ?></td>
        <td><?php echo htmlspecialchars($row['phone_number'], ENT_QUOTES, 'UTF-8'); ?></td>
        <td><?php echo htmlspecialchars($row['birth_date'], ENT_QUOTES, 'UTF-8'); ?></td>
        <td><?php echo htmlspecialchars($row['age'], ENT_QUOTES, 'UTF-8'); ?></td>
      </tr>
      <?php
    }
    ?>
  </table>

  <form method="post" action="index.php">
    <input type="checkbox" name="position[]" value="代表取締役社長">代表取締役社長<br>
    <input type="checkbox" name="position[]" value="取締役">取締役<br>
    <input type="checkbox" name="position[]" value="部長">部長<br>
    <input type="checkbox" name="position[]" value="次長">次長<br>
    <input type="checkbox" name="position[]" value="課長">課長<br>
    <input type="checkbox" name="position[]" value="係長">係長<br>
    <input type="hidden" name="samePage" value=true>
    <button type="submit">絞り込む</button>
  </form>

  <!-- Hidden form with the link -->
  <form id="hiddenForm" action="login.php" method="post">
    <input type="hidden" name="afterLogin" value="true">
  </form>

  <!-- Link to trigger the form submission -->
  <p><a href="#" onclick="submitForm()">戻る</a></p>

  <script>
    function submitForm() {
      // Submit the form
      document.getElementById("hiddenForm").submit();
    }
  </script>

  <?php
  if ($_SESSION['useradmin'] == true) {
    ?>
    <p><a href="input.php">社員情報を追加する</a></p>
    <p><a href="inputdel.php">社員情報を削除する</a></p>
    <p><a href="inputch.php">社員情報を変更する</a></p>
    <p><a href="resetpass.php">社員のパスワードをリセットする</a></p>
    <?php
  }
  ?>
</body>

</html>