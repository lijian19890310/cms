<form action="?m=admin&c=plugin&a=config&pluginid=<?php echo $_GET['pluginid']?>&module=sqlquery" method="post" id="myform">
<table width="100%" class="table_form">
  	<tr>
	    <td class="align_r"><?php echo L('select_pdo')?></td>
	    <td colspan=3><?php echo form::select($pdos,$pdo_name,'name="pdo_select"',L('select_pdo'))?></td>
  	</tr>
  <tr>
    <th width="120">数据库SQL语句:</th>
    <td class="y-bg">
		<textarea style="width:500px;" name="sqls" rows="10" cols="85"></textarea>	
	</td>
  </tr> 
 
</table>
<div class="bk15"></div>
<input type="hidden" value="<?php echo $_SESSION['pc_hash']?>" name="pc_hash">
<input name="pluginsubmit" type="submit" value="<?php echo L('submit')?>" class="button">
</form>