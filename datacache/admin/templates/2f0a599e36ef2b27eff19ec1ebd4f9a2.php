<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
<title><?php echo $this->_tpl_vars['softtitle'] ?></title>
<link href="templates/css/baselist.css" rel="stylesheet" type="text/css" />
<link href="templates/css/all.css" rel="stylesheet" type="text/css" />
<link href="templates/css/formdiv.css" rel="stylesheet" type="text/css"/>
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/form.js"></script>
<script type="text/javascript" src="js/control.js"></script>
<script type="text/javascript" language="JavaScript">
var username_empty = "<?php echo $this->_tpl_vars['ST']['management_password_username_empty'] ?>";
var oldpassword_empty = "<?php echo $this->_tpl_vars['ST']['management_password_oldpassword_empty'] ?>";
var newpassword_empty = "<?php echo $this->_tpl_vars['ST']['management_password_newpassword_empty'] ?>";
var newpassword_error = "<?php echo $this->_tpl_vars['ST']['management_password_newpassword_error'] ?>";
var newpassword_username_error = "<?php echo $this->_tpl_vars['ST']['management_password_newpassword_username_error'] ?>";
var newpassword2_empty = "<?php echo $this->_tpl_vars['ST']['management_password_newpassword2_empty'] ?>";
var newpassword3_error = "<?php echo $this->_tpl_vars['ST']['management_password_newpassword3_error'] ?>";
var iframename = "<?php echo $this->_tpl_vars['iframename'] ?>";
var digheight="<?php echo $this->_tpl_vars['digheight'] ?>";

$(document).ready(function(){
	var h = parseInt(digheight);
	if(document.getElementById("mainbodybottonauto")){
		$('.managebottonadd').css({height:h-40});
	}
});

function checkpassword() {
	if( mainform.username.value.length<5 ) {
		alert(username_empty)
		document.mainform.username.focus();
		return false;
	}

	if( mainform.password1.value.length<5 ) {
		alert(oldpassword_empty)
		document.mainform.password1.focus();
		return false;
	}

	if( mainform.password.value.length<5 ) {
		alert(newpassword_empty)
		document.mainform.password.focus();
		return false;
	}

	if ( mainform.password.value=="123456" || mainform.password.value=="111111" || mainform.password.value=="aaaaaa" || mainform.password.value=="654321" || mainform.password.value=="abcdef") {
		alert(newpassword_error)
		document.mainform.password.focus();
		return false;
	}

	if ( mainform.username.value==mainform.password.value ){
		alert(newpassword_username_error)
		document.mainform.password.focus();
		return false;
	}

	if( mainform.password2.value =="" ) {
		alert(newpassword2_empty)
		document.mainform.password2.focus();
		return false;
	}
	if( mainform.password2.value != mainform.password.value ) {
		alert(newpassword3_error)
		document.mainform.password.focus();
		return false;
	}
}

function resetwindow(){
    parent.closeifram();
}
</script>
</head>

<body>
<form name="mainform" method="post" action="index.php" onSubmit="return checkpassword()">
<input type="hidden" name="point" value="admin"/>
<input type="hidden" name="archive" value="management"/>
<input type="hidden" name="action" value="editpassword"/>
<input type="hidden" name="digheight" value="<?php echo $this->_tpl_vars['digheight'] ?>"/>
<div id="mainbodybottonauto" class="managebottonadd">
	<div class="maindobycontent">
		<div class="suggestion">
			<span class="sugicon"><span class="strong colorgorning2"><?php echo $this->_tpl_vars['ST']['position_title'] ?></span><span class="padding-left5 colorgorningage"><?php echo $this->_tpl_vars['ST']['management_password_mess'] ?></span></span>
		</div>
		<div class="manageeditdiv">
			<div class="maneditcontent">
				<table class="formtablewin">
					<tr class="trstyle2">
						<td width="15%" class="trtitle01"><?php echo $this->_tpl_vars['ST']['management_password_username'] ?></td>
						<td width="85%" class="trtitle02">
						<input type="hidden" name="username" size="20" maxlength="250" value="<?php echo $this->_tpl_vars['memberinfo']['username'] ?>" class="smallInput"/>
						<?php echo $this->_tpl_vars['memberinfo']['username'] ?> [<?php echo $this->_tpl_vars['ST']['management_password_username_mess1'] ?>：<?php echo $this->timeformat($this->_tpl_vars['memberinfo']['outtime'],3) ?> &nbsp;<?php echo $this->_tpl_vars['ST']['management_password_username_mess2'] ?>：<?php echo $this->ip($this->_tpl_vars['memberinfo']['ipadd'],0) ?>]</td>
					</tr>
					<tr class="trstyle2">
						<td class="trtitle01"><?php echo $this->_tpl_vars['ST']['management_password_password1'] ?></td>
						<td class="trtitle02"><input type="password" name="password1" size="25" maxlength="30" class="infoInput"/> <?php if($this->_tpl_vars['errconter']!=""){ ?><span class="cautiontitle2"><?php echo $this->_tpl_vars['errconter'] ?></span><?php } ?></td>
					</tr>
					<tr class="trstyle2">
						<td class="trtitle01"><?php echo $this->_tpl_vars['ST']['management_password_password'] ?></td>
						<td class="trtitle02"><input type="password" name="password" size="25" maxlength="30" class="infoInput"/> <span class="cautiontitle"><?php echo $this->_tpl_vars['ST']['management_password_password_mess'] ?></span></td>
					</tr>
					<tr class="trstyle2">
						<td class="trtitle01"><?php echo $this->_tpl_vars['ST']['management_password_password2'] ?></td>
						<td class="trtitle02"><input type="password" name="password2" size="25" maxlength="30"  class="infoInput"/> <span class="cautiontitle"><?php echo $this->_tpl_vars['ST']['management_password_password2_mess'] ?></span></td>
					</tr>
					<tr class="trstyle2">
						<td class="trtitle01"><?php echo $this->_tpl_vars['ST']['management_password_name'] ?></td>
						<td class="trtitle02"><input type="text" name="name" size="23" maxlength="20" class="infoInput" value="<?php echo $this->_tpl_vars['memberinfo']['name'] ?>"/></td>
					</tr>
					<tr class="trstyle2">
						<td class="trtitle01"><?php echo $this->_tpl_vars['ST']['management_password_sex'] ?></td>
						<td class="trtitle02">
						    <input type="radio" value="1" name="sex"<?php if($this->_tpl_vars['memberinfo']['sex']==1){ ?> checked="checked"<?php } ?>/> <?php echo $this->_tpl_vars['ST']['select_sex_1'] ?>&nbsp;
						    <input type="radio" value="0" name="sex"<?php if($this->_tpl_vars['memberinfo']['sex']==0){ ?> checked="checked"<?php } ?>/> <?php echo $this->_tpl_vars['ST']['select_sex_0'] ?>
						</td>
					</tr>
				</table>
			</div>
		</div>
	</div>
</div>
<div id="downbotton">
	<div id="subbotton">
		<table border="0" width="100%">
			<tr id="bottonsubmit">
				<td id="right"><input type="submit" name="Submit" value="<?php echo $this->_tpl_vars['ST']['botton_edit'] ?>" class="buttonface" title="<?php echo $this->_tpl_vars['ST']['botton_edit'] ?>"/></td>
				<td id="left" class="padding-left5"><input type="reset" name="reset" value="<?php echo $this->_tpl_vars['ST']['botton_edit_reset'] ?>" onclick="javascript:resetwindow();" class="buttonface"  title="<?php echo $this->_tpl_vars['ST']['botton_edit_reset'] ?>"/></td>
			</tr>
		</table>
	</div>
</div>
</form>
</body>

</html>
