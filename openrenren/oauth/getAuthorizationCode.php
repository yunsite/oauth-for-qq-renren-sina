<?php

require_once("../common/config.inc.php") ;

/**
 * @brief 获取Authorization Code
 * @param $appid  申请QQ登录成功后，分配给网站的appid
 * @param $redirect_uri  成功授权后的回调地址
 * @return none 跳转到授权页面
  */
function getAuthorizationCode($appkey , $redirect_uri){
    $url = "https://graph.renren.com/oauth/authorize" ;

    //传入参数
    $params = array() ;
    $params["response_type"] = "code" ;
    $params["client_id"] = $appkey ;
    $params["redirect_uri"] = $redirect_uri ;
    $params["scope"] = "publish_feed publish_share send_invitation operate_like" ;
    $params["display"] = "page" ;
    
    $url .= "?".http_build_query($params) ;
    header("Location:$url") ;
}

getAuthorizationCode($_SESSION["renren_appkey"], $_SESSION["renren_callback"]) ;

?>
