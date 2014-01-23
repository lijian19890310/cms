<?php
/*平板展示
*index.php :查选首页
*date:2013-7-17
*author:michael lee
*where:shenzhen nanshang zmodo CLT
*/

defined('IN_PHPCMS') or exit('No permission resources.');
class index{
	private static	$config=array(	
								'host'=>'172.18.19.253:1433',
								'user'=>'itadmins',	
								'pwd'=>'it@Zmodo2o13',
								'db'=>'HR',
								'table'=>'V_HREmployee'
							);
	public function __construct(){
		$ip_item=explode('.',Ip());
		$iparea=$ip_item[0].'.'.$ip_item[1];
		if($iparea!='172.18'&&$iparea!='172.16'&&$iparea!='192.168'&&$iparea!='127.0')
		{
			die('sorry,you are not the inner net!');
		}
	}
	public function init(){
		$lunar=pc_base::load_app_class('lunar');  
		$today = date("Y-m-d");
		$nlDate = $lunar->S2L($today);
		$weatherUrl='http://m.weather.com.cn/data/101280601.html';
		$weatherData=@file_get_contents($weatherUrl);
		$weatherData=json_decode($weatherData);
		$birthday=$this->birthday();
		$blogData=$this->getBlog();
		include template('zhanshi','index');
	}
	public function getBlog(){
		$host='localhost';
		$user='root';
		$pwd='123456';
		$db='blog';
		$conn=mysql_connect($host,$user,$pwd);
		mysql_select_db($db,$conn);
		$sql="SELECT post_title,guid,post_content,post_date FROM wp_posts where post_status='publish' order by ID DESC LIMIT 2";
		mysql_query("set names utf8");
		$result=mysql_query($sql);
		$k=0;
		while( $row = mysql_fetch_array ( $result)){
			$data[$k]['title']=$row['post_title'];
			$data[$k]['content']=$row['post_content'];
			$data[$k]['date']=$row['post_date'];
			$k++;
		}
		$page=15;$image=7;$h=38;
		foreach($data	as	$ks=>$v){
			preg_match_all("/.*src=\"([^^]*?)\".*/i",$v['content'],$match);
			$data[$ks]['img']=$match[1];
			$data[$ks]['imgnum']=count($data[$ks]['img']);
			if($data[$ks]['imgnum']>6)$data[$ks]['imgnum']=6;
			$word=preg_replace("/<(\/?img.*?)>/si","",$v['content']);
			$word=preg_replace("/<(\/?a.*?)>/si","",$word);
			$word=preg_replace("/<(\/?div.*?)>/si","",$word);
			$word=str_replace("\r\n","<br>",$word);
			$word=str_replace("&nbsp;","",trim($word));
			$word=str_replace("<br><br>","<br>",trim($word));
			$word=str_replace("<br><br>","<br>",trim($word));
			$word=str_replace("<br><br>","<br>",trim($word));
			$word=str_replace("<br><br>","<br>",trim($word));
			$word=str_replace("<br><br>","<br>",trim($word));
			$arrayWord=array_filter(explode('<br>',$word));
			$num=null;
			$tmp=null;
			$ttmp=null;
			foreach($arrayWord	as	$k=>$v){
				$aa[$k]['w']=$v;
				$l=strlen(iconv('utf-8','gb2312',$v));
				$aa[$k]['ll']=(ceil($l/$h))>$page?$page:(ceil($l/$h));
				$num+=$aa[$k]['ll'];
			}
			if($data[$ks]['imgnum']>=1){
				if($num!=null){				
					$num=$num+7;
					$aa[$k+1]['ll']=7;
					$aa[$k+1]['w']='img';
				}else{
				}		
			}
			
			$tmp=null;
			$ttmp=null;
			for($i=0;$i<count($aa);$i++){
				$tmp=$tmp+$aa[$i]['ll'];
				$ttmp=$tmp+$aa[$i+1]['ll'];
				if($tmp<=$page&&$ttmp>$page){
					$aa[$i]['dian']=true;
					$tmp=null;
					$ttmp=null;				
				}
			}
			
			$aa[count($aa)-1]['dian']=true;			
			//print_r($aa);

			for($i=0;$i<count($aa);$i++){
				$j[]=$aa[$i]['w'];
				if($aa[$i]['dian']==true){
					$datas[]['w']=implode('<br>',$j);
					$j=null;		
				}
			}
			if(substr($datas[count($datas)-1]['w'],-3,3)=='img'){
				$datas[count($datas)-1]['w']=str_replace("img","",trim($datas[count($datas)-1]['w']));
				$datas[count($datas)-1]['img']=	$data[$ks]['img'];	
			}
			$_datas1[$ks]=$datas?$datas:array(0=>array('img'=>$data[$ks]['img']));
			unset($datas);
			
			$data[$ks]['ll']=$num;
			$data[$ks]['aa']=$aa;
			unset($data[$ks]['content']);unset($aa);unset($k);
		}
		//print_r($_datas1);			
		foreach($_datas1	as	$k=>$v){
			foreach($v	as	$ks=>$vs){
				$odata[$k][$ks]['t']=$data[$k]['title'];
				$odata[$k][$ks]['d']=$data[$k]['date'];
				$odata[$k][$ks]['w']=$vs['w'];
				$odata[$k][$ks]['m']=$vs['img'];
			}		
		}
		//print_r($odata);
		return $odata;
	}

	private function birthday(){
		$the_year=date('Y');
		$the_mouth=date('m');
		$mdate=$the_year%4?28:29;
		$days=array('01'=>31,'02'=>$mdate,'03'=>'31','04'=>'30','05'=>'31','06'=>'30','07'=>'31','08'=>31,'09'=>'30','10'=>31,'11'=>30,'12'=>'31');
		$begun_time=$the_year.'-'.$the_mouth.'-'.'01';
		$cacheKey="birthday_".$the_year.$the_mouth;
		$end_time=$the_year.'-'.$the_mouth.'-'.$days[$the_mouth];
		$data=getcache($cacheKey);
		if(empty($data)){
			$sql="
			Select  EmpNo,EEmpName,EmpName,convert(char,Birthday,120) as tBirthday From ".self::$config['table']." where
			(dateadd(year,datediff(year,Birthday,'".$begun_time."'),Birthday) between '".$begun_time."' and '".$end_time."'
			or
			dateadd(year,datediff(year,Birthday,'".$begun_time."'),Birthday) between '".$begun_time."' and '".$end_time."') 
			and LeaveDate IS NULL
			ORDER BY Birthday ";
			$conn=mssql_connect(self::$config['host'],self::$config['user'],self::$config['pwd']) or die('Can not connect mssql!');
			mssql_select_db(self::$config['db'],$conn);
			$result=mssql_query($sql);;
			$k=0;
			while( $row = mssql_fetch_array ( $result))
			{

				$data[$k]['EmpNo']=$row['EmpNo'];
				$Birthday=substr($row['tBirthday'],5,5);
				$data[$k]['Birthday']=$Birthday;
				$data[$k]['EmpName']=iconv("gbk", "UTF-8//IGNORE",$row[EmpName]);
				$data[$k]['EEmpName']=$row['EEmpName'];
				$data[$k]['day']=intval(substr($Birthday,3,2));
				$k++;
			}
			setcache($cacheKey,$data);
		}
		mssql_close();
		$string=null;
		foreach($this->maopao($data)	as	$k=>$v){
			$theImage=PHPCMS_PATH.'uploadfile/hr_photo/'.$v['EmpNo'].'.jpg';
			$yTheimage=APP_PATH.'uploadfile/hr_photo/'.$v['EmpNo'].'.jpg';
			if(file_exists($theImage)){
				$imgHtml="<img src='".$yTheimage."' width='100' height='128'>";			
			}else{
				//$this->getImage($v['EmpNo']);
				if(file_exists($theImage)){
					$imgHtml="<img src='".$yTheimage."' width='100' height='128' ></span>";	
				}else{
				$imgHtml="<div style='width:100px;height:128px;'>&nbsp;</div>";			
				}
			}

			$string.="<li>
				      	$imgHtml
					<p>".$v['EmpName']."</p>
					<p>".$v['EEmpName']."</p>
				      	</li>";
		}
		return $string;
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
				if(file_exists($theImage)){
					return $ytheImage;
				}else{
				return false;
				}
			}
		}

		
	}
	public function dbimage(){
		$EmpNo=new_stripslashes($_GET['EmpNo']);
		if($EmpNo){
			mssql_select_db('HR',self::conn());
			$sql2="select top 1 * from HR_Photo where EmpNo='".$EmpNo."'";
			$result2=mssql_query($sql2);
			while($row2=mssql_fetch_array ( $result2)){
				$Photo=$row2['Photo1'];			
			}
			mssql_close();
			if($Photo){
				header("Content-type:image/");
				echo$Photo;
			}
		}
	}
	public function mimage(){
		$per=9;
		$getStep=intval($_GET['stid']);
		//if($getStep==0) exit;
		$nextStep=$getStep+$per;
		$data=getcache('mimage_datas');
		if(empty($data)){
			mssql_select_db('HR',self::conn());
			$sql='SELECT EmpNo from HR_Employee WHERE  LeaveDate IS NULL';
			$result=mssql_query($sql);
			while($row=mssql_fetch_array ( $result)){
				$data[]=$row['EmpNo'];
			}
			setcache('mimage_datas',$data);
		}
		$num=count($data);
		echo$num;
		if($nextStep>=$num&&$num>$step){
			exit('complete');		
		}
		for($i=$step;$i<$nextStep;$i++){
			$this->getImage2($data[$i]);
		}
		$nextUrl=APP_PATH.'index.php?m=cdsearch&c=index&a=mimage&stid='.$nextStep;
		//echo$nextUrl;
		echo '<script language="javascript">location="'.$nextUrl.'"; </script>';

	}
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
}
