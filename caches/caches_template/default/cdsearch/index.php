<?php defined('IN_PHPCMS') or exit('No permission resources.'); ?>
<style>
#search_main{
	width:100%;
	margin-left:auto;
	margin-right:auto;
	padding-top:10px;
}
#search{font-size:14px;margin-left:auto;margin-right:auto;}
#search_c{
width:560px;
margin-left:auto;margin-right:auto;
}
#search .k{width:410px;}
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
</style>

<style>

p {font:14px/26px arial;}
input{border:0;padding:0}
.s_ipt_wr{width:418px;height:30px;display:inline-block;margin-right:10px;background:url(Search.gif) no-repeat;border:1px solid #d4d4d4;border-color:#d4d4d4 #d4d4d4 #d4d4d4 #d4d4d4 ;vertical-align:top}
.s_ipt{width:405px;height:22px;font:16px/22px arial;margin:4px 0 0 7px;background:#fff;outline:none;-webkit-appearance:none}
.s_btn_wr{width:122px;height:34px;display:inline-block;background:url(Search.gif) no-repeat -260px -50px;*position:relative;z-index:0;vertical-align:top}
.s_btn{width:120px;height:32px;padding-top:2px\9;font-size:16px;background:#ddd url(Search.gif) 0 -50px;cursor:pointer;color:#d4d4d4;}
.s_btn_h{background-position:-130px -50px;}
.branchcompany{margin-top:10px;overflow: hidden;border-top:1px solid #d4d4d4;}
.branchcompanyl {width:150px;float:left;border-right:1px solid #d4d4d4;}
.branchcompanyl ul li {list-style:none;padding-top:10px;font-size:13px;width:150px;height:30px;float:left;text-align:center;border-bottom:1px solid #d4d4d4;}
.branchcompanyr {width:618px;min-height:288px;float:left;background:#E8F4FC;}
.branchcompanyr ul li {list-style:none;padding:5px;margin:5px;height:30px;width:120px;text-align:center;float:left;}
.current{border-left:1px solid #d4d4d4;border-right:0px solid #d4d4d4;background:#E8F4FC;}
</style>

<div class="main">
<div class="main_lefts">
            <div class="box">
                <h5 class="title-2">协同办公</h5>
                <ul class="side_menu">
				<?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"content\" data=\"op=content&tag_md5=3ea75545ffe617de68814ca23c187f42&action=category&catid=60&num=10&siteid=%24siteid&order=listorder+ASC&return=data5\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">编辑</a>";}$content_tag = pc_base::load_app_class("content_tag", "content");if (method_exists($content_tag, 'category')) {$data5 = $content_tag->category(array('catid'=>'60','siteid'=>$siteid,'order'=>'listorder ASC','limit'=>'10',));}?>
					<?php $n=1; if(is_array($data5)) foreach($data5 AS $k => $v) { ?>
							 <li><a href="<?php echo $v['url'];?>"><?php echo $v['catname'];?></a></li>
					<?php $n++;}unset($n); ?>
				<?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?>
 </ul>
                </div>
</div>
<div class="main_right">
<div id="search_main">
<div id="search_c">
<div class="s_title">搜索</div><p style="text-align:right;"><a href="<?php echo APP_PATH;?>index.php?m=cdsearch&c=emailtools">导入邮箱</a></p>
<div id="search">
		<form action="index.php" method="GET">
				<input type="hidden" name="m" value="cdsearch"/>
				<input type="hidden" name="c" value="index"/>
				<input type="hidden" name="a" value="result"/>
				<span class="s_ipt_wr">
				<input id="kw" class="k s_ipt"  type="text"  name="k" autocomplete="off">
				</span>
				<span class="s_btn_wr">
				<input id="su" class="s_btn" type="submit" onmouseout="this.className='s_btn'" onmousedown="this.className='s_btn s_btn_h'" value="Z search" onfocus="blur()" >
				</span>
		</form>
</div>

<div id="search_auto"></div>
</div>
</div>
	<div class="branchcompany">
		<div class="branchcompanyl">
			<ul>
			<?php $n=1; if(is_array($groupname)) foreach($groupname AS $r => $n) { ?>
			<li id="<?php echo'ctabs'.($r+1);?>"  <?php if($r==0){?>class="current"<?php }?> 
			onmouseover="cswitchTab('<?php echo'ctabs'.($r+1);?>','<?php echo'ctabboxDivs'.($r+1);?>');this.blur();return false;" >
			<a href="<?php echo $n['url'];?>"><?php echo $n['cname'];?></a></li>
			<?php $n++;}unset($n); ?>
			</ul>
		</div>
		<div class="branchcompanyr">
			<?php $n=1; if(is_array($groupname)) foreach($groupname AS $r => $n) { ?>
			<ul id="<?php echo'ctabboxDivs'.($r+1);?>"  <?php if($r!=0){?>style="display:none;"<?php }?>>
		
				<?php foreach($n['partname']	as	$ns){?>
				<li><a href="<?php echo$ns['url'];?>"><?php echo$ns['name'];?></a></li>
				<?php }?>
		
			</ul>
			<?php $n++;}unset($n); ?>
		</div>
	</div>
</div>
</div>
<script>
function cswitchTab(ctabID, ctabboxDivID) {
		for (i = 1; i < 9; i++) {
			if ("ctabs" + i == ctabID) {
				document.getElementById(ctabID).className = "current";
			} else {
				document.getElementById("ctabs" + i).className = "";
			}
			if ("ctabboxDivs" + i == ctabboxDivID) {
				document.getElementById(ctabboxDivID).style.display = "";
			} else {
				document.getElementById("ctabboxDivs" + i).style.display ="none";
			}
		}
	}
$(function(){
$('#search_auto').css({'width':$('#search input[name="k"]').width()+4});
$('#search input[name="k"]').keyup(function(){
$.get('index.php',{'k':$(this).val(),'m':'cdsearch',c:'index',a:'search_auto'},function(data){
if(data=='0') $('#search_auto').html('').css('display','none');
else $('#search_auto').html(data).css('display','block');});});
$('#search input[name="k"]').keydown(function (event) {//上下键获取焦点   
            var key = event.keyCode;  

		  
            if ($.trim($(this).val()).length == 0)  
                return;  
  
            search_show.show();  
  
            if (key == 38) { /*向上按钮*/  
                index--;  
                if (index == 0) index = 4; //到顶了，   
            } else if (key == 40) {/*向下按钮*/  
                index++;  
                if (index == 1) index = 1; //到底了   
            }  
            var li = search_show.find("li:eq(" + index + ")");  
  
            li.css("background", "#E8F4FC").siblings().css("background", "");  
            type = li.attr("class");  
        }); 

});
</script>



