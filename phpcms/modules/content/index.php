<?php
defined('IN_PHPCMS') or exit('No permission resources.');
//模型缓存路径
define('CACHE_MODEL_PATH',CACHE_PATH.'caches_model'.DIRECTORY_SEPARATOR.'caches_data'.DIRECTORY_SEPARATOR);
pc_base::load_app_func('util','content');
class index {
	private $db;
	public static $i=0;
	function __construct() {
		$this->db = pc_base::load_model('content_model');
		$this->_userid = param::get_cookie('_userid');
		$this->_username = param::get_cookie('_username');
		$this->_groupid = param::get_cookie('_groupid');
		//2013-6-19   by michael lee add
		$ip;
		if (getenv("HTTP_CLIENT_IP"))
		$ip = getenv("HTTP_CLIENT_IP");
		else if(getenv("HTTP_X_FORWARDED_FOR"))
		$ip = getenv("HTTP_X_FORWARDED_FOR");
		else if(getenv("REMOTE_ADDR"))
		$ip = getenv("REMOTE_ADDR");
		else $ip = "Unknow";
		if($this->_userid){
			setcookie('zmodo_user',$this->_userid,3600*2);		
		}
		$ipitem=explode('.',$ip);
		//print_r($_COOKIE);
		if(empty($this->_userid)) {
			$iparea=$ipitem[0].".".$ipitem[1];
		    if($iparea!="172.18"&&$iparea!="172.16"&&$iparea!="192.168")
		    {
		    	$forward = urlencode(get_url());
		    	showmessage(L('login_website'),APP_PATH.'index.php?m=member&c=index&a=login&forward='.$forward);
		    }
		}
		$blogUrl=$this->_userid != null?($this->_username == 'kevin' ? '/blog/?uid=kevin&key='.md5('zmodo'.date('Ymd')) : '/blog/?uid=public&key='.md5('zmodo'.date('Ymd'))):'/blog/';
		$blogUrle=$this->_userid != null?($this->_username == 'kevin' ? '&uid=kevin&key='.md5('zmodo'.date('Ymd')) : '&uid=public&key='.md5('zmodo'.date('Ymd'))): null;
		setcookie('blogUrl',$blogUrl);
		setcookie('blogurle',$blogUrle);
		//over
	}
	//首页
	public function init() {
		if(isset($_GET['siteid'])) {
			$siteid = intval($_GET['siteid']);
		} else {
			$siteid = 1;
		}
		$company=$this->getcompany();
		$newsData=$this->newRss();
		//$newsData=array_filter($this->getNewNews());
		$siteid = $GLOBALS['siteid'] = max($siteid,1);
		define('SITEID', $siteid);
		$_userid = $this->_userid;
		$_username = $this->_username;
		$_groupid = $this->_groupid;
		//SEO
		$blogUrl = $_userid != null?($_username == 'kevin' ? '/blog/?uid=kevin&key='.md5('zmodo'.date('Ymd')) : '/blog/?uid=public&key='.md5('zmodo'.date('Ymd'))) : '/blog/';	
		$blogUrle=$this->_userid != null?($this->_username == 'kevin' ? '&uid=kevin&key='.md5('zmodo'.date('Ymd')) : '&uid=public&key='.md5('zmodo'.date('Ymd'))): null;		
		$SEO = seo($siteid);
		$sitelist  = getcache('sitelist','commons');
		$default_style = $sitelist[$siteid]['default_style'];
		$CATEGORYS = getcache('category_content_'.$siteid,'commons');
		$commentdata=$this->getComment();
		include template('content','index',$default_style);
	}

//@add bu michaellee date:2013-9-3 start 
//@about comments
	private function getComment(){
		
		$this->db2 = pc_base::load_model('blog_model');
		//var_dump($this->db2);
		$result=$this->db->query("SELECT * FROM  v9_comment_data_1 as t1,v9_comment as t2 where t1.commentid=t2.commentid order by 	t1.creat_at DESC LIMIT  10 ;");
		while( $row = mysql_fetch_array($result))
		{
			
			foreach($row	as	$k=>$v){
			if(!eregi("^[0-9]+$",$k))
				$tmp[$k]=$v;
			}
			$tmp2['author']=$tmp['username'];
			$tmp2['content']=$tmp['content'];
			$tmp2['url']=$tmp['url'];
			$tmp2['date']=date('Y-m-d h:i:s',$tmp['creat_at']);
			$tmp2['udate']=$tmp['creat_at'];
			$data1[]=$tmp2;
			
			unset($tmp);unset($tmp2);

		}
		//print_r($data1);

		$localhost="localhost";
		$user="root";
		$pwd="123456";
		$db="blog";
		$conn=mysql_connect($localhost,$user,$pwd);
		mysql_select_db($db, $conn);
		$re=mysql_query("SELECT * FROM  `wp_comments` order by comment_date DESC LIMIT  10 ;");
		while( $row = mysql_fetch_array($re))
		{
			//print_r($row);
			foreach($row	as	$k=>$v){
			if(!eregi("^[0-9]+$",$k))
				$tmp[$k]=$v;
			}
			$tmp2['author']=$tmp['comment_author'];
			$tmp2['content']=$tmp['comment_content'];
			$tmp2['url']='http://zone.zmodo.com/blog/?p='.$tmp['comment_post_ID'].'#comment-'.$tmp['comment_ID'];
			$tmp2['date']=$tmp['comment_date'];
			$tmp2['udate']=strtotime($tmp['comment_date']);
			$data2[]=$tmp2;
			unset($tmp);unset($tmp2);
		}
		mysql_close();
		$array=array_merge($data1,$data2);
		$count=count($array);
		for($i = 0; $i < $count ; $i ++) {
			for($j = $count - 1 ; $j > $i ; $j --) {
				if($array[$j]['udate'] > $array[$j - 1]['udate']) {
					$temp = $array[$j];
					$array[$j] = $array[$j - 1];
					$array[$j - 1] = $temp;
				}
			}
		}
		if($count>10){
			for($i=10;$i<$count;$i++){
				unset($array[$i]);			
			}		
		}
		return $array;
	}
/**
*add by michaellee date:2013-9-28 start 
*explain
*/
private function getcompany(){
		$company=$this->getRss(APP_PATH.'index.php?m=cdsearch&c=index&a=getcompany');
		return json_decode($company,true);
		
}
//add by michaellee date:2013-7-11 start
	public function zmodocn(){
		$id=intval($_GET['id']);
		if($id>=0&&$id<=9){
			$allData=getcache('new_rss');
			if($allData==null){
				die;			
			}
			if($allData[$id]==null){
				die;			
			}
			
			$datas=$allData[$id];
			$SEO['title']=$datas['title'];
			//print_r($data);
			include template('content','show_zmodocn',$default_style);
		}
	}
	private function newRss(){
		$this->db->set_model(1);
		$where=" catid='6'";
		$data1 = $this->db->listinfo($where,'id desc',$_GET['page'],10);
		foreach($data1	as	$k=>$v){
			$_data1[$k]['title']=$v['title'];
			$_data1[$k]['url']=$v['url'];
			$_data1[$k]['udate']=$v['inputtime'];
			unset($data1[$k]); 	
		}
		$_data2=$this->jiexiRss();
		$_data=array_merge($_data1,$_data2);
		$newsData=$this->maopao($_data);
		unset($newsData['overtime']);
		return $newsData;

	}
	private function jiexiRss(){
		$data=getcache('new_rss');
		if($data==null||(!empty($data)&&$data['overtime']>strtotime('now'))){
			$orgData=$this->getRss('http://www.zmodo.com.cn/blog/rss');
			$tmpData=$this->xmltoarray($orgData);			
			foreach($tmpData['rss']['channel']['item']	as	$k=>$v){
				$title=str_replace('<![CDATA[','',$v['title']);
				$title=str_replace(']]>','',$title);
				$data[$k]['title']=$title;
				$data[$k]['url']=APP_PATH.'index.php?m=content&c=index&a=zmodocn&id='.$k;
				$data[$k]['udate']=strtotime($v['pubDate']);
				$datas=str_replace('<![CDATA[','',$v['description']);
				$datas=str_replace(']]>','',$datas);
				$data[$k]['content']=$datas;
				unset($tmpData[$k]);
				if($k==9) break;
			}
			$data['overtime']=strtotime('now')+86400;
			setcache1('new_rss', $data);
		}
		return $data;
		
	}
	private function titleGL($data){
		foreach($data	as	$k=>$v){
			$t[$k]=$v['title'];
		}
		$t2=array_unique($t);
		foreach($t2	as	$k=>$v){
			$_data[$k]=$data[$k];		
		}
		return $_data;
	}
	private function xmltoarray( $xml )
	{
		$this->i++;
	    $reg = "/<(\\w+)[^>]*?>([\\x00-\\xFF]*?)<\\/\\1>/";
	    if(preg_match_all($reg, $xml, $matches)&&$this->i<=4)
	    {
		$count = count($matches[0]);
		$arr = array();
		for($i = 0; $i < $count; $i++)
		{
		    $key = $matches[1][$i];
		    $val = $this->xmltoarray( $matches[2][$i] );  // 递归
		    if(array_key_exists($key, $arr))
		    {
		        if(is_array($arr[$key]))
		        {
		            if(!array_key_exists(0,$arr[$key]))
		            {
		                $arr[$key] = array($arr[$key]);
		            }
		        }else{
		            $arr[$key] = array($arr[$key]);
		        }
		        $arr[$key][] = $val;
		    }else{
		        $arr[$key] = $val;
		    }
			$this->i--;
		}
		return $arr;
	    }else{
		return $xml;
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
				if($array[$j]['udate'] > $array[$j - 1]['udate']) {
					$temp = $array[$j];
					$array[$j] = $array[$j - 1];
					$array[$j - 1] = $temp;
				}
			}
		}
		$_array=$this->titleGL($array);
		$_count=count($_array);
		if($_count>10){
			for($i=10;$i<$_count;$i++){
				unset($_array[$i]);			
			}
			return $_array;
		}else{
			return $_array;
		}
	}
	private function getRss($url){
		$ch = curl_init();
		curl_setopt ($ch, CURLOPT_URL,$url );
		curl_setopt ($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt ($ch, CURLOPT_CONNECTTIMEOUT,10);
		$dxycontent = curl_exec($ch);
		return $dxycontent;
	}
//add by michaellee date:2013-7-11 over
	//内容页
	public function show() {
		$catid = intval($_GET['catid']);
		$id = intval($_GET['id']);

		if(!$catid || !$id) showmessage(L('information_does_not_exist'),'blank');
		$_userid = $this->_userid;
		$_username = $this->_username;
		$_groupid = $this->_groupid;

		$page = intval($_GET['page']);
		$page = max($page,1);
		$siteids = getcache('category_content','commons');
		$siteid = $siteids[$catid];
		$CATEGORYS = getcache('category_content_'.$siteid,'commons');
		
		if(!isset($CATEGORYS[$catid]) || $CATEGORYS[$catid]['type']!=0) showmessage(L('information_does_not_exist'),'blank');
		$this->category = $CAT = $CATEGORYS[$catid];
		$this->category_setting = $CAT['setting'] = string2array($this->category['setting']);
		$siteid = $GLOBALS['siteid'] = $CAT['siteid'];
		
		$MODEL = getcache('model','commons');
		$modelid = $CAT['modelid'];
		
		$tablename = $this->db->table_name = $this->db->db_tablepre.$MODEL[$modelid]['tablename'];
		$r = $this->db->get_one(array('id'=>$id));
		if(!$r || $r['status'] != 99) showmessage(L('info_does_not_exists'),'blank');
		
		$this->db->table_name = $tablename.'_data';
		$r2 = $this->db->get_one(array('id'=>$id));
		$rs = $r2 ? array_merge($r,$r2) : $r;

		//再次重新赋值，以数据库为准
		$catid = $CATEGORYS[$r['catid']]['catid'];
		$modelid = $CATEGORYS[$catid]['modelid'];
		
		require_once CACHE_MODEL_PATH.'content_output.class.php';
		$content_output = new content_output($modelid,$catid,$CATEGORYS);
		$data = $content_output->get($rs);
		extract($data);
		
		//检查文章会员组权限
		if($groupids_view && is_array($groupids_view)) {
			$_groupid = param::get_cookie('_groupid');
			$_groupid = intval($_groupid);
			if(!$_groupid) {
				$forward = urlencode(get_url());
				showmessage(L('login_website'),APP_PATH.'index.php?m=member&c=index&a=login&forward='.$forward);
			}
			if(!in_array($_groupid,$groupids_view)) showmessage(L('no_priv'));
		} else {
			//根据栏目访问权限判断权限
			$_priv_data = $this->_category_priv($catid);
			if($_priv_data=='-1') {
				$forward = urlencode(get_url());
				showmessage(L('login_website'),APP_PATH.'index.php?m=member&c=index&a=login&forward='.$forward);
			} elseif($_priv_data=='-2') {
				showmessage(L('no_priv'));
			}
		}
		if(module_exists('comment')) {
			$allow_comment = isset($allow_comment) ? $allow_comment : 1;
		} else {
			$allow_comment = 0;
		}
		//阅读收费 类型
		$paytype = $rs['paytype'];
		$readpoint = $rs['readpoint'];
		$allow_visitor = 1;
		if($readpoint || $this->category_setting['defaultchargepoint']) {
			if(!$readpoint) {
				$readpoint = $this->category_setting['defaultchargepoint'];
				$paytype = $this->category_setting['paytype'];
			}
			
			//检查是否支付过
			$allow_visitor = self::_check_payment($catid.'_'.$id,$paytype);
			if(!$allow_visitor) {
				$http_referer = urlencode(get_url());
				$allow_visitor = sys_auth($catid.'_'.$id.'|'.$readpoint.'|'.$paytype).'&http_referer='.$http_referer;
			} else {
				$allow_visitor = 1;
			}
		}
		//最顶级栏目ID
		$arrparentid = explode(',', $CAT['arrparentid']);
		$top_parentid = $arrparentid[1] ? $arrparentid[1] : $catid;
		
		$template = $template ? $template : $CAT['setting']['show_template'];
		if(!$template) $template = 'show';
		//echo$template;
		//SEO
		$seo_keywords = '';
		if(!empty($keywords)) $seo_keywords = implode(',',$keywords);
		$SEO = seo($siteid, $catid, $title, $description, $seo_keywords);
		
		define('STYLE',$CAT['setting']['template_list']);
		if(isset($rs['paginationtype'])) {
			$paginationtype = $rs['paginationtype'];
			$maxcharperpage = $rs['maxcharperpage'];
		}
		$pages = $titles = '';
		if($rs['paginationtype']==1) {
			//自动分页
			if($maxcharperpage < 10) $maxcharperpage = 500;
			$contentpage = pc_base::load_app_class('contentpage');
			$content = $contentpage->get_data($content,$maxcharperpage);
		}
		if($rs['paginationtype']!=0) {
			//手动分页
			$CONTENT_POS = strpos($content, '[page]');
			if($CONTENT_POS !== false) {
				$this->url = pc_base::load_app_class('url', 'content');
				$contents = array_filter(explode('[page]', $content));
				$pagenumber = count($contents);
				if (strpos($content, '[/page]')!==false && ($CONTENT_POS<7)) {
					$pagenumber--;
				}
				for($i=1; $i<=$pagenumber; $i++) {
					$pageurls[$i] = $this->url->show($id, $i, $catid, $rs['inputtime']);
				}
				$END_POS = strpos($content, '[/page]');
				if($END_POS !== false) {
					if($CONTENT_POS>7) {
						$content = '[page]'.$title.'[/page]'.$content;
					}
					if(preg_match_all("|\[page\](.*)\[/page\]|U", $content, $m, PREG_PATTERN_ORDER)) {
						foreach($m[1] as $k=>$v) {
							$p = $k+1;
							$titles[$p]['title'] = strip_tags($v);
							$titles[$p]['url'] = $pageurls[$p][0];
						}
					}
				}
				//当不存在 [/page]时，则使用下面分页
				$pages = content_pages($pagenumber,$page, $pageurls);
				//判断[page]出现的位置是否在第一位 
				if($CONTENT_POS<7) {
					$content = $contents[$page];
				} else {
					if ($page==1 && !empty($titles)) {
						$content = $title.'[/page]'.$contents[$page-1];
					} else {
						$content = $contents[$page-1];
					}
				}
				if($titles) {
					list($title, $content) = explode('[/page]', $content);
					$content = trim($content);
					if(strpos($content,'</p>')===0) {
						$content = '<p>'.$content;
					}
					if(stripos($content,'<p>')===0) {
						$content = $content.'</p>';
					}
				}
			}
		}
		$this->db->table_name = $tablename;
		//上一页
		$previous_page = $this->db->get_one("`catid` = '$catid' AND `id`<'$id' AND `status`=99",'*','id DESC');
		//下一页
		$next_page = $this->db->get_one("`catid`= '$catid' AND `id`>'$id' AND `status`=99");

		if(empty($previous_page)) {
			$previous_page = array('title'=>L('first_page'), 'thumb'=>IMG_PATH.'nopic_small.gif', 'url'=>'javascript:alert(\''.L('first_page').'\');');
		}

		if(empty($next_page)) {
			$next_page = array('title'=>L('last_page'), 'thumb'=>IMG_PATH.'nopic_small.gif', 'url'=>'javascript:alert(\''.L('last_page').'\');');
		}
		include template('content',$template);
	}
	//列表页
	public function lists() {
	
		$catid = $_GET['catid'] = intval($_GET['catid']);
		$_priv_data = $this->_category_priv($catid);
		if($_priv_data=='-1') {
			$forward = urlencode(get_url());
			showmessage(L('login_website'),APP_PATH.'index.php?m=member&c=index&a=login&forward='.$forward);
		} elseif($_priv_data=='-2') {
			showmessage(L('no_priv'));
		}
		$_userid = $this->_userid;
		$_username = $this->_username;
		$_groupid = $this->_groupid;

		if(!$catid) showmessage(L('category_not_exists'),'blank');
		$siteids = getcache('category_content','commons');
		$siteid = $siteids[$catid];
		$CATEGORYS = getcache('category_content_'.$siteid,'commons');
		if(!isset($CATEGORYS[$catid])) showmessage(L('category_not_exists'),'blank');
		$CAT = $CATEGORYS[$catid];
		$siteid = $GLOBALS['siteid'] = $CAT['siteid'];
		extract($CAT);
		$setting = string2array($setting);
		//SEO
		if(!$setting['meta_title']) $setting['meta_title'] = $catname;
		$SEO = seo($siteid, '',$setting['meta_title'],$setting['meta_description'],$setting['meta_keywords']);
		define('STYLE',$setting['template_list']);
		$page = intval($_GET['page']);

		$template = $setting['category_template'] ? $setting['category_template'] : 'category';
		$template_list = $setting['list_template'] ? $setting['list_template'] : 'list';
		//echo$template;
		//echo$template_list;
		if($type==0) {
			$template = $child ? $template : $template_list;
			$arrparentid = explode(',', $arrparentid);
			$top_parentid = $arrparentid[1] ? $arrparentid[1] : $catid;
			$array_child = array();
			$self_array = explode(',', $arrchildid);
			//获取一级栏目ids
			foreach ($self_array as $arr) {
				if($arr!=$catid && $CATEGORYS[$arr][parentid]==$catid) {
					$array_child[] = $arr;
				}
			}
			$arrchildid = implode(',', $array_child);
			//URL规则
			$urlrules = getcache('urlrules','commons');
			$urlrules = str_replace('|', '~',$urlrules[$category_ruleid]);
			$tmp_urls = explode('~',$urlrules);
			$tmp_urls = isset($tmp_urls[1]) ?  $tmp_urls[1] : $tmp_urls[0];
			preg_match_all('/{\$([a-z0-9_]+)}/i',$tmp_urls,$_urls);
			if(!empty($_urls[1])) {
				foreach($_urls[1] as $_v) {
					$GLOBALS['URL_ARRAY'][$_v] = $_GET[$_v];
				}
			}
			define('URLRULE', $urlrules);
			$GLOBALS['URL_ARRAY']['categorydir'] = $categorydir;
			$GLOBALS['URL_ARRAY']['catdir'] = $catdir;
			$GLOBALS['URL_ARRAY']['catid'] = $catid;
			include template('content',$template);
		} else {
		//单网页
			$this->page_db = pc_base::load_model('page_model');
			$r = $this->page_db->get_one(array('catid'=>$catid));
			if($r) extract($r);
			$template = $setting['page_template'] ? $setting['page_template'] : 'page';
			$arrchild_arr = $CATEGORYS[$parentid]['arrchildid'];
			if($arrchild_arr=='') $arrchild_arr = $CATEGORYS[$catid]['arrchildid'];
			$arrchild_arr = explode(',',$arrchild_arr);
			array_shift($arrchild_arr);
			$keywords = $keywords ? $keywords : $setting['meta_keywords'];
			$SEO = seo($siteid, 0, $title,$setting['meta_description'],$keywords);
			include template('content',$template);
		}
	}
	
	//JSON 输出
	public function json_list() {
		if($_GET['type']=='keyword' && $_GET['modelid'] && $_GET['keywords']) {
		//根据关键字搜索
			$modelid = intval($_GET['modelid']);
			$id = intval($_GET['id']);

			$MODEL = getcache('model','commons');
			if(isset($MODEL[$modelid])) {
				$keywords = safe_replace(htmlspecialchars($_GET['keywords']));
				$keywords = addslashes(iconv('utf-8','gbk',$keywords));
				$this->db->set_model($modelid);
				$result = $this->db->select("keywords LIKE '%$keywords%'",'id,title,url',10);
				if(!empty($result)) {
					$data = array();
					foreach($result as $rs) {
						if($rs['id']==$id) continue;
						if(CHARSET=='gbk') {
							foreach($rs as $key=>$r) {
								$rs[$key] = iconv('gbk','utf-8',$r);
							}
						}
						$data[] = $rs;
					}
					if(count($data)==0) exit('0');
					echo json_encode($data);
				} else {
					//没有数据
					exit('0');
				}
			}
		}

	}
	
	
	/**
	 * 检查支付状态
	 */
	protected function _check_payment($flag,$paytype) {
		$_userid = $this->_userid;
		$_username = $this->_username;
		if(!$_userid) return false;
		pc_base::load_app_class('spend','pay',0);
		$setting = $this->category_setting;
		$repeatchargedays = intval($setting['repeatchargedays']);
		if($repeatchargedays) {
			$fromtime = SYS_TIME - 86400 * $repeatchargedays;
			$r = spend::spend_time($_userid,$fromtime,$flag);
			if($r['id']) return true;
		}
		return false;
	}
	
	/**
	 * 检查阅读权限
	 *
	 */
	protected function _category_priv($catid) {
		$catid = intval($catid);
		if(!$catid) return '-2';
		$_groupid = $this->_groupid;
		$_groupid = intval($_groupid);
		if($_groupid==0) $_groupid = 8;
		$this->category_priv_db = pc_base::load_model('category_priv_model');
		$result = $this->category_priv_db->select(array('catid'=>$catid,'is_admin'=>0,'action'=>'visit'));
		if($result) {
			if(!$_groupid) return '-1';
			foreach($result as $r) {
				if($r['roleid'] == $_groupid) return '1';
			}
			return '-2';
		} else {
			return '1';
		}
	 }
	/**
	*@add by michaelleed date :2013-9-4
	*new  news
	*/
	public function getNewNews(){
		$this->db->set_model(1);
		$sql="select t2.title,t2.url,t1.content,t2.inputtime as udate from  v9_news_data as t1, v9_news as t2 where t1.id=t2.id and t2.catid not in ('85','72','88','69','67','24','66','16','12','64','23','90','87','86','89') order by t1.id DESC limit 20";
		$result=$this->db->query($sql);
		while( $row = mysql_fetch_array($result)){
			foreach($row	as	$k=>$v){
			if(!eregi("^[0-9]+$",$k)){
				$tmp[$k]=$v;
			}
			}
			
			$data1[]=$tmp;
			unset($tmp);
		}
		$data2=$this->jiexiRss();
		$data=$this->filterTitleC(array_merge($data1,$data2));
		foreach($data 	as	$k=>$v){
			preg_match_all("/.*src=\"([^^]*?)\".*/i",$v['content'],$match);
			$data[$k]['img']=$match[1][0]?$match[1][0]:IMG_PATH."nophoto.png";
			$data[$k]['time']=date('Y-m-d h:i:s',$data[$k]['udate']);
			unset($data[$k]['content']);		
		}
		return $this->maopao2($data,20);
	}
	private function filterTitleC($data){
		foreach($data	as	$k=>$v){
			$t[$k]=$v['title'];
		}
		$tc=array_unique($t);
		foreach($tc	as	$k=>$v){
			$datas[]=$data[$k];		
		}
		foreach($datas	as	$v){
			$datass[]=$v;		
		}

		return $datass;
	}
	private function maopao2($array,$num) 
	{
		$count = count($array);
		if($count < 2) {
			return $array;
		}
		for($i = 0; $i < $count ; $i ++) {
			for($j = $count - 1 ; $j > $i ; $j --) {
				if($array[$j]['udate'] > $array[$j - 1]['udate']) {
					$temp = $array[$j];
					$array[$j] = $array[$j - 1];
					$array[$j - 1] = $temp;
				}
			}
		}
		unset($array['overtime']);
		$_count=count($array);
		if($_count>$num){
			for($i=$num;$i<$_count;$i++){
				unset($array[$i]);			
			}
			return $array;
		}else{
			return $array;
		}
	}
}
?>
