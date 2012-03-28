<?php

/**
 * @brief 获取Access Token
 * @param $code  上一步返回的authorization code
 * @return 返回字符串格式为：
 */

/*
function getAccessToken($code){
    $url = "https://api.weibo.com/oauth2/access_token" ;

    //传入参数
    $params = array() ;
    $params["client_id"] = $_SESSION["appkey"] ;
    $params["client_secret"] = $_SESSION["appsecret"] ;
    $params["grant_type"] = "authorization_code" ;
    $params["redirect_uri"] = $_SESSION["callback"] ;
    $params["code"] = $code ;

    $url .= "?".http_build_query($params) ;

    echo $url."<br/>";
    
    return http_post_contents($url) ;
}
 */

require_once("../common/config.inc.php") ;

/**
 * @brief 获取Access Token
 * @param $appid  分配给网站的appid
 * @param $redirect_uri  成功授权后的回调地址
 * @return none 跳转到授权页面
  */
function getAccessToken($appkey , $redirect_uri){
    $url = "https://api.weibo.com/oauth2/authorize" ;

    //传入参数
    $params = array() ;
    $params["client_id"] = $appkey ;
    $params["response_type"] = "token" ;
    $params["redirect_uri"] = $redirect_uri ;

    $url .= "?".http_build_query($params) ;
    header("Location:$url") ;
}

getAccessToken($_SESSION["appkey"], $_SESSION["callback"]) ;
?>
