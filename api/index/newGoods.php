<?php
define('CASE_NAME', '161226180847');
function startsWith($string, $pattern) { 
      return $pattern === "" || strrpos($string, $pattern, -strlen($string)) !== FALSE;
}

$data = array();
$newGoodsList = array();
if (!startsWith(CASE_NAME, 'http://')) { 
     $ip = "http://192.168.2.13/app/";
    $root = $ip . CASE_NAME ."/game_code_".CASE_NAME. ".zip"; 
    $update = $ip . CASE_NAME; 
    // $json["code_url"] = $root; 
    // $json["update_url"] = $update;
    $newGoodsList[0] = ["id"=>1, "list_pic_url"=>"", "name"=>"商品1", "retail_price"=>"100.0"];
    $data["errno"] = 0;
    $data["code_url"] = $root;
    $data["update_url"] = $update;
    $data["data"] = ["newGoodsList"=>$newGoodsList];
    
} 
echo(json_encode($data));