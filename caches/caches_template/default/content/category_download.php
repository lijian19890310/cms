<?php defined('IN_PHPCMS') or exit('No permission resources.'); ?><?php include template("content","header"); ?>
<link href="<?php echo CSS_PATH;?>download.css" rel="stylesheet" type="text/css" />
<!--main-->
<style>
.index_main li {
	list-style: none;
}
.more{
	float:right;
	font-szie:!4px;
}
.title-1{
	font-size: 16px;
	border-bottom: 1px solid #d4d4d4;
	color: #f60;
	font-weight: bold;
	padding: 10px 0 10px 10px;
}
.title-2{
	font-size:16px;
	padding-top:10px;
}
</style>
<div class="index_main">
    <div class="main_lefts">
        <div class="box">
            <h5 class="title-2">下载分类</h5>
            <ul class="side_menu">
            	<?php $n=1;if(is_array(subcat($catid))) foreach(subcat($catid) AS $r) { ?>
            	<li><a href="<?php echo $r['url'];?>" title="<?php echo $r['catname'];?>"><?php echo $r['catname'];?></a></li>
            	<?php $n++;}unset($n); ?>
            </ul>
        </div>
    </div>
	<!--left_bar-->
	<div class="main_right">
    <div class="crumbs"><a href="<?php echo siteurl($siteid);?>">首页</a><span> > </span><?php echo catpos($catid);?></div>
        <?php $n=1;if(is_array(subcat($catid,0))) foreach(subcat($catid,0) AS $r) { ?>
        <?php $num++?>
        <div  class=" cat-area">
        		<h5 class="title-1"><a  href="<?php echo $r['url'];?>"><?php echo $r['catname'];?></a><a class="more" href="<?php echo $r['url'];?>">更多></a></h5>
             <div class="content">
                <ul class="article_show">
                <?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"content\" data=\"op=content&tag_md5=e7b4bfa1f84b39054bcbabbf0cd0dc9a&action=lists&catid=%24r%5Bcatid%5D&num=5&order=id+DESC&return=info\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">编辑</a>";}$content_tag = pc_base::load_app_class("content_tag", "content");if (method_exists($content_tag, 'lists')) {$info = $content_tag->lists(array('catid'=>$r[catid],'order'=>'id DESC','limit'=>'5',));}?>
             	<?php $n=1;if(is_array($info)) foreach($info AS $v) { ?>
                	<li><span class="rt"><?php echo date('m-d',$v['inputtime']);?></span><a target="_blank" href="<?php echo $v['url'];?>" title="<?php echo $v['title'];?>"><?php echo str_cut($v['title'],38);?></a></li>
              <?php $n++;}unset($n); ?>
              <?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?>
                </ul>
            </div>
        </div>
 		<?php $n++;}unset($n); ?>
		 <?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?>       
    </div>
    <!--right_bar-->

</div>
<?php include template("content","footer"); ?>
