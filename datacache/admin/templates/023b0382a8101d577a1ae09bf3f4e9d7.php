<?php if(count($this->_tpl_vars['array']) > 0){ ?>
<?php if (count($this->_tpl_vars['array'])>0){$divid_list=1;for($list=0;$list<count($this->_tpl_vars['array']); $list++){?>
<div class="infolist" onselectstart="return false;" <?php if($this->powercheck('article','acmessagere')==true ){ ?>ondblClick="javascript:parent.onbotton('<?php echo $this->_tpl_vars['ST']['viewfield_botton'] ?>','index.php?archive=acmessagemain&action=acmessagere&dmid=<?php echo $this->_tpl_vars['array'][$list]['dmid'] ?>&type=edit&freshid='+Math.random()+'&iframename='+self.frameElement.getAttribute('name'),false,'articleeditbotton<?php echo $this->_tpl_vars['array'][$list]['dmid'] ?>',self.frameElement.getAttribute('name'));"<?php } ?>>
	<table border="0" style="border-collapse:collapse" width="100%" bordercolor="#FFFFFF">
		<tr>
			<td width="4%"><input type="checkbox" name="selectinfoid" value="<?php echo $this->_tpl_vars['array'][$list]['dmid'] ?>"></td>
			<td width="7%"><?php echo $this->_tpl_vars['array'][$list]['dmid'] ?></td>
			<td width="14%"><?php echo $this->ip($this->_tpl_vars['array'][$list]['ipadd'],0) ?></td>
			<td width="14%"><?php echo $this->_tpl_vars['array'][$list]['name'] ?></td>
			<td width="6%"><?php echo $this->_tpl_vars['array'][$list]['support'] ?></td>
			<td width="6%"><?php echo $this->_tpl_vars['array'][$list]['oppose'] ?></td>
			<td width="14%"><?php echo $this->timeformat($this->_tpl_vars['array'][$list]['addtime'],3) ?></td>
			<td width="14%"><?php if($this->_tpl_vars['array'][$list]['retime']>0){ ?><?php echo $this->timeformat($this->_tpl_vars['array'][$list]['retime'],3) ?><?php }else{ ?><span class="strong colorgreg"><?php echo $this->_tpl_vars['ST']['formmessmain_isreply_botton2'] ?></span><?php } ?></td>
			<td width="6%" id="infotype">
				<table>
					<tr>
						<td><?php if($this->_tpl_vars['array'][$list]['isreply']==1){ ?><span class="select_ok"></span><?php }else{ ?><span class="select_no"></span><?php } ?></td>
					</tr>
				</table>
			</td>
			<td width="6%" id="infotype">
				<table>
					<tr>
						<td><?php if($this->_tpl_vars['array'][$list]['isclass']==1){ ?><span class="select_ok"></span><?php }else{ ?><span class="select_no"></span><?php } ?></td>
					</tr>
				</table>
			</td>
			<td width="9%" id="infotype">
				<?php if($this->powercheck('article','acmessagere')==true ){ ?>
				<table border="0" style="border-collapse:collapse" bordercolor="#FFFFFF">
					<tr>
						<td><a class="setedit" onclick="javascript:parent.onbotton('<?php echo $this->_tpl_vars['ST']['viewfield_botton'] ?>','index.php?archive=acmessagemain&action=acmessagere&dmid=<?php echo $this->_tpl_vars['array'][$list]['dmid'] ?>&type=edit&freshid='+Math.random()+'&iframename='+self.frameElement.getAttribute('name'),false,'articleeditbotton<?php echo $this->_tpl_vars['array'][$list]['dmid'] ?>',self.frameElement.getAttribute('name'));" id="articleeditbotton<?php echo $this->_tpl_vars['array'][$list]['dmid'] ?>" href="#body" title="<?php echo $this->_tpl_vars['ST']['viewfield_botton'] ?>" hidefocus="true"><?php echo $this->_tpl_vars['ST']['viewfield_botton'] ?></a></td>
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