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
.show_se_re{
	width:100%;
}
.show_se_re li{	
	list-style:none;
	float:left;
	width:100%;
	padding-top:5px;
	padding-bottom:5px;
	
}
.show_se_re{
	overflow: hidden;
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
.note{color:red;}
</style>

<div class="main">

<div id="search_main">
<div id="search_c">
<div class="s_title">BOM查询</div>
<div id="search">
		<form action="index.php" method="GET">
				<input type="hidden" name="m" value="k3"/>
				<input type="hidden" name="c" value="index"/>
				<input type="hidden" name="a" value="BOMresult"/>
				  <div id="type" style="height:40px;">
				    	<input type="radio" id="radio1" name="type" value="1" <?php if($type=='1'){?>checked="checked"<?php }?>/><label for="radio1">BOM单号</label>
				    	<input type="radio" id="radio2" name="type" value="2"   <?php if($type=='2'){?>checked="checked"<?php }?>/><label for="radio2">物料代码</label>
					<input type="radio" id="radio3" name="type" value="3"   <?php if($type=='3'){?>checked="checked"<?php }?>/><label for="radio3">BOM分类</label>
					 </div>
				<span class="s_ipt_wr">

				<input id="kw" class="k s_ipt"  type="text"  name="k" autocomplete="off" value="<?php echo $keywords;?>">
				</span>
				<span class="s_btn_wr">
				<input id="su" class="s_btn" type="submit" onmouseout="this.className='s_btn'" onmousedown="this.className='s_btn s_btn_h'" value="Z search" onfocus="blur()" >
				</span>
		</form>
</div>
<script type="text/javascript" src="<?php echo JS_PATH;?>jquery.ztree.core-3.5.js"></script>
<script type="text/javascript" src="<?php echo JS_PATH;?>jquery.ztree.excheck-3.5.min.js"></script>
 <SCRIPT type="text/javascript" >
  <!--
	var zTree;
	var demoIframe;

	var setting = {
		view: {
			dblClickExpand: false,
			showLine: true,
			selectedMulti: false
		},
		data: {
			simpleData: {
				enable:true,
				idKey: "id",
				pIdKey: "pId",
				rootPId: ""
			}
		},
		callback: {
			beforeClick: function(treeId, treeNode) {
				var zTree = $.fn.zTree.getZTreeObj("tree");
				if (treeNode.isParent) {
					zTree.expandNode(treeNode);
					return false;
				} else {
					demoIframe.attr("src",treeNode.file + ".html");
					return true;
				}
			}
		}
	};

	var zNodes =[
		<?php $n=1; if(is_array($ICBOMGroup)) foreach($ICBOMGroup AS $r => $n) { ?>
		{id:<?php echo $n['FInterID'];?>, pId:<?php echo $n['FParentID'];?>, name:"<?php echo $n['FName'];?>",open:true, "click":"redirect('<?php echo $n['FName'];?>');"},
		<?php $n++;}unset($n); ?>
	];

	$(document).ready(function(){
		var t = $("#tree");
		t = $.fn.zTree.init(t, setting, zNodes);
		demoIframe = $("#testIframe");
		demoIframe.bind("load", loadReady);
		var zTree = $.fn.zTree.getZTreeObj("tree");
		zTree.selectNode(zTree.getNodeByParam("id", 101));

	});

	function loadReady() {
		var bodyH = demoIframe.contents().find("body").get(0).scrollHeight,
		htmlH = demoIframe.contents().find("html").get(0).scrollHeight,
		maxH = Math.max(bodyH, htmlH), minH = Math.min(bodyH, htmlH),
		h = demoIframe.height() >= maxH ? minH:maxH ;
		if (h < 530) h = 530;
		demoIframe.height(h);
	}
	function redirect(name){
		alert('go');
		window.location.href="<?php echo APP_PATH;?>index.php?m=k3&c=index&a=BOMresult&type=3&k="+name;
	}
	
  //-->
  </SCRIPT>
<style>
.show_se_re {font-size:12px;}
.BOMmenu{width:198px;border: 1px solid #CCCCCC;float:left;height:238px;background: #F7F7F0;overflow-y: scroll;overflow-x: hidden;}
.PBOMm{width:790px;height:238px;float:left;}
.PBOM{width:790px;border: 1px solid #CCCCCC;float:left;height:200px;background: #F7F7F0;overflow-y: scroll;overflow-x: hidden;}
.CBOMmenu{width:198px;border: 1px solid #CCCCCC;float:left;height:335px;background: #F7F7F0;overflow-y: scroll;overflow-x: hidden;}
.mCBOM{width:790px;float:left;}
.CBOM{width:790px;border: 1px solid #CCCCCC;float:left;height:300px;background: #F7F7F0;overflow-y: scroll;overflow-x: hidden;}
.PBOM  td {border-bottom: 1px solid #CCCCCC;border-right: 1px solid #CCCCCC;font-size:13px;}
#titles  td {border-bottom: 1px solid #CCCCCC;border-right: 1px solid #CCCCCC;font-size:13px;}
.PBOM  tr:hover {background: #fff;}
.PBOM  tr {cursor:pointer;height:40px;}
.CBOM  td {border-bottom: 1px solid #CCCCCC;border-right: 1px solid #CCCCCC;font-size:13px;}
.CBOM  tr:hover {background: #fff;}
.notes {background: #FFFFCC;}
.CBOMmenu p {font-size:12px;}
.current {background: #fff;}
.none{display:none;}
.excel{width:100%;height:50px;text-align:right;padding-right:10px;}
</style>
  <link rel="stylesheet" href="<?php echo CSS_PATH;?>zTreeStyle/zTreeStyle.css" type="text/css">
<div id="search_auto"></div>
</div>
</div>
		<div>
<div class="excel"><button id="outputdata">数据导出EXCEL</button></div>
		<div class="show_se_re">
			<div class="BOMmenu">
				<ul id="tree" class="ztree" style="width:260px; overflow:auto;"></ul>
			</div>
			<div class="PBOMm">
				<table style="width:775px;" cellpadding="0" cellspacing="0" id="titles">
				<tbody>
					<tr style="height:35px;text-align:center;background:#999999;">
						<td width="20%">
							BOM单编号
						</td>
						<td width="15%">
							物料代码
						</td>
						<td width="15%">
							物料名称
						</td>
						<td width="25%">
							规格型号
						</td>
						<td width="5%">
							数量
						</td>
						<td width="6%">
							单位
						</td>
						<td width="7%">
							审核
						</td>
						<td width="7%">
							使用
						</td>

					</tr>
					</tbody>
				</table>
				<div class="PBOM">
				<table style="width:100%;" cellpadding="0" cellspacing="0" >
				<tbody>

				<?php $n=1; if(is_array($search_data)) foreach($search_data AS $r => $n) { ?>
					<tr  <?php if(($r%2)==0){?>   <?php } ?>   id="ctab<?php echo($r+1)?>"  <?php if($r==0){?>  class="current" <?php } ?>
						onclick="getdata(<?php echo($r+1)?>);cswitchTab('ctab<?php echo($r+1)?>','ctabboxDiv<?php echo($r+1)?>');this.blur();return false;">
						<td width="20%" id="BOMFBOMNumber<?php echo($r+1)?>">
							<a href="<?php echo $mainUrl;?>&type=1&k=<?php echo $n['BOMFBOMNumber'];?>"><?php echo $n['BOMFBOMNumber'];?></a>
						</td>
						<td width="15%" style="text-align:center" id="number<?php echo($r+1)?>">
							<a href="<?php echo $mainUrl;?>&type=2&k=<?php echo $n['number'];?>"><?php echo $n['number'];?><a/>
						</td>
						<td width="15%" id="BOMname<?php echo($r+1)?>">
							<?php echo $n['name'];?>
						</td>
						<td width="25%" id="FModel<?php echo($r+1)?>">
							<?php echo $n['FModel'];?>
						</td>
						<td width="5%" style="text-align:center">
							<?php echo $n['BOMFQty'];?>
						</td>
						<td width="6%" style="text-align:center">
							<?php echo $n['MeasureUnitname'];?>
						</td>
						<td width="7%" style="text-align:center">
							<?php if($n['BOMFStatus']==1)
								echo"审核";
								else
								echo"未审核";
							?>
						</td>
						<td width="7%" style="text-align:center">
							<?php if($n['BOMFUseStatus']==1072)
								echo"使用";
								elseif($n['BOMFUseStatus']==1073)
								echo"未使用";
							?>
						</td>
					</tr>
				<?php $n++;}unset($n); ?>
				</tbody>
			</table>			
			</div>
		</div>
		</div>
			<div class="CBOMmenu">
			<p >BOM编码:</p>
			<p id="d1"><?php echo $search_data['0']['BOMFBOMNumber'];?></p>
			<p>物料代码:</p>			
			<p id="d2"><?php echo $search_data['0']['number'];?></p>
			<p>物料名称:</p>			
			<p id="d3"><?php echo $search_data['0']['name'];?></p>
			<p>物料规格:</p>			
			<p id="d4"><?php echo $search_data['0']['FModel'];?></p>
			</div>
			<div class="mCBOM">
				<table style="width:775px;" cellpadding="0" cellspacing="0" id="titles">
				<tbody>
					<tr style="height:35px;text-align:center;background:#999999;">
						<td  width="5%">
							顺序
						</td>
						<td  width="20%">
							物料代码
						</td>
						<td  width="20%">
							物料名称
						</td>
						<td  width="25%">
							规格型号
						</td>
						<td width="15%">
							物料属性
						</td>
						<td  width="5%">
							数量
						</td>
						<td width="10%">
							单位
						</td>


					</tr>
				</tbody>
			</table>
				<div class="CBOM">
				<?php $n=1; if(is_array($search_data)) foreach($search_data AS $r => $ns) { ?>
					<table  cellpadding="0" cellspacing="0" id="ctabboxDiv<?php echo($r+1)?>" 
					<?php if($r!=0){?> class="none" <?php }?> style="width:100%;" >
					<tbody>
					<?php $n=1; if(is_array($ns['children'])) foreach($ns['children'] AS $rs => $n) { ?>
					<tr style="height:40px;" <?php if(($rs%2)==0){?> class="notes" <?php } ?>  >
						<td width="5%" style="text-align:center	">
							<?PHP echo ($rs+1)?>/<?PHP echo count($ns['children'])?>
						</td>
						<td width="20%" style="text-align:center">
							<a href="<?php echo $mainUrl;?>&type=2&k=<?php echo $n['number'];?>"><?php echo $n['number'];?></a>
						</td>
						<td width="20%">
							<?php echo $n['myname'];?>
						</td>
						<td width="25%">
							<?php echo $n['FModel'];?>
						</td>
						<td width="15%" style="text-align:center">
							<?php echo $n['SubMessagename'];?>
						</td>
						<td width="5%" style="text-align:center">
							<?php echo $n['FQTY'];?>
						</td>
						<td width="10%" style="text-align:center">
							<?php echo $n['MeasureUnitname'];?>
						</td>
					</tr>
						<?php unset($n)?>
					<?php $n++;}unset($n); ?>
					</tbody>
					</table>
				<?php $n++;}unset($n); ?>
				</div>
			</div>

		</div>

		</div>
</div>
</div>
<script>
function cswitchTab(ctabID, ctabboxDivID) {
		for (i = 1; i < 21; i++) {
			if ("ctab" + i == ctabID) {
				document.getElementById(ctabID).className = "current";
			} else {
				document.getElementById("ctab" + i).className = "";
			}
			if ("ctabboxDiv" + i == ctabboxDivID) {
				document.getElementById(ctabboxDivID).className = "table";
			} else {
				document.getElementById("ctabboxDiv" + i).className ="none";
			}
		}

	}
function getdata(ID){
	var d1="#BOMFBOMNumber"+ID;
	var d2="#number"+ID;
	var d3="#BOMname"+ID;
	var d4="#FModel"+ID;
	var d1d=$(d1).text();
	var d2d=$(d2).text();
	var d3d=$(d3).text();
	var d4d=$(d4).text();
	//alert(d1d);
	$("#d1").text(d1d); 
	$("#d2").text(d2d); 
	$("#d3").text(d3d); 
	$("#d4").text(d4d); 

	
}
$(function(){
$('#search_auto').css({'width':$('#search input[name="k"]').width()+4});
$('#search input[name="k"]').keyup(function(){
$.get('index.php',{m:'k3',c:'index',a:'search_auto_bom',k:encodeURIComponent($("#kw").val()),type:$('input[name="type"]:checked').val()},function(data){
if(data=='0') $('#search_auto').html('').css('display','none');
else $('#search_auto').html(data).css('display','block');});});
});
</script>






