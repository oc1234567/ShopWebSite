
<!--登录主页-->
<?php
@session_start();
require './mysql/util.php';
require './mysql/constants.php';

$login_success = false;
$username_error = "";
$password_error = "";

$login_username = isset($_POST["username"]) ? $_POST["username"] : "";
$login_password = isset($_POST["password"]) ? $_POST["password"] : "";

//登录 验证
if (!isset($_SESSION["username"])) {
    if (isset($_COOKIE["username"]) && isset($_COOKIE["password"])) {
        //用 cookie 给 session 赋值
        $_SESSION["username"] = $_COOKIE["username"];
        $_SESSION["password"] = $_COOKIE["password"];
        $login_username = $_SESSION["username"];
        $login_success = true;
    } else {
        $login_success = false;
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            //输入字符
            $login_username = test_input($login_username);
            $login_password = test_input($login_password);

            if (!empty($login_username) && !empty($login_password)) {
                if (strcmp($login_username, $username)) {
                    $username_error = "登录名错误！";
                } else {
                    if (strcmp($login_password, $password)) {
                        $password_error = "密码错误！";
                    } else {
                        $login_success = true;
                        // //设置cookie
                        setcookie("username", $login_username, time()+3600*24);
                        setcookie("password", $login_password, time()+3600*24);
                        //设置session
                        $_SESSION["username"] = $login_username;
                        $_SESSION["password"] = $login_password;
                    }
                }
            } else {
                if (!$login_username) {
                    $username_error = '请输入登录名！';
                }
                if (!$login_password) {
                    $password_error = '请输入密码！';
                }
            }
        }
    }
} else {
    $login_username = $_SESSION["username"];
    $login_success = true;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>主页</title>
    <style>
    </style>
</head>
<body>
<div style="display: grid; grid-column-gap: 50px; grid-row-gap:50px">
<!--左边侧边栏-->
<div style="grid-column: 1 / 3">
<?php require './component/side.php'?>
</div>

<?php if ($login_success) { ?>
<main style="grid-column: 4 / 12">
<h1>欢迎~</h1>
<h2><?php echo $login_username?></h2>
</main>
<?php } else { ?>
<main style="grid-column: 4 / 12">
<form action="" method="POST">
    <fieldset style="display: grid; width: 20%">
        <legend>登录</legend>
        <label for="username" style="grid-column: 1 / 3">用户名：</label><input type="text" name="username" id="username" value="<?=$login_username?>" style="width: 80%"><span><?php echo $username_error;?></span><br>
        <label for="password" style="grid-column: 1 / 3">密码：</label><input type="password" id="password" name="password" value="" style="width: 80%"><span><?php echo $password_error;?></span><br>
        <input type="submit" value="确定" style="width: 100%">
    </fieldset>
</form>
</div>
</main>
</body>
</html>
<?php } ?>