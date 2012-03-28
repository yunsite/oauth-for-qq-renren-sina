<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"> 
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Auth_Demo界面</title>
<meta http-equiv="content-type" content="text/html; charset=utf-8"/>
<link rel="stylesheet" type="text/css" href="./css/style.css">
<script type="text/javascript" src="./js/renren.js"></script>
<?php
session_start();

include_once('./opensina/config.php');
include_once('./opensina/saetv2.ex.class.php');

$o = new SaeTOAuthV2( WB_AKEY , WB_SKEY );
$code_url = $o->getAuthorizeURL( WB_CALLBACK_URL );
?>

<script type="text/javascript">
    var childWindow;
    function qqLogin(){
        //childWindow = window.open("openqq/oauth/getAuthorizationCode.php","TencentLogin","width=450,height=320,menubar=0,scrollbars=1, resizable=1,status=1,titlebar=0,toolbar=0,location=1");
        parent.location.href="openqq/oauth/getAuthorizationCode.php" ;
    }
    function renrenLogin(){
        //childWindow = window.open("openrenren/oauth/getAuthorizationCode.php","SinaLogin","width=600,height=350,menubar=0,scrollbars=1, resizable=1,status=1,titlebar=0,toolbar=0,location=1");
        parent.location.href="openrenren/oauth/getAuthorizationCode.php" ;
    }
    function sinaLogin(){
        //childWindow = window.open("<?=$code_url?>","SinaLogin","width=600,height=350,menubar=0,scrollbars=1, resizable=1,status=1,titlebar=0,toolbar=0,location=1");
        parent.location.href="<?=$code_url?>" ;
    }
    /*
    function closeChildWindow(){
        childWindow.close();
    }
    */
</script>

</head>
<body>
<div id = "title" align="center">
OAuth登录验证演示版<br/><br/>
</div>
<div align="center">
    <br/>
    <div>
        <a href="#" onclick='qqLogin()'><img src="img/qq_login.png"/>QQ账号登录</a>
        <a href="#" onclick='renrenLogin()'><img src="img/renren_login.png"/>人人网账号登录</a>
        <a href="#" onclick='sinaLogin()'><img src="img/sina_login.png"/>新浪微博账号登录</a>
    </div>
    <!--div>
        <a href="#" onclick='qqLogin()'><img src="img/qq_login1.png"/></a>
        <a href="#" onclick='renrenLogin()'><img src="img/renren_login1.png"/></a>
        <a href="#" onclick='sinaLogin()'><img src="img/sina_login1.png"/></a>
    </div-->
    <br/><br/>
    <hr/>
</div>
</body>
</html>


