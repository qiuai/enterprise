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
	var createmain_js_linknum_empty  = "<?php echo $this->_tpl_vars['ST']['createmain_js_linknum_empty'] ?>";
	var createmain_js_add_ok  = "<?php echo $this->_tpl_vars['ST']['createmain_js_add_ok'] ?>";
	var createmain_js_add_no  = "<?php echo $this->_tpl_vars['ST']['createmain_js_add_no'] ?>";
	var iframename = "<?php echo $this->_tpl_vars['iframename'] ?>";
	$(document).ready(function(){
		var h = '<?php echo $this->_tpl_vars['iframeheightwindow'] ?>';
		$('.managebottonadd').css({height:h-40});
		var optionsseo = {
			beforeSubmit: seo_formverify,
			success:seo_success
		};
		$("#createseo").submit(function() {
			$(this).ajaxSubmit(optionsseo);
			return false;
		});
	})
	function seo_formverify(formData, jqForm, options) {
		var queryString = $.param(formData);
		var get=urlarray(queryString);
		if(get['linknum'].match(/^[1-9]{1}[0-9]*$/ig)==null) {
			document.createseo.linknum.focus();
			alert(createmain_js_linknum_empty);
			return false;
		}
		parent.windowsdig('Loading','iframe:index.php?archive=management&action=load','400px','180px','iframe',false);
	}
	function seo_success(options){
		parent.closeifram();
		var tab=document.getElementById("createseotab").value;
		if (options=='true'){
			alert(createmain_js_add_ok);
		}else{
			alert(createmain_js_add_no+options);
		}
		if (tab=='true'){
			parent.onaletdoc();
		}
	}
</script>
</head>

<body>
<form method="post" name="createseo" id="createseo" action="index.php?archive=createseomain&action=seosave">
<input type="hidden" name="tab" id="createseotab" value="<?php echo $this->_tpl_vars['tab'] ?>">
<div id="mainbodybottonauto" class="managebottonadd">
	<div class="maindobycontent">
		<div class="suggestion">
			<span class="sugicon"><span class="strong colorgorning2"><?php echo $this->_tpl_vars['ST']['position_title'] ?></span><span class="colorgorningage"><?php echo $this->_tpl_vars['ST']['createmain_seo_mess_title'] ?></span></span>
		</div>
		<div class="manageeditdiv">
			<div class="maneditcontent">
				<table class="formtable">
					<tr class="trstyle2">
						<td class="trtitle01"><?php echo $this->_tpl_vars['ST']['createmain_seo_add_path'] ?></td>
						<td class="trtitle02">/<?php echo $this->_tpl_vars['htmldir'] ?><span id="sitepath">googlesitemap.xml</span></td>
					</tr>
					<tr class="trstyle2">
						<td class="trtitle01"><?php echo $this->_tpl_vars['ST']['createmain_seo_add_priority'] ?></td>
						<td class="trtitle02">
							<select size="1" name="priority">
								<option selected value="0.1">0.1</option>
								<option value="0.2">0.2</option>
								<option value="0.3">0.3</option>
								<option value="0.4">0.4</option>
								<option value="0.5">0.5</option>
								<option value="0.6">0.6</option>
								<option value="0.7">0.7</option>
								<option value="0.8">0.8</option>
								<option value="0.9">0.9</option>
								<option value="1.0">1.0</option>
							</select>
						</td>
					</tr>
					<tr class="trstyle2">
						<td class="trtitle01"><?php echo $this->_tpl_vars['ST']['createmain_seo_add_changefreq'] ?></td>
						<td class="trtitle02">
							<select size="1" name="changefreq">
								<option selected value="always">always</option>
								<option value="hourly">hourly</option>
								<option value="daily">daily</option>
								<option value="weekly">weekly</option>
								<option value="monthly">monthly</option>
								<option value="yearly">yearly</option>
								<option value="never">never</option>
							</select>
						</td>
					</tr>
					<tr class="trstyle2 displaytrue" id="validatetextdiv">
						<td class="trtitle01"><?php echo $this->_tpl_vars['ST']['createmain_seo_add_linknum'] ?></td>
						<td class="trtitle02">
							<input type="text" name="linknum" size="10" maxlength="3" value="100" class="infoInput"/>
							<span class="cautiontitle"><?php echo $this->_tpl_vars['ST']['createmain_seo_add_linknum_mess'] ?></span>
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
				<td><input type="submit" name="Submit" value="<?php echo $this->_tpl_vars['ST']['botton_cerathtml'] ?>" class="buttonface" /></td>
			</tr>
		</table>
	</div>
</div>
</form>
</body>

</html>