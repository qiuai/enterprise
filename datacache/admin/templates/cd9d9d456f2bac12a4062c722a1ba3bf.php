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
	var languagepack_js_title_empty  = "<?php echo $this->_tpl_vars['ST']['languagepack_js_title_empty'] ?>";
	var languagepack_js_langstr_err = "<?php echo $this->_tpl_vars['ST']['languagepack_js_langstr_err'] ?>";
	var languagepack_js_edit_ok = "<?php echo $this->_tpl_vars['ST']['languagepack_js_edit_ok'] ?>";
	var languagepack_js_edit_no = "<?php echo $this->_tpl_vars['ST']['languagepack_js_edit_no'] ?>";
	var iframename = "<?php echo $this->_tpl_vars['iframename'] ?>";
	$(document).ready(function(){
		var h = '<?php echo $this->_tpl_vars['iframeheightwindow'] ?>';
		$('.managebottonadd').css({height:h-40});
		var options = {

			beforeSubmit: formverify,

			success:saveResponse,
			resetForm: false
		}
		$('#lngpackedit').submit(function() {
			$(this).ajaxSubmit(options);
			return false;
		});
	})




	function formverify(formData) {
		var queryString = $.param(formData);
		var get=urlarray(queryString);
		if(get['title']==""){
			document.lngpackedit.title.focus();
			alert(languagepack_js_title_empty);
			return false;
		}
		if(get['langstr']==""){
			document.lngpackedit.langstr.focus();
			alert(languagepack_js_langstr_err);
			return false;
		}
		parent.windowsdig('Loading','iframe:index.php?archive=management&action=load','400px','180px','iframe',false);
	}
	function saveResponse(options){
		parent.closeifram();
		if (options=='true'){
			parent.frames[iframename].refresh('selectform','selectall','check_all');
			alert(languagepack_js_edit_ok);
		}else{
			alert(languagepack_js_edit_no);
		}
		parent.onaletdoc()
	}
</script>
</head>

<body>
<form name="lngpackedit" id="lngpackedit" method="post" action="index.php?archive=languagepack&action=save">
<input type="hidden" name="inputclass" value="edit">
<input type="hidden" name="lpid" value="<?php echo $this->_tpl_vars['read']['lpid'] ?>">
<input type="hidden" name="lng" value="<?php echo $this->_tpl_vars['read']['lng'] ?>">
<div id="mainbodybottonauto" class="managebottonadd">
	<div class="maindobycontent">
		<div class="suggestion">
			<span class="sugicon"><span class="strong colorgorning2"><?php echo $this->_tpl_vars['ST']['position_title'] ?></span><span class="colorgorningage"><?php echo $this->_tpl_vars['ST']['languagepack_edit_mess'] ?><u><?php echo $this->_tpl_vars['read']['title'] ?></u></span></span>
		</div>
		<div class="manageeditdiv">
			<div class="maneditcontent">
				<table class="formtable">
					<tr class="trstyle2">
						<td class="trtitle01"><?php echo $this->_tpl_vars['ST']['languagepack_add_lng'] ?></td>
						<td class="trtitle02"><?php echo $this->_tpl_vars['read']['lng'] ?></td>
					</tr>
					<tr class="trstyle2">
						<td class="trtitle01"><?php echo $this->_tpl_vars['ST']['languagepack_add_keycode'] ?></td>
						<td class="trtitle02"><?php echo $this->_tpl_vars['read']['keycode'] ?></td>
					</tr>
					<tr class="trstyle2">
						<td class="trtitle01"><?php echo $this->_tpl_vars['ST']['languagepack_add_typeid'] ?></td>
						<td class="trtitle02">
							<select size="1" name="typeid" id="typeid">
							<?php if (count($this->_tpl_vars['lantype'])>0){$divid_list=1;for($list=0;$list<count($this->_tpl_vars['lantype']); $list++){?>
								<option <?php if($this->_tpl_vars['read']['typeid'] == $this->_tpl_vars['lantype'][$list]['key']){ ?>selected<?php } ?> value="<?php echo $this->_tpl_vars['lantype'][$list]['key'] ?>"><?php echo $this->_tpl_vars['lantype'][$list]['name'] ?></option>
							<?php }} ?>
							</select>
						</td>
					</tr>
					<tr class="trstyle2">
						<td class="trtitle01"><?php echo $this->_tpl_vars['ST']['languagepack_add_title'] ?></td>
						<td class="trtitle02"><input type="text" name="title" size="40" maxlength="50" value="<?php echo $this->_tpl_vars['read']['title'] ?>" class="infoInput"/> <span class="cautiontitle"><?php echo $this->_tpl_vars['ST']['languagepack_add_title_mess'] ?></span></td>
					</tr>
					<tr class="trstyle2">
						<td class="trtitle01"><?php echo $this->_tpl_vars['ST']['languagepack_add_langstr'] ?></td>
						<td class="trtitle02" id="codetext"><textarea name="langstr" id="langstr" style="width:98%;height:50px;" class="smallInput"><?php echo $this->_tpl_vars['read']['langstr'] ?></textarea></td>
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