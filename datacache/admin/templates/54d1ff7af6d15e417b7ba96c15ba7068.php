<?php if(count($this->_tpl_vars['array']) > 0){ ?>
<?php if (count($this->_tpl_vars['array'])>0){$divid_list=1;for($list=0;$list<count($this->_tpl_vars['array']); $list++){?>
<div class="infolist" onselectstart="return false;" title="<?php echo $this->_tpl_vars['array'][$list]['username'] ?> - <?php echo $this->_tpl_vars['array'][$list]['rankname'] ?>-<?php echo $this->timeformat($this->_tpl_vars['array'][$list]['addtime'],3) ?> - <?php echo $this->_tpl_vars['ST']['membermain_text_lasttime'] ?><?php echo $this->timeformat($this->_tpl_vars['array'][$list]['lasttime'],3) ?>" <?php if($this->powercheck('member','memberedit')==true ){ ?>ondblClick="javascript:parent.onbotton('<?php echo $this->_tpl_vars['ST']['membermain_edit_title'] ?>','index.php?archive=membermain&action=memberedit&userid=<?php echo $this->_tpl_vars['array'][$list]['userid'] ?>&type=edit&freshid='+Math.random()+'&iframename='+self.frameElement.getAttribute('name'),true,'memberedit<?php echo $this->_tpl_vars['array'][$list]['userid'] ?>',self.frameElement.getAttribute('name'));"<?php } ?>>
	<table border="0" style="border-collapse:collapse" width="100%" bordercolor="#FFFFFF">
		<tr>
			<td width="4%"><input type="checkbox" name="memberselectinfoid" value="<?php echo $this->_tpl_vars['array'][$list]['userid'] ?>"></td>
			<td width="8%"><?php echo $this->_tpl_vars['array'][$list]['userid'] ?></td>
			<td width="20%"><?php echo $this->_tpl_vars['array'][$list]['username'] ?></td>
			<td width="15%"><?php echo $this->_tpl_vars['array'][$list]['rankname'] ?></td>
			<td width="25%"><?php echo $this->_tpl_vars['array'][$list]['email'] ?></td>
			<td width="8%"><?php echo $this->_tpl_vars['array'][$list]['integral'] ?></td>
			<td width="8%"><?php echo $this->_tpl_vars['array'][$list]['visitcount'] ?></td>
			<td width="5%" id="infotype">
				<table>
					<tr>
						<td><?php if($this->_tpl_vars['array'][$list]['isclass']==1){ ?><span class="audit_ok" title="<?php echo $this->_tpl_vars['ST']['membermain_text_class1'] ?>"></span><?php }else{ ?><span class="audit_no" title="<?php echo $this->_tpl_vars['ST']['membermain_text_class2'] ?>"></span><?php } ?></td>
					</tr>
				</table>
			</td>
			<td width="7%" id="infotype">
				<?php if($this->powercheck('member','memberedit')==true ){ ?>
				<table border="0" style="border-collapse:collapse" bordercolor="#FFFFFF">
					<tr>
						<td><a class="setedit" onclick="javascript:parent.onbotton('<?php echo $this->_tpl_vars['ST']['membermain_edit_title'] ?>','index.php?archive=membermain&action=memberedit&userid=<?php echo $this->_tpl_vars['array'][$list]['userid'] ?>&type=edit&freshid='+Math.random()+'&iframename='+self.frameElement.getAttribute('name'),false,'memberedit<?php echo $this->_tpl_vars['array'][$list]['userid'] ?>',self.frameElement.getAttribute('name'));" id="memberedit<?php echo $this->_tpl_vars['array'][$list]['userid'] ?>" href="#body" title="<?php echo $this->_tpl_vars['array'][$list]['username'] ?><?php echo $this->_tpl_vars['ST']['membermain_edit_title'] ?>" hidefocus="true"><?php echo $this->_tpl_vars['ST']['setedit_botton'] ?></a></td>
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