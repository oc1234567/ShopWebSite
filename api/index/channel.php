<?php
define('CASE_NAME', '161226180847');
function startsWith($string, $pattern) { 
      return $pattern === "" || strrpos($string, $pattern, -strlen($string)) !== FALSE;
}
$json = array();
$data = array();
$channel = array();
if (!startsWith(CASE_NAME, 'http://')) { 
     $ip = "http://192.168.2.13/app/";
    $root = $ip . CASE_NAME ."/game_code_".CASE_NAME. ".zip"; 
    $update = $ip . CASE_NAME; 
    // $json["code_url"] = $root; 
    // $json["update_url"] = $update;
    $channel[0] = ["id"=>1, "url"=>"http://www.baidu.com", "icon_url"=>""];
    $data["errno"] = 0;
    $data["code_url"] = $root;
    $data["update_url"] = $update;
    $data["channel"] = $channel;
    $json["data"] = $data;
    $json["statusCode"] = 200;
} 
echo(json_encode($json));