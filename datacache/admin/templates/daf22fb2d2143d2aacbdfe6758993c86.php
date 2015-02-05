<?php if(count($this->_tpl_vars['array']) > 0){ ?>
<?php if (count($this->_tpl_vars['array'])>0){$divid_list=1;for($list=0;$list<count($this->_tpl_vars['array']); $list++){?>
<div class="infolist" onselectstart="return false;" title="<?php echo $this->_tpl_vars['array'][$list]['name'] ?>-<?php echo $this->_tpl_vars['array'][$list]['typename'] ?>" <?php if($this->powercheck(23,52)==true ){ ?>ondblClick="javascript:parent.onbotton('<?php echo $this->_tpl_vars['ST']['callmain_edit_title'] ?>','index.php?archive=callmain&action=calledit&cid=<?php echo $this->_tpl_vars['array'][$list]['cid'] ?>&freshid='+Math.random()+'&iframename='+self.frameElement.getAttribute('name'),true,'calledit<?php echo $this->_tpl_vars['array'][$list]['cid'] ?>',self.frameElement.getAttribute('name'));"<?php } ?>>
	<table border="0" style="border-collapse:collapse" width="100%" bordercolor="#FFFFFF">
		<tr>
			<td width="5%"><input type="checkbox" name="selectinfoid" value="<?php echo $this->_tpl_vars['array'][$list]['cid'] ?>"></td>
			<td width="10%">
				<input type="hidden" name="infoid" id="infoid" value="<?php echo $this->_tpl_vars['array'][$list]['cid'] ?>">
				<input type="text" name="pid" size="3" value="<?php echo $this->_tpl_vars['array'][$list]['pid'] ?>" class="infoInput" onclick="if(this.value=='<?php echo $this->_tpl_vars['array'][$list]['pid'] ?>'){this.value = '';}else {this.select();}" onblur="if(this.value ==''){this.value ='<?php echo $this->_tpl_vars['array'][$list]['pid'] ?>';}">
			</td>
			<td width="10%"><?php echo $this->_tpl_vars['array'][$list]['cid'] ?></td>
			<td width="30%"><?php echo $this->_tpl_vars['array'][$list]['name'] ?></td>
			<td width="20%"><?php echo $this->_tpl_vars['array'][$list]['typename'] ?></td>
			<td width="10%" id="infotype">
				<table>
					<tr>
						<td><?php if($this->_tpl_vars['array'][$list]['isclass']==1){ ?><font class="colorthree strong"><?php echo $this->_tpl_vars['ST']['callmain_audit_ok'] ?><?php }else{ ?><font class="colorgreg strong"><?php echo $this->_tpl_vars['ST']['callmain_audit_no'] ?><?php } ?></td>
					</tr>
				</table>
			</td>
			<td width="10%" id="infotype">
				<?php if($this->powercheck(23,52)==true ){ ?>
				<table>
					<tr>
						<td><a class="setedit" onclick="javascript:parent.onbotton('<?php echo $this->_tpl_vars['ST']['callmain_edit_title'] ?>','index.php?archive=callmain&action=calledit&cid=<?php echo $this->_tpl_vars['array'][$list]['cid'] ?>&freshid='+Math.random()+'&iframename='+self.frameElement.getAttribute('name'),false,'calledit<?php echo $this->_tpl_vars['array'][$list]['cid'] ?>',self.frameElement.getAttribute('name'));" id="calledit<?php echo $this->_tpl_vars['array'][$list]['cid'] ?>" href="#body" title="<?php echo $this->_tpl_vars['ST']['callmain_edit_title'] ?>" hidefocus="true"><?php echo $this->_tpl_vars['ST']['setedit_botton'] ?></a></td>
					</tr>
				</table>
				<?php } ?>
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