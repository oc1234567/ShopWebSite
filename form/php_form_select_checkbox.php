<?php
$q = isset($_POST['q']) ? $_POST['q'] : '';

if (is_array($q)) {
    $sites = array('RUNOOB' => '菜鸟教程：http://www.runoob.com',
                   'GOOGLE' => 'Google 搜索：http://www.google.com',
                   'TAOBAO' => '淘宝：http://www.taobao.com');
    foreach($q as $val) {
        echo $sites[$val] . '<br>';
    }
} else {
?>
<form action="" method="POST">
    <input type="checkbox" value="RUNOOB" name="q[]">Runoob
    <input type="checkbox" value="GOOGLE" name="q[]">Google
    <input type="checkbox" value="TAOBAO" name="q[]">Taobao
    <input type="submit" value="提交">
</form>
<?php
}
?>