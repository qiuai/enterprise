<?php if(count($this->_tpl_vars['array']) > 0){ ?>
<?php if (count($this->_tpl_vars['array'])>0){$divid_list=1;for($list=0;$list<count($this->_tpl_vars['array']); $list++){?>
<div class="infolist" onselectstart="return false;" title="<?php echo $this->_tpl_vars['array'][$list]['keycode'] ?>-<?php echo $this->_tpl_vars['array'][$list]['langstr'] ?>" <?php if($this->powercheck('system','lanpackedit')==true ){ ?>ondblClick="javascript:parent.onbotton('<?php echo $this->_tpl_vars['ST']['language_edit_title'] ?>','index.php?archive=languagepack&action=lanpackedit&lpid=<?php echo $this->_tpl_vars['array'][$list]['lpid'] ?>&freshid='+Math.random()+'&iframename='+self.frameElement.getAttribute('name'),true,'lngpack<?php echo $this->_tpl_vars['array'][$list]['lpid'] ?>',self.frameElement.getAttribute('name'));"<?php } ?>>
	<table border="0" style="border-collapse:collapse" width="100%" bordercolor="#FFFFFF">
		<tr>
			<td width="4%"><?php if($this->_tpl_vars['array'][$list]['lockin']==0){ ?><input type="checkbox" name="selectinfoid" value="<?php echo $this->_tpl_vars['array'][$list]['lpid'] ?>"><?php } ?></td>
			<td width="5%"><?php echo $this->_tpl_vars['array'][$list]['lpid'] ?></td>
			<td width="21%"><?php echo $this->cutstr($this->_tpl_vars['array'][$list]['title'],15) ?></td>
			<td width="18%"><?php echo $this->_tpl_vars['array'][$list]['keycode'] ?></td>
			<td width="42%"><?php echo $this->cutstr($this->_tpl_vars['array'][$list]['langstr'],32) ?></td>
			<td width="10%" id="infotype">
				<?php if($this->powercheck('system','lanpackedit')==true ){ ?>
				<table>
					<tr>
						<td><a class="setedit" onclick="javascript:parent.onbotton('<?php echo $this->_tpl_vars['ST']['language_edit_title'] ?>','index.php?archive=languagepack&action=lanpackedit&lpid=<?php echo $this->_tpl_vars['array'][$list]['lpid'] ?>&freshid='+Math.random()+'&iframename='+self.frameElement.getAttribute('name'),false,'lngpack<?php echo $this->_tpl_vars['array'][$list]['lpid'] ?>',self.frameElement.getAttribute('name'));" id="lngpack<?php echo $this->_tpl_vars['array'][$list]['lpid'] ?>" href="#body" title="<?php echo $this->_tpl_vars['ST']['language_edit_title'] ?>" hidefocus="true"><?php echo $this->_tpl_vars['ST']['setedit_botton'] ?></a></td>
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