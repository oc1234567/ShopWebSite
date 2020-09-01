<?php

require 'constants.php';
 
$conn = new mysqli($servername, $username, $password);

if ($conn->connect_error) {
    die("连接失败: ".$conn->connect_error);
}
echo "连接成功~";

$sql = "CREATE DATABASE shopDB";

if ($conn->query($sql) === TRUE) {
    echo "数据库创建成功";
} else {
    echo "创建数据库失败：" . $conn->error;
}

$conn->close();

?>