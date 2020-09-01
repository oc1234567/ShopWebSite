<?php
require 'constants.php';

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("连接失败: ".$conn->connect_error);
}
echo "连接成功~";


$sql_table = "CREATE TABLE GOODS (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    gname VARCHAR(30) NOT NULL,
    gprice VARCHAR(30) NOT NULL,
    gdescription VARCHAR(1000) NOT NULL,
    gpast_due TIMESTAMP
)";

if ($conn->query($sql_table) === TRUE) {
    echo "商品表格创建成功";
} else {
    echo "创建商品表格错误：".$conn->error;
}

$conn->close();
?>