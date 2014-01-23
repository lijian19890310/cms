<?php
return array (
  'identification' => 'sqltool',
  'realease' => '20110412',
  'dir' => 'sqltool',
  'appid' => '10002',
  //plugin表配置
  'plugin'=> array(
		  'version' => '0.0.1',
		  'name' => 'SQL工具箱',
		  'copyright' => 'phpcms team',
		  'description' => '执行sql等操作',
		  'installfile' => 'install.php',
		  'uninstallfile' => 'uninstall.php',
		  'setting' => array(
				array(
					'name'=>'sqlquery',
					'menu'=>'执行sql语句',
					'url'=>'',
					'listorder'=>'0',
				),	
			)
	),
	'license'=>
	'本插件由PHPCMS开发团队完成！可自由修改传播！',
)
?>