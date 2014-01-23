<?php defined('IN_PHPCMS') or exit('No permission resources.'); ?>
<style>
#search_main{
	width:100%;
	margin-left:auto;
	margin-right:auto;
	padding-top:10px;
}

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
.branchcompany{margin-top:10px;overflow: hidden;border-top:1px solid #d4d4d4;}
.branchcompanyl {width:150px;float:left;border-right:1px solid #d4d4d4;}
.branchcompanyl ul li {list-style:none;padding-top:10px;font-size:13px;width:150px;height:30px;float:left;text-align:center;border-bottom:1px solid #d4d4d4;}
.branchcompanyr {width:618px;min-height:288px;float:left;background:#E8F4FC;}
.branchcompanyr ul li {list-style:none;padding:5px;margin:5px;height:30px;width:120px;text-align:center;float:left;}
.current{border-left:1px solid #d4d4d4;border-right:0px solid #d4d4d4;background:#E8F4FC;}.emailform{width:400px;margin-left:auto;margin-right:auto;}
</style><script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js" type="text/javascript"></script><link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" type="text/css" /> <script>$(function() {   $("#name").autocomplete({     minLength:1, //表示输入多少个字才出现自动补全框    @YPHP     source:function(request,response){      $.ajax(       {        url: "<?php echo $autoUrl;?>"+"&name="+ $("#name").attr('value'),         dataType: "json",         data: request,         success:function(data){         response(data);        }       }      );     }    });});</script>
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
<div class="s_title">导入邮箱</div>		<div class="emailform">
		<form action="index.php" method="GET" style="margin-left:auto;margin-right:auto;">
				<input type="hidden" name="m" value="cdsearch"/>
				<input type="hidden" name="c" value="emailtools"/>
				<input type="hidden" name="a" value="import"/>
				<input type="text" id="name" name="name" autocomplete="off" 				value="<?php echo $name;?>" onfocus="if(value=='输入中英文名') {value='';}this.style.color='#000';" onblur="if (value=='') {value='输入中英文名';this.style.color='#999';}"/>				<input  type="text"  name="email" autocomplete="off" 				value="<?php echo $email;?>" onfocus="if(value=='输入邮箱地址') {value='';}this.style.color='#000';" onblur="if (value=='') {value='输入邮箱地址';this.style.color='#999';}"/>
				<input  type="submit"  value="导入" name="submit" >
		</form>		</div>
</div>
</div>
</div></div>



