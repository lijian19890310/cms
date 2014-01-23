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
<link href="<?php echo CSS_PATH;?>download.css" rel="stylesheet" type="text/css" />
<div class="main">
    <!--left_bar-->
    <div class="col-left">
        <div class="crumbs"><a href="<?php echo siteurl($siteid);?>">首页</a><span> &gt; </span><?php echo catpos($catid);?><?php echo $title;?></div>
        <div class="box boxsbg">
            <div class="contents">

                <div class="title_show">
                   <?php echo $title;?>
                </div>
                <div class="down_intro"><?php echo $content;?></div>
                <h5 class="tit">下载地址(更新时间：<?php echo $updatetime;?>)</h5>
                <div class="down_address divl wrap">
                    <ul class="l xz_a wrap blue">
                        <?php $n=1;if(is_array($downfile)) foreach($downfile AS $r) { ?>
                        <li><?php echo $r;?></li>
                        <?php $n++;}unset($n); ?>
                        <?php $n=1;if(is_array($downfiles)) foreach($downfiles AS $r) { ?>
                        <li><?php echo $r;?></li>
                        <?php $n++;}unset($n); ?>
                    </ul>
                    <div class="ad"><script language="javascript" src="<?php echo APP_PATH;?>index.php?m=poster&c=index&a=show_poster&id=12"></script></div>
                </div>
            </div>
        </div>
        <div class="bk10"></div>
      <div class="Article-Tool">

	  </div>
        <!--评论-->
        <div class="bk10"></div>
        <?php if($allow_comment && module_exists('comment')) { ?>
        <iframe src="<?php echo APP_PATH;?>index.php?m=comment&c=index&a=init&commentid=<?php echo id_encode("content_$catid",$id,$siteid);?>&iframe=1" width="100%" height="100%" id="comment_iframe" frameborder="0" scrolling="no" onLoad="iFrameHeight()"></iframe>
        <?php } ?>
    </div>
    <!--right_bar-->
</div>

<div class="bk10"></div>
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
