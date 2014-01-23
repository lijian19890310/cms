<?php
/**
 *  index.php PHPCMS 入口
 *
 * @copyright			(C) 2005-2010 PHPCMS
 * @license				http://www.phpcms.cn/license/
 * @lastmodify			2010-6-1
 */
 //PHPCMS根目录
/*echo $_SERVER['HTTP_HOST'];
exit;*/
$websit=$_SERVER['PHP_SELF'];
if($websit=='/index.php')
{
	header('Location: '."http://zone.zmodo.com/cms/index.php");
	exit;
}
if($_SERVER['HTTP_HOST']=='183.62.140.162'){
	header('HTTP/1.1 401 Not Found'); 
	exit;	
}
if($_SERVER['HTTP_HOST']!='zone.zmodo.com'){
	header('Location: '."http://zone.zmodo.com/cms/index.php");
	exit;	
}

define('PHPCMS_PATH', dirname(__FILE__).DIRECTORY_SEPARATOR);

include PHPCMS_PATH.'/phpcms/base.php';

pc_base::creat_app();

?>
