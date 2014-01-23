<?php defined('IN_PHPCMS') or exit('No permission resources.'); ?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
<link href="<?php echo CSS_PATH;?>zhanshi.css" rel="stylesheet" type="text/css" />
<script src="<?php echo JS_PATH;?>jquery.min.js"></script>
<script type="text/javascript" src="<?php echo JS_PATH;?>bxCarousel.js"></script>
<script type="text/javascript" src="<?php echo JS_PATH;?>jquery.SuperSlide.js"></script>
<script type="text/javascript">
$(function(){
	$('.piclist').bxCarousel({
		display_num: 4, 
		move: 4,
		auto_interval:10000,
		margin: 15,
		auto: true, 
		controls: false,
		auto_hover: true

	});
});
</script>
</head>
<body>
<div class="cntbox">
	<div class="leftbox">
  	<div class="part1">
    		<div class="weatherbox">
        	<div class="time" >
			<div id="showClock"></div>
			<script language="javascript" type="text/javascript">
			 function showTime()
			 {
			  var date=new Date();
			  var year=date.getYear();
			  var month=date.getMonth()+1;
			  var day=date.getDate()
			  var hours=date.getHours();
			  var mi=date.getMinutes();
			  var se=date.getSeconds();
			  
			  var week=date.getDay();
			  
			  
			  if(hours<=9)
			  hours="0"+hours;
			  if(mi<=9)
			  mi="0"+mi;
			  if(se<=9)
			  se="0"+se;
			  show=hours+":"+mi;
			  showClock.innerHTML=show;
			  setTimeout("showTime()",1000);
			  }
			 showTime();
			</script>
		</div>
          <div class="weather">
          	<div class="date">
            	<p class="yl"><?php echo date('Y/m/d')?></p>
              <p class="nl"><?php echo$nlDate?></p>
            </div>
            <div class="wea_cnt">
            	<p><?php echo $weatherData->weatherinfo->fx1?></p>
              <p><?php echo $weatherData->weatherinfo->temp1?></p>
              <p><?php echo $weatherData->weatherinfo->weather1?></p>
            </div>
          </div>
        </div>
		<div class="birthday">
		<div class="picMarquee-left ">
			<div class="showbox" style="">
				 <div class="bx_container">
					<ul class="piclist">
						<?php echo$birthday?>
					</ul>
				</div>
			</div>
		</div>	
		</div>
    </div>
    	<div class="part2">
		<div class="cnt">
			<div class="picMarquee-top">
					<div id="ticker">
						<ul>
						<?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"get\" data=\"op=get&tag_md5=40d1cbd96ba89e73abbb51e1ac4e87e9&sql=SELECT+t2.content%2Ct1.title%2Ct1.inputtime+FROM+v9_news+t1%2Cv9_news_data+t2+where++t1.id%3Dt2.id+and+t1.catid+in+%28%276%27%2C%2717%27%29+order+by+t1.id+DESC&num=5&dbsource=cms&return=data\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">编辑</a>";}pc_base::load_sys_class("get_model", "model", 0);$get_db = new get_model(array (
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
), 'cms');$r = $get_db->sql_query("SELECT t2.content,t1.title,t1.inputtime FROM v9_news t1,v9_news_data t2 where  t1.id=t2.id and t1.catid in ('6','17') order by t1.id DESC LIMIT 5");while(($s = $get_db->fetch_next()) != false) {$a[] = $s;}$data = $a;unset($a);?>								
							<?php $n=1;if(is_array($data)) foreach($data AS $r) { ?>
							    	<h1><?php echo $r['title'];?> </h1>
								<div class="titbar"><?php echo date('Y-m-d h:i:s',$r['inputtime'])?>   来源：Zmodo Zone</div>
								<div class="news_cnt" ><?php echo $r['content'];?></div> 
							<?php $n++;}unset($n); ?>
						<?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?>
						</ul>
					</div>
			</div>
		</div>
      		<div class="news_tips">zmodo’s <span>NEWS</span></div>
    	</div>
  </div>
  <div class="rightbox">
	<div style="width:780px;height:860px;overflow:hidden;">
	<div id="quotation">
	<ul>
		<?php $n=1; if(is_array($blogData)) foreach($blogData AS $n => $vr) { ?>
			<?php $n=1;if(is_array($vr)) foreach($vr AS $r) { ?>
			<li id="blog">
				<div  class="word">
			  		<h1><?php echo $r['t'];?></h1>
					<div class="tibar">发表于 <?php echo $r['d'];?></div>
					<p><?php echo $r['w'];?></p>
				</div>
				<div class="bd1">
				<ul class="sort<?php echo count($r['m'])>6?6:count($r['m'])?>">
					<?php $n=1; if(is_array($r['m'])) foreach($r['m'] AS $k => $n) { ?>
						<?php if($k>5){break;}?>
						<li><center><img src="<?php echo $n;?>"></center></li>
					<?php $n++;}unset($n); ?>
					</ul>
				</div>
			</li>
			<?php $n++;}unset($n); ?>
		<?php $n++;}unset($n); ?>
	</ul>
	</div>
	</div>
	
	
    <div class="blog_tips">Kevin’s <span>BLOG</span></div>
  </div>
</div>
	<script type="text/javascript">
	function AutoScroll(obj){
		$(obj).find("ul:first").animate({
			marginTop:"-852px"
		},500,function(){
			$(this).css({marginTop:"0px"}).find("li:first").appendTo(this);
		});
	}
	$(document).ready(function(){
		setInterval('AutoScroll("#quotation")',15000);
	});
	</script>
    	<script type="text/javascript">
	  $(function() {
	  
		//cache the ticker
		var ticker = $("#ticker");
		  
		//wrap dt:dd pairs in divs
		ticker.children().filter("dt").each(function() {
		  
		  var dt = $(this),
		    container = $("<div>");
		  
		  dt.next().appendTo(container);
		  dt.prependTo(container);
		  
		  container.appendTo(ticker);
		});
				
		//hide the scrollbar
		//ticker.css("overflow", "hidden");
		
		//animator function
		function animator(currentItem) {
		    
		  //work out new anim duration
		  var distance = currentItem.height();
			duration = (distance + parseInt(currentItem.css("marginTop"))) / 0.025;

		  //animate the first child of the ticker
		  currentItem.animate({ marginTop: -distance }, duration, "linear", function() {
		    
			//move current item to the bottom
			currentItem.appendTo(currentItem.parent()).css("marginTop", 0);

			//recurse
			animator(currentItem.parent().children(":first"));
		  }); 
		};
		
		//start the ticker
		animator(ticker.children(":first"));
				
		//set mouseenter
		ticker.mouseenter(function() {
		  
		  //stop current animation
		  ticker.children().stop();
		  
		});
		
		//set mouseleave
		ticker.mouseleave(function() {
		          
          //resume animation
		  animator(ticker.children(":first"));
		  
		});
	  });
    </script>



</body>
</html>
