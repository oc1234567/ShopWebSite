<?php
define('CASE_NAME', '161226180847');
function startsWith($string, $pattern) { 
      return $pattern === "" || strrpos($string, $pattern, -strlen($string)) !== FALSE;
}
$json = array();
$data = array();
$topicList = array();
if (!startsWith(CASE_NAME, 'http://')) { 
     $ip = "http://192.168.2.13/app/";
    $root = $ip . CASE_NAME ."/game_code_".CASE_NAME. ".zip"; 
    $update = $ip . CASE_NAME; 
    // $json["code_url"] = $root; 
    // $json["update_url"] = $update;
    $topicList[0] = ["id"=>1, "scene_pic_url"=>"", "title"=>"专题精选商品", "price_info"=>"999.0", "subtitle"=>"专题精选商品子标题"];
    $data["errno"] = 0;
    $data["code_url"] = $root;
    $data["update_url"] = $update;
    $data["topicList"] = $topicList;
    $json["data"] = $data;
    $json["statusCode"] = 200;
} 
echo(json_encode($json));