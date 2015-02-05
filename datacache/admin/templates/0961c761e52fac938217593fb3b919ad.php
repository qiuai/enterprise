<?php if(count($this->_tpl_vars['array']) > 0){ ?>
<?php if (count($this->_tpl_vars['array'])>0){$divid_list=1;for($list=0;$list<count($this->_tpl_vars['array']); $list++){?>
<div class="infolist" onselectstart="return false;" title="<?php echo $this->_tpl_vars['array'][$list]['formgroupname'] ?>（<?php echo $this->_tpl_vars['array'][$list]['formcode'] ?>）"<?php if($this->powercheck(165,171)==true ){ ?> ondblClick="javascript:parent.onbotton('<?php echo $this->addslashes($this->_tpl_vars['array'][$list]['formgroupname'],'hc') ?><?php echo $this->_tpl_vars['ST']['formmain_edit_title'] ?>','index.php?archive=formmain&action=formedit&id=<?php echo $this->_tpl_vars['array'][$list]['fgid'] ?>&type=edit&freshid='+Math.random()+'&iframename='+self.frameElement.getAttribute('name'),true,'formedit<?php echo $this->_tpl_vars['array'][$list]['fgid'] ?>',self.frameElement.getAttribute('name'));"<?php } ?>>
	<table border="0" style="border-collapse:collapse" width="100%" bordercolor="#FFFFFF">
		<tr>
			<td width="5%"><input type="checkbox" name="selectinfoid" value="<?php echo $this->_tpl_vars['array'][$list]['fgid'] ?>"></td>
			<td width="6%"><?php echo $this->_tpl_vars['array'][$list]['fgid'] ?></td>
			<td width="8%"><?php echo $this->_tpl_vars['array'][$list]['lng'] ?></td>
			<td width="39%"><?php echo $this->_tpl_vars['array'][$list]['formgroupname'] ?>（<?php echo $this->_tpl_vars['array'][$list]['formcode'] ?>）</td>
			<td width="6%" id="infotype">
				<table>
					<tr>
						<td><?php if($this->_tpl_vars['array'][$list]['ismenu']==1){ ?><span class="select_ok"></span><?php }else{ ?><span class="select_no"></span><?php } ?></td>
					</tr>
				</table>
			</td>
			<td width="6%" id="infotype">
				<table>
					<tr>
						<td><?php if($this->_tpl_vars['array'][$list]['isseccode']==1){ ?><span class="isseccode_ok" title="<?php echo $this->_tpl_vars['ST']['formmain_isseccode_ok'] ?>"></span><?php }else{ ?><span class="isseccode_no" title="<?php echo $this->_tpl_vars['ST']['formmain_isseccode_no'] ?>"></span><?php } ?></td>
						<td><?php if($this->_tpl_vars['array'][$list]['isclass']==1){ ?><span class="audit_ok" title="<?php echo $this->_tpl_vars['ST']['formmain_audit_ok'] ?>"></span><?php }else{ ?><span class="audit_no" title="<?php echo $this->_tpl_vars['ST']['formmain_audit_no'] ?>"></span><?php } ?></td>
					</tr>
				</table>
			</td>
			<td width="30%" id="infotype">
				<table border="0" style="border-collapse:collapse" bordercolor="#FFFFFF">
					<tr>
						<td><a class="setedit2" onclick="javascript:parent.onbotton('<?php echo $this->addslashes($this->_tpl_vars['array'][$list]['formgroupname'],'hc') ?><?php echo $this->_tpl_vars['ST']['formmain_text_attlist_title'] ?>','index.php?archive=management&action=list&listfunction=formattlist&fgid=<?php echo $this->_tpl_vars['array'][$list]['fgid'] ?>&freshid='+Math.random()+'&iframename='+self.frameElement.getAttribute('name'),true,'attlist<?php echo $this->_tpl_vars['array'][$list]['fgid'] ?>',self.frameElement.getAttribute('name'));" id="attlist<?php echo $this->_tpl_vars['array'][$list]['fgid'] ?>" href="#body" title="<?php echo $this->_tpl_vars['ST']['viewmodeatt_botton'] ?>" hidefocus="true"><?php echo $this->_tpl_vars['ST']['viewmodeatt_botton'] ?></a></td>
						<?php if($this->powercheck('communicate','messlist')==true ){ ?>
						<td class="padding-left3"><a class="setedit3" onclick="javascript:parent.onbotton('<?php echo $this->_tpl_vars['ST']['formmain_text_bottonview'] ?>','index.php?archive=management&action=list&listfunction=messlist&fgid=<?php echo $this->_tpl_vars['array'][$list]['fgid'] ?>&freshid='+Math.random()+'&iframename='+self.frameElement.getAttribute('name'),true,'messlist<?php echo $this->_tpl_vars['array'][$list]['fgid'] ?>',self.frameElement.getAttribute('name'));" id="messlist<?php echo $this->_tpl_vars['array'][$list]['fgid'] ?>" href="#body" title="<?php echo $this->_tpl_vars['ST']['formmain_text_bottonview'] ?>" hidefocus="true"><?php echo $this->_tpl_vars['ST']['formmain_text_bottonview'] ?></a></td>
						<?php } ?>
						<?php if($this->powercheck('communicate','formedit')==true ){ ?>
						<td class="padding-left3"><a class="setedit" onclick="javascript:parent.onbotton('<?php echo $this->addslashes($this->_tpl_vars['array'][$list]['formgroupname'],'hc') ?><?php echo $this->_tpl_vars['ST']['formmain_edit_title'] ?>','index.php?archive=formmain&action=formedit&id=<?php echo $this->_tpl_vars['array'][$list]['fgid'] ?>&type=edit&freshid='+Math.random()+'&iframename='+self.frameElement.getAttribute('name'),false,'formedit<?php echo $this->_tpl_vars['array'][$list]['fgid'] ?>',self.frameElement.getAttribute('name'));" id="formedit<?php echo $this->_tpl_vars['array'][$list]['fgid'] ?>" href="#body" title="<?php echo $this->_tpl_vars['array'][$list]['formgroupname'] ?><?php echo $this->_tpl_vars['ST']['formmain_edit_title'] ?>" hidefocus="true"><?php echo $this->_tpl_vars['ST']['setedit_botton'] ?></a></td>
						<?php } ?>
						<?php if($this->powercheck('communicate','delformattr')==true ){ ?>
						<td class="padding-left3"><a class="setedit" onclick="javascript:submiturl('index.php?archive=formmain&action=delform&id=<?php echo $this->_tpl_vars['array'][$list]['fgid'] ?>&freshid='+Math.random(),'index.php?archive=management&action=load','<?php echo $this->_tpl_vars['ST']['run_ok'] ?>','<?php echo $this->_tpl_vars['ST']['run_no'] ?>',true,'<?php echo $this->_tpl_vars['ST']['del_messok'] ?>','selectform','selectall','check_all');" href="#body" title="<?php echo $this->_tpl_vars['ST']['setdel_botton'] ?>" hidefocus="true"><?php echo $this->_tpl_vars['ST']['setdel_botton'] ?></a></td>
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