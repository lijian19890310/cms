<?
class mssql{
	public static	$config=array(	
								'host'=>'172.18.19.253:1433',
								'user'=>'itadmins',	
								'pwd'=>'it@Zmodo2o13',
								'db'=>'HR',
								'table'=>'V_HREmployee'
							);
	public static $conn=null;
	public static function iconvs($text){
		return iconv("gbk", "UTF-8//IGNORE", $text);
	}
	public static function	conn(){
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
}
