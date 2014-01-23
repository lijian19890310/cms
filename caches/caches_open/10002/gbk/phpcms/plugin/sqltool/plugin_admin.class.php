<?php
	defined('IN_PHPCMS') or exit('No permission resources.');
	class plugin_admin {
		function __construct($pluginid) {
			$this->pluginid = $pluginid;
			$this->op = pc_base::load_app_class('plugin_op');
		}
		
		public function sqlquery() {
			if($_SESSION['roleid']!=1) showmessage('只有超级管理员具有执行SQL权限');
			$database = pc_base::load_config('database');
			if(ISSET($_POST['pluginsubmit'])) {
				$pdo_name = $_POST['pdo_select'];
				$this->db_charset = $database[$pdo_name]['charset'];
				$this->db_tablepre = $database[$pdo_name]['tablepre'];
				$this->db = db_factory::get_instance($database)->get_database($pdo_name);
				$sqls = $_POST['sqls'];
				if($sqls=='') {
					showmessage('SQL语句为空',HTTP_REFERER);
				} 
				$handle = $this->_sql_execute($sqls);
				if($handle) {
					showmessage('SQL执行成功',HTTP_REFERER);
				} else {
					showmessage('SQL执行失败',HTTP_REFERER);
				}
			} else {
				foreach($database as $name=>$value) {
					$pdos[$name] = $value['database'].'['.$value['hostname'].']';
				}			
				include $this->op->plugin_tpl('sqlquery_admin',PLUGIN_ID);
			}
		}
		
		/**
		 * 执行SQL
		 * @param string $sql 要执行的sql语句
		 */
		private function _sql_execute($sql) {
			$sqls = $this->_sql_split($sql);
			if(is_array($sqls)) {
				foreach($sqls as $sql) {
					if(trim($sql) != '') {
						$handle = $this->db->query($sql);
						if(!$handle) return false;
					}
				}
			} else {
				$handle = $this->db->query($sqls);
			}
			return $handle ? true : false ;
		}	
		
		/**
		 * 分割SQL语句
		 * @param string $sql 要执行的sql语句
		 */	
		private function _sql_split($sql) {
			$database = pc_base::load_config('database');
			$db_charset = $database['default']['charset'];
			if($this->db->version() > '4.1' && $db_charset) {
				$sql = preg_replace("/TYPE=(InnoDB|MyISAM|MEMORY)( DEFAULT CHARSET=[^; ]+)?/", "ENGINE=\\1 DEFAULT CHARSET=".$db_charset,$sql);
			}
			$sql = str_replace("\r", "\n", $sql);
			$ret = array();
			$num = 0;
			$queriesarray = explode(";\n", trim($sql));
			unset($sql);
			foreach($queriesarray as $query) {
				$ret[$num] = '';
				$queries = explode("\n", trim($query));
				$queries = array_filter($queries);
				foreach($queries as $query) {
					$str1 = substr($query, 0, 1);
					if($str1 != '#' && $str1 != '-') $ret[$num] .= $query;
				}
				$num++;
			}
			return($ret);
		}		
	}
?>