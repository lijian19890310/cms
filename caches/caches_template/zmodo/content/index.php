<?php defined('IN_PHPCMS') or exit('No permission resources.'); ?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<title><?php if(isset($SEO['title']) && !empty($SEO['title'])) { ?><?php echo $SEO['title'];?><?php } ?><?php echo $SEO['site_title'];?></title>
	<meta name="keywords" content="<?php echo $SEO['keyword'];?>">
	<meta name="description" content="<?php echo $SEO['description'];?>">
	<script src="<?php echo JS_PATH;?>jquery.min.js"></script>
	<script type="text/javascript" language="javascript" src="<?php echo JS_PATH;?>slides.min.jquery.js"></script>
	<script type="text/javascript" language="javascript" src="<?php echo JS_PATH;?>header_index.js"></script>
	<link rel="stylesheet" href="<?php echo CSS_PATH;?>index.css" type="text/css" />
	<link rel="stylesheet" href="<?php echo CSS_PATH;?>menu.css" type="text/css" />
	<link rel="stylesheet" href="<?php echo CSS_PATH;?>menu.style.css" type="text/css" media="screen" />
	<link rel="stylesheet" href="<?php echo CSS_PATH;?>global.css" type="text/css" media="screen" />
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
						<li><a id="to_blog" href="<?php echo $blogUrl;?>" target="_blank">CEO博客</a>
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
										<li><a href="<?php echo $r['guid'];?><?php echo $blogUrle;?>" title="<?php echo $r['post_title'];?>"><?php echo $r['post_title'];?></a></li>
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
 <!--{photo.html}-->
    <div class="bann" style="width:1000px;margin-left:auto;margin-right:auto;">
        <!--flash begin-->
        <div id="flashBg">
            <div id="flashLine">
                <div id="flash">
                    <div id="flash1" class="item"  style="display:block;">
                        <img src="<?php echo IMG_PATH;?>banner/bann_ipc.jpg" width="1000" >
                    </div>
                    <div id="flash2" class="item"  >
                        <img src="<?php echo IMG_PATH;?>banner/bann_0605_en.jpg" width="1000" >
                    </div>
                    <div id="flash3" class="item"  >
                        <img src="<?php echo IMG_PATH;?>banner/bann_poe.jpg" width="1000" >
                    </div>
                    <div id="flash4" class="item"  >
                        <img src="<?php echo IMG_PATH;?>banner/bann0417b.jpg" width="1000" >
                    </div>
                    <div class="flash_bar">
                        <div class="dq" id="f1" onclick="changeflash(1)"></div>
                        <div class="no" id="f2" onclick="changeflash(2)"></div>
                        <div class="no" id="f3" onclick="changeflash(3)"></div>
						<div class="no" id="f4" onclick="changeflash(4)"></div>
                    </div>
                </div>
            </div>
        </div>
	</div>
        <script type="text/javascript">
            var currentindex=1;
            $("#flashBg").css("background-image",$("#flash1").attr("role"));
            function changeflash(i) {
                currentindex=i;
                for (j=1;j<=4;j++){
                    if (j==i)
                    {$("#flash"+j).fadeIn("normal").css({
                        "background-image": $("#flash"+j).attr("role")
                    });
                        $("#flash"+j).css("display","block");
                        $("#f"+j).removeClass();
                        $("#f"+j).addClass("dq");

                    }
                    else
                    {$("#flash"+j).css("display","none");
                        $("#f"+j).removeClass();
                        $("#f"+j).addClass("no");}
                }}
            function startAm(){
                timerID = setInterval("timer_tick()",5000);
            }
            function stopAm(){
                clearInterval(timerID);
            }
            function timer_tick() {
                currentindex=currentindex>=3?1:currentindex+1;
                changeflash(currentindex);}
            $(document).ready(function(){
                $(".flash_bar div").mouseover(function(){stopAm();}).mouseout(function(){startAm();});
                startAm();
            });
      </script>
<!--banner.html-->
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
	<style>
	#search_main{
		padding-top:10px;
	}
	#search{font-size:14px;}
	#search_c{
	width:400px;
	margin-left:auto;

	}
	#search .k{width:240px;}
	.k input {
	
	}
	#search_auto{border:1px solid #d4d4d4; position:absolute; display:none;margin-left:auto;margin-right:auto;}
	#search_auto li{background:#FFF; text-align:left;list-style:none;font-size:16px;}
	#search_auto li.cls{text-align:right;}
	#search_auto li a{display:block; padding:5px 6px; cursor:pointer; color:#666;}
	#search_auto li a:hover{background:#D8D8D8; text-decoration:none; color:#000;}
	.blank{
		width:100%;
		min-height:400px;
		margin-left:auto;
		margin-right:auto;
	}
	.s_title{
		text-align:center;
		font-size:24px;
		padding:5px;
	}

	p {font:14px/26px arial;}
	input{border:0;padding:0}
	.s_ipt_wr{width:250px;height:30px;display:inline-block;margin-right:10px;background:url(<?php echo APP_PATH;?>Search.gif) no-repeat;border:1px solid #d4d4d4;border-color:#d4d4d4 #d4d4d4 #d4d4d4 #d4d4d4 ;vertical-align:top}
	.s_ipt{width:250px;height:22px;font:16px/22px arial;margin:4px 0 0 7px;background:#fff;outline:none;-webkit-appearance:none}
	.s_btn_wr{width:122px;height:34px;display:inline-block;background:url(<?php echo APP_PATH;?>Search.gif) no-repeat -260px -50px;*position:relative;z-index:0;vertical-align:top}
	.s_btn{width:120px;height:32px;padding-top:2px\9;font-size:16px;background:#ddd url(<?php echo APP_PATH;?>Search.gif) 0 -50px;cursor:pointer;color:#d4d4d4;}
	.s_btn_h{background-position:-130px -50px;}
	#showmore{width:450px;;text-align:right;}
	</style>
<!--{index.html}-->
<div class="index_mains">
	<div  class="main_left">
		<ul id="tabs" class="index_font color_r">
			<li id="ctab1" class="current" onclick="cswitchTab('ctab1','ctabboxDiv1');this.blur();return false;">最新动态<b></b></li>
			<li id="ctab2" onclick="cswitchTab('ctab2','ctabboxDiv2');this.blur();return false;">Notice Board<b></b></li>
			<li id="ctab3" onclick="cswitchTab('ctab3','ctabboxDiv3');this.blur();return false;">最新说说<b></b></li>
			<li id="ctab4" onclick="cswitchTab('ctab4','ctabboxDiv4');this.blur();return false;">大事记<b></b></li>
			<li id="ctab5" onclick="cswitchTab('ctab5','ctabboxDiv5');this.blur();return false;">Live Demo<b></b></li>
			<li id="ctab6" onclick="cswitchTab('ctab6','ctabboxDiv6');this.blur();return false;">英语沙龙<b></b></li>
			<li id="ctab7" onclick="cswitchTab('ctab7','ctabboxDiv7');this.blur();return false;">通讯录<b></b></li>
			<li id="ctab8" onclick="cswitchTab('ctab8','ctabboxDiv8');this.blur();return false;">官方微博<b></b></li>
		</ul>
	</div>
<script type="text/javascript">
$(function() {
$("#newstwo").hide();
$("#showmorec").click(function(){
  $("#newstwo").toggle();
  var v=$("#showmorec").text();
  if(v=="显示更多"){
	  $("#showmorec").text("隐藏更多");
  }
  else{
	$("#showmorec").text("显示更多");
}
});
});


</script>
	<div class="index_rights">
					<div id="ctabboxDiv1" >
						<div class="index_news">最新动态</div>
						<div class="index_content">

						<ul>
							<?php $n=1; if(is_array($newsData)) foreach($newsData AS $r => $v) { ?>
							<li class="list"  id="images<?php echo($r+1)?>"><p class="index_article"><a href="<?php echo $v['url'];?>" target="_blank" title="<?php echo $v['title'];?>"><?php echo get_word($v['title'],55);?></a></p></li>
							<?php if($r==11){?>
							</div>
							<div id="newstwo" >
							<?php } ?>	
							<?php $n++;}unset($n); ?>
						</ul>
							<!--<p id="showmore" ><a href="javascript:;"  id="showmorec">显示更多</a></p>-->
						</div>
					</div>
					<div id="ctabboxDiv2" style="display:none;">
						<div class="index_news">Notice Board</div>
						<div class="index_content">
						<?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"content\" data=\"op=content&tag_md5=10137f9413363a10e00f79ffd77986f9&action=lists&catid=85&num=10&order=id+DESC&return=data7\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">编辑</a>";}$content_tag = pc_base::load_app_class("content_tag", "content");if (method_exists($content_tag, 'lists')) {$data7 = $content_tag->lists(array('catid'=>'85','order'=>'id DESC','limit'=>'10',));}?>
						<ul>
							<?php $n=1;if(is_array($data7)) foreach($data7 AS $v) { ?>
							<li class="list"><p class="index_article"><a href="<?php echo $v['url'];?>" target="_blank" title="<?php echo $v['title'];?>"><?php echo get_word($v['title'],55);?></a></p></li>
							<?php $n++;}unset($n); ?>
						</ul>
						<?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?>
						</div>
					</div>
					<div id="ctabboxDiv3" style="display:none;">
						<div class="index_news">最新说说</div>
						<div class="index_content">
						<ul>
							<?php $n=1;if(is_array($commentdata)) foreach($commentdata AS $vb) { ?>
							<li class="list"><p class="index_article"><a href="<?php echo $vb['url'];?>" target="_blank" title="<?php echo $vb['author'];?>发表"><?php echo get_word($vb['content'],55);?></a></p></li>
							<?php $n++;}unset($n); ?>
						</ul>
		
						</div>
					</div>
					<div id="ctabboxDiv4" style="display:none;">
						<div class="index_news">大事记</div>
						<div class="index_content">

						</div>
					</div>
					<div id="ctabboxDiv5" style="display:none;">
						<div class="index_news">Live Demo</div>
						<div class="index_content">
							<ul>
								<li class="list"><a href="http://162.17.56.121/" target="_blank">ZH-KA0A02-W</a></li>
								<li class="list"><a href="http://183.62.140.162:8088/" target="_blank">ZMD-KNS4-IASFZ4ZN</a></li>
							</ul>
						</div>
					</div>
					<div id="ctabboxDiv6" style="display:none;">
						<div class="index_news">英语沙龙</div>
					</div>
					<div id="ctabboxDiv7" style="display:none;">
						<div class="index_news">通讯录</div>
							<div class="index_content">
								<div id="search_c">
										<div id="search">
											<form action="index.php" method="GET">
													<input type="hidden" name="m" value="cdsearch"/>
													<input type="hidden" name="c" value="index"/>
													<input type="hidden" name="a" value="result"/>
													<span class="s_ipt_wr">
													<input id="kw" class="k s_ipt"  type="text"  name="k" autocomplete="off">
													</span>
													<span class="s_btn_wr">
													<input id="su" class="s_btn" type="submit" onmouseout="this.className='s_btn'" onmousedown="this.className='s_btn s_btn_h'" value="Zsearch" onfocus="blur()" >
													</span>
											</form>
										</div>
									<div id="search_auto"></div>
								</div>
							</div>
					</div>
					<div id="ctabboxDiv8" style="display:none;">
						<div class="index_news">官方微博</div>
						<div class="index_content">
							<a href="http://e.weibo.com/zmodo" target="_blank">Zmodo微博</a>
						</div>
					</div>

					<div id="weather">
						<div id="birthday">
						<p id="birthday_s">本月(<?php echo date('Y-m')?>)生日搒</p>
						<div id="quotation">
						</div>				
						</div>
						<iframe name="weather_inc" src="http://i.tianqi.com/index.php?c=code&id=7" style="border:solid 1px #d4d4d4" width="278" height="90" frameborder="0" marginwidth="0" marginheight="0" scrolling="no"></iframe>
					</div>
		</div>
</div>

<script type="text/javascript">

var t=setInterval(AutoScroll,2000);

 

function AutoScroll()

{

  var firstItem=$('#quotation li:first');

  var lastItem=$('#quotation li:last');

   firstItem.remove();

   firstItem.insertAfter(lastItem);

}

 

$(function(){

  $('#quotation').mouseover(function(){

  clearInterval(t);

  });

 

  $('#quotation').mouseout(function(){

  t=setInterval(AutoScroll,3000);

  });

});

$("#quotation").load("<?php echo APP_PATH;?>index.php?m=cdsearch&c=index&a=birthday"); 
</script>
			<script>

			$(function(){
			$('#search_auto').css({'width':$('#search input[name="k"]').width()+4});
			$('#search input[name="k"]').keyup(function(){
			$.post('index.php',{'k':$(this).val(),'m':'cdsearch',c:'index',a:'search_auto'},function(data){

			if(data=='0') $('#search_auto').html('').css('display','none');
			else $('#search_auto').html(data).css('display','block');});});
			});

			</script>

<?php include template("content","footer"); ?>
