<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
<title><?php echo $this->_tpl_vars['softtitle'] ?></title>
<link href="templates/css/baselist.css" rel="stylesheet" type="text/css" />
<link href="templates/css/all.css" rel="stylesheet" type="text/css" />
<link href="templates/css/formdiv.css" rel="stylesheet" type="text/css"/>
<link href="templates/css/prettyPhoto.css" rel="stylesheet" type="text/css"/>
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/control.js"></script>
<script type="text/javascript" src="js/form.js"></script>
<script type="text/javascript" language="JavaScript">
	var filemanage_filecheck_select_allno = "<?php echo $this->_tpl_vars['ST']['filemanage_filecheck_select_allno'] ?>";
	var filemanage_filecheck_select_max = "<?php echo $this->_tpl_vars['ST']['filemanage_filecheck_select_max'] ?>";
	var filemanage_js_album_select_err = "<?php echo $this->_tpl_vars['ST']['filemanage_js_album_select_err'] ?>";
	var fheight="<?php echo $this->_tpl_vars['fheight'] ?>";
	var loadurl="<?php echo $this->_tpl_vars['loadurl'] ?>";
	var iframename = "<?php echo $this->_tpl_vars['iframename'] ?>";
	var inputtext = "<?php echo $this->_tpl_vars['inputtext'] ?>";
	
	$(document).ready(function(){
		var h = parseInt(fheight);
		$('#mainbodybottonauto').css({height:h-73});
	})

	function refile(){

		var albumlist=$('input:[name="filelist"]').val();
		if(albumlist){
			filename=albumlist.substring(0,albumlist.length-1);
			parent.frames[iframename].document.getElementById(inputtext).value = filename;
			parent.closeifram();
		}else{
			alert(filemanage_js_album_select_err);
			return false;
		}
	}

	function resetwindow(){
		parent.closeifram();
	}

	function alselected(gid,imgpath,setype){
		var gidstr="#"+gid;

		var maxselect=$('input:[name="maxselect"]').val();

		var albumlist=$('input:[name="filelist"]').val();
		if (setype=='selected'){

			if (maxselect<1){
				alert(filemanage_filecheck_select_max);

				var htmlse='<input type="checkbox" id="'+gid+'" name="selectinfoid" value="'+imgpath+'" onclick="alselected(\''+gid+'\',this.value,\'selected\');">';
				$(htmlse).replaceAll("#"+gid);
				return false;
			}

			var htmlse='<input type="checkbox" id="'+gid+'" name="selectinfoid" value="'+imgpath+'" onclick="alselected(\''+gid+'\',this.value,\'unde\');" checked>';
			$(htmlse).replaceAll("#"+gid);

			var nowid=Number(maxselect)-1;
			$('input:[name="maxselect"]').val(nowid);

			var albumlist=albumlist+imgpath+'|';
			$('input:[name="filelist"]').val(albumlist);
		}else{

			var htmlse='<input type="checkbox" id="'+gid+'" name="selectinfoid" value="'+imgpath+'" onclick="alselected(\''+gid+'\',this.value,\'selected\');">';
			$(htmlse).replaceAll("#"+gid);

			var maxnowid=Number(maxselect)+1;
			$('input:[name="maxselect"]').val(maxnowid);

			var albumlist=albumlist.replace(imgpath+"|","");
			$('input:[name="filelist"]').val(albumlist);
		}
	}
</script>
</head>
	
<body>
<input type="hidden" name="maxselect" value="1"/>
<input type="hidden" name="filelist" value=""/>
<div id="mainwindowhidden">
	<div class="suggestion">
		<span class="sugicon"><span class="strong colorgorning2"><?php echo $this->_tpl_vars['ST']['position_title'] ?></span><span class="padding-left5 colorgorningage"><?php echo $this->_tpl_vars['ST']['templatemain_listwindow_path_mess'] ?><?php echo $this->_tpl_vars['templateDIR'] ?><?php echo $this->_tpl_vars['dirlist'] ?></span></span>
	</div>
	<div class="sugtitle-line"></div>
</div>
<div id="mainbodybottonauto">
	<div class="filelist" id="imglist">
	<?php if($this->_tpl_vars['updirtype']==1){ ?>
	<div class="infolist" title="<?php echo $this->_tpl_vars['ST']['filemanage_view_updir'] ?>">
		<table border="0" style="border-collapse:collapse" width="100%" bordercolor="#FFFFFF" onclick="javascript:document.location='<?php echo $this->_tpl_vars['uploadurl'] ?>';">
			<tr>
				<td width="5%"></td>
				<td width="75%" id="left" class="padding-left3"><img src="templates/images/fileicon/dir.png"> /<?php echo $this->_tpl_vars['dirlist'] ?></td>
				<td width="20%" id="infotype">
					<table border="0" style="border-collapse:collapse" bordercolor="#FFFFFF">
						<tr>
							<td><a class="setedit3" id="center" href="<?php echo $this->_tpl_vars['uploadurl'] ?>" title="<?php echo $this->_tpl_vars['ST']['filemanage_view_updir'] ?>" hidefocus="true"><?php echo $this->_tpl_vars['ST']['filemanage_view_updir'] ?></a></td>
						</tr>
					</table>
				</td>
			</tr>
		</table>
	</div>
	<?php } ?>
	<?php if(count($this->_tpl_vars['array']) > 0){ ?>
	<?php if (count($this->_tpl_vars['array'])>0){$divid_list=1;for($list=0;$list<count($this->_tpl_vars['array']); $list++){?>
	<div class="infolist gallery clearfix"  title="<?php echo $this->_tpl_vars['array'][$list]['loadurl2'] ?>">
		<?php if($this->_tpl_vars['array'][$list]['bottype']=='dir'){ ?>
		<table border="0" style="border-collapse:collapse" width="100%" bordercolor="#FFFFFF" onclick="javascript:document.location='<?php echo $this->_tpl_vars['array'][$list]['loadurl'] ?>';">
		<?php }else{ ?>
		<table border="0"  style="border-collapse:collapse" width="100%" bordercolor="#FFFFFF">
		<?php } ?>
			<tr>
				<td width="5%">
					<?php if($this->_tpl_vars['array'][$list]['bottype']!='dir'){ ?>
					<input type="checkbox" id="<?php echo $this->_tpl_vars['array'][$list]['fid'] ?>" name="selectinfoid" value="<?php echo $this->_tpl_vars['array'][$list]['filename'] ?>" onclick="alselected('<?php echo $this->_tpl_vars['array'][$list]['fid'] ?>',this.value,'selected');">
					<?php } ?>
				</td>
				<td width="75%" id="left" class="padding-left3"><img src="templates/images/fileicon/<?php echo $this->_tpl_vars['array'][$list]['type'] ?>.png"> <?php echo $this->_tpl_vars['array'][$list]['filename'] ?></td>
				<td width="20%"><?php echo $this->timeformat($this->_tpl_vars['array'][$list]['time'],3) ?></td>
			</tr>
		</table>
	</div>
	<?php }} ?>
	<?php }else{ ?>
	<div class="infolist">
		<table border="0" style="border-collapse:collapse" width="100%" bordercolor="#FFFFFF">
			<tr>
				<td align="center"><?php echo $this->_tpl_vars['ST']['list_nothing_title'] ?></td>
			</tr>
		</table>
	</div>
	<?php } ?>
	</div>
</div>

<div id="downbotton" style="margin-top: 5px;">
	<div id="subbotton">
		<table border="0" width="100%">
			<tr id="bottonsubmit">
				<td id="right"><input type="submit" name="Submit" id="submitbotton" onclick="javascript:refile();" value="<?php echo $this->_tpl_vars['ST']['botton_add'] ?>" class="buttonface" title="<?php echo $this->_tpl_vars['ST']['botton_add'] ?>"/></td>
				<td id="left" class="padding-left5"><input type="reset" name="reset" onclick="javascript:resetwindow();" id="release" value="<?php echo $this->_tpl_vars['ST']['botton_upfile_reset'] ?>" class="buttonface"  title="<?php echo $this->_tpl_vars['ST']['botton_upfile_reset'] ?>" /></td>
			</tr>
		</table>
	</div>
</div>
</body>

</html>