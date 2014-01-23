<?php 
function getIP()
{
global $ip;
if (getenv("HTTP_CLIENT_IP"))
$ip = getenv("HTTP_CLIENT_IP");
else if(getenv("HTTP_X_FORWARDED_FOR"))
$ip = getenv("HTTP_X_FORWARDED_FOR");
else if(getenv("REMOTE_ADDR"))
$ip = getenv("REMOTE_ADDR");
else $ip = "Unknow";
return $ip;
}
echo "HTTP_CLIENT_IP=".getenv("HTTP_CLIENT_IP")."<br/>HTTP_X_FORWARDED_FOR=".getenv("HTTP_X_FORWARDED_FOR")."<br/>REMOTE_ADDR=".getenv("REMOTE_ADDR")."<br/>";
// 使用方法：
echo getIP();
echo '<br>'.gethostbyname($_SERVER["SERVER_NAME"]);
?>
