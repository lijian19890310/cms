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
    	<div class="crumbs"><a href="<?php echo siteurl($siteid);?>">首页</a></div>
        <div id="Article">
        	<div class="title_show"><?php echo$datas[title]?></div>
		<div class="line" style="text-align:center"><?php echo date('Y-m-d h:i:s',$datas[udate])?>&nbsp;&nbsp;&nbsp;来源：www.zmodo.com.cn&nbsp;&nbsp;&nbsp;</div>
		<div class="article_content"><?php echo$datas[content]?></div>
      </div>
</div>

<?php include template("content","footer"); ?>
