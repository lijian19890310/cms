<?php defined('IN_PHPCMS') or exit('No permission resources.'); ?><?php include template("content","header"); ?>
<style>
.title_show{ text-align:center;font-size:22px;font-weight:bold;}
.summary{width:80%;margin-left:auto;margin-right:auto;background-color: #F6FAFD;
border: 1px solid #DCDDDD;
font-size: 14px;
line-height: 23px;
padding: 10px;
margin-bottom:10px;
text-align: justify;
text-indent: 2em;}
.article_content{font-size:16px;}
</style>
<div class="index_main">
    	<div class="crumbs"><a href="<?php echo siteurl($siteid);?>">首页</a><span> > </span><?php echo catpos($catid);?> 正文</div>
        <div id="Article">
        	<div class="title_show"><?php echo $title;?>
			</div>
	<div class="line" style="text-align:center"><?php echo $inputtime;?>&nbsp;&nbsp;&nbsp;来源：<?php if(empty($copyfrom)) { ?>Zmodo Zone<?php } else { ?><?php echo $copyfrom;?><?php } ?>&nbsp;&nbsp;&nbsp;评论：<a href="#comment_iframe" id="comment">0</a> 点击：<span id="hits"></span></div>
			<?php if($description) { ?><div class="summary" ><?php echo $description;?></div><?php } ?>
			<div class="article_content">
			<?php if($allow_visitor==1) { ?>
				<?php echo $content;?>
				<!--内容关联投票-->
				<?php if($voteid) { ?><script language="javascript" src="<?php echo APP_PATH;?>index.php?m=vote&c=index&a=show&action=js&subjectid=<?php echo $voteid;?>&type=2"></script><?php } ?>
                
			<?php } else { ?>
				<CENTER><a href="<?php echo APP_PATH;?>index.php?m=content&c=readpoint&allow_visitor=<?php echo $allow_visitor;?>"><font color="red">阅读此信息需要您支付 <B><I><?php echo $readpoint;?> <?php if($paytype) { ?>元<?php } else { ?>点<?php } ?></I></B>，点击这里支付</font></a></CENTER>
			<?php } ?>
			</div>
<?php if($titles) { ?>
<fieldset>
	<legend class="f14">本文导航</legend><ul class="list blue row-2">
<?php $n=1;if(is_array($titles)) foreach($titles AS $r) { ?>
	<li><?php echo $n;?>、<a href="<?php echo $r['url'];?>"><?php echo $r['title'];?></a></li>
<?php $n++;}unset($n); ?>
</ul>
</fieldset>
<?php } ?>
			<div id="pages" class="text-c"><?php echo $pages;?></div>
            <p class="f14" style="padding-bottom:5px;padding-top:5px;">
                <span style="float:left"><strong>上一篇：</strong><a href="<?php echo $previous_page['url'];?>"><?php echo $previous_page['title'];?></a></span>
                <span style="float:right"><strong>下一篇：</strong><a href="<?php echo $next_page['url'];?>"><?php echo $next_page['title'];?></a></span>
            </p>
			<p style="padding-bottom:5px">&nbsp;</p>
      </div>
      <?php if($allow_comment && module_exists('comment')) { ?>
      <iframe src="<?php echo APP_PATH;?>index.php?m=comment&c=index&a=init&commentid=<?php echo id_encode("content_$catid",$id,$siteid);?>&iframe=1" width="100%" height="100%" id="comment_iframe" frameborder="0" scrolling="no" onLoad="iFrameHeight()"></iframe>
      <?php } ?>
  </div>
<script type="text/javascript">
<!--
	function show_ajax(obj) {
		var keywords = $(obj).text();
		var offset = $(obj).offset();
		var jsonitem = '';
		$.getJSON("<?php echo APP_PATH;?>index.php?m=content&c=index&a=json_list&type=keyword&modelid=<?php echo $modelid;?>&id=<?php echo $id;?>&keywords="+encodeURIComponent(keywords),
				function(data){
				var j = 1;
				var string = "<div class='point key-float'><div style='position:relative'><div class='arro'></div>";
				string += "<a href='JavaScript:;' onclick='$(this).parent().parent().remove();' hidefocus='true' class='close'><span>关闭</span></a><div class='contents f12'>";
				if(data!=0) {
				  $.each(data, function(i,item){
					j = i+1;
					jsonitem += "<a href='"+item.url+"' target='_blank'>"+j+"、"+item.title+"</a><BR>";
					
				  });
					string += jsonitem;
				} else {
					string += '没有找到相关的信息！';
				}
					string += "</div><span class='o1'></span><span class='o2'></span><span class='o3'></span><span class='o4'></span></div></div>";		
					$(obj).after(string);
					$('.key-float').mouseover(
						function (){
							$(this).siblings().css({"z-index":0})
							$(this).css({"z-index":1001});
						}
					)
					$(obj).next().css({ "left": +offset.left-100, "top": +offset.top+$(obj).height()+12});
				});
	}

	function add_favorite(title) {
		$.getJSON('<?php echo APP_PATH;?>api.php?op=add_favorite&title='+encodeURIComponent(title)+'&url='+encodeURIComponent(location.href)+'&'+Math.random()+'&callback=?', function(data){
			if(data.status==1)	{
				$("#favorite").html('收藏成功');
			} else {
				alert('请登录');
			}
		});
	}

$(function(){
  $('#Article .content img').LoadImage(true, 660, 660,'<?php echo IMG_PATH;?>s_nopic.gif');    
})
//-->
</script>
<script type="text/javascript" language="javascript"> 
function iFrameHeight() { 
var ifm= document.getElementById("comment_iframe"); 
var subWeb = document.frames ? document.frames["comment_iframe"].document : ifm.contentDocument; 
if(ifm != null && subWeb != null) { 
ifm.height = subWeb.body.scrollHeight; 
} 
} 
</script> 
<script language="JavaScript" src="<?php echo APP_PATH;?>api.php?op=count&id=<?php echo $id;?>&modelid=<?php echo $modelid;?>"></script>
<?php include template("content","footer"); ?>