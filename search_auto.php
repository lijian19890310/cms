<?php
error_reporting(0);
require(dirname(__FILE__).DIRECTORY_SEPARATOR.'phpcms'.DIRECTORY_SEPARATOR.'libs'.DIRECTORY_SEPARATOR.'functions'.DIRECTORY_SEPARATOR.'global.func.php');
$ip_item=explode('.',ip());
$iparea=$ip_item[0].'.'.$ip_item[1];
if($iparea!='172.18'&&$iparea!='172.16'&&$iparea!='192.168'&&$iparea!='127.0')
{
	//exit('sorry,you are not the innternet!');
}
function fliter_html($value) {
 if (function_exists('htmlspecialchars')) return htmlspecialchars($value);
 return str_replace(array("&", '"', "'", "<", ">"), array("&", "\"", "'", "<", ">"), $value);
}

function fliter_sql($value) {
 $sql = array("select", 'insert', "update", "delete", "\'", "\/\*", 
     "\.\.\/", "\.\/", "union", "into", "load_file", "outfile");
 $sql_re = array("","","","","","","","","","","","");
 return str_replace($sql, $sql_re, $value);
}

$keywords=remove_xss(fliter_sql(fliter_html(trim($_POST['value']))));
$array_keywords=array_unique(explode(' ',$keywords));
$like_sql;
foreach($array_keywords	as	$ks=>$k){
	if($ks>=4){
		break;
	}
	if($k!=null){
		$like_sql[]="  like '%$k%'";
	}
}
$like_sql_all=implode(' and EEmpName ',$like_sql);
$ms_host = "192.168.0.251:1433"; //这里是ODBC的连接名称
$ms_user = "itviewer"; //用户名
$ms_pass = "it@Zmodo2o13"; //密码
$ms_connect =mssql_connect($ms_host,$ms_user,$ms_pass) or die("Couldn't connect to SQL Server on MSSQL");

if($keywords==null){
	exit('0');
}else{
	if(!$ms_connect)
	{
		exit('0');
	}
	mssql_select_db('HR',$ms_connect) or die('can not select db!');
	$sql="select distinct top 10 EEmpName FROM HR_Employee WHERE  EEmpName $like_sql_all and LeaveDate IS NULL ";
	if(preg_match("/^[\x7f-\xff]+$/", $keywords)){//如果关键字为中文
		$sql="select distinct top 10 EmpName FROM HR_Employee WHERE EmpName like '%$keywords%' and LeaveDate IS NULL";
	}
	$sql=iconv("utf-8","gb2312//IGNORE",$sql);
	$result=mssql_query($sql);
	$data=null;
	while( $row = mssql_fetch_array( $result))
	{
			
	   $data[]['EEmpName']=$row['EEmpName']?$row['EEmpName']:iconv("gbk", "UTF-8//IGNORE", $row['EmpName']);
	} 
	if(count($data)==0)exit('0');
	echo '<ul>';
	foreach( $data	as	$_data)
	{
			
		echo '<li><a href="index.php?m=cdsearch&c=index&a=result&k='.$_data['EEmpName'].'">'.$_data['EEmpName'].'</a></li>';
	} 
	echo '<li class="cls"><a href="javascript:;" onclick="$(this).parent().parent().parent().fadeOut(100)">关闭</a& gt;</li>';
	echo '</ul>';

	mssql_close();
}
