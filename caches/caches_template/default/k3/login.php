<?php defined('IN_PHPCMS') or exit('No permission resources.'); ?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>K3查询验证</title>
  <link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" />
  <script src="http://code.jquery.com/jquery-1.9.1.js"></script>
  <script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
	<style>
		label, input { display:block; }
		input.text { margin-bottom:12px; width:95%; padding: .4em; }
		fieldset { padding:0; border:0; margin-top:25px; }
		h1 { font-size: 1.2em; margin: .6em 0; }
		div#users-contain { width: 350px; margin: 20px 0; }
		div#users-contain table { margin: 1em 0; border-collapse: collapse; width: 100%; }
		div#users-contain table td, div#users-contain table th { border: 1px solid #eee; padding: .6em 10px; text-align: left; }
		.ui-dialog .ui-state-error { padding: .3em; }
		.validateTips { border: 1px solid transparent; padding: 0.3em; }
		h3{ margin: 0; padding: 0.4em; text-align: center; }
		.center{margin-left:auto;margin-right:auto;}
	</style>
	 <script>
	  $(function() {
	    	$( "input[type=submit]" )
	      		.button();
		if("<?php echo $error_msg;?>"){
			alert("<?php echo $error_msg;?>");		
		}
	  });
	
	  </script>
</head>
<body>
<div style="width:520px;padding-top:100px;" class="center">
<div class="ui-widget-content ui-corner-all ">
	<div id="dialog-form" class="center" style="width:500px;padding-top:5px;">
		<h3 class="ui-widget-header ui-corner-all">K3查询验证</h3>
		<p>
			<form action="" method="POST">
			<fieldset>
				<label for="name" class="text">Name</label>
				<input type="text" name="username" id="name" class="text ui-widget-content ui-corner-all" value="<?php echo $username;?>"/>
				<label for="password" class="text">Password</label>
				<input type="password" name="password" id="password"  class="text ui-widget-content ui-corner-all" value="<?php echo $password;?>"/>
				<input type="submit" name="dosubmit" value="登入"/>
			</fieldset>
			</form>
		</p>
	</div>
</div>
</div>

</body>
