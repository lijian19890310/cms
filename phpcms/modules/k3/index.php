<?php
/*金蝶K3系统WEB查询功能
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
								'host'=>'192.168.0.10:1433',
								'user'=>'michael',	
								'pwd'=>'Michael',
								'db'=>'20130709102004'
							);

	private static $option=array(
								1=>'m.FName',
								2=>'m.FNumber',
								3=>'m.FModel'
							);
	private static $option1=array(
								1=>'m.FBOMNumber',
								2=>'f1.FNumber',
								3=>'FName'

							);
	private static $field=array(
								1=>'FName',
								2=>'FNumber',
								3=>'FModel'
							);
	private static $field1=array(
								1=>'FName',
								2=>'FNumber',
								3=>'FName'
							);
	private static $conn=null;
	private static $tmp=null;
	public function __construct(){
		session_start();
		if($_SESSION['K3_auth']==true){
			$lifeTime =1800;
			setcookie(session_name(), session_id(), time() + $lifeTime, "/");		
		}
		$ip_item=explode('.',Ip());
		$iparea=$ip_item[0].'.'.$ip_item[1];
		if($iparea!='172.18'&&$iparea!='172.16'&&$iparea!='192.168'&&$iparea!='127.0')
		{
			die('sorry,you are not the inner net!');
		}

	}
	public function init(){
		$SEO['title'] ='K3查询搜索！';
		include template('content','header');
		include template('k3','index');
		include template('content','footer');

	}
	public function auth(){
		$username=addslashes($_POST['username']);
		$password=addslashes($_POST['password']);
		if($username&&$password){
			session_start();
			if($this->authCheck($username,$password)){
				$_SESSION['k3_auth']=true;
				echo 1;	
			}else{
				echo 0;			
			}
		}else{
			echo 0;		
		}
	}
	//public function 
	private function decodepasssword($password){
		$decoding=pc_base::load_app_class('decoding');
		return $decoding->getencodepassword($password);
	}
	private function authCheck($username,$password){
		$sql="select top 1 FName,FSID from t_user where FName='$username';";

		//echo$sql."\n";
		$sql = iconv("utf-8","gb2312//IGNORE",$sql);
		mssql_select_db(self::$config['db'],self::conn());		
		$result=mssql_query($sql) or die('mssql error!');
		while( $row = mssql_fetch_array ( $result))
		{
			$ousername=@iconv("gb2312", "UTF-8//IGNORE", $row['FName']);
			$opassword=@iconv("gb2312", "UTF-8//IGNORE", $row['FSID']);
			//$opassword=$row['FSID'];
		}
		if($ousername==false){
			return false;		
		}
		$opassword=substr($opassword,50);
		$plen=strlen($password);
		$num=ceil($plen/6);
		$pa=str_split($password,6);
		foreach($pa	as	$v){
		$tencodepassword[]=$this->decodepasssword($v);
		}
		$encodepassword=implode("",$tencodepassword);

		$opassword=str_replace(" ","",$opassword);
		$encodepassword=str_replace(" ","",$encodepassword);
		echo$opassword."<br>";
		echo$encodepassword."<br>";
		if($opassword==$encodepassword){
			return true;
		}else{
			return false;		
		}
	}
	public function verify(){
		$url=urldecode($_GET['url']);
		session_start();
		if($_SESSION['k3_auth']==false){
			$username=addslashes($_POST['username']);
			$password=addslashes($_POST['password']);
			if($username&&$password&&$_POST['dosubmit']){
				$lifeTime =1800;
				setcookie(session_name(), session_id(), time() + $lifeTime, "/");
				session_start();
				if($this->authCheck($username,$password)){
					$_SESSION['k3_auth']=true;
					header("location:$url");
					exit;
				}else{
					$error_msg="对不起，用户名或密码错误！";		
				}
			}
			include template('k3','login');
		}else{
			header("location:$url");
			exit;
		}
	}
	public function result(){
		session_start();
		if($_SESSION['k3_auth']==false){
			$this->rediect();		
		}
		$type=$this->getType($_GET['type'],4);
		$words=self::$option[$type];
		$keywords=trim($_GET['k']);
		//echo$keywords;
		if(strlen($keywords)<1){
			header('Location: '.APP_PATH.'index.php?m=k3');exit;
		}
		$keywordsa=(array_filter(array_unique(explode(' ',$keywords))));
		sort($keywordsa);
		$num=count($keywordsa)>4?4:count($keywordsa);
		$likeSql=null;
		for($i=0;$i<$num;$i++){
			$like[]=" $words like '%{$keywordsa[$i]}%' ";		
		}
		$likeSql =implode(' and ',$like);

		
		/*sql eidt three date 2013-9-6*/
		$sql="select top 20 m.FNumber,m.FName,m.FModel,m.FErpClsID,m.FUnitGroupID,m.FUnitID,m.FDefaultLoc
		,m.FSPID,m.FUseState,f1.FName as UnitGroupName,f2.FName as MeasureUnitName,f3.FName as SubMessageName
		,f4.FName as StockName,f5.FName as StockPlaceName,f6.FQty,f6.FQtyLock,f6.FBatchNo,f6.FKFDate,f6.FKFPeriod
		from  t_icitem as m 		 	
			left join t_UnitGroup 	as f1 on m.FUnitGroupID=f1.FUnitGroupID 
			left join t_MeasureUnit as f2 on m.FUnitID=f2.FMeasureUnitID 
			left join t_SubMessage 	as f3 on  m.FErpClsID=f3.FInterID
			left join ICInventory 	as f6 on m.FItemID=f6.FItemID 
			left join t_Stock 	as f4 on f6.FStockID=f4.FItemID 
			left join t_StockPlace 	as f5 on f6.FStockPlaceID=f5.FSPID
			where $likeSql
		";
		$sql = iconv("utf-8","gb2312//IGNORE",$sql);
		//echo$sql;
		mssql_select_db(self::$config['db'],self::conn());		
		$result=mssql_query($sql) or die('mssql error!');
		$ks=1;
		while( $row = mssql_fetch_array ( $result))
		{
			foreach($row	as	$k=>$v){
				$tmp[$k]=@iconv("gb2312", "UTF-8//IGNORE", $v);
			}
			$search_data[$ks]=$tmp;
			$minidata[$ks]=$tmp[self::$field[$type]];
			unset($tmp);
			$ks++;
		}
		mssql_close();
		$mainUrl=APP_PATH."index.php?m=k3&c=index&a=result";
		$serachMUrl=APP_PATH."index.php?m=k3&c=index&a=result&type=$type";
		$excelOutputUrl=APP_PATH."index.php?m=k3&c=index&a=outputitem&type=$type&k=$keywords";
		$authUrl=APP_PATH."index.php?m=k3&c=index&a=auth";
		$SEO['title']='物料查询搜索结果关于'.$keywords;
		include template('content','header');
		include template('k3','result');
		include template('k3','auth');
		include template('content','footer');
	}
	public function search_auto_w(){
		$keywords=trim($_GET['k']);
		$keywords=urldecode($keywords);
		$type=$this->getType($_GET['type'],4);
		$words=self::$option[$type];
		if($keywords==null)exit('0');
		$keywordsa=(array_filter(array_unique(explode(' ',$keywords))));
		sort($keywordsa);
		$num=count($keywordsa)>4?4:count($keywordsa);
		$likeSql=null;
		for($i=0;$i<$num;$i++){
			$like[]=" $words like '%{$keywordsa[$i]}%' ";		
		}
		$likeSql =implode(' and ',$like);
		$sql="select distinct top 10 $words as res from  t_icitem as m,
			t_SubMessage as f3 where m.FErpClsID=f3.FInterID and $likeSql;";
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
			//$url=urlencode(APP_PATH.'index.php?m=k3&c=index&a=result&type='.$type.'&k='.$_data['res']);
			echo '<li><a href="index.php?m=k3&c=index&a=result&type='.$type.'&k='.urlencode($_data['res']).'">'.$_data['res'].'</a></li>';
			//echo '<li><a href="index.php?m=k3&c=index&a=verify&url='.$url.'">'.$_data['res'].'</a></li>';
		} 
		echo '<li class="cls"><a href="javascript:;" onclick="$(this).parent().parent().parent().fadeOut(100)">关闭</a& gt;</li>';
		echo '</ul>';	
	}
	public function BOMindex(){
		$SEO['title']='BOM查询搜索';
		include template('content','header');
		include template('k3','BOMindex');
		include template('content','footer');
	}
	public function BOMresult(){
		session_start();
		if($_SESSION['k3_auth']==false){
			$this->rediect();		
		}
		$ICBOMGroup=$this->ICBOMGroup();
		$keywords=trim($_GET['k']);
		$keywords=urldecode($keywords);
		$type=$this->getType($_GET['type'],3);
		$words=self::$option1[$type];
		if($keywords==null){header('Location: '.APP_PATH.'index.php?m=k3&c=index&a=BOMindex');exit;}
		$keywordsa=(array_filter(array_unique(explode(' ',$keywords))));
		sort($keywordsa);
		$num=count($keywordsa)>4?4:count($keywordsa);
		$likeSql=null;
		for($i=0;$i<$num;$i++){
			$like[$i]=" $words like '%{$keywordsa[$i]}%' ";		
		}
		if($type==1){
			$likeSql =implode(' and ',$like);	
		}elseif($type==2){
			for($i=0;$i<$num;$i++){
			$like[$i]=" FNumber like '%{$keywordsa[$i]}%' ";		
			}
			$likeSql =implode(' and ',$like);
			$likeSql="m.FItemID in (select FItemID from t_IcItem where  $likeSql)";
		}elseif($type==3){
			$categoryKeywords=$keywords;
			$groupSql="select top 1 FInterID from ICBOMGroup where FName='$categoryKeywords'";
			//echo$groupSql;
			$groupSql = iconv("utf-8","gb2312//IGNORE",$groupSql);
			mssql_select_db(self::$config['db'],self::conn());		
			$result=mssql_query($groupSql) or die('MSSQL ERROR:SQL ERROR!');
			while( $row = mssql_fetch_array ( $result))
			{
				$groupId=$row['FInterID'];				
			}
			
			$likeSql=" FName like '%$keywords%' ";
			$likeSql="m.FParentID in (select FInterID from ICBOMGroup where  $likeSql)";
		}

			
		/*SQL语句已经完成，勿修改*/	
		$sql="select top 20 m.FBOMNumber as BOMFBOMNumber,m.FCheckDate as BOMFCheckDate,FEnterTime as BOMFEnterTime,
			m.FParentID as 	BOMFParentID,m.FUseDate as BOMFUseDate,m.FQty as BOMFQty, 
			m.FInterID as ID,m.FStatus as BOMFStatus,m.FUseStatus as BOMFUseStatus,
			f2.FName as name,f2.FNumber as number,
			f2.FModel,f2.FUnitGroupID,f2.FUnitID,f2.FDefaultLoc,f2.FSPID,f2.FUseState,f1.*,f3.FName as UnitGroupName,
			f4.FName as MeasureUnitname,f5.FName as Stockname,f6.FName as StockPlacename,f7.FName as SubMessagename
			from t_ICBOM as m
		 	left join t_IcItem as f2 on m.FItemID=f2.FItemID 
			left join ICBOMGroup as f1 on m.FInterID=f1.FInterID 
			left join t_UnitGroup as f3 on f2.FUnitGroupID=f3.FUnitGroupID 
			left join t_MeasureUnit as f4 on f2.FUnitID=f4.FMeasureUnitID 
			left join t_Stock as f5 on f2.FDefaultLoc=f5.FItemID 
			left join t_StockPlace as f6 on f2.FSPID=f6.FSPID 
			left join t_SubMessage as f7 on f2.FErpClsID=f7.FInterID				
			where $likeSql
			";
		/*SQL语句已经完成，勿修改*/
		//echo$sql;
		$sql = iconv("utf-8","gb2312//IGNORE",$sql);
		mssql_select_db(self::$config['db'],self::conn());		
		$result=mssql_query($sql) or die('MSSQL ERROR:SQL ERROR!');
		while( $row = mssql_fetch_array ( $result))
		{

			//print_r($tmpg);
			foreach($row	as	$k=>$v){
				if(!eregi("^[0-9]+$",$k))
				$tmp[$k]=@iconv("gb2312", "UTF-8//IGNORE", $v);	
			}
			if($tmp['ID']!=null){
			$sql="select  m.FInterID as ID,m.FEntryID,m.FItemID,m.FQTY,m.FUnitID,m.FMaterielType,m.FBackFlush,
			f2.FName as myname,f2.FNumber as number,
			f2.FModel,f2.FUnitGroupID,f2.FUnitID,f2.FDefaultLoc,f2.FSPID,f2.FUseState,f1.*,f3.FName as UnitGroupName,
			f4.FName as MeasureUnitname,f5.FName as Stockname,f6.FName as StockPlacename,f7.FName as SubMessagename
			from t_ICBOMCHILD as m
		 	left join t_IcItem as f2 on m.FItemID=f2.FItemID 
			left join ICBOMGroup as f1 on m.FInterID=f1.FInterID 
			left join t_UnitGroup as f3 on f2.FUnitGroupID=f3.FUnitGroupID 
			left join t_MeasureUnit as f4 on f2.FUnitID=f4.FMeasureUnitID 
			left join t_Stock as f5 on f2.FDefaultLoc=f5.FItemID 
			left join t_StockPlace as f6 on f2.FSPID=f6.FSPID 
			left join t_SubMessage as f7 on f2.FErpClsID=f7.FInterID
			where m.FInterID='{$tmp['ID']}'
			";
			$resulta=mssql_query($sql) or die('MSSQL ERROR:SQL ERROR!');
			while( $rowa = mssql_fetch_array ( $resulta))
			{
				
				foreach($rowa	as	$k=>$v){
					if(!eregi("^[0-9]+$",$k))
					$tmpa[$k]=@iconv("gb2312", "UTF-8//IGNORE", $v);	
				}
				$tmpaa[]=$tmpa;
				
			}
			unset($tmpa);
			}
			

			//print_r($tmpa);
			$tmp['children']=$tmpaa;
			$search_data[]=$tmp;
			unset($tmp);
			unset($tmpaa);
			
		}
		
		//print_r($search_data);
		$serachMUrl=APP_PATH."index.php?m=k3&c=index&a=BOMresult&type=$type";
		$serachTreeUrl=APP_PATH."index.php?m=k3&c=index&a=BOMresult&type=$type&k=$keywords&classify=";
		$mainUrl=APP_PATH."index.php?m=k3&c=index&a=BOMresult";
		$excelOutputUrl=APP_PATH."index.php?m=k3&c=index&a=outputbom&type=$type&k=$keywords";
		$authUrl=APP_PATH."index.php?m=k3&c=index&a=auth";
		$SEO['title']='BOM查询搜索结果关于'.$keywords;	
		include template('content','header');
		include template('k3','BOMresult');
		include template('k3','auth');
		include template('content','footer');
	}
	public function search_auto_bom(){
		$keywords=trim($_GET['k']);
		$keywords=urldecode($keywords);
		$type=$this->getType($_GET['type'],3);
		$words=self::$option1[$type];
		if($keywords==null)exit('0');
		$keywordsa=(array_filter(array_unique(explode(' ',$keywords))));
		sort($keywordsa);
		$num=count($keywordsa)>4?4:count($keywordsa);
		$likeSql=null;
		for($i=0;$i<$num;$i++){
			$like[]=" $words like '%{$keywordsa[$i]}%' ";		
		}
		$likeSql =implode(' and ',$like);
		$sql="select distinct top 10 $words as res from  t_ICBOM as m,t_IcItem as f1
			 where m.FItemID=f1.FItemID and $likeSql;";
		if($type==3){
			$sql="select top 10 $words as res from ICBOMGroup where $likeSql";		
		}
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
			echo '<li><a href="index.php?m=k3&c=index&a=bomresult&type='.$type.'&k='.(urlencode($_data['res'])).'">'.$_data['res'].'</a></li>';
		} 
		echo '<li class="cls"><a href="javascript:;" onclick="$(this).parent().parent().parent().fadeOut(100)">关闭</a& gt;</li>';
		echo '</ul>';	
	}
	private function getType($typeTmp,$num){
		if($typeTmp>=1&&$typeTmp<=$num){
			$type=$typeTmp;		
		}else{
			$type=1;	
		}
		return $type;
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

	private function ICBOMGroup(){
		$cacheKey="ICBOMGroup";
		$data=getcache($cacheKey);
		if(empty($data)){
		$sql="select top 1000 * from ICBOMGroup  ";
		mssql_select_db(self::$config['db'],self::conn());		
		$result=mssql_query($sql) or die("sql error");
		$ks=0;
		while( $row = mssql_fetch_array ( $result))
		{
			foreach($row	as	$k=>$v){
				if(!eregi("^[0-9]+$",$k))
				$tmp[$k]=@iconv("gb2312", "UTF-8//IGNORE", $v);
			}
			$data[$ks]=$tmp;
			unset($tmp);
			$ks++;
		}
		setcache($cacheKey,$data);
		}
		
		return $data;
	}

	private function getchildid($id){
		$ICBOMGroup=$this->ICBOMGroup();
		$this->getid($id,$ICBOMGroup);
		return $this->tmp;
	}
	private function getid($id,$ICBOMGroup){
		$this->tmp[]=$id;
		foreach($ICBOMGroup	as	$k=>$v){
			if($v['FParentID']==$id){
				$status=true;
				$kbs[]=$k;
				$ids[]=$v['FInterID'];
							
			}		
		}
		if($status==true){
			foreach($kbs	as	$v){
				unset($ICBOMGroup[$v]);			
			}
			foreach($ids	as	$v){
				$this->getid($v,$ICBOMGroup);
			}
		}		
	}
	public function outputitem(){
		session_start();
		if($_SESSION['k3_auth']==false){
			//$this->rediect();		
		}
		$type=$this->getType($_GET['type'],4);
		$words=self::$option[$type];
		$keywords=trim($_GET['k']);
		//echo$keywords;
		if(strlen($keywords)<1){
			header('Location: '.APP_PATH.'index.php?m=k3');exit;
		}
		$keywordsa=(array_filter(array_unique(explode(' ',$keywords))));
		sort($keywordsa);
		$num=count($keywordsa)>4?4:count($keywordsa);
		$likeSql=null;
		for($i=0;$i<$num;$i++){
			$like[]=" $words like '%{$keywordsa[$i]}%' ";		
		}
		$likeSql =implode(' and ',$like);

		
		/*sql eidt three date 2013-9-6*/
		$sql="select top 2000 m.FNumber,m.FName,m.FModel,m.FErpClsID,m.FUnitGroupID,m.FUnitID,m.FDefaultLoc
		,m.FSPID,m.FUseState,f1.FName as UnitGroupName,f2.FName as MeasureUnitName,f3.FName as SubMessageName
		,f4.FName as StockName,f5.FName as StockPlaceName,f6.FQty,f6.FQtyLock,f6.FBatchNo,f6.FKFDate,f6.FKFPeriod
		from  t_icitem as m 		 	
			left join t_UnitGroup 	as f1 on m.FUnitGroupID=f1.FUnitGroupID 
			left join t_MeasureUnit as f2 on m.FUnitID=f2.FMeasureUnitID 
			left join t_SubMessage 	as f3 on  m.FErpClsID=f3.FInterID
			left join ICInventory 	as f6 on m.FItemID=f6.FItemID 
			left join t_Stock 	as f4 on f6.FStockID=f4.FItemID 
			left join t_StockPlace 	as f5 on f6.FStockPlaceID=f5.FSPID
			where $likeSql
		";
		$sql = iconv("utf-8","gb2312//IGNORE",$sql);
		//echo$sql;
		mssql_select_db(self::$config['db'],self::conn());		
		$result=mssql_query($sql) or die('mssql error!');
		$ks=1;
		while( $row = mssql_fetch_array ( $result))
		{
			foreach($row	as	$k=>$v){
				$tmp[$k]=@iconv("gb2312", "UTF-8//IGNORE", $v);
			}
			$search_data[$ks]=$tmp;
			$minidata[$ks]=$tmp[self::$field[$type]];
			unset($tmp);
			$ks++;
		}
		mssql_close();


		require_once 'classes/PHPExcel.php';
		require_once 'classes/PHPExcel/Writer/Excel2007.php';
		require_once 'classes/PHPExcel/Writer/Excel5.php';
		include_once 'classes/PHPExcel/IOFactory.php';

		$objExcel = new PHPExcel();
		//设置属性 (这段代码无关紧要，其中的内容可以替换为你需要的)
		$objExcel->getProperties()->setCreator("zmodo");
		$objExcel->getProperties()->setLastModifiedBy("zmodo");
		$objExcel->getProperties()->setTitle("Office 2003 XLS  Document");
		$objExcel->getProperties()->setSubject("Office 2003 XLS  Document");
		$objExcel->getProperties()->setDescription("Test document for Office 2003 XLS, generated using PHP classes.");
		$objExcel->getProperties()->setKeywords("office 2003 openxml php");
		$objExcel->getProperties()->setCategory("Test result file");
		$objExcel->setActiveSheetIndex(0);

		$i=0;
		//表头
		$k1="物料代码";
		$k2="物料名称";
		$k3="规格";
		$k4="物料属性";
		$k5="计量单位组";
		$k6="计量单位";
		$k7="仓库";
		$k8="仓位";
		$k9="库存";
		$objExcel->getActiveSheet()->setCellValue('a1', "$k1");
		$objExcel->getActiveSheet()->setCellValue('b1', "$k2");
		$objExcel->getActiveSheet()->setCellValue('c1', "$k3");
		$objExcel->getActiveSheet()->setCellValue('d1', "$k4");
		$objExcel->getActiveSheet()->setCellValue('e1', "$k5");
		$objExcel->getActiveSheet()->setCellValue('f1', "$k6");
		$objExcel->getActiveSheet()->setCellValue('g1', "$k7");
		$objExcel->getActiveSheet()->setCellValue('h1', "$k8");
		$objExcel->getActiveSheet()->setCellValue('i1', "$k9");
	
		//debug($links_list);
		foreach($search_data as $k=>$v) {
			$u1=$i+2;
			/*----------写入内容-------------*/
			$objExcel->getActiveSheet()->setCellValue('a'.$u1, $v["FNumber"]);
			$objExcel->getActiveSheet()->setCellValue('b'.$u1, $v["FName"]);
			$objExcel->getActiveSheet()->setCellValue('c'.$u1, $v["FModel"]);
			$objExcel->getActiveSheet()->setCellValue('d'.$u1, $v["SubMessageName"]);
			$objExcel->getActiveSheet()->setCellValue('e'.$u1, $v["UnitGroupName"]);
			$objExcel->getActiveSheet()->setCellValue('f'.$u1, $v["MeasureUnitName"]);
			$objExcel->getActiveSheet()->setCellValue('g'.$u1, $v["StockName"]);
			$objExcel->getActiveSheet()->setCellValue('h'.$u1, $v["StockPlaceName"]);
			$objExcel->getActiveSheet()->setCellValue('i'.$u1, $v["FQty"]);
			$i++;
		}

		// 高置列的宽度
		$objExcel->getActiveSheet()->getColumnDimension('A')->setWidth(10);
		$objExcel->getActiveSheet()->getColumnDimension('B')->setWidth(10);
		$objExcel->getActiveSheet()->getColumnDimension('C')->setWidth(70);
		$objExcel->getActiveSheet()->getColumnDimension('D')->setWidth(15);
		$objExcel->getActiveSheet()->getColumnDimension('E')->setWidth(15);
		$objExcel->getActiveSheet()->getColumnDimension('F')->setWidth(15);
		$objExcel->getActiveSheet()->getColumnDimension('G')->setWidth(15);
		$objExcel->getActiveSheet()->getColumnDimension('H')->setWidth(15);
		$objExcel->getActiveSheet()->getColumnDimension('I')->setWidth(15);

		$objExcel->getActiveSheet()->getHeaderFooter()->setOddHeader('&L&BPersonal cash register&RPrinted on &D');
		$objExcel->getActiveSheet()->getHeaderFooter()->setOddFooter('&L&B' . $objExcel->getProperties()->getTitle() . '&RPage &P of &N');

		// 设置页方向和规模
		$objExcel->getActiveSheet()->getPageSetup()->setOrientation(PHPExcel_Worksheet_PageSetup::ORIENTATION_PORTRAIT);
		$objExcel->getActiveSheet()->getPageSetup()->setPaperSize(PHPExcel_Worksheet_PageSetup::PAPERSIZE_A4);
		$objExcel->setActiveSheetIndex(0);
		$timestamp = time();
		header('Content-Type: application/vnd.ms-excel');
		header('Content-Disposition: attachment;filename="item'.$timestamp.'.xls"');
		header('Cache-Control: max-age=0');
		$objWriter = PHPExcel_IOFactory::createWriter($objExcel, 'Excel5');
		$objWriter->save('php://output');
		//unset($_SESSION['k3_auth']);
		exit;
		
	}
	public function outputbom(){
		session_start();
		if($_SESSION['k3_auth']==false){
			$this->rediect();		
		}
		$ICBOMGroup=$this->ICBOMGroup();
		$keywords=trim($_GET['k']);
		$keywords=urldecode($keywords);
		$type=$this->getType($_GET['type'],3);
		$words=self::$option1[$type];
		if($keywords==null){header('Location: '.APP_PATH.'index.php?m=k3&c=index&a=BOMindex');exit;}
		$keywordsa=(array_filter(array_unique(explode(' ',$keywords))));
		sort($keywordsa);
		$num=count($keywordsa)>4?4:count($keywordsa);
		$likeSql=null;
		for($i=0;$i<$num;$i++){
			$like[$i]=" $words like '%{$keywordsa[$i]}%' ";		
		}
		if($type==1){
			$likeSql =implode(' and ',$like);	
		}elseif($type==2){
			for($i=0;$i<$num;$i++){
			$like[$i]=" FNumber like '%{$keywordsa[$i]}%' ";		
			}
			$likeSql =implode(' and ',$like);
			$likeSql="m.FItemID in (select FItemID from t_IcItem where  $likeSql)";
		}elseif($type==3){
			$categoryKeywords=$keywords;
			$groupSql="select top 1 FInterID from ICBOMGroup where FName='$categoryKeywords'";
			echo$groupSql;
			$groupSql = iconv("utf-8","gb2312//IGNORE",$groupSql);
			mssql_select_db(self::$config['db'],self::conn());		
			$result=mssql_query($groupSql) or die('MSSQL ERROR:SQL ERROR!');
			while( $row = mssql_fetch_array ( $result))
			{
				$groupId=$row['FInterID'];				
			}
			
			$likeSql=" FName like '%$keywords%' ";
			$likeSql="m.FParentID in (select FInterID from ICBOMGroup where  $likeSql)";
		}

			
		/*SQL语句已经完成，勿修改*/	
		$sql="select top 20 m.FBOMNumber as BOMFBOMNumber,m.FCheckDate as BOMFCheckDate,FEnterTime as BOMFEnterTime,
			m.FParentID as 	BOMFParentID,m.FUseDate as BOMFUseDate,m.FQty as BOMFQty, 
			m.FInterID as ID,m.FStatus as BOMFStatus,m.FUseStatus as BOMFUseStatus,
			f2.FName as name,f2.FNumber as number,
			f2.FModel,f2.FUnitGroupID,f2.FUnitID,f2.FDefaultLoc,f2.FSPID,f2.FUseState,f1.*,f3.FName as UnitGroupName,
			f4.FName as MeasureUnitname,f5.FName as Stockname,f6.FName as StockPlacename,f7.FName as SubMessagename
			from t_ICBOM as m
		 	left join t_IcItem as f2 on m.FItemID=f2.FItemID 
			left join ICBOMGroup as f1 on m.FInterID=f1.FInterID 
			left join t_UnitGroup as f3 on f2.FUnitGroupID=f3.FUnitGroupID 
			left join t_MeasureUnit as f4 on f2.FUnitID=f4.FMeasureUnitID 
			left join t_Stock as f5 on f2.FDefaultLoc=f5.FItemID 
			left join t_StockPlace as f6 on f2.FSPID=f6.FSPID 
			left join t_SubMessage as f7 on f2.FErpClsID=f7.FInterID				
			where $likeSql
			";
		/*SQL语句已经完成，勿修改*/
		$sql = iconv("utf-8","gb2312//IGNORE",$sql);
		mssql_select_db(self::$config['db'],self::conn());		
		$result=mssql_query($sql) or die('MSSQL ERROR:SQL ERROR!');
		while( $row = mssql_fetch_array ( $result))
		{

			//print_r($tmpg);
			foreach($row	as	$k=>$v){
				if(!eregi("^[0-9]+$",$k))
				$tmp[$k]=@iconv("gb2312", "UTF-8//IGNORE", $v);	
			}
			if($tmp['ID']!=null){
			$sql="select  m.FInterID as ID,m.FEntryID,m.FItemID,m.FQTY,m.FUnitID,m.FMaterielType,m.FBackFlush,
			f2.FName as myname,f2.FNumber as number,
			f2.FModel,f2.FUnitGroupID,f2.FUnitID,f2.FDefaultLoc,f2.FSPID,f2.FUseState,f1.*,f3.FName as UnitGroupName,
			f4.FName as MeasureUnitname,f5.FName as Stockname,f6.FName as StockPlacename,f7.FName as SubMessagename
			from t_ICBOMCHILD as m
		 	left join t_IcItem as f2 on m.FItemID=f2.FItemID 
			left join ICBOMGroup as f1 on m.FInterID=f1.FInterID 
			left join t_UnitGroup as f3 on f2.FUnitGroupID=f3.FUnitGroupID 
			left join t_MeasureUnit as f4 on f2.FUnitID=f4.FMeasureUnitID 
			left join t_Stock as f5 on f2.FDefaultLoc=f5.FItemID 
			left join t_StockPlace as f6 on f2.FSPID=f6.FSPID 
			left join t_SubMessage as f7 on f2.FErpClsID=f7.FInterID
			where m.FInterID='{$tmp['ID']}'
			";
			$resulta=mssql_query($sql) or die('MSSQL ERROR:SQL ERROR!');
			while( $rowa = mssql_fetch_array ( $resulta))
			{
				
				foreach($rowa	as	$k=>$v){
					if(!eregi("^[0-9]+$",$k))
					$tmpa[$k]=@iconv("gb2312", "UTF-8//IGNORE", $v);	
				}
				$tmpaa[]=$tmpa;
				
			}
			unset($tmpa);
			}
			

			//print_r($tmpa);
			$tmp['children']=$tmpaa;
			$search_data[]=$tmp;
			unset($tmp);
			unset($tmpaa);
			
		}
		//print_r($search_data);
		//exit;
		require_once 'classes/PHPExcel.php';
		require_once 'classes/PHPExcel/Writer/Excel2007.php';
		require_once 'classes/PHPExcel/Writer/Excel5.php';
		include_once 'classes/PHPExcel/IOFactory.php';

		$objExcel = new PHPExcel();
		//设置属性 (这段代码无关紧要，其中的内容可以替换为你需要的)
		$objExcel->getProperties()->setCreator("zmodo");
		$objExcel->getProperties()->setLastModifiedBy("zmodo");
		$objExcel->getProperties()->setTitle("Office 2003 XLS  Document");
		$objExcel->getProperties()->setSubject("Office 2003 XLS  Document");
		$objExcel->getProperties()->setDescription("Test document for Office 2003 XLS, generated using PHP classes.");
		$objExcel->getProperties()->setKeywords("office 2003 openxml php");
		$objExcel->getProperties()->setCategory("Test result file");
		$objExcel->setActiveSheetIndex(0);

		$i=0;
		//表头
		$k1="BOM单编号";
		$k2="物料代码";
		$k3="物料名称";
		$k4="规格型号";
		$k5="物料属性";
		$k6="计量单位组";
		$k7="计量单位";
		$k8="仓库";
		$k9="仓位";
		$k10="库存";
		$k11="使用状态";
		$k12="审核状态";
		$objExcel->getActiveSheet()->setCellValue('a1', "$k1");
		$objExcel->getActiveSheet()->setCellValue('b1', "$k2");
		$objExcel->getActiveSheet()->setCellValue('c1', "$k3");
		$objExcel->getActiveSheet()->setCellValue('d1', "$k4");
		$objExcel->getActiveSheet()->setCellValue('e1', "$k5");
		$objExcel->getActiveSheet()->setCellValue('f1', "$k6");
		$objExcel->getActiveSheet()->setCellValue('g1', "$k7");
		$objExcel->getActiveSheet()->setCellValue('h1', "$k8");
		$objExcel->getActiveSheet()->setCellValue('i1', "$k9");
		$objExcel->getActiveSheet()->setCellValue('j1', "$k10");
		$objExcel->getActiveSheet()->setCellValue('k1', "$k11");
		$objExcel->getActiveSheet()->setCellValue('l1', "$k12");
	
		//debug($links_list);
		foreach($search_data as $k=>$v) {
			$u1=$i+2;
			/*----------写入内容-------------*/
			$objExcel->getActiveSheet()->setCellValue('a'.$u1, $v["BOMFBOMNumber"]);
			$objExcel->getActiveSheet()->setCellValue('b'.$u1, $v["number"]);
			$objExcel->getActiveSheet()->setCellValue('c'.$u1, $v["name"]);
			$objExcel->getActiveSheet()->setCellValue('d'.$u1, $v["FModel"]);
			$objExcel->getActiveSheet()->setCellValue('e'.$u1, $v["SubMessagename"]);
			$objExcel->getActiveSheet()->setCellValue('f'.$u1, $v["UnitGroupName"]);
			$objExcel->getActiveSheet()->setCellValue('g'.$u1, $v["MeasureUnitname"]);
			$objExcel->getActiveSheet()->setCellValue('h'.$u1, $v["Stockname"]);
			$objExcel->getActiveSheet()->setCellValue('i'.$u1, $v["StockPlacename"]);
			$objExcel->getActiveSheet()->setCellValue('j'.$u1, $v["BOMFQty"]);
			if($v['BOMFUseStatus']==1072){$useStatus="使用";}
			elseif($v['BOMFUseStatus']==1073){$useStatus="未使用";}
			else{$useStatus="未使用";}
			if($v['BOMFStatus']==0){$review="未审核";}
			elseif($v['BOMFStatus']==1){$review="审核";}
			else{$review="未审核";}
			$objExcel->getActiveSheet()->setCellValue('k'.$u1, $useStatus);
			$objExcel->getActiveSheet()->setCellValue('l'.$u1, $review);
			$u1=$u1+1;
			$objExcel->getActiveSheet()->setCellValue('a'.$u1, "BOM子单");
			$objExcel->getActiveSheet()->setCellValue('b'.$u1, "顺序");
			$objExcel->getActiveSheet()->setCellValue('c'.$u1, "物料代码");
			$objExcel->getActiveSheet()->setCellValue('d'.$u1, "物料名称");
			$objExcel->getActiveSheet()->setCellValue('e'.$u1, "规格型号");
			$objExcel->getActiveSheet()->setCellValue('f'.$u1, "物料属性");
			$objExcel->getActiveSheet()->setCellValue('g'.$u1, "计量单位组");
			$objExcel->getActiveSheet()->setCellValue('h'.$u1, "计量单位");
			$objExcel->getActiveSheet()->setCellValue('i'.$u1, "仓库");
			$objExcel->getActiveSheet()->setCellValue('j'.$u1, "仓位");
			$objExcel->getActiveSheet()->setCellValue('k'.$u1, "库存");
			$objExcel->getActiveSheet()->setCellValue('l'.$u1, "使用状态");
			$num=count($v['children']);
			foreach($v['children']	as	$ks=>$vs){
				$u1=$u1+1;
				$objExcel->getActiveSheet()->setCellValue('b'.$u1, ($ks+1)."/".($num-1));
				$objExcel->getActiveSheet()->setCellValue('c'.$u1, $vs["number"]);
				$objExcel->getActiveSheet()->setCellValue('d'.$u1, $vs["myname"]);
				$objExcel->getActiveSheet()->setCellValue('e'.$u1, $vs["FModel"]);
				$objExcel->getActiveSheet()->setCellValue('f'.$u1, $vs["SubMessagename"]);
				$objExcel->getActiveSheet()->setCellValue('g'.$u1, $vs["UnitGroupName"]);
				$objExcel->getActiveSheet()->setCellValue('h'.$u1, $vs["MeasureUnitname"]);
				$objExcel->getActiveSheet()->setCellValue('i'.$u1, $vs["Stockname"]);
				$objExcel->getActiveSheet()->setCellValue('j'.$u1, $vs["StockPlacename"]);
				$objExcel->getActiveSheet()->setCellValue('k'.$u1, $vs["FQTY"]);
				$objExcel->getActiveSheet()->setCellValue('l'.$u1, $vs["FUseState"]);
				$i++;		
			}
			$i++;
			
		}

		// 高置列的宽度
		$objExcel->getActiveSheet()->getColumnDimension('A')->setWidth(20);
		$objExcel->getActiveSheet()->getColumnDimension('B')->setWidth(40);
		$objExcel->getActiveSheet()->getColumnDimension('C')->setWidth(40);
		$objExcel->getActiveSheet()->getColumnDimension('D')->setWidth(15);
		$objExcel->getActiveSheet()->getColumnDimension('E')->setWidth(15);
		$objExcel->getActiveSheet()->getColumnDimension('F')->setWidth(15);
		$objExcel->getActiveSheet()->getColumnDimension('G')->setWidth(15);
		$objExcel->getActiveSheet()->getColumnDimension('H')->setWidth(15);
		$objExcel->getActiveSheet()->getColumnDimension('I')->setWidth(15);

		$objExcel->getActiveSheet()->getHeaderFooter()->setOddHeader('&L&BPersonal cash register&RPrinted on &D');
		$objExcel->getActiveSheet()->getHeaderFooter()->setOddFooter('&L&B' . $objExcel->getProperties()->getTitle() . '&RPage &P of &N');

		// 设置页方向和规模
		$objExcel->getActiveSheet()->getPageSetup()->setOrientation(PHPExcel_Worksheet_PageSetup::ORIENTATION_PORTRAIT);
		$objExcel->getActiveSheet()->getPageSetup()->setPaperSize(PHPExcel_Worksheet_PageSetup::PAPERSIZE_A4);
		$objExcel->setActiveSheetIndex(0);
		$timestamp = time();
		header('Content-Type: application/vnd.ms-excel');
		header('Content-Disposition: attachment;filename="BOM'.$timestamp.'.xls"');
		header('Cache-Control: max-age=0');
		$objWriter = PHPExcel_IOFactory::createWriter($objExcel, 'Excel5');
		$objWriter->save('php://output');
		//unset($_SESSION['k3_auth']);
		exit;	
	}
	private function rediect(){
		$currenturl=$this->getcurrenturl();
		$url=APP_PATH."index.php?m=k3&c=index&a=verify&url=".urlencode($currenturl);
		header("location:$url");
		exit;
	}
	private function getcurrenturl() {
		$sys_protocal = isset($_SERVER['SERVER_PORT']) && $_SERVER['SERVER_PORT'] == '443' ? 'https://' : 'http://';
		$php_self = $_SERVER['PHP_SELF'] ? $_SERVER['PHP_SELF'] : $_SERVER['SCRIPT_NAME'];
		$path_info = isset($_SERVER['PATH_INFO']) ? $_SERVER['PATH_INFO'] : '';
		$relate_url = isset($_SERVER['REQUEST_URI']) ? $_SERVER['REQUEST_URI'] : $php_self.(isset($_SERVER['QUERY_STRING']) ? '?'.$_SERVER['QUERY_STRING'] : $path_info);
		return $sys_protocal.(isset($_SERVER['HTTP_HOST']) ? $_SERVER['HTTP_HOST'] : '').$relate_url;
	}
	public function unsets(){
		session_start();
		unset($_SESSION['k3_auth']);	
	}


}
