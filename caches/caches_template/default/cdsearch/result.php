<?php defined('IN_PHPCMS') or exit('No permission resources.'); ?>
<style>
.show_se_re{
	width:100%;
}
.show_se_re li{	
	list-style:none;
	float:left;
	width:100%;
	padding-top:5px;
	padding-bottom:5px;
	
}
.show_se_re{
	margin-bottom:10px;
	overflow: hidden;
}
.show_se_re li span{
	width:20%;
	height:20px;
	float:left;
}
.show_se_re li:hover{
	background-color: #446cb3; 
}
.show_se_re li span {
	text-align:center;
}
.li01{
	color:#333333;
	border-bottom:1px solid #d4d4d4;
	height:20px;
}
.li11{
	color:#333333;
	background-color:#d4d4d4;
	border-bottom:1px solid #d4d4d4;
	height:20px;
}
.lim{
	width:25%;
	height:18px;
	float:left;
	font-size:18px;
	border-bottom:1px solid #d4d4d4;
}
.s_title{
	text-align:center;
	font-size:24px;
	padding:5px;
}
#search_main{
	width:100%;
	margin-left:auto;
	margin-right:auto;
	padding-top:10px;
	padding-bottom:10px;
}
#search{font-size:14px;margin-left:auto;margin-right:auto;}
#search_c{
	width:560px;
	margin-left:auto;margin-right:auto;
}
#search .k{width:410px;}
.k input {}
#search_auto{border:1px solid #d4d4d4; position:absolute; display:none;margin-left:auto;margin-right:auto;}
#search_auto li{background:#FFF; text-align:left;list-style:none;font-size:16px;}
#search_auto li.cls{text-align:right;}
#search_auto li a{display:block; padding:5px 6px; cursor:pointer; color:#666;}
#search_auto li a:hover{background:#D8D8D8; text-decoration:none; color:#000;}
.blank{
	width:100%;
	min-height:400px;
}
.s_title{
	text-align:center;
	font-size:24px;
	padding:5px;
}
p {font:14px/26px arial;}
input{border:0;padding:0}
.s_ipt_wr{width:418px;height:30px;display:inline-block;margin-right:10px;background:url(Search.gif) no-repeat;border:1px solid #d4d4d4;border-color:#d4d4d4 #d4d4d4 #d4d4d4 #d4d4d4 ;vertical-align:top}
.s_ipt{width:405px;height:22px;font:16px/22px arial;margin:4px 0 0 7px;background:#fff;outline:none;-webkit-appearance:none}
.s_btn_wr{width:122px;height:34px;display:inline-block;background:url(Search.gif) no-repeat -260px -50px;*position:relative;z-index:0;vertical-align:top}
.s_btn{width:120px;height:32px;padding-top:2px\9;font-size:16px;background:#ddd url(Search.gif) 0 -50px;cursor:pointer;color:#d4d4d4;}
.s_btn_h{background-position:-130px -50px;}.groupname{width:100%;overflow: hidden;}.groupname li:hover{	background: none repeat scroll 0% 0% rgb(232, 244, 252);}.groupname li {background:#FFF; text-align:left;list-style:none;font-size:16px;float:left;padding:5px;border:1px solid #d4d4d4;margin:2px;}.partname li {list-style:none;padding:5px;margin:5px;height:30px;width:120px;text-align:center;float:left;}.current{background-color:#3493F0;}a .current {color:#000;}
</style>
<script>
$(function(){
$('#search_auto').css({'width':$('#search input[name="k"]').width()+4});
$('#search input[name="k"]').keyup(function(){
$.get('index.php',{'k':$(this).val(),'m':'cdsearch',c:'index',a:'search_auto'},function(data){
if(data=='0') $('#search_auto').html('').css('display','none');
else $('#search_auto').html(data).css('display','block');
});
});
});
</script><script type="text/javascript">		sfHover = function() {		var sfEls = document.getElementById("navMenu").getElementsByTagName("LI");		for (var i=0; i<sfEls.length; i++) {		sfEls[i].onmouseover=function() {		this.className+=" sfhover";				}		sfEls[i].onmouseout=function() {		this.className=this.className.replace(new RegExp(" sfhover\\b"), "");		document.getElementById("main"+i).className = "current";		}		}		}		if (window.attachEvent) {		window.attachEvent("onload", sfHover);					}		</script><LINK media=all href="<?php echo CSS_PATH;?>nav.css" type=text/css rel=stylesheet>
<div class="main">

<div id="search_main" >
<div id="search_c">
<div class="s_title">搜索</div>
<div id="search">		<p style="text-align:right;"><a href="<?php echo APP_PATH;?>index.php?m=cdsearch&c=emailtools">导入邮箱</a></p>
		<form action="index.php" method="GET">
				<input type="hidden" name="m" value="cdsearch"/>
				<input type="hidden" name="c" value="index"/>
				<input type="hidden" name="a" value="result"/>
				<span class="s_ipt_wr">				
				<input id="kw" class="k s_ipt"  type="text"  name="k" autocomplete="off" value="<?php echo $keywords;?>">
				</span>
				<span class="s_btn_wr">
				<input id="su" class="s_btn" type="submit" onmouseout="this.className='s_btn'" onmousedown="this.className='s_btn s_btn_h'" value="Z search" onfocus="blur()" >
				</span>
		</form>
</div>
<div id="search_auto"></div>
</div>
</div><div id="navMenu"><UL class="menu1">	<?php $n=1; if(is_array($groupname)) foreach($groupname AS $r => $n) { ?>    <li class="navthis8"><a href='<?php echo $n['url'];?>' id="main<?php echo$r;?>" <?php if($n['cname']==$company){?> class="current"<?php }?> ><?php echo $n['cname'];?></a>        <ul <?php if(count($n['partname'])>3){?>style="WIDTH: 477px"<?php }?>>			<?php foreach($n['partname'] as $nn){?>            <li><a href="<?php echo $nn['url'];?>"><?php echo $nn['name'];?></a></li>			<?php }?>        </ul>    </li>	<?php $n++;}unset($n); ?>    </ul></div>
			<div class="show_se_re">
				<li class="lim">
				<span>姓名</span>
				<span>号码</span>
				<span>部门</span>
				<span>职称</span>
				<span>邮箱</span>
				<?php $n=1; if(is_array($search_data)) foreach($search_data AS $n => $r) { ?>
				<li class="li<?php echo print($n%2);?>"><span>&nbsp;<?php echo $r['name'];?></span>
				<span>&nbsp;<?php echo $r['SelfTel'];?></span>
				<span>&nbsp;<?php echo $r['ancestorname'];?>/<?php echo $r['partname'];?></span>
				<span>&nbsp;<?php echo $r['dutyname'];?></span>
				<span>&nbsp;<?php echo $r['email'];?></span></li>
				<?php $n++;}unset($n); ?>
			</div>

</div></div>
