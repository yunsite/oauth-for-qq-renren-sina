<?php

include_once("session.php") ;

/**
 * 正式运营环境请关闭错误信息
 * ini_set("error_reporting", E_ALL);
 * ini_set("display_errors", TRUE);
 * QQDEBUG = true  开启错误提示
 * QQDEBUG = false 禁止错误提示
 * 默认禁止错误信息
 */
define("QQDEBUG", true);
if (defined("QQDEBUG") && QQDEBUG)
{
    @ini_set("error_reporting", E_ALL);
    @ini_set("display_errors", TRUE);
}

//申请到的appid
$_SESSION["qq_appid"]    = xxxxxx; 

//申请到的appkey
$_SESSION["qq_appkey"]   = xxxxxx;

//QQ登录成功后的跳转地址
$_SESSION["qq_callback"] = xxxxxx+"/openqq/success.php";

//print_r($_SESSION) ;
?>
