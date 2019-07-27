<?php
header("Content-Type: text/html; charset=uft-8");
$db_link = mysqli_connect("localhost", "root", "123456", "class");
if (!$db_link) {
    echo "DB connect fail";
} else {
    echo "DB connect sucess";
    $db_link->query("SET NAMES 'utf8'");
    $result = $db_link->query("SELECT * FROM test ORDER BY cID ASC");
    echo '<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8"></head>';
    while ($row_result = $result->fetch_assoc()) {
        echo "<p><span>".$row_result["cID"]."</span>";
        echo "<span>".$row_result["cName"]."</span></p>";
    }
}
