<?php if(count($this->_tpl_vars['array']) > 0){ ?>
<?php if (count($this->_tpl_vars['array'])>0){$divid_list=1;for($list=0;$list<count($this->_tpl_vars['array']); $list++){?>
<div class="infolist" onselectstart="return false;" title="<?php echo $this->_tpl_vars['array'][$list]['keytypename'] ?>-<?php echo $this->_tpl_vars['array'][$list]['keyworklist'] ?>"<?php if($this->powercheck('marketing','keylinktypeedit')==true ){ ?> ondblClick="javascript:parent.onbotton('<?php echo $this->addslashes($this->_tpl_vars['array'][$list]['keytypename'],'hc') ?><?php echo $this->_tpl_vars['ST']['seomanage_edit_title'] ?>','index.php?archive=seomanage&action=keylinktypeedit&id=<?php echo $this->_tpl_vars['array'][$list]['ktid'] ?>&freshid='+Math.random()+'&iframename='+self.frameElement.getAttribute('name'),true,'keylinktype<?php echo $this->_tpl_vars['array'][$list]['ktid'] ?>',self.frameElement.getAttribute('name'));"<?php } ?>>
	<table border="0" style="border-collapse:collapse" width="100%" bordercolor="#FFFFFF">
		<tr>
			<td width="5%"><input type="checkbox" name="selectinfoid" value="<?php echo $this->_tpl_vars['array'][$list]['ktid'] ?>"></td>
			<td width="10%"><?php echo $this->_tpl_vars['array'][$list]['ktid'] ?></td>
			<td width="10%"><?php echo $this->_tpl_vars['array'][$list]['lng'] ?></td>
			<td width="25%"><?php echo $this->_tpl_vars['array'][$list]['keytypename'] ?></td>
			<td width="40%"><?php echo $this->cutstr($this->_tpl_vars['array'][$list]['keyworklist'],25) ?></td>
			<td width="10%" id="infotype">
				<?php if($this->powercheck('marketing','keylinktypeedit')==true ){ ?>
				<table>
					<tr>
						<td><a class="setedit" onclick="javascript:parent.onbotton('<?php echo $this->addslashes($this->_tpl_vars['array'][$list]['keytypename'],'hc') ?><?php echo $this->_tpl_vars['ST']['seomanage_edit_title'] ?>','index.php?archive=seomanage&action=keylinktypeedit&id=<?php echo $this->_tpl_vars['array'][$list]['ktid'] ?>&freshid='+Math.random()+'&iframename='+self.frameElement.getAttribute('name'),false,'keylinktype<?php echo $this->_tpl_vars['array'][$list]['ktid'] ?>',self.frameElement.getAttribute('name'));" id="keylinktype<?php echo $this->_tpl_vars['array'][$list]['ktid'] ?>" href="#body" title="<?php echo $this->_tpl_vars['ST']['setedit_botton'] ?>" hidefocus="true"><?php echo $this->_tpl_vars['ST']['setedit_botton'] ?></a></td>
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