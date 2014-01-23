<?php
class decoding{
	private static $conn=null;
	private static	$config=array(	
								'host'=>'localhost',
								'user'=>'root',	
								'pwd'=>'123456',
								'db'=>'cms',
								'table'=>'k3_tranlate'
							);
	public function  getencodepassword($password){
		return $this->encode($password);
	}
	private function encodepassword($password){
		$num=strlen($password);
		for($i=0;$i<$num;$i++){
			$stringArray[$i]['s']=$password{$i};	
			$stringArray[$i]['k']=($i+1)%6;
			if($stringArray[$i]['k']==null)$stringArray[$i]['k']=6;		
		}
		return $stringArray;
	}
	private function encode($password){
		$stringArray=$this->encodepassword($password);
		$encodestring=null;
		$pre_string=" )  F ".'"'.", ,P T #8 *P!D &D 80!N &@ <0 C "."'"."< : !M &4 )0";
		$pre_string=null;
		foreach($stringArray	as	$v){
			$field="k".$v['k'];
			$string=$v['s'];
			$string = str_replace('"','&quot;',$string);
			$string = str_replace("'",'&tuot;',$string);
			$string = str_replace("\\",'&zxx;',$string);
			$sql="select $field from ".self::$config['table']." where id=binary '$string';";
			mysql_select_db(self::$config['db'],self::conn());		
			$result=mysql_query($sql);
			while( $row = mysql_fetch_array ( $result))
			{
				$string=$row[$field];
				$string=str_replace('&nbsp;',' ',$string);
				$string = str_replace('&quot;','"',$string);
				$string = str_replace("&tuot;","'",$string);
				$string = str_replace("&zxx;",'\\',$string);
				$encodestring[]=$string;
				break;
			}
			
		}
		
		$allcodestring=$pre_string.implode('',$encodestring);
		return $allcodestring;
	}
	private function conn(){
		if(self::$conn){
			return self::$conn;		
		}else{
			self::$conn=self::$conn=$this->connect();
			return self::$conn;
		}
	}
	private function connect(){
		$conn=mysql_connect(self::$config['host'],self::$config['user'],self::$config['pwd'] ) or die("Couldn't connect mysql");
		return $conn;	
	}
}

