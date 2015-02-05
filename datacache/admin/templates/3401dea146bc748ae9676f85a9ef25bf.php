<?php if(count($this->_tpl_vars['array']) > 0){ ?>
<?php if (count($this->_tpl_vars['array'])>0){$divid_list=1;for($list=0;$list<count($this->_tpl_vars['array']); $list++){?>
<div class="infolist" onselectstart="return false;" title="<?php echo $this->_tpl_vars['array'][$list]['typename'] ?>"<?php if($this->powercheck('communicate','bbstypeedit')==true ){ ?> ondblClick="javascript:parent.onbotton('<?php echo $this->_tpl_vars['ST']['setedit_botton'] ?>','index.php?archive=bbstypemain&action=bbstypeedit&btid=<?php echo $this->_tpl_vars['array'][$list]['btid'] ?>&type=edit&freshid='+Math.random()+'&iframename='+self.frameElement.getAttribute('name'),true,'ifrmatlistedit<?php echo $this->_tpl_vars['array'][$list]['btid'] ?>',self.frameElement.getAttribute('name'));"<?php } ?>>
	<table border="0" style="border-collapse:collapse" width="100%" bordercolor="#FFFFFF">
		<tr>
			<td width="4%"><input type="checkbox" name="selectinfoid" value="<?php echo $this->_tpl_vars['array'][$list]['btid'] ?>"></td>
			<td width="7%">
				<input type="hidden" name="infoid" id="infoid" value="<?php echo $this->_tpl_vars['array'][$list]['btid'] ?>">
				<input type="text" name="pid" size="3" value="<?php echo $this->_tpl_vars['array'][$list]['pid'] ?>" class="infoInput" onclick="if(this.value=='<?php echo $this->_tpl_vars['array'][$list]['pid'] ?>'){this.value = '';}else {this.select();}" onblur="if(this.value ==''){this.value ='<?php echo $this->_tpl_vars['array'][$list]['pid'] ?>';}">
			</td>
			<td width="7%"><?php echo $this->_tpl_vars['array'][$list]['btid'] ?></td>
			<td width="6%"><?php echo $this->_tpl_vars['array'][$list]['lng'] ?></td>
			<td width="30%"><?php echo $this->_tpl_vars['array'][$list]['typename'] ?></td>
			<td width="10%"><?php echo $this->_tpl_vars['array'][$list]['puvname'] ?></td>
			<td width="7%" id="infotype">
				<table>
					<tr>
						<td><?php if($this->_tpl_vars['array'][$list]['ismenu']==1){ ?><span class="select_ok"></span><?php }else{ ?><span class="select_no"></span><?php } ?></td>
					</tr>
				</table>
			</td>
			<td width="11%" id="infotype">
				<table>
					<tr>
						<td><?php if($this->_tpl_vars['array'][$list]['isseccode']==1){ ?><span class="isseccode_ok" title="<?php echo $this->_tpl_vars['ST']['formmain_isseccode_ok'] ?>"></span><?php }else{ ?><span class="isseccode_no" title="<?php echo $this->_tpl_vars['ST']['formmain_isseccode_no'] ?>"></span><?php } ?></td>
						<td><?php if($this->_tpl_vars['array'][$list]['iswap']==1){ ?><span class="iswap_ok" title="<?php echo $this->_tpl_vars['ST']['open_botton_title'] ?>"></span><?php }else{ ?><span class="iswap_no" title="<?php echo $this->_tpl_vars['ST']['close_botton_title'] ?>"></span><?php } ?></td>
						<td><?php if($this->_tpl_vars['array'][$list]['isclass']==1){ ?><span class="audit_ok" title="<?php echo $this->_tpl_vars['ST']['open_botton_title'] ?>"></span><?php }else{ ?><span class="audit_no" title="<?php echo $this->_tpl_vars['ST']['close_botton_title'] ?>"></span><?php } ?></td>
					</tr>
				</table>
			</td>
			<td width="18%" id="infotype">
				<table border="0" style="border-collapse:collapse" bordercolor="#FFFFFF">
					<tr>
						<?php if($this->powercheck('communicate','bbsmainlist')==true ){ ?>
						<td><a class="setedit2" onclick="javascript:parent.onbotton('<?php echo $this->_tpl_vars['ST']['forumtype_text_infolist_title'] ?>','index.php?archive=management&action=list&listfunction=bbsmainlist&btid=<?php echo $this->_tpl_vars['array'][$list]['btid'] ?>&freshid='+Math.random()+'&iframename='+self.frameElement.getAttribute('name'),true,'bbsmainlist<?php echo $this->_tpl_vars['array'][$list]['btid'] ?>',self.frameElement.getAttribute('name'));" id="bbsmainlist<?php echo $this->_tpl_vars['array'][$list]['btid'] ?>" href="#body" title="<?php echo $this->_tpl_vars['ST']['forumtype_text_infolist_title'] ?>" hidefocus="true"><?php echo $this->_tpl_vars['ST']['forumtype_text_infolist_title'] ?></a></td>
						<?php } ?>
						<?php if($this->powercheck('communicate','bbstypeedit')==true ){ ?>
						<td class="padding-left3"><a class="setedit" onclick="javascript:parent.onbotton('<?php echo $this->_tpl_vars['ST']['setedit_botton'] ?>','index.php?archive=bbstypemain&action=bbstypeedit&btid=<?php echo $this->_tpl_vars['array'][$list]['btid'] ?>&type=edit&freshid='+Math.random()+'&iframename='+self.frameElement.getAttribute('name'),false,'ifrmatlistedit<?php echo $this->_tpl_vars['array'][$list]['btid'] ?>',self.frameElement.getAttribute('name'));" id="ifrmatlistedit<?php echo $this->_tpl_vars['array'][$list]['btid'] ?>"  href="#body" title="<?php echo $this->_tpl_vars['ST']['setedit_botton'] ?>" hidefocus="true"><?php echo $this->_tpl_vars['ST']['setedit_botton'] ?></a></td>
						<?php } ?>
						<?php if($this->powercheck('communicate','bbstypedel')==true ){ ?>
						<td class="padding-left3"><a class="setedit" onclick="javascript:submiturl('index.php?archive=bbstypemain&action=bbstypedel&btid=<?php echo $this->_tpl_vars['array'][$list]['btid'] ?>&freshid='+Math.random(),'index.php?archive=management&action=load','<?php echo $this->_tpl_vars['ST']['run_ok'] ?>','<?php echo $this->_tpl_vars['ST']['run_no'] ?>',true,'<?php echo $this->_tpl_vars['ST']['del_messok'] ?>','selectform','selectall','check_all');" href="#body" title="<?php echo $this->_tpl_vars['ST']['setdel_botton'] ?>" hidefocus="true"><?php echo $this->_tpl_vars['ST']['setdel_botton'] ?></a></td>
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