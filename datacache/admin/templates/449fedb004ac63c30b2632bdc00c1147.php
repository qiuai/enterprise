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
	var language_js_lngtitle_empty = "<?php echo $this->_tpl_vars['ST']['language_js_lngtitle_empty'] ?>";
	var language_js_url_err = "<?php echo $this->_tpl_vars['ST']['language_js_url_err'] ?>";
	var language_js_packname_err = "<?php echo $this->_tpl_vars['ST']['language_js_packname_err'] ?>";
	var language_js_edit_ok = "<?php echo $this->_tpl_vars['ST']['language_js_edit_ok'] ?>";
	var language_js_edit_no = "<?php echo $this->_tpl_vars['ST']['language_js_edit_no'] ?>";
	var lngcode_yes = "<?php echo $this->_tpl_vars['ST']['lngcode_yes'] ?>";
	var lngcode_no = "<?php echo $this->_tpl_vars['ST']['lngcode_no'] ?>";
	var iframename = "<?php echo $this->_tpl_vars['iframename'] ?>";
	$(document).ready(function(){
		var h = '<?php echo $this->_tpl_vars['iframeheightwindow'] ?>';
		$('.managebottonadd').css({height:h-40});
		var options = {
			beforeSubmit: formverify,
			success:saveResponse
		}
		$('#lngedit').submit(function() {
			$(this).ajaxSubmit(options);
			return false;
		});
	})




	function formverify(formData) {
		var queryString = $.param(formData);
		var get=urlarray(queryString);
		if(get['ispackedit']=="1"){
			if(get['packnameedit'].match(/^[a-zA-Z]{1,39}$/ig)==null) {
				document.lngedit.packnameedit.focus();
				alert(language_js_packname_err);
				return false;
			}
		}
		if(get['lngtitle']==""){
			document.lngedit.lngtitle.focus();
			alert(language_js_lngtitle_empty);
			return false;
		}
		if(get['url']!=""){
			if(get['url'].match(/^http:\/\/[a-zA-Z.0-9/_]+$/ig)==null) {
				document.lngedit.url.focus();
				alert(language_js_url_err);
				return false;
			}
		}
		parent.windowsdig('Loading','iframe:index.php?archive=management&action=load','400px','180px','iframe',false);
	}
	function saveResponse(options){
		parent.closeifram();
		if (options=='true'){
			parent.frames[iframename].refresh('selectform','selectall','check_all');
			alert(language_js_edit_ok);
		}else{
			alert(language_js_edit_no);
		}
		parent.onaletdoc()
	}

	function checkcode(){
		var packname=document.getElementById("packname").value;
		if(packname==""){
			return false;
		}
		var um=document.getElementById('packnameerr');
		$.ajax({
			type: "POST",
			url: "index.php?archive=language&action=codedb&ispack=1",
			data: "packname="+packname,
			success: function(date){
				if (date=="false"){
					um.innerHTML="<font color=\"red\">"+lngcode_no+"</font>";
					$('#submitbotton').attr('disabled','true');
				}else{
					um.innerHTML="<font color=\"#1CB521\">"+lngcode_yes+"</font>";
					$('#submitbotton').attr('disabled','');
				}
			}
		});
	}
</script>
</head>

<body>
<form name="lngedit" id="lngedit" method="post" action="index.php?archive=language&action=lngsave">
<input type="hidden" name="inputclass" value="edit">
<input type="hidden" name="id" value="<?php echo $this->_tpl_vars['lngread']['id'] ?>">
<input type="hidden" name="lng" value="<?php echo $this->_tpl_vars['lngread']['lng'] ?>">
<input type="hidden" name="ispack" value="<?php echo $this->_tpl_vars['lngread']['ispack'] ?>">
<input type="hidden" name="packname" value="<?php echo $this->_tpl_vars['lngread']['packname'] ?>">
<div id="mainbodybottonauto" class="managebottonadd">
	<div class="maindobycontent">
		<div class="suggestion">
			<span class="sugicon"><span class="strong colorgorning2"><?php echo $this->_tpl_vars['ST']['position_title'] ?></span><span class="colorgorningage"><?php echo $this->_tpl_vars['ST']['language_edit_mess'] ?><u><?php echo $this->_tpl_vars['lngread']['lngtitle'] ?></u></span></span>
		</div>
		<div class="manageeditdiv">
			<div class="maneditcontent">
				<table class="formtable">
					<tr class="trstyle2">
						<td class="trtitle01"><?php echo $this->_tpl_vars['ST']['language_add_lng'] ?></td>
						<td class="trtitle02"><?php echo $this->_tpl_vars['lngread']['lng'] ?></td>
					</tr>
					<?php if($this->_tpl_vars['lngread']['ispack']==1){ ?>
					<tr class="trstyle2">
						<td class="trtitle01"><?php echo $this->_tpl_vars['ST']['language_add_packname'] ?></td>
						<td  class="trtitle02"><?php echo $this->_tpl_vars['lngread']['packname'] ?></td>
					</tr>
					<?php } ?>
					<tr class="trstyle2">
						<td class="trtitle01"><?php echo $this->_tpl_vars['ST']['language_add_ispack_edit'] ?></td>
						<td class="trtitle02">
							<input type="radio" value="1" name="ispackedit" onclick="ondisplay('validatetextdiv','trstyle2 displaytrue')"/> <?php echo $this->_tpl_vars['ST']['open_botton_title'] ?>&nbsp;
							<input type="radio" value="0" name="ispackedit" checked="checked" onclick="ondisplay('validatetextdiv','trstyle2 displaynone')"/> <?php echo $this->_tpl_vars['ST']['close_botton_title'] ?>
							<span class="cautiontitle"><?php echo $this->_tpl_vars['ST']['language_add_ispack_edit_mess'] ?></span>
						</td>
					</tr>
					<tr class="trstyle2 displaynone" id="validatetextdiv">
						<td class="trtitle011"><?php echo $this->_tpl_vars['ST']['language_add_packname'] ?></td>
						<td  class="trtitle02"><input type="text" name="packnameedit" id="packname" size="25" maxlength="40" class="infoInput" onblur="checkcode('packname');"/> <span id="packnameerr" class="cautiontitle"><?php echo $this->_tpl_vars['ST']['language_add_packname_mess'] ?></span></td>
					</tr>
					<tr class="trstyle2">
						<td class="trtitle011"><?php echo $this->_tpl_vars['ST']['language_add_lngtitle'] ?></td>
						<td class="trtitle02"><input type="text" name="lngtitle" size="25" maxlength="50" value="<?php echo $this->_tpl_vars['lngread']['lngtitle'] ?>" class="infoInput"/> <span class="cautiontitle"><?php echo $this->_tpl_vars['ST']['language_add_lngtitle_mess'] ?></span></td>
					</tr>
					<tr class="trstyle2">
						<td class="trtitle01"><?php echo $this->_tpl_vars['ST']['language_add_url'] ?></td>
						<td class="trtitle02"><input type="text" name="url" size="40" maxlength="60"  value="<?php echo $this->_tpl_vars['lngread']['url'] ?>" class="infoInput"/> <span class="cautiontitle"><?php echo $this->_tpl_vars['ST']['language_add_url_mess'] ?></span></td>
					</tr>
					<tr class="trstyle2">
						<td class="trtitle01"><?php echo $this->_tpl_vars['ST']['iswap_title'] ?></td>
						<td class="trtitle02">
							<input type="radio" value="1" name="iswap"<?php if($this->_tpl_vars['lngread']['iswap']==1){ ?> checked="checked"<?php } ?>/> <?php echo $this->_tpl_vars['ST']['open_botton_title'] ?>&nbsp;
							<input type="radio" value="0" name="iswap"<?php if($this->_tpl_vars['lngread']['iswap']==0){ ?> checked="checked"<?php } ?>/> <?php echo $this->_tpl_vars['ST']['close_botton_title'] ?>
							<span class="cautiontitle"><?php echo $this->_tpl_vars['ST']['iswap_title_mess'] ?></span>
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