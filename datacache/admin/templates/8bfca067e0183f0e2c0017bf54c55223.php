<?php if(count($this->_tpl_vars['array']) > 0){ ?>
<?php if (count($this->_tpl_vars['array'])>0){$divid_list=1;for($list=0;$list<count($this->_tpl_vars['array']); $list++){?>
<div class="infolist" title="<?php echo $this->_tpl_vars['array'][$list]['name'] ?>">
	<table border="0" style="border-collapse:collapse" width="100%" bordercolor="#FFFFFF">
		<tr>
			<td width="10%"><?php echo $this->_tpl_vars['array'][$list]['skid'] ?></td>
			<td width="35%"><?php echo $this->_tpl_vars['array'][$list]['name'] ?></td>
			<td width="15%"><?php echo $this->_tpl_vars['array'][$list]['code'] ?></td>
			<td width="10%" id="infotype">
				<table>
					<tr>
						<td><?php if($this->_tpl_vars['array'][$list]['lockin']==1){ ?><span class="select_ok"></span><?php }else{ ?><span class="select_no"></span><?php } ?></td>
					</tr>
				</table>
			</td>
			<td width="10%" id="infotype">
				<table>
					<tr>
						<td><?php if($this->_tpl_vars['array'][$list]['isclass']==1){ ?><span class="select_ok"></span><?php }else{ ?><span class="select_no"></span><?php } ?></td>
					</tr>
				</table>
			</td>
			<td width="20%" id="infotype">
				<table border="0" style="border-collapse:collapse" bordercolor="#FFFFFF">
					<tr>
						<?php if($this->powercheck('templates','setting')==true ){ ?>
						<td>
							<?php if($this->_tpl_vars['array'][$list]['isclass']==0){ ?>
							<a class="setedit" onclick="javascript:submiturl('index.php?archive=skinmain&action=setting&skid=<?php echo $this->_tpl_vars['array'][$list]['skid'] ?>&code=<?php echo $this->_tpl_vars['array'][$list]['code'] ?>&isclass=1&freshid='+Math.random(),'index.php?archive=management&action=load','<?php echo $this->_tpl_vars['ST']['run_ok'] ?>','<?php echo $this->_tpl_vars['ST']['skinmain_class_log_mess'] ?>',true,'<?php echo $this->_tpl_vars['ST']['skinmain_isclass_mess'] ?>','selectform','selectall','check_all');" href="#body" title="<?php echo $this->_tpl_vars['ST']['setdel_botton'] ?>" hidefocus="true"><?php echo $this->_tpl_vars['ST']['setedit_userok'] ?></a>
							<?php }else{ ?>
							<a class="setedit4" href="#body" title="<?php echo $this->_tpl_vars['ST']['setedit_userclose'] ?>" hidefocus="true"><?php echo $this->_tpl_vars['ST']['setedit_userclose'] ?></a>
							<?php } ?>
						</td>
						<?php } ?>
						<?php if($this->powercheck('templates','delskin')==true && $this->_tpl_vars['array'][$list]['lockin']==0){ ?>
						<td class="padding-left3"><a class="setedit" onclick="javascript:submiturl('index.php?archive=skinmain&action=delskin&skid=<?php echo $this->_tpl_vars['array'][$list]['skid'] ?>&isclass=<?php echo $this->_tpl_vars['array'][$list]['isclass'] ?>&freshid='+Math.random(),'index.php?archive=management&action=load','<?php echo $this->_tpl_vars['ST']['run_ok'] ?>','<?php echo $this->_tpl_vars['ST']['skinmain_del_log_mess'] ?>',true,'<?php echo $this->_tpl_vars['ST']['del_messok'] ?>','selectform','selectall','check_all');" href="#body" title="<?php echo $this->_tpl_vars['ST']['setdel_botton'] ?>" hidefocus="true"><?php echo $this->_tpl_vars['ST']['setdel_botton'] ?></a></td>
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