<?php defined('IN_PHPCMS') or exit('No permission resources.'); ?>
<?php include template("content","header"); ?>
<link href="<?php echo CSS_PATH;?>default_blue.css" rel="stylesheet" type="text/css" />
<style>
.mains{width:1000px;margin-left:auto;margin-right:auto;}
</style>
<?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"comment\" data=\"op=comment&tag_md5=f753c25f98ef1b8d7a9599e794471e13&action=get_comment&commentid=%24commentid\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">编辑</a>";}$comment_tag = pc_base::load_app_class("comment_tag", "comment");if (method_exists($comment_tag, 'get_comment')) {$data = $comment_tag->get_comment(array('commentid'=>$commentid,'limit'=>'20',));}?>
<?php $comment = $data;?>
<?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?>
<div class="mains">
        <h2 class="comment-title blue"><a href="<?php if($comment[url]) { ?><?php echo $comment['url'];?><?php } else { ?><?php echo $url;?><?php } ?>"><?php if($comment[title]) { ?><?php echo $comment['title'];?><?php } else { ?><?php echo $title;?><?php } ?></a> <a href="#comment" class="f12 fn"><font color="#FF0000"></font></a></h2>
        <div class="comment_button"><a href="<?php echo APP_PATH;?>index.php?m=comment&c=index&a=init&commentid=<?php echo $commentid;?>&title=<?php echo urlencode(($comment[title] ? $comment[title] : $title));?>&url=<?php echo urlencode(($comment[url] ? $comment[url] : $url));?>&hot=0"<?php if(empty($hot)) { ?> class="on"<?php } ?>>最新</a> <a href="<?php echo APP_PATH;?>index.php?m=comment&c=index&a=init&commentid=<?php echo $commentid;?>&title=<?php echo urlencode(($comment[title] ? $comment[title] : $title));?>&url=<?php echo urlencode(($comment[url] ? $comment[url] : $url));?>&hot=1"<?php if($hot) { ?> class="on"<?php } ?>>最热</a></div> 	
	<div class="col-left">
       <div class="comment">
       <h4 class="f14">评论列表<span class="f12 fn">（评论 <font color="red"><?php if($comment[total]) { ?><?php echo $comment['total'];?><?php } else { ?>0<?php } ?></font>）</span></h4>
<?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"comment\" data=\"op=comment&tag_md5=71fd9313c9b343e002e68467d3174568&action=lists&commentid=%24commentid&siteid=%24siteid&page=%24_GET%5Bpage%5D&hot=%24hot&num=20\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">编辑</a>";}$comment_tag = pc_base::load_app_class("comment_tag", "comment");if (method_exists($comment_tag, 'lists')) {$pagesize = 20;$page = intval($_GET[page]) ? intval($_GET[page]) : 1;if($page<=0){$page=1;}$offset = ($page - 1) * $pagesize;$comment_total = $comment_tag->count(array('commentid'=>$commentid,'siteid'=>$siteid,'hot'=>$hot,'limit'=>$offset.",".$pagesize,'action'=>'lists',));$pages = pages($comment_total, $page, $pagesize, $urlrule);$data = $comment_tag->lists(array('commentid'=>$commentid,'siteid'=>$siteid,'hot'=>$hot,'limit'=>$offset.",".$pagesize,'action'=>'lists',));}?>
<?php $n=1;if(is_array($data)) foreach($data AS $r) { ?>
    <h5 class="title fn"> <font color="#FF0000"><?php echo format::date($r[creat_at], 1);?></font> <?php if($r[userid]) { ?><?php echo get_nickname($r[userid]);?><?php } else { ?><?php echo $r['username'];?><?php } ?> </h5>
    <div class="content"><?php echo stripcslashes($r[content]);?>
	<div class="rt"><a href="javascript:void(0)" onclick="reply(<?php echo $r['id'];?>, '<?php echo $commentid;?>')">回复</a>  <a href="javascript:void(0)" onclick="support(<?php echo $r['id'];?>, '<?php echo $commentid;?>')">支持</a>（<font id="support_<?php echo $r['id'];?>"><?php echo $r['support'];?></font>）
	</div>
	<div id="reply_<?php echo $r['id'];?>" style="display:none"></div>
	</div>
	
  <div class="bk30 hr mb8"></div>
  <?php $n++;}unset($n); ?>
 
 
</div>
 <div id="pages" class="text-r"><?php echo $pages;?></div>
 <?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?>
<div class="bk10"></div><div class="comment-form">
<form action="<?php echo APP_PATH;?>index.php?m=comment&c=index&a=post&commentid=<?php echo $commentid;?>" method="post">
<input type="hidden" name="title" value="<?php echo urlencode(($comment[title] ? $comment[title] : $title));?>">
<input type="hidden" name="url" value="<?php echo urlencode(($comment[url] ? $comment[url] : $url));?>">
      <a name="comment"></a>
      	<h5><strong>我来说两句</strong></h5>
        
        <textarea rows="8" cols="80" name="content"></textarea><br>
		<?php if($setting[code]) { ?>
		
		  <label>验证码：<input type="text" name="code"  class="input-text" id="yzmText" onfocus="var offset = $(this).offset();$('#yzm').css({'left': +offset.left-8, 'top': +offset.top-$('#yzm').height()});$('#yzm').show();$('#yzmText').data('hide', 1)" onblur='$("#yzmText").data("hide", 0);setTimeout("hide_code()", 3000)' /></label>
		  <div id="yzm" class="yzm"><?php echo form::checkcode();?><br />点击图片更换</a></div>
        <div class="bk10"></div>
		<?php } ?>
        <div class="btn"><input type="submit" value="发表评论" /></div>&nbsp;&nbsp;&nbsp;&nbsp;<?php if($userid) { ?><?php echo get_nickname();?> <a href="<?php echo APP_PATH;?>index.php?m=member&c=index&a=logout&forward=<?php echo urlencode(get_url());?>">退出</a><?php } else { ?><a href="<?php echo APP_PATH;?>index.php?m=member&c=index&a=login&forward=<?php echo urlencode(get_url());?>" class="blue">登录</a><span> | </span><a href="<?php echo APP_PATH;?>index.php?m=member&c=index&a=register" class="blue">注册</a>  <?php if(!$setting[guest]) { ?><span style="color:red">需要登陆才可发布评论</span><?php } ?><?php } ?>
	</form>
<style type="text/css">
.look-content{ padding:10px;border:1px dashed #ffbf7a; background:#fffced; margin:10px auto}
.look-content ul{ color:#666}
</style>

      </div>
  </div>
</div>
<script type="text/javascript">
function support(id, commentid) {
	$.getJSON('<?php echo APP_PATH;?>index.php?m=comment&c=index&a=support&format=jsonp&commentid='+commentid+'&id='+id+'&callback=?', function(data){
		if(data.status == 1) {
			$('#support_'+id).html(parseInt($('#support_'+id).html())+1);
		} else {
			alert(data.msg);
		}
	});
}

function reply(id,commentid) {
	var str = '<form action="<?php echo APP_PATH;?>index.php?m=comment&c=index&a=post&commentid='+commentid+'&id='+id+'" method="post"><textarea rows="10" style="width:100%" name="content"></textarea><?php if($setting[code]) { ?><label>验证码：<input type="text" name="code"  class="input-text" onfocus="var offset = $(this).offset();$(\'#yzm\').css({\'left\': +offset.left-8, \'top\': +offset.top-$(\'#yzm\').height()});$(\'#yzm\').show();$(\'#yzmText\').data(\'hide\', 1)" onblur=\'$("#yzmText").data("hide", 0);setTimeout("hide_code()", 3000)\' /></label><?php } ?>  <div class="btn"><input type="submit" value="发表评论" /></div>&nbsp;&nbsp;&nbsp;&nbsp;<?php if($userid) { ?><?php echo get_nickname();?> <a href="<?php echo APP_PATH;?>index.php?m=member&c=index&a=logout&forward=<?php echo urlencode(get_url());?>">退出</a><?php } else { ?><a href="<?php echo APP_PATH;?>index.php?m=member&c=index&a=login&forward=<?php echo urlencode(get_url());?>" class="blue">登录</a> | <a href="<?php echo APP_PATH;?>index.php?m=member&c=index&a=register" class="blue">注册</a>  <?php if(!$setting[guest]) { ?><span style="color:red">需要登陆才可发布评论</span><?php } ?><?php } ?></form>';
	$('#reply_'+id).html(str).toggle();
}

function hide_code() {
	if ($('#yzmText').data('hide')==0) {
		$('#yzm').hide();
	}
}
</script>
<?php include template("content","footer"); ?>