<?php if(count($this->_tpl_vars['array']) > 0){ ?>
<?php if (count($this->_tpl_vars['array'])>0){$divid_list=1;for($list=0;$list<count($this->_tpl_vars['array']); $list++){?>
<div class="infolist" title="<?php echo $this->_tpl_vars['array'][$list]['title'] ?>" onselectstart="return false;" <?php if($this->powercheck('communicate','albumedit')==true ){ ?>ondblClick="javascript:parent.onbotton('<?php echo $this->_tpl_vars['ST']['setedit_botton'] ?>','index.php?archive=albummain&action=albumaedit&amid=<?php echo $this->_tpl_vars['array'][$list]['amid'] ?>&type=edit&freshid='+Math.random()+'&iframename='+self.frameElement.getAttribute('name'),true,'articleeditbotton<?php echo $this->_tpl_vars['array'][$list]['amid'] ?>',self.frameElement.getAttribute('name'));"<?php } ?>>
     <table border="0" style="border-collapse:collapse" width="100%" bordercolor="#FFFFFF">
		<tr>
			<td width="5%"><input type="checkbox" name="selectinfoid" value="<?php echo $this->_tpl_vars['array'][$list]['amid'] ?>"></td>
			<td width="10%"><?php echo $this->_tpl_vars['array'][$list]['amid'] ?></td>
			<td width="40%"><?php echo $this->_tpl_vars['array'][$list]['title'] ?></td>
			<td width="15%"><?php echo $this->timeformat($this->_tpl_vars['array'][$list]['addtime'],3) ?></td>
			<td width="10%" id="infotype">
				<table>
					<tr>
						<td><?php if($this->_tpl_vars['array'][$list]['isclass']==1){ ?><span class="audit_ok" title="<?php echo $this->_tpl_vars['ST']['article_audit_ok'] ?>"></span><?php }else{ ?><span class="audit_no" title="<?php echo $this->_tpl_vars['ST']['article_audit_no'] ?>"></span><?php } ?></td>
					</tr>
				</table>
			</td>
			<td width="20%" id="infotype">
				<?php if($this->powercheck('communicate','albumedit')==true ){ ?>
				<table border="0" style="border-collapse:collapse" bordercolor="#FFFFFF">
					<tr>
						<td><a class="setedit3" onclick="javascript:parent.onbotton('<?php echo $this->_tpl_vars['ST']['albummain_botton_view'] ?>','index.php?archive=management&action=list&listfunction=albumfilelist&amid=<?php echo $this->_tpl_vars['array'][$list]['amid'] ?>&freshid='+Math.random()+'&iframename='+self.frameElement.getAttribute('name'),true,'typelist<?php echo $this->_tpl_vars['array'][$list]['amid'] ?>',self.frameElement.getAttribute('name'));" id="typelist<?php echo $this->_tpl_vars['array'][$list]['amid'] ?>" href="#body" title="<?php echo $this->_tpl_vars['ST']['albummain_botton_view'] ?>" hidefocus="true"><?php echo $this->_tpl_vars['ST']['albummain_botton_view'] ?></a></td>
						<td class="padding-left3"><a class="setedit" onclick="javascript:parent.onbotton('<?php echo $this->_tpl_vars['ST']['setedit_botton'] ?>','index.php?archive=albummain&action=albumaedit&amid=<?php echo $this->_tpl_vars['array'][$list]['amid'] ?>&type=edit&freshid='+Math.random()+'&iframename='+self.frameElement.getAttribute('name'),true,'articleeditbotton<?php echo $this->_tpl_vars['array'][$list]['amid'] ?>',self.frameElement.getAttribute('name'));" id="articleeditbotton<?php echo $this->_tpl_vars['array'][$list]['amid'] ?>" href="#body" title="<?php echo $this->_tpl_vars['ST']['setedit_botton'] ?>" hidefocus="true"><?php echo $this->_tpl_vars['ST']['setedit_botton'] ?></a></td>
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