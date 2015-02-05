<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
<title><?php echo $this->_tpl_vars['softtitle'] ?></title>
<link href="templates/css/baselist.css" rel="stylesheet" type="text/css" />
<link href="templates/css/all.css" rel="stylesheet" type="text/css" />
<link href="templates/css/formdiv.css" rel="stylesheet" type="text/css"/>
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/control.js"></script>
<script type="text/javascript" src="js/form.js"></script>
<script type="text/javascript">

	var resizewindow= null;

	window.onresize = function(){
		var h = $(window).height();
		if(resizewindow!=h){
			sizewindow();
			resizewindow=h;
		}
	}

	function sizewindow(){
		var h = $(window).height();
		if(document.getElementById("mainbodybottonauto")){
			$('.managebottonadd').css({height:h-40});
		}
	}
	var mangerlist_js_password_empty = "<?php echo $this->_tpl_vars['ST']['mangerlist_js_password_empty'] ?>";
	var mangerlist_js_password_error = "<?php echo $this->_tpl_vars['ST']['mangerlist_js_password_error'] ?>";
	var mangerlist_js_edit_ok = "<?php echo $this->_tpl_vars['ST']['mangerlist_js_edit_ok'] ?>";
	var mangerlist_js_edit_no = "<?php echo $this->_tpl_vars['ST']['mangerlist_js_edit_no'] ?>";
	var iframename = "<?php echo $this->_tpl_vars['iframename'] ?>";
	$(document).ready(function(){
		var h = '<?php echo $this->_tpl_vars['iframeheightwindow'] ?>';
		$('.managebottonadd').css({height:h-40});
		var options = {

			beforeSubmit: formverify,

			success:saveResponse
		}
		$('#manageedit<?php echo $this->_tpl_vars['memberinfo']['id'] ?>').submit(function() {
			$(this).ajaxSubmit(options);
			return false;
		});
	})




	function formverify(formData) {
		var queryString = $.param(formData);
		var get=urlarray(queryString);
		if (get['password']!=""){
			if( get['password'].length<6 ) {
				alert(mangerlist_js_password_empty);
				document.manageedit.password.focus();
				return false;
			}
			if( get['password2']=="" ) {
				alert(mangerlist_js_password_empty);
				document.manageedit.password2.focus();
				return false;
			}
			if( get['password2'] != get['password'] ) {
				alert(mangerlist_js_password_error);
				document.manageedit.password.focus();
				return false;
			}

		}
		parent.windowsdig('Loading','iframe:index.php?archive=management&action=load','400px','180px','iframe',false);
	}
	function saveResponse(options){
		parent.closeifram();
		if (options=='true'){
			parent.frames[iframename].refresh('selectform','selectall','check_all');
			alert(mangerlist_js_edit_ok);
		}else{
			alert(mangerlist_js_edit_ok);
		}
		parent.onaletdoc()
	}
</script>
</head>

<body>
<form name="manageedit" id="manageedit<?php echo $this->_tpl_vars['memberinfo']['id'] ?>" method="post" action="index.php?archive=management&action=managesava">
<input type="hidden" name="inputclass" value="edit">
<input type="hidden" name="id" value="<?php echo $this->_tpl_vars['memberinfo']['id'] ?>">
<div id="mainbodybottonauto" class="managebottonadd">
	<div class="maindobycontent">
		<!--查看已选择的类型-->
		<div class="suggestion">
			<span class="sugicon"><span class="strong colorgorning2"><?php echo $this->_tpl_vars['ST']['position_title'] ?></span><span class="colorgorningage"><?php echo $this->_tpl_vars['ST']['mangerlist_edit_mess'] ?><u><?php echo $this->_tpl_vars['memberinfo']['username'] ?></u></span></span>
		</div>
		<div class="manageeditdiv">
			<div class="maneditcontent">
				<table class="formtable">
					<tr class="trstyle2">
						<td class="trtitle01"><?php echo $this->_tpl_vars['ST']['mangerlist_add_username'] ?></td>
						<td class="trtitle02"><input type="hidden" name="username" size="20" maxlength="250" value="<?php echo $this->_tpl_vars['memberinfo']['username'] ?>" class="infoInput"/> <?php echo $this->_tpl_vars['memberinfo']['username'] ?> [<?php echo $this->_tpl_vars['ST']['management_password_username_mess1'] ?><?php echo $this->timeformat($this->_tpl_vars['memberinfo']['intime'],3) ?> &nbsp;<?php echo $this->_tpl_vars['ST']['management_password_username_mess2'] ?><?php echo $this->ip($this->_tpl_vars['memberinfo']['ipadd'],0) ?>]
						</td>
					</tr>
					<tr class="trstyle2">
						<td class="trtitle01"><?php echo $this->_tpl_vars['ST']['mangerlist_add_password'] ?></td>
						<td class="trtitle02"><input type="password" name="password" size="25" maxlength="30"  class="infoInput"/> <span class="cautiontitle"><?php echo $this->_tpl_vars['ST']['mangerlist_edit_password_mess'] ?></span></td>
					</tr>
					<tr class="trstyle2">
						<td class="trtitle01"><?php echo $this->_tpl_vars['ST']['mangerlist_add_password2'] ?></td>
						<td class="trtitle02"><input type="password" name="password2" size="25" maxlength="30"  class="infoInput"/></td>
					</tr>
			
					<tr class="trstyle2">
						<td class="trtitle01"><?php echo $this->_tpl_vars['ST']['mangerlist_add_name'] ?></td>
						<td class="trtitle02"><input type="text" name="name" size="20" maxlength="40" value="<?php echo $this->_tpl_vars['memberinfo']['name'] ?>" class="infoInput"/></td>
					</tr>
					<tr class="trstyle2">
						<td class="trtitle01"><?php echo $this->_tpl_vars['ST']['mangerlist_add_sex'] ?></td>
						<td class="trtitle02">
							<input type="radio" value="1" name="sex"<?php if($this->_tpl_vars['memberinfo']['sex']==1){ ?> checked="checked"<?php } ?>/>  <?php echo $this->_tpl_vars['ST']['select_sex_1'] ?>&nbsp;
							       <input type="radio" value="0" name="sex"<?php if($this->_tpl_vars['memberinfo']['sex']==0){ ?> checked="checked"<?php } ?>/> <?php echo $this->_tpl_vars['ST']['select_sex_0'] ?>
						</td>
					</tr>
					<tr class="trstyle2">
						<td class="trtitle01"><?php echo $this->_tpl_vars['ST']['mangerlist_add_powergroup'] ?></td>
						<td class="trtitle02">
							<select size="1" name="powergroup" id="powergroup">
								<?php if (count($this->_tpl_vars['powerlist'])>0){$divid_list=1;for($list=0;$list<count($this->_tpl_vars['powerlist']); $list++){?>
								<option <?php echo $this->_tpl_vars['powerlist'][$list]['selected'] ?> value="<?php echo $this->_tpl_vars['powerlist'][$list]['id'] ?>"><?php echo $this->_tpl_vars['powerlist'][$list]['powername'] ?></option>
								<?php }} ?>
							</select>
						</td>
					</tr>
					<tr class="trstyle2">
						<td class="trtitle01"><?php echo $this->_tpl_vars['ST']['mangerlist_add_inputclassid'] ?></td>
						<td class="trtitle02">
							<input type="radio" value="1" name="inputclassid"<?php if($this->_tpl_vars['memberinfo']['inputclassid']==1){ ?> checked="checked"<?php } ?>> <?php echo $this->_tpl_vars['ST']['input1_botton'] ?>&nbsp;
							<input type="radio" value="0" name="inputclassid"<?php if($this->_tpl_vars['memberinfo']['inputclassid']==0){ ?> checked="checked"<?php } ?>> <?php echo $this->_tpl_vars['ST']['input0_botton'] ?>&nbsp;
							<span class="cautiontitle"><?php echo $this->_tpl_vars['ST']['mangerlist_add_inputclassid_mess'] ?></span>
						</td>
					</tr>
					<tr class="trstyle2">
						<td class="trtitle01"><?php echo $this->_tpl_vars['ST']['mangerlist_add_isremote'] ?></td>
						<td class="trtitle02">
							<input type="radio" value="1" name="isremote"<?php if($this->_tpl_vars['memberinfo']['isremote']==1){ ?> checked="checked"<?php } ?>> <?php echo $this->_tpl_vars['ST']['open_botton_title'] ?>&nbsp;
							<input type="radio" value="0" name="isremote"<?php if($this->_tpl_vars['memberinfo']['isremote']==0){ ?> checked="checked"<?php } ?>> <?php echo $this->_tpl_vars['ST']['close_botton_title'] ?>&nbsp;
							<span class="cautiontitle"><?php echo $this->_tpl_vars['ST']['mangerlist_add_isremote_mess'] ?></span>
						</td>
					</tr>
					<tr>
						<td colspan="2"></td>
					</tr>
				</table>
			</div>
		</div>
	</div>
</div>
<div id="downbotton">
	<div id="subbotton">
		<table border="0" width="100%">
			<tr>
				<td id="right"><input type="submit" name="Submit" value="<?php echo $this->_tpl_vars['ST']['botton_edit'] ?>" class="buttonface" /></td>
				<td id="left" class="padding-left5"><input type="button" name="cancel" onClick="javascript:parent.onaletdoc();" value="<?php echo $this->_tpl_vars['ST']['botton_edit_reset'] ?>" class="buttonface" /></td>
			</tr>
		</table>
	</div>
</div>
</form>
</body>

</html>