<?php
$dir = "uploads/";
$files = scandir($dir);

foreach ($files as $file) {
    if ($file !== '.' && $file !== '..') {
        echo "<a href='download.php?file=" . urlencode($file) . "'>" . htmlspecialchars($file) . "</a><br>";
    }
}
?>
