<?php
define('CASE_NAME', '161226180847');
function startsWith($string, $pattern) { 
      return $pattern === "" || strrpos($string, $pattern, -strlen($string)) !== FALSE;
}
$json = array();
$data = array();
$hotGoodsList = array();
if (!startsWith(CASE_NAME, 'http://')) { 
     $ip = "http://192.168.2.13/app/";
    $root = $ip . CASE_NAME ."/game_code_".CASE_NAME. ".zip"; 
    $update = $ip . CASE_NAME; 
    // $json["code_url"] = $root; 
    // $json["update_url"] = $update;
    
    $hotGoodsList[0] = ["id"=>1, "list_pic_url"=>"", "name"=>"商品1", "retail_price"=>"100.0", "goods_brief"=>"商品标签"];
    $data["errno"] = 0;
    $data["code_url"] = $root;
    $data["update_url"] = $update;
    $data["hotGoodsList"] = $hotGoodsList;
    $json["data"] = $data;
    $json["statusCode"] = 200;
} 
echo(json_encode($json));