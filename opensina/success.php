<script type="text/javascript" >
var hash = "" ;
hash = document.location.hash.substring(1);  //解析hash得到access_token值。
var url = xxxxxx+"/opensina/success.php?" ;
url += hash ;
if(hash != ""){
    top.location.href = url ;
}
</script>
<?php
header("Content-Type: text/html; charset=utf-8");

require_once("./api/usersShow.php") ;
require_once("./common/https_get_contents.php") ;

$accessToken = $_GET["access_token"] ;

//$code = $_GET['code'];
//$accessToken = getAccessToken($code) ;
//echo $accessToken."<br/>";
/*
$accessToken = $result["access_token"] ;
$expiresIn = $result["expires_in"] ;
$refreshToken = $result["refresh_token"] ;

echo "access token:".$accessToken."<br/>";
 */

echo $accessToken ;
//$ret = usersShow($accessToken) ; 
//print_r($ret) ;
//$ret = json_decode($ret) ;
/*
echo $ret->id."<br/>" ;
echo $ret->name."<br/>" ;
echo $ret->gender."<br/>" ;
echo "<img src='{$ret->profile_image_url}'></img><br/>";
 */
?>

