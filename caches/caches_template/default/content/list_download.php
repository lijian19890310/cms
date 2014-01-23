<?php defined('IN_PHPCMS') or exit('No permission resources.'); ?><?php include template("content","header"); ?>
<div class="main">
    
    
<div class="crumbs"><a href="<?php echo siteurl($siteid);?>">首页</a><span> &gt; </span><?php echo catpos($catid);?></div>
		<?php $n=1;if(is_array(subcat($catid))) foreach(subcat($catid) AS $v) { ?>
        <div class="box cat-area">
        		<h5 class="title-1"><a href=<?php echo $v['url'];?> class="titless"><?php echo $v['catname'];?></a>	<a href="<?php echo $v['url'];?>" class="more">更多>></a></h5>
             <div class="article_show">
                <ul>
                <?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"content\" data=\"op=content&tag_md5=5d107604b68e61f01796643989da0a78&action=lists&catid=%24v%5Bcatid%5D&num=5&order=id+DESC\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">编辑</a>";}$content_tag = pc_base::load_app_class("content_tag", "content");if (method_exists($content_tag, 'lists')) {$data = $content_tag->lists(array('catid'=>$v[catid],'order'=>'id DESC','limit'=>'5',));}?>
					<?php $n=1;if(is_array($data)) foreach($data AS $v) { ?>
						<li><a href="<?php echo $v['url'];?>" target="_blank"<?php echo title_style($v[style]);?>><?php echo $v['title'];?></a></li>
					<?php $n++;}unset($n); ?>
				<?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?>
                </ul>
            </div>
        </div>
	<?php $n++;}unset($n); ?>
		<?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"content\" data=\"op=content&tag_md5=6401a2ce199d1b88bccfc45608b989cc&action=lists&catid=%24catid&num=15&order=id+DESC&page=%24page\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">编辑</a>";}$content_tag = pc_base::load_app_class("content_tag", "content");if (method_exists($content_tag, 'lists')) {$pagesize = 15;$page = intval($page) ? intval($page) : 1;if($page<=0){$page=1;}$offset = ($page - 1) * $pagesize;$content_total = $content_tag->count(array('catid'=>$catid,'order'=>'id DESC','limit'=>$offset.",".$pagesize,'action'=>'lists',));$pages = pages($content_total, $page, $pagesize, $urlrule);$data = $content_tag->lists(array('catid'=>$catid,'order'=>'id DESC','limit'=>$offset.",".$pagesize,'action'=>'lists',));}?>
        <div class="box cat-area">
		<div class="article_show">
		<ul>
		<?php $n=1;if(is_array($data)) foreach($data AS $r) { ?>
              <li><a target="_blank" href="<?php echo $r['url'];?>" ><?php echo $r['title'];?></a><span class="rt"><?php echo date('Y-m-d H:i:s',$r[inputtime]);?></span></li>
		<?php $n++;}unset($n); ?>	
		</ul>
		</div>
		</div>
        <!--pages-->
        <div class="text-c mg_t20" id="pages"><?php echo $pages;?></div>
		<?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?>
</div>
<?php include template("content","footer"); ?>
