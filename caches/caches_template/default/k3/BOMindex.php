<?php defined('IN_PHPCMS') or exit('No permission resources.'); ?>  <link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" />
  <script src="http://code.jquery.com/jquery-1.9.1.js"></script>
  <script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
  <script>
  $(function() {
    	$( "#type" ).buttonset();
	$( "#radio1").click(function(){
	  $("#search_auto").css("display","none");
	});
	$( "#radio2").click(function(){
	  $("#search_auto").css("display","none");

	});
	$( "#radio3").click(function(){
	  $("#search_auto").css("display","none");
	});
	$( "#radio4").click(function(){
	  $("#search_auto").css("display","none");

	});
  });
  </script>
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
<div class="s_title">BOM查询</div>
<div id="search">
		<form action="index.php" method="GET">
				<input type="hidden" name="m" value="k3"/>
				<input type="hidden" name="c" value="index"/>
				<input type="hidden" name="a" value="BOMresult"/>
				  <div id="type" style="height:40px;">
				    	<input type="radio" id="radio1" name="type" value="1" checked="checked"/><label for="radio1">BOM单号</label>
				    	<input type="radio" id="radio2" name="type" value="2"  /><label for="radio2">物料代码</label>
					<input type="radio" id="radio3" name="type" value="3"  /><label for="radio3">BOM分类</label>
				  </div>
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
</div>
</div>
<script>
$(function(){
$('#search_auto').css({'width':$('#search input[name="k"]').width()+4});
$('#search input[name="k"]').keyup(function(){
$.get('index.php',{m:'k3',c:'index',a:'search_auto_bom',k:encodeURIComponent($("#kw").val()),type:$('input[name="type"]:checked').val()},function(data){
if(data=='0') $('#search_auto').html('').css('display','none');
else $('#search_auto').html(data).css('display','block');});});
});

</script>



