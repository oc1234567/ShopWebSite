<?php
require 'constants.php';

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("连接失败: ".$conn->connect_error);
}
echo "连接成功~";

$stmt = $conn->prepare("INSERT INTO GOODS (gname, gprice, gdescription) VALUES (?, ?, ?)");
$stmt->bind_param("sss", $gname, $gprice, $gdescription);
$stmt->execute();
echo "新增一条新商品成功";
$stmt->close();
// $sql_insert_good = "INSERT INTO GOODS (gname, gprice, gdescription)
//                     VALUES ('商品1', '100.00', '很香')";

// if ($conn->query($sql_insert_good) === TRUE) {
//     echo "新增一条新商品成功";
// } else {
//     echo "错误：" . $sql_insert_good . "<br>" .$conn->error;
// }

$conn->close();
?>