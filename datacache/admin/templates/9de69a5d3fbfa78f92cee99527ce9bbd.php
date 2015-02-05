<?php if(count($this->_tpl_vars['array']) > 0){ ?>
<?php if (count($this->_tpl_vars['array'])>0){$divid_list=1;for($list=0;$list<count($this->_tpl_vars['array']); $list++){?>
<div class="infolist" onselectstart="return false;" title="<?php echo $this->_tpl_vars['array'][$list]['sitename'] ?>" <?php if($this->powercheck('system','siteedit')==true ){ ?> ondblClick="javascript:parent.onbotton('<?php echo $this->_tpl_vars['ST']['sitemain_edit_title'] ?>','index.php?archive=sitemain&action=edit&slid=<?php echo $this->_tpl_vars['array'][$list]['slid'] ?>&freshid='+Math.random()+'&iframename='+self.frameElement.getAttribute('name'),false);"<?php } ?>>
	<table border="0" style="border-collapse:collapse" width="100%" bordercolor="#FFFFFF">
		<tr>
			<td width="5%"><input type="checkbox" name="selectinfoid" value="<?php echo $this->_tpl_vars['array'][$list]['slid'] ?>"></td>
			<td width="10%">
				<input type="hidden" name="infoid" id="infoid" value="<?php echo $this->_tpl_vars['array'][$list]['slid'] ?>">
				<input type="text" name="pid" size="3" value="<?php echo $this->_tpl_vars['array'][$list]['pid'] ?>" class="infoInput"  onclick="if(this.value=='<?php echo $this->_tpl_vars['array'][$list]['pid'] ?>'){this.value = '';}else {this.select();}" onblur="if(this.value ==''){this.value ='<?php echo $this->_tpl_vars['array'][$list]['pid'] ?>';}">
			</td>
			<td width="10%"><?php echo $this->_tpl_vars['array'][$list]['slid'] ?></td>
			<td width="40%"><?php echo $this->_tpl_vars['array'][$list]['sitename'] ?></td>
			<td width="35%" id="infotype">
				<table>
					<tr>
						<?php if($this->powercheck('system','siteedit')==true ){ ?>
						<td><a class="setedit3" onclick="javascript:parent.onbotton('<?php echo $this->_tpl_vars['ST']['sitemain_edit_title'] ?>','index.php?archive=sitemain&action=edit&slid=<?php echo $this->_tpl_vars['array'][$list]['slid'] ?>&freshid='+Math.random()+'&iframename='+self.frameElement.getAttribute('name'),false);" href="#body" title="<?php echo $this->_tpl_vars['ST']['sitemain_edit_title'] ?>" hidefocus="true"><?php echo $this->_tpl_vars['ST']['sitemain_edit_title'] ?></a></td>
						<td class="padding-left3"><a class="setedit3" target="_blank" href="<?php echo $this->_tpl_vars['array'][$list]['link'] ?>" title="<?php echo $this->_tpl_vars['ST']['sitemain_call_title'] ?>" hidefocus="true"><?php echo $this->_tpl_vars['ST']['sitemain_call_title'] ?></a></td>
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