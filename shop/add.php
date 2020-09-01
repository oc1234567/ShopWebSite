<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>添加</title>
    <style>
        .form {
            max-width: 500px;
            padding: 10px 20px;
            background: #f4f7f8;
            margin: 10px auto;
            border-radius: 8px;
            font-family: Georgia, 'Times New Roman', Times, serif;
        }
        .form fieldset {
            border: none;
        }
        .form legend {
            font-size: 1.4em;
            margin-bottom: 10px;
        }
        .form label {
            display: block;
            margin-bottom: 8px;
        }
        .form input[type="text"],
        .form textarea {
            font-family: Georgia, 'Times New Roman', Times, serif;
            background: rgba(255, 255, 255, .1);
            border: none;
            border-radius: 4px;
            font-size: 15px;
            margin: 0;
            outline: 0;
            padding: 10px;
            width: 100%;
            box-sizing: border-box;
            -webkit-box-sizing: border-box;
            -moz-box-sizing: border-box;
            background-color: #e8eeef;
            color: #8a97a0;
            -webkit-box-shadow: 0 1px 0 rgba(0, 0, 0, 0.03) inset;
            box-shadow: 0 1px 0 rgba(0, 0, 0, 0.03) inset;
            margin-bottom: 30px;
        }
        .form input[type="submit"] {
            position: relative;
            display: block;
            padding: 19px 39px 18px 39px;
            color: #FFF;
            margin: 0 auto;
            background-color: #1abc9c;
            font-size: 18px;
            text-align: center;
            font-style: normal;
            width: 100%;
            border: 1px solid #16a085;
            border-width: 1px 1px 3px;
            margin-bottom: 10px;
        }
        .form input[type="submit"]:hover {
            background: #109177;
        }
        .error {
            color: #f00;
            font-size: 11px;
        }
    </style>
</head>
<body>
<?php require './mysql/util.php'?>

<!--左边侧边栏-->
<?php require './component/side.php'?>

<?php
$gname = isset($_POST["gname"]) ? $_POST["gname"] : '';
$gprice = isset($_POST["gprice"]) ? $_POST["gprice"] : '';
$gdescription = isset($_POST["gdescription"]) ? $_POST["gdescription"] : '';
$gpast_due = isset($_POST["gpast_due"]) ? $_POST["gpast_due"] : '';
$isVarify = false;
$varifySuccess = false;
//验证
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    //验证必填项
    if ($gname && $gprice && $gdescription) {
        $gname = test_input($gname);
        $gprice = test_input($gprice);
        $gdescription = test_input($gdescription);

        //验证名称和描述
        if (!varify_chars($gname, 30)) {
            $name_error = "商品名必须是有效字符！";
        }
        //验证价格为数字类型
        if (!varify_price($gprice)) {
            $price_error = "价格必须是有效数字！";
        }
        if (!varify_chars($gdescription, 1000)) {
            $des_error = "商品描述必须是有效字符！";
        }
    }
    //提示填写必填项
    if (!$gname) {
        $name_error = "请填写商品名称";
    }
    if (!$gprice) {
        $price_error = "请填写商品价格";
    }
    if (!$gdescription) {
        $des_error = "请填写商品描述";
    }
    $isVarify = true;
}

function varify_chars($data, $num = 100) {
    if (preg_match("/^[a-z]*[0-9]*/i", $data)) {
        if (strlen($data) < $num) {
            return true;
        }
    }
    return false;
}
function varify_price($data)
{
    if (preg_match("/^[0-9]*$/", $data)) {
        return true;
    }
    return false;
}
if ($isVarify) {
    if ($name_error || $price_error ||$des_error) {
        $varifySuccess = false;
    } else {
        $varifySuccess = true;   
    }
}

if ($isVarify && $varifySuccess) {
    // echo "验证成功";
    // echo $gname . " " . $gprice . " " . $gdescription;
    require './mysql/insert_good.php';
} else {
?>
<!--商品信息填写-->
<div class="form">
    <form action="" method="POST">
        <fieldset>
            <legend>
                Product Info
            </legend>
            <label for="gname">商品名 *：</label><span class="error"><?php echo $name_error?></span><input type="text" name="gname" value="<?php echo $gname?>" id="gname">
            <label for="gprice">商品价格($) *：</label><span class="error"><?php echo $price_error?></span><input type="text" name="gprice" value="<?php echo $gprice?>" id="gprice">
            <label for="gdescription">商品描述 *：</label><span class="error"><?php echo $des_error?></span><textarea name="gdescription" value="<?php echo $gdescription?>" id="gdescription"></textarea>
            <label for="gpast_due">过期时间：</label><input type="month" name="gpast_due" value="<?php echo $gpast_due?>" id="gpast_due">
        </fieldset>
        <input type="submit" value="添加">
    </form>
</div>

<?php 
}
?>
</body>
</html>