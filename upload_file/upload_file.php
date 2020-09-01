<?php
//限制上传的文件类型
$allowedExts = array("gif", "jpeg", "jpg", "png");
$temp = explode(".", $_FILES["file"]["name"]);
$extension = end($temp); //获取文件后缀名
$type = $_FILES["file"]["type"];
echo $type;
if (($type == "image/gif") 
|| ($type == "image/jpeg") 
|| ($type == "image/jpg") 
|| ($type == "image/pjpeg") 
|| ($type == "image/x-png") 
|| ($type == "image/png")) {
    if (in_array($extension, $allowedExts)) {
        //限制上传的文件大小
        $size = $_FILES["file"]["size"];
        if ($size < 204800) {
            //捕获错误
            $error = $_FILES["file"]["error"];
            if ($error > 0) {
                echo "错误：" . $_FILES["file"]["error"] . "<br>";
            } else {
                echo "上传文件名：" . $_FILES["file"]["name"] . "<br>";
                echo "文件类型：" . $_FILES["file"]["type"] . "<br>";
                echo "文件大小：" . ($_FILES["file"]["size"] / 1024) . " kB<br>";
                echo "文件临时存续的位置：" . $_FILES["file"]["tmp_name"] . "<br>";

                //如果没有 upload 目录，则需要先创建目录，并且使用 chmod 777 upload 修改具有可写入权限，否则移动文件进入 upload 目录不会成功
                //判断 upload 目录下是否存在该文件
                if (file_exists("upload/" . $_FILES["file"]["name"])) {
                    echo $_FILES["file"]["name"] . " 文件已经存在。";
                } else {
                    move_uploaded_file($_FILES["file"]["tmp_name"], "upload/" . $_FILES["file"]["name"]);
                    echo "文件存储在： " . "upload/" . $_FILES["file"]["name"];
                }
            }
        } else {
            echo "请选择不超过 200kb 的文件";
        }
    } else {
        echo "请选择符合后缀名为gif 、jpeg、jpg、png的图片文件";
    }
    
} else {
    echo "请选择符合要求的文件";
}
?>