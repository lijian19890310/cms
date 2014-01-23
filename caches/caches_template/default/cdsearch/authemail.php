<?php defined('IN_PHPCMS') or exit('No permission resources.'); ?><style>
#search_main{
	width:100%;
	margin-left:auto;
	margin-right:auto;	padding-top:10px;
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
.success{text-align:center;font-size:16px;height:40px;}.error{text-align:center;font-size:16px;height:40px;}
.resend{text-align:center;font-size:16px;height:40px;}
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
<div class="s_title">邮件验证</div>	<?php if($success){?>
		<div class="success">			<?php echo $success;?>		</div>	<?php }?>	<?php if($error){?>	<div class="error">	<?php echo $error;?>	</div>	<?php }?>
</div>
</div>
</div></div>