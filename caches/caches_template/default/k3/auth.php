<?php defined('IN_PHPCMS') or exit('No permission resources.'); ?>  <script>
  $(function() {
    var name = $( "#name" ),
      email = $( "#email" ),
      password = $( "#password" ),
      allFields = $( [] ).add( name ).add( password ),
      tips = $( ".validateTips" );
 
    function updateTips( t ) {
      tips
        .text( t )
        .addClass( "ui-state-highlight" );
      setTimeout(function() {
        tips.removeClass( "ui-state-highlight", 1500 );
      }, 500 );
    }
 
    function checkLength( o, n, min, max ) {
      if ( o.val().length > max || o.val().length < min ) {
        o.addClass( "ui-state-error" );
        updateTips( n +"的长度 "+ " 必须在 " +
          min + " 和 " + max + "之间." );
        return false;
      } else {
        return true;
      }
    }
 
    function checkRegexp( o, regexp, n ) {
      if ( !( regexp.test( o.val() ) ) ) {
        o.addClass( "ui-state-error" );
        updateTips( n );
        return false;
      } else {
        return true;
      }
    }
 
    $( "#dialog-form" ).dialog({
      autoOpen: false,
      height: 300,
      width: 350,
      modal: true,
      buttons: {
        "确定": function() {
          var bValid = true;
          allFields.removeClass( "ui-state-error" );
 
          bValid = bValid && checkLength( name, "用户名", 2, 16 );
          bValid = bValid && checkLength( password, "密码", 3, 16 );
          if ( bValid ) {
		$.post('<?php echo $authUrl;?>',{username:$('#name').val(),password:$('#password').val()},function (msg) {
			//alert(msg);
			if(msg==1){
				 $("#dialog-form").dialog( "close" );
				 window.location= '<?php echo $excelOutputUrl;?>'; 
			}
			else{
				updateTips( "用户名或密码错误！" );
			}		
		});
           
          }
        },
        "取消": function() {
          $( this ).dialog( "close" );
        }
      },
      close: function() {
        allFields.val( "" ).removeClass( "ui-state-error" );
      }
    });
 
    $( "#outputdata" )
      .button()
      .click(function() {
        $( "#dialog-form" ).dialog( "open" );
      });
  });
  </script>

<style>
.ui-widget-header {
background-color: #3493F0;
}
</style>
<div id="dialog-form" title="请输入用户名和密码">
  <p class="validateTips"></p>
 
  <form>
  <fieldset>
    <label for="name">用户名:</label><br>
    <input type="text" name="name" id="name" class="text ui-widget-content ui-corner-all" /><br/>
    <label for="password">密码:</label><br>
    <input type="password" name="password" id="password" class="text ui-widget-content ui-corner-all" />
	<p>&nbsp;</p>
  </fieldset>
  </form>
</div>
<div id="authfail" title="提示消息" style="display:none;">
  <p>对不起，认证失败,请重试！</p>
</div>

