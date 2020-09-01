<?php
require 'constants.php';

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("连接失败: ".$conn->connect_error);
}
echo "连接成功~";


$sql_query_good = "SELECT id, gname, gprice, gdescription FROM GOODS";

$result = $conn->query($sql_query_good);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "id: " . $row["id"] . " 商品名：" . $row["gname"] . " 价格：" . $row["gprice"] . "描述：" . $row["gdescription"] . "<br>";
    }
} else {
    echo "商品列表为空";
}

$conn->close();
?>