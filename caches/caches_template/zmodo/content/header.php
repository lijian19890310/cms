<?php defined('IN_PHPCMS') or exit('No permission resources.'); ?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<title><?php if(isset($SEO['title']) && !empty($SEO['title'])) { ?><?php echo $SEO['title'];?><?php } ?><?php echo $SEO['site_title'];?></title>
	<meta name="keywords" content="<?php echo $SEO['keyword'];?>">
	<meta name="description" content="<?php echo $SEO['description'];?>">
	<script src="<?php echo JS_PATH;?>jquery.min.js"></script>
	<script type="text/javascript" language="javascript" src="<?php echo JS_PATH;?>slides.min.jquery.js"></script>
	<script type="text/javascript" language="javascript" src="<?php echo JS_PATH;?>header.js"></script>
	<link rel="stylesheet" href="<?php echo CSS_PATH;?>index.css" type="text/css" />
	<link rel="stylesheet" href="<?php echo CSS_PATH;?>menu.css" type="text/css" />
	<link rel="stylesheet" href="<?php echo CSS_PATH;?>menu.style.css" type="text/css" media="screen" />
	<link rel="stylesheet" href="<?php echo CSS_PATH;?>global.css" type="text/css" media="screen" />
	<script>
		$(document).ready(function() {	
		var $backToTopTxt = "返回首页", $backToTopEle = $('<a href="<?php echo APP_PATH;?>" class="backToTop" style="color:#fff;"></a>').appendTo($("body"))
		.text($backToTopTxt).attr("title", $backToTopTxt);
		$(window).bind("scroll",  $backToTopEle.show());
		$(function() { $backToTopEle.show(); });
		});
	</script>
		
</head>
<body id="top">
<div class="header_w">
	<div id="index_header" class="index_header">
		<div id="logo" class="logo">
			<a href="<?php echo APP_PATH;?>" style="float:left;">
				<img src="http://zone.zmodo.com/cms/statics/images/logo.png">
			</a>
		</div>
		<div id="header_menu" class="header_menu">
		<!--menu.html-->
			<div class="container">
				<div class="menu style-1">
					<ul class="menu">
						<li><a id="to_blog" href="<?php echo $_COOKIE['blogUrl']?>" target="_blank">CEO博客</a>
							<img src='<?php echo IMG_PATH;?>NEW.png' id='blog_new_notice' style='display:none;left:70px;position: absolute;top: -10px;'/>
							<div class="mega-menu col-3" id="mega_menu1">
									<div class="col-3">
										<ol>
										<?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"get\" data=\"op=get&tag_md5=e856d9d334caaf12bacd67252644eea1&sql=SELECT+post_title%2Cguid+FROM+wp_posts+where+post_status%3D%27publish%27+order+by+ID+DESC&cache=0&num=10&dbsource=blog&return=data\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">编辑</a>";}pc_base::load_sys_class("get_model", "model", 0);$get_db = new get_model(array (
  'blog' => 
  array (
    'hostname' => '172.18.19.251:3306',
    'database' => 'blog',
    'db_tablepre' => 'wp_',
    'username' => 'root',
    'password' => '123456',
    'charset' => 'utf8',
    'debug' => 0,
    'pconnect' => 0,
    'autoconnect' => 0,
  ),
  'cms' => 
  array (
    'hostname' => '172.18.19.251:3306',
    'database' => 'cms',
    'db_tablepre' => 'v9_',
    'username' => 'root',
    'password' => '123456',
    'charset' => 'utf8',
    'debug' => 0,
    'pconnect' => 0,
    'autoconnect' => 0,
  ),
), 'blog');$r = $get_db->sql_query("SELECT post_title,guid FROM wp_posts where post_status='publish' order by ID DESC LIMIT 10");while(($s = $get_db->fetch_next()) != false) {$a[] = $s;}$data = $a;unset($a);?>								
										<?php $n=1;if(is_array($data)) foreach($data AS $r) { ?>
										<li><a href="<?php echo $r['guid'];?><?php echo $_COOKIE['blogurle'];?>" title="<?php echo $r['post_title'];?>"><?php echo $r['post_title'];?></a></li>
										<?php $n++;}unset($n); ?>
										<?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?>
										<?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"get\" data=\"op=get&tag_md5=f66227d9dcbc72e0229afccaa823dd9e&sql=SELECT+COUNT%28ID%29+as+blog_qty+FROM+wp_posts+where+post_status%3D%27publish%27+order+by+post_date&cache=0&dbsource=blog&return=data\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">编辑</a>";}pc_base::load_sys_class("get_model", "model", 0);$get_db = new get_model(array (
  'blog' => 
  array (
    'hostname' => '172.18.19.251:3306',
    'database' => 'blog',
    'db_tablepre' => 'wp_',
    'username' => 'root',
    'password' => '123456',
    'charset' => 'utf8',
    'debug' => 0,
    'pconnect' => 0,
    'autoconnect' => 0,
  ),
  'cms' => 
  array (
    'hostname' => '172.18.19.251:3306',
    'database' => 'cms',
    'db_tablepre' => 'v9_',
    'username' => 'root',
    'password' => '123456',
    'charset' => 'utf8',
    'debug' => 0,
    'pconnect' => 0,
    'autoconnect' => 0,
  ),
), 'blog');$r = $get_db->sql_query("SELECT COUNT(ID) as blog_qty FROM wp_posts where post_status='publish' order by post_date LIMIT 20");while(($s = $get_db->fetch_next()) != false) {$a[] = $s;}$data = $a;unset($a);?>
											<script type="text/javascript" src="<?php echo JS_PATH;?>jq_cookie.js"></script>
											<script type="text/javascript">
												$(document).ready(function(){
													$("#to_blog").click(function(){
														var date = new Date();  
														date.setTime(date.getTime() + (7 * 24 * 60 * 60 *1000));  
														$.cookie('blog_info_qty', <?php echo $data['0']['blog_qty'];?>, { path: '/cms', expires: date });  
													});
													
													if($.cookie('blog_info_qty') < <?php echo $data['0']['blog_qty'];?>){
														$("#blog_new_notice").css('display','block');
													}
												});
											</script>   
										<?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?>
										</ol>
									</div>
							</div>
						</li>
						<li><a id="gszk" href="<?php echo APP_PATH;?>index.php?m=content&c=index&a=lists&catid=67" >公司周刊</a>
						<img src='<?php echo IMG_PATH;?>NEW.png' id='new_gszk' style='display:none;left:185px;position: absolute;top: -10px;'/>
						<?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"content\" data=\"op=content&tag_md5=852f47c44640beb29bbd0d87ed36b02a&action=lists&catid=67&order=id+DESC&num=10&return=data\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">编辑</a>";}$content_tag = pc_base::load_app_class("content_tag", "content");if (method_exists($content_tag, 'lists')) {$data = $content_tag->lists(array('catid'=>'67','order'=>'id DESC','limit'=>'10',));}?>
								<?php if(!empty($data)) { ?>
								<div class="mega-menu col-3" id="mega_menu2">
								<div class="col-3">
									<ol>
										<?php $n=1; if(is_array($data)) foreach($data AS $n => $r) { ?>
										<?php $kkksss=$n+$kkksss?>
										<li><a href="<?php echo $r['url'];?>" title="<?php echo $r['title'];?>"><?php echo $r['title'];?></a></li>
										<?php $n++;}unset($n); ?>
									</ol>
									</div>
									</div>
								<script type="text/javascript">
								$(document).ready(function(){
									$("#gszk").click(function(){
									var date = new Date();  
									date.setTime(date.getTime() + (7 * 24 * 60 * 60 *1000));  
									$.cookie('gszk', <?php echo $kkksss;?>, { path: '/cms', expires: date });  
									});
									if($.cookie('gszk') < <?php echo $kkksss;?>){
									$("#new_gszk").css('display','block');
									}
								});
								</script>   
								<?php } ?>
								<?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?>
						</li>
					<li><a id="ygfx" href="<?php echo APP_PATH;?>index.php?m=content&c=index&a=lists&catid=24">ZMODO大学</a>
						<img src='<?php echo IMG_PATH;?>NEW.png' id='new_ygfx' style='display:none;left:330px;position: absolute;top: -10px;'/>		
								<?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"content\" data=\"op=content&tag_md5=05cd789413429b45afad5a2990cdd3e1&action=lists&catid=24&order=id+DESC&num=10&return=data\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">编辑</a>";}$content_tag = pc_base::load_app_class("content_tag", "content");if (method_exists($content_tag, 'lists')) {$data = $content_tag->lists(array('catid'=>'24','order'=>'id DESC','limit'=>'10',));}?>
								
								<?php if(!empty($data)) { ?>
								<div class="mega-menu col-3" id="mega_menu3">
								<div class="col-3">
									<ol>
										<?php $n=1; if(is_array($data)) foreach($data AS $n => $r) { ?>
										<?php $kkkksss=$n+$kkkksss?>
										<li><a href="<?php echo $r['url'];?>" title="<?php echo $r['title'];?>"><?php echo $r['title'];?></a></li>
										<?php $n++;}unset($n); ?>
									</ol>
									</div>
									</div>
								<script type="text/javascript">
								$(document).ready(function(){
									$("#ygfx").click(function(){
									var date = new Date();  
									date.setTime(date.getTime() + (7 * 24 * 60 * 60 *1000));  
									$.cookie('ygfx', <?php echo $kkkksss;?>, { path: '/cms', expires: date });  
									});
									if($.cookie('ygfx') < <?php echo $kkkksss;?>){
									$("#new_ygfx").css('display','block');
									}
								});
								</script>   
								<?php } ?>
								<?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?>
					</li>
						<img src='<?php echo IMG_PATH;?>NEW.png' id='new_gszk' style='display:none;left:185px;position: absolute;top: -10px;'/>
						<?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"content\" data=\"op=content&tag_md5=852f47c44640beb29bbd0d87ed36b02a&action=lists&catid=67&order=id+DESC&num=10&return=data\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">编辑</a>";}$content_tag = pc_base::load_app_class("content_tag", "content");if (method_exists($content_tag, 'lists')) {$data = $content_tag->lists(array('catid'=>'67','order'=>'id DESC','limit'=>'10',));}?>
								<?php if(!empty($data)) { ?>
								<div class="mega-menu col-3" id="mega_menu2">
								<div class="col-3">
									<ol>
										<?php $n=1; if(is_array($data)) foreach($data AS $n => $r) { ?>
										<?php $kkksss=$n+$kkksss?>
										<li><a href="<?php echo $r['url'];?>" title="<?php echo $r['title'];?>"><?php echo $r['title'];?></a></li>
										<?php $n++;}unset($n); ?>
									</ol>
									</div>
									</div>
								<script type="text/javascript">
								$(document).ready(function(){
									$("#gszk").click(function(){
									var date = new Date();  
									date.setTime(date.getTime() + (7 * 24 * 60 * 60 *1000));  
									$.cookie('gszk', <?php echo $kkksss;?>, { path: '/cms', expires: date });  
									});
									if($.cookie('gszk') < <?php echo $kkksss;?>){
									$("#new_gszk").css('display','block');
									}
								});
								</script>   
								<?php } ?>
								<?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?>
						</li>
					<!--<li><a id="ygfx" href="<?php echo APP_PATH;?>index.php?m=content&c=index&a=lists&catid=24">ZMODO大学</a>
						<img src='<?php echo IMG_PATH;?>NEW.png' id='new_ygfx' style='display:none;left:330px;position: absolute;top: -10px;'/>		
								<?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"content\" data=\"op=content&tag_md5=05cd789413429b45afad5a2990cdd3e1&action=lists&catid=24&order=id+DESC&num=10&return=data\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">编辑</a>";}$content_tag = pc_base::load_app_class("content_tag", "content");if (method_exists($content_tag, 'lists')) {$data = $content_tag->lists(array('catid'=>'24','order'=>'id DESC','limit'=>'10',));}?>
								
								<?php if(!empty($data)) { ?>
								<div class="mega-menu col-3" id="mega_menu3">
								<div class="col-3">
									<ol>
										<?php $n=1; if(is_array($data)) foreach($data AS $n => $r) { ?>
										<?php $kkkksss=$n+$kkkksss?>
										<li><a href="<?php echo $r['url'];?>" title="<?php echo $r['title'];?>"><?php echo $r['title'];?></a></li>
										<?php $n++;}unset($n); ?>
									</ol>
									</div>
									</div>
								<script type="text/javascript">
								$(document).ready(function(){
									$("#ygfx").click(function(){
									var date = new Date();  
									date.setTime(date.getTime() + (7 * 24 * 60 * 60 *1000));  
									$.cookie('ygfx', <?php echo $kkkksss;?>, { path: '/cms', expires: date });  
									});
									if($.cookie('ygfx') < <?php echo $kkkksss;?>){
									$("#new_ygfx").css('display','block');
									}
								});
								</script>   
								<?php } ?>
								<?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?>
									
							
						
					</li>-->
					<li><a id="yggh" href="<?php echo APP_PATH;?>index.php?m=content&c=index&a=lists&catid=26">ZMODOer</a>
					<!--<img src='<?php echo IMG_PATH;?>NEW.png' id='new_yggh' style='display:none;left:445px;position: absolute;top: -10px;'/>		-->

								<?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"content\" data=\"op=content&tag_md5=ea94f864638d6c5f6ff309c25b33ff4c&action=lists&catid=66&order=id+DESC&num=10&return=data\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">编辑</a>";}$content_tag = pc_base::load_app_class("content_tag", "content");if (method_exists($content_tag, 'lists')) {$data = $content_tag->lists(array('catid'=>'66','order'=>'id DESC','limit'=>'10',));}?>
								
								<?php if(!empty($data)) { ?>
								<div class="mega-menu col-4" id="mega_menu4">
									<div class="col-1">
									<ol>
										<p style="color:black;size:20px;"><b>企业文化</b></p>

										<?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"content\" data=\"op=content&tag_md5=a53293fb6e01b34fe64b2ec0bab657fa&action=category&catid=1&num=20&siteid=%24siteid&order=listorder+ASC\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">编辑</a>";}$content_tag = pc_base::load_app_class("content_tag", "content");if (method_exists($content_tag, 'category')) {$data = $content_tag->category(array('catid'=>'1','siteid'=>$siteid,'order'=>'listorder ASC','limit'=>'20',));}?>
											<?php $n=1; if(is_array($data)) foreach($data AS $t => $r) { ?>
											<li><a href="<?php echo $r['url'];?>"><?php echo $r['catname'];?></a></li>
											<?php $n++;}unset($n); ?>
										<?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?>

									</ol>
									</div>
								<div class="col-1">
									<ol>
										<p style="color:black;size:20px;"><b>员工论坛</b></p>

										<?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"content\" data=\"op=content&tag_md5=57b00fa27be0e15dd4844ff4d4ffdc85&action=category&catid=26&num=20&siteid=%24siteid&order=listorder+ASC\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">编辑</a>";}$content_tag = pc_base::load_app_class("content_tag", "content");if (method_exists($content_tag, 'category')) {$data = $content_tag->category(array('catid'=>'26','siteid'=>$siteid,'order'=>'listorder ASC','limit'=>'20',));}?>
											<?php $n=1; if(is_array($data)) foreach($data AS $t => $r) { ?>
											<li><a href="<?php echo $r['url'];?>"><?php echo $r['catname'];?></a></li>
											<?php $n++;}unset($n); ?>
										<?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?>

									</ol>
									</div>

								<div class="col-2">
									<ol>
									<?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"content\" data=\"op=content&tag_md5=34d1c96636c5bce99b75c5181fba2485&action=lists&catid=26&order=id+DESC&num=7&return=data\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">编辑</a>";}$content_tag = pc_base::load_app_class("content_tag", "content");if (method_exists($content_tag, 'lists')) {$data = $content_tag->lists(array('catid'=>'26','order'=>'id DESC','limit'=>'7',));}?>
								
										<?php $n=1; if(is_array($data)) foreach($data AS $n => $r) { ?>
										<?php $kkkkksss=$n+$kkkkksss?>
										<li><a href="<?php echo $r['url'];?>" title="<?php echo $r['title'];?>"><?php echo $r['title'];?></a></li>
										<?php $n++;}unset($n); ?>
									<?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?>
									</ol>
									</div>
								</div>
								<script type="text/javascript">
								$(document).ready(function(){
									$("#yggh").click(function(){
									var date = new Date();  
									date.setTime(date.getTime() + (7 * 24 * 60 * 60 *1000));  
									$.cookie('yggh', <?php echo $kkkkksss;?>, { path: '/cms', expires: date });  
									});
									if($.cookie('yggh') < <?php echo $kkkkksss;?>){
									$("#new_yggh").css('display','block');
									}
								});
								</script>

								<?php } ?>
								<?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?>
						
					</li>
					<li><a href="#"><span style="color:#ff9933">My ZONE</span></a></li>
					</ul>
				</div>
			</div>

		</div>
	</div>
</div>
<!--{photo.html}-->
  
<!--banner.html-->

<div class="banner_main color_wihte">
	<ul id="ntabs" class="index_font color_r">
	<?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"content\" data=\"op=content&tag_md5=31265c468044f18f043d1ee5028c85d4&action=category&catid=0&num=7&siteid=%24siteid&order=listorder+ASC&return=data5\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">编辑</a>";}$content_tag = pc_base::load_app_class("content_tag", "content");if (method_exists($content_tag, 'category')) {$data5 = $content_tag->category(array('catid'=>'0','siteid'=>$siteid,'order'=>'listorder ASC','limit'=>'7',));}?>
		<?php $n=1; if(is_array($data5)) foreach($data5 AS $k => $v) { ?>
			<?php $kkk++; ?>
			<li><a href="<?php echo $v['url'];?>"><?php echo $v['catname'];?></a>
				<div id="ntabboxDiv<?php echo $kkk;?>">
				<span class="icon"></span>
				<?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"content\" data=\"op=content&tag_md5=356f8bef28e3d6ac0683ce51d47be66a&action=category&catid=%24k&num=20&siteid=%24siteid&order=listorder+ASC\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">编辑</a>";}$content_tag = pc_base::load_app_class("content_tag", "content");if (method_exists($content_tag, 'category')) {$data = $content_tag->category(array('catid'=>$k,'siteid'=>$siteid,'order'=>'listorder ASC','limit'=>'20',));}?>
					<?php $n=1; if(is_array($data)) foreach($data AS $t => $r) { ?>
					<a href="<?php echo $r['url'];?>"><?php echo $r['catname'];?></a>
					<?php $n++;}unset($n); ?>
				<?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?>
				</div>
			</li>
		<?php $n++;}unset($n); ?>
	<?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?>
	</ul>
	
</div>
<div id="blank1" style="height:0px;"></div>
<div class="clear"></div>
