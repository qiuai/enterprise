<?php if(count($this->_tpl_vars['array']) > 0){ ?>
<?php if (count($this->_tpl_vars['array'])>0){$divid_list=1;for($list=0;$list<count($this->_tpl_vars['array']); $list++){?>
<div class="infolist" onselectstart="return false;" title="<?php echo $this->_tpl_vars['array'][$list]['lngtitle'] ?>-<?php echo $this->_tpl_vars['array'][$list]['lng'] ?>" <?php if($this->powercheck('system','lngedit')==true ){ ?> ondblClick="javascript:parent.onbotton('<?php echo $this->_tpl_vars['ST']['language_edit_title'] ?>','index.php?archive=language&action=lngedit&id=<?php echo $this->_tpl_vars['array'][$list]['id'] ?>&freshid='+Math.random()+'&iframename='+self.frameElement.getAttribute('name'),false);"<?php } ?>>
	<table border="0" style="border-collapse:collapse" width="100%" bordercolor="#FFFFFF">
		<tr>
			<td width="5%"><input type="checkbox" name="selectinfoid" value="<?php echo $this->_tpl_vars['array'][$list]['id'] ?>"></td>
			<td width="8%">
				<input type="hidden" name="infoid" id="infoid" value="<?php echo $this->_tpl_vars['array'][$list]['id'] ?>">
				<input type="text" name="pid" size="3" value="<?php echo $this->_tpl_vars['array'][$list]['pid'] ?>" class="infoInput"  onclick="if(this.value=='<?php echo $this->_tpl_vars['array'][$list]['pid'] ?>'){this.value = '';}else {this.select();}" onblur="if(this.value ==''){this.value ='<?php echo $this->_tpl_vars['array'][$list]['pid'] ?>';}">
			</td>
			<td width="8%"><?php echo $this->_tpl_vars['array'][$list]['id'] ?></td>
			<td width="20%"><?php echo $this->_tpl_vars['array'][$list]['lngtitle'] ?></td>
			<td width="13%"><?php echo $this->_tpl_vars['array'][$list]['lng'] ?></td>
			<td width="8%" id="infotype">
				<table>
					<tr>
						<td><?php if($this->_tpl_vars['array'][$list]['isopen']==1){ ?><font class="colorthree strong"><?php echo $this->_tpl_vars['ST']['language_audit_ok'] ?><?php }else{ ?><font class="colorgreg strong"><?php echo $this->_tpl_vars['ST']['language_audit_no'] ?><?php } ?></font></td>
					</tr>
				</table>
			</td>
			<td width="38%" id="infotype">
				<table>
					<tr>
						<?php if($this->powercheck('system','lngedit')==true ){ ?>
						<td><a class="setedit" onclick="javascript:parent.onbotton('<?php echo $this->_tpl_vars['ST']['language_edit_title'] ?>','index.php?archive=language&action=lngedit&id=<?php echo $this->_tpl_vars['array'][$list]['id'] ?>&freshid='+Math.random()+'&iframename='+self.frameElement.getAttribute('name'),false);" href="#body" title="<?php echo $this->_tpl_vars['ST']['language_edit_title'] ?>" hidefocus="true"><?php echo $this->_tpl_vars['ST']['setedit_botton'] ?></a></td>
						<?php } ?>
						<?php if($this->powercheck('system','lngcreat')==true && $this->_tpl_vars['array'][$list]['isalong']==1){ ?>
						<td class="padding-left3"><a class="setedit3" onclick="javascript:submiturl('index.php?archive=language&action=lngcreat&id=<?php echo $this->_tpl_vars['array'][$list]['id'] ?>&lng=<?php echo $this->_tpl_vars['array'][$list]['lng'] ?>','index.php?archive=management&action=load','<?php echo $this->_tpl_vars['ST']['run_ok'] ?>','<?php echo $this->_tpl_vars['ST']['run_no'] ?>',true,'<?php echo $this->_tpl_vars['ST']['language_creat_index_mess'] ?>','selectform','selectall','check_all')" href="#body" title="<?php echo $this->_tpl_vars['ST']['language_creat_index'] ?>" hidefocus="true"><?php echo $this->_tpl_vars['ST']['language_creat_index'] ?></a></td>
						<?php } ?>
						<?php if($this->powercheck('system','packcopy')==true && $this->_tpl_vars['array'][$list]['isuptype']==0){ ?>
						<td class="padding-left3"><a class="setedit3" onclick="javascript:parent.onbotton('<?php echo $this->_tpl_vars['ST']['language_copylanpack_title'] ?>','index.php?archive=language&action=lngpackcopy&id=<?php echo $this->_tpl_vars['array'][$list]['id'] ?>&freshid='+Math.random()+'&iframename='+self.frameElement.getAttribute('name'),false);" href="#body" title="<?php echo $this->_tpl_vars['ST']['language_copylanpack_title'] ?>" hidefocus="true"><?php echo $this->_tpl_vars['ST']['language_copylanpack_title'] ?></a></td>
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