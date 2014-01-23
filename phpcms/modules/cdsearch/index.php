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
class index{
	private static	$config=array(	
								'host'=>'172.18.19.253:1433',
								'user'=>'itadmins',	
								'pwd'=>'it@Zmodo2o13',
								'db'=>'HR',
								'table'=>'V_HREmployee'
							);
	private static	$searchType=array(
								1=>'EEmpName',
								2=>'EmpName'
							);
	private $db;
	private static $conn=null;
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
	public function getcompany(){
		$sql="select distinct groupname FROM V_PartSet ";
		$sql = iconv("utf-8","gb2312//IGNORE",$sql);
		mssql_select_db(self::$config['db'],self::conn());
		$result=mssql_query($sql);
		while( $row = mssql_fetch_array ( $result))
		{
			$groupname[$k]['cname']=$this->iconvs($row['groupname']);
			$groupname[$k]['url']=APP_PATH.
						'index.php?m=cdsearch&c=index&a=result&company='.
						urlencode($groupname[$k]['cname']);
			$k++;
		}
		echo json_encode($groupname);
	}
	private function part(){
		$sql="select distinct groupname FROM V_PartSet ";
		$sql = iconv("utf-8","gb2312//IGNORE",$sql);
		mssql_select_db(self::$config['db'],self::conn());		
		$result=mssql_query($sql);
		$k=0;
		while( $row = mssql_fetch_array ( $result))
		{
			$groupname[$k]['cname']=$this->iconvs($row['groupname']);
			$groupname[$k]['url']=APP_PATH.
						'index.php?m=cdsearch&c=index&a=result&company='.
						urlencode($groupname[$k]['cname']);
			$sql="select distinct PartName FROM V_PartSet WHERE groupname='{$row['groupname']}'";
			$resultc=mssql_query($sql);
			$ks=0;
			while( $rowc = mssql_fetch_array ( $resultc))
			{
				$groupname[$k]['partname'][$ks]['name']=$this->iconvs($rowc['PartName']);
									
				$groupname[$k]['partname'][$ks]['url']=APP_PATH.
						'index.php?m=cdsearch&c=index&a=result&company='.
						urlencode($groupname[$k]['cname']).'&branch='.
						urlencode($groupname[$k]['partname'][$ks]['name']);
				$ks++;
			}
			$k++;
		}
		return $groupname;
	}
	public function init(){
		$SEO['title'] ='通讯录搜索！';
		$groupname=$this->part();
		include template('content','header');
		include template('cdsearch','index');
		include template('content','footer');

	}
	public function result(){
		$groupname=$this->part();
		$company=new_addslashes((trim(urldecode($_GET['company']))));//公司
		$branch=new_addslashes((trim(urldecode($_GET['branch']))));//部门
		$dutyname=new_addslashes((trim(urldecode($_GET['dutyname']))));//职位
		$keywords=new_addslashes((trim($_GET['k'])));
		if($keywords==null&&$company==null&&$branch==null){
			header("location:".APP_PATH."index.php?m=cdsearch&c=index");
			exit;
		}
		if(preg_match("/^[\x7f-\xff]+$/", $keywords)){//如果关键字为中文
			$searchType=2;		
		}else{
			$searchType=1;		
		}
		$column=self::$searchType[$searchType];
		$where[]=$company?" ancestorname='$company' ":null;
		$where[]=$branch?" partname='$branch' ":null;
		$where[]=$dutyname?" dutyname='$dutyname' ":null;
		$where[]=$keywords?" $column like '%$keywords%' ":null;
		$whereSql=implode(" and ",array_filter($where));
		$sql="select  EmpNo,EmpName,partname,SelfTel,EEmpName,ancestorname,dutyname from V_HREmployee where LeaveDate IS NULL AND ".$whereSql;
		//echo$sql;		
		$sql = iconv("utf-8","gb2312//IGNORE",$sql);
		mssql_select_db(self::$config['db'],self::conn());		
		$result=mssql_query($sql);
		while( $row = mssql_fetch_array ( $result))
		{	
			$row['JQlevel']=$this->iconvs($row['JQlevel']);
			$row['HomeAddr']=$this->iconvs($row['HomeAddr']);
		
			$row['EmpName']=$this->iconvs($row['EmpName']);
			if($row['EmpName']&&$row['EEmpName']){
				$row['name']=$row['EEmpName'].'/'.$row['EmpName'];		
			}elseif($row['EmpName']==null&&$row['EEmpName']){
				$row['name']=$row['EEmpName'];
			}elseif($row['EEmpName']==null&&$row['EmpName']){
				$row['name']=$row['EmpName'];			
			}else{
				$row['name']=null;			
			}
			$row['ancestorname']=$this->iconvs($row['ancestorname']);
			$row['partname']=$this->iconvs($row['partname']);
			$row['dutyname']=$this->iconvs($row['dutyname']);
			$row['email']=$this->getEmail($row['EmpName'],$row['EEmpName']);
			$search_data[]=$row;
		}
		mssql_close();
		$SEO['title']='通讯录搜索结果关于'.$keywords;
		include template('content','header');
		include template('cdsearch','result');
		include template('content','footer');
	}
	private function getEmail($name,$Ename){
		if($name){
			$sql="select email from cd_email where EmpName='$name' and activit=1 limit 1;";
			$result=$this->db->query($sql);
			while( $row = mysql_fetch_array ( $result))
			{
				$email=$row['email'];
			}
			return $email;
		}
		if($Ename){
			$sql="select email from cd_email where EEmpName='$Ename' and activit=1 limit 1;";
			$result=$this->db->query($sql);
			while( $row = mysql_fetch_array ( $result))
			{
				$email=$row['email'];
			}
			return $email;
		}
	}
	public function search_auto(){
		$keywords=new_addslashes((trim($_GET['k'])));
		if($keywords==null)exit('0');
		if(preg_match("/^[\x7f-\xff]+$/", $keywords)){//如果关键字为中文
			$searchType=2;		
		}else{
			$searchType=1;		
		}
		$column=self::$searchType[$searchType];
		$sql="select distinct top 10 $column as res from V_HREmployee where $column like '%$keywords%' and LeaveDate IS NULL";
		$sql = iconv("utf-8","gb2312//IGNORE",$sql);
		mssql_select_db(self::$config['db'],self::conn());		
		$result=mssql_query($sql);
		while( $row = mssql_fetch_array ( $result))
		{
			foreach($row	as	$k=>$v){
				$tmp[$k]=@iconv("gb2312", "UTF-8//IGNORE", $v);
			}
			$data[]=$tmp;
			unset($tmp);
		}
		if(count($data)==0)exit('0');
		echo '<ul>';
		foreach( $data	as	$_data)
		{	
			echo '<li><a href="index.php?m=cdsearch&c=index&a=result&k='.urlencode($_data['res']).'">'.$_data['res'].'</a></li>';
		} 
		echo '<li class="cls"><a href="javascript:;" onclick="$(this).parent().parent().parent().fadeOut(100)">关闭</a& gt;</li>';
		echo '</ul>';	
	}
	private function iconvs($text){
		return iconv("gbk", "UTF-8//IGNORE", $text);
	}
	private static function	conn(){
		if(!empty(self::$conn)){
			return self::$conn;
		}else{
			self::$conn=self::connect();
			return self::$conn;
		}
	}
	private  function connect(){
		$conn=mssql_connect(self::$config['host'],self::$config['user'],self::$config['pwd'] ) or die("Couldn't connect to SQL Server on MSSQL");
		return $conn;
	}
	public function birthday(){
		$the_year=date('Y');
		$the_mouth=date('m');
		$mdate=$the_year%4?28:29;
		$days=array('01'=>31,'02'=>$mdate,'03'=>'31','04'=>'30','05'=>'31','06'=>'30','07'=>'31','08'=>31,'09'=>'30','10'=>31,'11'=>30,'12'=>'31');
		$begun_time=$the_year.'-'.$the_mouth.'-'.'01';
		$end_time=$the_year.'-'.$the_mouth.'-'.$days[$the_mouth];
		$cacheKey="birthday_".$the_mouth;
		$data=getcache($cacheKey);
		if(empty($data)){
			$sql="
			Select  EmpNo,EEmpName,EmpName,convert(char,Birthday,120) as tBirthday From ".self::$config['table']." where
			(dateadd(year,datediff(year,Birthday,'".$begun_time."'),Birthday) between '".$begun_time."' and '".$end_time."'
			or
			dateadd(year,datediff(year,Birthday,'".$begun_time."'),Birthday) between '".$begun_time."' and '".$end_time."') 
			and LeaveDate IS NULL
			ORDER BY Birthday ";
			mssql_select_db(self::$config['db'],self::conn());
			$result=mssql_query($sql);;
			$k=0;
			while( $row = mssql_fetch_array ( $result))
			{
				$data[$k]['EmpNo']=$row['EmpNo'];
				$Birthday=substr($row['tBirthday'],5,5);
				$data[$k]['Birthday']=$Birthday;
				$data[$k]['EmpName']=$this->iconvs($row[EmpName]);
				$data[$k]['EEmpName']=$row['EEmpName'];
				$data[$k]['day']=intval(substr($Birthday,3,2));
				$k++;
			}
			setcache($cacheKey,$data);
		}
		echo'<ul>';
		mssql_close();
		foreach($this->maopao($data)	as	$k=>$v){
			$theImage=PHPCMS_PATH.'uploadfile/hr_photo/'.$v['EmpNo'].'.jpg';
			$yTheimage=APP_PATH.'uploadfile/hr_photo/'.$v['EmpNo'].'.jpg';
			if(file_exists($theImage)){
				$imgHtml="<img src='".$yTheimage."' width='78' height='80'>";			
			}else{
				$this->getImage($v['EmpNo']);
				if(file_exists($theImage)){
					$imgHtml="<img src='".$yTheimage."' width='78' height='80'>";	
				}else{
					$imgHtml=NULL;			
				}
			}

			echo"<li>
			<table  width='278' height='80' cellpadding='0' cellspacing='0'>
				  <tr>
				   	<td width='78' rowspan='2'>".$imgHtml."</td>
				    <td width='100' >&nbsp;&nbsp;<font color='red'>".$v['EmpName']."</font></td>
				    <td width='100' >&nbsp;&nbsp;".$v['EEmpName']."</td>
				  </tr>
					 <tr>
					      <td width='100'>&nbsp;&nbsp;".$v['Birthday']."</td>
					      <td width='100'>&nbsp;&nbsp;生日快乐</td>
					 </tr>
				</table><div style='height:1px;border-bottom: 1px dotted #DBDBDB;'</li>			
			";
		}
		echo"</ul>";
	}
	private function maopao($array) 
	{
		$count = count($array);
		if($count < 2) {
			return $array;
		}
		for($i = 0; $i < $count ; $i ++) {
			for($j = $count - 1 ; $j > $i ; $j --) {
				if($array[$j]['day'] < $array[$j - 1]['day']) {
					$temp = $array[$j];
					$array[$j] = $array[$j - 1];
					$array[$j - 1] = $temp;
				}
			}
		}
		return $array;
	}
	private function getImage($EmpNo){
		if(!empty($EmpNo)){			
			$theImage=PHPCMS_PATH.'uploadfile/hr_photo/'.$EmpNo.'.jpg';
			$yTheimage=APP_PATH.'uploadfile/hr_photo/'.$EmpNo.'.jpg';
			if(file_exists($theImage)){
				return $ytheImage;
			}else{
				$imageUrl=APP_PATH.'index.php?m=cdsearch&c=index&a=dbimage&EmpNo='.$EmpNo;
				$this->saveImage($imageUrl,$theImage);
			}
		}
	}
	/**
	*
	*获取数据库的图片数据函数
	*/
	public function dbimage(){
		$EmpNo=new_stripslashes($_GET['EmpNo']);
		if($EmpNo){
			$sql="select top 1 Photo1 from HR_Photo where EmpNo='".$EmpNo."'";
			mssql_select_db(self::$config['db'],self::conn());		
			$result=mssql_query($sql);
			if($result==null) return false;
			while( $row = mssql_fetch_array ( $result))
			{	
				$Photo=$row['Photo1'];
			}
			mssql_close();
			if($Photo){
				header("Content-type:image/");
				echo$Photo;
			}
		}
	}

	/**
	*保存图片函数
	*/
	private function saveImage($url,$filename=""){
		if($url==""){
			return false;
		}
		if($filename=="") {
			return false;
		}
		ob_start();
		readfile($url);
		$img = ob_get_contents();
		ob_end_clean();
		$size = strlen($img);
		if(!empty($img)){
			$fp2=@fopen($filename, "a");
			fwrite($fp2,$img);
			fclose($fp2);
			return $filename; 
		}
		
	}
}
