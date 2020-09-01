<?php
define('CASE_NAME', '161226180847');
function startsWith($string, $pattern) { 
      return $pattern === "" || strrpos($string, $pattern, -strlen($string)) !== FALSE;
}
$json = array();
$data = array();
$categoryList = array();
if (!startsWith(CASE_NAME, 'http://')) { 
     $ip = "http://192.168.2.13/app/";
    $root = $ip . CASE_NAME ."/game_code_".CASE_NAME. ".zip"; 
    $update = $ip . CASE_NAME; 
    // $json["code_url"] = $root; 
    // $json["update_url"] = $update;
    $categoryList[0] = ["id"=>1, "goodsList"=>[["id"=>1, "list_pic_url"=>""], "name"=>"孕婴"]];
    $data["errno"] = 0;
    $data["code_url"] = $root;
    $data["update_url"] = $update;
    $data["categoryList"] = $categoryList;
    $json["data"] = $data;
    $json["statusCode"] = 200;
} 
echo(json_encode($json));