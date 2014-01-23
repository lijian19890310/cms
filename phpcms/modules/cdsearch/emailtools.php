<?php
/**company directory(通讯录)
*index.php :查选首页
*date:2013-6-24
*author:michael lee
*where:shenzhen nanshang zmodo CLT
*/

defined('IN_PHPCMS') or exit('No permission resources.');
pc_base::load_sys_class('form','',0);
pc_base::load_sys_class('format','',0);
class emailtools{
	private $db;
	private static $econfig=array(
					"Host"=>"smtp.163.com",
					"SMTPAuth"=>true,
					"Username"=>"zmodoemail@163.com",
					"Password"=>"zmodo123",
					"Port"=>25,
					"CharSet"=>"utf8",
					"From"=>"zmodoemail@163.com",
					"FromName"=>"zmodo"
					);
	private static $emailType=array("zmodo.cn","eptco.com","zmodo.com");
	public function __construct(){
		$this->_userid = param::get_cookie('_userid');
		$ip;
		if (getenv("HTTP_CLIENT_IP"))
		$ip = getenv("HTTP_CLIENT_IP");
		else if(getenv("HTTP_X_FORWARDED_FOR"))
		$ip = getenv("HTTP_X_FORWARDED_FOR");
		else if(getenv("REMOTE_ADDR"))
		$ip = getenv("REMOTE_ADDR");
		else $ip = "Unknow";
		$ip_item=explode('.',$ip);
		$iparea=$ip_item[0].'.'.$ip_item[1];
		if(empty($this->_userid)) {
		    if($iparea!="172.18"&&$iparea!="172.16"&&$iparea!="192.168")
		    {
		    	$forward = urlencode(get_url());
		    	showmessage(L('login_website'),APP_PATH.'index.php?m=member&c=index&a=login&forward='.$forward);
		    }
		}
		$this->db=pc_base::load_model('content_model');
	}
	public function init(){
		$name=urldecode($_GET['name']);
		$email=urldecode($_GET['email']);
		$autoUrl=APP_PATH."index.php?m=cdsearch&c=emailtools&a=auto";
		$name=$name?$name:"输入中英文名";
		$email=$email?$email:"输入邮箱地址";
		$SEO['title'] ='用户名邮箱导入！';
		include template('content','header');
		include template('cdsearch','email');
		include template('content','footer');
	}
	public function import(){
		if($_GET['submit']==true){
			$email=(new_addslashes($_GET['email']));
			$name=(new_addslashes($_GET['name']));
			if($email&&$name){
				if($this->checkemail($email)){//验证邮箱
					if($this->checkname($name)){//验证用户名
						if($this->checkemailactivit($email)){
							$type=$this->getNameType($name);
							if($this->checkActivit($name,$email,$type)){
								$estatus=$this->sendemail($name,$email);//发送邮件
								$status=true;
								$this->insertdb($name,$email);
								if($estatus){//邮件发送成功
									$success="邮件发送成功";
								}else{//邮件发送失败
									$error="邮件发送失败！";
								}
							}else{
								$status=false;
								$error="对不起，你已经导入了邮箱!";
							}
						}else{
								$status=false;
								$error="对不起，你的邮箱已经使用，请勿重复!";							
						}
					}else{
						$status=false;
						$error="对不起，用户名不对!";
					}
				}else{
					$status=false;
					$error="对不起，邮箱格式不正确!";
				}
			$gobackUrl=APP_PATH."index.php?m=cdsearch&c=emailtools";
			$SEO['title'] ='用户名邮箱导入！';
			include template('content','header');
			include template('cdsearch','import');
			include template('content','footer');
			}else{
				header("location:".APP_PATH."index.php?m=cdsearch&c=emailtools");			
			}
		}else{
			header("location:".APP_PATH."index.php?m=cdsearch&c=emailtools");		
		}
	}
	private function checkemailactivit($email){
		$sql="select count(*) as num from cd_email  where activit='1' and email='$email'";
		$result=$this->db->query($sql);
		while( $row = mysql_fetch_array($result))
		{
			$num=$row['num'];
		}
		if($num){
			return false;
		}else{
			return true;
		}
	}
	private function insertdb($name,$email){
		if($name&&$email){
			$type=$this->getNameType($name);
			$sql="select count(*) as num from cd_email  where $type='$name' and email='$email'";
			$result=$this->db->query($sql);
			while( $row = mysql_fetch_array($result))
			{
				$num=$row['num'];
			}
			if($num){
				return true;
			}else{
				$sql="DELETE FROM `cd_email`   where $type='$name' and activit='0'";
				$this->db->query($sql);
				require_once(dirname(__FILE__).'/classes/mssql.php');
				mssql_select_db(mssql::$config['db'],mssql::conn()) or die("can not connect mssql!");
				$sql="select  top 1 EEmpName,EmpName FROM V_HREmployee where $type = '$name';";
				$sql = iconv("utf-8","gb2312//IGNORE",$sql);
				$result=mssql_query($sql) or die("sql error");		
				while( $row = mssql_fetch_array ( $result)){
					$data['EEmpName']=iconv("gbk", "UTF-8//IGNORE", $row['EEmpName']);
					$data['EmpName']=iconv("gbk", "UTF-8//IGNORE", $row['EmpName']);
				}
				$sql="INSERT INTO `cd_email` (`EEmpName`, `EmpName`, `email`, `activit`) VALUES ('{$data['EEmpName']}', '{$data['EmpName']}', '{$email}', '0');";
				$result=$this->db->query($sql);
				if($result){
					return true;
				}else{
					return false;
				}
			}
		}else{
			return false;
		}
	}
	private function checkemail($email){
		$pattern_test = "/([a-z0-9]*[-_.]?[a-z0-9]+)*@([a-z0-9]*[-_]?[a-z0-9]+)+[.][a-z]{2,3}([.][a-z]{2})?/i";
		$status=preg_match($pattern_test,$email);
		if($status){
			/*$t=explode("@",$email);
			$emailType=$t[1];
			print_r($this->emailType);
			echo$emailType;
			if(in_array($emailType,$this->emailType)){
				echo"asd";
				return true;
			}else{
				echo"asd1";
				return false;
			}*/
			return true;
		}else{
			return false;
		}
	}
	private function checkname($name){
		$type=$this->getNameType($name);
		require_once(dirname(__FILE__).'/classes/mssql.php');
		mssql_select_db(mssql::$config['db'],mssql::conn()) or die("can not connect mssql!");
		$sql="select  top 1 $type FROM V_HREmployee where $type='$name';";
		$sql = iconv("utf-8","gb2312//IGNORE",$sql);		
		$result=mssql_query($sql) or die("sql error");
		while( $row = mssql_fetch_array ( $result)){
			$status=$row[$type];
		}
		if($status){
			return true;
		}else{
			return false;
		}
	}
	private function checkstr($str=''){  
		if(trim($str)==''){  
			return '';  
		}  
		$m=mb_strlen($str,'utf-8');  
		$s=strlen($str);  
		if($s==$m){  
			return 1;  
		}  
		if($s%$m==0&&$s%3==0){  
			return 2;  
		}  
		return 3;  
	}
	private function sendemail($username,$email){
		require_once(dirname(__FILE__).'/classes/phpmailer/class.phpmailer.php');
		$code=$this->encrypt($username.'#'.$email);
		$mail = new PHPMailer(); 
		$mail->IsSMTP();
		$mail->Host = self::$econfig["Host"];				// SMTP 服务器  
		$mail->SMTPAuth = self::$econfig["SMTPAuth"];            	// 打开SMTP 认证  
		$mail->Username = self::$econfig["Username"]; 			// 用户名
		$mail->Password = self::$econfig["Password"];          		// 密码
		$mail->Port=self::$econfig["Port"];				//端口
		$mail->From = self::$econfig["From"]; 				//邮件发送者email地址
		$mail->CharSet = self::$econfig["CharSet"];			// 字符设置
		$mail->FromName = self::$econfig["FromName"];
		$mail->IsHTML(true);
		$mail->AddAddress($email , 'asdasdassd');
		$mail->Subject = "ZMODO邮件导入提醒！"; //邮件标题
		$mail->Body = 'hello:'.$username.', <a href="'.APP_PATH.'index.php?m=cdsearch&c=emailtools&a=authemail&code='.$code.'"> 请点击此链接进行验证</a>'; //邮件内容
		if($mail->Send()){
			return true;
		}
	}
	private function encrypt($string){
		return 	urlencode(base64_encode(($string)));
	}
	private function decrypt($string){
		return (base64_decode(urldecode($string)));
	}
	public function authemail(){
		$code=$_GET['code'];
		$code=$this->decrypt($code);
		$data=explode('#',$code);
		if(count($data)==2){
			$username=$data[0];
			$email=$data[1];
			$type=$this->getNameType($username);
			$result=$this->db->query("select count(*) as num from cd_email  where $type='$username' and email='$email'");
			while( $row = mysql_fetch_array($result))
			{
				$num=$row['num'];
			}
			if($num){
				$result=$this->db->query("select activit,EEmpName,EmpName,email from cd_email where $type='$username' and email='$email' limit 1");
				while( $row = mysql_fetch_array($result))
				{
					$activit=$row['activit'];
					$EEmpName=$row['EEmpName'];
					$EmpName=$row['EmpName'];
					$email=$row['email'];
				}
				if($activit){
					$status=0;
					$error="对不起，您的邮箱已经认证导入！";
				}else{
					$sql="UPDATE `cd_email` SET `activit` = '1' WHERE `EEmpName` = 
					'$EEmpName' AND `EmpName` = '$EmpName' AND `email` = '$email' AND `activit` =0 LIMIT 1 ;";
					$result=$this->db->query($sql);
					if($result){
						$status=1;
						$success="你好，".$username."，你的邮箱（".$email."）验证成功";
					}else{
						$status=0;
						$error="你好，".$username."，你的邮箱（".$email."）验证失败，请重试！";
					}
				}
			}else{
				$status=0;
				$error="对不起，用户名邮箱不对！";
			}
		}else{
			$status=0;
			$error="对不起，用户名邮箱不对！";		
		}
		include template('content','header');
		include template('cdsearch','authemail');
		include template('content','footer');
		
	}
	public function auto(){
		$name=new_addslashes($_GET['name']);
		if(!$this->isutf8($name)){
			$name=iconv("gbk", "UTF-8//IGNORE", $name);
		}
		$type=$this->getNameType($name);
		require_once(dirname(__FILE__).'/classes/mssql.php');
		mssql_select_db(mssql::$config['db'],mssql::conn()) or die("can not connect mssql!");
		$sql="select distinct top 10 $type FROM V_HREmployee where $type like '%$name%';";
		//echo$sql;
		$sql = iconv("utf-8","gb2312//IGNORE",$sql);
		$result=mssql_query($sql) or die("sql error");		
		while( $row = mssql_fetch_array ( $result)){
			$data[]=iconv("gbk", "UTF-8//IGNORE", $row[$type]);
		}
		echo json_encode($data);
		exit;
	}
	private function getNameType($name){
		if($name==null) exit;
		$cname=str_replace(" ", "",$name); ;//去掉空格
		if($this->checkstr($cname)==1){//全英文
			$type="EEmpName";
		}elseif($this->checkstr($cname)==2){//全中文
			$type="EmpName";
		}else{
			$type="EEmpName";
		}
		return $type;
	}
	private function checkActivit($name,$email,$type){
		$result=$this->db->query("select count(*) as num from cd_email  where $type='$name' and email='$email' and activit='1'");
		while( $row = mysql_fetch_array ( $result)){
			$num=iconv("gbk", "UTF-8//IGNORE", $row['num']);
		}
		if($num){
			return false;
		}else{
			return true;
		}
	}
	private function isutf8($word)
	{
		if (preg_match("/^([".chr(228)."-".chr(233)."]{1}[".chr(128)."-".chr(191)."]{1}[".chr(128)."-".chr(191)."]{1}){1}/",$word) == true || preg_match("/([".chr(228)."-".chr(233)."]{1}[".chr(128)."-".chr(191)."]{1}[".chr(128)."-".chr(191)."]{1}){1}$/",$word) == true || preg_match("/([".chr(228)."-".chr(233)."]{1}[".chr(128)."-".chr(191)."]{1}[".chr(128)."-".chr(191)."]{1}){2,}/",$word) == true)
		{
			return true;
		}
		else
		{
			return false;
		}
	} 
}
