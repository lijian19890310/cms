<?php defined('IN_PHPCMS') or exit('No permission resources.'); ?><?php include template("content","header"); ?>
<div class="index_main">
    <div class="crumbs"><a href="<?php echo siteurl($siteid);?>">首页</a><span> &gt; </span><?php echo catpos($catid);?></div>

        <?php $n=1;if(is_array(subcat($catid,0))) foreach(subcat($catid,0) AS $r) { ?>
        <div  class="box cat-area">
        		<h5 class="title-1"><a  href="<?php echo $r['url'];?>"><?php echo $r['catname'];?></a><a class="more" href="<?php echo $r['url'];?>">更多&gt;&gt;</a></h5>
             <div class="">
                <ul class="article_show lh24 f14">
                <?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"content\" data=\"op=content&tag_md5=9f67072129bf85fc8e8a5383e170ed63&action=lists&catid=%24r%5Bcatid%5D&num=10&order=id+DESC&return=info\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">编辑</a>";}$content_tag = pc_base::load_app_class("content_tag", "content");if (method_exists($content_tag, 'lists')) {$info = $content_tag->lists(array('catid'=>$r[catid],'order'=>'id DESC','limit'=>'10',));}?>
             	<?php $n=1;if(is_array($info)) foreach($info AS $v) { ?>
                	<li><span class="rt"><?php echo date('m-d',$v['inputtime']);?></span>·<a target="_blank" href="<?php echo $v['url'];?>" title="<?php echo $v['title'];?>"><?php echo str_cut($v['title'],38);?></a></li>
              <?php $n++;}unset($n); ?>
              <?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?>
                </ul>
            </div>
        </div>
 		<?php $n++;}unset($n); ?>
		 <?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?>       
</div>
<?php include template("content","footer"); ?>
