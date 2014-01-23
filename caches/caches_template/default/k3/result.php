<?php defined('IN_PHPCMS') or exit('No permission resources.'); ?>			

  <link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" />
  <script src="http://code.jquery.com/jquery-1.9.1.js"></script>
  <script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
  <script>
  $(function() {
    	$( "#type" ).buttonset();
	$( "#radio1").click(function(){
	  $("#search_auto").css("display","none");
	});
	$( "#radio2").click(function(){
	  $("#search_auto").css("display","none");

	});
	$( "#radio3").click(function(){
	  $("#search_auto").css("display","none");

	});
	$( "#radio4").click(function(){
	  $("#search_auto").css("display","none");

	});
  });
  </script>
<style>
.show_se_re li{	
	list-style:none;
	float:left;
	width:100%;
	padding-top:5px;
	padding-bottom:5px;
	
}
.show_se_re{
	margin-bottom:10px;
	overflow: hidden;
}
.show_se_re li span{
	width:25%;
	float:left;
}

.show_se_re li  {
	padding-left:10px;
	font-size: 1.17em;
	padding-top:5px;
	padding-bottom:10px;
	margin-bottom:10px;	
}
.li01{
	color:#333333;
	background-color:#e6e6e6; 
}
.li11{
	color:#333333;
	background-color:#d4d4d4;

}
.lim{
	width:25%;
	height:18px;
	float:left;
	font-size:18px;
	border-bottom:1px solid #d4d4d4;
}
.s_title{
	text-align:center;
	font-size:24px;
	padding:5px;
}
#search_main{
	width:100%;
	margin-left:auto;
	margin-right:auto;
	padding-top:10px;
}
#search{font-size:14px;margin-left:auto;margin-right:auto;}
#search_c{
width:560px;
margin-left:auto;margin-right:auto;
}
#search .k{width:410px;}
.k input {
	
}
#search_auto{border:1px solid #d4d4d4; position:absolute; display:none;margin-left:auto;margin-right:auto;}
#search_auto li{background:#FFF; text-align:left;list-style:none;font-size:16px;}
#search_auto li.cls{text-align:right;}
#search_auto li a{display:block; padding:5px 6px; cursor:pointer; color:#666;}
#search_auto li a:hover{background:#555555; text-decoration:none; color:#000;}
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
input{border:0;padding:0}
.s_ipt_wr{width:418px;height:30px;display:inline-block;margin-right:10px;background:url(Search.gif) no-repeat;border:1px solid #d4d4d4;border-color:#d4d4d4 #d4d4d4 #d4d4d4 #d4d4d4 ;vertical-align:top}
.s_ipt{width:405px;height:22px;font:16px/22px arial;margin:4px 0 0 7px;background:#fff;outline:none;-webkit-appearance:none}
.s_btn_wr{width:122px;height:34px;display:inline-block;background:url(Search.gif) no-repeat -260px -50px;*position:relative;z-index:0;vertical-align:top}
.s_btn{width:120px;height:32px;padding-top:2px\9;font-size:16px;background:#ddd url(Search.gif) 0 -50px;cursor:pointer;color:#d4d4d4;}
.s_btn_h{background-position:-130px -50px;}

</style>
<div class="main">

<div id="search_main">
<div id="search_c">
<div class="s_title">物料查询</div>
<div id="search">
		<form action="index.php" method="GET">
				<input type="hidden" name="m" value="k3"/>
				<input type="hidden" name="c" value="index"/>
				<input type="hidden" name="a" value="result"/>
				  <div id="type" style="height:40px;">
				    	<input type="radio" id="radio1" name="type" value="1" <?php if($type=='1'){?>checked="checked"<?php }?>/><label for="radio1">物料名称</label>
				    	<input type="radio" id="radio2" name="type" value="2"   <?php if($type=='2'){?>checked="checked"<?php }?>/><label for="radio2">物料代码</label>
					<input type="radio" id="radio3" name="type" value="3"  <?php if($type=='3'){?>checked="checked"<?php }?>/><label for="radio3">规格</label>
				  </div>
				<span class="s_ipt_wr">

				<input id="kw" class="k s_ipt"  type="text"  name="k" autocomplete="off" value="<?php echo $keywords;?>">
				</span>
				<span class="s_btn_wr">
				<input id="su" class="s_btn" type="submit" onmouseout="this.className='s_btn'" onmousedown="this.className='s_btn s_btn_h'" value="Z search" onfocus="blur()" >
				</span>
		</form>
</div>

<style>
.result{width:100%;border: 1px solid #CCCCCC;float:left;background: #F7F7F0;}
.result  td {border-bottom: 1px solid #CCCCCC;border-right: 1px solid #CCCCCC;font-size:13px;}
.result  tr:hover {background: #fff;}
.notes {background: #FFFFCC;}
#titles td {border-bottom: 1px solid #CCCCCC;border-right: 1px solid #CCCCCC;font-size:13px;}
.excel{width:100%;height:50px;border-bottom: 1px solid #CCCCCC;text-align:right;padding-right:10px;}
</style>
<div id="search_auto"></div>
</div>
</div>
<div class="excel"><button id="outputdata">数据导出EXCEL</button></div>
		<div class="show_se_re">

		<div class="result">
			<table style="width:100%;" cellpadding="0" cellspacing="0" >
				<tbody>
					<tr style="height:30px;text-align:center;background:#999999;">
						<td width="10%">
							物料代码
						</td>
						<td width="15%">
							物料名称
						</td>
						<td width="15%">
							规格
						</td>
						<td width="10%">
							物料属性
						</td>
						<td width="10%">
							计量单位组
						</td>
						<td width="10%">
							计量单位
						</td>
						<td width="10%">
							仓库
						</td>
						<td width="10%">
							仓位
						</td>
						<td width="10%">
							库存
						</td>
					</tr>
				<?php $n=1; if(is_array($search_data)) foreach($search_data AS $r => $n) { ?>
					<tr  <?php if(($r%2)==0){?>  class="notes" <?php } ?>  style="height:50px;">
						<td width="10%" id="BOMname<?php echo($r+1)?>" style="text-align:center;">
							<a href="<?php echo $mainUrl;?>&type=2&k=<?php echo $n['FNumber'];?>"><?php echo $n['FNumber'];?></a>
						</td>

						<td width="15%" id="BOMFBOMNumber<?php echo($r+1)?>">
							<a href="<?php echo $mainUrl;?>&type=1&k=<?php echo $n['FName'];?>"><?php echo $n['FName'];?></a>
						</td>
						<td width="15%"  id="number<?php echo($r+1)?>">
							<a href="<?php echo $mainUrl;?>&type=3&k=<?php echo $n['FModel'];?>"><?php echo $n['FModel'];?></a>
						</td>
						<td width="10%" style="text-align:center;">
							<?php echo $n['SubMessageName'];?>
						</td>
						<td width="10%" id="FModel<?php echo($r+1)?>" style="text-align:center;">
							<?php echo $n['UnitGroupName'];?>
						</td>
						<td width="10%" style="text-align:center;">
							<?php echo $n['MeasureUnitName'];?>
						</td>
						<td width="10%">
							<?php echo $n['StockName'];?>
						</td>
						<td width="10%">
							<?php echo $n['StockPlaceName'];?>
						</td>
						<td width="10%">
							<?php echo $n['FQty'];?>
						</td>
					</tr>
				<?php $n++;}unset($n); ?>
			</tbody>
		</table>
		</div>
			</div>
</div>
<script>
$(function(){
$('#search_auto').css({'width':$('#search input[name="k"]').width()+4});
$('#search input[name="k"]').keyup(function(){
$.get('index.php',{m:'k3',c:'index',a:'search_auto_w',k:encodeURIComponent($("#kw").val()),type:$('input[name="type"]:checked').val()},function(data){
if(data=='0') $('#search_auto').html('').css('display','none');
else $('#search_auto').html(data).css('display','block');});});
});
</script>






