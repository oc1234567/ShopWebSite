<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .error {
            color: #FF0000;
        }
    </style>
</head>
<body>
<?php
$name = isset($_POST['name']) ? $_POST['name'] : '';
$email = isset($_POST['email']) ? $_POST['email'] : '';
$website = isset($_POST['website']) ? $_POST['website'] : '';
$comment = isset($_POST['comment']) ? $_POST['comment'] : '';
$gender = isset($_POST['gender']) ? $_POST['gender'] : '';
$varifySuccess = false;
//验证字段
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if ($name && $email && $gender) {
        //验证名称
        $name = test_input($name);
        $email = test_input($email);
        $website = test_input($website);
        if (!varify_name($name)) {
            $nameError = '姓名只允许字母和空格！';
        } else if (!varify_email($email)) {
            $emailError = '邮箱格式非法！';
        } else {
           if ($website) {
               if (varify_website($website)) {
                   $varifySuccess = true; 
               }
           } else {
               $varifySuccess = true; 
           }
        }
        
    } else {
        if (!$name) {
            $nameError = '请输入姓名！';
        }
    
        if (!$email) {
            $emailError = '请输入邮箱！';
        }
    
        if (!$gender) {
            $genderError = '请选择性别！';
        }
    }
}

function test_input($data)
{
    $data = trim($data);
    $data = stripcslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

function varify_name($data)
{
    if (preg_match("/^[a-zA-Z ]*$/", $data)) {
        return true;
    }
    return false;
}

function varify_email($data)
{
    if (preg_match("/([\w\-]+\@[\w\-]+\.[\w\-]+)/", $data)) {
        return true;
    }
    return false;
}

function varify_website($data)
{
    if (preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i", $data)) {
        return true;
    }
    return false;
}

if ($varifySuccess) {
    //验证通过
    echo '您输入的内容是：' . '<br>' .'姓名：' . $name . '<br>' . '邮箱：' . $email . '<br>' . ($website ? '网址：' . $website . '<br>' : '') . ($comment ? '备注：' . $comment . '<br>' : '') . '性别：' . $gender; 
} else {
?>
<form action="" method="POST">
    <label for="name">姓名：</label><input type="text" name="name" id="name" value="<?=$name?>"> * <span class="error"><?php echo $nameError?></span><br>
    <label for="email">邮箱：</label><input type="text" name="email" id="email" value="<?=$email?>"> * <span class="error"><?php echo $emailError?></span><br>
    <label for="website">网址：</label><input type="text" name="website" id="website" value="<?=$website?>"><br>
    <label for="comment">备注：</label><textarea name="comment" id="comment" cols="30" rows="10"></textarea><br>
    性别：<input type="radio" name="gender" value="male" <?php if (isset($gender) && $gender=="male") echo "checked";?>>男 
    <input type="radio" name="gender" value="female" <?php if (isset($gender) && $gender=="female") echo "checked";?>>女 * <span class="error"><?php echo $genderError?></span><br>

    <input type="submit" value="提交">
</form>
<?php
}
?>
</body>
</html>
