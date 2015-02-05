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
	var skinmain_js_name_empty  = "<?php echo $this->_tpl_vars['ST']['skinmain_js_name_empty'] ?>";
	var skinmain_js_code_empty  = "<?php echo $this->_tpl_vars['ST']['skinmain_js_code_empty'] ?>";
	var skinmain_js_add_ok = "<?php echo $this->_tpl_vars['ST']['skinmain_js_add_ok'] ?>";
	var skinmain_js_add_no = "<?php echo $this->_tpl_vars['ST']['skinmain_js_add_no'] ?>";
	var iframename = "<?php echo $this->_tpl_vars['iframename'] ?>";
	iframename = iframename=='' ? "jerichotabiframe_0" : iframename;
	$(document).ready(function(){
		var h = '<?php echo $this->_tpl_vars['iframeheightwindow'] ?>';
		$('.managebottonadd').css({height:h-40});
		var options = {
			beforeSubmit: formverify,
			success:saveResponse,
			resetForm: true
		}
		$('#skinadd').submit(function() {
			$(this).ajaxSubmit(options);
			return false;
		});
	})




	function formverify(formData) {
		var queryString = $.param(formData);
		var get=urlarray(queryString);
		if(get['name']==''){
			document.skinadd.name.focus();
			alert(skinmain_js_name_empty);
			return false;
		}
		if(get['code'].match(/^[\w]{2,50}$/g)==null) {
			document.skinadd.code.focus();
			alert(skinmain_js_code_empty);
			return false;
		}
		parent.windowsdig('Loading','iframe:index.php?archive=management&action=load','400px','180px','iframe',false);
	}
	function saveResponse(options){
		parent.closeifram();
		var tab=document.getElementById("skinaddtab").value;
		if (options=='true'){
			if (tab=='true'){
				if(parent.frames[iframename].document.getElementById("selectform")){
					parent.frames[iframename].refresh('selectform','selectall','check_all');
				}
			}
			alert(skinmain_js_add_ok);
		}else{
			alert(skinmain_js_add_no);
		}
		if (tab=='true'){
			parent.onaletdoc()
		}
	}
</script>
</head>

<body>
<form name="skinadd" id="skinadd" method="post" action="index.php?archive=skinmain&action=save">
<input type="hidden" name="inputclass" value="add">
<input type="hidden" name="tab" id="skinaddtab" value="<?php echo $this->_tpl_vars['tab'] ?>">
<div id="mainbodybottonauto" class="managebottonadd">
	<div class="maindobycontent">
		<div class="suggestion">
			<span class="sugicon"><span class="strong colorgorning2"><?php echo $this->_tpl_vars['ST']['position_title'] ?></span><span class="colorgorningage"><?php echo $this->_tpl_vars['ST']['skinmain_add_mess'] ?></span></span>
		</div>
		<div class="manageeditdiv">
			<div class="maneditcontent">
				<table class="formtable">
					<tr class="trstyle2">
						<td width="15%" class="trtitle011"><?php echo $this->_tpl_vars['ST']['skinmain_add_name'] ?></td>
						<td width="85%" class="trtitle02">
							<input type="text" name="name" size="20" maxlength="20" class="infoInput"/>
							<span class="cautiontitle"><?php echo $this->_tpl_vars['ST']['skinmain_add_name_mess'] ?></span>
						</td>
					</tr>
					<tr class="trstyle2">
						<td width="15%" class="trtitle011"><?php echo $this->_tpl_vars['ST']['skinmain_add_code'] ?></td>
						<td width="85%" class="trtitle02">
							<input type="text" name="code" size="20" maxlength="100" class="infoInput" onblur="checktypename('code',this.value,'index.php?archive=skinmain&action=checkcode','codeerrid','<?php echo $this->_tpl_vars['ST']['skinmain_js_code_err2'] ?>','<?php echo $this->_tpl_vars['ST']['skinmain_js_code_err1'] ?>','skinaddsubmit');"/>
							<span class="cautiontitle" id="codeerrid"><?php echo $this->_tpl_vars['ST']['skinmain_add_code_option'] ?></span>
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
				<td id="right"><input type="submit" id="skinaddsubmit" name="Submit" value="<?php echo $this->_tpl_vars['ST']['botton_add'] ?>" class="buttonface" /></td>
				<td id="left" class="padding-left5"><input type="button" name="cancel" onClick="javascript:parent.onaletdoc();" value="<?php echo $this->_tpl_vars['ST']['botton_add_reset'] ?>" class="buttonface" /></td>
			</tr>
		</table>
	</div>
</div>
</form>
</body>

</html>