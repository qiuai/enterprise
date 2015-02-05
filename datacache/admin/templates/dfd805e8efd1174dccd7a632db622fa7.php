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
	var createmain_js_mid_empty  = "<?php echo $this->_tpl_vars['ST']['createmain_js_mid_empty'] ?>";
	var createmain_js_pnumber_empty  = "<?php echo $this->_tpl_vars['ST']['createmain_js_pnumber_empty'] ?>";
	var createmain_js_tid_empty  = "<?php echo $this->_tpl_vars['ST']['createmain_js_tid_empty'] ?>";
	var createmain_js_add_ok  = "<?php echo $this->_tpl_vars['ST']['createmain_js_add_ok'] ?>";
	var createmain_js_add_no  = "<?php echo $this->_tpl_vars['ST']['createmain_js_add_no'] ?>";
	var iframename = "<?php echo $this->_tpl_vars['iframename'] ?>";
	$(document).ready(function(){
		var h = '<?php echo $this->_tpl_vars['iframeheightwindow'] ?>';
		$('.managebottonadd').css({height:h-40});
		var optionsrss = {
			beforeSubmit: formverify_rss,
			success:rss_success
		}
		$("#createrss").submit(function() {
			$(this).ajaxSubmit(optionsrss);
			return false;
		});
	})
	function formverify_rss(formData, jqForm, options) {
		var queryString = $.param(formData);
		var get=urlarray(queryString);
		if(get['mid']==0){
			document.createrss.mid.focus();
			alert(createmain_js_mid_empty);
			return false;
		}
		if(get['pnumber'].match(/^[1-9]{1}[0-9]*$/ig)==null) {
			document.createrss.pnumber.focus();
			alert(createmain_js_pnumber_empty);
			return false;
		}
		if(get['creattype']==0){
			if(get['tid']==0){
				document.createrss.tid.focus();
				alert(createmain_js_tid_empty);
				return false;
			}
		}
		parent.windowsdig('Loading','iframe:index.php?archive=management&action=load','400px','180px','iframe',false);
	}
	function rss_success(options){
		parent.closeifram();
		if (options=='true'){
			alert(createmain_js_add_ok);
		}else{
			alert(createmain_js_add_no+options);
		}
		parent.onaletdoc()
	}

	function searchoption(mid,title){
		var lng=document.createrss.lng.value;
		lng = (lng=='big5') ? 'cn' : lng;
		selectlinkagelng('tid','index.php?archive=connected&action=sctypelist&islinkd=1&optiontitle='+title+'&mid='+mid+'&lng='+lng);
	}

	function lngtype(lng){
		lng = (lng=='big5') ? 'cn' : lng;
		selectlinkagelng('midbotton','index.php?archive=connected&action=scmodellist&creattype=type&isbase=2&lng='+lng);
		searchoption(1000000,"<?php echo $this->escape($this->_tpl_vars['ST']['all_botton'],'url') ?>");
	}
</script>
</head>

<body>
<form method="post" name="createrss" id="createrss" action="index.php?archive=createseomain&action=rsssave">
<div id="mainbodybottonauto" class="managebottonadd">
	<div class="maindobycontent">
		<div class="suggestion">
			<span class="sugicon"><span class="strong colorgorning2"><?php echo $this->_tpl_vars['ST']['position_title'] ?></span><span class="colorgorningage"><?php echo $this->_tpl_vars['ST']['createmain_rss_mess_title'] ?></span></span>
		</div>
		<div class="manageeditdiv">
			<div class="maneditcontent">
				<table class="formtable">
					<tr class="trstyle2">
						<td class="trtitle01"><?php echo $this->_tpl_vars['ST']['createmain_add_lng'] ?></td>
						<td class="trtitle02">
							<?php if($this->_tpl_vars['is_alonelng']==1){ ?>
								<?php echo $this->_tpl_vars['home_lng'] ?>
								<input type="hidden" name="lng" id="lng" value="<?php echo $this->_tpl_vars['home_lng'] ?>">
							<?php }else{ ?>
								<select size="1" name="lng" id="lng" onchange="javascript:lngtype(this.value);">
								<?php if (count($this->_tpl_vars['lnglist'])>0){$divid_list=1;for($list=0;$list<count($this->_tpl_vars['lnglist']); $list++){?>
									<option <?php echo $this->_tpl_vars['lnglist'][$list]['selected'] ?> value="<?php echo $this->_tpl_vars['lnglist'][$list]['lng'] ?>"><?php echo $this->_tpl_vars['lnglist'][$list]['lngtitle'] ?></option>
								<?php }} ?>
								</select>
							<?php } ?>
						</td>
					</tr>
					<tr class="trstyle2">
						<td class="trtitle01"><?php echo $this->_tpl_vars['ST']['createmain_add_mid'] ?></td>
						<td class="trtitle02">
							<select size="1" name="mid" id="midbotton" onchange="javascript:searchoption(this.value,'<?php echo $this->escape($this->_tpl_vars['ST']['all_botton'],'url') ?>')">
								<option value="0"><?php echo $this->_tpl_vars['ST']['createmain_add_mid_option'] ?></option>
								<?php if (count($this->_tpl_vars['modelarray'])>0){$divid_list=1;for($list=0;$list<count($this->_tpl_vars['modelarray']); $list++){?>
								<option value="<?php echo $this->_tpl_vars['modelarray'][$list]['mid'] ?>"><?php echo $this->_tpl_vars['modelarray'][$list]['modelname'] ?></option>
								<?php }} ?>
							</select>
						</td>
					</tr>
					<tr class="trstyle2">
						<td class="trtitle01"><?php echo $this->_tpl_vars['ST']['createmain_add_tid'] ?></td>
						<td class="trtitle02">
							<select size="1" name="tid" id="tid">
								<option value="0"><?php echo $this->_tpl_vars['ST']['all_botton'] ?></option>
							</select>
						</td>
					</tr>
					<tr class="trstyle2">
						<td class="trtitle01"><?php echo $this->_tpl_vars['ST']['createmain_add_creattype'] ?></td>
						<td class="trtitle02">
							<input type="radio" value="1" name="creattype" checked="checked"/> <?php echo $this->_tpl_vars['ST']['createmain_add_creattype1'] ?>&nbsp;
							<input type="radio" value="0" name="creattype"/> <?php echo $this->_tpl_vars['ST']['createmain_add_creattype2'] ?>
							<span class="cautiontitle"><?php echo $this->_tpl_vars['ST']['createmain_add_creattype_mess'] ?></span>
						</td>
					</tr>
					<tr class="trstyle2">
						<td class="trtitle01"><?php echo $this->_tpl_vars['ST']['createmain_rss_add_num'] ?></td>
						<td class="trtitle02">
							<input type="text" name="pnumber" size="5" maxlength="4" value="30" class="infoInput"/>
							<span class="cautiontitle"><?php echo $this->_tpl_vars['ST']['createmain_rss_add_num_mess'] ?></span>
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