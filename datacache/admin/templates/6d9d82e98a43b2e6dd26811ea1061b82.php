<?php if($this->_tpl_vars['updirtype']==1){ ?>
<div class="infolist">
	<table border="0" style="border-collapse:collapse" width="100%" bordercolor="#FFFFFF" onclick="javascript:search('<?php echo $this->_tpl_vars['uploadurl'] ?>');">
			<tr>
				<td width="5%"></td>
				<td width="40%" id="left" class="padding-left3"><img src="templates/images/fileicon/dir.png"> /<?php echo $this->_tpl_vars['dirlist'] ?></td>
				<td width="10%"></td>
				<td width="20%"></td>
				<td width="25%" id="infotype">
					<table border="0" style="border-collapse:collapse" bordercolor="#FFFFFF">
						<tr>
							<td><a class="setedit3" href="#body" onclick="javascript:search('<?php echo $this->_tpl_vars['uploadurl'] ?>');" title="<?php echo $this->_tpl_vars['ST']['filemanage_view_updir'] ?>" hidefocus="true"><?php echo $this->_tpl_vars['ST']['filemanage_view_updir'] ?></a></td>
						</tr>
					</table>
				</td>
			</tr>
		</table>
</div>
<?php } ?>
<input type="hidden" name="filepath" id="filepath" value="<?php echo $this->_tpl_vars['dirlist'] ?>">
<?php if(count($this->_tpl_vars['array']) > 0){ ?>
<?php if (count($this->_tpl_vars['array'])>0){$divid_list=1;for($list=0;$list<count($this->_tpl_vars['array']); $list++){?>
<div class="infolist">
	<?php if($this->_tpl_vars['array'][$list]['bottype']=='dir'){ ?>
	<table border="0" style="border-collapse:collapse" width="100%" title="<?php echo $this->_tpl_vars['ST']['filemanage_view_opendir'] ?>" bordercolor="#FFFFFF" ondblClick="javascript:search('<?php echo $this->_tpl_vars['array'][$list]['loadurl'] ?>');">
	<?php }else{ ?>
	<table border="0"  style="border-collapse:collapse" width="100%" bordercolor="#FFFFFF">
	<?php } ?>
		<tr>
			<td width="5%"><input type="checkbox" name="selectinfoid" value="<?php echo $this->_tpl_vars['array'][$list]['basename'] ?>"></td>
			<td width="40%" id="left" class="padding-left3"><img src="templates/images/fileicon/<?php echo $this->_tpl_vars['array'][$list]['type'] ?>.png"> <?php echo $this->_tpl_vars['array'][$list]['filename'] ?></td>
			<td width="10%"><?php if($this->_tpl_vars['array'][$list]['bottype']!='dir'){ ?><?php echo $this->format_size($this->_tpl_vars['array'][$list]['size'],1) ?><?php } ?></td>
			<td width="20%"><?php echo $this->timeformat($this->_tpl_vars['array'][$list]['time'],3) ?></td>
			<td width="25%" id="infotype">
				<table border="0" style="border-collapse:collapse" bordercolor="#FFFFFF">
					<tr>
						<?php if($this->_tpl_vars['array'][$list]['bottype']!='dir' && $this->_tpl_vars['array'][$list]['bottype']=='img'){ ?>
						<td>
							<a class="setedit" target="_blank" href="<?php echo $this->_tpl_vars['array'][$list]['url'] ?>" hidefocus="true"><?php echo $this->_tpl_vars['ST']['filemanage_view_botton'] ?></a>
						</td>
						<?php if($this->powercheck('communicate','fileedit')==true ){ ?>
						<td class="padding-left3">
							<a class="setedit2" onclick="javascript:parent.onbotton('<?php echo $this->_tpl_vars['ST']['filemanage_view_edit'] ?>','index.php?archive=filemain&action=imagecrop&dir=<?php echo $this->_tpl_vars['dirlist'] ?>&filename=<?php echo $this->_tpl_vars['array'][$list]['basename'] ?>&type=<?php echo $this->_tpl_vars['array'][$list]['type'] ?>&freshid='+Math.random()+'&iframename='+self.frameElement.getAttribute('name'),true,'imagecrop<?php echo $this->_tpl_vars['array'][$list]['fid'] ?>',self.frameElement.getAttribute('name'));" id="imagecrop<?php echo $this->_tpl_vars['array'][$list]['fid'] ?>" href="#body" title="<?php echo $this->_tpl_vars['ST']['filemanage_view_edit'] ?>" hidefocus="true"><?php echo $this->_tpl_vars['ST']['filemanage_view_edit'] ?></a>
						</td>
						<?php } ?>
						<?php } ?>
						<?php if($this->powercheck('communicate','fileedit')==true && $this->_tpl_vars['array'][$list]['bottype']=='dir' ){ ?>
						<td class="padding-left3">
							<a class="setedit3" onclick="javascript:parent.onbotton('<?php echo $this->_tpl_vars['ST']['filemanage_view_rename1'] ?>','index.php?archive=filemain&action=renamedir&dir=<?php echo $this->_tpl_vars['dirlist'] ?>&filename=<?php echo $this->_tpl_vars['array'][$list]['basename'] ?>&type=dir&freshid='+Math.random()+'&iframename='+self.frameElement.getAttribute('name'),true,'filerename<?php echo $this->_tpl_vars['array'][$list]['fid'] ?>',self.frameElement.getAttribute('name'));" id="filerename<?php echo $this->_tpl_vars['array'][$list]['fid'] ?>" href="#body" title="<?php echo $this->_tpl_vars['ST']['filemanage_view_rename1'] ?>" hidefocus="true"><?php echo $this->_tpl_vars['ST']['filemanage_view_rename1'] ?></a>
						</td>
						<?php } ?>
						<?php if($this->powercheck('communicate','fileedit')==true && $this->_tpl_vars['array'][$list]['bottype']!='dir' ){ ?>
						<td class="padding-left3">
							<a class="setedit3" onclick="javascript:parent.onbotton('<?php echo $this->_tpl_vars['ST']['filemanage_view_rename'] ?>','index.php?archive=filemain&action=renamedir&dir=<?php echo $this->_tpl_vars['dirlist'] ?>&filename=<?php echo $this->_tpl_vars['array'][$list]['basename'] ?>&type=<?php echo $this->_tpl_vars['array'][$list]['type'] ?>&freshid='+Math.random()+'&iframename='+self.frameElement.getAttribute('name'),true,'filerename<?php echo $this->_tpl_vars['array'][$list]['fid'] ?>',self.frameElement.getAttribute('name'));" id="filerename<?php echo $this->_tpl_vars['array'][$list]['fid'] ?>" href="#body" title="<?php echo $this->_tpl_vars['ST']['filemanage_view_rename'] ?>" hidefocus="true"><?php echo $this->_tpl_vars['ST']['filemanage_view_rename'] ?></a>
						</td>
						<?php } ?>
					</tr>
				</table>
				
			</td>
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