<?php

require 'constants.php';
 
$conn = new mysqli($servername, $username, $password);

if ($conn->connect_error) {
    die("连接失败: ".$conn->connect_error);
}
echo "连接成功~";

$conn->close();

?>