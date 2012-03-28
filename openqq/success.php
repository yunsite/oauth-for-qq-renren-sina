<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"> 
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8"/>
</head>
<body>
<?php
header("Content-Type: text/html; charset=utf-8");
require_once("./common/config.inc.php") ;
require_once("./common/https_get_contents.php") ;
require_once("./oauth/getAccessToken.php") ;
require_once("./oauth/getOpenId.php") ;
require_once("./api/getUserInfo.php") ;

if(isset($_GET['code'])){
    $code = $_GET['code'] ;
    $accessToken = getAccessToken($code) ;
    $result = array() ;
    parse_str($accessToken , $result) ;
    $accessToken = $result["access_token"] ;
    $expiresIn = $result["expires_in"] ;

    $temp = getOpenId($accessToken) ;
    $temp = str_replace("callback(","",$temp) ;
    $temp = str_replace(");","",$temp) ;
    $rst = json_decode($temp) ;
    $openId =  $rst->openid ;
    $appId = $rst->client_id ;

    $url = "success.php?access_token={$accessToken}&appid={$appId}&openid={$openId}" ;
    header("Location:$url") ;
}

if(isset($_GET["access_token"]) && isset($_GET["appid"]) && isset($_GET["openid"])){
    $accessToken = $_GET["access_token"] ;
    $appid = $_GET["appid"] ;
    $openid = $_GET["openid"] ;

    $ret = getUserInfo($accessToken , $appid , $openid) ;
    $ret = json_decode($ret) ;
    
    echo "openid:".$openId."<br/>";
    echo $ret->nickname."<br/>";
    echo $ret->gender."<br/><br/>";
    echo "30*30  <img src='{$ret->figureurl}'></img><br/><br/>";
    echo "50*50  <img src='{$ret->figureurl_1}'></img><br/><br/>";
    echo "100*100  <img src='{$ret->figureurl_2}'></img><br/>";
}
?>
</body>
</html>
