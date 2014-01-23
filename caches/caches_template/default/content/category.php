<?php defined('IN_PHPCMS') or exit('No permission resources.'); ?><?php include template("content","header"); ?>
<!--main-->
<div class="main">
    
    
<div class="crumbs"><a href="<?php echo siteurl($siteid);?>">首页</a><span> &gt; </span><?php echo catpos($catid);?></div>


	<?php $n=1;if(is_array(subcat($catid))) foreach(subcat($catid) AS $v) { ?>
	<?php if($v['type']!=0) continue;?>
        <div class="box cat-area">        		
			<?php if($v[catid]!=27){?>
        	<h5 class="title-1"><a href=<?php echo $v['url'];?> class="titless"><?php echo $v['catname'];?></a><a href="<?php echo $v['url'];?>" class="more">更多>></a></h5>
			<?php }else{?>
			<h5 class="title-1" style="color:black"><?php echo $v['catname'];?></h5>
			<?php }?>		
			<div class="article_show">
					<?php if($v[catid]!=27){?>
					<ul>
						
						<?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"content\" data=\"op=content&tag_md5=b321d9016c280b9e17b6587a93e44e23&action=lists&catid=%24v%5Bcatid%5D&num=5&order=id+DESC\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">编辑</a>";}$content_tag = pc_base::load_app_class("content_tag", "content");if (method_exists($content_tag, 'lists')) {$data = $content_tag->lists(array('catid'=>$v[catid],'order'=>'id DESC','limit'=>'5',));}?>
							<?php $n=1;if(is_array($data)) foreach($data AS $v) { ?>
								<li><a href="<?php echo $v['url'];?>" target="_blank"<?php echo title_style($v[style]);?>><?php echo $v['title'];?></a></li>
							<?php $n++;}unset($n); ?>
						<?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?>
						
					</ul>
					<?php }else{?>
						<?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"content\" data=\"op=content&tag_md5=93bac965b284af0adec3d8fb42f22b24&action=category&catid=%24v%5Bcatid%5D&num=20&siteid=1&order=listorder+ASC\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">编辑</a>";}$content_tag = pc_base::load_app_class("content_tag", "content");if (method_exists($content_tag, 'category')) {$data = $content_tag->category(array('catid'=>$v[catid],'siteid'=>'1','order'=>'listorder ASC','limit'=>'20',));}?>
						<?php $n=1; if(is_array($data)) foreach($data AS $t => $r) { ?>
						
							<?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"content\" data=\"op=content&tag_md5=18dd6c594c1df256bcc6efaf70c3c7e9&action=lists&catid=%24r%5Bcatid%5D&num=5&order=id+DESC\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">编辑</a>";}$content_tag = pc_base::load_app_class("content_tag", "content");if (method_exists($content_tag, 'lists')) {$data = $content_tag->lists(array('catid'=>$r[catid],'order'=>'id DESC','limit'=>'5',));}?>
								<ul style="float:left;width:330px;height:250px;">
								<a href="<?php echo $r['url'];?>"><b><?php echo $r['catname'];?></b></a><a href="<?php echo $r['url'];?>" class="more" style="padding-right:30px;"><B>更多>></B></a>
								<?php $n=1;if(is_array($data)) foreach($data AS $v) { ?>
								
									<li><a href="<?php echo $v['url'];?>" target="_blank"<?php echo title_style($v[style]);?>><?php echo $v['title'];?></a></li>
								
								<?php $n++;}unset($n); ?>
								</ul>
							<?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?>
						<?php $n++;}unset($n); ?>
						<?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?>					
					<?php }?>
				</div>
				
				<?php if($catid==8){?>
					<h5 class="title-1"><a href="http://zone.zmodo.com/cms/index.php?m=content&c=index&a=lists&catid=63" class="titless">行业动态</a></h5>
				<?php }?>
        </div>
	<?php $n++;}unset($n); ?>
  </div>


<?php include template("content","footer"); ?>
